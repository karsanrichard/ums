ALTER TABLE `ums`.`groups` 
ADD COLUMN `authentication` INT NULL DEFAULT 0 AFTER `managed_by`,
ADD COLUMN `password` VARCHAR(250) NULL DEFAULT NULL AFTER `authentication`;
