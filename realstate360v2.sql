-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2017 a las 00:20:54
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `realstate360v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE `agencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_p1` enum('NIF','otro') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NIF',
  `tipo_p2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_sociedad` enum('S.A.','otro') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S.A.',
  `razon_social` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `movil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `movil_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais_id` int(10) UNSIGNED DEFAULT NULL,
  `codigo_postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `municipio_id` int(10) UNSIGNED DEFAULT NULL,
  `via_id` int(10) UNSIGNED DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `piso` enum('Sótano','Subsótano','Bajos','Entresuelo','Principal','1ro','2do','3ro','4to','5to') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Principal',
  `escalera` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puerta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notas` text COLLATE utf8_unicode_ci,
  `caducidad_inmuebles` tinyint(1) NOT NULL DEFAULT '1',
  `caducidad_demandas` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `agencias`
--

INSERT INTO `agencias` (`id`, `user_id`, `nombre`, `tipo_p1`, `tipo_p2`, `tipo_sociedad`, `razon_social`, `telefono`, `telefono_de`, `movil`, `movil_de`, `fax`, `fax_de`, `email`, `email_de`, `web`, `pais_id`, `codigo_postal`, `municipio_id`, `via_id`, `calle`, `numero`, `piso`, `escalera`, `puerta`, `notas`, `caducidad_inmuebles`, `caducidad_demandas`, `created_at`, `updated_at`) VALUES
(1, 1, 'Demo', 'NIF', NULL, 'S.A.', NULL, '04167782345', 'Otro', NULL, 'Otro', NULL, 'Otro', 'agencia1@mail.com', 'Otro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Principal', NULL, NULL, NULL, 1, 1, NULL, NULL),
(2, 2, 'Demo', 'NIF', NULL, 'S.A.', NULL, '0276324122', 'Otro', NULL, 'Otro', NULL, 'Otro', 'agencia2@mail.com', 'Otro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Principal', NULL, NULL, NULL, 1, 1, '2017-09-19 23:32:14', '2017-09-19 23:32:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentes`
--

CREATE TABLE `agentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_default.jpg',
  `idioma_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acceso` tinyint(1) NOT NULL DEFAULT '1',
  `rol` enum('Gestor','Propietario','Comercial') COLLATE utf8_unicode_ci NOT NULL,
  `lun_man` tinyint(1) NOT NULL DEFAULT '0',
  `lun_tar` tinyint(1) NOT NULL DEFAULT '0',
  `mar_man` tinyint(1) NOT NULL DEFAULT '0',
  `mar_tar` tinyint(1) NOT NULL DEFAULT '0',
  `mie_man` tinyint(1) NOT NULL DEFAULT '0',
  `mie_tar` tinyint(1) NOT NULL DEFAULT '0',
  `jue_man` tinyint(1) NOT NULL DEFAULT '0',
  `jue_tar` tinyint(1) NOT NULL DEFAULT '0',
  `vie_man` tinyint(1) NOT NULL DEFAULT '0',
  `vie_tar` tinyint(1) NOT NULL DEFAULT '0',
  `sab_man` tinyint(1) NOT NULL DEFAULT '0',
  `sab_tar` tinyint(1) NOT NULL DEFAULT '0',
  `dom_man` tinyint(1) NOT NULL DEFAULT '0',
  `dom_tar` tinyint(1) NOT NULL DEFAULT '0',
  `tratamiento` tinyint(1) NOT NULL DEFAULT '1',
  `clientes_permitidos` tinyint(1) NOT NULL DEFAULT '1',
  `acciones_permitidas` tinyint(1) NOT NULL DEFAULT '1',
  `inmuebles_permitidos` tinyint(1) NOT NULL DEFAULT '1',
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_de` enum('Casa','Personal','Principal','Trabajo','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `movil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `movil_de` enum('Casa','Personal','Principal','Trabajo','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_de` enum('Casa','Personal','Principal','Trabajo','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `telefono2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_de2` enum('Casa','Personal','Principal','Trabajo','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `movil2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `movil_de2` enum('Casa','Personal','Principal','Trabajo','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `fax2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_de2` enum('Casa','Personal','Principal','Trabajo','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_de` enum('Casa','Personal','Principal','Trabajo','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `agencia_id` int(10) UNSIGNED NOT NULL,
  `departamento` enum('Comercial','Administracion','Gerencia') COLLATE utf8_unicode_ci NOT NULL,
  `cargo` enum('Comercial','Responsable Comercial','Comercial Junior','Administracion','Responsable Administracion','Gerencia','Direccion General') COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_alta` date NOT NULL,
  `notas` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Semisótano', NULL, NULL),
(2, 'Triplex', NULL, NULL),
(3, 'Dúplex', NULL, NULL),
(4, 'Buhardilla', NULL, NULL),
(5, 'Ático', NULL, NULL),
(6, 'Estudio', NULL, NULL),
(7, 'Loft', NULL, NULL),
(8, 'Otro', NULL, NULL),
(9, 'Piso', NULL, NULL),
(10, 'Apartamento', NULL, NULL),
(11, 'Planta Baja', NULL, NULL),
(12, 'Indiferente', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(10) UNSIGNED NOT NULL,
  `provincia_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `persorgz` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `calificativo` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_civil` enum('Casado','Soltero','Viudo','Divorciado','Separado Judicialmente','Union de Hechos','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `tipo_doc` enum('NIF','CIF','Pasaporte','NIE','DNI','Otro') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NIF',
  `tipo_doc_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idioma_id` int(10) UNSIGNED NOT NULL,
  `tipo_cliente` enum('Accionista','Agencia Colaboradora','Arrendador','Asociado','Colaborador','Competencia','Comprador','Constructor','Copropietario','Inquilino','Inversor','Operador','Permutante','Potencial Arrendador','Potencial Inquilino','Potencial Comprador','Potencial Vendedor','Prensa Especializada','Promotor','Traspasante','Vendedor','Banco') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Comprador',
  `origen` enum('Acciones de Buzoneo','Anuncio neon','anuncit.com','Buscador Web 2','cartel 2','Cliente recomendado','Colaborador','dividendo.es','EL CORREO','granmanzana.es','Idealista','Inmoportalix','Jornada Puertas Abiertas','Llamada Telefonica','micasa.es','mitula.com','Oficina/Escaparate','otro','pisocasas.com','plandeprotecciondealquiler.com','Redes Sociales','trovimap.com','una web','wordinmo.com') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'otro',
  `fecha_alta` date NOT NULL,
  `estado` enum('Inactivo','Activo','Potencial','Activo A','Activo B','Activo C','Activo D') COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `movil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `movil_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `telefono2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_de2` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `movil2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `movil_de2` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `fax2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_de2` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `email2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_de2` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais_id` int(10) UNSIGNED DEFAULT NULL,
  `codigo_postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `municipio_id` int(10) UNSIGNED DEFAULT NULL,
  `via_id` int(10) UNSIGNED DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `piso` enum('Principal','1ro','2do','3ro','4to','5to','Sótano','Subsótano','Bajos','Entresuelo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Principal',
  `escalera` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puerta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiporelacion` enum('Otro','Hijo(Hija)','Madre(Padre)','Esposo(Esposa)') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `calificativo_otrocont` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `nombre_otrocont` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ape_otrocont` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_otrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_otrocont_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `mov_otrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mov_otrocont_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `fax_otrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_otrocont_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `email_otrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_otrocont_de` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `tel_otrocont2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_otrocont_de2` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `mov_otrocont2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mov_otrocont_de2` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `fax_otrocont2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_otrocont_de2` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `email_otrocont2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_otrocont_de2` enum('Casa','Otro','Personal','Principal','Trabajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `fecha_nac_otrocon` date NOT NULL,
  `estado_civil_otrocon` enum('Casado','Soltero','Viudo','Divorciado','Separado Judicialmente','Union de Hechos','Otro') COLLATE utf8_unicode_ci NOT NULL,
  `tipo_doc_otrocon` enum('NIF','CIF','Pasaporte','NIE','DNI','Otro') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NIF',
  `tipo_doc_num_otrocon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idioma_otrocon` int(10) UNSIGNED NOT NULL,
  `pais_otrocont` int(10) UNSIGNED DEFAULT NULL,
  `codigo_postalotrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `municipio_idotrocont` int(10) UNSIGNED DEFAULT NULL,
  `via_idotrocont` int(10) UNSIGNED DEFAULT NULL,
  `calle_otrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_otrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `piso_otrocont` enum('Principal','1ro','2do','3ro','4to','5to','Sótano','Subsótano','Bajos','Entresuelo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Principal',
  `escalera_otrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puerta_otrocont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentarios` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `usuario_id`, `persorgz`, `calificativo`, `nombre`, `apellidos`, `alias`, `fecha_nacimiento`, `estado_civil`, `tipo_doc`, `tipo_doc_num`, `idioma_id`, `tipo_cliente`, `origen`, `fecha_alta`, `estado`, `telefono`, `telefono_de`, `movil`, `movil_de`, `fax`, `fax_de`, `email`, `email_de`, `telefono2`, `telefono_de2`, `movil2`, `movil_de2`, `fax2`, `fax_de2`, `email2`, `email_de2`, `web`, `pais_id`, `codigo_postal`, `municipio_id`, `via_id`, `calle`, `numero`, `piso`, `escalera`, `puerta`, `tiporelacion`, `calificativo_otrocont`, `nombre_otrocont`, `ape_otrocont`, `tel_otrocont`, `tel_otrocont_de`, `mov_otrocont`, `mov_otrocont_de`, `fax_otrocont`, `fax_otrocont_de`, `email_otrocont`, `email_otrocont_de`, `tel_otrocont2`, `tel_otrocont_de2`, `mov_otrocont2`, `mov_otrocont_de2`, `fax_otrocont2`, `fax_otrocont_de2`, `email_otrocont2`, `email_otrocont_de2`, `fecha_nac_otrocon`, `estado_civil_otrocon`, `tipo_doc_otrocon`, `tipo_doc_num_otrocon`, `idioma_otrocon`, `pais_otrocont`, `codigo_postalotrocont`, `municipio_idotrocont`, `via_idotrocont`, `calle_otrocont`, `numero_otrocont`, `piso_otrocont`, `escalera_otrocont`, `puerta_otrocont`, `comentarios`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1', 'Alberto', 'Hernandez', 'Albert', '2017-09-14', 'Viudo', 'NIF', '12345', 4, 'Arrendador', 'Anuncio neon', '2017-09-20', 'Activo A', '1345', 'Otro', '21345', 'Principal', '', 'Personal', 'cliente1@mail.com', 'Personal', '', '', '', '', NULL, '', '', '', 'www.cli1.com', 3, '2345', 2, 3, '12', '2', '2do', '2', '3', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', 0, 0, '', 0, 0, '', '', '', '', '', 'bla bla bladddd', '2017-09-21 02:34:53', '2017-09-21 05:49:35'),
(4, 1, '1', '1', 'Armando', 'Prieto', 'Armand', '2017-09-07', 'Viudo', 'Pasaporte', '312', 3, 'Accionista', 'Acciones de Buzoneo', '2017-09-07', 'Activo A', '123', 'Otro', '123', 'Otro', '', 'Trabajo', 'fwqf@wef.wer', 'Personal', '', '', '', '', NULL, '', '', '', 'qweqwe', 4, 'qwe', 1, 1, '2', '2', '2do', '2', '2', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', 0, 0, '', 0, 0, '', '', '', '', '', 'dssssssssssssssssss', '2017-09-21 05:34:33', '2017-09-21 05:49:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demandas`
--

CREATE TABLE `demandas` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `inmueble_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `origen_demanda` enum('Acciones de Buzoneo','Anuncio neon','anuncit.com','Buscador Web 2','cartel 2','Cliente recomendado','Colaborador','dividendo.es','EL CORREO','granmanzana.es','Idealista','Inmoportalix','Jornada Puertas Abiertas','Llamada Telefonica','micasa.es','mitula.com','Oficina/Escaparate','otro','pisocasas.com','plandeprotecciondealquiler.com','Redes Sociales','trovimap.com','una web','wordinmo.com') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'otro',
  `comunicacion` enum('Email','Llamada','Oficina') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Email',
  `tipo_demanda` enum('inmueble','describir_demanda') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inmueble',
  `opcion_busqueda` enum('basica','radio','mapa') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'basica',
  `tipo_inmueble_id` int(11) NOT NULL DEFAULT '1',
  `categoria_id` int(11) NOT NULL DEFAULT '1',
  `obranueva` enum('Si','No','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `adjudicacion` enum('Si','No','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `sup_desde` double NOT NULL DEFAULT '0',
  `sup_hasta` double NOT NULL DEFAULT '0',
  `venta` tinyint(1) NOT NULL DEFAULT '0',
  `ventaprecio_desde` double NOT NULL DEFAULT '0',
  `ventaprecio_hasta` double NOT NULL DEFAULT '0',
  `ventaprecio_desde_m2` double NOT NULL DEFAULT '0',
  `ventaprecio_hasta_m2` double NOT NULL DEFAULT '0',
  `alquiler_residencial` tinyint(1) NOT NULL DEFAULT '0',
  `alqres_precio_desde` double NOT NULL DEFAULT '0',
  `alqres_precio_hasta` double NOT NULL DEFAULT '0',
  `alqres_preciom2_desde` double NOT NULL DEFAULT '0',
  `alqres_preciom2_hasta` double NOT NULL DEFAULT '0',
  `opcioncompra` enum('Si','No','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `moneda` enum('EUR - Euro','USD - Dólar estadounidense') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EUR - Euro',
  `banos` int(11) NOT NULL DEFAULT '0',
  `habitaciones` int(11) NOT NULL DEFAULT '0',
  `pais_id` int(10) UNSIGNED NOT NULL,
  `provincia_id` int(10) UNSIGNED NOT NULL,
  `via_id` int(10) UNSIGNED NOT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zona` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `radio` int(10) UNSIGNED NOT NULL,
  `notas` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `demandas`
--

INSERT INTO `demandas` (`id`, `cliente_id`, `inmueble_id`, `origen_demanda`, `comunicacion`, `tipo_demanda`, `opcion_busqueda`, `tipo_inmueble_id`, `categoria_id`, `obranueva`, `adjudicacion`, `sup_desde`, `sup_hasta`, `venta`, `ventaprecio_desde`, `ventaprecio_hasta`, `ventaprecio_desde_m2`, `ventaprecio_hasta_m2`, `alquiler_residencial`, `alqres_precio_desde`, `alqres_precio_hasta`, `alqres_preciom2_desde`, `alqres_preciom2_hasta`, `opcioncompra`, `moneda`, `banos`, `habitaciones`, `pais_id`, `provincia_id`, `via_id`, `calle`, `numero`, `zona`, `radio`, `notas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Acciones de Buzoneo', 'Llamada', 'inmueble', 'basica', 1, 1, 'Indiferente', 'Indiferente', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 'EUR - Euro', 0, 0, 0, 0, 0, '', '', '', 0, '', '2017-09-21 06:27:42', '2017-09-21 06:27:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripciones`
--

CREATE TABLE `descripciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `idioma` enum('Español','Inglés','Portugués') COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_corta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_extendida` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(10) UNSIGNED NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Banco de Valencia', NULL, NULL),
(2, 'Ahorro Corporación', NULL, NULL),
(3, 'La Caja de Canarias', NULL, NULL),
(4, 'Banco Herrero / Solvia', NULL, NULL),
(5, 'No Definida', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exteriores`
--

CREATE TABLE `exteriores` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `balcones` tinyint(1) NOT NULL DEFAULT '0',
  `vista_al_mar` tinyint(1) NOT NULL DEFAULT '0',
  `jardin_privado` tinyint(1) NOT NULL DEFAULT '0',
  `patio` tinyint(1) NOT NULL DEFAULT '0',
  `piscina_ext` tinyint(1) NOT NULL DEFAULT '0',
  `piscina_comunitaria` tinyint(1) NOT NULL DEFAULT '0',
  `primera_linea_mar` tinyint(1) NOT NULL DEFAULT '0',
  `terraza` tinyint(1) NOT NULL DEFAULT '0',
  `vista_montana` tinyint(1) NOT NULL DEFAULT '0',
  `zona_comunitaria` tinyint(1) NOT NULL DEFAULT '0',
  `zona_deportiva` tinyint(1) NOT NULL DEFAULT '0',
  `zona_infantil` tinyint(1) NOT NULL DEFAULT '0',
  `solo_chicas` tinyint(1) NOT NULL DEFAULT '0',
  `solo_chicos` tinyint(1) NOT NULL DEFAULT '0',
  `solo_no_fumadores` tinyint(1) NOT NULL DEFAULT '0',
  `gastos_comunidad` tinyint(1) NOT NULL DEFAULT '0',
  `menos_2_mese_fianza` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `exteriores`
--

INSERT INTO `exteriores` (`id`, `inmueble_id`, `balcones`, `vista_al_mar`, `jardin_privado`, `patio`, `piscina_ext`, `piscina_comunitaria`, `primera_linea_mar`, `terraza`, `vista_montana`, `zona_comunitaria`, `zona_deportiva`, `zona_infantil`, `solo_chicas`, `solo_chicos`, `solo_no_fumadores`, `gastos_comunidad`, `menos_2_mese_fianza`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, '2017-09-21 05:55:12', '2017-09-21 05:55:12'),
(2, 2, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, '2017-09-30 10:24:30', '2017-09-30 10:24:30'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-09-30 22:45:02', '2017-09-30 22:45:02'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-09-30 22:48:18', '2017-09-30 22:48:18'),
(5, 5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, '2017-09-30 22:56:47', '2017-09-30 22:56:47'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 02:15:02', '2017-10-01 02:15:02'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 02:17:35', '2017-10-01 02:17:35'),
(8, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 03:16:05', '2017-10-01 03:16:05'),
(9, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 03:41:42', '2017-10-01 03:41:42'),
(10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 04:01:56', '2017-10-01 04:01:56'),
(11, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 04:04:33', '2017-10-01 04:04:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extras`
--

CREATE TABLE `extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED DEFAULT NULL,
  `calidades` enum('Baja','Buena','Escasa','Lujo','Muy Buena','Normal','Superlujo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal',
  `estado_aseos` enum('Buen estado','Necesita Reforma','Aseo de origen','Nuevo','Reformado') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Buen estado',
  `estado_banos` enum('Buen estado','Necesita Reforma','de origen','Nuevo','Reformado') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Buen estado',
  `estado_cocina` enum('Buen estado','Necesita Reforma','Cocina de origen','Nueva','Reformada') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Buen estado',
  `estado_edificio` enum('Buen estado','Necesita Reforma','En ruina','Nuevo','Reformado','Rehabilitado') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Buen estado',
  `tipo_edificio` enum('Clásico','Diseño','Moderno','Premiado','Regio','Representativo','Señorial','Singular') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Clásico',
  `obs_calidades` text COLLATE utf8_unicode_ci,
  `calidades_ok` tinyint(1) NOT NULL DEFAULT '0',
  `altura` int(11) NOT NULL,
  `num_hab_dobles` int(11) NOT NULL,
  `num_hab_individuales` int(11) NOT NULL,
  `num_suites` int(11) NOT NULL,
  `sup_util` int(11) NOT NULL,
  `sup_cocina` int(11) NOT NULL,
  `sup_edificada` int(11) NOT NULL,
  `sup_salon` int(11) NOT NULL,
  `sup_terrazas` int(11) NOT NULL,
  `obs_superficies` text COLLATE utf8_unicode_ci,
  `supydist_ok` tinyint(1) NOT NULL DEFAULT '0',
  `num_armarios` int(11) NOT NULL,
  `carp_exterior` enum('Aluminio','Aluminio Lacado','Hierro','Madera','Madera Barnizada','Madera Noble','Madera Pintada','Madera Teka','PVC') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Madera',
  `carp_interior` enum('Aluminio','Aluminio Lacado','Hierro','Madera','Madera Barnizada','Madera Embero','Madera Etimoe','Madera Haya','Madera Lacada','Madera Noble','Madera Pintada','Madera Sapelly','Madera Teka','PVC') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Madera',
  `persianas` int(11) NOT NULL,
  `puerta_principal` enum('Cuarterones','Hierro','Seguridad','Vidrio','Enrejada','Mazisa','Madera','Mixta','Normal','Reforzada') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal',
  `puertas_interiores` enum('Aluminio Lacado','Correderas','Cristal/Madera','Cuarterón','Embero','Etimoe','Inglesa','Nuevas','Rústicas','Sapelly','Tapizadas') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nuevas',
  `ventanas` enum('Aluminio','Climalit','Cuarterones','Persianas','Rejas','Doble cristal','Madera','PVC') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Madera',
  `obs_carpinteria` text COLLATE utf8_unicode_ci,
  `carpinteria_ok` tinyint(1) NOT NULL DEFAULT '0',
  `acabados_paredes` enum('Corcho','Estuco','Estuco Veneciano','Gotele','Madera','Moqueta','Papel','Acabado') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Acabado',
  `paredes_banos` enum('Alicatado Ceramico','Gresite','Madera','Marmol','Pintura Plastica','Yeso') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Madera',
  `paredes_cocina` enum('Alicatado Ceramico','Madera','Marmol','Pintura Plastica','Yeso') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Madera',
  `suelos` enum('Baldosa','Baldosa Rustica','Ceramico','Corcho','Gres','Madera','Marmol','Tarima','Terrazo','Gresite','Linoleo','Moqueta','Mosaico','Porcelanato') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Madera',
  `suelos_banos` enum('Baldosa','Ceramico','Corcho','Gres','Madera','Marmol','Parquet','Terrazo','Gresite','Linoleo','Mosaico','Porcelanato') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Baldosa',
  `suelos_cocina` enum('Baldosa','Ceramico','Corcho','Gres','Madera','Marmol','Parquet','Terrazo','Gresite','Linoleo','Mosaico','Porcelanato') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Baldosa',
  `techo` enum('Altillos en Techo','Falso Techo','Cielo Raso','Techo de Bobeda','Lucido Yeso','Placas Registrables','Techos Altos','Artesonados','Madera') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Madera',
  `paredes` enum('Hormigon','Ladrillo','Pladur','Tabique') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ladrillo',
  `banneras` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `griferia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plato_duchas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanitarios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `obs_acabados` text COLLATE utf8_unicode_ci,
  `acabados_ok` tinyint(1) NOT NULL DEFAULT '0',
  `agua` tinyint(1) NOT NULL DEFAULT '1',
  `gas` tinyint(1) NOT NULL DEFAULT '1',
  `telefono` tinyint(1) NOT NULL DEFAULT '1',
  `tvyfm` tinyint(1) NOT NULL DEFAULT '1',
  `agua_caliente` enum('Gas Butano','Gas Natural','Gas Propano','No tiene Gas','Termo-Electrico') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Gas Natural',
  `cocina` enum('Pequena','Americana','Amueblada','Con Armarios','Formica','Francesa','Kitchenette') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Amueblada',
  `electricidad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `electrodomesticos` enum('Calentador de Agua','Cocina','Cocina de Gas','Cocina Electrica','Cocina Vitrocerámica','Congelador','Equipo de Musica','Frigorifico','Hilo/Ambiente musical','Horno de Gas','Horno Eléctrico','Lavavajillas','Muchos electrodomesticos','Secadora','Triturador Basura','Video') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Cocina',
  `equipamientos` enum('Antena TV Colectiva','Antena TV Parabolica','Auditorio','Centralita Telefonos','Electricidad Instalada','Hilo Musical/Musica Ambiental','Lineas Digitales','Lineas Telefono Analogicas','Megafonia','Musica Ambiente','Portero Electronico','Red Datos','Red Datos Perimetral','Sala de Juntas') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Antena TV Colectiva',
  `fontaneria` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iluminacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instalaciones` enum('Agua Propia','Aire Comprimido','Caja Fuerte','Camara Frigorifica','Contador Agua','Contador Gas','Contador Luz','Deposito de Combustible','Deposito Residuos Contaminantes','Deposito Residuos Liquidos','Deposito Residuos Solidos','Depuradora','Electricidad','Estanterias de Almacenaje','Extraccion Forzada de Aire','Foso','Gas','Grupo Electrogeno','Iluminacion Patio Exterior','Lineas Telefonicas','Linea Cenital','Linea Lateral','Megafonia Interior','Plataforma Elevadora','Polipasto','Puente Grua','Trasnformador') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Contador Luz',
  `instalaciones_edificio` enum('Agua Comunitaria','Aspirotec','Bajante Recogida de Basuras','Bocas Incendio en Edificio','Columna Seca','Electricidad Comunitaria','Escalera de Incendios','Extintores Edificio','Gas Butano','Gas Ciudad','Gas Propano') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Agua Comunitaria',
  `instalaciones_privadas` enum('Acometida de Agua pie parc','Acometida de Gas pie parc','Acometida de Luz pie parc','Barbacoa','Cuadras','Deposito de Agua','Embarcadero','Fosa Septica','Fronton','Glorieta/Cenador','Iluminacion Jardin','Invernadero','Pozo Propio','Riego Automatico','Sistemas Domoticos','Squash') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Acometida de Agua pie parc',
  `refrigeracion` enum('Aacc Central','Aacc Consolas','Aacc Frio Calor','Aacc Solo Frio') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Aacc Frio Calor',
  `interruptores` int(11) NOT NULL,
  `mecanismos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seguridad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tomasdeagua` int(11) NOT NULL,
  `obs_instalaciones` text COLLATE utf8_unicode_ci,
  `instysum_ok` tinyint(1) NOT NULL DEFAULT '0',
  `gastos_comunidad` int(11) DEFAULT NULL,
  `calidad_precio` enum('Buen Precio','Caro','Ganga','Muy Caro','Precio Justo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Buen Precio',
  `rentabilidad` tinyint(1) NOT NULL DEFAULT '0',
  `obs_datoseconomicos` text COLLATE utf8_unicode_ci,
  `dateco_ok` tinyint(1) NOT NULL DEFAULT '0',
  `construccion` enum('Bloque Granito','Bloque Toro','Hormigon Prefabricado','Ladrillo Obra Vista','Obra Metalica','Plancha Metalica') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Bloque Granito',
  `estilo_construccion` enum('Casa de Pueblo','Cortijo','Diseno Exclusivo','Diseno Moderno','Estilo Pirenaico','Estilo Clasico','Estilo Colonial','Estilo Neoclásico','Estilo Provenzal','Estilo Rustico','Masía','Molino','Otras','Pazo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Estilo Clasico',
  `estructura` enum('Hormigon','Madera','Metalica','Mixta','Vigas de Madera') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Madera',
  `portalyescalera` enum('Entrada servicio independiente','Portal noble','Portal señorial','Portal sin escalones','Portal y caja de escaleras') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Entrada servicio independiente',
  `puerta_entrada` enum('Barrera Vigilada','Persiana','Persiana Automatica','Puerta Abatible Manual','Puerta Batiente Automatica','Puerta Batiente Manual','Puerta Manual') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Puerta Manual',
  `numfachadas` int(11) NOT NULL,
  `obs_finca` text COLLATE utf8_unicode_ci,
  `finca_ok` tinyint(1) NOT NULL DEFAULT '0',
  `calif_urbana` enum('Conservacion centro historico','Densificacion urbana intensiva','Densificacion urbana semi-intensiva','Industrial','Remodelacion privada','Remodelacion publica','Sub-zonas plurifamiliares','Sub-zonas unifamiliares','Sustitucion edificacion antigua','Verde privado protegido') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Industrial',
  `cercania_a` enum('Campo de Golf','Playa','Lago','Mar','Pantano','Pistas de Esquí','Pueblo','Río','Primera Línea de Playa','Segunda Línea de Playa') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Mar',
  `elementos_comunitarios` enum('Antena colectiva','Antena parabolica','Club social','Fronton','Interfono','Piscina','Pista de tenis','Portero automatico','Sala de lavanderia','Solarium','Squash','Television por cable','Television por satelite','Terrado con tendedero') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Television por cable',
  `entorno` enum('Cerca zona comercial','Edificio aislado','Pocos vecinos','Zona alto nivel','Zona bien comunicada','Zona céntrica','Zona habitada permanentemente','Zona rural','Zona tranquila','Zona urbana') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Zona urbana',
  `equipamientos_zonas` enum('Cerca campo golf','Cerca colegios','Cerca farmacia','Cerca guarderia','Cerca instalaciones colectivas','Cerca mercado','Cerca parque publico','Cerca supermercado','Cerca zona comercial') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Cerca mercado',
  `grado_urbanizacion` enum('Alto','Bajo','Medio','Muy Alto','Muy Bajo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Medio',
  `sol` enum('Muy luminosos','Sol mañanas','Sol tardes','Sol todo el dia','Soleado') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Soleado',
  `transportes_publicos` enum('Bien comunicado transp. publicos','Cerca aeropuerto','Cerca autobuses','Cerca estacion ferrocarril','Cerca estacion tren cercanias','Cerca metro','Cerca puerto','Cerca tranvia','Comunicaciones bien','Comunicaciones mal','Comunicaciones muy bien transp. publicos','Comunicaciones muy buenas','Comunicaciones regular') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Cerca autobuses',
  `vistas` enum('Buenas vistas','Vistas a patio interior manzana','Vistas a calle','Vistas a campo de golf','Vistas a estacion de esqui','Vistas a la ciudad','Vistas a la montana','Vistas a la piscina','Vistas a la zona comunitaria','Vistas a la zona deportiva','Vistas a la zona verde','Vistas a mar y montana','Vistas a parque nacional','Vistas a parque publico','Vistas a patio interior ajardinado','Vistas a plaza','Vistas al lago','Vistas al mar','Vistas al puerto','Vistas al valle') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Vistas a calle',
  `distancia_poblacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs_situacion` text COLLATE utf8_unicode_ci,
  `siten_ok` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `extras`
--

INSERT INTO `extras` (`id`, `inmueble_id`, `calidades`, `estado_aseos`, `estado_banos`, `estado_cocina`, `estado_edificio`, `tipo_edificio`, `obs_calidades`, `calidades_ok`, `altura`, `num_hab_dobles`, `num_hab_individuales`, `num_suites`, `sup_util`, `sup_cocina`, `sup_edificada`, `sup_salon`, `sup_terrazas`, `obs_superficies`, `supydist_ok`, `num_armarios`, `carp_exterior`, `carp_interior`, `persianas`, `puerta_principal`, `puertas_interiores`, `ventanas`, `obs_carpinteria`, `carpinteria_ok`, `acabados_paredes`, `paredes_banos`, `paredes_cocina`, `suelos`, `suelos_banos`, `suelos_cocina`, `techo`, `paredes`, `banneras`, `griferia`, `plato_duchas`, `sanitarios`, `obs_acabados`, `acabados_ok`, `agua`, `gas`, `telefono`, `tvyfm`, `agua_caliente`, `cocina`, `electricidad`, `electrodomesticos`, `equipamientos`, `fontaneria`, `iluminacion`, `instalaciones`, `instalaciones_edificio`, `instalaciones_privadas`, `refrigeracion`, `interruptores`, `mecanismos`, `seguridad`, `tomasdeagua`, `obs_instalaciones`, `instysum_ok`, `gastos_comunidad`, `calidad_precio`, `rentabilidad`, `obs_datoseconomicos`, `dateco_ok`, `construccion`, `estilo_construccion`, `estructura`, `portalyescalera`, `puerta_entrada`, `numfachadas`, `obs_finca`, `finca_ok`, `calif_urbana`, `cercania_a`, `elementos_comunitarios`, `entorno`, `equipamientos_zonas`, `grado_urbanizacion`, `sol`, `transportes_publicos`, `vistas`, `distancia_poblacion`, `obs_situacion`, `siten_ok`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Normal', 'Buen estado', 'Buen estado', 'Buen estado', 'Buen estado', 'Clásico', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 'Madera', 'Madera', 0, 'Normal', 'Nuevas', 'Madera', NULL, 0, 'Acabado', 'Madera', 'Madera', 'Madera', 'Baldosa', 'Baldosa', 'Madera', 'Ladrillo', '', '', '', '', NULL, 0, 1, 1, 1, 1, 'Gas Natural', 'Amueblada', NULL, 'Cocina', 'Antena TV Colectiva', NULL, NULL, 'Contador Luz', 'Agua Comunitaria', 'Acometida de Agua pie parc', 'Aacc Frio Calor', 0, NULL, NULL, 0, NULL, 0, NULL, 'Buen Precio', 0, NULL, 0, 'Bloque Granito', 'Estilo Clasico', 'Madera', 'Entrada servicio independiente', 'Puerta Manual', 0, NULL, 0, 'Industrial', 'Mar', 'Television por cable', 'Zona urbana', 'Cerca mercado', 'Medio', 'Soleado', 'Cerca autobuses', 'Vistas a calle', NULL, NULL, 0, NULL, '2017-09-21 05:55:12', '2017-09-21 05:55:12'),
(2, 2, 'Normal', 'Buen estado', 'Buen estado', 'Buen estado', 'Buen estado', 'Clásico', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 'Madera', 'Madera', 0, 'Normal', 'Nuevas', 'Madera', NULL, 0, 'Acabado', 'Madera', 'Madera', 'Madera', 'Baldosa', 'Baldosa', 'Madera', 'Ladrillo', '', '', '', '', NULL, 0, 1, 1, 1, 1, 'Gas Natural', 'Amueblada', NULL, 'Cocina', 'Antena TV Colectiva', NULL, NULL, 'Contador Luz', 'Agua Comunitaria', 'Acometida de Agua pie parc', 'Aacc Frio Calor', 0, NULL, NULL, 0, NULL, 0, NULL, 'Buen Precio', 0, NULL, 0, 'Bloque Granito', 'Estilo Clasico', 'Madera', 'Entrada servicio independiente', 'Puerta Manual', 0, NULL, 0, 'Industrial', 'Mar', 'Television por cable', 'Zona urbana', 'Cerca mercado', 'Medio', 'Soleado', 'Cerca autobuses', 'Vistas a calle', NULL, NULL, 0, NULL, '2017-09-30 10:24:30', '2017-09-30 10:24:30'),
(6, 6, 'Normal', 'Buen estado', 'Buen estado', 'Buen estado', 'Buen estado', 'Clásico', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 'Madera', 'Madera', 0, 'Normal', 'Nuevas', 'Madera', NULL, 0, 'Acabado', 'Madera', 'Madera', 'Madera', 'Baldosa', 'Baldosa', 'Madera', 'Ladrillo', '', '', '', '', NULL, 0, 1, 1, 1, 1, 'Gas Natural', 'Amueblada', NULL, 'Cocina', 'Antena TV Colectiva', NULL, NULL, 'Contador Luz', 'Agua Comunitaria', 'Acometida de Agua pie parc', 'Aacc Frio Calor', 0, NULL, NULL, 0, NULL, 0, NULL, 'Buen Precio', 0, NULL, 0, 'Bloque Granito', 'Estilo Clasico', 'Madera', 'Entrada servicio independiente', 'Puerta Manual', 0, NULL, 0, 'Industrial', 'Mar', 'Television por cable', 'Zona urbana', 'Cerca mercado', 'Medio', 'Soleado', 'Cerca autobuses', 'Vistas a calle', NULL, NULL, 0, NULL, '2017-10-01 02:15:02', '2017-10-01 02:15:02'),
(7, 7, 'Normal', 'Buen estado', 'Buen estado', 'Buen estado', 'Buen estado', 'Clásico', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 'Madera', 'Madera', 0, 'Normal', 'Nuevas', 'Madera', NULL, 0, 'Acabado', 'Madera', 'Madera', 'Madera', 'Baldosa', 'Baldosa', 'Madera', 'Ladrillo', '', '', '', '', NULL, 0, 1, 1, 1, 1, 'Gas Natural', 'Amueblada', NULL, 'Cocina', 'Antena TV Colectiva', NULL, NULL, 'Contador Luz', 'Agua Comunitaria', 'Acometida de Agua pie parc', 'Aacc Frio Calor', 0, NULL, NULL, 0, NULL, 0, NULL, 'Buen Precio', 0, NULL, 0, 'Bloque Granito', 'Estilo Clasico', 'Madera', 'Entrada servicio independiente', 'Puerta Manual', 0, NULL, 0, 'Industrial', 'Mar', 'Television por cable', 'Zona urbana', 'Cerca mercado', 'Medio', 'Soleado', 'Cerca autobuses', 'Vistas a calle', NULL, NULL, 0, NULL, '2017-10-01 02:17:35', '2017-10-01 02:17:35'),
(8, 8, 'Normal', 'Buen estado', 'Buen estado', 'Buen estado', 'Buen estado', 'Clásico', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 'Madera', 'Madera', 0, 'Normal', 'Nuevas', 'Madera', NULL, 0, 'Acabado', 'Madera', 'Madera', 'Madera', 'Baldosa', 'Baldosa', 'Madera', 'Ladrillo', '', '', '', '', NULL, 0, 1, 1, 1, 1, 'Gas Natural', 'Amueblada', NULL, 'Cocina', 'Antena TV Colectiva', NULL, NULL, 'Contador Luz', 'Agua Comunitaria', 'Acometida de Agua pie parc', 'Aacc Frio Calor', 0, NULL, NULL, 0, NULL, 0, NULL, 'Buen Precio', 0, NULL, 0, 'Bloque Granito', 'Estilo Clasico', 'Madera', 'Entrada servicio independiente', 'Puerta Manual', 0, NULL, 0, 'Industrial', 'Mar', 'Television por cable', 'Zona urbana', 'Cerca mercado', 'Medio', 'Soleado', 'Cerca autobuses', 'Vistas a calle', NULL, NULL, 0, NULL, '2017-10-01 03:16:05', '2017-10-01 03:16:05'),
(9, 9, 'Normal', 'Buen estado', 'Buen estado', 'Buen estado', 'Buen estado', 'Clásico', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 'Madera', 'Madera', 0, 'Normal', 'Nuevas', 'Madera', NULL, 0, 'Acabado', 'Madera', 'Madera', 'Madera', 'Baldosa', 'Baldosa', 'Madera', 'Ladrillo', '', '', '', '', NULL, 0, 1, 1, 1, 1, 'Gas Natural', 'Amueblada', NULL, 'Cocina', 'Antena TV Colectiva', NULL, NULL, 'Contador Luz', 'Agua Comunitaria', 'Acometida de Agua pie parc', 'Aacc Frio Calor', 0, NULL, NULL, 0, NULL, 0, NULL, 'Buen Precio', 0, NULL, 0, 'Bloque Granito', 'Estilo Clasico', 'Madera', 'Entrada servicio independiente', 'Puerta Manual', 0, NULL, 0, 'Industrial', 'Mar', 'Television por cable', 'Zona urbana', 'Cerca mercado', 'Medio', 'Soleado', 'Cerca autobuses', 'Vistas a calle', NULL, NULL, 0, NULL, '2017-10-01 03:41:42', '2017-10-01 03:41:42'),
(10, 10, 'Normal', 'Buen estado', 'Buen estado', 'Buen estado', 'Buen estado', 'Clásico', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 'Madera', 'Madera', 0, 'Normal', 'Nuevas', 'Madera', NULL, 0, 'Acabado', 'Madera', 'Madera', 'Madera', 'Baldosa', 'Baldosa', 'Madera', 'Ladrillo', '', '', '', '', NULL, 0, 1, 1, 1, 1, 'Gas Natural', 'Amueblada', NULL, 'Cocina', 'Antena TV Colectiva', NULL, NULL, 'Contador Luz', 'Agua Comunitaria', 'Acometida de Agua pie parc', 'Aacc Frio Calor', 0, NULL, NULL, 0, NULL, 0, NULL, 'Buen Precio', 0, NULL, 0, 'Bloque Granito', 'Estilo Clasico', 'Madera', 'Entrada servicio independiente', 'Puerta Manual', 0, NULL, 0, 'Industrial', 'Mar', 'Television por cable', 'Zona urbana', 'Cerca mercado', 'Medio', 'Soleado', 'Cerca autobuses', 'Vistas a calle', NULL, NULL, 0, NULL, '2017-10-01 04:01:56', '2017-10-01 04:01:56'),
(11, 11, 'Normal', 'Buen estado', 'Buen estado', 'Buen estado', 'Buen estado', 'Clásico', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 'Madera', 'Madera', 0, 'Normal', 'Nuevas', 'Madera', NULL, 0, 'Acabado', 'Madera', 'Madera', 'Madera', 'Baldosa', 'Baldosa', 'Madera', 'Ladrillo', '', '', '', '', NULL, 0, 1, 1, 1, 1, 'Gas Natural', 'Amueblada', NULL, 'Cocina', 'Antena TV Colectiva', NULL, NULL, 'Contador Luz', 'Agua Comunitaria', 'Acometida de Agua pie parc', 'Aacc Frio Calor', 0, NULL, NULL, 0, NULL, 0, NULL, 'Buen Precio', 0, NULL, 0, 'Bloque Granito', 'Estilo Clasico', 'Madera', 'Entrada servicio independiente', 'Puerta Manual', 0, NULL, 0, 'Industrial', 'Mar', 'Television por cable', 'Zona urbana', 'Cerca mercado', 'Medio', 'Soleado', 'Cerca autobuses', 'Vistas a calle', NULL, NULL, 0, NULL, '2017-10-01 04:04:33', '2017-10-01 04:04:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extrasdemandas`
--

CREATE TABLE `extrasdemandas` (
  `id` int(10) UNSIGNED NOT NULL,
  `demanda_id` int(10) UNSIGNED DEFAULT NULL,
  `calidades` enum('Baja','Buena','Escasa','Lujo','Muy Buena','Normal','Superlujo','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `estado_aseos` enum('Buen estado','Necesita Reforma','Aseo de origen','Nuevo','Reformado','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `estado_banos` enum('Buen estado','Necesita Reforma','de origen','Nuevo','Reformado','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `estado_cocina` enum('Buen estado','Necesita Reforma','Cocina de origen','Nueva','Reformada','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `estado_edificio` enum('Buen estado','Necesita Reforma','En ruina','Nuevo','Reformado','Rehabilitado','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `tipo_edificio` enum('Clásico','Diseño','Moderno','Premiado','Regio','Representativo','Señorial','Singular','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `obs_calidades` text COLLATE utf8_unicode_ci,
  `altura_desde` int(11) DEFAULT NULL,
  `altura_hasta` int(11) DEFAULT NULL,
  `hab2_desde` int(11) DEFAULT NULL,
  `hab2_hasta` int(11) DEFAULT NULL,
  `hab1_desde` int(11) DEFAULT NULL,
  `hab1_hasta` int(11) DEFAULT NULL,
  `suites_desde` int(11) DEFAULT NULL,
  `suites_hasta` int(11) DEFAULT NULL,
  `suputil_desde` int(11) DEFAULT NULL,
  `suputil_hasta` int(11) DEFAULT NULL,
  `supsalon_desde` int(11) DEFAULT NULL,
  `supsalon_hasta` int(11) DEFAULT NULL,
  `supcoci_desde` int(11) DEFAULT NULL,
  `supcoci_hasta` int(11) DEFAULT NULL,
  `supedif_desde` int(11) DEFAULT NULL,
  `supedif_hasta` int(11) DEFAULT NULL,
  `supterr_desde` int(11) DEFAULT NULL,
  `supterr_hasta` int(11) DEFAULT NULL,
  `obs_superficies` text COLLATE utf8_unicode_ci,
  `armarios_desde` int(11) DEFAULT NULL,
  `armarios_hasta` int(11) DEFAULT NULL,
  `carp_exterior` enum('Aluminio','Aluminio Lacado','Hierro','Madera','Madera Barnizada','Madera Noble','Madera Pintada','Madera Teka','PVC','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `carp_interior` enum('Aluminio','Aluminio Lacado','Hierro','Madera','Madera Barnizada','Madera Embero','Madera Etimoe','Madera Haya','Madera Lacada','Madera Noble','Madera Pintada','Madera Sapelly','Madera Teka','PVC','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `persianas` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puerta_principal` enum('Cuarterones','Hierro','Seguridad','Vidrio','Enrejada','Mazisa','Madera','Mixta','Normal','Reforzada','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `puertas_interiores` enum('Aluminio Lacado','Correderas','Cristal/Madera','Cuarterón','Embero','Etimoe','Inglesa','Nuevas','Rústicas','Sapelly','Tapizadas','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `ventanas` enum('Aluminio','Climalit','Cuarterones','Persianas','Rejas','Doble cristal','Madera','PVC','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `obs_carpinteria` text COLLATE utf8_unicode_ci,
  `acabados_paredes` enum('Corcho','Estuco','Estuco Veneciano','Gotele','Madera','Moqueta','Papel','Acabado','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `paredes_banos` enum('Alicatado Ceramico','Gresite','Madera','Marmol','Pintura Plastica','Yeso','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `paredes_cocina` enum('Alicatado Ceramico','Madera','Marmol','Pintura Plastica','Yeso','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `suelos` enum('Baldosa','Baldosa Rustica','Ceramico','Corcho','Gres','Madera','Marmol','Tarima','Terrazo','Gresite','Linoleo','Moqueta','Mosaico','Porcelanato','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `suelos_banos` enum('Baldosa','Ceramico','Corcho','Gres','Madera','Marmol','Parquet','Terrazo','Gresite','Linoleo','Mosaico','Porcelanato','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `suelos_cocina` enum('Baldosa','Ceramico','Corcho','Gres','Madera','Marmol','Parquet','Terrazo','Gresite','Linoleo','Mosaico','Porcelanato','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `techo` enum('Altillos en Techo','Falso Techo','Cielo Raso','Techo de Bobeda','Lucido Yeso','Placas Registrables','Techos Altos','Artesonados','Madera','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `paredes` enum('Hormigon','Ladrillo','Pladur','Tabique') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ladrillo',
  `banneras` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `griferia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plato_duchas` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanitarios` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs_acabados` text COLLATE utf8_unicode_ci,
  `agua` enum('1','0','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `gas` enum('1','0','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `telefono` enum('1','0','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `tvyfm` enum('1','0','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `agua_caliente` enum('Gas Butano','Gas Natural','Gas Propano','No tiene Gas','Termo-Electrico','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `cocina` enum('Pequena','Americana','Amueblada','Con Armarios','Formica','Francesa','Kitchenette','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `electricidad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `electrodomesticos` enum('Calentador de Agua','Cocina','Cocina de Gas','Cocina Electrica','Cocina Vitrocerámica','Congelador','Equipo de Musica','Frigorifico','Hilo/Ambiente musical','Horno de Gas','Horno Eléctrico','Lavavajillas','Muchos electrodomesticos','Secadora','Triturador Basura','Video','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `equipamientos` enum('Antena TV Colectiva','Antena TV Parabolica','Auditorio','Centralita Telefonos','Electricidad Instalada','Hilo Musical/Musica Ambiental','Lineas Digitales','Lineas Telefono Analogicas','Megafonia','Musica Ambiente','Portero Electronico','Red Datos','Red Datos Perimetral','Sala de Juntas','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `fontaneria` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iluminacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instalaciones` enum('Agua Propia','Aire Comprimido','Caja Fuerte','Camara Frigorifica','Contador Agua','Contador Gas','Contador Luz','Deposito de Combustible','Deposito Residuos Contaminantes','Deposito Residuos Liquidos','Deposito Residuos Solidos','Depuradora','Electricidad','Estanterias de Almacenaje','Extraccion Forzada de Aire','Foso','Gas','Grupo Electrogeno','Iluminacion Patio Exterior','Lineas Telefonicas','Linea Cenital','Linea Lateral','Megafonia Interior','Plataforma Elevadora','Polipasto','Puente Grua','Trasnformador','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `instalaciones_edificio` enum('Agua Comunitaria','Aspirotec','Bajante Recogida de Basuras','Bocas Incendio en Edificio','Columna Seca','Electricidad Comunitaria','Escalera de Incendios','Extintores Edificio','Gas Butano','Gas Ciudad','Gas Propano','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `instalaciones_privadas` enum('Acometida de Agua pie parc','Acometida de Gas pie parc','Acometida de Luz pie parc','Barbacoa','Cuadras','Deposito de Agua','Embarcadero','Fosa Septica','Fronton','Glorieta/Cenador','Iluminacion Jardin','Invernadero','Pozo Propio','Riego Automatico','Sistemas Domoticos','Squash','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `refrigeracion` enum('Aacc Central','Aacc Consolas','Aacc Frio Calor','Aacc Solo Frio','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `interruptores` int(11) DEFAULT NULL,
  `mecanismos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seguridad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tomasdeagua` int(11) DEFAULT NULL,
  `obs_instalaciones` text COLLATE utf8_unicode_ci,
  `gastoscom_desde` int(11) DEFAULT NULL,
  `gastoscom_hasta` int(11) DEFAULT NULL,
  `calidad_precio` enum('Buen Precio','Caro','Ganga','Muy Caro','Precio Justo','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `rentabilidad` enum('1','0','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `obs_datoseconomicos` text COLLATE utf8_unicode_ci,
  `construccion` enum('Bloque Granito','Bloque Toro','Hormigon Prefabricado','Ladrillo Obra Vista','Obra Metalica','Plancha Metalica','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `estilo_construccion` enum('Casa de Pueblo','Cortijo','Diseno Exclusivo','Diseno Moderno','Estilo Pirenaico','Estilo Clasico','Estilo Colonial','Estilo Neoclásico','Estilo Provenzal','Estilo Rustico','Masía','Molino','Otras','Pazo','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `estructura` enum('Hormigon','Madera','Metalica','Mixta','Vigas de Madera','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `portalyescalera` enum('Entrada servicio independiente','Portal noble','Portal señorial','Portal sin escalones','Portal y caja de escaleras','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `puerta_entrada` enum('Barrera Vigilada','Persiana','Persiana Automatica','Puerta Abatible Manual','Puerta Batiente Automatica','Puerta Batiente Manual','Puerta Manual','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `numfach_desde` int(11) DEFAULT NULL,
  `numfach_hasta` int(11) DEFAULT NULL,
  `obs_finca` text COLLATE utf8_unicode_ci,
  `calif_urbana` enum('Conservacion centro historico','Densificacion urbana intensiva','Densificacion urbana semi-intensiva','Industrial','Remodelacion privada','Remodelacion publica','Sub-zonas plurifamiliares','Sub-zonas unifamiliares','Sustitucion edificacion antigua','Verde privado protegido','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `cercania_a` enum('Campo de Golf','Playa','Lago','Mar','Pantano','Pistas de Esquí','Pueblo','Río','Primera Línea de Playa','Segunda Línea de Playa','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `elementos_comunitarios` enum('Antena colectiva','Antena parabolica','Club social','Fronton','Interfono','Piscina','Pista de tenis','Portero automatico','Sala de lavanderia','Solarium','Squash','Television por cable','Television por satelite','Terrado con tendedero','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `entorno` enum('Cerca zona comercial','Edificio aislado','Pocos vecinos','Zona alto nivel','Zona bien comunicada','Zona céntrica','Zona habitada permanentemente','Zona rural','Zona tranquila','Zona urbana','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `equipamientos_zonas` enum('Cerca campo golf','Cerca colegios','Cerca farmacia','Cerca guarderia','Cerca instalaciones colectivas','Cerca mercado','Cerca parque publico','Cerca supermercado','Cerca zona comercial','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `grado_urbanizacion` enum('Alto','Bajo','Medio','Muy Alto','Muy Bajo','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `sol` enum('Muy luminosos','Sol mañanas','Sol tardes','Sol todo el dia','Soleado','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `transportes_publicos` enum('Bien comunicado transp. publicos','Cerca aeropuerto','Cerca autobuses','Cerca estacion ferrocarril','Cerca estacion tren cercanias','Cerca metro','Cerca puerto','Cerca tranvia','Comunicaciones bien','Comunicaciones mal','Comunicaciones muy bien transp. publicos','Comunicaciones muy buenas','Comunicaciones regular','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `vistas` enum('Buenas vistas','Vistas a patio interior manzana','Vistas a calle','Vistas a campo de golf','Vistas a estacion de esqui','Vistas a la ciudad','Vistas a la montana','Vistas a la piscina','Vistas a la zona comunitaria','Vistas a la zona deportiva','Vistas a la zona verde','Vistas a mar y montana','Vistas a parque nacional','Vistas a parque publico','Vistas a patio interior ajardinado','Vistas a plaza','Vistas al lago','Vistas al mar','Vistas al puerto','Vistas al valle','Indiferente') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Indiferente',
  `distancia_poblacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs_situacion` text COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `extrasdemandas`
--

INSERT INTO `extrasdemandas` (`id`, `demanda_id`, `calidades`, `estado_aseos`, `estado_banos`, `estado_cocina`, `estado_edificio`, `tipo_edificio`, `obs_calidades`, `altura_desde`, `altura_hasta`, `hab2_desde`, `hab2_hasta`, `hab1_desde`, `hab1_hasta`, `suites_desde`, `suites_hasta`, `suputil_desde`, `suputil_hasta`, `supsalon_desde`, `supsalon_hasta`, `supcoci_desde`, `supcoci_hasta`, `supedif_desde`, `supedif_hasta`, `supterr_desde`, `supterr_hasta`, `obs_superficies`, `armarios_desde`, `armarios_hasta`, `carp_exterior`, `carp_interior`, `persianas`, `puerta_principal`, `puertas_interiores`, `ventanas`, `obs_carpinteria`, `acabados_paredes`, `paredes_banos`, `paredes_cocina`, `suelos`, `suelos_banos`, `suelos_cocina`, `techo`, `paredes`, `banneras`, `griferia`, `plato_duchas`, `sanitarios`, `obs_acabados`, `agua`, `gas`, `telefono`, `tvyfm`, `agua_caliente`, `cocina`, `electricidad`, `electrodomesticos`, `equipamientos`, `fontaneria`, `iluminacion`, `instalaciones`, `instalaciones_edificio`, `instalaciones_privadas`, `refrigeracion`, `interruptores`, `mecanismos`, `seguridad`, `tomasdeagua`, `obs_instalaciones`, `gastoscom_desde`, `gastoscom_hasta`, `calidad_precio`, `rentabilidad`, `obs_datoseconomicos`, `construccion`, `estilo_construccion`, `estructura`, `portalyescalera`, `puerta_entrada`, `numfach_desde`, `numfach_hasta`, `obs_finca`, `calif_urbana`, `cercania_a`, `elementos_comunitarios`, `entorno`, `equipamientos_zonas`, `grado_urbanizacion`, `sol`, `transportes_publicos`, `vistas`, `distancia_poblacion`, `obs_situacion`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Indiferente', 'Indiferente', NULL, 'Indiferente', 'Indiferente', 'Indiferente', NULL, 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Ladrillo', NULL, NULL, NULL, NULL, NULL, 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', NULL, 'Indiferente', 'Indiferente', NULL, NULL, 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Indiferente', 'Indiferente', NULL, 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', NULL, NULL, NULL, 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', 'Indiferente', NULL, NULL, NULL, '2017-09-21 06:27:43', '2017-09-21 06:27:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finca`
--

CREATE TABLE `finca` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `ascensor` tinyint(1) NOT NULL DEFAULT '0',
  `conserje` tinyint(1) NOT NULL DEFAULT '0',
  `energia_solar` tinyint(1) NOT NULL DEFAULT '0',
  `garage_privado` tinyint(1) NOT NULL DEFAULT '0',
  `parking_comunitario` tinyint(1) NOT NULL DEFAULT '0',
  `trastero` tinyint(1) NOT NULL DEFAULT '0',
  `video_portero` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `finca`
--

INSERT INTO `finca` (`id`, `inmueble_id`, `ascensor`, `conserje`, `energia_solar`, `garage_privado`, `parking_comunitario`, `trastero`, `video_portero`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 0, 0, '2017-09-21 05:55:12', '2017-09-21 05:55:12'),
(2, 2, 0, 0, 1, 1, 0, 0, 0, '2017-09-30 10:24:30', '2017-09-30 10:24:30'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, '2017-09-30 22:45:02', '2017-09-30 22:45:02'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, '2017-09-30 22:48:18', '2017-09-30 22:48:18'),
(5, 5, 0, 0, 0, 0, 1, 0, 0, '2017-09-30 22:56:47', '2017-09-30 22:56:47'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 02:15:02', '2017-10-01 02:15:02'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 02:17:35', '2017-10-01 02:17:35'),
(8, 8, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 03:16:05', '2017-10-01 03:16:05'),
(9, 9, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 03:41:42', '2017-10-01 03:41:42'),
(10, 10, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 04:01:56', '2017-10-01 04:01:56'),
(11, 11, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 04:04:33', '2017-10-01 04:04:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Español', NULL, NULL),
(2, 'Francés', NULL, NULL),
(3, 'Inglés', NULL, NULL),
(4, 'Portugués', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `inmueble_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'inmueble_150595713595.jpg', '2017-09-21 05:55:35', '2017-09-21 05:55:35'),
(2, 1, 'inmueble_150595713598.JPG', '2017-09-21 05:55:35', '2017-09-21 05:55:35'),
(3, 1, 'inmueble_150595713652.jpg', '2017-09-21 05:55:36', '2017-09-21 05:55:36'),
(4, 2, 'inmueble_150675090324.jpg', '2017-09-30 10:25:03', '2017-09-30 10:25:03'),
(5, 2, 'inmueble_150675090327.jpg', '2017-09-30 10:25:03', '2017-09-30 10:25:03'),
(6, 2, 'inmueble_15067509046.jpg', '2017-09-30 10:25:04', '2017-09-30 10:25:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgpromos`
--

CREATE TABLE `imgpromos` (
  `id` int(10) UNSIGNED NOT NULL,
  `promocion_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `obranueva` tinyint(1) NOT NULL DEFAULT '0',
  `promocion_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `adjbancaria` tinyint(1) NOT NULL DEFAULT '0',
  `entidad_id` int(10) UNSIGNED NOT NULL,
  `fecha_alta` date NOT NULL,
  `estado` enum('disponible','reservado','captacion','nodisponible','enconstruccion') COLLATE utf8_unicode_ci NOT NULL,
  `periodicidad` enum('Indiferente','Diario','Semana','Mes') COLLATE utf8_unicode_ci NOT NULL,
  `agencia_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `superficie` double NOT NULL,
  `superficie_solar` double NOT NULL,
  `ocultarsuperficie` tinyint(1) NOT NULL DEFAULT '0',
  `modalidad_id` int(10) UNSIGNED NOT NULL,
  `zona` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `distrito_id` int(10) UNSIGNED NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `provincia_id` int(10) UNSIGNED NOT NULL,
  `codigo_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad_id` int(10) UNSIGNED NOT NULL,
  `pais_id` int(10) UNSIGNED NOT NULL,
  `via_id` int(10) UNSIGNED NOT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `piso` enum('Sótano','Subsótano','Bajos','Entresuelo','Principal','1ro','2do','3ro','4to','5to') COLLATE utf8_unicode_ci NOT NULL,
  `escalera` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mostrardireccion` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `id_portada` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moneda` enum('EUR - Euro','USD - Dólar estadounidense') COLLATE utf8_unicode_ci NOT NULL,
  `idioma_id` int(10) UNSIGNED NOT NULL,
  `descripcion_corta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_extendida` text COLLATE utf8_unicode_ci NOT NULL,
  `idioma_id2` int(10) UNSIGNED NOT NULL,
  `descripcion_corta2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_extendida2` text COLLATE utf8_unicode_ci NOT NULL,
  `persona` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mostrar_contacto` tinyint(1) NOT NULL DEFAULT '1',
  `anio_contruccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conservacion` enum('Buena','Muy Buena','Excelente','Regular','Necesita Reforma') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Buena',
  `orientacion` enum('norte','sur','este','oeste','noroeste','noreste','sureste','suroeste') COLLATE utf8_unicode_ci NOT NULL,
  `tiponave` enum('adosada','aislada') COLLATE utf8_unicode_ci NOT NULL,
  `obs_datos` text COLLATE utf8_unicode_ci NOT NULL,
  `extras_basicos` text COLLATE utf8_unicode_ci NOT NULL,
  `agua_caliente` enum('Gas Natural','Electricidad','Gasoleo','Butano','Propano','Solar') COLLATE utf8_unicode_ci NOT NULL,
  `calefaccion` enum('Gas Natural','Electricidad','Gasóleo','Butano','Propano','Solar') COLLATE utf8_unicode_ci NOT NULL,
  `certificado_energetico` enum('A','B','C','D','E','F','G','En Trámite','Excento') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'En Trámite',
  `num_despachos` int(11) NOT NULL,
  `num_aseos` int(11) NOT NULL,
  `habitaciones` int(11) NOT NULL,
  `banos` int(11) NOT NULL,
  `camas` int(11) NOT NULL,
  `num_registro_turismo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `tipo_id`, `lat`, `lng`, `categoria_id`, `cliente_id`, `obranueva`, `promocion_id`, `adjbancaria`, `entidad_id`, `fecha_alta`, `estado`, `periodicidad`, `agencia_id`, `usuario_id`, `nombre`, `superficie`, `superficie_solar`, `ocultarsuperficie`, `modalidad_id`, `zona`, `distrito_id`, `municipio_id`, `provincia_id`, `codigo_postal`, `ciudad_id`, `pais_id`, `via_id`, `calle`, `numero`, `piso`, `escalera`, `puerta`, `mostrardireccion`, `id_portada`, `maps`, `moneda`, `idioma_id`, `descripcion_corta`, `descripcion_extendida`, `idioma_id2`, `descripcion_corta2`, `descripcion_extendida2`, `persona`, `mostrar_contacto`, `anio_contruccion`, `conservacion`, `orientacion`, `tiponave`, `obs_datos`, `extras_basicos`, `agua_caliente`, `calefaccion`, `certificado_energetico`, `num_despachos`, `num_aseos`, `habitaciones`, `banos`, `camas`, `num_registro_turismo`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 8, 0, 1, 0, 1, 3, '2017-09-15', 'captacion', 'Indiferente', 1, 1, '', 123, 0, 0, 1, 'Centro', 0, 1, 0, '123', 0, 3, 2, '12', '2', 'Bajos', '3', '2', '1', '2', '', 'EUR - Euro', 1, 'bla bla bla', 'bla bla bla bla', 0, '', '', 'Pedro', 1, '-', 'Regular', 'suroeste', 'adosada', '', '', 'Gasoleo', 'Electricidad', 'D', 0, 2, 2, 3, 0, '2', 1, '2017-09-21 05:55:12', '2017-09-21 05:55:12'),
(2, 2, 0, 0, 10, 0, 1, 0, 1, 2, '2017-09-06', 'disponible', 'Indiferente', 1, 1, '', 2, 0, 0, 2, 'centro', 0, 2, 0, '123', 0, 2, 4, '2', '3', 'Entresuelo', '2', '3', '1', NULL, '', 'EUR - Euro', 1, 'ferferf', 'rerfref', 0, '', '', 'erfref', 1, '-', 'Excelente', 'norte', 'adosada', '', '', 'Electricidad', 'Gasóleo', 'C', 0, 3, 3, 2, 0, '2', 1, '2017-09-30 10:24:30', '2017-09-30 10:24:30'),
(6, 2, 0, 0, 6, 0, 1, 0, 1, 4, '2017-09-21', 'enconstruccion', 'Indiferente', 2, 2, '', 1234, 0, 0, 12, 'wefewfwef', 0, 3, 0, '123', 0, 3, 2, '2', '2', 'Subsótano', '2', '2', '1', NULL, '', 'EUR - Euro', 1, 'wefwef', 'wefewf', 0, '', '', 'wefewf', 1, '-', 'Excelente', 'oeste', 'adosada', '', '', 'Electricidad', 'Gas Natural', 'D', 0, 2, 2, 2, 0, '2', 1, '2017-10-01 02:15:02', '2017-10-01 02:15:02'),
(7, 3, 0, 0, 8, 0, 1, 0, 1, 0, '2017-09-15', 'captacion', 'Indiferente', 2, 2, '', 1234, 0, 0, 13, 'wefewfwe', 0, 2, 0, '12', 0, 2, 3, '2', '3', 'Bajos', '2', '2', '1', NULL, '', 'EUR - Euro', 1, 'werewrewr', 'werewr', 0, '', '', 'rewrwer', 1, '-', 'Muy Buena', 'suroeste', 'adosada', '', '', 'Gasoleo', 'Gas Natural', 'B', 0, 12, 2, 2, 0, '2', 1, '2017-10-01 02:17:35', '2017-10-01 02:17:35'),
(8, 4, 0, 0, 10, 0, 1, 0, 1, 3, '0000-00-00', 'captacion', 'Indiferente', 2, 2, '', 2323, 0, 0, 14, 'wefwefew', 0, 3, 0, '12', 0, 2, 0, '2', '2', 'Subsótano', '3', '3', '1', NULL, '', 'EUR - Euro', 0, 'wferwg', 'ewgtewrgr', 0, '', '', 'erwgerwg', 1, '-', 'Muy Buena', 'este', 'adosada', '', '', 'Butano', 'Gasóleo', 'C', 0, 0, 2, 4, 0, '2', 1, '2017-10-01 03:16:05', '2017-10-01 03:16:05'),
(9, 2, 0, 0, 12, 0, 1, 1, 1, 2, '0000-00-00', 'captacion', 'Indiferente', 2, 2, '', 23, 0, 0, 15, '213', 0, 2, 0, '123', 0, 4, 0, '2', '3', 'Subsótano', '3', '23', '1', NULL, '', 'EUR - Euro', 0, 'werewr', 'werwer', 0, '', '', 'werwer', 1, '2017', 'Excelente', 'este', 'adosada', '', '', 'Gasoleo', 'Electricidad', 'C', 0, 0, 23, 2, 0, '2', 1, '2017-10-01 03:41:42', '2017-10-01 03:41:42'),
(10, 2, 8.01, -72.24, 4, 0, 1, 0, 1, 4, '2017-09-28', 'reservado', 'Indiferente', 2, 2, '', 321, 0, 0, 16, 'wrfwreg', 0, 2, 0, '3', 0, 2, 0, '2', '2', 'Principal', '2', '2', '1', NULL, '', 'EUR - Euro', 0, 'wefwe', 'fwef', 0, '', '', 'fewfwe', 1, '-', 'Muy Buena', 'suroeste', 'adosada', '', '', 'Gasoleo', 'Gasóleo', 'B', 0, 0, 2, 3, 0, '2', 1, '2017-10-01 04:01:56', '2017-10-01 04:01:56'),
(11, 2, 7.99, -72.21, 6, 0, 1, 0, 0, 0, '2017-09-22', 'reservado', 'Indiferente', 2, 2, '', 1234, 0, 0, 17, 'weefwef', 0, 3, 0, '213', 0, 3, 0, '2', '2', 'Bajos', '2', '3', '1', NULL, '', 'EUR - Euro', 0, 'wfwef', 'ewfewf', 0, '', '', 'ewfewf', 1, '1999', 'Regular', 'suroeste', 'adosada', '', '', 'Electricidad', 'Gasóleo', 'B', 0, 0, 2, 3, 0, '2', 1, '2017-10-01 04:04:33', '2017-10-01 04:04:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interiores`
--

CREATE TABLE `interiores` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `aire_acondicionado` tinyint(1) NOT NULL DEFAULT '0',
  `amueblado` tinyint(1) NOT NULL DEFAULT '0',
  `armarios` tinyint(1) NOT NULL DEFAULT '0',
  `cocina_equipada` tinyint(1) NOT NULL DEFAULT '0',
  `cocina_office` tinyint(1) NOT NULL DEFAULT '0',
  `calefaccion_int` tinyint(1) NOT NULL DEFAULT '0',
  `electrodomesticos` tinyint(1) NOT NULL DEFAULT '0',
  `domotica` tinyint(1) NOT NULL DEFAULT '0',
  `gresceramica` tinyint(1) NOT NULL DEFAULT '0',
  `horno` tinyint(1) NOT NULL DEFAULT '0',
  `internet` tinyint(1) NOT NULL DEFAULT '0',
  `wifi` tinyint(1) NOT NULL DEFAULT '0',
  `lavadora` tinyint(1) NOT NULL DEFAULT '0',
  `microondas` tinyint(1) NOT NULL DEFAULT '0',
  `nevera` tinyint(1) NOT NULL DEFAULT '0',
  `no_amueblado` tinyint(1) NOT NULL DEFAULT '0',
  `parquet` tinyint(1) NOT NULL DEFAULT '0',
  `puerta_blindada` tinyint(1) NOT NULL DEFAULT '0',
  `mascotas` tinyint(1) NOT NULL DEFAULT '0',
  `suite_con_bano` tinyint(1) NOT NULL DEFAULT '0',
  `lavadero` tinyint(1) NOT NULL DEFAULT '0',
  `television` tinyint(1) NOT NULL DEFAULT '0',
  `sauna` tinyint(1) NOT NULL DEFAULT '0',
  `piscina` tinyint(1) NOT NULL DEFAULT '0',
  `salida_de_humos` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `interiores`
--

INSERT INTO `interiores` (`id`, `inmueble_id`, `aire_acondicionado`, `amueblado`, `armarios`, `cocina_equipada`, `cocina_office`, `calefaccion_int`, `electrodomesticos`, `domotica`, `gresceramica`, `horno`, `internet`, `wifi`, `lavadora`, `microondas`, `nevera`, `no_amueblado`, `parquet`, `puerta_blindada`, `mascotas`, `suite_con_bano`, `lavadero`, `television`, `sauna`, `piscina`, `salida_de_humos`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-09-21 05:55:12', '2017-09-21 05:55:12'),
(2, 2, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-09-30 10:24:30', '2017-09-30 10:24:30'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-09-30 22:45:02', '2017-09-30 22:45:02'),
(4, 4, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-09-30 22:48:18', '2017-09-30 22:48:18'),
(5, 5, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-09-30 22:56:47', '2017-09-30 22:56:47'),
(6, 6, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 02:15:02', '2017-10-01 02:15:02'),
(7, 7, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 02:17:35', '2017-10-01 02:17:35'),
(8, 8, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 03:16:05', '2017-10-01 03:16:05'),
(9, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 03:41:42', '2017-10-01 03:41:42'),
(10, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 04:01:56', '2017-10-01 04:01:56'),
(11, 11, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-10-01 04:04:33', '2017-10-01 04:04:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internos`
--

CREATE TABLE `internos` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(11) NOT NULL,
  `agencia_id` int(11) NOT NULL,
  `agente_id` int(11) NOT NULL,
  `cliente_prop_id` int(11) NOT NULL,
  `alqres_precio_pub` double DEFAULT NULL,
  `alqres_precio_prop` double DEFAULT NULL,
  `honorarios` text COLLATE utf8_unicode_ci,
  `medio_captacion` enum('Acciones de Buzoneo','Anuncio neon','anuncit.com','Buscador Web 2','cartel 2','Cliente recomendado','Colaborador','dividendo.es','EL CORREO','granmanzana.es','Idealista','Inmoportalix','Jornada Puertas Abiertas','Llamada Telefonica','micasa.es','mitula.com','Oficina/Escaparate','otro','pisocasas.com','plandeprotecciondealquiler.com','Redes Sociales','trovimap.com','una web','wordinmo.com') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'otro',
  `contrato_firmado` tinyint(1) NOT NULL DEFAULT '0',
  `ini_contrato` date DEFAULT NULL,
  `fin_contrato` date DEFAULT NULL,
  `en_exclusica` tinyint(1) NOT NULL DEFAULT '0',
  `ubicacion_llaves` enum('Porteria','Oficina','Empresa delegada','Propietario','Inquilino') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Propietario',
  `comment_llaves` text COLLATE utf8_unicode_ci,
  `reg_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_tomo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_libro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_folio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_finca` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_registrode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_desregistral` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_catastral` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notas_int` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_04_09_173417_create_tipos_table', 1),
('2017_04_09_173700_create_paises_table', 1),
('2017_04_09_173835_create_provincias_table', 1),
('2017_04_09_174005_create_municipios_table', 1),
('2017_04_09_174054_create_ciudades_table', 1),
('2017_04_09_174145_create_distritos_table', 1),
('2017_04_09_174223_create_categorias_table', 1),
('2017_04_09_174304_create_agencias_table', 1),
('2017_04_09_174348_create_agentes_table', 1),
('2017_04_09_174700_create_inmuebles_table', 1),
('2017_04_09_174812_create_interiores_table', 1),
('2017_04_09_174917_create_exteriores_table', 1),
('2017_04_09_174953_create_fotos_table', 1),
('2017_04_09_175019_create_videos_table', 1),
('2017_04_09_175059_create_documentos_table', 1),
('2017_04_09_175146_create_finca_table', 1),
('2017_04_09_175230_create_descripciones_table', 1),
('2017_04_09_183747_create_entidades_table', 1),
('2017_04_09_212247_create_vias_table', 1),
('2017_04_09_223625_create_idiomas_table', 1),
('2017_04_10_165620_create_modalidades_table', 1),
('2017_04_14_210238_create_extras_table', 1),
('2017_04_21_225253_create_internos_table', 1),
('2017_04_26_135326_create_promociones_table', 1),
('2017_04_28_133202_create_acciones_table', 1),
('2017_05_01_150056_create_demandas_table', 1),
('2017_05_15_211300_create_imagenes_table', 1),
('2017_05_15_212402_create_archivos_table', 1),
('2017_05_22_134349_create_user_activations_table', 1),
('2017_05_23_185827_create_imgpromos_table', 1),
('2017_06_07_153346_create_clientes_table', 1),
('2017_06_21_130434_create_extrasdemandas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `venta` tinyint(1) NOT NULL DEFAULT '0',
  `ventaprecio` double NOT NULL,
  `ventaprecio2` double NOT NULL,
  `alquiler_residencial` tinyint(1) NOT NULL DEFAULT '0',
  `alqresprecio` double NOT NULL,
  `alqresprecio2` double NOT NULL,
  `opcion_compra` tinyint(1) NOT NULL DEFAULT '0',
  `opcioncompraprecio` double NOT NULL,
  `opcioncompraprecio2` double NOT NULL,
  `alquiler_vacacional` tinyint(1) NOT NULL DEFAULT '0',
  `alqvac_dia` tinyint(1) NOT NULL DEFAULT '0',
  `alqvac_dia_p` double NOT NULL,
  `alqvac_dia_pm2` double NOT NULL,
  `alqvac_semana` tinyint(1) NOT NULL DEFAULT '0',
  `alqvac_semana_p` double NOT NULL,
  `alqvac_semana_pm2` double NOT NULL,
  `alqvac_quincena` tinyint(1) NOT NULL DEFAULT '0',
  `alqvac_quincena_p` double NOT NULL,
  `alqvac_quincena_pm2` double NOT NULL,
  `alqvac_mes` tinyint(1) NOT NULL DEFAULT '0',
  `alqvac_mes_p` double NOT NULL,
  `alqvac_mes_pm2` double NOT NULL,
  `alqvac_temporada` tinyint(1) NOT NULL DEFAULT '0',
  `alqvac_temporada_p` double NOT NULL,
  `alqvac_temporada_pm2` double NOT NULL,
  `alqvac_anno` tinyint(1) NOT NULL DEFAULT '0',
  `alqvac_anno_p` double NOT NULL,
  `alqvac_anno_pm2` double NOT NULL,
  `traspaso` tinyint(1) NOT NULL DEFAULT '0',
  `traspasoprecio` double NOT NULL,
  `traspasoprecio2` double NOT NULL,
  `compartir` tinyint(1) NOT NULL DEFAULT '0',
  `periodicidad` enum('Indiferente','Diario','Semana','Mes') COLLATE utf8_unicode_ci NOT NULL,
  `compartirprecio` double NOT NULL,
  `compartirprecio2` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id`, `venta`, `ventaprecio`, `ventaprecio2`, `alquiler_residencial`, `alqresprecio`, `alqresprecio2`, `opcion_compra`, `opcioncompraprecio`, `opcioncompraprecio2`, `alquiler_vacacional`, `alqvac_dia`, `alqvac_dia_p`, `alqvac_dia_pm2`, `alqvac_semana`, `alqvac_semana_p`, `alqvac_semana_pm2`, `alqvac_quincena`, `alqvac_quincena_p`, `alqvac_quincena_pm2`, `alqvac_mes`, `alqvac_mes_p`, `alqvac_mes_pm2`, `alqvac_temporada`, `alqvac_temporada_p`, `alqvac_temporada_pm2`, `alqvac_anno`, `alqvac_anno_p`, `alqvac_anno_pm2`, `traspaso`, `traspasoprecio`, `traspasoprecio2`, `compartir`, `periodicidad`, `compartirprecio`, `compartirprecio2`, `created_at`, `updated_at`) VALUES
(1, 1, 1234, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-09-21 05:55:12', '2017-09-21 05:55:12'),
(2, 1, 3, 342, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-09-30 10:24:30', '2017-09-30 10:24:30'),
(3, 1, 1234, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-09-30 22:45:02', '2017-09-30 22:45:02'),
(4, 1, 1234, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-09-30 22:48:18', '2017-09-30 22:48:18'),
(5, 1, 3333, 22, 1, 3232, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2321, 23, 1, 'Diario', 323, 23, '2017-09-30 22:56:47', '2017-09-30 22:56:47'),
(6, 1, 123, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 02:02:28', '2017-10-01 02:02:28'),
(7, 1, 123, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 02:02:56', '2017-10-01 02:02:56'),
(8, 1, 123, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 02:04:07', '2017-10-01 02:04:07'),
(9, 1, 23, 2312, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 02:07:20', '2017-10-01 02:07:20'),
(10, 1, 23, 2312, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 02:08:42', '2017-10-01 02:08:42'),
(11, 1, 213, 213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 02:10:57', '2017-10-01 02:10:57'),
(12, 1, 123, 3214, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 02:15:02', '2017-10-01 02:15:02'),
(13, 1, 123, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 02:17:35', '2017-10-01 02:17:35'),
(14, 1, 234, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 03:16:05', '2017-10-01 03:16:05'),
(15, 1, 32, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 03:41:42', '2017-10-01 03:41:42'),
(16, 1, 3214, 213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 04:01:56', '2017-10-01 04:01:56'),
(17, 1, 23, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Indiferente', 0, 0, '2017-10-01 04:04:33', '2017-10-01 04:04:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(10) UNSIGNED NOT NULL,
  `provincia_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `provincia_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abajas', NULL, NULL),
(2, 1, 'Adrada de Haza', NULL, NULL),
(3, 1, 'Aguas Cándidas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'España', NULL, NULL),
(2, 'Francia', NULL, NULL),
(3, 'Andorra', NULL, NULL),
(4, 'Portugal', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_promocion` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `constr` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `promotor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comercializa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipoVPO` enum('VPO_Vivienda_Prot_Ofi','VPP_Vivienda_Prot_Pub','VPPL_Vivienda_Prot_Pub_Precio_Limitado','VPPA_Vivienda_Prot_Pub_para_Arrendamiento') COLLATE utf8_unicode_ci NOT NULL,
  `fecha_entrega` date NOT NULL,
  `anio_contruccion` int(11) NOT NULL,
  `cert_energ` enum('A','B','C','D','E','F','G','en tramite','excento') COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `estado` enum('disponible','nodisponible','enconstruccion') COLLATE utf8_unicode_ci NOT NULL,
  `pais_id` int(10) UNSIGNED NOT NULL,
  `codigo_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `via_id` int(10) UNSIGNED NOT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `piso` enum('Sotano','Subsotano','Bajos','Entresuelo','Principal','1ro','2do','3ro','4to','5to') COLLATE utf8_unicode_ci NOT NULL,
  `escalera` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mostrardireccion` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `zona` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ascensor_prin` tinyint(1) NOT NULL DEFAULT '0',
  `ascensor_serv` tinyint(1) NOT NULL DEFAULT '0',
  `domotica` tinyint(1) NOT NULL DEFAULT '0',
  `parking_comu` tinyint(1) NOT NULL DEFAULT '0',
  `parking_priv` tinyint(1) NOT NULL DEFAULT '0',
  `piscina_priv` tinyint(1) NOT NULL DEFAULT '0',
  `trastero` tinyint(1) NOT NULL DEFAULT '0',
  `zona_depor` tinyint(1) NOT NULL DEFAULT '0',
  `zona_comu` tinyint(1) NOT NULL DEFAULT '0',
  `zona_infa` tinyint(1) NOT NULL DEFAULT '0',
  `energia_solar` tinyint(1) NOT NULL DEFAULT '0',
  `serv_porteria` tinyint(1) NOT NULL DEFAULT '0',
  `alarma` tinyint(1) NOT NULL DEFAULT '0',
  `montacargas` tinyint(1) NOT NULL DEFAULT '0',
  `park_publico` tinyint(1) NOT NULL DEFAULT '0',
  `suelo` tinyint(1) NOT NULL DEFAULT '0',
  `ascensor` tinyint(1) NOT NULL DEFAULT '0',
  `ofloc_parking_privado` tinyint(1) NOT NULL DEFAULT '0',
  `ofloc_servicio_porteria` tinyint(1) NOT NULL DEFAULT '0',
  `ofloc_trastero` tinyint(1) NOT NULL DEFAULT '0',
  `ind_ascensor` tinyint(1) NOT NULL DEFAULT '0',
  `muelles` tinyint(1) NOT NULL DEFAULT '0',
  `ind_parking_publico` tinyint(1) NOT NULL DEFAULT '0',
  `ind_parking_privado` tinyint(1) NOT NULL DEFAULT '0',
  `ind_montacargas` tinyint(1) NOT NULL DEFAULT '0',
  `ind_trastero` tinyint(1) NOT NULL DEFAULT '0',
  `obs_extras` text COLLATE utf8_unicode_ci NOT NULL,
  `idioma_id` int(10) UNSIGNED NOT NULL,
  `descripcion_corta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_extendida` text COLLATE utf8_unicode_ci NOT NULL,
  `slogan` text COLLATE utf8_unicode_ci NOT NULL,
  `slogan_financiero` text COLLATE utf8_unicode_ci NOT NULL,
  `condiciones_economicas` text COLLATE utf8_unicode_ci NOT NULL,
  `memoria` text COLLATE utf8_unicode_ci NOT NULL,
  `idioma_id2` int(10) UNSIGNED DEFAULT NULL,
  `descripcion_corta2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_extendida2` text COLLATE utf8_unicode_ci,
  `slogan2` text COLLATE utf8_unicode_ci,
  `slogan_financiero2` text COLLATE utf8_unicode_ci,
  `condiciones_economicas2` text COLLATE utf8_unicode_ci,
  `memoria2` text COLLATE utf8_unicode_ci,
  `persona` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mostrar_contacto` enum('datos_agencia','agente_inmueble','otros_datos') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'datos_agencia',
  `email_contacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agencia_id` int(10) UNSIGNED NOT NULL,
  `cliente_propietario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medio_captacion` enum('el_correo','worldimmo','trovimap','anuncit','web','idealista','mitula','granmanzana','plandeprotecciondealquiler','inmoportalix','Divendo','Micasa','Pisocasas','anuncioneon','puertas_abiertas','llamada_telefonica','Cartel2','Buscador','Otro') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Otro',
  `contrato` tinyint(1) NOT NULL DEFAULT '0',
  `inicio_contrato` date DEFAULT NULL,
  `fin_contrato` date DEFAULT NULL,
  `inm_exclusiva` tinyint(1) NOT NULL DEFAULT '0',
  `llaves` enum('Porteria','Oficina','empresa_delegada','Propietario','Inquilino') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Propietario',
  `coment_llaves` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notas_internas` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `user_id`, `nombre`, `tipo_promocion`, `constr`, `promotor`, `comercializa`, `tipoVPO`, `fecha_entrega`, `anio_contruccion`, `cert_energ`, `fecha_alta`, `estado`, `pais_id`, `codigo_postal`, `municipio_id`, `via_id`, `calle`, `numero`, `piso`, `escalera`, `puerta`, `mostrardireccion`, `zona`, `ascensor_prin`, `ascensor_serv`, `domotica`, `parking_comu`, `parking_priv`, `piscina_priv`, `trastero`, `zona_depor`, `zona_comu`, `zona_infa`, `energia_solar`, `serv_porteria`, `alarma`, `montacargas`, `park_publico`, `suelo`, `ascensor`, `ofloc_parking_privado`, `ofloc_servicio_porteria`, `ofloc_trastero`, `ind_ascensor`, `muelles`, `ind_parking_publico`, `ind_parking_privado`, `ind_montacargas`, `ind_trastero`, `obs_extras`, `idioma_id`, `descripcion_corta`, `descripcion_extendida`, `slogan`, `slogan_financiero`, `condiciones_economicas`, `memoria`, `idioma_id2`, `descripcion_corta2`, `descripcion_extendida2`, `slogan2`, `slogan_financiero2`, `condiciones_economicas2`, `memoria2`, `persona`, `mostrar_contacto`, `email_contacto`, `telefono_contacto`, `agencia_id`, `cliente_propietario`, `medio_captacion`, `contrato`, `inicio_contrato`, `fin_contrato`, `inm_exclusiva`, `llaves`, `coment_llaves`, `notas_internas`, `created_at`, `updated_at`) VALUES
(1, 2, 'primera', '1', 'bob', 'bob', 'dede', 'VPP_Vivienda_Prot_Pub', '2017-09-28', 2017, 'G', '2017-09-25', 'disponible', 3, '231', 1, 1, '2', '2', '1ro', '2', '2', '1', '', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'werewr', 3, 'werwer', 'werwer', 'wertewrt', 'errter', 'erterwt', 'erterwt', 0, '', '', '', '', '', '', 'erwtert', 'datos_agencia', '', '', 2, NULL, 'Otro', 0, NULL, NULL, 0, 'Propietario', NULL, NULL, '2017-10-01 03:40:20', '2017-10-01 03:40:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(10) UNSIGNED NOT NULL,
  `pais_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `pais_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Burgos', NULL, NULL),
(2, 1, 'Salamanca', NULL, NULL),
(3, 1, 'Barcelona', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Piso', NULL, NULL),
(2, 'Casa', NULL, NULL),
(3, 'Local', NULL, NULL),
(4, 'Oficina', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('propietario','agente','administrador') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'propietario',
  `api_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `lastname`, `avatar`, `telephone`, `address`, `active`, `verified`, `type`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rafa', 'rafaelgamezdiaz@gmail.com', '$2y$10$RWA8P2C7zv4GEBxHTlTjKeCiQcjk.ZQs9qo6wyivQR5pivrTDL.aa', '', '', '', '', 1, 1, 'administrador', '', 'hZkEjnEc9bWdh1msROA9Ni1WLK3OktusjJW5F7SD4EPflcEeZURxlYPvnt38', NULL, '2017-10-17 01:19:53'),
(2, '', 'usuario1@yahoo.com', '$2y$10$rFOK99ITn1IrYejJO4pGteb4a46dbVm5lVFfyHhl80BvqY9AW2FGO', '', '', '', '', 1, 1, 'propietario', 'f4lmwb3r4fclwmmrrjczj9bf29o8tr34nl2ijbxzz5k44d3pio', '7h12moXDdeqlIRdtqNE76xbAomvAdXQBsc26Z0wPmqYOiUX8qBBDVpN7Ct7S', '2017-09-19 23:32:14', '2017-09-19 23:53:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_activations`
--

INSERT INTO `user_activations` (`id`, `user_id`, `token`, `created_at`) VALUES
(1, 2, 'f6b3c31d461354012459714803b84c73414273dcd6d962b58fa980242369268a', '2017-09-19 23:32:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vias`
--

CREATE TABLE `vias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vias`
--

INSERT INTO `vias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Calle', NULL, NULL),
(2, 'Paseo', NULL, NULL),
(3, 'Avenida', NULL, NULL),
(4, 'Ronda', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agencias_user_id_foreign` (`user_id`),
  ADD KEY `agencias_pais_id_foreign` (`pais_id`),
  ADD KEY `agencias_municipio_id_foreign` (`municipio_id`),
  ADD KEY `agencias_via_id_foreign` (`via_id`);

--
-- Indices de la tabla `agentes`
--
ALTER TABLE `agentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agentes_idioma_id_foreign` (`idioma_id`),
  ADD KEY `agentes_agencia_id_foreign` (`agencia_id`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivos_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudades_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_usuario_id_foreign` (`usuario_id`),
  ADD KEY `clientes_idioma_id_foreign` (`idioma_id`),
  ADD KEY `clientes_pais_id_foreign` (`pais_id`),
  ADD KEY `clientes_municipio_id_foreign` (`municipio_id`),
  ADD KEY `clientes_via_id_foreign` (`via_id`),
  ADD KEY `clientes_idioma_otrocon_foreign` (`idioma_otrocon`),
  ADD KEY `clientes_pais_otrocont_foreign` (`pais_otrocont`),
  ADD KEY `clientes_municipio_idotrocont_foreign` (`municipio_idotrocont`),
  ADD KEY `clientes_via_idotrocont_foreign` (`via_idotrocont`);

--
-- Indices de la tabla `demandas`
--
ALTER TABLE `demandas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demandas_cliente_id_foreign` (`cliente_id`),
  ADD KEY `demandas_pais_id_foreign` (`pais_id`),
  ADD KEY `demandas_provincia_id_foreign` (`provincia_id`),
  ADD KEY `demandas_via_id_foreign` (`via_id`);

--
-- Indices de la tabla `descripciones`
--
ALTER TABLE `descripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descripciones_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distritos_municipio_id_foreign` (`municipio_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentos_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exteriores`
--
ALTER TABLE `exteriores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exteriores_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extras_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `extrasdemandas`
--
ALTER TABLE `extrasdemandas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extrasdemandas_demanda_id_foreign` (`demanda_id`);

--
-- Indices de la tabla `finca`
--
ALTER TABLE `finca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finca_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `imgpromos`
--
ALTER TABLE `imgpromos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imgpromos_promocion_id_foreign` (`promocion_id`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmuebles_tipo_id_foreign` (`tipo_id`),
  ADD KEY `inmuebles_categoria_id_foreign` (`categoria_id`),
  ADD KEY `inmuebles_cliente_id_foreign` (`cliente_id`),
  ADD KEY `inmuebles_promocion_id_foreign` (`promocion_id`),
  ADD KEY `inmuebles_entidad_id_foreign` (`entidad_id`),
  ADD KEY `inmuebles_agencia_id_foreign` (`agencia_id`),
  ADD KEY `inmuebles_usuario_id_foreign` (`usuario_id`),
  ADD KEY `inmuebles_modalidad_id_foreign` (`modalidad_id`),
  ADD KEY `inmuebles_distrito_id_foreign` (`distrito_id`),
  ADD KEY `inmuebles_municipio_id_foreign` (`municipio_id`),
  ADD KEY `inmuebles_provincia_id_foreign` (`provincia_id`),
  ADD KEY `inmuebles_ciudad_id_foreign` (`ciudad_id`),
  ADD KEY `inmuebles_pais_id_foreign` (`pais_id`),
  ADD KEY `inmuebles_via_id_foreign` (`via_id`),
  ADD KEY `inmuebles_idioma_id_foreign` (`idioma_id`),
  ADD KEY `inmuebles_idioma_id2_foreign` (`idioma_id2`);

--
-- Indices de la tabla `interiores`
--
ALTER TABLE `interiores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interiores_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `internos`
--
ALTER TABLE `internos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internos_inmueble_id_foreign` (`inmueble_id`),
  ADD KEY `internos_agencia_id_foreign` (`agencia_id`),
  ADD KEY `internos_agente_id_foreign` (`agente_id`),
  ADD KEY `internos_cliente_prop_id_foreign` (`cliente_prop_id`);

--
-- Indices de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promociones_nombre_unique` (`nombre`),
  ADD KEY `promociones_user_id_foreign` (`user_id`),
  ADD KEY `promociones_pais_id_foreign` (`pais_id`),
  ADD KEY `promociones_municipio_id_foreign` (`municipio_id`),
  ADD KEY `promociones_via_id_foreign` (`via_id`),
  ADD KEY `promociones_idioma_id_foreign` (`idioma_id`),
  ADD KEY `promociones_idioma_id2_foreign` (`idioma_id2`),
  ADD KEY `promociones_agencia_id_foreign` (`agencia_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincias_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indices de la tabla `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_token_index` (`token`);

--
-- Indices de la tabla `vias`
--
ALTER TABLE `vias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_inmueble_id_foreign` (`inmueble_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `agencias`
--
ALTER TABLE `agencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `agentes`
--
ALTER TABLE `agentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `demandas`
--
ALTER TABLE `demandas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `descripciones`
--
ALTER TABLE `descripciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `exteriores`
--
ALTER TABLE `exteriores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `extrasdemandas`
--
ALTER TABLE `extrasdemandas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `imgpromos`
--
ALTER TABLE `imgpromos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `interiores`
--
ALTER TABLE `interiores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `internos`
--
ALTER TABLE `internos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vias`
--
ALTER TABLE `vias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
