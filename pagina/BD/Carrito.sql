use tienda;

DROP TABLE IF EXISTS carrito;
CREATE TABLE IF NOT EXISTS carrito (
  idProd smallint(6) NOT NULL,
  nombre varchar(25) DEFAULT NULL,
  descripcion varchar(50) DEFAULT NULL,
  cantidad SMALLINT(3) DEFAULT NULL,
  precio float(10,4) DEFAULT NULL,
  idCliente smallint(6) DEFAULT NULL,
  PRIMARY KEY (idCliente)
);

INSERT INTO carrito (idProd, nombre, descripcion, cantidad, precio, idCliente) VALUES
(1, 'Maybelline Great Lash Blackest Black','Da volumen natural a las pestañas',1, 100,1);