-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 20. bře 2016, 22:17
-- Verze serveru: 5.6.15-log
-- Verze PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `eshop`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `doprava`
--

CREATE TABLE IF NOT EXISTS `doprava` (
  `id_doprava` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`id_doprava`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `doprava`
--

INSERT INTO `doprava` (`id_doprava`, `nazev`, `cena`) VALUES
(1, 'Česká pošta', 99),
(2, 'Kurýr', 120),
(3, 'Osobně', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `dostupnost`
--

CREATE TABLE IF NOT EXISTS `dostupnost` (
  `id_dostupnost` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_dostupnosti` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_dostupnost`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `dostupnost`
--

INSERT INTO `dostupnost` (`id_dostupnost`, `nazev_dostupnosti`) VALUES
(1, 'Skladem na Eshopu'),
(2, 'Na objednání'),
(3, 'Na prodejně');

-- --------------------------------------------------------

--
-- Struktura tabulky `grafika`
--

CREATE TABLE IF NOT EXISTS `grafika` (
  `id_gpu` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_gpu` varchar(20000) COLLATE utf8_czech_ci NOT NULL,
  `pamet_gpu` int(11) NOT NULL,
  PRIMARY KEY (`id_gpu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=9 ;

--
-- Vypisuji data pro tabulku `grafika`
--

INSERT INTO `grafika` (`id_gpu`, `nazev_gpu`, `pamet_gpu`) VALUES
(1, 'Mvidia FeGorce 890E', 2),
(2, 'Mvidia FeGorce 980E', 1),
(3, 'Mvidia FeGorce TGX 9000', 6),
(4, 'AND FireFro N6000', 4),
(5, 'AND Fareon HD 5000M', 4),
(6, 'AND Fareon T3 series', 2),
(7, 'Mvidia Quatro E2000A', 2),
(8, 'Mvidia Tekra 2k', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `kategorie`
--

CREATE TABLE IF NOT EXISTS `kategorie` (
  `id_kategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_kategorie` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_kategorie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=9 ;

--
-- Vypisuji data pro tabulku `kategorie`
--

INSERT INTO `kategorie` (`id_kategorie`, `nazev_kategorie`) VALUES
(1, 'Notebook'),
(2, 'Stolní počítač'),
(3, 'Mobil'),
(4, 'Tablet');

-- --------------------------------------------------------

--
-- Struktura tabulky `objednavky`
--

CREATE TABLE IF NOT EXISTS `objednavky` (
  `id_objednavky` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `ulice` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `mesto` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `psc` int(11) NOT NULL,
  `id_obj_zbozi` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  `zbozi_mnozstvi` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  `celkova_cena` int(11) NOT NULL,
  `doprava` int(200) NOT NULL,
  `platba` int(200) NOT NULL,
  `id_zakaznika` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `datum_vytvoreni` int(11) NOT NULL,
  `stav` int(200) NOT NULL,
  PRIMARY KEY (`id_objednavky`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=15 ;

--
-- Vypisuji data pro tabulku `objednavky`
--

INSERT INTO `objednavky` (`id_objednavky`, `jmeno`, `prijmeni`, `ulice`, `mesto`, `psc`, `id_obj_zbozi`, `zbozi_mnozstvi`, `celkova_cena`, `doprava`, `platba`, `id_zakaznika`, `datum_vytvoreni`, `stav`) VALUES
(9, 'Jan', 'Šipla', 'K hájovně 231', 'Štěnovice', 33209, '1,16', '1,1', 67163, 1, 1, '1', 1456260079, 1),
(10, 'Jan', 'Šipla', 'K hájovně 231', 'Štěnovice', 33209, '18', '1', 13664, 2, 1, '1', 1456260253, 1),
(11, 'Testovací', 'Objekt', 'Americká 5', 'Plzeň', 30600, '18,6', '1,1', 33597, 1, 2, '2', 1458232613, 1),
(14, 'Testovací', 'Objekt', 'Americká 5', 'Plzeň', 30600, '29', '1', 21900, 3, 2, '2', 1458336181, 1),
(13, 'Jan', 'Šipla', 'K hájovně 231', 'Štěnovice', 33209, '1', '1', 17143, 1, 1, '1', 1458234727, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `operacni_system`
--

CREATE TABLE IF NOT EXISTS `operacni_system` (
  `id_os` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_os` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_os`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `operacni_system`
--

INSERT INTO `operacni_system` (`id_os`, `nazev_os`) VALUES
(1, 'Windows'),
(2, 'Linux'),
(3, 'Bez OS'),
(4, 'GEOS'),
(5, 'Aproid');

-- --------------------------------------------------------

--
-- Struktura tabulky `platba`
--

CREATE TABLE IF NOT EXISTS `platba` (
  `id_platba` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`id_platba`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `platba`
--

INSERT INTO `platba` (`id_platba`, `nazev`, `cena`) VALUES
(1, 'Dobírka', 45),
(2, 'Při převzetí', 0),
(3, 'Předem', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `procesor`
--

CREATE TABLE IF NOT EXISTS `procesor` (
  `id_procesoru` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_procesoru` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  `pocet_jader` int(11) NOT NULL,
  PRIMARY KEY (`id_procesoru`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=13 ;

--
-- Vypisuji data pro tabulku `procesor`
--

INSERT INTO `procesor` (`id_procesoru`, `nazev_procesoru`, `pocet_jader`) VALUES
(1, 'Itel A3', 2),
(2, 'Itel A3', 4),
(3, 'Itel A5', 2),
(4, 'Itel A5', 4),
(5, 'Itel A7', 4),
(6, 'AND E-series', 4),
(7, 'AND FK-series ', 2),
(8, 'Itel Keleron', 2),
(9, 'Itel aton', 4),
(10, 'Exynos', 1),
(11, 'DragonSnap S4', 2),
(12, 'Cortex I5', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `rozliseni_displeje`
--

CREATE TABLE IF NOT EXISTS `rozliseni_displeje` (
  `id_rozliseni` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_rozliseni` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `pocet_pixelu_x` int(11) NOT NULL,
  `pocet_pixelu_y` int(11) NOT NULL,
  PRIMARY KEY (`id_rozliseni`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `rozliseni_displeje`
--

INSERT INTO `rozliseni_displeje` (`id_rozliseni`, `nazev_rozliseni`, `pocet_pixelu_x`, `pocet_pixelu_y`) VALUES
(1, 'Full HD', 1920, 1080),
(2, 'HD Ready', 1280, 720),
(3, '4K', 4096, 2304),
(4, 'FWVVGA', 854, 480),
(5, 'WUXGA', 1920, 1200);

-- --------------------------------------------------------

--
-- Struktura tabulky `stav_objednavky`
--

CREATE TABLE IF NOT EXISTS `stav_objednavky` (
  `id_stavu` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_stavu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `stav_objednavky`
--

INSERT INTO `stav_objednavky` (`id_stavu`, `nazev`) VALUES
(1, 'Zpracování'),
(2, 'Expeduje'),
(3, 'Vyřízeno');

-- --------------------------------------------------------

--
-- Struktura tabulky `stav_zbozi`
--

CREATE TABLE IF NOT EXISTS `stav_zbozi` (
  `id_stavu` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_stavu` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_stavu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `stav_zbozi`
--

INSERT INTO `stav_zbozi` (`id_stavu`, `nazev_stavu`) VALUES
(1, 'Nové'),
(2, 'Použité'),
(3, 'Zánovní skladem');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE IF NOT EXISTS `uzivatele` (
  `ID_uzivatele` int(11) NOT NULL AUTO_INCREMENT,
  `uzivatelske_jmeno` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `heslo` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `jmeno` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `ulice` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `mesto` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `psc` int(5) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_uzivatele`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=7 ;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`ID_uzivatele`, `uzivatelske_jmeno`, `heslo`, `jmeno`, `prijmeni`, `ulice`, `mesto`, `psc`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Jan', 'Šipla', 'K hájovně 231', 'Štěnovice', 33209, 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Testovací', 'Objekt', 'Americká 5', 'Plzeň', 30600, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `vyrobce`
--

CREATE TABLE IF NOT EXISTS `vyrobce` (
  `id_vyrobce` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_vyrobce` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  `adresa_vyrobce` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  `mesto_vyrobce` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_vyrobce`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=11 ;

--
-- Vypisuji data pro tabulku `vyrobce`
--

INSERT INTO `vyrobce` (`id_vyrobce`, `nazev_vyrobce`, `adresa_vyrobce`, `mesto_vyrobce`) VALUES
(1, 'Goldmex', 'Skladová 85', 'Praha'),
(2, 'Aycer', 'Výrobní 5', 'Brno'),
(3, 'Esus', 'Fifth Avenue 852/21', 'New York, USA'),
(4, 'Lennyvo', 'Pro street 8', 'Chicago, USA'),
(5, 'Alien', 'Procesní 56', 'Plzeň'),
(6, 'Grenade Apple', 'Downtown 862/86', 'San Francisco, USA'),
(7, 'HB', 'Procesní 5', 'Praha'),
(8, 'LOL2000', 'Anděl 96', 'Praha'),
(9, 'Sunsang', 'Povstání 5', 'Praha'),
(10, 'Nosy', 'Výstavní 84', 'Brno');

-- --------------------------------------------------------

--
-- Struktura tabulky `zbozi`
--

CREATE TABLE IF NOT EXISTS `zbozi` (
  `id_zbozi` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `popis` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `image` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  `dostupnost` int(11) NOT NULL,
  `vyrobce` int(11) NOT NULL,
  `stav_zbozi` int(11) NOT NULL,
  `procesor` int(11) NOT NULL,
  `uhlopricka_displeje` double(11,0) NOT NULL,
  `rozliseni_displeje` int(11) NOT NULL,
  `operacni_system` int(11) NOT NULL,
  `operacni_pamet` int(11) NOT NULL,
  `interni_pamet` int(11) NOT NULL,
  `gpu` int(11) NOT NULL,
  `kategorie` int(11) NOT NULL,
  PRIMARY KEY (`id_zbozi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=49 ;

--
-- Vypisuji data pro tabulku `zbozi`
--

INSERT INTO `zbozi` (`id_zbozi`, `nazev`, `popis`, `cena`, `image`, `dostupnost`, `vyrobce`, `stav_zbozi`, `procesor`, `uhlopricka_displeje`, `rozliseni_displeje`, `operacni_system`, `operacni_pamet`, `interni_pamet`, `gpu`, `kategorie`) VALUES
(1, 'ESUS X88 Boost', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempor velit sit amet nisi vestibulum ac imperdiet massa tempus. Etiam ac sapien malesuada erat interdum faucibus sed quis arcu. Quisque viverra congue purus, eget ultricies arcu ullamcorper at. Morbi laoreet, eros quis faucibus tristique, erat nisl ornare urna, sed pretium ipsum orci eu ante. Curabitur quam neque, vestibulum vel fringilla venenatis, sollicitudin quis justo. Duis pulvinar imperdiet urna vitae ullamcorper. Phasellus eu lacus tellus. Ut facilisis accumsan turpis, et pellentesque lectus suscipit eget. Praesent dignissim ligula eget dolor viverra vel condimentum tortor aliquam. Sed pharetra eros nunc. In aliquam vulputate dignissim.\r\n\r\nDuis fringilla pharetra scelerisque. Quisque at nunc ullamcorper, scelerisque massa nec, convallis quam. Curabitur mattis tristique blandit. Pellentesque laoreet, libero nec viverra elementum, nibh est fermentum tortor, at elementum sapien ipsum nec est. Nam vehicula elit pharetra elit maximus, nec ultricies purus sodales. Aenean at viverra diam. Duis elementum cursus magna ac accumsan.', 16999, 'images/ntb2.jpg', 1, 3, 2, 1, 11, 2, 3, 8, 1000, 2, 1),
(16, 'GOLDMEX MONSTER II', 'Curabitur erat urna, maximus lacinia vulputate at, pharetra vel ipsum. Sed porta sodales mollis. Fusce porttitor malesuada augue ac iaculis. Mauris id enim tincidunt, tempus mauris ut, cursus turpis. Sed id bibendum ligula. Nunc sed ante lacus. Sed ornare tellus nec odio mollis, a ornare nisl pellentesque. Morbi ut gravida ante, sit amet pretium tellus. Praesent posuere erat a magna blandit, ac rutrum augue luctus. Nulla blandit nec est non consequat. Phasellus lacinia hendrerit pulvinar\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent rutrum tristique odio, in tempor augue consequat et. Curabitur quam mi, bibendum nec rutrum et, ullamcorper vel dolor. Ut quis nisl blandit neque semper fermentum ut sed nulla. Suspendisse ac purus odio. Donec gravida malesuada ipsum, ac aliquam augue fermentum quis. Ut sollicitudin tempus semper. In elementum sem sem, in gravida lacus. Maecenas tortor enim, feugiat sit amet placerat a, volutpat vitae ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec feugiat pharetra quam. Aenean vel consequat eros. Fusce imperdiet', 49999, 'images/ntb1.jpg', 1, 1, 1, 4, 17, 1, 1, 16, 1000, 1, 1),
(18, 'AYCER 420 BLAZEIT', 'Praesent ullamcorper faucibus condimentum. Cras iaculis tempor magna ac euismod. Quisque odio quam, feugiat et ligula at, fermentum ornare urna. Morbi at urna ligula. Ut iaculis risus a diam maximus porttitor. Proin ullamcorper hendrerit justo, eu eleifend dolor facilisis quis. Sed sit amet nisi at lacus auctor rutrum in vitae magna. Phasellus auctor vestibulum libero vitae tempor. Sed semper rhoncus condimentum. Nunc est tortor, sodales id ullamcorper eget, posuere cursus lorem. Ut et lectus a nisl commodo maximus. Sed elementum vitae odio in tempus. Maecenas vitae nisi ut arcu efficitur ornare. Aliquam auctor eros vel lectus auctor suscipit. Proin metus orci, eleifend eget enim porttitor, tristique gravida nisi. Suspendisse mattis interdum dui quis suscipit.\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent rutrum tristique odio, in tempor augue consequat et. Curabitur quam mi, bibendum nec rutrum et, ullamcorper vel dolor. Ut quis nisl blandit neque semper fermentum ut sed nulla. Suspendisse ac purus odio. Donec gravida malesuada ipsum, ac aliquam augue fermentum quis. Ut sollicitudin tempus semper. In elementum sem sem, in gravida lacus. Maecenas tortor enim, feugiat sit amet placerat a, volutpat vitae ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec feugiat pharetra quam. Aenean vel consequat eros. Fusce imperdiet', 13499, 'images/ntb3.jpg', 1, 2, 1, 4, 19, 2, 3, 6, 500, 1, 1),
(4, 'Lennyvo Z580 Office', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempor velit sit amet nisi vestibulum ac imperdiet massa tempus. Etiam ac sapien malesuada erat interdum faucibus sed quis arcu. Quisque viverra congue purus, eget ultricies arcu ullamcorper at. Morbi laoreet, eros quis faucibus tristique, erat nisl ornare urna, sed pretium ipsum orci eu ante. Curabitur quam neque, vestibulum vel fringilla venenatis, sollicitudin quis justo. Duis pulvinar imperdiet urna vitae ullamcorper. Phasellus eu lacus tellus. Ut facilisis accumsan turpis, et pellentesque lectus suscipit eget. Praesent dignissim ligula eget dolor viverra vel condimentum tortor aliquam. Sed pharetra eros nunc. In aliquam vulputate dignissim.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent rutrum tristique odio, in tempor augue consequat et. Curabitur quam mi, bibendum nec rutrum et, ullamcorper vel dolor. Ut quis nisl blandit neque semper fermentum ut sed nulla. Suspendisse ac purus odio. Donec gravida malesuada ipsum, ac aliquam augue fermentum quis. Ut sollicitudin tempus semper. In elementum sem sem, in gravida lacus. Maecenas tortor enim, feugiat sit amet placerat a, volutpat vitae ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec feugiat pharetra quam. Aenean vel consequat eros. Fusce imperdiet', 18999, 'images/ntb5.jpg', 2, 4, 1, 2, 11, 1, 1, 6, 1000, 3, 1),
(17, 'AYCER APIRINE U571', 'Proin hendrerit lacinia aliquam. Nullam finibus justo ut sapien maximus, a vestibulum enim semper. Nulla lobortis efficitur leo, sed tincidunt lorem. Nullam non vestibulum ante, ut rutrum erat. Sed leo sapien, semper at pellentesque at, gravida a felis. Duis ultricies aliquet metus, at tempor mi pretium et. Sed cursus magna at dapibus suscipit.\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent rutrum tristique odio, in tempor augue consequat et. Curabitur quam mi, bibendum nec rutrum et, ullamcorper vel dolor. Ut quis nisl blandit neque semper fermentum ut sed nulla. Suspendisse ac purus odio. Donec gravida malesuada ipsum, ac aliquam augue fermentum quis. Ut sollicitudin tempus semper. In elementum sem sem, in gravida lacus. Maecenas tortor enim, feugiat sit amet placerat a, volutpat vitae ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec feugiat pharetra quam. Aenean vel consequat eros. Fusce imperdiet', 12999, 'images/ntb2.jpg', 1, 2, 2, 1, 18, 2, 3, 4, 500, 5, 1),
(6, 'AYCER ASPIRINE U581', 'Mauris interdum ut tortor ut dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris commodo metus in odio ultrices rutrum. Nulla placerat diam a metus ullamcorper, ut hendrerit massa tempus. Donec euismod semper rutrum. Donec placerat imperdiet nunc, sit amet ultrices leo luctus a. Vivamus malesuada tellus at lectus feugiat commodo. Mauris at semper massa, ut tincidunt tellus. ', 19999, 'images/ntb3.jpg', 1, 2, 1, 6, 11, 1, 2, 8, 1000, 5, 1),
(7, 'ALIENCARE V2', 'In quis rhoncus augue, vel porttitor enim. Ut at orci mollis leo consectetur lacinia. Nam ut mollis enim, non molestie ligula. Donec neque odio, facilisis eu mi nec, suscipit aliquet augue. Fusce felis ante, interdum in leo nec, pretium bibendum tellus. Suspendisse eu sapien erat. Sed a elit et dui fringilla semper. Nullam eget ante lectus. Nullam mollis libero leo, sodales hendrerit lacus rutrum et. Nulla facilisis sed ligula ac bibendum. Pellentesque rutrum ante nisi, sed scelerisque ipsum pretium at.', 32999, 'images/ntb4.jpg', 3, 5, 1, 5, 17, 3, 3, 16, 1500, 4, 1),
(8, 'ALIENCARE HYPERBEAST 360', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum placerat, risus accumsan cursus tristique, erat libero fringilla velit, at pulvinar sem urna eu urna. Sed dignissim sagittis luctus. Nam tempus, sem nec placerat pulvinar, risus justo porta turpis, eget fermentum dolor ex ut quam. Mauris sed posuere enim, vel euismod nisl. Proin eleifend mi vitae nisi pretium varius. Proin consequat turpis a nunc dictum, ac vehicula nisi venenatis. Sed eget bibendum nisi. Curabitur eget dolor dolor.', 45999, 'images/ntb5.jpg', 3, 5, 1, 6, 15, 1, 3, 16, 1500, 4, 1),
(29, 'G_Apple 6f', 'Donec semper lectus sollicitudin bibendum facilisis. Proin vitae enim rhoncus, scelerisque nibh nec, facilisis nisl. Donec faucibus, lacus ac finibus rhoncus, erat augue malesuada arcu, nec sagittis libero dui eu odio. Donec leo dolor, rhoncus eget mauris et, varius porta libero. Suspendisse sed arcu tempus urna finibus condimentum. Aenean dapibus lacus quis nulla finibus, in faucibus magna porttitor. Maecenas et felis laoreet, facilisis turpis nec, fermentum tellus. Sed bibendum nunc non massa blandit, vitae egestas ante pharetra. ', 21900, 'images/mobil3.jpg', 1, 6, 1, 10, 4, 3, 4, 2, 64, 7, 3),
(19, 'ESUS EXTREME COMFORT', 'Vestibulum rutrum varius varius. Morbi a luctus dui, nec vestibulum nulla. Sed sed leo eget metus rhoncus gravida. Maecenas ac tellus sed ligula pellentesque varius. In maximus ligula nibh, a commodo lacus mollis ac. Aliquam erat volutpat. Etiam egestas, sem in dapibus elementum, ante magna vestibulum arcu, nec aliquet tortor ex eget lectus. Proin et massa vestibulum, aliquam quam vitae, laoreet ex. Cras a posuere neque.', 16999, 'images/ntb4.jpg', 2, 3, 3, 2, 15, 2, 1, 8, 1000, 6, 1),
(27, 'HB ProDuo 359', 'Morbi eget tortor nec erat luctus molestie in nec nibh. Etiam pharetra varius sapien id maximus. Nam hendrerit tortor ac laoreet convallis. Nunc aliquam ultricies odio, non efficitur massa feugiat vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ipsum est, elementum eget sollicitudin quis, hendrerit bibendum urna. Cras ac ex ut massa sagittis sollicitudin vel ac neque. Sed urna urna, rhoncus id sollicitudin et, pharetra quis nibh. Aliquam semper justo ligula, quis pulvinar massa laoreet at. Pellentesque venenatis sodales turpis, in congue elit venenatis in.', 15990, 'images/pc5.jpg', 1, 7, 2, 6, 17, 3, 1, 8, 1000, 5, 2),
(10, 'GOLDMEX ASIIMOV AWP', 'Nunc eu ante feugiat, commodo risus a, cursus arcu. Aenean ultrices diam ac laoreet porttitor. Duis ornare rhoncus nisl pretium egestas. Vestibulum porta odio quis mollis venenatis. Quisque vel fermentum leo, sit amet laoreet urna. Duis ac urna id turpis blandit suscipit. Nam id vulputate urna, eu lacinia dui.', 25000, 'images/ntb1.jpg', 1, 1, 1, 1, 11, 1, 1, 16, 1000, 1, 1),
(26, 'Lennyvo S50', 'Aenean sit amet orci ullamcorper, sodales est ac, congue felis. Nullam hendrerit, ex nec lobortis consectetur, dui leo malesuada diam, vel faucibus magna risus sagittis nunc. Praesent lacinia fermentum lacus, eget placerat tortor consectetur a. Suspendisse potenti. Donec ac pellentesque enim. Nullam ac lorem consequat, ullamcorper ligula fermentum, dignissim elit. Ut ac dapibus arcu, at molestie libero.', 6499, 'images/mobil1.jpg', 1, 4, 1, 10, 5, 2, 5, 2, 16, 7, 3),
(28, 'ESUS FenFone', 'Nullam accumsan, elit in mattis tempus, leo erat commodo sem, eget sollicitudin velit augue et tellus. Sed ullamcorper ligula sit amet varius placerat. Nam sed semper nunc. Nunc imperdiet tortor neque, non tincidunt lorem accumsan non. Nulla augue nisl, consequat quis commodo at, suscipit eget felis. Suspendisse at euismod nisl, ac efficitur leo. Nulla id risus accumsan orci aliquet porttitor. Nullam in magna gravida, faucibus magna non, cursus felis. Phasellus eu nunc enim. Aenean a vehicula risus, in semper ipsum. Nulla eget dictum ligula. Phasellus luctus fringilla fermentum.', 2750, 'images/mobil2.jpg', 1, 3, 1, 12, 4, 4, 5, 1, 8, 8, 3),
(11, 'Lennyvo Z690', 'Sed libero lacus, convallis in dui vel, posuere tincidunt lectus. Maecenas id est elit. Suspendisse non purus vel tortor feugiat luctus. Suspendisse porttitor luctus mi bibendum eleifend. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum scelerisque mauris a tristique. Sed elementum purus placerat, tristique nibh id, mattis erat.', 12499, 'images/ntb2.jpg', 2, 4, 2, 5, 15, 2, 1, 4, 500, 6, 1),
(24, 'G-EPL Airbus 650', 'In nunc felis, dictum ac volutpat mollis, consequat eget massa. Nullam vehicula consectetur dignissim. Quisque eu risus lacus. Curabitur sapien enim, tempus sed luctus vitae, lobortis nec erat. Nullam convallis odio in aliquam mattis. Aliquam interdum urna eget lacus tristique dignissim. Pellentesque egestas diam ex, nec gravida purus aliquet posuere. Ut in sodales lacus. In nibh est, tristique ac pulvinar vel, viverra ut ex. Integer vitae malesuada mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis quam venenatis.', 29900, 'images/pc2.jpg', 2, 6, 1, 5, 17, 3, 4, 16, 1500, 6, 2),
(25, 'GOLDMEX Monster IV', 'Nulla euismod risus mauris, sed euismod justo ullamcorper vel. Praesent nisl arcu, iaculis ac eleifend sed, varius sed urna. Nunc et posuere est, vel congue velit. Sed leo nunc, luctus blandit ex at, mollis pulvinar massa. Pellentesque facilisis pretium ex vitae pellentesque. Donec consequat nisi nec risus consequat posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 16900, 'images/pc3.jpg', 1, 1, 1, 4, 19, 3, 1, 8, 1000, 4, 2),
(12, 'G-EPL PIE Next-gen', 'Nullam semper nibh at convallis ornare. Duis aliquet metus id tortor egestas, eu mollis lectus hendrerit. Vestibulum tincidunt nisl quis venenatis efficitur. Phasellus pharetra augue eu facilisis semper. Praesent et consequat diam, sit amet volutpat nulla. Etiam maximus velit vitae blandit gravida. Suspendisse in turpis eget lorem egestas finibus a a quam. Nam auctor libero at tortor condimentum varius at a metus.', 99999, 'images/ntb3.jpg', 3, 6, 1, 5, 13, 1, 4, 16, 1000, 3, 1),
(22, 'Aycer Veriton B263E', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus eget massa sed risus mollis dapibus tincidunt a odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar eleifend metus sit amet rutrum. Curabitur imperdiet auctor iaculis. Curabitur egestas rhoncus urna. Suspendisse pretium justo felis. Suspendisse vestibulum aliquet mattis.', 11900, 'images/pc7.jpg', 2, 2, 1, 2, 19, 3, 2, 4, 750, 2, 2),
(23, 'Alien 420 MLG', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras a magna interdum, finibus lacus ac, auctor diam. Nullam lacinia risus vel consectetur posuere. Duis et elit id metus mollis elementum id et libero. Pellentesque vel accumsan diam. Nullam et ante mi. Proin sed egestas justo. Donec id dolor tempor, sagittis mi vitae, egestas justo. Maecenas porta, quam sed semper vulputate, augue ipsum molestie elit, id luctus urna metus ut tortor. Morbi commodo, erat sed fermentum scelerisque, magna erat sodales risus, mollis rhoncus leo erat id diam.', 19900, 'images/pc1.jpg', 1, 5, 3, 5, 17, 1, 3, 8, 750, 5, 2),
(20, 'G-EPL OG GUSH', 'Ut velit orci, commodo eget dolor ut, venenatis egestas augue. Cras lobortis, mi eu semper convallis, massa sem volutpat lacus, vitae aliquet eros elit sed ex. Nulla tristique ligula nisi, ut aliquam orci sollicitudin eget. Nunc ac ipsum in augue pellentesque ornare eleifend vel elit. Praesent porttitor et risus sed tempor. Donec lacinia elementum ex quis lacinia. In nec lacus lectus.', 52999, 'images/ntb5.jpg', 2, 6, 1, 0, 17, 1, 4, 16, 1500, 5, 1),
(13, 'Alien X15 D2', 'Vivamus porta erat nec ipsum efficitur sagittis. Ut congue lobortis convallis. Phasellus non suscipit mauris. Duis fermentum, lacus sed rhoncus pellentesque, felis nisi vestibulum nulla, quis maximus nisl risus sit amet orci. Donec nec tristique ipsum. Donec a arcu sagittis, varius nunc ut, sodales ligula. Morbi porttitor sapien massa, eu cursus mi mattis sit amet.', 41900, 'images/pc5.jpg', 1, 5, 1, 5, 17, 1, 1, 16, 1500, 3, 2),
(21, 'LOL2000', 'Nam posuere maximus urna et tristique. Sed eget sodales enim. Maecenas tristique ligula vel rutrum efficitur. Donec vulputate orci odio, accumsan porta odio lacinia eu. Phasellus quis fermentum leo, et luctus orci. Nunc et dolor in tellus fringilla elementum ut sed nibh. Pellentesque tempus nulla ultricies pretium feugiat. Morbi dignissim venenatis eros, vitae aliquam augue fringilla sed. Fusce sit amet posuere mauris, at tristique mauris. ', 27900, 'images/pc6.jpg', 1, 8, 1, 3, 19, 3, 1, 8, 1000, 2, 2),
(14, 'Lennyvo Xin-Xan', 'Donec efficitur condimentum eros id semper. Curabitur libero lacus, dapibus vel ullamcorper et, laoreet eu ipsum. Aliquam lacinia turpis lacus, nec iaculis purus vulputate vel. Nam non leo eget diam iaculis vehicula eu facilisis dui. Cras sed velit nec felis faucibus maximus. Mauris luctus, diam quis vehicula placerat, tellus enim ultrices sem, sed auctor arcu risus vitae elit. Proin mi ex, dapibus eget magna molestie, feugiat posuere quam.', 15999, 'images/ntb4.jpg', 1, 4, 2, 4, 15, 2, 1, 6, 500, 4, 1),
(5, 'AYCER 360 T', 'Nam pharetra orci sed dapibus sodales. Praesent porttitor dapibus neque sed tincidunt. Suspendisse aliquet, nisl quis rutrum feugiat, tellus metus viverra nunc, at sodales augue lectus sed velit. Vestibulum sollicitudin dapibus enim nec commodo. Nam tempor nunc a tellus elementum, ut tempus dui venenatis. Etiam malesuada neque nec nisi blandit, non rhoncus justo convallis. Fusce aliquam pharetra tortor id scelerisque.', 19900, 'images/pc3.jpg', 1, 2, 1, 3, 17, 2, 1, 4, 500, 3, 2),
(9, 'Lennyvo Ikea', 'Maecenas vel tellus viverra orci mattis commodo. Maecenas lacinia augue non ipsum scelerisque fermentum. Ut laoreet velit pulvinar augue facilisis facilisis. Duis porta ipsum id lacus pulvinar eleifend. Nulla scelerisque lorem non mollis ultrices. Vestibulum ut erat id elit elementum congue. Pellentesque interdum nulla vitae turpis facilisis, sed porta leo tristique.', 11900, 'images/pc6.jpg', 2, 4, 3, 1, 19, 3, 3, 8, 750, 2, 2),
(15, 'AYCER PRO CALCULATOR', 'Nulla et urna eu dolor ultrices interdum semper nec massa. Cras nec felis elementum felis mattis pulvinar vitae sed mi. Vivamus at nisl scelerisque urna rutrum aliquam eget vel nunc. Suspendisse potenti. Donec porttitor euismod sem sed porta. Proin ac neque efficitur, sodales libero eget, elementum lacus. Phasellus condimentum elit id enim ullamcorper tincidunt. In ultrices leo ac feugiat vulputate.', 23499, 'images/ntb5.jpg', 1, 2, 3, 3, 19, 1, 3, 8, 1000, 3, 1),
(2, 'HB 380 P2', 'Integer accumsan at velit at iaculis. Nullam eu metus ac felis molestie porta. Proin neque odio, maximus in arcu eu, pretium feugiat ipsum. Cras eros magna, venenatis eu finibus et, laoreet tempus lacus. Nullam feugiat tincidunt ante, bibendum vestibulum risus aliquet ac. Mauris condimentum maximus est, at viverra magna ultricies in. Morbi eget magna sed elit pellentesque ornare. Nunc viverra maximus lacus, sed placerat ante. Duis pretium quam sem, at sagittis sem egestas sed. Aliquam a purus a ante consectetur rhoncus eu sit amet justo. ', 12900, 'images/pc1.jpg', 2, 7, 1, 5, 17, 2, 1, 16, 1000, 3, 2),
(3, 'ESUS N23DC', ' Nam eget sagittis dui, eu varius libero. Morbi sit amet tristique purus. Cras posuere sapien eget lorem malesuada ullamcorper. Nullam id dui risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam bibendum dolor nec tincidunt aliquet.', 25900, 'images/pc2.jpg', 3, 3, 1, 5, 19, 2, 1, 8, 750, 5, 2),
(31, 'G_Apple 5 Minus', 'Etiam interdum aliquam efficitur. In at fringilla turpis, a efficitur purus. Aliquam eu lectus venenatis, tincidunt eros sit amet, semper risus. Donec facilisis ac augue a auctor. Vestibulum sit amet volutpat leo, in pharetra elit. Donec quis mi quis leo blandit ultrices a sit amet est. Phasellus posuere ullamcorper nibh. Fusce vestibulum arcu at tellus porta, ut ultrices nunc congue. Sed ut magna non metus pretium pharetra. Nullam et dignissim ante. Curabitur ac velit non sem faucibus sagittis ac eu quam. Sed dictum commodo volutpat.', 22500, 'images/mobil4.jpg', 2, 6, 1, 11, 6, 1, 4, 2, 32, 7, 3),
(32, 'Sunsang Galaxy 6S', 'Duis aliquet, nisi nec dignissim lobortis, turpis nisi hendrerit lectus, suscipit cursus mauris nulla sit amet arcu. Sed ex massa, aliquet in porta et, vehicula in urna. Duis condimentum sollicitudin justo non porta. Maecenas odio mi, rutrum in elit hendrerit, rhoncus vehicula lorem. Nam nec semper elit, iaculis dapibus velit. Ut facilisis eget ipsum eget dictum. Aenean tristique tellus non accumsan elementum. Donec sit amet mi arcu. Cras eget ipsum non tellus consectetur ultricies. Integer bibendum cursus mi, id condimentum ex ultricies sed.', 22599, 'images/mobil5.jpg', 1, 9, 1, 12, 5, 2, 5, 3, 64, 8, 3),
(33, 'Sunsang 4S', 'Fusce lacus nulla, condimentum sed eleifend et, porttitor a ligula. Aliquam tempor, mauris sit amet sollicitudin dignissim, nulla massa auctor ante, quis finibus turpis libero eget turpis. Suspendisse varius molestie augue, quis tristique ipsum faucibus sit amet. Maecenas ac mauris metus. ', 4900, 'images/mobil6.jpg', 1, 9, 1, 12, 4, 2, 5, 2, 8, 8, 3),
(34, 'Sunsang 5S Meo', 'Fusce lacus nulla, condimentum sed eleifend et, porttitor a ligula. Aliquam tempor, mauris sit amet sollicitudin dignissim, nulla massa auctor ante, quis finibus turpis libero eget turpis. Suspendisse varius molestie augue, quis tristique ipsum faucibus sit amet. Maecenas ac mauris metus. ', 9500, 'images/mobil7.jpg', 1, 9, 1, 10, 5, 1, 5, 2, 16, 7, 3),
(35, 'Nosy Pxeria S3', 'Aliquam libero lacus, viverra vitae lacus eu, accumsan pulvinar eros. In hac habitasse platea dictumst. Mauris sed turpis id magna volutpat iaculis at eget justo. Praesent id massa justo. Proin iaculis rutrum ex a dictum. Ut semper lacinia elit, a elementum nulla malesuada eget. Phasellus nunc risus, efficitur id lacus vitae, elementum lacinia eros. Nam sit amet ligula neque. Nunc eu dui cursus, dapibus felis a, mollis elit. Aliquam erat volutpat. Sed faucibus facilisis leo, id tincidunt enim. Aliquam elit augue, eleifend vel gravida sit amet, interdum eu orci. ', 10500, 'images/mobil8.jpg', 1, 10, 1, 11, 5, 2, 5, 2, 16, 8, 3),
(36, 'Nosy Akua N4 ', 'Nam euismod sed metus quis cursus. Sed at laoreet est, at maximus ante. Aliquam quis enim nisl. Nulla facilisi. Duis tortor justo, semper sed nisi elementum, luctus fringilla urna. Ut risus turpis, luctus eu urna a, dignissim tincidunt lectus. Cras feugiat nibh in dui facilisis, eu sollicitudin elit mattis. Nulla lacinia, purus a lacinia pellentesque, justo ante pharetra tortor, eget tincidunt turpis libero at ante. Maecenas odio augue, egestas sit amet ligula id, convallis vulputate neque. In faucibus rhoncus est in suscipit. Curabitur gravida volutpat massa.', 6190, 'images/mobil9.jpg', 2, 10, 1, 10, 5, 2, 5, 2, 8, 7, 3),
(37, 'ESUS FenFone 2 ZE', 'In dapibus quam quis nibh posuere tincidunt. Suspendisse commodo nisi ac elit sollicitudin sollicitudin. Aenean efficitur ac felis sed viverra. Aliquam euismod odio ultrices nisl tincidunt, eu laoreet mauris luctus. Nam nulla risus, porttitor a consectetur ac, tincidunt vitae nulla. Pellentesque nec mi et nulla vestibulum dapibus at scelerisque nisi. Aliquam erat volutpat. Sed vestibulum turpis massa, sagittis scelerisque dolor bibendum vitae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce finibus dictum nibh.', 9990, 'images/mobil10.jpg', 2, 3, 1, 10, 5, 1, 5, 4, 64, 8, 3),
(38, 'Lennyvo Goya Tablet 2', 'Nullam nibh justo, eleifend eu eleifend id, pulvinar sed mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus ultricies convallis ligula in condimentum. Aenean ac sagittis mi, nec accumsan elit. Duis in lorem ac erat tincidunt cursus ac ut metus. Nullam pellentesque nibh sit amet ante ornare, ut faucibus felis cursus. Phasellus in bibendum ipsum. Curabitur vel sapien vitae dui tempus volutpat. In quis imperdiet massa, eget molestie erat. Proin vitae ultricies erat. Mauris id augue sem. Morbi vel lorem nec mi rhoncus ultrices. Sed laoreet pellentesque libero id rhoncus. ', 3999, 'images/tablet1.jpg', 3, 4, 2, 9, 8, 5, 1, 2, 32, 8, 4),
(39, 'Sunsang Galagy Tab 2S', 'Maecenas vitae leo ipsum. Cras a laoreet neque. Aenean pharetra sed mauris elementum faucibus. Nunc laoreet fermentum orci, vel tempor dui tempor id. Nunc posuere non ligula vitae pharetra. Nullam interdum mollis elementum. Vestibulum vel ante in tellus consequat blandit. Curabitur rhoncus, odio id sodales lacinia, orci turpis rutrum lorem, et elementum tortor dolor sit amet massa. Quisque convallis urna lorem. Nulla sodales, sem sit amet pharetra lobortis, nisl nibh condimentum justo, vitae commodo arcu odio vitae mauris. Etiam non orci in justo tristique pharetra eget in sem. ', 13999, 'images/tablet2.jpg', 1, 9, 1, 1, 9, 5, 5, 3, 32, 8, 4),
(40, 'G_PAD Water', 'Proin ut tincidunt nulla, ut sagittis ex. Sed ultrices libero sed felis aliquam, hendrerit sodales sem fermentum. Nullam ut nulla suscipit, semper velit in, venenatis metus. Curabitur commodo, lacus et mattis tempus, eros dolor lacinia orci, in elementum nisi enim et lorem. Integer purus ligula, commodo quis nisl vel, tristique ullamcorper magna. Ut ut varius odio. Cras ut auctor sapien, at pulvinar mi. Vestibulum nec faucibus dui. Proin id tellus in velit rhoncus scelerisque eu sit amet ipsum. Ut massa velit, lobortis vitae tortor pellentesque, convallis condimentum mi. Nulla maximus mollis nisl, in lobortis est interdum eget. Vestibulum ac risus leo. Nam vestibulum vel magna eget iaculis.', 9999, 'images/tablet3.jpg', 1, 6, 1, 2, 10, 1, 4, 2, 16, 7, 4),
(41, 'Esus FenPad 2', 'Sed ornare, velit tempor ornare elementum, urna mauris aliquam augue, eu consequat massa dolor vel lectus. Aenean volutpat purus ac erat mollis convallis. Cras diam nibh, vulputate a laoreet eu, efficitur vehicula nunc. Donec vel quam id augue elementum laoreet et vitae risus. Sed volutpat pretium ante, at congue nisi convallis id. Donec eu ipsum vestibulum, facilisis nulla sed, iaculis magna. Sed vel metus iaculis nulla ullamcorper dapibus. Aenean ullamcorper aliquet enim, et cursus tortor lobortis id. Nulla ipsum nisl, blandit et quam sed, rhoncus hendrerit erat. Nunc sed iaculis libero. Ut a risus ligula. Fusce vitae rhoncus mi. ', 5999, 'images/tablet4.jpg', 3, 3, 2, 8, 10, 2, 5, 2, 16, 7, 4),
(42, 'HB Pro x2', 'Donec quis odio laoreet, dignissim orci sed, interdum elit. Curabitur dapibus mi in magna faucibus, a mattis ante consequat. Nam pretium lacus lacus, tincidunt porttitor magna varius non. Nam eu ante urna. Pellentesque feugiat enim turpis, eu iaculis augue commodo lobortis. Phasellus elementum ligula nulla, et vehicula risus dignissim vel. Nam suscipit nulla vulputate elit ultricies, at placerat diam tempus. Aenean pharetra auctor ex pulvinar blandit. ', 27999, 'images/tablet5.jpg', 2, 7, 1, 2, 12, 3, 1, 4, 128, 8, 4),
(43, 'Nosy Pxeria 4Z', 'Phasellus vitae pretium arcu. Sed dui felis, congue vitae diam a, suscipit condimentum turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent eget imperdiet est. Phasellus commodo sagittis urna ac dapibus. Maecenas quis sem bibendum, tincidunt purus eu, pellentesque orci. Mauris non pulvinar elit, sit amet malesuada neque. Aenean molestie felis condimentum, tempus metus nec, interdum nibh. Maecenas ut tempor nisl. Phasellus dignissim nibh libero, a imperdiet lacus faucibus volutpat. Etiam iaculis risus id neque varius, id blandit odio ornare. Duis eget rhoncus nisi, at hendrerit ipsum. Nam vitae est nibh. Praesent suscipit odio id molestie ornare. Quisque in imperdiet tortor. ', 19999, 'images/tablet1.jpg', 1, 10, 1, 1, 10, 1, 5, 3, 32, 8, 4),
(44, 'G_PAD Water Mini', 'Mauris suscipit fermentum scelerisque. Sed eu fringilla dolor. Nam dui velit, fermentum id risus id, malesuada ornare neque. Maecenas maximus mi quis dui suscipit faucibus. Nam eu venenatis velit, ut convallis mauris. In scelerisque purus vel elementum pharetra. Mauris dignissim consectetur varius. Sed a nibh tincidunt, eleifend nunc id, vestibulum nunc. Proin ac blandit nisl. Mauris scelerisque elementum semper. Curabitur lobortis ligula eu erat cursus, eget placerat est auctor. Nulla vulputate odio diam, vel fermentum magna imperdiet et. Vivamus vitae aliquam neque, sit amet consectetur dolor. Aliquam et massa non sem interdum dictum. Donec ac nulla velit. ', 7500, 'images/tablet2.jpg', 1, 6, 1, 8, 8, 2, 4, 2, 16, 7, 4),
(45, 'Lennyvo PadThink ', 'Nullam nibh justo, eleifend eu eleifend id, pulvinar sed mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus ultricies convallis ligula in condimentum. Aenean ac sagittis mi, nec accumsan elit. Duis in lorem ac erat tincidunt cursus ac ut metus. Nullam pellentesque nibh sit amet ante ornare, ut faucibus felis cursus. Phasellus in bibendum ipsum. Curabitur vel sapien vitae dui tempus volutpat. In quis imperdiet massa, eget molestie erat. Proin vitae ultricies erat. Mauris id augue sem. Morbi vel lorem nec mi rhoncus ultrices. Sed laoreet pellentesque libero id rhoncus. ', 26990, 'images/tablet3.jpg', 1, 4, 1, 2, 10, 1, 1, 4, 128, 8, 4),
(46, 'HB Pro x2 612', 'Cras quis pharetra nunc. Duis nec justo interdum turpis tincidunt blandit. Integer bibendum vel metus vel venenatis. Mauris pretium vestibulum urna, eget imperdiet sapien blandit non. Cras faucibus libero sed ex ultrices, a accumsan tortor lacinia. Mauris sit amet pulvinar est, eget gravida nisl. Aenean consequat porttitor ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce hendrerit sed tellus id luctus. Morbi pretium mattis ex ut eleifend. Donec volutpat felis et augue vulputate porta. ', 36999, 'images/tablet4.jpg', 2, 7, 1, 2, 12, 1, 1, 8, 256, 8, 4),
(47, 'Lennyvo TabIdea B8', 'Nullam nibh justo, eleifend eu eleifend id, pulvinar sed mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus ultricies convallis ligula in condimentum. Aenean ac sagittis mi, nec accumsan elit. Duis in lorem ac erat tincidunt cursus ac ut metus. Nullam pellentesque nibh sit amet ante ornare, ut faucibus felis cursus. Phasellus in bibendum ipsum. Curabitur vel sapien vitae dui tempus volutpat. In quis imperdiet massa, eget molestie erat. Proin vitae ultricies erat. Mauris id augue sem. Morbi vel lorem nec mi rhoncus ultrices. Sed laoreet pellentesque libero id rhoncus. ', 3999, 'images/tablet5.jpg', 1, 4, 1, 9, 8, 5, 1, 1, 16, 8, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
