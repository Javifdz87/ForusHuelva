CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role BOOLEAN
 
);
CREATE TABLE clients(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    last_Name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    dni VARCHAR(255) NOT NULL UNIQUE,
    phone INT NOT NULL UNIQUE,
    town VARCHAR(255) NOT NULL,
    postal_code INT NOT NULL,
    province VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    bank_account VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    );

CREATE TABLE subscription_fees(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    importe DOUBLE(8, 2) NOT NULL,
    date_pay DATE NOT NULL,
    observation TEXT,
    client_id INT NOT NULL,
  
    FOREIGN KEY(client_id) REFERENCES clients(id) ON DELETE CASCADE
);
CREATE TABLE courts(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    sport VARCHAR(40) NOT NULL
);
CREATE TABLE rental_fees(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    importe DOUBLE(8, 2) NOT NULL,
    date_pay DATE NOT NULL,
    date_time DATETIME NOT NULL,
    client_id INT NOT NULL,
    court_id INT NOT NULL,
    FOREIGN KEY(client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY(court_id) REFERENCES courts(id) ON DELETE CASCADE
);

INSERT INTO courts(id, name, sport) VALUES 
(1, 'Pista 1P', 'Padel'),
(2, 'Pista 2P', 'Padel'),
(3, 'Pista 3P', 'Padel'),
(4, 'Pista 4P', 'Padel'),
(5, 'Pista 1T', 'Tenis'),
(6, 'Pista 2T', 'Tenis'),
(7, 'Pista 3T', 'Tenis'),
(8, 'Pista 4T', 'Tenis'),
(9, 'Pista 1S', 'Futbol Sala'),
(10, 'Pista 2S', 'Futbol Sala'),
(11, 'Pista 3S', 'Futbol Sala'),
(12, 'Pista 1F', 'Futbol 7'),
(13, 'Pista 2F', 'Futbol 7');

INSERT INTO subscription_fees(id, importe, date_pay, observation, client_id) VALUES 
(1, 59.99, '2024-03-30', suscripcion, 1);

INSERT INTO clients (id, name, last_Name, email, phone, town, postal_code, province, role) VALUES
(1, 'Juan', 'García', 'juan@example.com', 123456789, 'Madrid', 28001, 'MAD', 'particular'),
(2, 'María', 'López', 'maria@example.com', 987654321, 'Barcelona', 08001, 'BCN', 'particular'),
(3, 'Empresa A', 'S.L.', 'empresaA@example.com', 555155555, 'Valencia', 46001, 'VAL', 'empresa'),
(4, 'Empresa B', 'S.A.', 'empresaB@example.com', 663666666, 'Sevilla', 41001, 'SEV', 'empresa'),
(5, 'Pedro', 'Martínez', 'pedro@example.com', 333333333, 'Alicante', 03001, 'ALC', 'particular'),
(6, 'Laura', 'González', 'laura@example.com', 444144444, 'Málaga', 29001, 'MAL', 'particular'),
(7, 'Antonio', 'Fernández', 'antonio@example.com', 555555555, 'Zaragoza', 50001, 'ZAR', 'particular'),
(8, 'Carmen', 'Ruiz', 'carmen@example.com', 666666666, 'Bilbao', 48001, 'BIO', 'particular'),
(9, 'Raul', 'Díaz', 'raul@example.com', 777777777, 'Murcia', 30001, 'MUR', 'particular'),
(10, 'Sandra', 'Martín', 'sandra@example.com', 888888888, 'Granada', 18001, 'GRA', 'particular'),
(11, 'David', 'Sánchez', 'david@example.com', 999999999, 'Córdoba', 14001, 'COR', 'particular'),
(12, 'Elena', 'Pérez', 'elena@example.com', 101010101, 'Valladolid', 47001, 'VAL', 'particular'),
(13, 'Javier', 'Gómez', 'javier@example.com', 111111111, 'A Coruña', 15001, 'COR', 'particular'),
(14, 'Ana', 'Hernández', 'ana@example.com', 121212121, 'Santander', 39001, 'SAN', 'particular'),
(15, 'Luis', 'Jiménez', 'luis@example.com', 131313131, 'Toledo', 45001, 'TOL', 'particular');


-- Póliza para Juan García
INSERT INTO polizas (n_poliza, importe, monto, rest, start_date, status, observation, client_id) VALUES (1234, 150.00, 0.00, 150.00, '2024-02-25', 'cobrada', 'Póliza de seguro de hogar', 1);

-- Póliza para María López
INSERT INTO polizas (n_poliza, importe, monto, rest, start_date, status, observation, client_id) VALUES (1235, 200.00, 0.00, 200.00, '2024-02-25', 'a cuenta', 'Póliza de seguro de automóvil', 2);

-- Póliza para Empresa A S.L.
INSERT INTO polizas (n_poliza, importe, monto, rest, start_date, status, observation, client_id) VALUES (1236, 1000.00, 0.00, 1000.00, '2024-02-25', 'liquidada', 'Póliza de seguro de responsabilidad civil', 3);

-- Póliza para Empresa B S.A.
INSERT INTO polizas (n_poliza, importe, monto, rest, start_date, status, observation, client_id) VALUES (1237, 800.00, 0.00, 800.00, '2024-02-25', 'anulada', 'Póliza de seguro de flota de vehículos', 4);

-- Póliza para Pedro Martínez
INSERT INTO polizas (n_poliza, importe, monto, rest, start_date, status, observation, client_id) VALUES (1238, 120.00, 0.00, 120.00, '2024-02-25', 'pre anulada', 'Póliza de seguro de salud', 5);

-- Póliza para Laura González
INSERT INTO polizas (n_poliza, importe, monto, rest, start_date, status, observation, client_id) VALUES (1239, 180.00, 0.00, 180.00, '2024-02-25', 'a cuenta', 'Póliza de seguro de vida', 6);

-- Póliza para Antonio Fernández
INSERT INTO polizas (n_poliza, importe, monto, rest, start_date, status, observation, client_id) VALUES (1240, 250.00, 0.00, 250.00, '2024-02-25', 'cobrada', 'Póliza de seguro de viaje', 7);



INSERT INTO users (name, email, password) VALUES
('admin', 'admin@gmail.com', '$2y$10$TvoY2hw0Exd4ZJyyLDoIDOM.CprXYMZ/1oyk32u8swNLfJBoe2DOu');

-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Servidor: 192.168.1.167
-- Tiempo de generación: 23-05-2012 a las 11:13:15
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6-1+lenny13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP TABLE IF EXISTS `tbl_comunidadesautonomas`;
CREATE TABLE IF NOT EXISTS `tbl_comunidadesautonomas` (
  `id` tinyint(4) NOT NULL DEFAULT '0',
  `nombre` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Afiliados de alta';

-- 
-- Volcar la base de datos para la tabla `tbl_comunidadesautonomas`
-- 

INSERT INTO `tbl_comunidadesautonomas` VALUES (1, 'Andalucía'),
(2, 'Aragón'),
(3, 'Asturias (Principado de)'),
(4, 'Balears (IIles)'),
(5, 'Canarias'),
(6, 'Cantabria'),
(8, 'Castilla y León'),
(7, 'Castilla-La Mancha'),
(9, 'Cataluña'),
(18, 'Ceuta'),
(10, 'Comunidad Valenciana'),
(11, 'Extremadura'),
(12, 'Galicia'),
(13, 'Madrid (Comunidad de)'),
(19, 'Melilla'),
(14, 'Murcia (Región de)'),
(15, 'Navarra (Comunidad Foral de)'),
(16, 'País Vasco'),
(17, 'Rioja (La)');

-- 
-- Estructura de tabla para la tabla `tbl_provincias`
-- 
-- Creación: 13-01-2012 a las 23:11:16
-- 

DROP TABLE IF EXISTS `tbl_provincias`;
CREATE TABLE IF NOT EXISTS `tbl_provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia',
  `comunidad_id` tinyint(4) NOT NULL COMMENT 'Código de la comunidad a la que pertenece',
  PRIMARY KEY (`cod`),
  KEY `nombre` (`nombre`),
  KEY `FK_ComunidadAutonomaProv` (`comunidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

-- 
-- Volcar la base de datos para la tabla `tbl_provincias`
-- 

INSERT INTO `tbl_provincias` VALUES ('01', 'Alava', 16),
('02', 'Albacete', 7),
('03', 'Alicante', 10),
('04', 'Almera', 1),
('05', 'Avila', 8),
('06', 'Badajoz', 11),
('07', 'Balears (Illes)', 4),
('08', 'Barcelona', 9),
('09', 'Burgos', 8),
('10', 'Cáceres', 11),
('11', 'Cádiz', 1),
('12', 'Castellón', 10),
('13', 'Ciudad Real', 7),
('14', 'Córdoba', 1),
('15', 'Coruña (A)', 12),
('16', 'Cuenca', 7),
('17', 'Girona', 9),
('18', 'Granada', 1),
('19', 'Guadalajara', 7),
('20', 'Guipzcoa', 16),
('21', 'Huelva', 1),
('22', 'Huesca', 2),
('23', 'Jaén', 1),
('24', 'León', 8),
('25', 'Lleida', 9),
('26', 'Rioja (La)', 17),
('27', 'Lugo', 12),
('28', 'Madrid', 13),
('29', 'Málaga', 1),
('30', 'Murcia', 14),
('31', 'Navarra', 15),
('32', 'Ourense', 12),
('33', 'Asturias', 3),
('34', 'Palencia', 8),
('35', 'Palmas (Las)', 5),
('36', 'Pontevedra', 12),
('37', 'Salamanca', 8),
('38', 'Santa Cruz de Tenerife', 5),
('39', 'Cantabria', 6),
('40', 'Segovia', 8),
('41', 'Sevilla', 1),
('42', 'Soria', 8),
('43', 'Tarragona', 9),
('44', 'Teruel', 2),
('45', 'Toledo', 7),
('46', 'Valencia', 10),
('47', 'Valladolid', 8),
('48', 'Vizcaya', 16),
('49', 'Zamora', 8),
('50', 'Zaragoza', 2),
('51', 'Ceuta', 18),
('52', 'Melilla', 19);