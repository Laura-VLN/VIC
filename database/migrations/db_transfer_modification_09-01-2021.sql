SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE IF NOT EXISTS `coaches_users`
(
    `id` bigint PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `coach_id` int NOT NULL,
    `user_id` int NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS sponsors_users
(
    `id` bigint PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `sponsor_id` int NOT NULL,
    `user_id` int NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `coaches_users`(`coaches_users`.`coach_id`,`coaches_users`.`user_id`)
	SELECT `users`.`coach_id`,`users`.`id`
	FROM `users`
	WHERE `users`.`coach_id` IS NOT NULL;

INSERT INTO `sponsors_users`(`sponsors_users`.`sponsor_id`,`sponsors_users`.`user_id`)
	SELECT `users`.`sponsor_id`,`users`.`id`
	FROM `users`
	WHERE `users`.`sponsor_id` IS NOT NULL;

ALTER TABLE `users`
	DROP COLUMN `coach_id`;
ALTER TABLE `users`
	DROP COLUMN `sponsor_id`;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
