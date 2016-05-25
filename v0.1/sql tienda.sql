CREATE TABLE `Productos` (
	`id_producto` INTEGER NOT NULL,
	`nombre_producto` VARCHAR(100) NOT NULL,
	`precio_producto` INTEGER NOT NULL,
	`unidades_producto` INTEGER NOT NULL,
	`categoria_producto` VARCHAR(50) NOT NULL,
	`subcategoria_producto` VARCHAR(50) NOT NULL,
	PRIMARY KEY(`id_producto`)
) ENGINE=INNODB;
CREATE TABLE `Proveedores` (
	`id_proveedor` INTEGER NOT NULL,
	`nombre_proveedor` VARCHAR(100) NOT NULL,
	`direccion` VARCHAR(200) NOT NULL,
	PRIMARY KEY(`id_proveedor`)
) ENGINE=INNODB;
CREATE TABLE `Usuarios` (
	`id_usuario` INTEGER NOT NULL,
	`nombre_usuario` varchar(100) NOT NULL,
	`direccion_usuario` varchar(200) NOT NULL,
	`telefono_usuario` INTEGER NOT NULL,
	PRIMARY KEY(`id_usuario`)
) ENGINE=INNODB;
CREATE TABLE `Surte` (
	`cantidad` INTEGER NOT NULL,
	`fk_id_producto` INTEGER NOT NULL,
	KEY(`fk_id_producto`),
	`fk_id_proveedor` INTEGER NOT NULL,
	KEY(`fk_id_proveedor`)
) ENGINE=INNODB;
CREATE TABLE `Compra` (
	`cantidad` INTEGER NOT NULL,
	`fk_id_usuario` INTEGER NOT NULL,
	KEY(`fk_id_usuario`),
	`fk_id_producto` INTEGER NOT NULL,
	KEY(`fk_id_producto`)
) ENGINE=INNODB;

# GENERANDO RELACIONES
ALTER TABLE `Surte` ADD CONSTRAINT `surte_productos_fk_id_producto` FOREIGN KEY (`fk_id_producto`) REFERENCES `Productos`(`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `Surte` ADD CONSTRAINT `surte_proveedores_fk_id_proveedor` FOREIGN KEY (`fk_id_proveedor`) REFERENCES `Proveedores`(`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `Compra` ADD CONSTRAINT `compra_usuarios_fk_id_usuario` FOREIGN KEY (`fk_id_usuario`) REFERENCES `Usuarios`(`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `Compra` ADD CONSTRAINT `compra_productos_fk_id_producto` FOREIGN KEY (`fk_id_producto`) REFERENCES `Productos`(`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE;