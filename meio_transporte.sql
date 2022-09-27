CREATE TABLE `meio_transporte`.`carro` (
  `id_carro` INT NOT NULL AUTO_INCREMENT,
  `renavam` VARCHAR(45) NULL,
  `cor` VARCHAR(45) NULL,
  `ano_modelo` VARCHAR(45) NULL,
  `tipo_motor` VARCHAR(45) NULL,
  `cilindrada` VARCHAR(45) NULL,
  `marca` VARCHAR(45) NULL,
  `modelo` VARCHAR(45) NULL,
  PRIMARY KEY (`id_carro`));

CREATE TABLE `meio_transporte`.`aviao` (
  `id_aviao` INT NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(45) NULL,
  `qdte_turbinas` INT NULL,
  `capac_passageiros` INT NULL,
  `capc_carga` DECIMAL NULL,
  `fonte_energia` VARCHAR(45) NULL,
  PRIMARY KEY (`id_aviao`));
  
  CREATE TABLE `meio_transporte`.`trem` (
  `id_trem` INT NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(45) NULL,
  `cor` VARCHAR(45) NULL,
  `capacidade_passageiro` INT NULL,
  `qtde_vagoes` INT NULL,
  `fonte_energia` VARCHAR(45) NULL,
  `fabricante` VARCHAR(45) NULL,
  PRIMARY KEY (`id_trem`));

