-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2020 a las 09:19:29
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `radio`
--
CREATE DATABASE IF NOT EXISTS `radio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `radio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id_artista` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `biografia` text NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id_artista`, `imagen`, `biografia`, `nombre`) VALUES
(3, 'https://aws.revistavanityfair.es/prod/designs/v1/assets/785x589/200340.jpg', 'Shkaria shakira', 'Erick'),
(4, 'https://img.minutoneuquen.com/u/fotografias/m/2020/4/20/f608x342-244672_274395_0.jpg', 'Demi Lovato es una gran artista que antes estaba en disney y ahora pues, ahora solo hace canciones.', 'Demi Lovato'),
(7, 'https://pbs.twimg.com/profile_images/1248098637030318080/yXz9E1sU_400x400.jpg', 'Javier, es javier.', 'Javier'),
(8, 'https://www.usanetwork.com/sites/usanetwork/files/2019/12/MrRobot_aspot_413a_2880x1620_rev.jpg', 'Eliot.', 'Perez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_mensaje` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_mensaje`, `nombre`, `correo`, `asunto`, `mensaje`) VALUES
(10, 'Juansito el chido', 'erick.sgr10@gmail.comddd', 'Un asunto chingo.', 'Awebo que este es un mensaje bien chingon.'),
(11, 'Javiar', 'erick.sgr11@hotmail.com', 'Este es un asunto', 'El asunto esta chido. Tiene que estar mas chido.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `contenido` text NOT NULL,
  `id_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `imagen`, `titulo`, `contenido`, `id_staff`) VALUES
(3, 'https://www.tvynovelas.com/us/wp-content/uploads/2018/09/%C2%A1Univisi%C3%B3n-lanza-Novelas-Xpress.jpg', 'Nueva seccion de novelas', 'La novela (del italiano novella) es una obra literaria en la que se narra una acción fingida en todo o en parte y cuyo fin es causar placer estético a los lectores con la descripción o pintura de sucesos o lances interesantes así como de personajes, pasiones y costumbres, que en muchos casos sirven de insumos para la propia reflexión o introspección. ', 3),
(5, 'https://www.lavanguardia.com/r/GODO/LV/p5/WebSite/2018/10/11/Recortada/img_smauri_20181010-184645_imagenes_lv_getty_gettyimages-1040860540-kHBB-U452288345967hBI-992x558@LaVanguardia-Web.jpg', 'El deporte rey.', 'El Deporte Rey, es realmente un deporte muy bueno. El Deporte Rey, es realmente un deporte muy bueno. El Deporte Rey, es realmente un deporte muy bueno. El Deporte Rey, es realmente un deporte muy bueno. ', 4),
(18, 'https://i.ytimg.com/vi/Z7cBvoCih3c/hqdefault.jpg', 'esta es una nueva publicaicon', 'esta es una nueva publicaiconesta es una nueva publicaiconesta es una nueva publicaiconesta es una nueva publicaiconesta es una nueva publicaicon', 22),
(20, 'https://i2.wp.com/noticiaslucero.com/wp-content/uploads/2020/01/yfgb.png?resize=800%2C400', 'adb', 'asdasdwdSAEWQWEAWDADWAWDDAW', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id_dia`, `nombre`) VALUES
(1, 'Domingo'),
(2, 'Lunes'),
(3, 'Martes'),
(4, 'Miercoles'),
(5, 'Jueves'),
(6, 'Viernes'),
(7, 'Sabado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `titulo_inicio` varchar(1000) NOT NULL,
  `encabezado_inicio` varchar(100) NOT NULL,
  `descripcion_inicio` varchar(500) NOT NULL,
  `leyenda_inicio` varchar(300) NOT NULL,
  `nombre_btn_inicio` varchar(50) NOT NULL,
  `url_btn_inicio` varchar(200) NOT NULL,
  `titulo_nav` varchar(200) NOT NULL,
  `id_inicio` int(11) NOT NULL,
  `id_lista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`titulo_inicio`, `encabezado_inicio`, `descripcion_inicio`, `leyenda_inicio`, `nombre_btn_inicio`, `url_btn_inicio`, `titulo_nav`, `id_inicio`, `id_lista`) VALUES
('Deejays Radios', 'Esta es la radio deejays ', 'Esta es la simple descripción del sitio, aquí se puede poner.\r\n', 'Lovato se une al grupo imparable de Deejaysss', 'Novelas Ahora', 'publicacion.php?publicacion=3', 'Deejays', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas_semanales`
--

CREATE TABLE `listas_semanales` (
  `id_lista` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `playlist` text NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listas_semanales`
--

INSERT INTO `listas_semanales` (`id_lista`, `nombre`, `playlist`, `fecha`) VALUES
(1, 'Lista de la semana', '7sOLjOFj7bZhbWhHCTsiAk', '0000-00-00 00:00:00'),
(7, 'Otra PlayList', '48bAyYwwQh6mOEcajka927', '2020-04-25 18:33:54'),
(8, 'Da Vic', '5rHU9mNpBTmUqqUJhiQQUf', '2020-04-25 23:57:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `imagen` text NOT NULL,
  `hora_inicio` text NOT NULL,
  `hora_final` text NOT NULL,
  `id_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nombre`, `imagen`, `hora_inicio`, `hora_final`, `id_staff`) VALUES
(1, 'La tenchis', 'https://epmghispanic.media.clients.ellingtoncms.com/img/photos/2014/06/24/TENCHI_MODEL_2_t640x360.jpg?0d5a8931fa89b9128468049ef05510d8e5899a73', '10:25', '17:52', 3),
(2, 'Las Night', 'https://fbcd.co/images/products/ab64b4eaf03dcaf00c99332d6e92c7cd_resize.jpg', '10:25', '16:44', 3),
(3, 'Mr Robot', 'https://miro.medium.com/max/5310/1*obCNl7euwxvEYkXEvrp2uQ.jpeg', '15:07', '15:08', 3),
(5, 'El programa', 'https://i2.wp.com/noticiaslucero.com/wp-content/uploads/2020/01/yfgb.png?resize=800%2C400', '18:13', '23:13', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` text NOT NULL,
  `tipo_usuario` varchar(100) DEFAULT 'locutor',
  `imagen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`id_staff`, `nombre`, `descripcion`, `usuario`, `clave`, `tipo_usuario`, `imagen`) VALUES
(3, 'Erick', 'Erick es un staff de la radio y por eso creemos que Erick es un Crack porque esta en la radio con nosotros.', 'erick', '$2y$10$7JowFkJAJuCUwAKYj3opnOAwuPnQDyz4m.Wg3kjLxfnvFh6tT9Rga', 'locutor', 'https://pngimage.net/wp-content/uploads/2018/06/locutor-png-3.png'),
(4, 'Pedro Alvarenga', 'Erick es un staff de la radio y por eso creemos que Erick es un Crack porque esta en la radio con nosotros.', 'erick2', '$2y$10$IGYQOdANkoHOCHDtKXDndeeXsmJ5Uy/VaVIHKmUWL55UyP2lV/ycC', 'locutor', 'data:image/jpeg;base64,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'),
(7, 'Juansito', 'Erick es un staff de la radio y por eso creemos que Erick es un Crack porque esta en la radio con nosotros.', 'erick3', '$2y$10$9kNKnGpa2RMi54kW7eNaOeFcTHsdCPwi1OzQucDtKuB/1/gtuOqEy', 'locutor', 'data:image/jpeg;base64,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'),
(20, 'Erick Rivas', 'Este staff de locutor si es un crack.  Mega hiper Crack bro.', 'iamrivard', '$2y$10$Pb4jgfx6qqqsvcCq/IZtneffykqCD6rLka26Cn3MT4R.PTMBHHf8S', 'locutor', 'https://toppng.com/uploads/preview/dj-icon-game-dj-armin-van-buuren-logo-11562937239qhyxuhrogz.png'),
(22, 'Lovato', 'Esta es la descripcion de lovato como el nuevo staff.', 'lovato', '$2y$10$cpcaegdnG4A2Rvef6Vqvou7fQBo/TWcWmWLEUEEBNnt88.4D2g1Da', 'locutor', 'https://i.ytimg.com/vi/Z7cBvoCih3c/hqdefault.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id_inicio`),
  ADD KEY `id_lista` (`id_lista`);

--
-- Indices de la tabla `listas_semanales`
--
ALTER TABLE `listas_semanales`
  ADD PRIMARY KEY (`id_lista`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id_inicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `listas_semanales`
--
ALTER TABLE `listas_semanales`
  MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Filtros para la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD CONSTRAINT `inicio_ibfk_1` FOREIGN KEY (`id_lista`) REFERENCES `listas_semanales` (`id_lista`);

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
