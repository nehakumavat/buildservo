ALTER TABLE `tbl_employee` ADD `profile_image` VARCHAR(150) NOT NULL AFTER `designation_id`;
ALTER TABLE `tbl_employee` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tbl_employee` ADD `is_deleted` INT(5) NOT NULL AFTER `profile_image`;
ALTER TABLE `tbl_employee` CHANGE `mobile_no` `mobile_no` BIGINT NOT NULL;