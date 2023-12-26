-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 05-12-2023 a las 14:46:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conschool`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idAsignatura` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Id_centro` int(11) DEFAULT NULL,
  `Material_idMaterial` int(11) NOT NULL,
  `Nota_idNota` int(11) NOT NULL,
  `Curso` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idAsignatura`, `Nombre`, `Descripcion`, `Id_centro`, `Material_idMaterial`, `Nota_idNota`, `Curso`) VALUES
(1, 'Sociales', 'Enseñar los valores de la sociedad', 3, 1, 1, 'Primero'),
(2, 'Naturales', 'Enseñar los distintos aspectos de la naturaleza', 3, 2, 2, 'Primero'),
(3, 'Musica', 'Estudiar el arte de la musica', 3, 3, 3, 'Primero'),
(4, 'Ingles', 'Estudiar ingles', 3, 4, 4, 'Primero'),
(5, 'Matematicas', 'Estudiar Matematicas', 3, 5, 5, 'Primero'),
(15, 'Historia', 'Estudio de la historia humana', 3, 7, 4, 'Segundo'),
(16, 'Biología', 'Ciencia que estudia los seres vivos', 3, 8, 3, 'Segundo'),
(17, 'Química', 'Ciencia que estudia la materia y sus cambios', 3, 9, 2, 'Segundo'),
(18, 'Literatura', 'Estudio de obras literarias', 3, 10, 2, 'Segundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasf1`
--

CREATE TABLE `categoriasf1` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(255) NOT NULL,
  `descripcionCategoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriasf1`
--

INSERT INTO `categoriasf1` (`idCategoria`, `nombreCategoria`, `descripcionCategoria`) VALUES
(1, 'Tutoria Primero', 'Aqui podemos ver el tablon de anuncios de la clase');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasf2`
--

CREATE TABLE `categoriasf2` (
  `idCategoriaf2` int(11) NOT NULL,
  `nombreCategoriaf2` varchar(255) NOT NULL,
  `descripcionCategoriaf2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriasf2`
--

INSERT INTO `categoriasf2` (`idCategoriaf2`, `nombreCategoriaf2`, `descripcionCategoriaf2`) VALUES
(1, 'Profesores Primero', 'Aqui se puede ver el profesorado designado a primero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasf3`
--

CREATE TABLE `categoriasf3` (
  `idCategoriaf3` int(11) NOT NULL,
  `nombreCategoriaf3` varchar(255) NOT NULL,
  `descripcionCategoriaf3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriasf3`
--

INSERT INTO `categoriasf3` (`idCategoriaf3`, `nombreCategoriaf3`, `descripcionCategoriaf3`) VALUES
(1, 'Horario de la evaluaciones', 'Consulta aqui los dias de los examenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_educativo`
--

CREATE TABLE `centro_educativo` (
  `Id_centro` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `correo_electronico` varchar(45) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Asignatura_idAsignatura` int(11) NOT NULL,
  `Asignatura_idAsignatura1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `centro_educativo`
--

INSERT INTO `centro_educativo` (`Id_centro`, `nombre`, `direccion`, `Telefono`, `correo_electronico`, `Usuario_idUsuario`, `Asignatura_idAsignatura`, `Asignatura_idAsignatura1`) VALUES
(3, 'Las Planas', 'Calle Las Planas', '666.666.666', 'lasplanas@centroeducativo.com', 2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idEvento` int(11) NOT NULL,
  `nombreEvento` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fechaEvento` date NOT NULL,
  `horaEvento` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEvento`, `nombreEvento`, `descripcion`, `fechaEvento`, `horaEvento`) VALUES
(1, 'Reunión de Padres y Profesores', 'Reunión para discutir el progreso académico y social de los estudiantes.', '2023-12-05', '17:00:00'),
(2, 'Feria de Ciencias', 'Exhibición de proyectos científicos realizados por los estudiantes.', '2023-11-20', '10:00:00'),
(3, 'Competencia Deportiva Interescolar', 'Evento deportivo que enfrenta a diferentes escuelas en diversas disciplinas.', '2023-10-15', '09:00:00'),
(4, 'Concierto de la Banda Escolar', 'Presentación musical de la banda escolar.', '2023-12-12', '19:00:00'),
(5, 'Día de Orientación Profesional', 'Jornada de orientación sobre opciones profesionales y universitarias.', '2023-11-05', '08:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idMaterial` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idMaterial`, `nombre`, `descripcion`, `fecha_creacion`, `id_profesor`, `idAsignatura`) VALUES
(1, 'Cuaderno Sociales', 'Cuaderno de sociales', '2023-10-17', 2, 1),
(2, 'Cuaderno Naturales', 'Cuaderno Naturales', '2023-10-17', 2, 2),
(3, 'Cuaderno Musica', 'Cuaderno Musica', '2023-10-17', 2, 3),
(4, 'Libro Ingles', 'Libro de lectura en ingles', '2023-10-17', 2, 4),
(5, 'Cuaderno Matematicas', 'Cuaderno ejercicios ', '2023-10-17', 2, 5),
(6, 'Cuaderno Lengua', 'Ejercicios vocabulario', '2023-10-17', 2, 6),
(7, 'Libro de Historia', 'Libro completo de historia para segundo', '2023-01-10', 2, 15),
(8, 'Kit de Biología', 'Kit de laboratorio para Biología', '2023-01-10', 2, 16),
(9, 'Equipo de Química', 'Equipo básico para experimentos de Química', '2023-01-10', 2, 17),
(10, 'Antología de Literatura', 'Selección de textos literarios', '2023-01-10', 2, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idMensaje` int(11) NOT NULL,
  `contenido` varchar(100) DEFAULT NULL,
  `fecha_envio` date DEFAULT NULL,
  `id_emisor` int(11) DEFAULT NULL,
  `id_receptor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `idRemitente` int(11) NOT NULL,
  `idDestinatario` int(11) NOT NULL,
  `textoMensaje` text NOT NULL,
  `fechaHoraEnvio` datetime NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idMensaje`, `idRemitente`, `idDestinatario`, `textoMensaje`, `fechaHoraEnvio`, `leido`) VALUES
(1, 1, 1, 'Hola', '2023-12-04 10:49:10', 0),
(2, 1, 2, 'Hola otra vez', '2023-12-04 10:50:53', 0),
(3, 2, 2, 'Buenas tardes', '2023-12-04 14:12:23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `idNota` int(11) NOT NULL,
  `calificacion` float DEFAULT NULL,
  `fecha_calificacion` date DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`idNota`, `calificacion`, `fecha_calificacion`, `idAsignatura`, `idUsuario`) VALUES
(1, 8.7, '2023-10-17', 1, 1),
(2, 7.5, '2023-10-17', 2, 1),
(3, 7.8, '2023-10-17', 3, 1),
(4, 5.4, '2023-10-17', 4, 1),
(5, 8.1, '2023-10-17', 5, 1),
(6, 6.4, '2023-10-17', 6, 1),
(7, 8.5, '2023-10-20', 7, 12),
(8, 7, '2023-10-20', 8, 12),
(9, 6.5, '2023-10-20', 9, 12),
(10, 9, '2023-10-20', 10, 12),
(11, 7.5, '2023-10-20', 7, 13),
(12, 8, '2023-10-20', 8, 13),
(13, 6, '2023-10-20', 9, 13),
(14, 8.5, '2023-10-20', 10, 13),
(15, 9.5, '2023-12-05', 1, 5),
(16, 7, '2023-12-05', 2, 5),
(17, 5.5, '2023-12-05', 3, 5),
(18, 8, '2023-12-05', 4, 5),
(19, 7.5, '2023-12-05', 5, 5),
(20, 6, '2023-12-05', 6, 5),
(21, 7, '2023-12-05', 1, 6),
(22, 6.5, '2023-12-05', 2, 6),
(23, 7.5, '2023-12-05', 3, 6),
(24, 6, '2023-12-05', 4, 6),
(25, 8.5, '2023-12-05', 5, 6),
(26, 7, '2023-12-05', 6, 6),
(27, 5.5, '2023-12-05', 1, 7),
(28, 6.5, '2023-12-05', 2, 7),
(29, 7, '2023-12-05', 3, 7),
(30, 8, '2023-12-05', 4, 7),
(31, 7.5, '2023-12-05', 5, 7),
(32, 6, '2023-12-05', 6, 7),
(33, 7, '2023-12-05', 1, 8),
(34, 6.5, '2023-12-05', 2, 8),
(35, 7.5, '2023-12-05', 3, 8),
(36, 6, '2023-12-05', 4, 8),
(37, 8.5, '2023-12-05', 5, 8),
(38, 7, '2023-12-05', 6, 8),
(39, 5.5, '2023-12-05', 1, 9),
(40, 6.5, '2023-12-05', 2, 9),
(41, 7, '2023-12-05', 3, 9),
(42, 8, '2023-12-05', 4, 9),
(43, 7.5, '2023-12-05', 5, 9),
(44, 6, '2023-12-05', 6, 9),
(45, 6.5, '2023-12-05', 15, 10),
(46, 7.9, '2023-12-05', 16, 10),
(47, 9.9, '2023-12-05', 17, 10),
(48, 5.7, '2023-12-05', 18, 10),
(49, 8.7, '2023-12-05', 15, 11),
(50, 6.4, '2023-12-05', 16, 11),
(51, 5.9, '2023-12-05', 17, 11),
(52, 5.1, '2023-12-05', 18, 11),
(53, 8.2, '2023-12-05', 15, 12),
(54, 5.4, '2023-12-05', 16, 12),
(55, 7.4, '2023-12-05', 17, 12),
(56, 5.8, '2023-12-05', 18, 12),
(57, 8, '2023-12-05', 15, 19),
(58, 7.4, '2023-12-05', 16, 19),
(59, 6.2, '2023-12-05', 17, 19),
(60, 8.5, '2023-12-05', 18, 19),
(61, 9.6, '2023-12-05', 15, 4),
(62, 6.9, '2023-12-05', 16, 4),
(63, 7.6, '2023-12-05', 17, 4),
(64, 7.4, '2023-12-05', 18, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestasf1`
--

CREATE TABLE `respuestasf1` (
  `idRespuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenidoRespuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestasf1`
--

INSERT INTO `respuestasf1` (`idRespuesta`, `idUsuario`, `idTema`, `fechaCreacion`, `contenidoRespuesta`) VALUES
(1, 1, 1, '2023-10-18 10:44:44', 'Queda claro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestasf2`
--

CREATE TABLE `respuestasf2` (
  `idRespuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenidoRespuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestasf2`
--

INSERT INTO `respuestasf2` (`idRespuesta`, `idUsuario`, `idTema`, `fechaCreacion`, `contenidoRespuesta`) VALUES
(1, 1, 1, '2023-10-18 11:04:54', 'Vale, con que frecuencia se obtendra una respuesta a un correo electronico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestasf3`
--

CREATE TABLE `respuestasf3` (
  `idRespuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenidoRespuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestasf3`
--

INSERT INTO `respuestasf3` (`idRespuesta`, `idUsuario`, `idTema`, `fechaCreacion`, `contenidoRespuesta`) VALUES
(1, 1, 1, '2023-10-18 11:06:46', 'Pero si esos dias son festivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temasf1`
--

CREATE TABLE `temasf1` (
  `idTema` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `tituloTema` varchar(255) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenidoPrimeraRespuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temasf1`
--

INSERT INTO `temasf1` (`idTema`, `idUsuario`, `idCategoria`, `tituloTema`, `fechaCreacion`, `contenidoPrimeraRespuesta`) VALUES
(1, 2, 1, 'Reglas del foro', '2023-10-18 10:44:15', 'La primera regla del foro es que no se habla del foro\r\nLa segunda regla del foro es que no se habla del foro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temasf2`
--

CREATE TABLE `temasf2` (
  `idTema` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCategoriaf2` int(11) NOT NULL,
  `tituloTema` varchar(255) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenidoPrimeraRespuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temasf2`
--

INSERT INTO `temasf2` (`idTema`, `idUsuario`, `idCategoriaf2`, `tituloTema`, `fechaCreacion`, `contenidoPrimeraRespuesta`) VALUES
(1, 2, 1, 'Correos electronicos', '2023-10-18 11:04:07', 'A continuación pondre los correos electronicos de los profesores:\r\nprofesor1@lasplanas.com\r\nprofesor2@lasplanas.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temasf3`
--

CREATE TABLE `temasf3` (
  `idTema` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCategoriaf3` int(11) NOT NULL,
  `tituloTema` varchar(255) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenidoPrimeraRespuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temasf3`
--

INSERT INTO `temasf3` (`idTema`, `idUsuario`, `idCategoriaf3`, `tituloTema`, `fechaCreacion`, `contenidoPrimeraRespuesta`) VALUES
(1, 2, 1, 'Primera evaluacion', '2023-10-18 11:06:26', 'La primera evaluación tendra lugar los dias 6 ,7 y 8 de diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `id_centro` int(11) DEFAULT NULL,
  `cursoActual` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombre`, `Apellidos`, `contraseña`, `tipo`, `id_centro`, `cursoActual`) VALUES
(1, 'Jacinto', 'Pusca', 'Pusca12', 'alumno', 3, 'Primero'),
(2, 'Margarita', 'Sanchez', 'Sanchez12', 'profesor', 3, 'Infantil'),
(3, 'Jose Luis', 'Ramirez', 'Ramirez12', 'administracion', 3, 'No docente'),
(4, 'Laia', 'Martinez', 'Martinez12', 'alumno', 3, 'Segundo'),
(5, 'Lucía', 'Fernández', 'x8Js2!5K', 'alumno', 3, 'Primero'),
(6, 'Carlos', 'Ruiz', 'aP9m!2Qx', 'alumno', 3, 'Primero'),
(7, 'Sofía', 'Gómez', 'nZ5tU!1Y', 'alumno', 3, 'Primero'),
(8, 'Miguel Ángel', 'Torres', 'bV3sH!9D', 'alumno', 3, 'Primero'),
(9, 'Ana María', 'López', 'rT2w!4Pn', 'alumno', 3, 'Primero'),
(10, 'Luisa', 'Fernández', 'Fernandez2023', 'alumno', 3, 'Segundo'),
(11, 'Carlos', 'Gómez', 'Gomez2023', 'alumno', 3, 'Segundo'),
(12, 'Marta', 'Vázquez', 'Vazquez2023', 'alumno', 3, 'Segundo'),
(13, 'Javier', 'López', 'Lopez2023', 'alumno', 3, 'Segundo'),
(14, 'Sofía', 'Rodríguez', 'Rodriguez2023', 'alumno', 3, 'Segundo'),
(15, 'Daniel', 'Jiménez', 'Jimenez2023', 'alumno', 3, 'Segundo'),
(16, 'Ana', 'Márquez', 'Marquez2023', 'alumno', 3, 'Segundo'),
(17, 'Diego', 'Torres', 'Torres2023', 'alumno', 3, 'Segundo'),
(18, 'Lucía', 'Pérez', 'Perez2023', 'alumno', 3, 'Segundo'),
(19, 'Alberto', 'Ruiz', 'Ruiz2023', 'alumno', 3, 'Segundo'),
(21, 'Nacho', 'Collado', 'Collado2023', 'profesor', 3, 'Primero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_mensaje`
--

CREATE TABLE `usuario_has_mensaje` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Mensaje_idMensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_nota`
--

CREATE TABLE `usuario_has_nota` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Nota_idNota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idAsignatura`,`Nota_idNota`),
  ADD KEY `fk_Asignatura_Material1_idx` (`Material_idMaterial`),
  ADD KEY `fk_Asignatura_Nota1_idx` (`Nota_idNota`);

--
-- Indices de la tabla `categoriasf1`
--
ALTER TABLE `categoriasf1`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `categoriasf2`
--
ALTER TABLE `categoriasf2`
  ADD PRIMARY KEY (`idCategoriaf2`);

--
-- Indices de la tabla `categoriasf3`
--
ALTER TABLE `categoriasf3`
  ADD PRIMARY KEY (`idCategoriaf3`);

--
-- Indices de la tabla `centro_educativo`
--
ALTER TABLE `centro_educativo`
  ADD PRIMARY KEY (`Id_centro`,`Asignatura_idAsignatura`),
  ADD KEY `fk_Centro_Educativo_Usuario_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Centro_Educativo_Asignatura1_idx` (`Asignatura_idAsignatura`),
  ADD KEY `fk_Centro_Educativo_Asignatura2_idx` (`Asignatura_idAsignatura1`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idMensaje`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensaje`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idNota`);

--
-- Indices de la tabla `respuestasf1`
--
ALTER TABLE `respuestasf1`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idTema` (`idTema`);

--
-- Indices de la tabla `respuestasf2`
--
ALTER TABLE `respuestasf2`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idTema` (`idTema`);

--
-- Indices de la tabla `respuestasf3`
--
ALTER TABLE `respuestasf3`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idTema` (`idTema`);

--
-- Indices de la tabla `temasf1`
--
ALTER TABLE `temasf1`
  ADD PRIMARY KEY (`idTema`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `temasf2`
--
ALTER TABLE `temasf2`
  ADD PRIMARY KEY (`idTema`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCategoriaf2` (`idCategoriaf2`);

--
-- Indices de la tabla `temasf3`
--
ALTER TABLE `temasf3`
  ADD PRIMARY KEY (`idTema`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCategoriaf3` (`idCategoriaf3`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuario_has_mensaje`
--
ALTER TABLE `usuario_has_mensaje`
  ADD PRIMARY KEY (`Usuario_idUsuario`,`Mensaje_idMensaje`),
  ADD KEY `fk_Usuario_has_Mensaje_Mensaje1_idx` (`Mensaje_idMensaje`),
  ADD KEY `fk_Usuario_has_Mensaje_Usuario1_idx` (`Usuario_idUsuario`);

--
-- Indices de la tabla `usuario_has_nota`
--
ALTER TABLE `usuario_has_nota`
  ADD PRIMARY KEY (`Usuario_idUsuario`,`Nota_idNota`),
  ADD KEY `fk_Usuario_has_Nota_Nota1_idx` (`Nota_idNota`),
  ADD KEY `fk_Usuario_has_Nota_Usuario1_idx` (`Usuario_idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categoriasf1`
--
ALTER TABLE `categoriasf1`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoriasf2`
--
ALTER TABLE `categoriasf2`
  MODIFY `idCategoriaf2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoriasf3`
--
ALTER TABLE `categoriasf3`
  MODIFY `idCategoriaf3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `centro_educativo`
--
ALTER TABLE `centro_educativo`
  MODIFY `Id_centro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `respuestasf1`
--
ALTER TABLE `respuestasf1`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuestasf2`
--
ALTER TABLE `respuestasf2`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuestasf3`
--
ALTER TABLE `respuestasf3`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `temasf1`
--
ALTER TABLE `temasf1`
  MODIFY `idTema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `temasf2`
--
ALTER TABLE `temasf2`
  MODIFY `idTema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `temasf3`
--
ALTER TABLE `temasf3`
  MODIFY `idTema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `fk_Asignatura_Material1` FOREIGN KEY (`Material_idMaterial`) REFERENCES `material` (`idMaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Asignatura_Nota1` FOREIGN KEY (`Nota_idNota`) REFERENCES `nota` (`idNota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `centro_educativo`
--
ALTER TABLE `centro_educativo`
  ADD CONSTRAINT `fk_Centro_Educativo_Asignatura1` FOREIGN KEY (`Asignatura_idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Centro_Educativo_Asignatura2` FOREIGN KEY (`Asignatura_idAsignatura1`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Centro_Educativo_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestasf1`
--
ALTER TABLE `respuestasf1`
  ADD CONSTRAINT `respuestasf1_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `respuestasf1_ibfk_2` FOREIGN KEY (`idTema`) REFERENCES `temasf1` (`idTema`);

--
-- Filtros para la tabla `respuestasf2`
--
ALTER TABLE `respuestasf2`
  ADD CONSTRAINT `respuestasf2_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `respuestasf2_ibfk_2` FOREIGN KEY (`idTema`) REFERENCES `temasf2` (`idTema`);

--
-- Filtros para la tabla `respuestasf3`
--
ALTER TABLE `respuestasf3`
  ADD CONSTRAINT `respuestasf3_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `respuestasf3_ibfk_2` FOREIGN KEY (`idTema`) REFERENCES `temasf3` (`idTema`);

--
-- Filtros para la tabla `temasf1`
--
ALTER TABLE `temasf1`
  ADD CONSTRAINT `temasf1_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `temasf1_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categoriasf1` (`idCategoria`);

--
-- Filtros para la tabla `temasf2`
--
ALTER TABLE `temasf2`
  ADD CONSTRAINT `temasf2_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `temasf2_ibfk_2` FOREIGN KEY (`idCategoriaf2`) REFERENCES `categoriasf2` (`idCategoriaf2`);

--
-- Filtros para la tabla `temasf3`
--
ALTER TABLE `temasf3`
  ADD CONSTRAINT `temasf3_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `temasf3_ibfk_2` FOREIGN KEY (`idCategoriaf3`) REFERENCES `categoriasf3` (`idCategoriaf3`);

--
-- Filtros para la tabla `usuario_has_mensaje`
--
ALTER TABLE `usuario_has_mensaje`
  ADD CONSTRAINT `fk_Usuario_has_Mensaje_Mensaje1` FOREIGN KEY (`Mensaje_idMensaje`) REFERENCES `mensaje` (`idMensaje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Mensaje_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_nota`
--
ALTER TABLE `usuario_has_nota`
  ADD CONSTRAINT `fk_Usuario_has_Nota_Nota1` FOREIGN KEY (`Nota_idNota`) REFERENCES `nota` (`idNota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Nota_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
