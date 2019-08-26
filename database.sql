-- MySQL Script generated by MySQL Workbench
-- Sun Aug 25 22:56:52 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema memes
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `memes` ;

-- -----------------------------------------------------
-- Schema memes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `memes` DEFAULT CHARACTER SET utf8 ;
USE `memes` ;

-- -----------------------------------------------------
-- Table `memes`.`amigos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `memes`.`amigos` ;

CREATE TABLE IF NOT EXISTS `memes`.`amigos` (
  `cod_amigos` INT NOT NULL,
  `convidou` INT UNSIGNED NOT NULL,
  `recebeu` INT UNSIGNED NOT NULL,
  `aceitou` INT(11) NULL DEFAULT 0,
  PRIMARY KEY (`cod_amigos`),
  INDEX `fk_amigos_usuarios_idx` (`convidou` ASC) VISIBLE,
  INDEX `fk_amigos_usuarios1_idx` (`recebeu` ASC) VISIBLE,
  CONSTRAINT `fk_amigos_usuarios`
    FOREIGN KEY (`convidou`)
    REFERENCES `memes`.`usuarios` (`cod_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_amigos_usuarios1`
    FOREIGN KEY (`recebeu`)
    REFERENCES `memes`.`usuarios` (`cod_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memes`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `memes`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `memes`.`usuarios` (
  `cod_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `pass` VARCHAR(60) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `nasc_dia` CHAR(2) NULL DEFAULT NULL,
  `nasc_mes` CHAR(2) NULL DEFAULT NULL,
  `nasc_ano` CHAR(2) NULL DEFAULT NULL,
  `cidade` VARCHAR(45) NULL DEFAULT NULL,
  `estado` CHAR(2) NULL DEFAULT NULL,
  `relacionamento` VARCHAR(45) NULL DEFAULT NULL,
  `status` VARCHAR(45) NULL DEFAULT NULL,
  `perfil` VARCHAR(45) NULL DEFAULT NULL,
  `link` VARCHAR(45) NULL DEFAULT NULL,
  `genero` VARCHAR(45) NULL DEFAULT NULL,
  `img` VARCHAR(45) NULL DEFAULT NULL,
  `escolaridade` VARCHAR(45) NULL DEFAULT NULL,
  `amigos` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_user`),
  UNIQUE INDEX `id_UNIQUE` (`cod_user` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
