-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2022 at 08:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(6) NOT NULL,
  `nombre_cliente` varchar(191) NOT NULL,
  `direccion` varchar(191) NOT NULL,
  `correo` varchar(191) NOT NULL,
  `telefono` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_cliente`, `direccion`, `correo`, `telefono`, `created_at`) VALUES
(2, 'Morita suarez', 'Cl55sur- 43a49', 'morita456@gmail.com', '3003949799', '2022-08-23 20:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int(6) NOT NULL,
  `nombre_producto` varchar(191) NOT NULL,
  `categoria` varchar(191) NOT NULL,
  `stock` varchar(191) NOT NULL,
  `precio` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `nombre_producto`, `categoria`, `stock`, `precio`, `created_at`) VALUES
(20, 'Acople Plastico LV', 'Plomeria', '50', '13500', '2022-08-24 19:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(20) NOT NULL,
  `nombre_proveedor` varchar(191) NOT NULL,
  `telefono` varchar(191) NOT NULL,
  `direccion` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre_proveedor`, `telefono`, `direccion`, `created_at`) VALUES
(21, 'Homecenter Envigado', '3118758388', 'Calle 53a #123-49', '2022-08-25 00:01:00'),
(26, 'La vaquita', '3234343999', 'Calle 60 carrera 43a', '2022-08-25 12:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Daniel', '123', '2022-08-19 14:35:05'),
(2, 'Daniel97', '$2y$10$UuJu/T6jYdzhxrzfL9cLyumohF5.tTeu9oDMYqKVu4UCAzkR.ZmRK', '2022-08-19 14:59:16'),
(3, 'Morita', '$2y$10$TvgQK74/Oh3W2R96dwM66OKPlB2ihr2RmUgcX1kDd0KMggZcL1ikm', '2022-08-19 15:05:17'),
(4, 'Lola', '$2y$10$R7EHhGidLxU6nCMQHrZyT.J89SzFTGtVQ9Rl5oECV24Emvoe95g6K', '2022-08-19 15:05:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
