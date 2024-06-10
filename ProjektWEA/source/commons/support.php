<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/support.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="hero">
        <?php include 'header.php' ?>
        <div class="home">
            <div class="intro">
                <h1>SUPPORT</h1>
            </div>

            <div class="support-content">
                <p>If you need assistance, please reach out to our support team using the contact information below:</p>
                <p><strong>Phone:</strong> +420 666 420 696</p>
                <p><strong>Email:</strong> zdar@jaksemas.com</p>
                <p>Our support team is available Monday to Friday, 9 AM to 5 PM.</p>
                <p>We also offer live chat support for quick and easy assistance. Click the live chat button on our
                    website to connect with a support agent.</p>
                <p>Additionally, you can find video tutorials and user guides in the Resources section to help you get
                    the most out of our services.</p>
                <p>Thank you for being a part of our community. We are here to help you with any issues or questions you
                    may have.</p>
            </div>

        </div>
    </div>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }

    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>