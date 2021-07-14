-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 14, 2021 lúc 08:25 AM
-- Phiên bản máy phục vụ: 8.0.25
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `boxfetch_cf`
--

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `details`
-- (See below for the actual view)
--
CREATE TABLE `details` (
`id_table` int
,`orderNumber` int
,`orderDate` date
,`checkin` time
,`checkout` time
,`status` varchar(255)
,`name` varchar(255)
,`quantity` int
,`price` double
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderDetails`
--

CREATE TABLE `orderDetails` (
  `orderNumber` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `orderDetails`
--

INSERT INTO `orderDetails` (`orderNumber`, `id_product`, `quantity`) VALUES
(1, 1, 1),
(1, 2, 1),
(2, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderNumber` int NOT NULL,
  `orderDate` date DEFAULT NULL,
  `checkin` time DEFAULT NULL,
  `checkout` time DEFAULT NULL,
  `status` varchar(255) DEFAULT 'unpaid',
  `id_table` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orderNumber`, `orderDate`, `checkin`, `checkout`, `status`, `id_table`) VALUES
(1, '2021-07-14', '14:04:00', '15:04:00', 'paid', 1),
(2, '2021-07-14', '14:29:00', '15:29:00', 'paid', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Hướng dương một  nắng', 27000, 'hat-huong-duong-e1545808610962.jpeg'),
(2, 'Colette Steele', 860, 'download (10).jpeg'),
(3, 'Alec Paul', 440, 'download (2).jpeg'),
(4, 'Vera Combs', 140, 'download (3).jpeg'),
(5, 'Marshall Moody', 26, 'download (4).jpeg'),
(6, 'Aidan Morton', 263, 'download (5).jpeg'),
(7, 'Cullen Oneill', 719, 'download (5).jpeg'),
(8, 'Orson Townsend', 227, 'download (6).jpeg'),
(9, 'Jacob Rollins', 292, 'download (7).jpeg'),
(10, 'Ivana Hardy', 130, 'download (8).jpeg'),
(11, 'Rhoda Wiley', 284, 'download (9).jpeg'),
(12, 'Kirestin Dillard', 519, 'download (10).jpeg'),
(13, 'Joan Compton', 64, 'download (11).jpeg'),
(14, 'Leilani Mcdonald', 84, 'download (12).jpeg'),
(15, 'Hayley Diaz', 181, 'download (13).jpeg'),
(16, 'Kiona Mack', 775, 'download (14).jpeg'),
(17, 'Bell Chase', 380, 'download (15).jpeg'),
(18, 'Drew Emerson', 615, 'download (16).jpeg'),
(19, 'Noble Hinton', 564, 'download.jpeg'),
(20, 'Michelle Wise', 57, 'images (1).jpeg'),
(21, 'Minerva Moon', 281, 'images (2).jpeg'),
(22, 'Gay Boyd', 408, 'images.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tables`
--

CREATE TABLE `tables` (
  `id_table` int NOT NULL,
  `name` int DEFAULT NULL,
  `status` varchar(50) DEFAULT 'empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tables`
--

INSERT INTO `tables` (`id_table`, `name`, `status`) VALUES
(1, 1, 'empty'),
(2, 2, 'empty'),
(3, 3, 'empty'),
(4, 4, 'empty'),
(5, 5, 'empty'),
(6, 6, 'empty'),
(7, 7, 'empty'),
(8, 8, 'empty'),
(9, 9, 'empty'),
(10, 10, 'empty');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `numberPhone` int DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `numberPhone`, `address`, `image`) VALUES
(48, 'root', 'e10adc3949ba59abbe56e057f20f883e', 'cao@gmail.com', 989896789, 'hà nội', ''),
(50, 'khai', 'e10adc3949ba59abbe56e057f20f883e', 'khai@gmail.com', 989896789, 'Hải Dương', '93B7FFF4-B78E-4B16-8E94-45A17CC51C3A.jpeg'),
(51, 'khai2', 'e10adc3949ba59abbe56e057f20f883e', 'khai@gmail.com', 989896789, 'Hải Dương', 'Screen Shot 2021-07-13 at 16.44.56.png'),
(52, 'khai3', 'e10adc3949ba59abbe56e057f20f883e', 'khai@gmail.com', 989896789, 'Hải Dương', 'Screen Shot 2021-07-13 at 16.47.40.png'),
(53, 'khai4', 'e10adc3949ba59abbe56e057f20f883e', 'khai@gmail.com', 989896789, 'Hải Dương', 'Screen Shot 2021-07-13 at 16.48.47.png');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `details`
--
DROP TABLE IF EXISTS `details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `details`  AS SELECT `o`.`id_table` AS `id_table`, `o`.`orderNumber` AS `orderNumber`, `o`.`orderDate` AS `orderDate`, `o`.`checkin` AS `checkin`, `o`.`checkout` AS `checkout`, `o`.`status` AS `status`, `products`.`name` AS `name`, `orderdetails`.`quantity` AS `quantity`, `products`.`price` AS `price` FROM ((`orders` `o` join `orderdetails` on((`o`.`orderNumber` = `orderdetails`.`orderNumber`))) join `products` on((`orderdetails`.`id_product` = `products`.`id`))) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orderDetails`
--
ALTER TABLE `orderDetails`
  ADD PRIMARY KEY (`orderNumber`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNumber`),
  ADD KEY `id_table` (`id_table`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id_table`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNumber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tables`
--
ALTER TABLE `tables`
  MODIFY `id_table` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderDetails`
--
ALTER TABLE `orderDetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderNumber`) REFERENCES `orders` (`orderNumber`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_table`) REFERENCES `tables` (`id_table`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
