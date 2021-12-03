use tienda;

DROP TABLE IF EXISTS carrito;
CREATE TABLE IF NOT EXISTS carrito (
  idProd smallint(6) NOT NULL,
  nombre varchar(25) DEFAULT NULL,
  descripcion varchar(50) DEFAULT NULL,
  cantidad SMALLINT(3) DEFAULT NULL,
  precio float(10,4) DEFAULT NULL,
  PRIMARY KEY (idCliente)
);
