-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para hotel_sureste
CREATE DATABASE IF NOT EXISTS `hotel_sureste` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `hotel_sureste`;

-- Volcando estructura para tabla hotel_sureste.administradores
CREATE TABLE IF NOT EXISTS `administradores` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `pass` varchar(50) COLLATE utf8_bin NOT NULL,
  `tel` varchar(50) COLLATE utf8_bin NOT NULL,
  `cargo` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla hotel_sureste.administradores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` (`id_administrador`, `nombre`, `email`, `pass`, `tel`, `cargo`) VALUES
	(1, 'Jesús Francisco Gómez López', 'chuzzgomez18@gmail.com', '123456', '9191178737', 'Gerente');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;

-- Volcando estructura para tabla hotel_sureste.habitaciones
CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8_bin NOT NULL,
  `ocupacion` int(10) NOT NULL,
  `disponible` int(10) NOT NULL,
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla hotel_sureste.habitaciones: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `habitaciones` DISABLE KEYS */;
INSERT INTO `habitaciones` (`id_habitacion`, `tipo`, `ocupacion`, `disponible`) VALUES
	(1, 'suite-01', 6, 1),
	(2, 'suite-02', 6, 1),
	(3, 'suite-03', 6, 1),
	(4, 'doble-01', 4, 1),
	(5, 'doble-02', 4, 1),
	(6, 'doble-03', 4, 1),
	(7, 'doble-04', 4, 1),
	(8, 'doble-05', 4, 1),
	(9, 'sencillo-01', 2, 1),
	(10, 'sencillo-02', 2, 1),
	(11, 'sencillo-03', 2, 1),
	(12, 'sencillo-04', 2, 1),
	(13, 'sencillo-05', 2, 1),
	(14, 'sencillo-06', 2, 1),
	(15, 'sencillo-07', 2, 1);
/*!40000 ALTER TABLE `habitaciones` ENABLE KEYS */;

-- Volcando estructura para tabla hotel_sureste.mensajes
CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `tel` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `mensaje` blob NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla hotel_sureste.mensajes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` (`id_mensaje`, `cliente`, `tel`, `email`, `mensaje`) VALUES
	(15, 'Francisco', '9191335566', 'francisco@gmail.com', _binary 0x6e6a387a4c567470556157314a4e4273446179424a334f6966702b5947704841703935566c787457653872722f6f6c51654a536c684475707376746d4f615377776274444a3152525369333973646d4473724638546432785650737550626d50485979767278434e6378755048312f4874486d704136694a4944777a644b3031356c4b436e544d30556e4a576e722f666a375855326e7a736f3545754e77414d50534236356f5a55614949443349747050586a795468456b67677835315579476f664f6d4e5a435866656953777364766a576a30337749687258646b6969424f65316f71455a3072435146324e4b5766397a4274306a4665685a766c73366d57595153696a74396c6a4f4e53374a6d36704e6d4c4f3673656f674555425936484c6951797a3343554655795648552b51452b65734a546e4e6e3542626e467552476977567174315762746c3279554a566a48464d5766756f726242504b7a4c4e37674c66754663464c53315a48715061724754635142614762774b684e56744247562f4b355575696d6258654e4e3345395173767a56514b766e485a657a3641773049533270776d44745a336265556e474a6344684b6c6635443746377874436d7648704537307763397a2f66785679424b30356a775541446574383565354d6f434139664c6f33522b2b77685059424969305036386635595745505a524773357471516247616645512f73686e7256614354387a4a456a34527a6363426b6f6e704457735236342f2f7173774d38375634684a74556f6e4956346b626d484849725630574f6e7277344c6b6e78774d684d51584f65456144424b3544384365706c3746654543732f323851646d703449332b39474974596b56762b624433587a64524e61547756464351624963645a5352545a794a35565979535a674b2f5262794635505a4f347133413d),
	(19, 'Marce', '9191114455', 'marce@gmail.com', _binary 0x496b6f4f36316e4e562f39346f6e4d4d6d69635a417943317a6772376b734b732f71544c6d5a515a456c5a6e696e4e45794355436f6a41376172744f62727a5344684d75685a4147674856365765646b7538667343444531413578754a653842754f3034734f57544243355650623137557376716c382b524f51624645652b4c68647534694348443154395658306c5a324d3841415358424d756d666b43544d2f6563547254593572456556546b65474e51614963516a5a555a6c626f78495738797150332b4e50555250474b2b6c6f31692f6c506d753571644555506b54757253314f4a51597343596b6a65704d49456e53693047315872726e496331616631505455627946715647744a2b546b486d6e62684a2f4a32304e7244744e4663457a6d79477a356f334d74774f30323877392f3565746c7a425741487169486a53436b776a7a5443742b64324330616a34482b663167723670557a7130714445314c6a344d6772534e2b4f6a7553712b4d325143766d464e714b52724970664c626953626f37374a2b6f4776353854656b34432f323965766e2b4c7834726e71572b5670524766334d72324c794d4466536477444f446c66794437584f4375666442484442654a5331722f687a5771547938732b61685a4a5233365a4b664a2f3147745742786b6e65783538787147654a362f664c69552b4b4e6a774d2f30724449765658634d5149636a4d6b5356675a3431324b6b413675326a675a3243424b52434a346a642f7667376e68494d6456625846485965672b6134624577524d31714d39696f3237385a6e6e304f396c3279666561547262352f7435646d684a4c3832425947506e2b3742426e766658366b784d653055782b714f646a4d2b6c55746f345558626c49725877376961513957424131486f305961442b654c6b5669645634734742615a564d3d);
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;

-- Volcando estructura para tabla hotel_sureste.reservaciones
CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `dir` varchar(50) COLLATE utf8_bin NOT NULL,
  `tel` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'Ninguno',
  `pass` varchar(50) COLLATE utf8_bin NOT NULL,
  `fecha_estancia` date NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `personas` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `FK_clientes_habitaciones` (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla hotel_sureste.reservaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservaciones` ENABLE KEYS */;

-- Volcando estructura para tabla hotel_sureste.tarjetas
CREATE TABLE IF NOT EXISTS `tarjetas` (
  `id_cliente` int(11) NOT NULL,
  `num_tarjeta` blob NOT NULL,
  `fecha` blob NOT NULL,
  `codigo` blob NOT NULL,
  `postal` int(5) NOT NULL,
  KEY `FK__clientes` (`id_cliente`),
  CONSTRAINT `FK__clientes` FOREIGN KEY (`id_cliente`) REFERENCES `reservaciones` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla hotel_sureste.tarjetas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;

-- Volcando estructura para tabla hotel_sureste.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(500) COLLATE utf8_bin NOT NULL,
  `dir` varchar(500) COLLATE utf8_bin NOT NULL,
  `tel` varchar(500) COLLATE utf8_bin NOT NULL,
  `email` varchar(500) COLLATE utf8_bin NOT NULL,
  `pass` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla hotel_sureste.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `usuario`, `dir`, `tel`, `email`, `pass`) VALUES
	(3, 'Nicodemo Pérez López', 'Ocosingo. Centro', '9191002277', 'fed1b8113448b40cb08ed26dbc03253b7bb186f664f1263200315182e1ba381790591557b1c1f8f364866576dee0a228f6c0bdf251ba7f122e0ebd27718b45f4', '$2y$10$TVbs9x8ST6TdT0MlbNkXu.HC9WTxGI6lRA6Lrs8o58.EeqW2/8Yry'),
	(10, 'Adrián Diaz López', 'Ocosingo', '9191336655', '5515093cffececc74a4d86d3a96a2954ff5d7d0e3d47a195a8842809e0b06ad58bd4685bc9f6bc66fb95c144c56203fb34f727397081ef4df9f41d835db6976d', '$2y$10$glVp0powYA.MoFj4eT59ueOo06lCq3UpPPCUVh6tHAcj3acO9g4Gq');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
