SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `dscan` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dscan` ;

-- -----------------------------------------------------
-- Table `dscan`.`tbl_dscans`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dscan`.`tbl_dscans` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `sid` VARCHAR(45) NOT NULL ,
  `ship_names` TEXT NOT NULL ,
  `ship_types` TEXT NOT NULL ,
  `ship_classes` TEXT NOT NULL ,
  `igb_data` TEXT NOT NULL ,
  `reportedAt` INT NOT NULL ,
  `ship_total` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
