create database bd_thecs;
use bd_thecs;

create table tbl_productos(
  id_prod int auto_increment primary key,
  nombreprod varchar(50),
  cantstock int(50),
  precio float(10,2),
  proveedor varchar(50),
  fechrec date,
  descripcion varchar(150),
  categoria varchar(50)
);