-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema natkandlo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema natkandlo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `natkandlo` DEFAULT CHARACTER SET utf8 ;
USE `natkandlo` ;

-- -----------------------------------------------------
-- Table `natkandlo`.`partes_prenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`partes_prenda` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`partes_prenda` (
  `idpartes` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idpartes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`unidades_medida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`unidades_medida` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`unidades_medida` (
  `idunidades_medida` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idunidades_medida`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`equivalencias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`equivalencias` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`equivalencias` (
  `idequivalencias` INT NOT NULL AUTO_INCREMENT,
  `valor_unidad` VARCHAR(45) NULL,
  PRIMARY KEY (`idequivalencias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`tallas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`tallas` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`tallas` (
  `idtallas` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `numero` VARCHAR(45) NULL,
  PRIMARY KEY (`idtallas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`moldes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`moldes` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`moldes` (
  `idmoldes` INT NOT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`idmoldes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`estilo_prenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`estilo_prenda` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`estilo_prenda` (
  `idestilo_prenda` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idestilo_prenda`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`prendas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`prendas` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`prendas` (
  `idcategorias_prendas` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategorias_prendas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`costos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`costos` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`costos` (
  `idcostos` INT NOT NULL AUTO_INCREMENT,
  `valor_total` VARCHAR(45) NULL,
  `medidas` VARCHAR(45) NULL,
  `unidades` VARCHAR(45) NULL,
  PRIMARY KEY (`idcostos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`materiales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`materiales` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`materiales` (
  `idmateriales` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idmateriales`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`tipo_persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`tipo_persona` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`tipo_persona` (
  `idtipo_persona` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idtipo_persona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`municipios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`municipios` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`municipios` (
  `idmunicipios` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idmunicipios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`departamentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`departamentos` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`departamentos` (
  `iddepartamentos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`iddepartamentos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`usuarios` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NULL,
  `apellidos` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `tipo_documento` VARCHAR(45) NULL,
  `documento` VARCHAR(45) NULL,
  `genero` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `nombre_usuario` VARCHAR(45) NULL,
  `clave` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`pagos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`pagos` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`pagos` (
  `idpagos` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NULL,
  `intentos` VARCHAR(45) NULL,
  PRIMARY KEY (`idpagos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`cotizaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`cotizaciones` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`cotizaciones` (
  `idcotizaciones` INT NOT NULL AUTO_INCREMENT,
  `valor` VARCHAR(45) NULL,
  `fecha_entrega` VARCHAR(45) NULL,
  PRIMARY KEY (`idcotizaciones`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`sedes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`sedes` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`sedes` (
  `idsedes` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  PRIMARY KEY (`idsedes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`proveedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`proveedores` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`proveedores` (
  `idproveedores` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idproveedores`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`categorias_operarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`categorias_operarios` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`categorias_operarios` (
  `idcategorias_operarios` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategorias_operarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`operarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`operarios` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`operarios` (
  `idoperarios` INT NOT NULL AUTO_INCREMENT,
  `productos` VARCHAR(45) NULL,
  PRIMARY KEY (`idoperarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`empleados_contratos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`empleados_contratos` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`empleados_contratos` (
  `idempleados_contratos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idempleados_contratos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`categoria_empleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`categoria_empleado` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`categoria_empleado` (
  `idcategoria_empleado` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria_empleado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`cargos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`cargos` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`cargos` (
  `idcargos` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NULL,
  PRIMARY KEY (`idcargos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`empleados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`empleados` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`empleados` (
  `idempleados` INT NOT NULL AUTO_INCREMENT,
  `sueldo` VARCHAR(45) NULL,
  PRIMARY KEY (`idempleados`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`clientes` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`clientes` (
  `idclientes` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idclientes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`categoria_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`categoria_usuarios` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`categoria_usuarios` (
  `idcategoria_usuarios` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria_usuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`disenio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`disenio` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`disenio` (
  `iddisenio` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `costos` VARCHAR(45) NULL,
  `tiempo_creacion` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `fecha_creacion` VARCHAR(45) NULL,
  `id_usuario` INT NULL,
  PRIMARY KEY (`iddisenio`),
  INDEX `usuarios_idx` (`id_usuario` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`metodos_pago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`metodos_pago` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`metodos_pago` (
  `idmetodos_pago` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idmetodos_pago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`colecciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`colecciones` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`colecciones` (
  `idcolecciones` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idcolecciones`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `natkandlo`.`descuentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `natkandlo`.`descuentos` ;

CREATE TABLE IF NOT EXISTS `natkandlo`.`descuentos` (
  `iddescuentos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `porcentaje` VARCHAR(45) NULL,
  PRIMARY KEY (`iddescuentos`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
