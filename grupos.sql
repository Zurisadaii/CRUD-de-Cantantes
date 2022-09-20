-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table grupos.miembrosg
CREATE TABLE IF NOT EXISTS `miembrosg` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre_Integrante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre_Grupo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Compania` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edad` int(2) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Genero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lugar_Nacimiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rol_Grupo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Debut` year(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table grupos.miembrosg: ~18 rows (approximately)
/*!40000 ALTER TABLE `miembrosg` DISABLE KEYS */;
INSERT INTO `miembrosg` (`ID`, `Nombre_Integrante`, `Nombre_Grupo`, `Foto`, `Compania`, `Edad`, `Fecha_Nacimiento`, `Genero`, `Lugar_Nacimiento`, `Rol_Grupo`, `Debut`) VALUES
	(1, 'Kim Namjoon', 'BTS', 'Kim Namjoon.jpg', 'HYBE', 26, '1994-09-12', 'Masculino', 'Seoul, Corea del Sur', 'LÃ­der', '2013'),
	(2, 'Min Yoongi', 'BTS', 'Min YoongiBTS.jpg', 'HYBE', 28, '1993-03-09', 'Masculino', 'Daegu, Corea del Sur', 'Rapero principal', '2013'),
	(3, 'Lisa', 'Blackpink', 'LisaBlackpink.jpg', 'YG', 23, '1997-03-07', 'Femenino', 'Buri Ram, Tailandia', 'Rapera', '2016'),
	(4, 'Jisoo', 'Blackpink', 'JisooBlackpink.jpg', 'YG', 26, '1995-01-03', 'Femenino', 'Gunpo, Corea del Sur', 'Vocalista principal', '2016'),
	(5, 'Lee Minhyuck', 'BtoB', 'Lee MinhyuckBtoB.jpg', 'Cube Entertainment', 30, '1990-11-29', 'Masculino', 'Seoul, Corea del Sur', 'Rapero', '2012'),
	(6, 'Hwang Hyunjin', 'Stray Kids', 'Hwang HyunjinStray Kids.jpg', 'JYP', 21, '2000-03-20', 'Masculino', 'Seoul, Corea del Sur', 'Rapero', '2017'),
	(7, 'Kim Hongjoong', 'Ateez', 'Kim HongjoongAteez.jpg', 'KQ', 22, '1998-11-07', 'Masculino', 'Anyang, Corea del Sur', 'LÃ­der', '2018'),
	(8, 'Song Mingi', 'Ateez', 'Song MingiAteez.jpg', 'KQ', 21, '1999-08-09', 'Masculino', 'Bucheon, Corea del Sur', 'Rapero principal', '2018'),
	(9, 'Hwasa', 'Mamamoo', 'HwasaMamamoo.jpg', 'RBW', 25, '1995-07-23', 'Femenino', 'Jeonju, Corea del Sur', 'Rapera', '2014'),
	(10, 'Wheein', 'Mamamoo', 'WheeinMamamoo.jpg', 'RBW', 26, '1995-04-17', 'Femenino', 'Jeonju, Corea del Sur', 'Vocalista principal', '2014'),
	(11, 'Solar', 'Mamamoo', 'SolarMamamoo.jpg', 'RBW', 30, '1991-02-21', 'Femenino', 'Seoul, Corea del Sur', 'Vocalista principal', '2014'),
	(13, 'Moonbyul', 'Mamamoo', 'MoonbyulMamamoo.jpg', 'RBW', 28, '1992-12-22', 'Femenino', 'Bucheon, Corea del Sur', 'Rapera principal', '2014'),
	(14, 'Choi San', 'Ateez', 'Choi SanAteez.jpg', 'KQ', 21, '1999-07-10', 'Masculino', 'Namhae-gun, Corea del Sur', 'BailarÃ­n Principal', '2018'),
	(15, 'Park Jimin', 'BTS', 'Park JiminBTS.jpg', 'HYBE', 25, '1995-10-13', 'Masculino', 'Busan, Corea del Sur', 'Vocalista principal', '2013'),
	(16, 'Na Jaemin', 'NCT', 'Na JaeminNCT.jpg', 'SM', 20, '2000-08-13', 'Masculino', 'Jeonju, Corea del Sur', 'Rapero', '2016'),
	(17, 'Lucas', 'NCT', 'LucasNCT.jpg', 'SM', 22, '1999-01-25', 'Masculino', 'Sha Tin, Hong Kong', 'Rapero', '2018'),
	(18, 'Choi Yeonjun', 'TXT', 'Choi YeonjunTXT.jpg', 'HYBE', 21, '1999-09-13', 'Masculino', 'Seoul, Corea del Sur', 'Rapero principal', '2019'),
	(19, 'Huening Kai', 'TXT', 'Huening KaiTXT.jpg', 'HYBE', 19, '2002-08-14', 'Masculino', 'HawÃ¡i, Estados Unidos', 'Vocalista', '2019');
/*!40000 ALTER TABLE `miembrosg` ENABLE KEYS */;

-- Dumping structure for table grupos.tgrupos
CREATE TABLE IF NOT EXISTS `tgrupos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `N_Miembros` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table grupos.tgrupos: ~8 rows (approximately)
/*!40000 ALTER TABLE `tgrupos` DISABLE KEYS */;
INSERT INTO `tgrupos` (`ID`, `Nombre`, `Foto`, `N_Miembros`) VALUES
	(1, 'BTS', 'BTS.jpg', 7),
	(2, 'Blackpink', 'Blackpink.jpg', 4),
	(3, 'BtoB', 'Btob.jpeg', 6),
	(4, 'Stray Kids', 'Stray Kids.jpg', 8),
	(5, 'Mamamoo', 'Mamamoo.jpeg', 4),
	(6, 'Ateez', 'Ateez.jpeg', 8),
	(9, 'NCT', 'NCT.png', 23),
	(10, 'TXT', 'TXT.jpg', 5),
	(12, 'Got7', 'Got7.jpg', 7);
/*!40000 ALTER TABLE `tgrupos` ENABLE KEYS */;

-- Dumping structure for table grupos.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table grupos.usuarios: ~3 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`Id`, `usuario`, `password`) VALUES
	(1, 'holi', '69238a34919b3152907e4c30b9610cb6'),
	(10, 'holi', '69238a34919b3152907e4c30b9610cb6'),
	(13, 'ateez', 'ffd55ccc6b23bd002b8a9692e5622907'),
	(14, 'ateez2', '5e74128febf298c9a8a5f5bd8338a3b9');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
