use tienda;

CREATE TABLE productos (
  idProd smallint(6) NOT NULL,
  nombre varchar(50) DEFAULT NULL,
  descripcion varchar(50) DEFAULT NULL,
  inventario int(10) DEFAULT NULL,
  precio float(10,4) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO productos (idProd, nombre, descripcion, inventario, precio) VALUES
(1, 'Maybelline Great Lash Blackest Black', 'Da volumen natural a las pestañas', 10, 100.0000),
(2, 'Lashblast Volume Waterproof Mascara', 'Black by CoverGirl for Women ', 10, 1200.0000),
(3, 'Paris Loreal mascara de pestanas', 'air volume mega mascara lavable', 1, 249.0000),
(4, 'Miss Rose maquillaje', '180 colores de sombra de ojos paleta de maquillaje', 10, 1149.0000),
(5, 'Kit de maquillaje', 'todo en uno, combinación de colores definitiva', 10, 997.6600),
(6, 'Color Icon ', 'Paleta de 10 sombras de ojos', 10, 133.0000),
(7, 'Set 11 Brochas de Maquillaje', ' Ecologicas, ideales para aplicar maquillaje en po', 10, 189.0000),
(8, 'Brocha de Maquillaje de Base', 'Piezas Brocha de Maquillaje de Base Profesionales', 10, 169.0000),
(9, 'MAKE UP BOX 12 Labiales Matte Larga Duración', 'Collection lip gloss endless Matte 12-horas', 5, 466.6500);