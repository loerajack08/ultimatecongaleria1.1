-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tabla_form` (
  `id` int(5) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `usuario` varchar(5) NOT NULL,
  `contraseña` varchar(12) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tabla_form` (`id`, `nombre`, `usuario`, `contraseña`) VALUES
(1, 'test', 'tes12', '312321'),

ALTER TABLE `tabla_form`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tabla_form`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

