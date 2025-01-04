-- Crear la base de datos
CREATE DATABASE AlojamientosDB;

-- Usar la base de datos
USE AlojamientosDB;

-- Tabla Usuarios
CREATE TABLE usuarios(
	id INT AUTO_INCREMENT PRIMARY KEY,
	correo VARCHAR(50) UNIQUE NOT NULL,
    contrasena VARCHAR (255) NOT NULL,
	rol ENUM('usuario', 'alojamientosnombreadministrador') DEFAULT 'usuario' NOT NULL
);

CREATE TABLE alojamientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    ubicacion VARCHAR(255),
    precio DECIMAL(10, 2) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios_alojamientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    alojamiento_id INT NOT NULL,
    agregado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (alojamiento_id) REFERENCES alojamientos(id) ON DELETE CASCADE
);

Select * from usuarios;
Select * from alojamientos;

