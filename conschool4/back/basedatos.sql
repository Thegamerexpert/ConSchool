SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `conschool` DEFAULT CHARACTER SET utf8 ;
USE `conschool` ;

CREATE TABLE IF NOT EXISTS `conschool`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Apellidos` VARCHAR(45) NULL,
  `contraseña` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  `id_centro` INT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `conschool`.`Material` (
  `idMaterial` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `fecha_creacion` DATE NULL,
  `id_profesor` INT NULL,
  `idAsignatura` INT NULL,
  PRIMARY KEY (`idMaterial`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `conschool`.`Nota` (
  `idNota` INT NOT NULL AUTO_INCREMENT,
  `calificacion` FLOAT NULL,
  `fecha_calificacion` DATE NULL,
  `idAsignatura` INT NULL,
  `idUsuario` INT NULL,
  PRIMARY KEY (`idNota`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `conschool`.`Asignatura` (
  `idAsignatura` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(100) NULL,
  `Id_centro` INT NULL,
  `Material_idMaterial` INT NOT NULL,
  `Nota_idNota` INT NOT NULL,
  PRIMARY KEY (`idAsignatura`, `Nota_idNota`),
  INDEX `fk_Asignatura_Material1_idx` (`Material_idMaterial` ASC),
  INDEX `fk_Asignatura_Nota1_idx` (`Nota_idNota` ASC),
  CONSTRAINT `fk_Asignatura_Material1`
    FOREIGN KEY (`Material_idMaterial`)
    REFERENCES `conschool`.`Material` (`idMaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Asignatura_Nota1`
    FOREIGN KEY (`Nota_idNota`)
    REFERENCES `conschool`.`Nota` (`idNota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;
 

CREATE TABLE IF NOT EXISTS `conschool`.`Centro_Educativo` (
  `Id_centro` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `Telefono` VARCHAR(45) NULL,
  `correo_electronico` VARCHAR(45) NULL,
  `Usuario_idUsuario` INT NOT NULL,
  `Asignatura_idAsignatura` INT NOT NULL,
  `Asignatura_idAsignatura1` INT NOT NULL,
  PRIMARY KEY (`Id_centro`, `Asignatura_idAsignatura`),
  INDEX `fk_Centro_Educativo_Usuario_idx` (`Usuario_idUsuario` ASC),
  INDEX `fk_Centro_Educativo_Asignatura1_idx` (`Asignatura_idAsignatura` ASC),
  INDEX `fk_Centro_Educativo_Asignatura2_idx` (`Asignatura_idAsignatura1` ASC),
  CONSTRAINT `fk_Centro_Educativo_Usuario`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `conschool`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Centro_Educativo_Asignatura1`
    FOREIGN KEY (`Asignatura_idAsignatura`)
    REFERENCES `conschool`.`Asignatura` (`idAsignatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Centro_Educativo_Asignatura2`
    FOREIGN KEY (`Asignatura_idAsignatura1`)
    REFERENCES `conschool`.`Asignatura` (`idAsignatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `conschool`.`Mensaje` (
  `idMensaje` INT NOT NULL AUTO_INCREMENT,
  `contenido` VARCHAR(100) NULL,
  `fecha_envio` DATE NULL,
  `id_emisor` INT NULL,
  `id_receptor` INT NULL,
  PRIMARY KEY (`idMensaje`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `conschool`.`Usuario_has_Mensaje` (
  `Usuario_idUsuario` INT NOT NULL,
  `Mensaje_idMensaje` INT NOT NULL,
  PRIMARY KEY (`Usuario_idUsuario`, `Mensaje_idMensaje`),
  INDEX `fk_Usuario_has_Mensaje_Mensaje1_idx` (`Mensaje_idMensaje` ASC),
  INDEX `fk_Usuario_has_Mensaje_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Usuario_has_Mensaje_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `conschool`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Mensaje_Mensaje1`
    FOREIGN KEY (`Mensaje_idMensaje`)
    REFERENCES `conschool`.`Mensaje` (`idMensaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `conschool`.`Usuario_has_Nota` (
  `Usuario_idUsuario` INT NOT NULL,
  `Nota_idNota` INT NOT NULL,
  PRIMARY KEY (`Usuario_idUsuario`, `Nota_idNota`),
  INDEX `fk_Usuario_has_Nota_Nota1_idx` (`Nota_idNota` ASC),
  INDEX `fk_Usuario_has_Nota_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Usuario_has_Nota_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `conschool`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Nota_Nota1`
    FOREIGN KEY (`Nota_idNota`)
    REFERENCES `conschool`.`Nota` (`idNota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

