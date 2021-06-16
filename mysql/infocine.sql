-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: vm12.db.swarm.test
-- Tiempo de generación: 10-05-2020 a las 14:05:34
-- Versión del servidor: 10.4.12-MariaDB-1:10.4.12+maria~bionic
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infocine`
--
CREATE DATABASE IF NOT EXISTS `infocine` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `infocine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `coste` int(3) NOT NULL,
  `duracion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`tipo`, `coste`, `duracion`) VALUES
('anual', 150, 365),
('mensual', 15, 30),
('trimestral', 40, 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `idActor` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`idActor`, `nombre`, `imagen`, `fecha_nacimiento`, `nacionalidad`) VALUES
(124, 'Jung Ji-so', 'media/peliculas/jung_ji_so.jpg', '1999-09-17', 'Surcoreana'),
(125, 'Song Kang-ho', 'media/peliculas/song_kang_ho.jpg', '1967-01-17', 'Surcoreano'),
(126, 'Lee Sun-kyun', 'media/peliculas/lee_sun_kyun.jpg', '1975-03-02', 'Surcoreano'),
(127, 'Cho Yeo-jeong', 'media/peliculas/cho_yeo_jeong.jpg', '1981-02-10', 'Surcoreana'),
(128, 'Choi Woo-shik', 'media/peliculas/choi_woo_shik.jpg', '1990-03-26', 'Surcoreano'),
(129, 'Park So-dam', 'media/peliculas/park_so_dam.jpg', '1991-09-08', 'Surcoreana'),
(140, 'Emma Stone', 'media/peliculas/emma_stone.jpg', '1988-11-06', 'USA'),
(141, 'Ryan Gosling', 'media/peliculas/ryan_gosling.jpg', '1980-11-12', 'USA'),
(142, 'Rosemarie Dewit', 'media/peliculas/rosemarie_dewit.jpg', '1971-10-27', 'USA'),
(150, 'Joaquin Phoenix', 'media/peliculas/joaquin_phoenix.jpg', '1974-10-28', 'PuertoRico'),
(151, 'Robert De Niro', 'media/peliculas/robert_de_niro.jpg', '1943-08-17', 'USA'),
(152, 'Zazie Beetz', 'media/peliculas/zazie_beetz.jpg', '1991-06-01', 'DE'),
(153, 'Robert Downey Jr', 'media/peliculas/robert_downey_jr.jpg', '1965-04-04', 'USA'),
(154, 'Tom Holland', 'media/peliculas/tom_holland.jpg', '1996-01-06', 'UK'),
(155, 'Chris Hemsworth', 'media/peliculas/chris_hemsworth.jpg', '1983-11-08', 'AUS'),
(156, 'Scarlett Johansson', 'media/peliculas/scarlett_johansson.jpg', '1984-11-22', 'USA'),
(157, 'Chris Evans', 'media/peliculas/chris_evans.jpg', '1981-06-13', 'USA'),
(158, 'Elizabeth Olsen', 'media/peliculas/elizabeth_olsen.jpg', '1989-02-16', 'USA'),
(159, 'Brad Pitt', 'media/peliculas/brad_pitt.jpg', '1963-12-18', 'USA'),
(160, 'Christoph Waltz', 'media/peliculas/christoph_waltz.jpg', '1956-10-04', 'AUS'),
(161, 'Mélanie Laurent', 'media/peliculas/melanie_laurent.jpg', '1983-02-21', 'FR'),
(162, 'Daniel Brühl', 'media/peliculas/daniel_bruhl.jpg', '1978-06-16', 'ESP'),
(163, 'Christian Bale', 'media/peliculas/christian_bale.jpg', '1974-01-30', 'Ingles'),
(164, 'Heath Ledger', 'media/peliculas/heath_ledger.jpg', '1979-04-04', 'Australian'),
(165, 'Gary Oldman', 'media/peliculas/gary_oldman.jpg', '1958-03-21', 'Ingles'),
(166, 'Michael Caine', 'media/peliculas/michael_caine.jpg', '1933-03-14', 'Ingles'),
(167, 'Logan Lerman', 'media/peliculas/logan_lerman.jpg', '1992-01-19', 'USA'),
(168, 'Shia Labeouf', 'media/peliculas/shia_labe.jpg', '1986-06-11', 'USA'),
(169, 'John Bernthal', 'media/peliculas/john_bern.jpg', '1976-09-20', 'USA'),
(170, 'Sarah Michelle Gellar ', 'media/peliculas/sarah_michelle.jpg', '1977-04-14', 'USA'),
(171, 'Takako Fuji', 'media/peliculas/takako_fuji.jpg', '1972-07-27', 'Japonesa'),
(172, 'Yuya Ozeki', 'media/peliculas/yuya_ozeki.jpg', '1996-06-05', 'Japonesa'),
(173, 'Bradley Cooper', 'media/peliculas/bradley_cooper.jpg', '1975-01-05', 'USA'),
(174, 'Zach Galifianakis', 'media/peliculas/zach_galia.jpg', '1969-10-01', 'USA'),
(175, 'Ed Helms', 'media/peliculas/ed_helms.jpg', '1974-01-24', 'USA'),
(176, 'Justin Bartha', 'media/peliculas/justin_bartha.jpg', '1978-07-21', 'USA'),
(177, 'Johnny Depp', 'media/peliculas/johnny_depp.jpg', '1963-06-09', 'USA'),
(178, 'Christina Ricci', 'media/peliculas/christina_ricci.jpg', '1980-02-12', 'USA'),
(179, 'Christopher Walken', 'media/peliculas/christopher_walken.jpg', '1943-03-31', 'USA'),
(180, 'Rachel McAdams', 'media/peliculas/rachel_mcadams.jpg', '1978-11-17', 'Canada'),
(181, 'James Garner', 'media/peliculas/james_garner.jpg', '1928-04-07', 'USA'),
(182, 'Gena Rowlands', 'media/peliculas/gena_rowlands.jpg', '1930-06-19', 'USA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actuacion`
--

CREATE TABLE `actuacion` (
  `id_actor` int(10) NOT NULL,
  `id_pelicula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `personaje` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actuacion`
--

INSERT INTO `actuacion` (`id_actor`, `id_pelicula`, `personaje`) VALUES
(125, 'parasitos2019', 'Ki-taek'),
(128, 'parasitos2019', 'Ki-Woo'),
(129, 'parasitos2019', 'Ki-Jung'),
(126, 'parasitos2019', 'Mr. Park'),
(127, 'parasitos2019', 'Yeon-Kyo'),
(124, 'parasitos2019', 'Da-Tye'),
(140, 'lalaland2016', 'Mia'),
(141, 'lalaland2016', 'Sebastian'),
(142, 'lalaland2016', 'Laura'),
(150, 'Joker2019', 'Joker'),
(151, 'Joker2019', 'Murray Franklin'),
(152, 'Joker2019', 'Sophie Dumond'),
(158, 'infinityWar2018', 'Bruja Escarlata'),
(157, 'infinityWar2018', 'Capitán América'),
(156, 'infinityWar2018', 'Viuda Negra'),
(155, 'infinityWar2018', 'Thor'),
(154, 'infinityWar2018', 'Spider-man'),
(153, 'infinityWar2018', 'Iron-man'),
(162, 'malditosbastardos200', 'Frederik Zoller'),
(161, 'malditosbastardos200', 'Shoshanna Dreyf'),
(160, 'malditosbastardos200', 'Hans Landa'),
(159, 'malditosbastardos200', 'Teniente Aldo R'),
(164, 'DarkNight', 'El joker'),
(163, 'DarkNight', 'Batman/Bruce Wayne'),
(165, 'DarkNight', 'Inspector Gordon'),
(166, 'DarkNight', 'Alfred'),
(159, 'CorazonesAcero', 'Sargento Collier'),
(169, 'CorazonesAcero', 'Grady Travis'),
(167, 'CorazonesAcero', 'Norman Ellison'),
(168, 'CorazonesAcero', 'Boyd Swan'),
(171, 'elgrito', 'Kayako Saeki'),
(170, 'elgrito', 'Karen Davis'),
(172, 'elgrito', 'Toshio Saeki'),
(173, 'TheHangout', 'Phil'),
(174, 'TheHangout', 'Alan'),
(175, 'TheHangout', 'Stuart'),
(176, 'TheHangout', 'Doug'),
(179, 'sleepyHollow', 'El jinete'),
(177, 'sleepyHollow', 'Ichabod Crane'),
(178, 'sleepyHollow', 'Katrina Van Tassel'),
(141, 'diarioNoa', 'Noah Jr.'),
(180, 'diarioNoa', 'Allie Hamilton'),
(181, 'diarioNoa', 'Noah Jr.'),
(182, 'diarioNoa', 'Allie Hamilton');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `idComentarioPadre` int(11) NOT NULL,
  `texto` text COLLATE utf8_spanish_ci NOT NULL,
  `idUsuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idPelicula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idComentarioPadre`, `texto`, `idUsuario`, `idPelicula`, `fecha`) VALUES
(44, 0, 'Me ha encantado esta peli', 'jaime', 'Joker2019', '2020-05-10 13:50:11'),
(45, 0, 'Demasiado bombo para lo que es en realidad, no me ha parecido para tanto...', 'jaime', 'parasitos2019', '2020-05-10 13:50:38'),
(46, 0, 'Esta peli es genial!!! Los actores lo hacen muy bien, hacen buena pareja, pero ese final tan triste me ha dolido :(', 'jaime', 'lalaland2016', '2020-05-10 13:51:30'),
(47, 0, 'Nunca me cansaré de ver esta peli, me sé las canciones de memoria ya', 'poti', 'mammamia', '2020-05-10 13:52:26'),
(48, 0, 'El oscar fue bien merecido, me alegro de que los asiáticos consigan más representación en el mundo del cine.', 'poti', 'parasitos2019', '2020-05-10 13:53:36'),
(49, 45, 'Pero que dices jaime! no tienes ni idea', 'poti', 'parasitos2019', '2020-05-10 13:54:01'),
(50, 44, 'A mí ese payaso me da bastante miedo :S', 'poti', 'Joker2019', '2020-05-10 13:54:43'),
(51, 50, 'Pero si es genial jajajaja, la escena de la entrevista es mítica tío', 'jaime', 'Joker2019', '2020-05-10 13:56:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(20) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `urlImagen` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `continente` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `titulo`, `descripcion`, `fecha`, `urlImagen`, `ciudad`, `pais`, `continente`) VALUES
(1, 'Oscars 2020', 'Este 9 de febrero Teatro Dolby de Los Ángeles, California, ha acogido la celebración de la 92° edición de los Premios Oscars 2020 y se han desvelado los nombres de los ganadores. La celebración de los Globos de Oro, conocidos como la antesala de los Oscars, ya dejó pistas sobre las películas favoritas en la carrera por la estatuilla dorada y también, de las tendencias de moda que hemos podido ver en la esperada alfombra roja. ‘Joker’, ‘1917’, ‘Érase una vez en Hollywood’ e ‘Historia de un matrimonio’ eran las mejor posicionadas tras haber logrado el mayor número de nominaciones. \'Dolor y Gloria\', de Pedro Almodóvar, fue seleccionada por la Academia de Hollywood como semifinalista para competir por el Oscar a la mejor película de habla no inglesa. Almodóvar ya tiene dos premios Oscar por \'Todo sobre mi madre\' (1999) y \'Hable con ella\' (2002), pero este año su cinta con tintes autobiográficos, protagonizada por Antonio Banderas, ha vuelto a situarle entre los favoritos a los prestigiosos galardones.', '2020-02-09', 'media/eventos/eventooscars2020.gif', 'Los Ángeles', 'Estados Unidos', 'América'),
(2, 'Premios Forqué 2020', 'Después de tres años itinerantes en los cuales los Premios Forqué recorrieron Sevilla en el año 2017, y Zaragoza en los subsiguientes años consecutivos, la gala que premia a lo mejor de la producción cinematográfica española volverá a su sede habitual en Madrid.\r\n\r\nMadrid ha sido escenario de algunas de las películas más memorables de nuestro cine. Algunos ejemplos de ello son TESIS, la primera película de Alejandro Amenábar, ganadora del Premio Forqué 1997 o El día de la Bestía, película de Alex de la Iglesia con aquella memorable escena de Santiago Segura colgando de un cartel en la Gran Vía, o una de las pelícuñas más aclamadas de los 80, ópera Prima, de Fernando Trueba.\r\n\r\nEl evento, que significará el aniversario número 25 de los Premios Forqué, se llevará a cabo en el Palacio de Congresos de la capital española el próximo 11 de enero de 2020, donde se premiará a lo mejor del cine español en 8 categorías, entre las que se incluye una dedicada al cine latinoamericano.', '2020-01-11', 'media/eventos/forque2020.jpg', 'Madrid', 'España', 'Europa'),
(3, 'España viaja a NATPE 2020', 'La temporada de mercados televisivos comienza, como siempre, con NATPE en Miami, que en este 2020 se celebrará del 21 al 23 de enero en el Fontainebleau Resort y espera recibir a más de 5.000 ejecutivos, principalmente del continente americano.\r\n\r\nUna vez más, la presencia nacional se concentrará en el stand de Audiovisual from Spain, la marca de ICEX para la internacionalización de empresas españolas. El espacio estará ubicado en el número 225 del market floor de NATPE, y acogerá a los representantes de Ártico Distribution, Atresmedia Televisión, Brands &amp; Rights 360º, Filmax International, Inside Content, Mediterráneo Mediaset España Group, Onza Distribution, RTVE y The Mediapro Studio Distribution.\r\nBrasil, China, Francia, Ghana, Japón, Corea, Turquía y Reino Unido contarán, al igual que España, con su propio pabellón en NATPE 2020. En total, la zona expositiva contará con más de 400 empresas de 70 países.\r\n\r\nSegún datos ofrecidos por la organización del mercado, el 83 por ciento de los asistentes proceden de América del Norte y Sudamérica. Y un 32 por ciento de los ejecutivos se dedican a la adquisición de contenidos. Conferencias, premios, proyecciones, reuniones y varias oportunidades de networking vertebrarán NATPE 2020, que celebra su décimo aniversario en Miami.\r\nEntre las principales novedades que el mercado español presentará en NATPE 2020 se encuentran la serie en clave de thriller ‘The Head’, dirigida por Jorge Dorado y presentada por The Mediapro Studio, y la comedia ‘Benidorm’, de Atresmedia y Plano a Plano, todavía inédita en España.\r\nTambién la segunda temporada de ‘Pequeñas coincidencias’ formará parte de la expedición española: “Esta comedia romántica se ha vendido ya en muchos territorios de todo el mundo, incluso en Rusia o los países bálticos” comenta Carlos Garde, director general de Onza Distribution.', '2020-01-21', 'media/eventos/NATPE-miami-2020.jpg', 'Miami', 'Estados Unidos', 'América'),
(4, 'Festival de Cine de Sundance 2020', 'Desde el próximo jueves 23 de enero comenzará una nueva edición del Festival de Cine de Sundance. Las películas más esperadas del 2020 harán su primera presentación en la pantalla grande. n diferentes categorías, las películas que se estrenarán este año competiran por su primer premio del año, antes de realizar su estreno comercial.\r\n\r\nEn exclusivate contamos todo lo que tienes que saber sobre el Festival de Cine de Sundance 2020.\r\n¿Cuándo se realiza el Festival de Cine de Sundance 2020?\r\n\r\nEn 2020, el Sundance Film Festival tendrá lugar del 23 de enero al 02 de febrero.\r\n¿Dónde se realiza el Festival de Cine de Sundance 2020?\r\n\r\nSe llevará a cabo en el Park City de Utah, Estados Unidos.\r\n¿Qué películas se presentan en el Festival de Cine de Sundance 2020?\r\n\r\nEl Sundance Film Festival es el Festival de Cine más importante para el cine independiente. Las películas que no están producidas por las grandes compañias compiten en Utah desde 1984.', '2020-01-23', 'media/eventos/sundance_film_festival_2020.jpg', 'Park City', 'Estados Unidos', 'América'),
(5, 'Premios Goya 2020', 'Los cortos ‘Donde nos lleve el viento’, de Juan Antonio Moreno Amador, y ‘Nuestra vida como niños refugiados en Europa’, de Silvia Venegas, han sido seleccionados por la Academia de Cine como candidatos al Premio Goya al Mejor cortometraje documental y al Premio Forqué al mejor cortometraje cinematográfico.\r\n\r\nLa Academia ha realizado una selección previa de los mejores cortometrajes documentales; son solo 10 los candidatos elegidos en esta categoría y serán finalmente cuatro los nominados en diciembre. Se trata de dos películas de la productora extremeña ‘Making Doc’, que ya ha ganado el Goya al Mejor cortometraje documental por ‘Walls’, y también ha obtenido una nominación en la misma categoría por ‘Palabras de Caramelo’.\r\n\r\n‘Donde nos lleve el viento’ está dirigida por Juan Antonio Moreno (Talavera la Real, 1982) y ya ha ganado el Premio al Mejor cortometraje documental en la Semana de Cine de Medina del Campo. Cuenta la historia de Mariam, que huye de su casa, está embarazada y busca un hogar seguro para su bebé. El viaje les ha llevado a cruzar el mar en una patera solo de mujeres hasta llegar a la ciudad fronteriza de Melilla. Este mes participará en el Festival de Huelva y en el Festival de Zaragoza.Por otra parte, ‘Nuestra vida como niños refugiados en Europa’ está dirigido por Silvia Venegas (Santa Marta, 1982) y tuvo su estreno internacional en el Tampere Film Festival de Finlandia. Narra la situación los menores refugiados que han llegado a los países europeos en la mayor crisis de refugiados que ha vivido Europa desde la Segunda Guerra Mundial. Toda una generación que ha huido de la guerra y que ahora, en vez de ser niños, tienen que enfrentarse a la burocracia, la desconfianza, la espera, la frustración, la incomprensión y el miedo. Este mes participará en el Festival de Zaragoza y en el Ficma de Barcelona.', '2020-01-25', 'media/eventos/Premios-Goya2020.jpg', 'Málaga', 'España', 'Europa'),
(6, 'Premios Feroz 2020', 'Los Premios Feroz 2020 reúnen en Alcobendas a las estrellas del cine y de las series españolas\r\n\r\nNominados como Pedro Almodóvar, Penélope Cruz, Candela Peña, Javier Cámara, Belén Cuesta, Miguel Ángel Silvestre, Álvaro Morte o Alba Flores estarán el jueves 16 de enero en Alcobendas. \r\n\r\nLa gala de los PREMIOS FEROZ® volverá a reunir a las grandes estrellas del cine y de las series españolas. La Asociación de Informadores Cinematográficos de España (AICE), que otorga los galardones, ha dado a conocer los primeros nombres de los invitados que asistirán el jueves 16 de enero al Teatro Auditorio Ciudad de Alcobendas, entre los que figuran nominados como Pedro Almodóvar, Penélope Cruz, Candela Peña, Javier Cámara, Belén Cuesta, Miguel Ángel Silvestre, Álvaro Morte o Alba Flores, además de otros actores y actrices como Paco León, Amaia Salamanca, Anna Castillo, Berto Romero, Victoria Abril, María León, Carlos Cuevas o Leonor Watling, por citar algunos. \r\n\r\nLa amplia lista de asistentes se ha dado a conocer hoy en una rueda de prensa celebrada en los cines Kinépolis Diversia de Alcobendas, en la que han participado la consejera de Cultura y Turismo de la Comunidad de Madrid, Marta Rivera de la Cruz; el alcalde de Alcobendas, Rafael Sánchez Acera; la presidenta de la AICE, María Guerra; Agustín Llorente, en representación de Kinépolis, y la presentadora de la gala de los Premios Feroz 2020, María Hervás.\r\n \r\nLa gala, que se celebrará el próximo 16 de enero en Alcobendas, cuenta con el largometraje Dolor y gloria como la cinta con mayor número de candidaturas (10). Su director, Pedro Almodóvar, que aspira a conseguir los galardones a la Mejor dirección y Mejor guion, estará presente junto al resto de nominados de la película, como Penélope Cruz y Julieta Serrano (nominadas ambas a Mejor actriz de reparto), Asier Etxeandia o Alberto Iglesias (nominado a Mejor música original). Antonio Banderas, candidato a Mejor actor protagonista, excusa su ausencia por tener función de teatro en Málaga. Y Leonardo Sbaraglia, que compite como Mejor actor de reparto, tampoco podrá asistir.\r\n\r\nLa cinta Ventajas de viajar en tren, que aspira a siete premios, contará en su delegación con su director, Aritz Moreno, quien podría alzarse con dos premios (dirección y guion). También acudirán Pilar Castro (nominada a Mejor actriz protagonista) y Quim Gutiérrez (nominado a Mejor actor de reparto).\r\n\r\nAcudirán a la gala de Alcobendas todos los nominados por la película La trinchera infinita: sus tres directores: Jon Garaño, José Mari Goenaga (coautor también del guion) y Aitor Arregi; sus protagonistas: Antonio de la Torre y Belén Cuesta, y el compositor Pascal Gaigne. También con seis nominaciones parte El Hoyo (The Platform), cuya representación estará encabezada por su director y candidato al premio, Galder Gaztelu-Urrutia, y Antonia San Juan, que opta a Mejor actriz de reparto.\r\n \r\nTambién han confirmado su asistencia Eduard Fernández, doblemente nominado como Mejor actor de reparto en una película por Mientras dure la guerra y en una serie, por Criminal: España; el director de Los días que vendrán, Carlos Marqués-Marcet, y sus protagonistas María Rodríguez Soto y David Verdaguer (nominados en sus respectivas categorías); Daniel Sánchez Arévalo, director de Diecisiete, que compite como Mejor película de comedia; Greta Fernández, que compite por el premio a la Mejor actriz por La hija de un ladrón; o Laia Marull, candidata a Mejor actriz de reparto por La inocencia.', '2020-01-16', 'media/eventos/premiosFeroz2020.jpg', 'Alcobendas, Madrid', 'España', 'Europa'),
(7, 'Medallas CEC', 'Los premios más longevos del cine español, los que otorga el Círculo de Escritores Cinematográficos (CEC), que esta edición cumplen 75 años, han coronado a Pedro Almodóvar con otros cinco galardones por \'Dolor y gloria: Mejor director, mejor película, mejor actor, mejor música y mejor guion.\r\n\r\nEn la gala, celebrada en Madrid, el Círculo de Escritores Cinematográficos otorgó su Medalla CEC de Honor por toda una carrera al actor José Sacristán. La Medalla CEC dedicada a reconocer la mejor labor de promoción del cine recayó en Nieves Peñuelas y Elena Vázquez, durante años directora y coordinadora de prensa, respectivamente, de 20th Century Fox España. La CEC a la labor periodística correspondió a Carlos Pumares, mientras la correspondiente a la Solidaridad se otorgó a la película \'Abuelos\', de Santiago Requejo.\r\n\r\nTras Pedro Almodóvar, que compartió palmarés con Antonio Banderas como mejor actor protagonista y Alberto Iglesias como compositor de la mejor música por la banda sonora original de \'Dolor y gloria\', se situó, con tres premios, Salvador Simó: mejor director novel, mejor película de animación y mejor guión adaptado del cómic de Fermín Solís, por \'Buñuel en el laberinto de las tortugas\'.\r\n\r\nMarta Nieto logró ganar como mejor actriz protagonista por su papel en \'Madre\', de Rodrigo Sorogoyen, mientras Eduard Fernández y Natalia de Molina se llevaron los galardones a los mejores secundarios en \'Mientras dure la guerra\' y \'Adiós\', respectivamente; también fue premiado el montaje de la película de Paco Cabezas, realizado por Luis de la Madrid y Miguel Ángel Trudu.Enric Auquer sigue acumulando premios, esta vez como actor revelación por su papel de narco gallego en \'Quien a hierro mata\', de Paco Plaza, al igual que la última Concha de Plata, Greta Fernández, revelación por su protagonista absoluta de \'La hija de un ladrón\'.\r\n\r\nEl documental de misterio \'El cuadro\', sobre \'Las Meninas\' de Velázquez, de Andrés Sanz, se alzó sobre sus competidores, \'Auterretrato\', \'Regresa el Cepa\' y \'Ara Malikian: una vida entre las cuerdas\'. Luis Ángel Pérez logró el galardón por la fotografía de \'El crack cero\', dirigida por José Luis Garci, que optaba también a película, director, actor y actor secundario.\r\n\r\nComo mejor obra extranjera se reconoció a la máxima competidora de Pedro Almodóvar en los Premios Oscar, \'Parásitos\', del surcoreano Bong Joon-ho, por encima de \'Joker\', \'Historia de un matrimonio\' y \'El irlandés\'.', '2020-01-20', 'media/eventos/MEDALLAS_CEC_2020.jpg', 'Madrid', 'España', 'Europa'),
(8, 'FIPADOC 2020', 'Por segundo año consecutivo, y del 21 al 26 de Enero del recién estrenado 2020, el festival FIPADOC atrae a profesionales del documental de toda Europa, tras la apuesta en 2019 de convertir el más generalista festival FIPA en un evento exclusivamente dedicado al documental de creación.\r\n\r\nCon un programa que añade nuevos premios y 14 secciones, el festival incluye, entre otras, una sección internacional, una de documental francés, y una centrada en el documental europeo, apuesta fuerte de FIPADOC para posicionarse en el circuito del continente, y que se presenta como alternativa de festivales con más presencia de producciones francesas como el imprescindible États généraux du film documentaire que se celebra en agosto en el pequeño pueblo de Lussas.\r\n\r\nCientos de profesionales acreditados se han acercado a la localidad costera, incluyendo represtantes de intituciones, televisiones, festivales, productoras y cineastas de todo el mundo; así como 100 representantes de prensa, con una amplia presencia de medios la región de Nueva Aquitania, así como de Euskal Herria.', '2020-01-21', 'media/eventos/fipadoc2020.jpg', 'Biarritz', 'Francia', 'Europa'),
(9, 'BBC Studios Showcase', 'BBC Studios Showcase 2020 presentará una variedad de los mejores talentos internacionales en el evento de cuatro días que atrae a los principales compradores de TV, productores y financieros de todo el mundo. Richard Dormer, Jodie Whittaker, Will Arnett, Stephen Merchant, Freddie Flintoff, Paddy McGuinness, Chris Harris y las estrellas de Bollywood Ishaan Khatter y Tabu son solo algunos de los talentos más importantes que se dirigirán a Liverpool (del 9-12 de febrero) para lanzar una amplia gama de nuevos programas de TV.Los mejores talentos internacionales se dirigen a Liverpool para BBC Studios Showcase 2020 En su año 44, BBC Studios Showcase es el mercado de contenido internacional más grande del mundo organizado por un solo distribuidor. Representando la creatividad británica, BBC Studios abarca financiamiento de contenido, desarrollo, producción y ventas tanto para sus propias producciones como para programas y formatos realizados por productores independientes del Reino Unido. Junto con el talento líder dentro y fuera de la pantalla, el evento acoge a creativos, comisionados, productores y los cientos de compradores que vienen a Liverpool para proyectar contenido y escuchar de primera mano sobre los programas de televisión del futuro. Paul Dempsey, presidente de Distribución Global de BBC Studios, comentó: “Esta es mi época favorita del año, cuando el BBC Group, nuestros socios independientes y ahora nuestros colegas de UKTV se unen para presentar la mejor creatividad británica a los compradores internacionales de TV que vuelan de todo el mundo para estar con nosotros. Nos acompañarán en Liverpool algunos de los nombres más importantes dentro y fuera de la pantalla en el negocio y nos burlaremos de una gama de nuevos y emocionantes programas y proyectos. &quot; La programación guionada para el Showcase de este año incluirá un primer vistazo a The North Water (SeeSaw / Rhombus Media), la adaptación de Andrew Haigh (Lean On Pete) de la novela larga de Man Booker Prize de Ian McGuire, protagonizada por Colin Farrell (Fantastic Beasts And Where To Find Them), Jack O\'Connell (Godless, Skins) y Stephen Graham (The Irishman). Richard Dormer (Game of Thrones) y Lara Rossi (Cheat) presentarán The Watch (BBC Studios / Narrativia), un nuevo drama distintivo y de alto concepto inspirado en las novelas más vendidas de Terry Pratchett. Las estrellas de Bollywood, Ishaan Khatter y Tabu, y el nuevo talento Tanya Maniktala presentarán A Suitable Boy (Lookout Point) adaptado por Andrew Davies (Pride &amp; Prejudice, War &amp; Peace) y dirigido por Mira Nair (Monsoon Wedding). Saskia Reeves (Luther) y la actriz danesa Sofie Gråbǿl (The Killing) estarán en Showcase para hablar sobre sus papeles en la agridulce y romántica adaptación de la novela de David Nicholl, Us (Drama Republic / Bandstand). Los protagonistas del provocativo thriller, We Hunt Together (BBC Studios Productions), Eve Myles (Broadchurch), Babou Ceesay (Dark Mon £ y) Dipo Ola (Inside No.9) y Hermione Corfield (Star Wars The Last Jedi) participará en una sesión que resaltará los dramas que empujan los límites del crimen, junto con la escritora Gaby Hull (Cheat). Los asistentes también recibirán noticias del Decimotercer Doctor, Jodie Whittaker, y del showrunner Chris Chibnall mientras discuten el momento actual de Doctor Who (BBC Studios Productions). Los pesos pesados de la comedia que descienden en Liverpool incluyen al actor canadiense-estadounidense Will Arnett (Arrested Development, BoJack Horseman) y el productor ejecutivo Tom Werner (Roseanne, 3rd Rock from the Sun) junto con los escritores Iain Morris y Damon Beesley (The Inbetweeners). Ellos darán a los delegados un primer vistazo de su nuevo programa The First Team (Fudge Park), una serie de seis partes que sigue las desventuras de tres jóvenes futbolistas en un club ficticio de la Premier League. El actor, escritor, director y productor de televisión, Stephen Merchant (Jojo Rabbit, The Office) estará en Showcase para lanzar su nueva comedia dramática, The Offenders (Big Talk / Four Eyes), sobre un grupo de delincuentes que prestan servicio comunitario. Habrá un primer vistazo exclusivo a una gama de contenido basado en hechos reales e innovador con programas que incluyen A Perfect Planet (Silverback Films), el próximo título de BBC Planet que ofrece nuevas perspectivas sobre la belleza y la fragilidad de la Tierra. Otros puntos destacados incluyen la nueva serie del popular Spy in the Wild (John Downer Productions) y Animal Impossible (BBC Studio Productions) con los presentadores, Tim Warwood y Adam Gendle, compartiendo cómo arriesgaron la vida y las extremidades para probar hechos sobre el animal. Reino. La colección documental premium de BBC Studios presenta talentos galardonados con programas como Putin: A Russian Spy Story (Rogan Productions) y Murder 24/7 (Expectation) que sigue a un equipo extraordinario de profesionales que trabajan para atrapar asesinos. Y, en Ciencia, habrá un primer vistazo a la serie de fenómenos naturales The Greatest Show on Earth (BBC Studios Productions). BBC Studios Showcase también dará la bienvenida a los anfitriones de Top Gear (BBC Studios Productions) Freddie Flintoff, Paddy McGuinness y Chris Harris, quienes subirán al escenario para compartir una mirada exclusiva a sus últimas aventuras de alto octanaje. Desde autos de puénting (bungee-jumping), esquivando pelotas de golf hasta aviones de combate, el trío ha regresado con una nueva dosis de caos en la nueva serie de Top Gear. Los eventos especialmente seleccionados y los foros de coproducción tendrán lugar en ACC Liverpool, donde los compradores podrán proyectar miles de horas de contenido televisivo británico.', '2020-02-09', 'media/eventos/bbc2020.jpg', 'Liverpool', 'Reino Unido', 'Europa'),
(10, 'Festival de Cine de Tribeca', 'Los organizadores del Tribeca Film Festival han decidido seleccionar la programación de su edición anual número 19 para que se presente en línea a finales de este mes, incluyendo dos cadenas abiertas al público, tras ser pospuesto su exhibición física de su fecha original.\r\n\r\nTribeca Immersive, NOW Creators Market, el centro de recursos Extranet, el programa Tribeca X y los premios del jurado y de arte procederán de manera virtual. La prensa y la industria acreditada podrán acceder a los cinco programas, mientras que el público podrá ver el contenido de Tribeca Inmersiva y Tribeca X.\r\n\r\n“Este no es el festival pospuesto”, dijo la directora del festival, Cara Cusumano, refiriéndose a la decimonovena edición anual del festival que estaba programada para realizarse del 15 al 26 de abril y que se pospuso en medio de la pandemia de Covid-19.\r\n\r\n“Esto es con lo que podríamos avanzar más inmediatamente. Nos reunimos, hablamos y colaboramos sobre un festival físico todo el tiempo, pero hasta que sepamos más sobre el orden de quedarse en casa y cuándo se abrirán los cines, será cuando realmente podamos compartir más sobre el resto del plan”.\r\n\r\n“Estamos viviendo estas circunstancias extraordinarias y sin precedentes... estamos respondiendo a los cineastas de la industria de una manera más urgente. ¿Qué podemos ofrecerles de manera más inmediata porque sabemos que este es un momento en que los cineastas de la industria realmente necesitan apoyo? Ciertamente, nosotros como festival tenemos esa experiencia; esa es la historia de origen de todo el festival: cómo un festival puede responder a un momento de crisis y el poder de la narración en ese momento”, continuó.\r\n\r\nLa directora del festival dijo que los cineastas de más del 90% de las películas que se proyectaron en el festival físico han optado por los premios del jurado. Tribeca aclarará en una fecha posterior qué películas dejaron de ser consideradas para premios.\r\n\r\nLos cinco programas en línea anunciados son:\r\n\r\nTribeca Inmersiva: \r\n\r\nEl contenido inmersivo Cinema360 estará disponible para el público y debutará en asociación con Oculus, con 15 películas de realidad virtual seleccionadas en cuatro programas de 30-40 minutos. El público podrá acceder a toda la lista de Cinema360 a través de Oculus TV, para Oculus Go y Oculus Quest. El ganador del Premio Tribeca Storyscapes 2019 The Key también estará disponible como una aplicación para Oculus Rift, Oculus Rift-S y Oculus Quest.\r\n\r\nLas selecciones provienen de todo el mundo y se clasifican en: Sueños para recordar, Diecisiete más, Kinfolk e Imaginación pura. Clic aquí para la lista completa.\r\n\r\nMercado de Creadores Tribeca NOW: \r\n\r\nLa quinta exhibición anual de nuevo trabajo en línea patrocinado por HBO se llevará a cabo del 21 al 22 de abril y presenta reuniones de video de 20 minutos entre la industria y los narradores en línea, episódicos e inmersivos (creadores de 2020 NOW Showcase, creadores de 2020 TribecaTV Pilot Season, y un adicional grupo curado de escritores / intérpretes / influencers episódicos y de realidad virtual en línea, independientes. Las empresas participantes en las reuniones virtuales incluyen Bron Studios, CNN Original Series, Gunpowder &amp; Sky y Topic Studios.\r\n\r\nCentro de recursos Extranet: \r\n\r\nEl centro albergará películas participantes disponibles para la industria acreditada y presione para ver. Los recursos incluyen información sobre disponibilidad de derechos, directorio de delegados y contactos de ventas. La Extranet alojará una biblioteca de proyección en línea de proyectos seleccionados de Tribeca 2020. El trabajo de los programas de largometrajes y cortometrajes, Tribeca NOW y Pilot Season puede optar por hacer que sus piezas estén disponibles del 15 de abril al 15 de mayo. El contenido se puede transmitir de forma segura en computadoras personales o tabletas, y todos los títulos vistos se informarán a la prensa y a los contactos de ventas.\r\n\r\nPremios del jurado: \r\n\r\nLos premios de los jurados para las categorías de largometrajes y cortometrajes serán presentados por los jurados y anunciados en tribecafilm.com dentro de la ventana de las fechas originales del festival. Los ganadores en categorías de competencia seleccionadas serán elegibles para los Premios de Arte del Festival de Cine de Tribeca.\r\n\r\nLas categorías de la competencia de largometrajes son: premios de competencia de narrativa narrativa internacional e internacional de 2020 para largometraje, actor, actriz, guión y cinematografía; Premios del concurso de largometrajes documentales 2020 por largometraje, edición y cinematografía; 2020 mejor nuevo director narrativo; Premio Albert Maysles 2020 al mejor nuevo director documental; y 2020 Nora Ephron Award. Se entregarán premios de cortometrajes para concursos de narrativa / animación, documental y estudiantes de 2020.\r\n\r\nEntre los miembros del jurado se encuentran Danny Boyle, Aparna Nancherla, Regina Hall, Yance Ford, Lucas Hedges, Pamela Adlon, Marti Noxon, Asia Kate Dillon y Sheila Nevins.\r\n\r\nTribeca X: \r\n\r\nLa competencia Tribeca X se asocia con PwC para celebrar el contenido de mejor marca contado a través de la narración. Este año, el premio celebrará el trabajo narrativo y documental en tres categorías: largometraje, cortometraje y series episódicas. Los finalistas de los Premios Tribeca X 2020 incluyen trabajos creados por Margaret Qualley, Lena Waithe, Denzel Whitaker y Olivia Wilde.', '2020-04-15', 'media/eventos/tribeca2020.jpg', 'Nueva York', 'Estados Unidos', 'América'),
(11, 'Evento extra', 'Otro evento mas', '2020-05-22', 'media/eventos/kate-winslett-81th-premios-oscar-en-el-teatro-kodak-de-los-angeles-jpgwinslettkate-winslettkate-020-020-evento-en-hollywood-life-california-evento-de-alfombra-roja-eeuu-la-industria-cinematografica-celebridades-fo.jpg', 'Madrid', 'España', 'Europa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(10) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `tipo`) VALUES
(1, 'Comedia'),
(2, 'Drama'),
(3, 'Musical'),
(4, 'Thriller'),
(5, 'Terror'),
(6, 'Infantil'),
(7, 'Romance'),
(8, 'Ciencia Ficción'),
(9, 'Acción'),
(10, 'Belicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idGrupo` int(5) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `creador` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `num_miembros` int(10) NOT NULL,
  `borrado` tinyint(1) NOT NULL,
  `tipo` enum('publico','privado') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `nombre`, `creador`, `descripcion`, `fecha_creacion`, `num_miembros`, `borrado`, `tipo`) VALUES
(0, 'Peliculas 2020', 'poti', 'Este grupo es para hablar sobre las peliculas de este año', '2020-05-09 16:13:06', 1, 0, 'publico'),
(1, 'Peliculas de los 90', 'poti', 'Este grupo es para hablar sobre las peliculas de los años 90', '2020-05-09 16:13:39', 1, 0, 'publico'),
(2, 'Peliculas de accion', 'poti', 'Aqui hablamos sobre todas las peliculas de accion', '2020-05-09 16:14:17', 1, 0, 'publico'),
(3, 'Poti\'s friends', 'poti', 'grupo para mis colegas', '2020-05-10 03:47:03', 1, 0, 'privado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `id_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_grupo` int(5) NOT NULL,
  `fecha_union` datetime NOT NULL,
  `rol` enum('propietario','moderador','usuario') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id_usuario`, `id_grupo`, `fecha_union`, `rol`) VALUES
('poti', 0, '2020-05-09 16:13:06', 'propietario'),
('poti', 1, '2020-05-09 16:13:39', 'propietario'),
('poti', 2, '2020-05-09 16:14:17', 'propietario'),
('jin', 0, '2020-05-09 16:18:04', 'usuario'),
('poti', 3, '2020-05-10 03:47:03', 'propietario'),
('jin', 3, '2020-05-10 03:47:16', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idPelicula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `anio` int(15) NOT NULL,
  `genero` int(10) NOT NULL,
  `director` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `puntuacion` double DEFAULT NULL,
  `urlTrailer` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `urlImagen` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `urlPelicula` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `titulo`, `descripcion`, `anio`, `genero`, `director`, `puntuacion`, `urlTrailer`, `urlImagen`, `urlPelicula`) VALUES
('CorazonesAcero', 'Corazones de acero', 'Abril de 1945, la guerra está a punto de acabar. Al mando del veterano sargento Wardaddy (Brad Pitt), una brigada de cinco soldados americanos a bordo de un tanque -el Fury- ha de luchar contra un ejército nazi al borde de la desesperación, pues los alemanes saben que su derrota estaba ya cantada por aquel entonces.', 2014, 8, 'David Ayer', 0, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/furyImg.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('DarkNight', 'El caballero oscuro', 'Batman/Bruce Wayne (Christian Bale) regresa para continuar su guerra contra el crimen. Con la ayuda del teniente Jim Gordon (Gary Oldman) y del Fiscal del Distrito Harvey Dent (Aaron Eckhart), Batman se propone destruir el crimen organizado en la ciudad de Gotham. El triunvirato demuestra su eficacia, pero, de repente, aparece Joker (Heath Ledger), un nuevo criminal que desencadena el caos y tiene aterrados a los ciudadanos.', 2008, 7, 'Christopher Nolan', 0, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/caballero.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('diarioNoa', 'El diario de Noa', 'En una residencia de ancianos, un hombre (James Garner) lee a una mujer (Gena Rowlands) una historia de amor escrita en su viejo cuaderno de notas. Es la historia de Noah Calhoun (Ryan Gosling) y Allie Hamilton (Rachel McAdams), dos jóvenes adolescentes de Carolina del Norte que, a pesar de vivir en dos ambientes sociales muy diferentes, se enamoraron profundamente y pasaron juntos un verano inolvidable, antes de ser separados, primero por sus padres, y más tarde por la guerra.', 2004, 16, 'Nick Cassavetes', 3, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/diarionoaImg.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('elgrito', 'El grito', 'La aparente normalidad de una modesta casa de Tokio oculta el horror que se encuentra en su interior. La casa está poseída por una violenta plaga que destruye las vidas de todos que se encuentran en ella. Esta maldición hace que sus víctimas mueran poseídas por una ira poderosa. Cada muerte causada por la maldición provoca el nacimiento de una nueva víctima, lo que hace que se propague como un virus, creando una interminable y creciente cadena de terror. Karen (Sarah Michelle Gellar) es una estudiante norteamericana de intercambio en Japón, que se ve atrapada dentro de éste círculo mortal y acaba conociendo el secreto de la maldición vengativa que ha arraigado en la casa. Ahora, debe detenerla antes de que sea demasiado tarde.', 2004, 9, 'Takashi Shimizu', 0, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/elgritoImg.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('infinityWar2018', 'Avengers: Infinity War', 'Los superhéroes se alían para vencer al poderoso Thanos, el peor enemigo al que se han enfrentado. Si Thanos logra reunir las seis gemas del infinito: poder, tiempo, alma, realidad, mente y espacio, nadie podrá detenerlo.', 2018, 5, 'Joe Russo', 5, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/infinitywarImagen.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('Joker2019', 'Joker', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro.', 2019, 1, 'Todd Phillips', 4, 'media/peliculas/JokerTrailer.mp4', 'media/peliculas/JokerImagen.jpg', 'media/peliculas/JokerPelicula.mp4'),
('lalaland2016', 'LaLaLand', 'Mia (Emma Stone), una joven aspirante a actriz que trabaja como camarera mientras acude a castings, y Sebastian (Ryan Gosling), un pianista de jazz que se gana la vida tocando en s?rdidos tugurios, se enamoran, pero su gran ambici?n por llegar a la cima en sus carreras art?sticas amenaza con separarlos.', 2016, 2, 'Damien Chazelle', 3, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/landImagen.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('malditosbastardos200', 'Malditos Bastardos', 'Es el primer año de la ocupación alemana de Francia. El oficial aliado, teniente Aldo Raine, ensambla un equipo de soldados judíos para cometer actos violentos en contra de los nazis, incluyendo la toma de cabelleras. Él y sus hombres unen fuerzas con Bridget von Hammersmark, una actriz alemana y agente encubierto, para derrocar a los líderes del Tercer Reich. Sus destinos convergen con la dueña de teatro Shosanna Dreyfus, quien busca vengar la ejecución de su familia.', 2009, 6, 'Quentin Tarantino', 5, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/malidtosbastardosImagen.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('mammamia', 'Mamma Mia', 'Sophie Sheridan (Amanda Seyfried) es una chica de veinte años residente en el hotel de su madre, situado en una isla griega, que está a punto de casarse con Sky (Dominic Cooper). Su madre, Donna (Meryl Streep), nunca le ha dicho quién es su padre.\r\n\r\nCuando Sophie encuentra el antiguo diario de su madre, descubre la dirección de tres hombres que podrían ser su padre y decide invitarlos a su boda sin que su madre se entere.\r\n\r\nTodo se complica cuando Sam Carmichael (Pierce Brosnan), Harry Bright (Colin Firth) y Bill Anderson (Stellan Skarsgård) llegan a la isla y se encuentran con Sophie y Donna, la última apoyada por sus dos mejores amigas, Rosie (Julie Walters) y Tanya (Christine Baranski).\r\n\r\nTodos juntos intentarán resolver el misterio de quién es el verdadero padre de Sophie y quién la llevará al altar.', 2008, 11, 'Phyllida Lloyd', 0, 'media/peliculas/MammaMiaTrailer.mp4', 'media/peliculas/MammaMia.JPG', 'media/peliculas/MammaMiaPelicula.mp4'),
('parasitos2019', 'Parásitos', 'Tanto Gi Taek (Song Kang-ho) como su familia est?n sin trabajo. Cuando su hijo mayor, Gi Woo (Choi Woo-sik), empieza a dar clases particulares en casa de Park (Lee Seon-gyun), las dos familias, que tienen mucho en com?n pese a pertenecer a dos mundos totalmente distintos, comienzan una interrelaci?n de resultados imprevisibles.', 2019, 3, 'Bong Joon-ho', 5, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/parasitosImagen.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('psicosis', 'Psicosis', 'Marion Crane, una joven secretaria, tras cometer el robo de un dinero en su empresa, huye de la ciudad y, después de conducir durante horas, decide descansar en un pequeño y apartado motel de carretera regentado por un tímido joven llamado Norman Bates, que vive en la casa de al lado con su madre.', 1960, 14, 'Alfred Hitchcock', 0, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/psicosisImagen.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('shrek', 'Shrek', 'Hace mucho tiempo, en una lejanísima ciénaga, vivía un feroz ogro llamado Shrek. De repente, un día, su soledad se ve interrumpida por una invasión de sorprendentes personajes. Hay ratoncitos ciegos en su comida, un enorme y malísimo lobo en su cama, tres cerditos sin hogar y otros seres que han sido deportados de su tierra por el malvado Lord Farquaad. Para salvar su territorio, Shrek hace un pacto con Farquaad y emprende viaje para conseguir que la bella princesa Fiona acceda a ser la novia del Lord. En tan importante misión le acompaña un divertido burro, dispuesto a hacer cualquier cosa por Shrek: todo, menos guardar silencio.', 2001, 13, 'Andrew Adamson', 3, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/shrekImagen.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('sleepyHollow', 'Sleepy Hollow', 'Norteamérica, finales del siglo XVIII. El condestable Ichabod Crane (Johnny Depp), un investigador de Nueva York que utiliza avanzados métodos de averiguación, es enviado al pequeño y remoto pueblo de Sleepy Hollow para descubrir qué hay de verdad en la leyenda de un jinete sin cabeza que aterroriza a los habitantes del lugar.', 1999, 15, 'Tim Burton', 5, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/sleepyImg.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('starwars4', 'Star Wars Episodio IV: Una nueva esperan', 'Los gobernantes del Imperio Galáctico, la fuerza del mal que domina el universo, capturan a la princesa Leia, quien posee datos confidenciales sobre su centro de operaciones militares, denominado &quot;Estrella de la Muerte&quot;. Antes de su secuestro, la Princesa transfiere la información ultrasecreta a la vase de datos del robot R2-D2. Catalogado como un material inservible, R2-D2, junto con su compañero C3PO, son deportados a un planeta remoto, siendo comprados por el joven Luke Skywalker en el mercado negro. Debido a un hecho fortuito, Luke accede al mensaje de la princesa Leia, quien solicita el auxilio del veterano Caballero Jedi Obi-Wan Kenobi. Luke, Obi-Wan, los robots, el piloto Han Solo y el gigantesco wookiee Chewbacca conforman la tripulación que intentará liberar a la princesa Leia de los dominios de Darth Vader, la autoridad suprema del Imperio Galáctico.', 1977, 12, 'George Lucas', 0, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/starwars4imagen.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('TheHangout', 'Resacon en Las Vegas', 'Historia de una desmadrada despedida de soltero en la que el novio y tres amigos se montan una gran juerga en Las Vegas. Como era de esperar, a la mañana siguiente tienen una resaca tan monumental que no pueden recordar nada de lo ocurrido la noche anterior. Lo más extraordinario es que el novio ha desaparecido y en la suite del hotel se encuentran un tigre y un bebé.', 2009, 10, 'Todd Philips', 0, 'media/peliculas/parasitosTrailer.mp4', 'media/peliculas/resaconImg.jpg', 'media/peliculas/parasitosPelicula.mp4'),
('toystory4', 'Toy Story 4', 'Woody siempre ha tenido claro cu?l es su labor en el mundo y su prioridad: cuidar a su due?o, ya sea Andy o Bonnie. Pero cuando Bonnie a?ade a Forky, un nuevo juguete de fabricaci?n propia, a su habitaci?n, arranca una nueva aventura que servir? para que los viejos y nuevos amigos le ense?en a Woody lo grande que puede ser el mundo para un juguete', 2019, 4, 'Josh Cooley', 2, 'media/peliculas/toyStoryTrailer.mp4', 'media/peliculas/toyStoryImg.jpg', 'media/peliculas/toystoryPelicula.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idRespuesta` int(10) NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `borrado` tinyint(1) NOT NULL,
  `id_tema` int(20) NOT NULL,
  `escritor` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_grupo` int(5) NOT NULL,
  `creador` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idTema` int(20) NOT NULL,
  `titulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `borrado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tigenero`
--

CREATE TABLE `tigenero` (
  `idTiGenero` int(10) NOT NULL,
  `generoPelicula` int(10) NOT NULL,
  `idGenero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tigenero`
--

INSERT INTO `tigenero` (`idTiGenero`, `generoPelicula`, `idGenero`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 1, 4),
(4, 2, 7),
(5, 3, 2),
(6, 3, 4),
(8, 5, 8),
(9, 5, 9),
(10, 6, 2),
(11, 7, 9),
(12, 7, 4),
(13, 8, 10),
(14, 4, 6),
(15, 9, 5),
(16, 6, 10),
(17, 10, 1),
(19, 11, 1),
(20, 11, 3),
(21, 12, 8),
(22, 12, 9),
(23, 13, 1),
(24, 13, 6),
(25, 14, 4),
(26, 14, 5),
(27, 15, 5),
(28, 16, 7),
(29, 16, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `apodo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ntarjeta` bigint(255) NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `inicioAbono` datetime NOT NULL DEFAULT current_timestamp(),
  `tipoAbono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` enum('admin','user') COLLATE utf8_spanish_ci NOT NULL,
  `urlFoto` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`apodo`, `nombre`, `apellidos`, `email`, `ntarjeta`, `contrasena`, `inicioAbono`, `tipoAbono`, `rol`, `urlFoto`) VALUES
('jaime', 'Jaime', 'Fernadez', 'jaime@ucm.es', 5421, '$2y$10$T/eMgW.UKuXxNkdojORW1u5ljbaM5XlH4NiSnq/AWBuMFGYTGlNG6', '2020-05-10 13:22:01', 'anual', 'user', 'media/usuario/jaime.JPG'),
('jin', 'jin', 'wang', 'jinwang1999@gmail.com', 4000222233336666, '$2y$10$wPKS7HuGAWh82Hcg8QMB2urTsd9caRlmRtv0CeDHXc3McyUIXNFeu', '2020-04-01 18:00:10', 'anual', 'user', 'media/usuario/fotoVacia.jpg'),
('jin2', 'jwan', 'chu', 'sdf@ucm.es', 153153, '$2y$10$WkbxrpGclOC3aAmbXQNABumlPsBn3QQA4QjhyXtLxMaap1VqRpBNW', '2020-04-20 18:44:03', 'mensual', 'user', 'media/usuario/fotoVacia.jpg'),
('poti', 'Juan Antonio', 'Escobar de los Angeles', 'juanesco@ucm.es', 2602, '$2y$10$fYvRQHk0DBEPuy0KuxaZIuTKX7dKfC9rFWwuZAZI1gjlweQ06GwQK', '2017-08-31 00:00:00', 'mensual', 'admin', 'media/usuario/jin.jpg'),
('prueba', 'Nombre de prueba', 'Apellido de prueba', 'prueba@prueba.es', 12345, '$2y$10$z709FgQBL/k64vNgp60wx.R2cEZNZbFWJ48zO9SImRLl2vWa5Hmki', '2020-04-26 19:28:37', 'mensual', 'user', 'media/usuario/fotoVacia.jpg'),
('PruebasAndrea', 'Andrea Pruebas', 'aergqeh', 'a@a.com', 123, '$2y$10$zFYyylkXjtKWM6EgiCBUNOzOqLKLbqoZ44uO8mCNMect.LMDUdm5a', '2020-04-29 11:12:58', 'trimestral', 'user', 'media/usuario/fotoVacia.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `idValoracion` int(10) NOT NULL,
  `valoracion` int(2) NOT NULL,
  `idPelicula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idUsuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`idValoracion`, `valoracion`, `idPelicula`, `idUsuario`) VALUES
(3, 5, 'Joker2019', 'jin'),
(8, 4, 'Joker2019', 'poti'),
(9, 5, 'parasitos2019', 'poti'),
(10, 5, 'infinityWar2018', 'poti'),
(11, 3, 'shrek', 'jaime');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visualizacion`
--

CREATE TABLE `visualizacion` (
  `id_pelicula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descargada` tinyint(1) NOT NULL,
  `fecha_descarga` datetime DEFAULT NULL,
  `favorita` tinyint(1) NOT NULL,
  `valoracion` int(5) DEFAULT NULL,
  `vista` tinyint(1) NOT NULL,
  `fecha_visualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`tipo`);

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`idActor`);

--
-- Indices de la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD KEY `actores` (`id_actor`),
  ADD KEY `pelicula` (`id_pelicula`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idGrupo`) USING BTREE,
  ADD KEY `usuario` (`creador`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD KEY `grupo` (`id_grupo`),
  ADD KEY `user` (`id_usuario`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idPelicula`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `tema` (`id_tema`),
  ADD KEY `usuario` (`escritor`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`idTema`),
  ADD KEY `grupo` (`id_grupo`),
  ADD KEY `usuario` (`creador`);

--
-- Indices de la tabla `tigenero`
--
ALTER TABLE `tigenero`
  ADD PRIMARY KEY (`idTiGenero`),
  ADD KEY `generoPelicula` (`generoPelicula`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`apodo`),
  ADD KEY `abono2` (`tipoAbono`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`idValoracion`),
  ADD KEY `idPelicula` (`idPelicula`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `visualizacion`
--
ALTER TABLE `visualizacion`
  ADD KEY `Pelicula` (`id_pelicula`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tigenero`
--
ALTER TABLE `tigenero`
  MODIFY `idTiGenero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `idValoracion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actuacion`
--
ALTER TABLE `actuacion`
  ADD CONSTRAINT `actuacion_ibfk_3` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`idActor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actuacion_ibfk_4` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `usuario` (`apodo`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD CONSTRAINT `miembros_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`apodo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `miembros_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_3` FOREIGN KEY (`escritor`) REFERENCES `usuario` (`apodo`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `respuestas_ibfk_4` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`idTema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_ibfk_3` FOREIGN KEY (`creador`) REFERENCES `usuario` (`apodo`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `temas_ibfk_4` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tigenero`
--
ALTER TABLE `tigenero`
  ADD CONSTRAINT `tigenero_ibfk_1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tigenero_ibfk_2` FOREIGN KEY (`generoPelicula`) REFERENCES `pelicula` (`genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipoAbono`) REFERENCES `abono` (`tipo`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visualizacion`
--
ALTER TABLE `visualizacion`
  ADD CONSTRAINT `visualizacion_ibfk_4` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`apodo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `visualizacion_ibfk_5` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
