create database products_sys;

CREATE TABLE bodegas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE sucursales (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    bodega_id INT REFERENCES bodegas(id) ON DELETE CASCADE
);

create table monedas(
  id SERIAL PRIMARY KEY,
  nombre VARCHAR(20) NOT NULL
);

create table productos
(
    id SERIAL PRIMARY KEY,
    codigo VARCHAR(15) NOT NULL unique,
    nombre VARCHAR(50) NOT NULL,
    bodega_id INT REFERENCES bodegas(id),
    sucursal_id INT REFERENCES sucursales(id),
    moneda_id INT REFERENCES monedas(id),
    precio NUMERIC(10, 2) NOT NULL,
    materiales INT[] NOT NULL,
    descripcion TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO monedas (id, nombre) VALUES
  (1, 'Sol'),
  (2, 'Peso chileno'),
  (3, 'Peso colombiano'),
  (4, 'Peso mexicano')
;

INSERT INTO bodegas (id, nombre) VALUES
  (1, 'Lima'),
  (2, 'Chiclayo'),
  (3, 'Trujillo'),
  (4, 'Arequipa')
;

INSERT INTO sucursales (id, nombre, bodega_id) VALUES
  (1, 'Sucursal LIM-1', 1),
  (2, 'Sucursal LIM-2', 1),
  (3, 'Sucursal LIM-3', 1),
  (4, 'Sucursal CIX-1', 2),
  (5, 'Sucursal CIX-2', 2),
  (6, 'Sucursal TRU-1', 3),
  (7, 'Sucursal AQP-1', 4)
;
