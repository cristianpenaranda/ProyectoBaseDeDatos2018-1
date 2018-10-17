-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2018 a las 09:10:33
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panaderia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro del administrador de la empresa.';

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_persona`) VALUES
(1090491573);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_promo`
--

CREATE TABLE `admin_promo` (
  `id_admin` int(11) NOT NULL,
  `id_promo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacion entre el administrador y la promocion que establece';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Clientes registrados en la panaderia';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_persona`) VALUES
(0),
(1090494143);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_salida`
--

CREATE TABLE `cliente_salida` (
  `id_venta` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacion entre los clientes y las compras que hacen.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Herencia de la tabla personas para referirse a empleado';

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_persona`) VALUES
(1093123456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_salida`
--

CREATE TABLE `empleado_salida` (
  `id_empleado` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacion entre las ventas que realiza un empleado';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id_ingrediente` int(11) NOT NULL,
  `peso` double NOT NULL,
  `valor` double NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro de los ingredientes para elaborar productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_producto`
--

CREATE TABLE `ingredientes_producto` (
  `id_producto` int(11) NOT NULL,
  `id_ingredientes` int(11) NOT NULL,
  `cantidad_creada` int(11) NOT NULL,
  `cantidad_usada` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacion entre la tabla productos y la tabla ingredientes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `remitente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asunto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `telefono` char(10) NOT NULL,
  `domicilio` varchar(300) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `correo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para registrar a las personas en el software';

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `telefono`, `domicilio`, `contraseña`, `correo`) VALUES
(0, 'Default', 'Default', '0000000000', 'Default', 'Default', 'Default'),
(1090491573, 'Cristian', 'Peñaranda', '3120099877', 'calle 8c # 0-09', '1234', 'cristiancamilops95@gmail.com'),
(1090494143, 'Alexander ', 'Peñaloza', '3111234567', 'calle 5 # 7 - 21 Aeropuerto', '1234', 'alexanderpenaloza3@gmail.com'),
(1093123456, 'Karen Lorena', 'Picon', '310123456', 'Calle 8 # 10-23 San Luis', '1234', 'karenlorena@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `valor_fabricacion` double NOT NULL,
  `valor_venta` double NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para registrar los productos';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `stock`, `valor_fabricacion`, `valor_venta`, `id_tipo_producto`, `nombre_producto`, `descripcion`, `imagen`) VALUES
(1, 500, 1200, 2000, 1, 'Pan de Leche Grande', 'Pan de leche, con el sabor más tradicional de este pan, disfruta de su sabor dulce.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/pan de leche.PNG'),
(2, 500, 100, 200, 1, 'Pan de Queso Pequeño', 'Este pan es la mejor opción para cubrir tus antojos de media mañana o media tarde, su envolvente sabor a queso, su textura y forma circular te brindaran la mejor experiencia.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/pan de queso.PNG'),
(3, 500, 400, 1000, 1, 'Churros con Queso', 'Estos churros con quesos, son la combinación perfecta para esas tardes de antojos, disfruta su inigualable sabor mientras te deleitas con la textura.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/churros con queso.PNG'),
(4, 500, 1500, 2000, 1, 'Croissant de Jamon', 'Deléitate con este pan de origen francés, la singular textura que le proporciona el hojaldre y su increíble combinación de jamón con queso.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/croassan de jamon.PNG'),
(5, 500, 1200, 2000, 1, 'Pan Frances', 'Un pan francés mediano, es el mejor compañero para esas mañanas, disfruta la inigualable textura de estos pan acompañada del mejor sabor.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/pan frances.PNG'),
(6, 200, 1500, 2000, 2, 'Milhoja', 'Disfruta de esta deliciosa combinación de crema leche entre varias capas de hojaldre todo con la cobertura de una fina capa de arequipe.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/milhoja.PNG'),
(7, 200, 2500, 5000, 2, 'Tiramisu', 'Para endulzar tus días, esta perfecta combinación de los sabores del café y el cacao, en este suave y esponjoso mousse.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/tiramisu.PNG'),
(8, 200, 3000, 5000, 2, 'Mousse de Chocolate', 'Disfruta de esta crema inglesa, con chocolate de avellanas y un delicioso bizcochuelo de frutos rojos.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/mousse.PNG'),
(9, 100, 12000, 20000, 2, 'Torta Tres Leches de Milo', 'La excusa perfecta para celebrar todos los días, esta fantástica torta tres leches, con ese sabor tradicional del milo una combinación perfecta para consentir tu paladar y quedar como el rey de las celebraciones.', 'C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/tres leches milo.PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_promocion` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro de las promociones de la panaderia';

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_promocion`, `nombre`, `descripcion`) VALUES
(1, '¡ Celebra tu fecha más especial !', 'Lleva la más deliciosa torta tres leches con sabor a milo para esa celebración especial... Pregunta por ella !');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promo_producto`
--

CREATE TABLE `promo_producto` (
  `id_producto` int(11) NOT NULL,
  `descuento` double NOT NULL,
  `estado` int(11) NOT NULL,
  `id_promocion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='relacion entre las promociones y los productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nit` varchar(15) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefono` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para llevar el registro de los proveedores';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prov_ingrediente`
--

CREATE TABLE `prov_ingrediente` (
  `id_proveedor` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacion entre proveedores y entradas.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id_venta` int(11) NOT NULL,
  `valor` double NOT NULL,
  `iva` double NOT NULL,
  `total` double NOT NULL,
  `fecha_sal` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Registro de las salidas que tiene un producto';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas_producto`
--

CREATE TABLE `salidas_producto` (
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacion entre la tabla productos y la tabla salidas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL,
  `descripcion_tipo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dominio de la tabla producto';

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_producto`, `nombre_tipo`, `descripcion_tipo`) VALUES
(1, 'Panaderia', 'Productos de Panaderia'),
(2, 'Reposteria', 'Este tipo de producto son los que pertenecen a lo que en la panaderia la viña del pan, se entiende por reposteria, como por ejemplo:\r\nTortas, Milojas, Donas, Brazo de Reina, entre otros.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `admin_promo`
--
ALTER TABLE `admin_promo`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_promo` (`id_promo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `cliente_salida`
--
ALTER TABLE `cliente_salida`
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `empleado_salida`
--
ALTER TABLE `empleado_salida`
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indices de la tabla `ingredientes_producto`
--
ALTER TABLE `ingredientes_producto`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_ingredientes` (`id_ingredientes`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indices de la tabla `promo_producto`
--
ALTER TABLE `promo_producto`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_promocion` (`id_promocion`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `prov_ingrediente`
--
ALTER TABLE `prov_ingrediente`
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `salidas_producto`
--
ALTER TABLE `salidas_producto`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1090491574;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1093123457;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `admin_promo`
--
ALTER TABLE `admin_promo`
  ADD CONSTRAINT `admin_promo_ibfk_2` FOREIGN KEY (`id_promo`) REFERENCES `promociones` (`id_promocion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente_salida`
--
ALTER TABLE `cliente_salida`
  ADD CONSTRAINT `cliente_salida_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `cliente` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_salida_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `salidas` (`id_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_salida`
--
ALTER TABLE `empleado_salida`
  ADD CONSTRAINT `empleado_salida_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleado_salida_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `salidas` (`id_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `prov_ingrediente` (`id_compra`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredientes_producto`
--
ALTER TABLE `ingredientes_producto`
  ADD CONSTRAINT `ingredientes_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `administrador` (`id_persona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promo_producto`
--
ALTER TABLE `promo_producto`
  ADD CONSTRAINT `promo_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `promo_producto_ibfk_2` FOREIGN KEY (`id_promocion`) REFERENCES `promociones` (`id_promocion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prov_ingrediente`
--
ALTER TABLE `prov_ingrediente`
  ADD CONSTRAINT `prov_ingrediente_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `salidas_producto`
--
ALTER TABLE `salidas_producto`
  ADD CONSTRAINT `salidas_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `salidas_producto_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `salidas` (`id_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
