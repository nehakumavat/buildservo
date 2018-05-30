ALTER TABLE `tbl_employee` ADD `profile_image` VARCHAR(150) NOT NULL AFTER `designation_id`;
ALTER TABLE `tbl_employee` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;