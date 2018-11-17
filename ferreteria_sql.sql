create database truper;
use truper;




-- ////////////////////    CATALOGOS DINAMICOS   ////////////////////


-- Podemos manejar catalogos para que el encargado pueda registrar nuevos paises, ciudades, etc.

CREATE TABLE `catalogo_principal`(
	id int not null auto_increment primary key,
    nombre varchar(50) not null,
    creacion datetime default now(),
    descripcion varchar(150) not null,
    estatus boolean
);

-- Vendria siendo el listado de acuerdo al catalogo_base por ejemplo : catalogo_principal = Paises catalogo_secundario = Mexico, EUA , etc.

CREATE TABLE `catalogo_secundario`(
	id int not null auto_increment primary key,
    nombre varchar(50) not null,
    descripcion varchar(150) not null,
    cantidad int null,
    imagen blob null,
    estatus boolean,
    id_catalogo int not null,
    foreign key(id_catalogo) references catalogo_principal(id) on delete restrict on update cascade
);


-- ////////////////////    USUARIOS    ////////////////////

-- Tabla Usuario 
-- Nota: Podemos hacer el login desde aqui y que sea por email como nombre de usuario, osea email unico (validacion).

CREATE TABLE `sucursal`(
	id int not null auto_increment primary key,
    nombre varchar(50) not null,
    tipo varchar(50) not null,
    direccion varchar(150) not null,
    telefono varchar(15) not null,
    id_usu int not null, -- Por lo regular una sucursal tiene un solo dueño
    FOREIGN KEY(id_usu) references usuarios(id) on delete restrict on update cascade
);


CREATE TABLE `usuarios`(
	id int not null auto_increment primary key,
    nombre varchar(50) not null,
    apellidos varchar(50) not null,
    genero varchar(10) null,
    fecha_nac date null,
    email varchar(100) default null, -- Unico
    password varchar(100) default null,
    lada varchar(5) null,
    telefono varchar(13) null,
    telefono_aux varchar(13) null,
    direccion varchar(250) null,
    avatar blob null,
    estatus boolean
);

-- Tabla para ligar usuarios con roles

CREATE TABLE `usuario_rol`(
	id_usuario int not null,
    id_rol int not null,
    FOREIGN KEY(id_usuario) references usuarios(id) on delete restrict on update cascade,
	FOREIGN KEY(id_rol) references roles(id) on delete restrict on update cascade
);

-- Tabla para roles
-- Tipos de usuarios en el sistema

CREATE TABLE `roles`(
	id int not null auto_increment primary key, -- Admi, Cliente, Almacenista, Envios
    nombre varchar(50) not null,
    descripcion varchar(150) not null,
    estatus boolean
); 


-- A CONSIDERAR si se tiene tiempo

CREATE TABLE `rol_modulo`(
	id int not null auto_increment primary key,
	id_rol int not null,
    id_modulo int not null,
    FOREIGN KEY(id_modulo) references modulos(id) on delete restrict on update cascade,
	FOREIGN KEY(id_rol) references roles(id) on delete restrict on update cascade
);

-- Hace referencia a : Productos(CRUD), Usuarios (CRUD), catalogos, etc

CREATE TABLE `modulos`(
	id int not null auto_increment primary key,
    nombre varchar(20) null,
    descripcion varchar(150) null,
    estatus boolean
);


-- ////////////////////   PRODUCTOS   ////////////////////

CREATE TABLE `producto`(
	id int not null auto_increment primary key,
    nombre varchar(150) not null,
    tipo varchar(100) not null,
    codigo varchar(13) not null,
    ganancia float not null,
    stock_max int not null,
    stock_min int not null,
    imagen blob null,
    marca int not null -- Tendra el valor del id con respecto al catalogo secundario con esto nos ahorramos crear tabla marca
);


CREATE TABLE `producto_presentacion`(
	id int not null auto_increment primary key,
	id_pro int not null,
    id_pre int not null,
    foreign key(id_pro) references producto(id) on delete restrict on update cascade,
    foreign key(id_pre) references catalogo_secundario(id) on delete restrict on update cascade
);


CREATE TABLE `resurtido`(
	id int not null auto_increment primary key,
    datalles varchar(100) null,
    fecha_entrega datetime default now(),
    fecha_caducidad datetime null,
    cantidad int not null,
    stock int not null, 
    precio_uni float not null,
    total_res float not null,
    id_propre int not null,
	foreign key(id_propre) references producto_presentacion(id) on delete restrict on update cascade
);


-- //////////////////////////   CARRITO   ///////////////////////////////////////////

CREATE TABLE `carrito`(
	id int not null auto_increment primary key,
    fecha datetime default now(),
    total float not null,
    estatus boolean not null,
    id_user int not null
);


CREATE TABLE `renglon_carrito`(
	id int not null auto_increment primary key,
    cantidad int not null,
    precio_ren float not null,
    id_propre int not null,
    foreign key(id_propre) references producto_presentacion(id) on delete restrict on update cascade
);


CREATE TABLE `pago`(
	id int not null auto_increment 
);







