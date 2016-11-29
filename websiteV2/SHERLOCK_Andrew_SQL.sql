-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2016 at 06:59 PM
-- Server version: 5.7.15-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_db`
--

CREATE TABLE `cart_db` (
  `id` int(11) NOT NULL,
  `cart` text NOT NULL,
  `expiry` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_db`
--

INSERT INTO `cart_db` (`id`, `cart`, `expiry`, `paid`, `user_id`) VALUES
(87, '[["7","small","3","2"]]', '2016-12-18 19:09:55', 0, 1),
(88, '[["7","meduim","3","3"]]', '2016-12-19 22:08:04', 0, 1),
(89, '[["6","unit","13","2"]]', '2016-12-19 23:03:56', 0, 9),
(108, '[["24","medium","15.99","3"]]', '2016-12-29 17:06:08', 0, 42);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'dvd'),
(2, 'poster'),
(3, 'clothing'),
(4, 'figure'),
(5, 'manga');

-- --------------------------------------------------------

--
-- Table structure for table `orders_db`
--

CREATE TABLE `orders_db` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_address` text NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_total` float NOT NULL,
  `user_items` text NOT NULL,
  `date_ordered` date NOT NULL,
  `order_status` varchar(200) NOT NULL DEFAULT 'Order Recieved, Dispatching soon',
  `order_dispatched` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_db`
--

INSERT INTO `orders_db` (`order_id`, `user_id`, `user_address`, `user_phone`, `user_total`, `user_items`, `date_ordered`, `order_status`, `order_dispatched`) VALUES
(2, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 41.85, '[["8","unit","12.99","3"]]', '2016-11-20', 'Order Dispatched - 2016-11-23 15:18:56', 1),
(4, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 753.42, '[["8","unit","12.99","54"]]', '2016-11-20', 'Order Dispatched - 2016-11-21 11:01:54', 1),
(5, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 12.88, '[["8","unit","12.99","4"],["9","what","4","3"]]', '2016-11-20', 'Order Dispatched - 2016-11-23 14:47:22', 1),
(6, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 111.66, '[["10","unit","25.99","4"]]', '2016-11-21', 'Order Recieved, Dispatching soon', 0),
(7, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 195.38, '[["8","unit","12.99","4"],["10","unit","25.99","5"]]', '2016-11-22', 'Order Recieved, Dispatching soon', 0),
(8, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 8.59, '[["9","what","4","2"]]', '2016-11-22', 'Order Recieved, Dispatching soon', 0),
(9, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 148.16, '[["10","unit","25.99","5"],["11","unit","2","4"]]', '2016-11-22', 'Order Dispatched - 2016-11-23 14:49:47', 1),
(11, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 92.33, '[["11","unit","2","4"],["10","unit","25.99","3"]]', '2016-11-22', 'Order Recieved, Dispatching soon', 0),
(12, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 92.33, '[["11","unit","2","4"],["10","unit","25.99","3"]]', '2016-11-22', 'Order Recieved, Dispatching soon', 0),
(13, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 83.74, '[["10","unit","25.99","3"]]', '2016-11-22', 'Order ', 0),
(14, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 60.14, '[["4","unit","16","3"],["9","what","4","2"]]', '2016-11-23', 'Order Recieved, Dispatching soon', 0),
(15, 25, 'Admin, Main Street, dunboyne, meath, Ireland', '123456789', 356.46, '[["10","units","25.99","12"],["4","units","10","2"]]', '2016-11-26', 'Order Recieved, Dispatching soon', 0),
(16, 25, 'Admin, Main Street,  dunboyne,  meath,  meath', '123456789', 67.55, '[["12","units","11.9643","2"],["8","units","12.99","3"]]', '2016-11-26', 'Order Recieved, Dispatching soon', 0),
(17, 25, 'Admin, Main Street,  dunboyne,  meath,  meath', '123456789', 269.86, '[["12","units","11.9643","21"]]', '2016-11-26', 'Order Recieved, Dispatching soon', 0),
(18, 25, 'Admin, Main Street,  dunboyne,  meath,  meath', '123456789', 25.7, '[["12","units","11.9643","2"]]', '2016-11-26', 'Order Recieved, Dispatching soon', 0),
(19, 25, 'Admin, Main Street,  dunboyne,  meath,  meath', '123456789', 62.51, '[["4","units","19.4","3"]]', '2016-11-27', 'Order Recieved, Dispatching soon', 0),
(20, 25, 'Admin, Main Street,  dunboyne,  meath,  meath', '123456789', 166.7, '[["4","units","19.4","8"]]', '2016-11-27', 'Order Recieved, Dispatching soon', 0),
(21, 38, 'Admin, baytown park,   dunboyne,   meath,   meath', '8617007641', 9.66, '[["27","small","8.99","1"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(22, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 282.27, '[["27","small","8.99","4"],["30","units","8.99","5"],["28","units","7.99","5"],["29","units","18.99","2"],["33","units","25.99","4"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(23, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 19.31, '[["27","large","8.99","2"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(24, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 19.31, '[["27","large","8.99","2"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(25, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 156.57, '[["27","large","8.99","2"],["24","medium","15.99","1"],["21","medium","27.95","4"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(26, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 156.57, '[["27","large","8.99","2"],["24","medium","15.99","1"],["21","medium","27.95","4"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(27, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 156.57, '[["27","large","8.99","2"],["24","medium","15.99","1"],["21","medium","27.95","4"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(28, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 156.57, '[["27","large","8.99","2"],["24","medium","15.99","1"],["21","medium","27.95","4"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(29, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 156.57, '[["27","large","8.99","2"],["24","medium","15.99","1"],["21","medium","27.95","4"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(30, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 147.07, '[["37","units","18.99","2"],["38","units","18.99","1"],["39","units","19.99","1"],["40","units","19.99","1"],["41","units","19.99","1"],["42","units","19.99","1"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(31, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 359.63, '[["37","unit","18.99","2"],["34","unit","19.99","3"],["38","unit","18.99","3"],["39","unit","19.99","2"],["40","unit","19.99","3"],["41","unit","19.99","2"],["42","unit","19.99","2"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(32, 38, 'Admin, baytown park,    dunboyne,    meath,    meath', '8617007641', 359.63, '[["37","unit","18.99","2"],["34","unit","19.99","3"],["38","unit","18.99","3"],["39","unit","19.99","2"],["40","unit","19.99","3"],["41","unit","19.99","2"],["42","unit","19.99","2"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(33, 38, 'Admin, baytown park,     dunboyne,     meath,     meath', '8617007641', 26.28, '[["24","medium","8.1549","3"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(34, 38, 'Admin, baytown park,     dunboyne,     meath,     meath', '8617007641', 17.52, '[["24","small","8.1549","2"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0),
(35, 38, 'Admin, baytown park,     dunboyne,     meath,     meath', '8617007641', 60.04, '[["21","small","27.95","2"]]', '2016-11-29', 'Order Recieved, Dispatching soon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_db`
--

CREATE TABLE `products_db` (
  `id` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_info` text NOT NULL,
  `product_featured` int(11) NOT NULL DEFAULT '0',
  `product_archived` int(11) NOT NULL DEFAULT '0',
  `product_sold` int(11) NOT NULL DEFAULT '0',
  `product_discount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_db`
--

INSERT INTO `products_db` (`id`, `product_category`, `product_info`, `product_featured`, `product_archived`, `product_sold`, `product_discount`) VALUES
(20, 3, '{"product_name":"Kaneda Red Jacket","product_desc":"Always wanted the infamous jacket from Akira? Now you can, made in high quality leather. You can look like Kaneda, all you need is the bike.","product_size":"small:12,medium:19,large:8","product_image":"\\/images\\/products\\/148028608420.png","product_price":"35.99"}', 1, 0, 2, 0.12),
(21, 3, '{"product_name":"Kaneda Black Jacket","product_desc":"New to the market we have Kaneda&#39;s jacket, but in black. This is Perfect for the people who want to be a little different from the crowd. Much like our red version, it is made from high quality leather. We are sure this will be a top seller!","product_size":"small:9,medium:8,large:10,extralarge:6","product_image":"\\/images\\/products\\/148028619621.png","product_price":"27.95"}', 1, 0, 19, 0),
(22, 3, '{"product_name":"Black Bad For Education Hoodie ","product_desc":"In High quality Polyester, we have this amazing jumper. Has the pill from Kaneda&#39;s jacket to show you have a great taste in movies and style! ","product_size":"extrasmall:5,small:10,medium:18,large:10,extralarge:3","product_image":"\\/images\\/products\\/148028621122.png","product_price":"17.99"}', 0, 0, 2, 0),
(23, 3, '{"product_name":"Red Pill Hoodie","product_desc":"In the style of the famous jacket from Kaneda. We have this hoodie, very high quality and a proven fan favorite. Be sure to pick up one of these soon! ","product_size":"small:12,medium:14,large:11","product_image":"\\/images\\/products\\/148028622023.png","product_price":"12.50"}', 0, 0, 0, 0),
(24, 3, '{"product_name":"End Of Days Hoodie","product_desc":"Show everyone how the story starts with the explosion of Tokyo. In black and made of high quality material. One of these should be added to your collection today","product_size":"extrasmall:0,small:15,medium:11,large:22","product_image":"\\/images\\/products\\/148028636423.png","product_price":"15.99"}', 0, 0, 21, 0.49),
(25, 3, '{"product_name":"End Of Days T-Shirt","product_desc":"To go along with our hoodie, get the end of days t-shirt. In white, would be a perfect addition to your wardrobe.","product_size":"small:13,medium:2,large:19","product_image":"\\/images\\/products\\/148028645724.png","product_price":"12.99"}', 0, 0, 9, 0),
(26, 3, '{"product_name":"Tetsuo T-Shirt","product_desc":"Show how powerful Tetsuo was with this t-shirt, available in white. Perfect for the summer months!","product_size":"small:11,medium:19,large:21,extralarge:12","product_image":"\\/images\\/products\\/148028655425.png","product_price":"12.99"}', 1, 0, 0, 0),
(27, 3, '{"product_name":"Kaneda Bike T-Shirt","product_desc":"From the famous poster design of the movie. The image of Kaneda walking towards his bike. Perfect and cheap addition to your wardrobe.","product_size":"small:17,medium:12,large:10,extralarge:12","product_image":"\\/images\\/products\\/148028666126.png","product_price":"8.99"}', 0, 0, 16, 0),
(28, 2, '{"product_name":"Tetsuo Pill Poster","product_desc":"A perfect addition to your room. A high quality print of a image drawn by one of the original Akira artists. Highly collectible. Height 60cm X 30cm.","product_size":"unit:25","product_image":"\\/images\\/products\\/148028683327.png","product_price":"7.99"}', 0, 0, 0, 0),
(29, 1, '{"product_name":"Akira Dvd Blu-Ray","product_desc":"The Akira Blu-Ray DVD. Completely remastered and in high quality. In Japanese or English audio, with many commentary&#39;s from the original cast and director. ","product_size":"unit:14","product_image":"\\/images\\/products\\/148028691728.png","product_price":"18.99"}', 0, 0, 0, 0.16),
(30, 1, '{"product_name":"Akira Dvd","product_desc":"The reason we are all here, Buy the Akira DVD, in english or japanese audio. watch one of the best films ever to come out of japan.","product_size":"unit:19","product_image":"\\/images\\/products\\/148028694529.png","product_price":"8.99"}', 0, 0, 0, 0),
(31, 1, '{"product_name":"Akira Special Edition DVD","product_desc":"We have managed to get our hands on the 25th anniversary special edition DVD. With never seen before features. A must have for any fan of Akira. Buy now will stocks last. Once sold, these are gone.","product_size":"unit:12","product_image":"\\/images\\/products\\/148028706030.png","product_price":"40.99"}', 0, 0, 0, 0),
(32, 4, '{"product_name":"Kaneda Bike Figure","product_desc":"A high quality 3d print of Kaneda&#39;s bike. A must have for any collector. It is a reproduction of the originals released at the time of the release of the film. **NOTE : Kaneda does not come with Bike **","product_size":"unit:12","product_image":"\\/images\\/products\\/148028722831.png","product_price":"32.99"}', 0, 0, 0, 0),
(33, 4, '{"product_name":"Tetsuo Mutation ","product_desc":"A high detailed figure of Tetsuo as he goes through the change with his power. A very detailed 3D print and very collectible.","product_size":"unit:12","product_image":"\\/images\\/products\\/148028734032.png","product_price":"25.99"}', 1, 0, 0, 0),
(34, 4, '{"product_name":"Kaneda Figure","product_desc":"Buy one to go with your bike that we also sell. In high detail, one of the best quality figures we have seen since we opened up. A must buy.","product_size":"unit:14","product_image":"\\/images\\/products\\/148028745233.png","product_price":"19.99"}', 0, 0, 3, 0.25),
(35, 4, '{"product_name":"Kaneda With Cop","product_desc":"A massive model of one of the most remembered scenes of Akira. In very gory detail. We are a huge fan of this model, buy them while we still have them available.","product_size":"unit:25","product_image":"\\/images\\/products\\/148028755734.png","product_price":"52.99"}', 0, 0, 0, 0),
(37, 5, '{"product_name":"Akira Manga Vol 1","product_desc":"Read the story that the movie came from. the akira manga. Translated into english and split into 6 volumes. The manga is as good as the dvd itself. ","product_size":"unit:18","product_image":"\\/images\\/products\\/148028776235.png","product_price":"18.99"}', 1, 0, 2, 0),
(38, 5, '{"product_name":"Akira Manga Vol 2","product_desc":"Read the story that the movie came from. the akira manga. Translated into english and split into 6 volumes. The manga is as good as the dvd itself. ","product_size":"unit:18","product_image":"\\/images\\/products\\/148028780937.png","product_price":"18.99"}', 0, 0, 3, 0),
(39, 5, '{"product_name":"Akira Manga Vol 3","product_desc":"Read the story that the movie came from. the akira manga. Translated into english and split into 6 volumes. The manga is as good as the dvd itself. ","product_size":"unit:15","product_image":"\\/images\\/products\\/148028785938.png","product_price":"19.99"}', 0, 0, 2, 0),
(40, 5, '{"product_name":"Akira Manga Vol 4","product_desc":"Suffering the fate that beset its namesake three decades earlier, twenty-first-century Neo-Tokyo lies in ruin. Set off by the bullet of a would-be assassin, the godlike telekinetic fury of the superhuman child Akira has once again demolished in seconds that which took decades and untold billions to build. Now cut off from the rest of the world, the Great Tokyo Empire rises, with Akira its king, the psychic juggernaut Tetsuo its mad prime minister, and a growing army of fanatic acolytes ready to go to any length to please their masters. Forces on the outside still search for a way to stop Akira, and the answer may lie in the hands of the mysterious Lady Miyako, a powerful member of Akira\\u2019s paranormal brotherhood. But the solution to harnessing Akira may ultimately be more dangerous than Akira himself.","product_size":"unit:15","product_image":"\\/images\\/products\\/148028790239.png","product_price":"19.99"}', 0, 0, 3, 0),
(41, 5, '{"product_name":"Akira Manga Vol 5","product_desc":"Read the story that the movie came from. the akira manga. Translated into english and split into 6 volumes. The manga is as good as the dvd itself. ","product_size":"unit:21","product_image":"\\/images\\/products\\/148028796941.png","product_price":"19.99"}', 0, 0, 2, 0),
(42, 5, '{"product_name":"Akira Manga Vol 6","product_desc":"Read the story that the movie came from. the akira manga. Translated into english and split into 6 volumes. The manga is as good as the dvd itself. ","product_size":"unit:12","product_image":"\\/images\\/products\\/148028801841.png","product_price":"19.99"}', 0, 0, 2, 0),
(43, 2, '{"product_name":"Akira Movie Poster","product_desc":"The 1989 Original Movie Print, In Great quality and would look great in anyone&#39;s room.","product_size":"unit:19","product_image":"\\/images\\/products\\/148043806842.png","product_price":"12.99"}', 0, 0, 0, 0),
(44, 2, '{"product_name":"Akira Alternative Poster","product_desc":"A nice alternative to the normal posters. Designed in house, in a large print. Will only run for one print.","product_size":"unit:100","product_image":"\\/images\\/products\\/148043816243.png","product_price":"17.50"}', 0, 0, 0, 0.21),
(45, 2, '{"product_name":"Akira Explosion Poster","product_desc":"In canvas with a wooden frame, A amazing product. Well worth a place in anyones house.","product_size":"unit:21","product_image":"\\/images\\/products\\/148043825144.png","product_price":"24.99"}', 0, 0, 0, 0),
(46, 2, '{"product_name":"Akira Cel Shaded Poster","product_desc":"A nice mix of art styles, A amazing piece of work by a fan of the franchise. Now we are giving you a chance to own it.","product_size":"unit:23","product_image":"\\/images\\/products\\/148043833545.png","product_price":"12.99"}', 0, 0, 0, 0),
(47, 2, '{"product_name":"Pill Poster","product_desc":"A poster with a print of the pill from the back of kaneda&#39;s jacket. A nice poster that is fitting anywhere.","product_size":"unit:14","product_image":"\\/images\\/products\\/148043841546.png","product_price":"12.99"}', 0, 0, 0, 0),
(48, 2, '{"product_name":"Dvd Box Art Poster","product_desc":"Buy the original box art from the dvd in poster form, looks amazing and a great print. A must have for any akira fan.","product_size":"unit:13","product_image":"\\/images\\/products\\/148043849047.png","product_price":"16.99"}', 0, 0, 0, 0),
(49, 1, '{"product_name":"Soap Opera Poster","product_desc":"What if akira was a soap opera, well this poster makes it look ike one, a funny poster that is a must buy.","product_size":"unit:21","product_image":"\\/images\\/products\\/148043857448.png","product_price":"12.99"}', 0, 0, 0, 0),
(50, 2, '{"product_name":"Tetsuo Chalk Art Poster","product_desc":"A chalk art style poster that is amazing, a should buy for anyone. Not going to be around forever so buy one today.","product_size":"unit:12","product_image":"\\/images\\/products\\/148043864249.png","product_price":"12.99"}', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` text NOT NULL,
  `user_info` text NOT NULL,
  `join_date` date NOT NULL,
  `last_login` date NOT NULL,
  `style` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `user_email`, `user_password`, `user_info`, `join_date`, `last_login`, `style`) VALUES
(38, 'admin@akira.com', '$2y$10$T17E.JAP9CqCjtvyDu2B1OL89UvuRKc2lriNiMSH.CqUT4.IazsoS', '{"userName":"Admin","user_email":"admin@akira.com","user_phone":"8617007641","user_address":"baytown park,     dunboyne,     meath,     meath","user_image":"\\/images\\/users\\/148043891338.jpg","user_password":"$2y$10$QdEgxk7.Ed2kIhnXuX62VOhzxgNtbTBIaQ93NdvK8iR96jtq7zsUG","user_account":"admin","user_added":"Self"}', '2016-11-27', '2016-11-29', 1),
(42, 'paul@live.ie', '$2y$10$qbiuRlOK56ocFnGcs5gPeeqsiVZ//Rv35VNXzNNMPbqheheL3ZJ26', '{"userName":"Paul Newham","user_email":"paul@live.ie","user_phone":"0123456789","user_address":"21 upper Park Lane, Ratoath, Meath, Ireland","user_image":"\\/images\\/users\\/148043914338.jpg","user_password":"$2y$10$SbuKFH2JtkFHVh7e.Ppyee3YMg\\/Ai0UrGkz.x92IdMt7vsDePJkY2","user_account":"gold","user_added":"Self"}', '2016-11-29', '2016-11-29', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_db`
--
ALTER TABLE `cart_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_db`
--
ALTER TABLE `orders_db`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products_db`
--
ALTER TABLE `products_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_db`
--
ALTER TABLE `cart_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders_db`
--
ALTER TABLE `orders_db`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `products_db`
--
ALTER TABLE `products_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
