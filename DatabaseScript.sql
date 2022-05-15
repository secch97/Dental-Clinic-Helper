-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para paginagerenciales
CREATE DATABASE IF NOT EXISTS `paginagerenciales` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `paginagerenciales`;

-- Volcando estructura para tabla paginagerenciales.citas
CREATE TABLE IF NOT EXISTS `citas` (
  `citas_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plandetratamientos_id` int(10) unsigned NOT NULL,
  `User_id` int(10) unsigned NOT NULL,
  `fechaCita` date NOT NULL,
  `horaCita` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionCita` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `abonoCita` double(8,2) NOT NULL DEFAULT '0.00',
  `saldoCita` double(8,2) NOT NULL,
  `estadoCita` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`citas_id`),
  KEY `citas_plandetratamientos_id_foreign` (`plandetratamientos_id`),
  KEY `citas_user_id_foreign` (`User_id`),
  CONSTRAINT `citas_plandetratamientos_id_foreign` FOREIGN KEY (`plandetratamientos_id`) REFERENCES `plandetratamientos` (`plandetratamientos_id`),
  CONSTRAINT `citas_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.citas: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` (`citas_id`, `plandetratamientos_id`, `User_id`, `fechaCita`, `horaCita`, `descripcionCita`, `abonoCita`, `saldoCita`, `estadoCita`) VALUES
	(1, 1, 1, '2020-04-20', '8:00 A.M a 10:00 A.M', 'Limpieza general', 12.00, 0.00, 3),
	(2, 2, 1, '2020-04-22', '8:00 A.M a 10:00 A.M', 'Piezas 2-2, 2-3', 36.00, 0.00, 3),
	(3, 3, 1, '2020-04-20', '8:00 A.M a 10:00 A.M', 'OV 3-8', 15.00, 30.00, 3),
	(4, 3, 1, '2020-04-22', '8:00 A.M a 10:00 A.M', 'OM 2-8,\r\nOD 1-7', 30.00, 0.00, 3),
	(5, 5, 1, '2020-04-22', '10:00 A.M a 12:00 M.D', 'Control mensual', 38.00, 722.00, 3),
	(6, 5, 1, '2020-05-20', '10:00 A.M a 12:00 M.D', 'Control mensual', 38.00, 684.00, 3),
	(7, 6, 1, '2020-04-22', '8:00 A.M a 10:00 A.M', 'Pieza 2-1', 12.00, 12.00, 3),
	(8, 6, 1, '2020-04-29', '10:00 A.M a 12:00 M.D', 'Pieza 2-2', 12.00, 0.00, 3),
	(9, 7, 1, '2020-04-20', '03:00 P.M a 05:00 P.M', 'Limpieza general', 12.00, 0.00, 3),
	(10, 9, 1, '2020-04-26', '01:00 P.M a  03:00 P.M', 'Exodoncia a pieza 3-2', 12.00, 0.00, 3),
	(11, 8, 1, '2020-05-04', '01:00 P.M a  03:00 P.M', 'Realizar a pieza 1-1', 45.00, 0.00, 3),
	(12, 4, 1, '2020-04-28', '8:00 A.M a 10:00 A.M', 'Pieza 2-4', 12.00, 0.00, 3);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;

-- Volcando estructura para tabla paginagerenciales.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.migrations: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2019_08_18_163229_create_roles_table', 1),
	(3, '2019_08_18_163230_create_users_table', 1),
	(4, '2020_04_13_174830_create_pacientes_table', 1),
	(5, '2020_04_14_160000_create_tratamientos_table', 1),
	(6, '2020_04_17_180000_create_plandetratamientos_table', 1),
	(7, '2020_04_19_140000_create_citas_table', 1),
	(8, '2020_04_25_201400_create_reservacitas_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla paginagerenciales.pacientes
CREATE TABLE IF NOT EXISTS `pacientes` (
  `paciente_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombrePaciente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edadPaciente` int(11) NOT NULL,
  `direccionPaciente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoFijoPaciente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoMovilPaciente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacionesPaciente` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`paciente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.pacientes: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`paciente_id`, `nombrePaciente`, `edadPaciente`, `direccionPaciente`, `telefonoFijoPaciente`, `telefonoMovilPaciente`, `observacionesPaciente`) VALUES
	(2, 'Alba Esmeralda Villatoro', 56, 'Jardines del Pepeto 3, Pje 4, Casa 12 D', '22907922', '71034936', 'Paciente posee hipertensión arterial'),
	(3, 'Javier Isaac Melara Lopez', 21, 'Prados de Venecia 4', '22900671', '60557871', 'Paciente aparentemente sano'),
	(4, 'Mauricio Saca', 26, 'Soyapango, San Salvador', '22909090', '74422222', 'Paciente aparentemente sano'),
	(5, 'José David Ascencio Iraheta', 23, 'Ilopango, San Salvador', '22777777', '76968344', 'Paciente aparentemente sano'),
	(6, 'Saúl Ernesto Castillo Chamagua', 22, 'Soyapango, San Salvador', '22901865', '74422219', 'No presenta complicaciones de salud');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;

-- Volcando estructura para tabla paginagerenciales.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla paginagerenciales.plandetratamientos
CREATE TABLE IF NOT EXISTS `plandetratamientos` (
  `plandetratamientos_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paciente_id` int(10) unsigned NOT NULL,
  `tratamiento_id` int(10) unsigned NOT NULL,
  `User_id` int(10) unsigned NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costoTotal` double(8,2) NOT NULL,
  `abonoTratamiento` double(8,2) NOT NULL DEFAULT '0.00',
  `saldoTratamiento` double(8,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `fechaCreacionTratamiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`plandetratamientos_id`),
  KEY `plandetratamientos_paciente_id_foreign` (`paciente_id`),
  KEY `plandetratamientos_tratamiento_id_foreign` (`tratamiento_id`),
  KEY `plandetratamientos_user_id_foreign` (`User_id`),
  CONSTRAINT `plandetratamientos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`paciente_id`),
  CONSTRAINT `plandetratamientos_tratamiento_id_foreign` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamientos` (`tratamiento_id`),
  CONSTRAINT `plandetratamientos_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.plandetratamientos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `plandetratamientos` DISABLE KEYS */;
INSERT INTO `plandetratamientos` (`plandetratamientos_id`, `paciente_id`, `tratamiento_id`, `User_id`, `descripcion`, `cantidad`, `costoTotal`, `abonoTratamiento`, `saldoTratamiento`, `estado`, `fechaCreacionTratamiento`) VALUES
	(1, 2, 2, 1, 'Limpieza dental general', 1, 12.00, 12.00, 0.00, 2, '2020-04-26 20:10:59'),
	(2, 2, 1, 1, 'Pieza 2-2,\r\nPieza 2-3', 2, 36.00, 36.00, 0.00, 2, '2020-04-26 20:11:38'),
	(3, 2, 3, 1, 'OD 1-7,\r\nOM 2-8,\r\nOV 3-8', 3, 45.00, 45.00, 0.00, 2, '2020-04-26 20:12:29'),
	(4, 2, 5, 1, 'Pieza 2-4', 1, 12.00, 12.00, 0.00, 2, '2020-04-26 20:12:58'),
	(5, 3, 8, 1, 'Ortodoncia general', 1, 760.00, 76.00, 684.00, 1, '2020-04-26 21:00:21'),
	(6, 4, 5, 1, 'Pieza 2-1, 2-2', 2, 24.00, 24.00, 0.00, 2, '2020-04-26 21:07:49'),
	(7, 4, 2, 1, 'Limpieza General', 1, 12.00, 12.00, 0.00, 2, '2020-04-26 21:08:04'),
	(8, 5, 7, 1, 'Pieza 1-1', 1, 45.00, 45.00, 0.00, 2, '2020-04-26 21:12:43'),
	(9, 5, 5, 1, 'Pieza 3-2', 1, 12.00, 12.00, 0.00, 2, '2020-04-26 21:15:52');
/*!40000 ALTER TABLE `plandetratamientos` ENABLE KEYS */;

-- Volcando estructura para tabla paginagerenciales.reservacitas
CREATE TABLE IF NOT EXISTS `reservacitas` (
  `reservaCitas_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_id` int(10) unsigned NOT NULL,
  `telefonoReservaCita` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `direccionReservaCita` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fechaReservaCita` date NOT NULL,
  `horaReservaCita` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionReservaCita` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoReservaCita` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`reservaCitas_id`),
  KEY `reservacitas_user_id_foreign` (`User_id`),
  CONSTRAINT `reservacitas_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.reservacitas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservacitas` DISABLE KEYS */;
INSERT INTO `reservacitas` (`reservaCitas_id`, `User_id`, `telefonoReservaCita`, `direccionReservaCita`, `fechaReservaCita`, `horaReservaCita`, `descripcionReservaCita`, `estadoReservaCita`) VALUES
	(1, 7, '22901865', 'Soyapango, San Salvador', '2020-05-09', '03:00 P.M a 05:00 P.M', 'Dolor de muelas.', 3);
/*!40000 ALTER TABLE `reservacitas` ENABLE KEYS */;

-- Volcando estructura para tabla paginagerenciales.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `Role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auxiliar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`Role_id`, `nombre_rol`, `auxiliar`) VALUES
	(1, 'Administrador', 'Administrador'),
	(2, 'Usuario', 'Usuario');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla paginagerenciales.tratamientos
CREATE TABLE IF NOT EXISTS `tratamientos` (
  `tratamiento_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreTratamiento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costoTratamiento` double(8,2) NOT NULL,
  PRIMARY KEY (`tratamiento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.tratamientos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tratamientos` DISABLE KEYS */;
INSERT INTO `tratamientos` (`tratamiento_id`, `nombreTratamiento`, `costoTratamiento`) VALUES
	(1, 'Obturación de resina', 18.00),
	(2, 'Profilaxis', 12.00),
	(3, 'Obturación de amalgama', 15.00),
	(4, 'Corona de Porcelana', 75.00),
	(5, 'Exodoncia', 12.00),
	(6, 'Protesis parcial fija', 225.00),
	(7, 'Formadentina', 45.00),
	(8, 'Tratamiento de ortodoncia', 760.00),
	(9, 'Extracción dental', 15.00),
	(10, 'Chequeo dental', 10.00);
/*!40000 ALTER TABLE `tratamientos` ENABLE KEYS */;

-- Volcando estructura para tabla paginagerenciales.users
CREATE TABLE IF NOT EXISTS `users` (
  `User_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Role_id` int(10) unsigned NOT NULL DEFAULT '2',
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_id`),
  UNIQUE KEY `users_usuario_unique` (`usuario`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`Role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`Role_id`) REFERENCES `roles` (`Role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla paginagerenciales.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`User_id`, `Role_id`, `nombre`, `usuario`, `email`, `email_verified_at`, `password`, `estado`, `remember_token`, `fecha_creacion`) VALUES
	(1, 1, 'Gabriela Peña', 'Gabriela63', 'info.miramontedental@gmail.com', NULL, '$2y$10$UtUKCcVBpe246FV1qlGrtuMsyL2LqPvU9EjgAADTFVqnggB7oS5r.', 1, NULL, '2020-04-19 15:31:53'),
	(4, 1, 'Ricardo Urrutia', 'Ricardo84', 'ricardo.urrutia@gmail.com', NULL, '$2y$10$UILdEuOOf5eltR.pql4DT.B1zsAhnImx4mI.LHGwrHjYayPQGaQmy', 1, NULL, '2020-04-26 19:40:32'),
	(5, 1, 'Vanessa Morataya', 'DraMorataya88', 'vanessa.morataya@gmail.com', NULL, '$2y$10$lv8AegGPs6pcnmA4sKmtled24uMqIqCO2JInQmgvnNm5U1ivsIHEe', 1, NULL, '2020-04-26 19:41:08'),
	(6, 1, 'Ever Argelio Reyes Reyes', 'EverPayne', 'everargelio@gmail.com', NULL, '$2y$10$P9PUkpeefnYT3soqadkT4eS0uOkPSCQCGnWMS6Tee7LpJ4CVh2D8i', 1, NULL, '2020-04-26 21:54:08'),
	(7, 2, 'Saúl Ernesto Castillo Chamagua', 'secch97', 'secch97@gmail.com', NULL, '$2y$10$FAV6CnsVxaWcs4jte613eeVyn9PJN.lO2s0Sm7mPqFekh/nmRyqTy', 1, 'vtE9B21Fu0sQb7nZfcAGuesnFdDIIhHKWq25MbkVuBZdBkrpHn9EVgP2ZGaa', '2020-05-09 09:19:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para disparador paginagerenciales.validacion
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `validacion` BEFORE UPDATE ON `citas` FOR EACH ROW BEGIN
	IF NEW.SALDOCITA < 0 THEN
		SET NEW.ABONOCITA=NEW.ABONOCITA+NEW.SALDOCITA; 
		SET NEW.SALDOCITA=0;
	END IF;
	IF NEW.ABONOCITA<0 THEN
		SET NEW.ABONOCITA=0;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
