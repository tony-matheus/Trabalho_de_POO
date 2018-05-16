-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17-Maio-2018 às 00:42
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Address`
--

CREATE TABLE `Address` (
  `id` int(11) NOT NULL,
  `id_Client` int(11) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `reference_point` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Address`
--

INSERT INTO `Address` (`id`, `id_Client`, `street`, `number`, `reference_point`) VALUES
(1, 1, 'visconde de maua', 1001, 'camara dos deputados'),
(4, 4, 'antonio monteiro ', 1001, 'santa rosa'),
(5, 5, 'carnauba', 12, '-'),
(6, 6, 'sei n', 122, 'minha casa'),
(7, 7, 'sei n', 122, 'minha casa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Bank_check`
--

CREATE TABLE `Bank_check` (
  `id` int(11) NOT NULL,
  `number` int(20) NOT NULL,
  `account` int(20) NOT NULL,
  `agency` int(4) NOT NULL,
  `bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Bank_check`
--

INSERT INTO `Bank_check` (`id`, `number`, `account`, `agency`, `bank`) VALUES
(1, 0, 0, 0, ''),
(2, 0, 0, 0, ''),
(3, 0, 0, 0, ''),
(4, 0, 0, 0, ''),
(5, 0, 0, 0, ''),
(6, 0, 0, 0, ''),
(7, 0, 0, 0, ''),
(8, 0, 0, 0, ''),
(9, 2, 2, 2, 'b'),
(10, 2, 2, 2, 'b'),
(11, 2, 2, 2, 'b'),
(12, 2, 2, 2, 'b'),
(13, 2, 2, 2, 'b'),
(14, 2, 2, 2, 'b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Client`
--

CREATE TABLE `Client` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phoneNumber` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Client`
--

INSERT INTO `Client` (`id`, `name`, `phoneNumber`) VALUES
(1, 'Ariel', 987003345),
(2, 'Tony ', 87933575),
(3, 'Tony ', 87933575),
(4, 'Tony ', 87933575),
(5, 'emanuel ', 567890),
(6, 'Belson', 67890),
(7, 'Belson', 67890);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Delivery`
--

CREATE TABLE `Delivery` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `board_number` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Delivery`
--

INSERT INTO `Delivery` (`id`, `name`, `board_number`) VALUES
(1, 'Nelson', NULL),
(2, 'Vini', NULL),
(3, 'Tony', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Desserts`
--

CREATE TABLE `Desserts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Desserts`
--

INSERT INTO `Desserts` (`id`, `name`, `price`) VALUES
(1, 'pudim', '13.00'),
(2, 'Mega Ligado', '14.90');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Drinks`
--

CREATE TABLE `Drinks` (
  `id` int(11) NOT NULL,
  `amount_stock` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Drinks`
--

INSERT INTO `Drinks` (`id`, `amount_stock`, `name`, `price`) VALUES
(1, 10, 'skol', '3.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Ingredients`
--

CREATE TABLE `Ingredients` (
  `id` int(11) NOT NULL,
  `id_pizza` int(11) DEFAULT NULL,
  `id_meal` int(11) DEFAULT NULL,
  `id_dessert` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Ingredients`
--

INSERT INTO `Ingredients` (`id`, `id_pizza`, `id_meal`, `id_dessert`, `name`) VALUES
(1, 1, NULL, NULL, 'calabresa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Itens_order`
--

CREATE TABLE `Itens_order` (
  `id` int(11) NOT NULL,
  `id_drinks` int(11) DEFAULT NULL,
  `id_pizza` int(11) DEFAULT NULL,
  `id_meal` int(11) DEFAULT NULL,
  `id_dessert` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Itens_order`
--

INSERT INTO `Itens_order` (`id`, `id_drinks`, `id_pizza`, `id_meal`, `id_dessert`, `id_order`, `amount`) VALUES
(39, NULL, 1, NULL, NULL, 85, 1),
(40, NULL, 1, NULL, NULL, 86, 1),
(41, NULL, 1, NULL, NULL, 87, 1),
(42, NULL, 1, NULL, NULL, 88, 1),
(43, NULL, 1, NULL, NULL, 89, 1),
(44, NULL, 1, NULL, NULL, 90, 1),
(45, NULL, 1, NULL, NULL, 91, 1),
(46, NULL, 1, NULL, NULL, 92, 1),
(47, NULL, 1, NULL, NULL, 93, 1),
(48, NULL, 1, NULL, NULL, 94, 1),
(49, NULL, 1, NULL, NULL, 95, 1),
(50, NULL, 1, NULL, NULL, 96, 1),
(51, NULL, 1, NULL, NULL, 97, 1),
(52, NULL, 1, NULL, NULL, 98, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Meals`
--

CREATE TABLE `Meals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Meals`
--

INSERT INTO `Meals` (`id`, `name`, `price`) VALUES
(3, 'Macarrao', '17.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Order`
--

CREATE TABLE `Order` (
  `id` int(11) NOT NULL,
  `id_Client` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `value` decimal(13,2) NOT NULL,
  `id_Delivery` int(11) DEFAULT NULL,
  `date_hour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Order`
--

INSERT INTO `Order` (`id`, `id_Client`, `status`, `value`, `id_Delivery`, `date_hour`) VALUES
(1, 1, 1, '0.00', 2, '2018-05-15 18:55:16'),
(13, 1, 0, '0.00', 2, '2018-05-16 18:55:16'),
(15, 1, 3, '0.00', 2, '2018-05-16 18:55:16'),
(50, 3, 0, '6.00', 3, '2018-05-16 21:51:38'),
(51, 3, 0, '6.00', 3, '2018-05-16 21:51:59'),
(52, 3, 0, '6.00', 3, '2018-05-16 21:53:05'),
(53, 4, 0, '9.00', 3, '2018-05-16 21:57:26'),
(54, 4, 0, '9.00', 3, '2018-05-16 21:57:51'),
(55, 4, 0, '9.00', 3, '2018-05-16 21:57:59'),
(56, 4, 0, '9.00', 3, '2018-05-16 21:58:14'),
(57, 4, 0, '9.00', 3, '2018-05-16 21:58:44'),
(58, 4, 0, '9.00', 3, '2018-05-16 21:58:50'),
(59, 4, 0, '9.00', 3, '2018-05-16 21:59:38'),
(60, 3, 0, '18.00', 2, '2018-05-16 22:00:35'),
(61, 3, 0, '18.00', 2, '2018-05-16 22:01:09'),
(62, 7, 0, '18.00', 3, '2018-05-16 22:01:51'),
(63, 2, 0, '9.00', 2, '2018-05-16 22:03:02'),
(64, 2, 0, '9.00', 2, '2018-05-16 22:03:41'),
(65, 2, 0, '9.00', 2, '2018-05-16 22:04:20'),
(66, 2, 0, '9.00', 2, '2018-05-16 22:08:12'),
(67, 2, 0, '9.00', 2, '2018-05-16 22:09:10'),
(68, 2, 0, '9.00', 2, '2018-05-16 22:09:32'),
(69, 4, 0, '6.00', 3, '2018-05-16 22:10:01'),
(70, 4, 0, '6.00', 3, '2018-05-16 22:10:03'),
(71, 4, 0, '6.00', 3, '2018-05-16 22:10:21'),
(72, 4, 0, '6.00', 3, '2018-05-16 22:10:59'),
(73, 4, 0, '9.00', 3, '2018-05-16 22:12:17'),
(74, 3, 0, '6.00', 3, '2018-05-16 22:14:08'),
(75, 3, 0, '3.00', 3, '2018-05-16 22:14:36'),
(76, 4, 0, '9.00', 3, '2018-05-16 22:16:17'),
(77, 3, 0, '9.00', 3, '2018-05-16 22:18:01'),
(78, 3, 0, '9.00', 3, '2018-05-16 22:18:39'),
(79, 3, 0, '3.00', 3, '2018-05-16 22:19:13'),
(80, 3, 0, '3.00', 3, '2018-05-16 22:19:50'),
(81, 5, 0, '3.00', 3, '2018-05-16 22:20:49'),
(82, 5, 0, '3.00', 3, '2018-05-16 22:21:06'),
(83, 3, 0, '3.00', 3, '2018-05-16 22:21:59'),
(84, 3, 0, '3.00', 3, '2018-05-16 22:22:54'),
(85, 2, 0, '35.00', 1, '2018-05-16 22:24:25'),
(86, 2, 0, '35.00', 1, '2018-05-16 22:25:08'),
(87, 3, 0, '35.00', 2, '2018-05-16 22:26:45'),
(88, 3, 0, '35.00', 2, '2018-05-16 22:28:56'),
(89, 2, 0, '35.00', 1, '2018-05-16 22:29:59'),
(90, 4, 0, '35.00', 2, '2018-05-16 22:31:14'),
(91, 4, 0, '35.00', 3, '2018-05-16 22:32:09'),
(92, 3, 0, '35.00', 3, '2018-05-16 22:33:17'),
(93, 2, 0, '35.00', 1, '2018-05-16 22:34:24'),
(94, 2, 0, '35.00', 1, '2018-05-16 22:34:26'),
(95, 2, 0, '35.00', 1, '2018-05-16 22:36:34'),
(96, 2, 0, '35.00', 1, '2018-05-16 22:37:15'),
(97, 2, 0, '35.00', 1, '2018-05-16 22:39:58'),
(98, 2, 0, '35.00', 1, '2018-05-16 22:40:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Order/Delivery`
--

CREATE TABLE `Order/Delivery` (
  `id` int(11) NOT NULL,
  `id_Order` int(11) NOT NULL,
  `id_Delivery` int(11) NOT NULL,
  `value` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Payment_form`
--

CREATE TABLE `Payment_form` (
  `id` int(11) NOT NULL,
  `credit_card` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `debit_card` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `bank_check` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Payment_form`
--

INSERT INTO `Payment_form` (`id`, `credit_card`, `money`, `debit_card`, `id_order`, `bank_check`) VALUES
(33, NULL, NULL, NULL, 96, 12),
(34, NULL, NULL, NULL, 98, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pizzas`
--

CREATE TABLE `Pizzas` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Pizzas`
--

INSERT INTO `Pizzas` (`id`, `name`, `price`, `size`) VALUES
(1, 'calabresa', '35.00', 'grande'),
(2, 'Mista', '10.00', 'Grande');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Client` (`id_Client`);

--
-- Indexes for table `Bank_check`
--
ALTER TABLE `Bank_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Delivery`
--
ALTER TABLE `Delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Desserts`
--
ALTER TABLE `Desserts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Drinks`
--
ALTER TABLE `Drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pizza` (`id_pizza`),
  ADD KEY `id_meal` (`id_meal`),
  ADD KEY `id_dessert` (`id_dessert`);

--
-- Indexes for table `Itens_order`
--
ALTER TABLE `Itens_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_drinks` (`id_drinks`),
  ADD KEY `id_pizza` (`id_pizza`),
  ADD KEY `id_meal` (`id_meal`),
  ADD KEY `id_dessert` (`id_dessert`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `Meals`
--
ALTER TABLE `Meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Client` (`id_Client`);

--
-- Indexes for table `Order/Delivery`
--
ALTER TABLE `Order/Delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Order` (`id_Order`),
  ADD KEY `id_Delivery` (`id_Delivery`);

--
-- Indexes for table `Payment_form`
--
ALTER TABLE `Payment_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `Pizzas`
--
ALTER TABLE `Pizzas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Bank_check`
--
ALTER TABLE `Bank_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Delivery`
--
ALTER TABLE `Delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Desserts`
--
ALTER TABLE `Desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Drinks`
--
ALTER TABLE `Drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Ingredients`
--
ALTER TABLE `Ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Itens_order`
--
ALTER TABLE `Itens_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `Meals`
--
ALTER TABLE `Meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `Order/Delivery`
--
ALTER TABLE `Order/Delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Payment_form`
--
ALTER TABLE `Payment_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `Pizzas`
--
ALTER TABLE `Pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id_Client`) REFERENCES `Client` (`id`);

--
-- Limitadores para a tabela `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`id_pizza`) REFERENCES `Pizzas` (`id`),
  ADD CONSTRAINT `ingredients_ibfk_2` FOREIGN KEY (`id_meal`) REFERENCES `Meals` (`id`),
  ADD CONSTRAINT `ingredients_ibfk_3` FOREIGN KEY (`id_dessert`) REFERENCES `Desserts` (`id`);

--
-- Limitadores para a tabela `Itens_order`
--
ALTER TABLE `Itens_order`
  ADD CONSTRAINT `itens_order_ibfk_1` FOREIGN KEY (`id_drinks`) REFERENCES `Drinks` (`id`),
  ADD CONSTRAINT `itens_order_ibfk_2` FOREIGN KEY (`id_pizza`) REFERENCES `Pizzas` (`id`),
  ADD CONSTRAINT `itens_order_ibfk_3` FOREIGN KEY (`id_meal`) REFERENCES `Meals` (`id`),
  ADD CONSTRAINT `itens_order_ibfk_4` FOREIGN KEY (`id_dessert`) REFERENCES `Desserts` (`id`),
  ADD CONSTRAINT `itens_order_ibfk_5` FOREIGN KEY (`id_order`) REFERENCES `Order` (`id`);

--
-- Limitadores para a tabela `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_Client`) REFERENCES `Client` (`id`);

--
-- Limitadores para a tabela `Order/Delivery`
--
ALTER TABLE `Order/Delivery`
  ADD CONSTRAINT `order/delivery_ibfk_1` FOREIGN KEY (`id_Order`) REFERENCES `Order` (`id`),
  ADD CONSTRAINT `order/delivery_ibfk_2` FOREIGN KEY (`id_Delivery`) REFERENCES `Delivery` (`id`);

--
-- Limitadores para a tabela `Payment_form`
--
ALTER TABLE `Payment_form`
  ADD CONSTRAINT `payment_form_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `Order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
