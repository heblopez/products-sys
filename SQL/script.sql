create database products_sys;

create table sucursales(
  id serial primary key,
  nombre varchar(50) not null
);

create table bodegas(
  id serial primary key,
  nombre varchar(50) not null,
  sucursal_id integer references sucursales(id) on delete cascade
);

create table monedas(
  id serial primary key,
  nombre varchar(20) not null
);

create table productos
(
    id serial primary key,
    codigo varchar(15) not null unique,
    nombre varchar(50) not null,
    bodega_id integer references bodegas(id),
    sucursal_id integer references sucursales(id),
    moneda_id integer references monedas(id),
    precio numeric(10, 2) not null,
    materiales integer[] not null,
    descripcion text not null,
    created_at timestamp default CURRENT_TIMESTAMP
);

INSERT INTO monedas (id, nombre) VALUES
  (1, 'Sol'),
  (2, 'Peso chileno'),
  (3, 'Peso colombiano'),
  (4, 'Peso mexicano')
;

INSERT INTO sucursales (id, nombre) VALUES
  (1, 'Lima'),
  (2, 'Chiclayo'),
  (3, 'Trujillo'),
  (4, 'Arequipa')
;

INSERT INTO bodegas (id, nombre, sucursal_id) VALUES
  (1, 'Bodega LIM-1', 1),
  (2, 'Bodega LIM-2', 1),
  (3, 'Bodega LIM-3', 1),
  (4, 'Bodega CIX-1', 2),
  (5, 'Bodega CIX-2', 2),
  (6, 'Bodega TRU-1', 3),
  (7, 'Bodega AQP-1', 4)
;
