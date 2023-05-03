/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - wakazi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


/* Procedure structure for procedure `CaptureError` */

/*!50003 DROP PROCEDURE IF EXISTS  `CaptureError` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `CaptureError`()
BEGIN
	
	GET DIAGNOSTICS CONDITION 1 @a = MYSQL_ERRNO, @b = MESSAGE_TEXT;
	INSERT INTO tbl_errors (`code`,`message`) VALUES (@a, @b);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_add_dini` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_add_dini` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_add_dini`( 
	IN `param_name` VARCHAR(150), 
	IN `param_phone` VARCHAR(20),
	IN `param_dhehebu` int,
	IN `param_ahadi` decimal(16,2), 
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_dini WHERE dini_phone = param_phone) THEN
			INSERT INTO `tbl_dini`
			(
				`dini_name`,
				`dini_phone`,
				`dini_dhehebu`,
				`dini_ahadi`,
				`dini_deni`
			)
			VALUES 
			(
				 param_name,
				 param_phone,
				 param_dhehebu,
				 param_ahadi,
				 param_ahadi
			);
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mtumiaji mwingine!';
		END IF;
	
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_add_institution` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_add_institution` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_add_institution`( 
	IN `param_name` VARCHAR(150), 
	IN `param_phone` VARCHAR(20),
	IN `param_list` int,
	IN `param_ahadi` decimal(16,2), 
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_institutions WHERE institution_phone = param_phone) THEN
			INSERT INTO `tbl_institutions`
			(
				`institution_name`,
				`institution_phone`,
				`institution_list`,
				`institution_ahadi`,
				`institution_deni`
			)
			VALUES 
			(
				 param_name,
				 param_phone,
				 param_list,
				 param_ahadi,
				 param_ahadi
			);
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mtumiaji mwingine!';
		END IF;
	
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_add_marafiki` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_add_marafiki` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_add_marafiki`( 
	IN `param_name` VARCHAR(100), 
	IN `param_phone` VARCHAR(20),
	IN `param_location` VARCHAR(80),
	IN `param_ahadi` decimal(16,2), 
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_marafiki WHERE rafiki_phone = param_phone) THEN
			INSERT INTO `tbl_marafiki`
			(
				`rafiki_name`,
				`rafiki_phone`,
				`rafiki_location`,
				`rafiki_ahadi`,
				`rafiki_deni`
			)
			VALUES 
			(
				 param_name,
				 param_phone,
				 param_location,
				 param_ahadi,
				 param_ahadi
			);
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mtumiaji mwingine!';
		END IF;
	
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_add_mikutano` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_add_mikutano` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_add_mikutano`( 
	IN `param_name` VARCHAR(150), 
	IN `param_phone` VARCHAR(20),
	IN `param_location` VARCHAR(80),
	IN `param_type` int,
	IN `param_ahadi` decimal(16,2), 
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_mikutano WHERE mkutano_phone = param_phone) THEN
			INSERT INTO `tbl_mikutano`
			(
				`mkutano_name`,
				`mkutano_phone`,
				`mkutano_location`,
				`mkutano_aina`,
				`mkutano_ahadi`,
				`mkutano_deni`
			)
			VALUES 
			(
				 param_name,
				 param_phone,
				 param_location,
				 param_type,
				 param_ahadi,
				 param_ahadi
			);
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mtumiaji mwingine!';
		END IF;
	
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_add_payments` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_add_payments` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_add_payments`( 
	IN `param_pcat` int, 
	IN `param_mid` int,
	IN `param_deni` DECIMAL(16,2), 
	IN `param_amt` DECIMAL(16,2),
	IN `param_balance` DECIMAL(16,2),
	IN `param_paid` decimal(16,2), 
	IN `param_uid` INT,
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		INSERT INTO `tbl_payments`
			(
				`payment_date`,
				`payment_cat`,
				`payment_member`,
				`payment_debt`,
				`payment_amt`,
				`payment_balance`,
				`payment_add_uid`
			)
		VALUES 
			(
				 date(now()),
				 param_pcat,
				 param_mid,
				 param_deni,
				 param_amt,
				 param_balance,
				 param_uid
			);
			if (param_pcat = 1)then
				UPDATE tbl_wakazi SET mkazi_malipo = param_paid, mkazi_deni = param_balance, payment_status = 1 WHERE mkazi_id = param_mid;
			end if;
			
			IF (param_pcat = 2)THEN
				UPDATE tbl_marafiki SET rafiki_malipo = param_paid, rafiki_deni = param_balance, payment_status = 1 WHERE rafiki_id = param_mid;
			END IF;
			
			IF (param_pcat = 3)THEN
				UPDATE tbl_mikutano SET mkutano_malipo = param_paid, mkutano_deni = param_balance, payment_status = 1 WHERE mkutano_id = param_mid;
			END IF;
			
			IF (param_pcat = 4)THEN
				UPDATE tbl_dini SET dini_malipo = param_paid, dini_deni = param_balance, payment_status = 1 WHERE dini_id = param_mid;
			END IF;
			
			IF (param_pcat = 5)THEN
				UPDATE tbl_institutions SET institution_malipo = param_paid, institution_deni = param_balance, payment_status = 1 WHERE institution_id = param_mid;
			END IF;
	
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_add_user` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_add_user` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_add_user`( 
	IN `param_role` INT,
	IN `param_name` VARCHAR(150), 
	IN `param_email` VARCHAR(150), 
	IN `param_phone` VARCHAR(20), 
	IN `param_add` VARCHAR(100),
	IN `param_pwd` text,   
	IN `param_uid` INT, 
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
	
		IF NOT EXISTS (SELECT * FROM tbl_users WHERE user_email = param_email) THEN
			IF NOT EXISTS (SELECT * FROM tbl_users WHERE user_mobile = param_phone) THEN
				INSERT INTO `tbl_users`
				(
					`user_name`,
					`user_email`,
					`user_mobile`,
					`user_address`,
					`user_role_id`,
					`user_pwd`,
					`user_add_date`,
					`user_add_uid`
				)
				VALUES 
				(
					 param_name,
					 param_email,
					 param_phone,
					 param_add,
					 param_role,
					 param_pwd,
					 date(NOW()),
					 param_uid
				);
			ELSE	
				SET hold_code = 3;
				SET hold_sms  = 'this number is already been used by another user!';
			END IF;
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'this email is already been used by another user';
		END IF;
	
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_add_wakazi` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_add_wakazi` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_add_wakazi`( 
	IN `param_name` VARCHAR(100), 
	IN `param_phone` VARCHAR(20),
	IN `param_zone` int,  
	IN `param_shina` int,  
	IN `param_monitor` INT, 
	IN `param_ahadi` decimal(16,2), 
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_wakazi WHERE mkazi_phone = param_phone) THEN
			INSERT INTO `tbl_wakazi`
			(
				`mkazi_name`,
				`mkazi_phone`,
				`mkazi_zone`,
				`mkazi_shina`,
				`mkazi_monitor`,
				`mkazi_ahadi`,
				`mkazi_deni`
			)
			VALUES 
			(
				 param_name,
				 param_phone,
				 param_zone,
				 param_shina,
				 param_monitor,
				 param_ahadi,
				 param_ahadi
			);
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mkazi mwingine!';
		END IF;
	
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_change_password` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_change_password` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_change_password`(
	IN `param_pwd` TEXT, 
	IN `param_uid` INT, 
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100))
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'An error occured! Please try again.';
		ROLLBACK;
		CALL CaptureError();
	END;
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms = 'Process failed! Please try again!';
		ROLLBACK;
	        CALL CaptureError();
	END;
	START TRANSACTION;
		UPDATE `tbl_users` SET user_pwd = param_pwd WHERE user_id = param_uid ;
	COMMIT;
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_update_dini` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_update_dini` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_update_dini`( 
	IN `param_name` VARCHAR(150), 
	IN `param_phone` VARCHAR(20),
	IN `param_dhehebu` INT, 
	IN `param_ahadi` decimal(16,2), 
	IN `param_payments` INT,
	IN `param_dini` INT,
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_dini WHERE dini_phone = param_phone and dini_id != param_dini) THEN
			IF (param_payments = 0) THEN
				UPDATE `tbl_dini` SET 
					`dini_name` = param_name,
					`dini_phone` = param_phone,
					`dini_dhehebu` = param_dhehebu,
					`dini_ahadi` = param_ahadi,
					`dini_deni` = param_ahadi
				WHERE dini_id = param_dini;
			else
				UPDATE `tbl_dini` SET 
					`dini_name` = param_name,
					`dini_phone` = param_phone,
					`dini_dhehebu` = param_dhehebu
				WHERE dini_id = param_dini;
			END IF;	
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mtumiaji mwingine!';
		END IF;
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_update_institution` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_update_institution` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `sp_update_institution`( 
	IN `param_name` VARCHAR(150), 
	IN `param_phone` VARCHAR(20),
	IN `param_list` INT, 
	IN `param_ahadi` decimal(16,2), 
	IN `param_payments` INT,
	IN `param_institution` INT,
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_institutions WHERE institution_phone = param_phone and institution_id != param_institution) THEN
			IF (param_payments = 0) THEN
				UPDATE `tbl_institutions` SET 
					`institution_name` = param_name,
					`institution_phone` = param_phone,
					`institution_list` = param_list,
					`institution_ahadi` = param_ahadi,
					`institution_deni` = param_ahadi
				WHERE institution_id = param_institution;
			else
				UPDATE `tbl_institutions` SET 
					`institution_name` = param_name,
					`institution_phone` = param_phone,
					`institution_list` = param_list
				WHERE institution_id = param_institution;
			END IF;	
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mtumiaji mwingine!';
		END IF;
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_update_marafiki` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_update_marafiki` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_update_marafiki`( 
	IN `param_name` VARCHAR(100), 
	IN `param_phone` VARCHAR(20),
	IN `param_location` VARCHAR(80), 
	IN `param_ahadi` decimal(16,2), 
	IN `param_payments` INT,
	IN `param_rafiki` INT,
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_marafiki WHERE rafiki_phone = param_phone and rafiki_id != param_rafiki) THEN
			IF (param_payments = 0) THEN
				UPDATE `tbl_marafiki` SET 
					`rafiki_name` = param_name,
					`rafiki_phone` = param_phone,
					`rafiki_location` = param_location,
					`rafiki_ahadi` = param_ahadi,
					`rafiki_deni` = param_ahadi
				WHERE rafiki_id = param_rafiki;
			else
				UPDATE `tbl_marafiki` SET 
					`rafiki_name` = param_name,
					`rafiki_phone` = param_phone,
					`rafiki_location` = param_location
				WHERE rafiki_id = param_rafiki;
			END IF;	
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mtumiaji mwingine!';
		END IF;
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_update_mikutano` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_update_mikutano` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_update_mikutano`( 
	IN `param_name` VARCHAR(150), 
	IN `param_phone` VARCHAR(20),
	IN `param_location` VARCHAR(80),
	IN `param_type` INT, 
	IN `param_ahadi` decimal(16,2), 
	IN `param_payments` INT,
	IN `param_mkutano` INT,
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_mikutano WHERE mkutano_phone = param_phone and mkutano_id != param_mkutano) THEN
			IF (param_payments = 0) THEN
				UPDATE `tbl_mikutano` SET 
					`mkutano_name` = param_name,
					`mkutano_phone` = param_phone,
					`mkutano_location` = param_location,
					`mkutano_aina` = param_type,
					`mkutano_ahadi` = param_ahadi,
					`mkutano_deni` = param_ahadi
				WHERE mkutano_id = param_mkutano;
			else
				UPDATE `tbl_mikutano` SET 
					`mkutano_name` = param_name,
					`mkutano_phone` = param_phone,
					`mkutano_location` = param_location,
					`mkutano_aina` = param_type
				WHERE mkutano_id = param_mkutano;
			END IF;	
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mtumiaji mwingine!';
		END IF;
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_update_user` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_update_user` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_update_user`( 
	IN `param_role` INT, 
	IN `param_name` VARCHAR(150),
	IN `param_email` VARCHAR(150), 
	IN `param_phone` VARCHAR(20), 
	IN `param_add` VARCHAR(100),   
	IN `param_user` INT,
	IN `param_uid` INT,  
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
	
		IF NOT EXISTS (SELECT * FROM tbl_users WHERE user_email = param_email and user_id != param_user) THEN
			IF NOT EXISTS (SELECT * FROM tbl_users WHERE user_mobile = param_phone AND user_id != param_user) THEN
				update `tbl_users` set 
					`user_name` = param_name,
					`user_email` = param_email,
					`user_mobile` = param_phone,
					`user_address` = param_add,
					`user_role_id` = param_role,
					`user_update_date` = date(NOW()),
					`user_update_uid` = param_uid
				
				where user_id = param_user;
			ELSE	
				SET hold_code = 3;
				SET hold_sms  = 'this number is already been used by another user!';
			END IF;
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'this email is already been used by another user';
		END IF;
	
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_update_wakazi` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_update_wakazi` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `sp_update_wakazi`( 
	IN `param_name` VARCHAR(100), 
	IN `param_phone` VARCHAR(20),
	IN `param_zone` int,  
	IN `param_shina` int,  
	IN `param_monitor` INT, 
	IN `param_ahadi` decimal(16,2), 
	IN `param_payments` INT,
	IN `param_mkazi` INT,
	OUT `param_code` TINYINT, 
	OUT `param_sms` VARCHAR(100)
	)
BEGIN
	DECLARE hold_code TINYINT DEFAULT 0;
	DECLARE hold_sms VARCHAR(100) DEFAULT 'Success';
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET param_code = 2;
		SET param_sms  = 'Process failed.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
		SET param_code = 1;
		SET param_sms  = 'An error occured.';
		ROLLBACK;
		CALL CaptureError();
	END;
	
	START TRANSACTION;
		IF NOT EXISTS (SELECT * FROM tbl_wakazi WHERE mkazi_phone = param_phone and mkazi_id != param_mkazi) THEN
			IF (param_payments = 0) THEN
				UPDATE `tbl_wakazi` SET 
					`mkazi_name` = param_name,
					`mkazi_phone` = param_phone,
					`mkazi_zone` = param_zone,
					`mkazi_shina` = param_shina,
					`mkazi_monitor` = param_monitor,
					`mkazi_ahadi` = param_ahadi,
					`mkazi_deni` = param_ahadi
				WHERE mkazi_id = param_mkazi;
			else
				UPDATE `tbl_wakazi` SET 
					`mkazi_name` = param_name,
					`mkazi_phone` = param_phone,
					`mkazi_zone` = param_zone,
					`mkazi_shina` = param_shina,
					`mkazi_monitor` = param_monitor
				WHERE mkazi_id = param_mkazi;
			END IF;	
		ELSE	
			SET hold_code = 3;
			SET hold_sms  = 'namba hii tayari inatumika na mkazi mwingine!';
		END IF;
	COMMIT;
	
	SET param_code = hold_code;
	SET param_sms  = hold_sms;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
