-- MySQL Script generated by MySQL Workbench
-- Wed Jan 27 14:42:12 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema crud_noticia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema crud_noticia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `crud_noticia` DEFAULT CHARACTER SET utf8 ;
USE `crud_noticia` ;

-- -----------------------------------------------------
-- Table `crud_noticia`.`noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud_noticia`.`noticia` (
  `id_noticia` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(90) NOT NULL,
  `slug` VARCHAR(200) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `conteudo` TEXT NOT NULL,
  `ativo` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_noticia`),
  UNIQUE INDEX `noticiacol_UNIQUE` (`titulo` ASC) ,
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) ,
  UNIQUE INDEX `id_noticia_UNIQUE` (`id_noticia` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud_noticia`.`tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud_noticia`.`tag` (
  `id_tag` INT NOT NULL AUTO_INCREMENT,
  `tag` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_tag`),
  UNIQUE INDEX `palavra_UNIQUE` (`tag` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud_noticia`.`noticia_has_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud_noticia`.`noticia_has_tag` (
  `noticia_id_noticia` INT NOT NULL,
  `tag_id_tag` INT NOT NULL,
  PRIMARY KEY (`noticia_id_noticia`, `tag_id_tag`),
  INDEX `fk_noticia_has_tag_tag1_idx` (`tag_id_tag` ASC) ,
  INDEX `fk_noticia_has_tag_noticia_idx` (`noticia_id_noticia` ASC) ,
  CONSTRAINT `fk_noticia_has_tag_noticia`
    FOREIGN KEY (`noticia_id_noticia`)
    REFERENCES `crud_noticia`.`noticia` (`id_noticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticia_has_tag_tag1`
    FOREIGN KEY (`tag_id_tag`)
    REFERENCES `crud_noticia`.`tag` (`id_tag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
