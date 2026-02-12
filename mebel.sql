CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `product` text NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('В обработке','Одобрен') NOT NULL DEFAULT 'В обработке',
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'manager1', '1234');