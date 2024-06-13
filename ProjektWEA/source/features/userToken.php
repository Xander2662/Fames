<?php

class UserToken
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function generateTokens(): array
    {
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));
        return [$selector, $validator, $selector . ':' . $validator];
    }

    public function parseToken(string $token): ?array
    {
        $parts = explode(':', $token);
        if ($parts && count($parts) == 2) {
            return [$parts[0], $parts[1]];
        }
        return null;
    }

    public function insertUserToken(int $user_id, string $selector, string $hashed_validator, string $expiry): bool
    {
        $sql = 'INSERT INTO user_tokens (user_id, selector, hashed_validator, expiry) VALUES (?, ?, ?, ?)';
        $statement = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($statement, 'isss', $user_id, $selector, $hashed_validator, $expiry);
        return mysqli_stmt_execute($statement);
    }

    public function findUserTokenBySelector(string $selector)
    {
        $sql = 'SELECT id, selector, hashed_validator, user_id, expiry FROM user_tokens WHERE selector = ? AND expiry >= NOW() LIMIT 1';
        $statement = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($statement, 's', $selector);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    }

    public function deleteUserToken(int $user_id): bool
    {
        $sql = 'DELETE FROM user_tokens WHERE user_id = ?';
        $statement = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($statement, 'i', $user_id);
        return mysqli_stmt_execute($statement);
    }

    public function findUserByToken(string $token)
    {
        $tokens = $this->parseToken($token);
        if (!$tokens) {
            return null;
        }

        $sql = 'SELECT users.id, username FROM users INNER JOIN user_tokens ON user_id = users.id WHERE selector = ? AND expiry > NOW() LIMIT 1';
        $statement = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($statement, 's', $tokens[0]);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    }

    public function tokenIsValid(string $token): bool
    {
        [$selector, $validator] = $this->parseToken($token);
        $tokens = $this->findUserTokenBySelector($selector);
        if (!$tokens) {
            return false;
        }
        return password_verify($validator, $tokens['hashed_validator']);
    }

    public function rememberMe(int $user_id, int $days = 30)
    {
        [$selector, $validator, $token] = $this->generateTokens();
        $this->deleteUserToken($user_id);
        $expired_seconds = time() + 60 * 60 * 24 * $days;
        $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
        $expiry = date('Y-m-d H:i:s', $expired_seconds);
        if ($this->insertUserToken($user_id, $selector, $hash_validator, $expiry)) {
            setcookie('remember_me', $token, $expired_seconds);
        }
    }

    public function isUserLoggedIn(): bool
    {
        if (isset($_SESSION['username'])) {
            return true;
        }

        $token = filter_input(INPUT_COOKIE, 'remember_me', FILTER_SANITIZE_STRING);
        if ($token && $this->tokenIsValid($token)) {
            $user = $this->findUserByToken($token);
            if ($user) {
                return $this->logUserIn($user);
            }
        }
        return false;
    }

    private function logUserIn(array $user): bool
    {
        if (session_regenerate_id()) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }
}