-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2022 a las 04:11:22
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dfs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(0, 'general'),
(1, 'admintrador'),
(2, 'aprendiz'),
(3, 'compañero'),
(4, 'maestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ruote` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `size` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL,
  `age` int(10) NOT NULL,
  `where` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `age`, `where`, `email`, `password`, `id_category`) VALUES
(1, '', '', 0, '', 'zorronauta@hotmail.com', '$2y$10$WVHnSdqP.MlGP8JGOVVHuuv4rtXopnRS7WYLF7IPY6bZ4QGvCSRky', 0),
(2, 'Hector', 'baralo', 3, 'juan', 'hectormotazorrilla@gmail.com', '$2y$10$c.ztFqf/leRhltZFR0T61OBqQoYiaKKwPJHHFTMUxtNITWw/ySxYe', 3),
(3, 'Hector', 'mota', 3, 'juan', '1@1', '$2y$10$jWrnv56T6/sYc1ntKLS1YeNt/ZZzy834CUOVZzCTAbJxnlQsXi3u6', 0),
(4, 'yeisivel', 'jeisivel', 3, 'juan', 'yetzibel@g.com', '$2y$10$67mhYwbr66IsJNjOFUQg3O69FDK5yDWuaUmyXLZfdC0WjtWIffpT6', 0),
(5, 'gregorio', 'gregorio', 3, 'juan', 'g@g', '$2y$10$ozBwklQ24HRJ1gMboaE5fe81geMsXZsgCF4ivUZcmiclFMLqWp0ii', 0),
(6, 'Héctor Mota', 'hector', 3, 'juan', 'serviciosnvrbll@spoofmail.de', '$2y$10$DSiEvcAuKQ01doyGX2SWK.0KPkSdv/7zpQRrz4hjFBwkE8cg7H9Pq', 0),
(7, 'Tomo Fujisawa', 'Tomo', 26, 'japon', 'Tomo@gmail.com', '$2y$10$L1ucawMhJUgvK5jJaLCh8eiJfKWRoJkHpir9osg.es4kfwztj5gKO', 2),
(8, '', '', 0, '', '', '', 3),
(9, 'Hector', '\"\"', 3, 'juan', '2@2', '$2y$10$dRW/IxpSu8/wvvJFoN9ivO0tXe.X9kQrt1uFhrZSqcrmBueox5FfC', 0),
(10, 'manuel', 'manolo', 1, 'juan', '11@hh.com', '$2y$10$wOE8xaV97JW9V7mGvSWWU.lCymunVagebL.nAqqBI8tnTGvBwwo0W', 0),
(11, 'Hector', 'q', 9, 'juan', '123@112.com', '$2y$10$V4LWQCGLW2ISgHWLHH65q.BF62m4MHjRlgPIDdo0O4tCU6wZtvciy', 0),
(12, 'com', 'fellow', 5, 'japon', 'f@mz.co', '$2y$10$yDWm8fWGyguUm6ADBXS8eeeTewtqo6leJBV0aalPOD5ocAxOsQtyO', 0),
(13, 'm', 'master', 9, 'juan', 'm@m.com', '$2y$10$XO/EpPnpxiOJlRwteJDiFOHtruGjbshZ5mNZewrfmz.JL31duY0hm', 0),
(14, 'n', 'p', 26, 'p', 'p@p', '$2y$10$uIo6zspJ/U6neI25Einqxu.93FloUTqOTZLKWOK1jXpy5UZcLtoua', 0),
(15, 'a', 'a', 0, 'juan', '0@0', '$2y$10$0hmOvzjJjh1s.CZPBPxtjusvb70se5XkoI6ivb9jeqlxZUbETATSS', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
