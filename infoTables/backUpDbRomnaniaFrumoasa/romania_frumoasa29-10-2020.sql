-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: oct. 29, 2020 la 05:06 PM
-- Versiune server: 10.4.13-MariaDB
-- Versiune PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `romania_frumoasa`
--

DELIMITER $$
--
-- Proceduri
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteZona` (`id_in` INT)  BEGIN
DELETE FROM zone_turistice WHERE id=id_in;
DELETE FROM detalii_zone_turistice WHERE idparinte=id_in;
DELETE FROM top_zone WHERE idparinte=id_in;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDetails` (`nume` VARCHAR(100), `descriere` VARCHAR(500), `imagine` VARCHAR(200), `links_info` VARCHAR(200), `links_adresa` VARCHAR(200))  BEGIN
DECLARE maxId INT DEFAULT 0;
INSERT INTO zone_turistice(nume,descriere,imagine) VALUES(nume,descriere,imagine);
SELECT MAX(id) INTO maxId FROM zone_turistice;
INSERT INTO detalii_zone_turistice(idParinte, links_info, link_adresa) VALUES(maxId,links_info,links_adresa);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllImages` ()  BEGIN
SELECT z.id,z.imagine 
FROM `zone_turistice` as z 
INNER JOIN top_zone as t 
ON z.id=t.idparinte ORDER BY t.voturi DESC LIMIT 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectZona` (`id` INT)  BEGIN
SELECT z.id,z.nume,z.descriere,z.imagine,d.links_info,d.link_adresa 
FROM zone_turistice as z
LEFT JOIN detalii_zone_turistice as d
ON z.id=d.idParinte
WHERE z.id=id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateZona` (`id_in` INT, `nume` VARCHAR(200), `descriere` VARCHAR(5000), `imagine` VARCHAR(2000), `links_info` VARCHAR(5000), `link_adresa` VARCHAR(500))  BEGIN
UPDATE zone_turistice SET nume=nume,descriere=descriere,imagine=imagine WHERE id=id_in;
UPDATE detalii_zone_turistice SET links_info=links_info, link_adresa=link_adresa WHERE idparinte=id_in;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `detalii_zone_turistice`
--

CREATE TABLE `detalii_zone_turistice` (
  `id` int(11) NOT NULL,
  `idParinte` int(11) NOT NULL DEFAULT 0,
  `link_adresa` varchar(8000) NOT NULL DEFAULT '',
  `links_info` varchar(8000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `detalii_zone_turistice`
--

INSERT INTO `detalii_zone_turistice` (`id`, `idParinte`, `link_adresa`, `links_info`) VALUES
(11, 33, ' https://www.google.com/maps?q=ceahlau+locatie&sxsrf=ALeKk03RLotr2dlTgUKSDajqRLE1FBuCZg:1603918514179&biw=1920&bih=1007&um=1&ie=UTF-8&sa=X&ved=0ahUKEwjwtPOLltjsAhVltIsKHft0BDEQ_AUIDygB&safe=active', ' https://piatraneamtcity.ro/places/muntele-ceahlau-vmsybcbqfcczrq'),
(13, 35, '                                       https://www.google.com/maps?q=varful+omu&um=1&ie=UTF-8&sa=X&ved=2ahUKEwiRz5K3y9nsAhWkl4sKHQ0UCLAQ_AUoAXoECCAQAw&safe=active\r\n                   \r\n                   ', '                                       https://www.calebatuta.ro/varful-omu-un-traseu-de-relaxare/a195,https://muntii-nostri.ro/ro/routeinfo/busteni-poiana-costilei-cabana-omu\r\n                   ');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `login`
--

INSERT INTO `login` (`id`, `user_name`, `password`) VALUES
(1, 'david', 'david12');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `top_zone`
--

CREATE TABLE `top_zone` (
  `id` int(11) NOT NULL,
  `idparinte` int(11) DEFAULT 0,
  `voturi` int(11) NOT NULL DEFAULT 0,
  `observatii` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `top_zone`
--

INSERT INTO `top_zone` (`id`, `idparinte`, `voturi`, `observatii`) VALUES
(11, 33, 1, ''),
(12, 35, 2, '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `zone_turistice`
--

CREATE TABLE `zone_turistice` (
  `id` int(11) NOT NULL,
  `nume` varchar(30) NOT NULL DEFAULT '',
  `descriere` varchar(5000) NOT NULL DEFAULT '...',
  `imagine` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `zone_turistice`
--

INSERT INTO `zone_turistice` (`id`, `nume`, `descriere`, `imagine`) VALUES
(33, 'Muntele Ceahlău', ' Masivul Ceahlău este cel mai înalt din Munţii Bistriţei din grupa Carpaţilor Moldo -Transilvăneni, fiind totodată şi unul din munţii cu cea mai mare importanţă turistică din Carpaţii Orientali. Masivul Ceahlău este situat pe teritoriul judeţului Neamţ, la mică distanţă de oraşul Bicaz şi de lacul Izvorul Muntelui. Vârful său cel mai înalt este Ocolaşul Mare, cu altitudinea de 1907 m, vârful Toaca măsurând 1904 m.\r\n\r\nSunt 7 trasee turistice marcate pe Ceahlău cu grad de dificultate mediu şi mare', 'ceahlau1.jpg,ceahlau2.jpg'),
(35, 'Varful Omu2', '                                                                                                                                      Vârful Omu este locul cel mai înalt din România populat permanent. Meritul este al stației meteorologice de pe vârf, dar și al cabanei Omu, o dovada a încercării oamenilor de a înțelege natura. Lipsită de electricitate și apă, cabana este totuși o mângâiere pentru iubitorii de munte. Punct de reper, răscruce de drumuri, loc de popas, cabana Omu este la cinci-șase ore de urcuși față de Bușteni. Traseul este accesibil doar vara și este considerat de profesioniști unul din cele mai grele din masiv\r\n                   \r\n                   \r\n                   \r\n                   \r\n                   \r\n                   \r\n                   ', 'varfulOmu1.jpg,varfulOmu2.jpg');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `detalii_zone_turistice`
--
ALTER TABLE `detalii_zone_turistice`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `top_zone`
--
ALTER TABLE `top_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `zone_turistice`
--
ALTER TABLE `zone_turistice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `detalii_zone_turistice`
--
ALTER TABLE `detalii_zone_turistice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `top_zone`
--
ALTER TABLE `top_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `zone_turistice`
--
ALTER TABLE `zone_turistice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
