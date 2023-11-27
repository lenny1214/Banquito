DROP DATABASE IF EXISTS BANCO;
CREATE DATABASE BANCO;
USE BANCO;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    dni VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    fecha_nacimiento DATE,
    foto VARCHAR(255),
    direccion VARCHAR(255),
    codigo_postal VARCHAR(10),
    ciudad VARCHAR(255),
    provincia VARCHAR(255),
    pais VARCHAR(255) NOT NULL,
    iban VARCHAR(255) NOT NULL UNIQUE
);






























