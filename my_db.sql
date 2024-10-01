-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 09:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `image`) VALUES
(4, 'COOKOUT PARTY', 'Barbecue Party - Made with PosterMyWall.jpg'),
(6, 'PIZZA PARTY', 'National coffe icecream day.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(25, 1, 'Kaweeth Sathru', '0718549785', 'sathru@gmail.com', 'paypal', '102/A, Kiribathgoda, Western Province, Sri Lanka - 11630', 'Pizza (180 x 2) - Kottu (160 x 1) - ', 520, '2024-08-10', 'pending'),
(26, 4, 'Isuru', '0789248715', 'isuru@gmail.com', 'cash on delivery', '14/1, Kaluthara, Western Province, Sri Lanka - 1014', 'Submarine Sandwich (300 x 1) - ', 300, '2024-08-10', 'pending'),
(27, 4, 'Isuru', '0789248715', 'isuru@gmail.com', 'cash on delivery', '14/1, Kaluthara, Western Province, Sri Lanka - 1014', 'Burger (200 x 5) - Special Biryani (350 x 1) - Watalappan (100 x 1) - ', 1450, '2024-08-10', 'pending'),
(28, 1, 'Kaweeth Sathru', '0718549785', 'sathru@gmail.com', 'credit card', '102/A, Kiribathgoda, Western Province, Sri Lanka - 11630', 'Fried Rice (280 x 1) - Submarine Sandwich (300 x 1) - ', 580, '2024-08-10', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `image`) VALUES
(44, 'Pizza', 'Italian Cuisine', 180, 'A timeless favorite topped with fresh mozzarella, basil, and tomato sauce.', 'M Pizza.jpeg'),
(45, 'Kung Pao Chicken', 'Chinese Cuisine', 220, 'Tender chicken stir-fried with peanuts, chili peppers, and vegetables in a savory sauce.', 'M Kung Pao Chicken.jpeg'),
(46, 'Taco', 'American Cuisine', 150, 'Crispy taco shell filled with seasoned beef, lettuce, cheddar cheese, and tangy salsa.', 'M Taco.jpeg'),
(48, 'Kottu', 'Sri Lankan Cuisine', 160, 'Stir-fried flatbread with chicken, vegetables, and aromatic spices.', 'M Kottu.jpeg'),
(49, 'Focaccia Bread', 'Italian Cuisine', 250, 'Soft, olive oil-infused bread topped with rosemary and sea salt.', 'M Focaccia Bread.jpeg'),
(50, 'Spring Vegan Egg Rolls', 'Chinese Cuisine', 120, 'Crispy rolls filled with fresh vegetables and aromatic herbs.', 'M Spring Vegan Egg Rolls.jpeg'),
(52, 'Burger', 'American Cuisine', 200, 'Juicy beef patty with lettuce, tomato, cheddar, and pickles on a toasted bun.', 'M Burger.jpg'),
(53, 'Special Spaghetti', 'Chinese Cuisine', 360, 'Stir-fried noodles with savory soy sauce, vegetables, and your choice of protein.', 'M Spaghetti.jpg'),
(54, 'Special Biryani', 'Sri Lankan Cuisine', 350, 'Fragrant basmati rice with spiced chicken, caramelized onions, and fresh herbs.', 'M Chicken Biryani.jpeg'),
(55, 'Lasagna', 'Italian Cuisine', 210, 'Layered pasta with rich meat sauce, creamy béchamel, and melted mozzarella.', 'M Lasagna.jpeg'),
(56, 'Crispy Chicken', 'American Cuisine', 280, 'Golden, seasoned coating with juicy, tender meat inside.', 'M Crispy Chicken.jpeg'),
(57, 'Caprese Risotto', 'Italian Cuisine', 320, 'Creamy risotto with fresh tomatoes, mozzarella, and basil.', 'M Caprese Risotto.jpeg'),
(58, 'Watalappan', 'Sri Lankan Cuisine', 100, 'Rich Sri Lankan coconut custard with spices and jaggery.', 'M Watalappan.jpeg'),
(59, 'Fried Rice', 'Chinese Cuisine', 280, 'Flavored rice stir-fried with vegetables, egg, and your choice of protein.', 'M Fried Rice.jpeg'),
(60, 'Egg Rolls', 'Sri Lankan Cuisine', 150, 'Crispy rolls filled with spiced egg and vegetables.', 'M Egg Rolls.jpeg'),
(61, 'Submarine Sandwich', 'American Cuisine', 300, 'Hearty hoagie filled with layered meats, cheese, and fresh veggies.', 'M Submarine Sandwich.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `name`, `image`) VALUES
(2, 'Special Offer', 'Burger Video Ads _ PosterMyWall.png'),
(3, 'Today&#39;s Special', 'Delicious food social media.jpeg'),
(4, 'Hot Deal', 'Food Social Media Template.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `guest` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `phone_no`, `date`, `time`, `guest`, `status`) VALUES
(8, 'Kaweeth Sathru', 'sathru@gmail.com', 788543133, '2024-08-21', '19:00:00', '2', 'pending'),
(9, 'Pasan Thathsara', 'pasan@gmail.com', 714587968, '2024-09-05', '18:30:00', '5', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `password`) VALUES
(4, 'staff', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(1, 'Kaweeth Sathru', 'sathru@gmail.com', '0718549785', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '102/A, Kiribathgoda, Western Province, Sri Lanka - 11630'),
(4, 'Isuru', 'isuru@gmail.com', '0789248715', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '14/1, Kaluthara, Western Province, Sri Lanka - 1014');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
