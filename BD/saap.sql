-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2019 a las 01:50:10
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Gerente General'),
(2, 'Celador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `TipoDocumento` varchar(30) NOT NULL,
  `DocumentoCliente` int(11) NOT NULL,
  `NombreCliente` varchar(90) DEFAULT NULL,
  `ApellidosCliente` varchar(90) DEFAULT NULL,
  `NumeroTelefonico` varchar(100) DEFAULT NULL,
  `Email` varchar(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `TipoDocumento`, `DocumentoCliente`, `NombreCliente`, `ApellidosCliente`, `NumeroTelefonico`, `Email`) VALUES
(3, 'Cedula de Ciudadania', 56789045, 'José Miguel ', 'Galindo', '9043567', 'miguelgalindosanchez@gmail.com'),
(6, 'NIT', 2147483647, 'Hermanitas Descalzas de la Fé', 'Sociedad', '3456780', 'mdbkergjk@sbfdkjs.com'),
(5, 'Cedula de ciudadania', 80125920, 'Freddy ', 'Ardila', '7120165', 'freddycardila@gmail.com'),
(8, 'Cedula de Ciudadania', 79899067, 'Mario Anibal', 'Beltrán Ruiz', '3194532245', 'mariob34@gmail.com'),
(9, 'Cedula de Ciudadania', 34567890, 'Jose', 'Rodriguez', '3245678', 'juancatrivi@hotmail.com'),
(10, 'Cedula de Ciudadania', 1234567890, 'Valeria', 'Rodriguez', '3156677234', 'valevale@hotmail.com'),
(12, 'Cedula Diplomatica', 1013445566, 'Winston', 'De Farias ', '3156677234', 'esebansoto@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `IdConvenio` int(11) NOT NULL,
  `NombreConvenio` varchar(60) DEFAULT NULL,
  `Valor` int(11) DEFAULT NULL,
  `NombreCliente` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`IdConvenio`, `NombreConvenio`, `Valor`, `NombreCliente`) VALUES
(14, 'almacenes exito', 150000, 'Jos? Galindo'),
(11, 'Convenio de las Monjas Adoradores del Divino miembro del Con', 9889274, 'Freddy  Ardila'),
(5, 'Universidad Javeriana Profesores', 2500000, 'Freddy Ardila'),
(3, 'Almacenes Exito Empleados', 2000000, 'otro cliente con apellido'),
(13, 'OTRO CONVENIO', 560000, 'otro cliente con apellido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `IdLugar` int(11) NOT NULL,
  `Lugar` varchar(50) DEFAULT NULL,
  `Disponibilidad` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`IdLugar`, `Lugar`, `Disponibilidad`) VALUES
(1, 'A1', 'Activo'),
(2, 'A2', 'Activo'),
(3, 'A3', 'Activo'),
(4, 'A4', 'Activo'),
(5, 'A5', 'Activo'),
(6, 'A6', 'Activo'),
(7, 'A7', 'Activo'),
(8, 'A8', 'Activo'),
(9, 'A9', 'Activo'),
(10, 'A10', 'Activo'),
(11, 'A11', 'Activo'),
(12, 'A12', 'Activo'),
(13, 'A13', 'Activo'),
(14, 'A14', 'Activo'),
(15, 'A15', 'Activo'),
(16, 'A16', 'Falso'),
(17, 'A17', 'Activo'),
(18, 'A18', 'Activo'),
(19, 'A19', 'Activo'),
(20, 'A20', 'Activo'),
(21, 'A21', 'Activo'),
(22, 'A22', 'Activo'),
(23, 'A23', 'Activo'),
(24, 'A24', 'Activo'),
(25, 'A25', 'Activo'),
(26, 'A26', 'Activo'),
(27, 'A27', 'Activo'),
(28, 'A28', 'Activo'),
(29, 'A29', 'Activo'),
(30, 'A30', 'Activo'),
(31, 'A31', 'Activo'),
(32, 'A32', 'Activo'),
(33, 'A33', 'Activo'),
(34, 'A34', 'Activo'),
(35, 'A35', 'Activo'),
(36, 'A36', 'Activo'),
(37, 'A37', 'Activo'),
(38, 'A38', 'Activo'),
(39, 'A39', 'Activo'),
(40, 'A40', 'Activo'),
(41, 'A41', 'Activo'),
(42, 'A42', 'Activo'),
(43, 'A43', 'Activo'),
(44, 'A44', 'Activo'),
(45, 'A45', 'Activo'),
(46, 'A46', 'Activo'),
(47, 'A47', 'Activo'),
(48, 'A48', 'Activo'),
(49, 'A49', 'Activo'),
(50, 'A50', 'Activo'),
(51, 'A51', 'Inactivo'),
(52, 'A52', 'Inactivo'),
(53, 'A53', 'Inactivo'),
(54, 'A54', 'Inactivo'),
(55, 'A55', 'Inactivo'),
(56, 'A56', 'Inactivo'),
(57, 'A57', 'Inactivo'),
(58, 'A58', 'Inactivo'),
(59, 'A59', 'Inactivo'),
(60, 'A60', 'Inactivo'),
(61, 'A61', 'Inactivo'),
(62, 'A62', 'Inactivo'),
(63, 'A63', 'Inactivo'),
(64, 'A64', 'Inactivo'),
(65, 'A65', 'Inactivo'),
(66, 'A66', 'Inactivo'),
(67, 'A67', 'Inactivo'),
(68, 'A68', 'Inactivo'),
(69, 'A69', 'Inactivo'),
(70, 'A70', 'Inactivo'),
(71, 'A71', 'Inactivo'),
(72, 'A72', 'Inactivo'),
(73, 'A73', 'Inactivo'),
(74, 'A74', 'Inactivo'),
(75, 'A75', 'Inactivo'),
(76, 'A76', 'Inactivo'),
(77, 'A77', 'Inactivo'),
(78, 'A78', 'Inactivo'),
(79, 'A79', 'Inactivo'),
(80, 'A80', 'Inactivo'),
(81, 'A81', 'Inactivo'),
(82, 'A82', 'Inactivo'),
(83, 'A83', 'Inactivo'),
(84, 'A84', 'Inactivo'),
(85, 'A85', 'Inactivo'),
(86, 'A86', 'Inactivo'),
(87, 'A87', 'Inactivo'),
(88, 'A88', 'Inactivo'),
(89, 'A89', 'Inactivo'),
(90, 'A90', 'Inactivo'),
(91, 'A91', 'Inactivo'),
(92, 'A92', 'Inactivo'),
(93, 'A93', 'Inactivo'),
(94, 'A94', 'Inactivo'),
(95, 'A95', 'Inactivo'),
(96, 'A96', 'Inactivo'),
(97, 'A97', 'Inactivo'),
(98, 'A98', 'Inactivo'),
(99, 'A99', 'Inactivo'),
(100, 'A100', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `disponibilidadp`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `disponibilidadp` (
`Fecha_Ingreso` date
,`Hora_Entrada` time
,`Placas` varchar(100)
,`Lugar` varchar(100)
,`NombreCliente` varchar(100)
,`Marca` varchar(30)
,`Tipo` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `IdEmpleado` int(11) NOT NULL,
  `TipoDeDocumento` varchar(100) DEFAULT NULL,
  `Documento` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`IdEmpleado`, `TipoDeDocumento`, `Documento`, `Nombre`, `Apellidos`, `Cargo`) VALUES
(9, 'Cedula de ciudadania', '79958300', 'Miguel', 'Galindo Sánchez', 'Administrador'),
(11, 'Cedula de ciudadania', '79448730', 'Juan carlos', 'Salcedo Barreto', 'Administrador'),
(14, 'Cedula de ciudadania', '80125920', 'Freddy Camilo', 'Ardila Amortegui', 'Gerente'),
(15, 'Cedula de ciudadania', '98765432', 'Mario Manuel', 'Murillo Toro', 'Cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `IdControlIngreso` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tiempo` time NOT NULL,
  `TipoTarifa` varchar(100) NOT NULL,
  `Placas` varchar(100) NOT NULL,
  `NombreEmpleado` varchar(100) NOT NULL,
  `Lugar` varchar(100) NOT NULL,
  `fechasalida` date NOT NULL,
  `horasalida` time NOT NULL,
  `estado` varchar(100) NOT NULL,
  `liquidado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`IdControlIngreso`, `fecha`, `tiempo`, `TipoTarifa`, `Placas`, `NombreEmpleado`, `Lugar`, `fechasalida`, `horasalida`, `estado`, `liquidado`) VALUES
(1, '2019-06-26', '15:59:00', 'Minuto', 'WER09E', 'Freddy Ardila', 'A2', '2019-06-26', '15:59:00', '', 'Si'),
(2, '2019-07-02', '18:53:00', '', 'AER56U', 'Jose Miguel Galindo', 'A16', '2019-07-02', '19:16:00', '', 'Si'),
(3, '2019-07-02', '19:20:00', '', 'RCB789', 'Freddy Ardila', 'A27', '2019-07-04', '20:25:00', '', 'Si'),
(4, '2019-07-02', '19:22:00', '', 'ASD123', 'Freddy Ardila', 'A21', '2019-07-02', '19:22:00', '', 'Si'),
(5, '2019-07-02', '19:43:00', '', 'VFR431', 'Freddy Ardila', 'A21', '2019-07-02', '19:44:00', '', 'Si'),
(6, '2019-07-02', '19:46:00', '', 'MQK480', 'Freddy Ardila', 'A21', '2019-07-02', '19:46:00', '', 'Si'),
(7, '2019-07-02', '19:48:00', '', 'ASD123', 'Freddy Ardila', 'A20', '2019-07-02', '19:52:00', '', ''),
(8, '2019-07-02', '19:55:00', '', 'MQK480', 'Freddy Ardila', 'A24', '2019-07-02', '19:56:00', '', 'Si'),
(9, '2019-07-02', '19:58:00', '', 'FGT123', 'Freddy Ardila', 'A25', '2019-07-02', '19:58:00', '', 'Si'),
(10, '2019-07-02', '20:31:00', '', 'AER56U', 'Freddy Ardila', 'A26', '2019-07-02', '20:34:00', '', 'Si'),
(11, '2019-07-02', '21:16:00', '', 'VFR431', 'Freddy Ardila', 'A27', '2019-07-02', '21:24:00', '', 'Si'),
(12, '2019-07-03', '19:00:00', '', 'WER09E', 'Freddy Ardila', 'A1', '2019-07-03', '19:01:00', '', 'Si'),
(13, '2019-07-29', '19:11:00', '', 'RCB789', 'Freddy Ardila', 'A18', '2019-07-29', '19:13:00', '', 'Si'),
(14, '2019-07-31', '20:55:00', '', 'RCB789', 'Jose Miguel Galindo', 'A29', '2019-08-25', '19:46:00', '', 'Si'),
(100, '2019-08-23', '16:36:00', '', 'RCB789', 'Daniel Hernandez', 'A28', '2019-08-23', '16:36:00', '', ''),
(112, '2019-09-30', '17:24:00', '', 'ASD123', 'Freddy Ardila', 'A15', '0000-00-00', '00:00:00', 'Activo', 'No'),
(111, '2019-08-26', '19:43:00', '', 'RCB789', 'Freddy Ardila', 'A1', '2019-08-26', '19:44:00', '', 'No'),
(110, '2019-08-26', '19:39:00', '', 'RCB789', 'Freddy Ardila', 'A1', '2019-08-26', '19:40:00', '', 'Si'),
(109, '2019-08-26', '19:12:00', '', 'ERT45B', 'Jose Miguel Galindo', 'A17', '2019-08-26', '19:14:00', '', ''),
(108, '2019-08-26', '19:11:00', '', 'ARB345', 'Jose Miguel Galindo', 'A4', '2019-08-26', '19:35:00', '', ''),
(107, '2019-08-26', '18:48:00', '', 'ERT45B', 'Juan Carlos Salcedo', 'A14', '2019-08-26', '18:49:00', '', ''),
(106, '2019-08-26', '16:06:00', '', 'RCB789', 'Daniel Hernandez', 'A2', '2019-08-26', '16:09:00', '', ''),
(105, '2019-08-26', '15:58:00', '', 'ASD123', 'Daniel Hernandez', 'A1', '2019-08-26', '16:13:00', '', ''),
(104, '2019-08-25', '19:56:00', '', 'HJK908', 'Daniel Hernandez', 'A20', '2019-08-25', '19:57:00', '', ''),
(103, '2019-08-25', '19:50:00', '', 'HJK908', 'Daniel Hernandez', 'A19', '2019-08-25', '19:51:00', '', ''),
(102, '2019-08-25', '19:48:00', '', 'RCB789', 'Daniel Hernandez', 'A20', '2019-08-25', '19:49:00', '', ''),
(101, '2019-08-25', '08:12:00', '', 'FGT123', 'Daniel Hernandez', 'A30', '2019-08-25', '19:18:00', '', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Chevrolet'),
(4, 'Fiat'),
(5, 'Ford'),
(6, 'Honda'),
(7, 'Jeep'),
(8, 'Kia'),
(9, 'Mazda'),
(10, 'Mercedes-Benz'),
(11, 'Mitsubishi'),
(12, 'Nissan'),
(13, 'Peugeot'),
(14, 'Renault'),
(15, 'Skoda'),
(16, 'SsangYong'),
(17, 'Suzuki'),
(18, 'Toyota'),
(19, 'Volkswagen'),
(21, 'AKT'),
(22, 'Yamaha'),
(23, 'Pulsar'),
(24, 'KTM'),
(25, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL,
  `nivel` varchar(100) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `nivel`, `Estado`) VALUES
(2, 'Administrador', 'Falso'),
(3, 'Supervisor', 'Verdadero'),
(4, 'Vendedor', 'Verdadero'),
(5, 'Guarda', 'Verdadero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `id_cantidad` int(11) NOT NULL,
  `Nombre_Empresa` varchar(100) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefonos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `cantidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`id_cantidad`, `Nombre_Empresa`, `identificacion`, `Direccion`, `Telefonos`, `correo`, `cantidad`) VALUES
(7, 'Parqueaderos del Sur', 900187123, 'Calle 40 Sur # 13 45', '3183563478-4563444', 'julitoramirez@hotmail.com', '50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id_tarifa` int(11) NOT NULL,
  `tarifa` varchar(100) NOT NULL,
  `valor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id_tarifa`, `tarifa`, `valor`) VALUES
(1, 'Dia', 20500),
(2, 'Hora', 3400),
(3, 'Hora Feliz', 2800),
(4, 'Minuto', 60),
(5, 'Convenio', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo`
--

CREATE TABLE `tiempo` (
  `IdControlTiempo` int(11) NOT NULL,
  `Fechaliquidacion` date DEFAULT NULL,
  `Placas` varchar(100) NOT NULL,
  `Fecha_Entrada` date NOT NULL,
  `Fecha_Salida` date NOT NULL,
  `Hora_Entrada` time NOT NULL,
  `Hora_Salida` time NOT NULL,
  `liquidado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_documento`
--

CREATE TABLE `tipo_de_documento` (
  `id_tipo` int(11) NOT NULL,
  `nombre_documento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_documento`
--

INSERT INTO `tipo_de_documento` (`id_tipo`, `nombre_documento`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Cedula de extranjeria'),
(3, 'NIT'),
(4, 'Cedula Diplomatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_vehiculo`
--

CREATE TABLE `tipo_de_vehiculo` (
  `id_tipov` int(11) NOT NULL,
  `nombre_tipov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_vehiculo`
--

INSERT INTO `tipo_de_vehiculo` (`id_tipov`, `nombre_tipov`) VALUES
(1, 'Automovil'),
(2, 'MicroBus'),
(3, 'Motocicletas'),
(4, 'Bicicleta'),
(5, 'Tractocamion'),
(6, 'Carreta');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `total_tiempo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `total_tiempo` (
`placas` varchar(100)
,`Fecha_Ingreso` date
,`Fecha_Salida` date
,`Hora_Entrada` time
,`Hora_Salida` time
,`Liquidado` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` char(100) NOT NULL,
  `nombre` char(50) NOT NULL,
  `usuario` char(50) DEFAULT NULL,
  `contrasena` char(50) DEFAULT NULL,
  `privilegio` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `nombre`, `usuario`, `contrasena`, `privilegio`) VALUES
(7, 'freddycardila@gmail.com', 'Freddy Ardila', 'freddycardila', 'Y2FtaWxvMDEx', 'Superusuario'),
(46, 'hola@hotmail.com', 'Juan Carlos Salcedo', 'jcsalcedo', 'MTIzNDU2Nzg5MA==', 'Administrador'),
(47, 'danielruge@gmail.com', 'Daniel Hernandez', 'dhernandez', 'QXNkZjEyMzQ1Ng==', 'Supervisor'),
(49, 'jmgalindo00@misena.edu.co', 'Jose Miguel Galindo', 'mgalindo', 'MTIzNDU2Nzg5MA==', 'Vendedor'),
(50, 'freddycardila@gmail.com', 'pepito perez', 'pepito', 'UGVwaXRvMTIzNA==', 'Vigilante'),
(51, 'hola@hotmail.com', 'Mario Muñoz', 'mmunoz', 'MTIzNDU2Nzg5MA==', 'Supervisor'),
(52, 'julitoramirez@hotmail.com', 'Julio Ramírez', 'jramirez', 'MTIzNDU2', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `IdVehiculoCliente` int(11) NOT NULL,
  `TipoV` varchar(100) NOT NULL,
  `Placas` varchar(20) DEFAULT NULL,
  `Marca` varchar(30) DEFAULT NULL,
  `Referencia` varchar(30) DEFAULT NULL,
  `Color` varchar(30) DEFAULT NULL,
  `Modelo` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `NombreCliente` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`IdVehiculoCliente`, `TipoV`, `Placas`, `Marca`, `Referencia`, `Color`, `Modelo`, `Descripcion`, `NombreCliente`, `Estado`) VALUES
(6, 'Automovil', 'RCB789', 'Mazda', '3', 'Gris ratón', '2009', 'Ninguna', 'Winston De Farias ', 'NingunaActivo'),
(7, 'Motocicleta', 'AER56U', 'Yamaha', 'R3', 'Azul y blanco', '2006', 'Ninguna', 'Freddy  Ardila', 'Inactivo'),
(8, 'Autom�vil', 'FGT123', 'MERCEDES BENZ', '250', 'AZUL', '1988', 'PUERTA IZQ RAYADA', 'otro cliente con apellido', 'Inactivo'),
(9, 'Autom�vil', 'HJK908', 'Mazda', '3', 'Rojo', '2008', 'Dañada a puerta', 'Jose Rodriguez', 'Inactivo'),
(11, 'Motocicletas', 'QQQ34R', 'Kimitsu', 'z300', 'Rojo', '2011', 'Siniestrada', 'Freddy  Ardila', 'Inactivo'),
(12, 'MicroBus', 'VFR431', 'Mitsubishi', '2300', 'Negra', '2001', 'Ninguna', 'otro cliente con apellido', 'Inactivo'),
(13, 'MicroBus', 'MQK480', 'gada', 'ada', 'ADO', '1980', 'FEO COMO EL SOLO', 'otro cliente con apellido', 'Inactivo'),
(14, 'Motocicletas', 'WER09E', 'suzuki', 'ax100', 'rojo', '97', 'buen estado', 'Freddy  Ardila', 'Inactivo'),
(15, 'Automovil', 'ASD123', 'mercedes Benz', 'gla200', 'blanco', '2017', 'puerta izq rayada', 'Mario Anibal Beltr�n Ruiz', 'Inactivo'),
(16, 'Motocicletas', 'QJH23F', 'AKT', 'NKD 125', 'Negro', '2011', 'Motocicleta Sencilla', 'Freddy  Ardila', 'Activo'),
(17, 'MicroBus', 'ERT45B', 'MAZDA', 'C70', 'AZUL', '2000', 'rayado por todo lado', 'Mario Anibal Beltr�n Ruiz', 'Activo'),
(18, 'Tractocamion', 'ZDFHD12', 'ISUZU', 'C1000', 'GRIS VERDOSO', 'DE PASARELA', 'ESTRELLADO ADO', 'Freddy  Ardila', 'Activo'),
(19, 'Automovil', 'ERT45B', 'MERCEDES BENZ', 'QC70', 'GRIS', '1908', 'PUERTA DER VIDRIO ROTO', 'Mario Anibal Beltr�n Ruiz', 'Activo'),
(20, 'Automovil', 'ARB345', 'Mazda', '323', 'Rojo', '1995', 'Birn', 'Jose Rodriguez', 'Activo'),
(21, 'Motocicletas', 'REW44E', 'Yamaha', '125', 'Negra', '2018', 'Con maletero', 'Jose Rodriguez', 'Activo');

-- --------------------------------------------------------

--
-- Estructura para la vista `disponibilidadp`
--
DROP TABLE IF EXISTS `disponibilidadp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `disponibilidadp`  AS  select distinct `ingresos`.`fecha` AS `Fecha_Ingreso`,`ingresos`.`tiempo` AS `Hora_Entrada`,`ingresos`.`Placas` AS `Placas`,`ingresos`.`Lugar` AS `Lugar`,`vehiculos`.`NombreCliente` AS `NombreCliente`,`vehiculos`.`Marca` AS `Marca`,`vehiculos`.`TipoV` AS `Tipo` from (`ingresos` left join `vehiculos` on(`ingresos`.`Placas` = `vehiculos`.`Placas`)) where `ingresos`.`estado` = 'Activo' order by `ingresos`.`Lugar` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `total_tiempo`
--
DROP TABLE IF EXISTS `total_tiempo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_tiempo`  AS  select `ingresos`.`Placas` AS `placas`,`ingresos`.`fecha` AS `Fecha_Ingreso`,`ingresos`.`fechasalida` AS `Fecha_Salida`,`ingresos`.`tiempo` AS `Hora_Entrada`,`ingresos`.`horasalida` AS `Hora_Salida`,`ingresos`.`liquidado` AS `Liquidado` from `ingresos` where `ingresos`.`liquidado` = 'No' ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`IdConvenio`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`IdEmpleado`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`IdControlIngreso`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id_cantidad`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id_tarifa`);

--
-- Indices de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  ADD PRIMARY KEY (`IdControlTiempo`);

--
-- Indices de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_de_vehiculo`
--
ALTER TABLE `tipo_de_vehiculo`
  ADD PRIMARY KEY (`id_tipov`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`IdVehiculoCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `IdConvenio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `IdControlIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `id_cantidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id_tarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  MODIFY `IdControlTiempo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_de_vehiculo`
--
ALTER TABLE `tipo_de_vehiculo`
  MODIFY `id_tipov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `IdVehiculoCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
