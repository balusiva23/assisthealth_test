ALTER TABLE `internal_doctors` CHANGE `clinic_timing` `clinic_timing` TEXT NULL DEFAULT NULL;


ALTER TABLE `internal_doctors` CHANGE `timing` `timing` TEXT NOT NULL;


ALTER TABLE `internal_doctors` CHANGE `clinic_to_timing` `clinic_to_timing` TIME NULL;


ALTER TABLE `internal_doctors` CHANGE `clinic_to_timing` `clinic_to_timing` TEXT NULL DEFAULT NULL;


ALTER TABLE `internal_doctors` CHANGE `clinic_timing` `clinic_timing` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;