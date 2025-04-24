

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `firstName` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lastName` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dept` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `degree` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `position` varchar(46) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `accounts` (`id`, `fullname`, `username`, `email`, `password`, `address`, `contact`) VALUES
(1, 'Lito Kamo', 'testadmin', 'test@admin.com', 'testadmin123', 'Gapan city', '0912454545'),
(2, 'Lito testone', 'testadmin', 'testone@admin.com', 'testone', 'cabanatuan city', '09551123456'),
(3, 'fasdfasfda', 'asdfsaf', 'asdfad@gmail.com', 'adsfasdf', 'asfdasf', '343434343'),
(4, 'kahit ano', 'suboklng', 'subok@gmail.com', 'subok123', 'Pias', '456421255'),
(5, 'testteacher', 'testteacher', 'testteacher@gmail.com', 'adfasdf', 'cabanatuan', '543535345');


CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_details` (`id`, `full_name`, `email_address`, `password`, `city`, `country`, `created_at`) VALUES
(1, 'Inspector', 'inspector@gmail.com', 'inspector123', 'Gapan', 'Philippines', '0000-00-00 00:00:00');


ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

