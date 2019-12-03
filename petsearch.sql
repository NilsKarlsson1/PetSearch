-- MySQL Script generated by MySQL Workbench
-- Tue Dec  3 09:35:43 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema petsearch2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema petsearch2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `petsearch2` DEFAULT CHARACTER SET utf8 ;
USE `petsearch2` ;

-- -----------------------------------------------------
-- Table `petsearch2`.`Login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petsearch2`.`Login` (
  `idLogin` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`idLogin`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `idLogin_UNIQUE` (`idLogin` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petsearch2`.`listUser`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petsearch2`.`listUser` (
  `idlistUser` INT NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `city` VARCHAR(50) NULL,
  `country` VARCHAR(50) NULL,
  `sexe` TINYINT NULL,
  `birthday` DATE NULL,
  `active` TINYINT NULL,
  `creatAt` DATETIME NULL,
  UNIQUE INDEX `idlistUser_UNIQUE` (`idlistUser` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petsearch2`.`pet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petsearch2`.`pet` (
  `idpet` INT NOT NULL,
  `email` VARCHAR(150) NULL,
  `type` VARCHAR(60) NULL,
  `dateAcquisition` DATETIME NULL,
  `race` VARCHAR(50) NULL,
  `sexe` TINYINT NULL,
  PRIMARY KEY (`idpet`),
  UNIQUE INDEX `idpet_UNIQUE` (`idpet` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petsearch2`.`localisation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petsearch2`.`localisation` (
  `idlocalisation` INT NOT NULL,
  `lat` VARCHAR(45) NULL,
  `lon` VARCHAR(45) NULL,
  `creatAt` DATETIME NULL,
  `pet` INT NOT NULL,
  PRIMARY KEY (`idlocalisation`),
  UNIQUE INDEX `idlocalisation_UNIQUE` (`idlocalisation` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petsearch2`.`billing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petsearch2`.`billing` (
  `idbilling` INT NOT NULL,
  `creatAt` DATETIME NULL,
  `amount` DECIMAL(3,2) NULL,
  `email` VARCHAR(150) NULL,
  PRIMARY KEY (`idbilling`),
  UNIQUE INDEX `idbilling_UNIQUE` (`idbilling` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petsearch2`.`token`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petsearch2`.`token` (
  `idtoken` INT NOT NULL,
  `lat` VARCHAR(45) NULL,
  `lon` VARCHAR(45) NULL,
  `creatAt` DATETIME NULL,
  `email` VARCHAR(150) NULL,
  `tokencol` VARCHAR(45) NULL,
  PRIMARY KEY (`idtoken`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
