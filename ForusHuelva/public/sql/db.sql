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

    CREATE TABLE sports(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sport VARCHAR(255) NOT NULL
    );

CREATE TABLE subscription_fees(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    importe DOUBLE(8, 2) NOT NULL,
    date_pay DATE NOT NULL,
    date_end DATE NOT NULL,
    status VARCHAR(20) NOT NULL,
    observation TEXT,
    client_id INT NOT NULL,
  
    FOREIGN KEY(client_id) REFERENCES clients(id) ON DELETE CASCADE
);
CREATE TABLE courts(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    sport_id INT NOT NULL,
    FOREIGN KEY(sport_id) REFERENCES sports(id) ON DELETE CASCADE
);
CREATE TABLE rental_fees(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    importe DOUBLE(8, 2) NOT NULL,
    date_pay DATE NOT NULL,
    date_day DATE NOT NULL,
    date_time VARCHAR(10) NOT NULL,
    client_id INT NOT NULL,
    court_id INT NOT NULL,
    FOREIGN KEY(client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY(court_id) REFERENCES courts(id) ON DELETE CASCADE
);

CREATE TABLE date_time(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sport_id INT NOT NULL,  
    date_time VARCHAR(10),
    FOREIGN KEY(sport_id) REFERENCES sports(id) ON DELETE CASCADE 
);

INSERT INTO date_time(id, sport_id, date_time) VALUES 
(1, '3', '10:00'),
(2, '3', '11:00'),
(3, '3', '12:00'),
(4, '3', '13:00'),
(5, '3', '14:00'),
(6, '3', '15:00'),
(7, '3', '16:00'),
(8, '3', '17:00'),
(9, '3', '18:00'),
(10,'3', '19:00'),
(11,'3', '20:00'),
(12,'3', '21:00'),
(13,'3', '22:00'),
(14, '4', '10:00'),
(15, '4', '11:00'),
(16, '4', '12:00'),
(17, '4', '13:00'),
(18, '4', '14:00'),
(19, '4', '15:00'),
(20, '4', '16:00'),
(21, '4', '17:00'),
(22, '4', '18:00'),
(23,'4', '19:00'),
(24,'4', '20:00'),
(25,'4', '21:00'),
(26,'4', '22:00'),
(27, '1', '10:00'),
(28, '1', '11:30'),
(29, '1', '13:00'),
(30, '1', '14:30'),
(31, '1', '16:00'),
(32, '1', '17:30'),
(33, '1', '19:00'),
(34, '1', '20:30'),
(35, '1', '22:00'),
(36, '2', '10:00'),
(37, '2', '11:30'),
(38, '2', '13:00'),
(39, '2', '14:30'),
(40, '2', '16:00'),
(41, '2', '17:30'),
(42, '2', '19:00'),
(43, '2', '20:30'),
(44, '2', '22:00');

INSERT INTO courts(id, name, sport_id) VALUES 
(1, 'Pista 1P', '1'),
(2, 'Pista 2P', '1'),
(3, 'Pista 3P', '1'),
(4, 'Pista 4P', '1'),
(5, 'Pista 1T', '2'),
(6, 'Pista 2T', '2'),
(7, 'Pista 3T', '2'),
(8, 'Pista 4T', '2'),
(9, 'Pista 1S', '3'),
(10, 'Pista 2S', '3'),
(11, 'Pista 3S', '3'),
(12, 'Pista 1F', '4'),
(13, 'Pista 2F', '4');

INSERT INTO subscription_fees(id, importe, date_pay, observation, client_id) VALUES 
(1, 59.99, '2024-03-30', suscripcion, 1);

INSERT INTO sports(id, sport) VALUES 
(1, 'Padel'),
(2, 'Tenis'),
(3, 'Futbol Sala'),
(4, 'Futbol 7');

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