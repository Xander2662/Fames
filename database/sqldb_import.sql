SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Table `Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Users` (
  `idUsers` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `permission` INT NOT NULL,
  PRIMARY KEY (`idUsers`));

-- -----------------------------------------------------
-- Table `Games`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Games` (
  `idGames` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `info` VARCHAR(255) NULL,
  `color` VARCHAR(45) NOT NULL,
  `Gamescol` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idGames`));

-- -----------------------------------------------------
-- Table `Post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Post` (
  `idPost` INT NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(255) NOT NULL,
  `Img_ref` VARCHAR(255) NOT NULL,
  `sumlikes` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `Games_idGames` INT NOT NULL,
  PRIMARY KEY (`idPost`),
  INDEX `fk_Post_Users1_idx` (`Users_idUsers` ASC),
  INDEX `fk_Post_Games1_idx` (`Games_idGames` ASC),
  CONSTRAINT `fk_Post_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Post_Games1`
    FOREIGN KEY (`Games_idGames`)
    REFERENCES `Games` (`idGames`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `Report`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Report` (
  `idReport` INT NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(45) NOT NULL,
  `date` DATE NOT NULL,
  `Post_idPost` INT NULL,
  PRIMARY KEY (`idReport`),
  INDEX `fk_Report_Post1_idx` (`Post_idPost` ASC),
  CONSTRAINT `fk_Report_Post1`
    FOREIGN KEY (`Post_idPost`)
    REFERENCES `Post` (`idPost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `Likes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Likes` (
  `Post_idPost` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  INDEX `fk_Likes_Post_idx` (`Post_idPost` ASC),
  INDEX `fk_Likes_Users1_idx` (`Users_idUsers` ASC),
  CONSTRAINT `fk_Likes_Post`
    FOREIGN KEY (`Post_idPost`)
    REFERENCES `Post` (`idPost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Likes_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
