-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 01:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(8, '07/06/2020', 'Novi clanak', 'Long tekst', 'This is the long text for news heading 3. Woah!', 'image4.jpg', 'news', 0),
(13, '05/06/2020', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'image1.jpg', 'news', 0),
(14, '05/06/2020', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC.', 'image2.jpg', 'sport', 0),
(18, '06/06/2020', 'Lorem ipsum 2', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent aliquam urna lectus, vitae suscipit eros congue ut', 'Donec venenatis quam non lectus egestas fermentum. Maecenas venenatis tortor non nisi sollicitudin posuere. Morbi quis viverra lectus. Donec commodo arcu ex, eu congue neque viverra id. Aenean suscipit nisl nisi, quis pretium metus porttitor sit amet. Sed rhoncus eros in ex sollicitudin, vitae accumsan quam porttitor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi molestie dictum tellus gravida pellentesque. Cras maximus at ante nec auctor. Vivamus dui magna, pharetra ut suscipit sit amet, porttitor id purus. In fermentum iaculis est, eget vestibulum lorem fringilla nec. Pellentesque nulla tortor, euismod non porttitor vel, convallis a est. Donec tellus lacus, luctus porttitor neque nec, convallis aliquet dui. Duis ultrices diam ante, sed commodo leo pulvinar vitae.', 'image4.jpg', 'sport', 0),
(19, '08/06/2020', 'Lorem ipsum 3', 'Aenean et molestie magna, vitae iaculis lectus.', 'Curabitur imperdiet in nulla ut sodales. Morbi consectetur sed magna quis dignissim. Etiam feugiat libero quam, eget venenatis sapien suscipit eget. Praesent magna elit, tempus euismod aliquet non, commodo quis nisl. Phasellus facilisis lorem ac enim iaculis facilisis. Praesent maximus justo est, in auctor nisl lacinia vel. Phasellus suscipit purus ex. Mauris interdum arcu sed enim sollicitudin scelerisque. Suspendisse placerat fringilla nisl, vitae luctus nulla. Sed sollicitudin dictum lacus. Quisque mattis elit id quam porta facilisis non nec turpis.', 'image9.jpg', 'sport', 0),
(20, '06/06/2020', 'Lorem ipsum 4', 'Etiam ex eros, aliquam ut ornare at, dignissim quis leo.', 'Donec vitae tristique mi. In hac habitasse platea dictumst. Aliquam ac diam est. Morbi orci felis, consectetur sit amet dignissim nec, semper at elit. Maecenas mattis risus quis turpis commodo, ac iaculis ante porttitor. In eu finibus mi.', 'image7.jpg', 'news', 0),
(22, '06/06/2020', 'Lorem ipsum 6', 'Aliquam imperdiet ex eget sem condimentum posuere', 'Quisque dignissim mattis nunc, in cursus lacus tempus nec. Duis sem enim, congue ac ligula eu, aliquam finibus dolor. Nullam dignissim neque nunc, aliquet pharetra eros pretium vel. Nam a sapien sit amet neque mattis ornare non in risus. Donec ex magna, rhoncus a scelerisque sed, laoreet vel odio. Nulla mollis lacus nec eros consequat varius. Proin vel nisl posuere, tristique nunc at, feugiat ex. Aliquam erat volutpat.', 'image12.jpg', 'sport', 0),
(23, '06/06/2020', 'Lorem ipsum 7', 'Mauris in enim convallis, pellentesque diam at, hendrerit nisl. Donec lobortis venenatis eros at pellentesque', ' Integer in orci felis. Nulla sed bibendum turpis. Duis mi odio, eleifend id dignissim sit amet, blandit semper nunc. Ut consectetur justo in neque malesuada, in commodo sem scelerisque. Vestibulum mattis magna et arcu tempor, in mattis arcu fermentum. Etiam in enim in purus fringilla volutpat id ac libero. Phasellus nec erat elit. Nulla luctus dui vel maximus commodo. Fusce ligula erat, aliquam ac sapien dapibus, posuere varius sapien. Sed ultricies rutrum elit, sit amet pretium massa pellentesque eu. Mauris interdum faucibus arcu, a finibus nunc vulputate quis. In non erat sit amet neque imperdiet ullamcorper. Interdum et malesuada fames ac ante ipsum primis in faucibus', 'image9.jpg', 'sport', 0),
(24, '06/06/2020', 'Lorem ipsum 7', 'Mauris nisi lectus, tempus quis viverra ultricies, pulvinar vitae purus.', 'Etiam pulvinar odio a consectetur luctus. Aenean eu ligula sit amet purus dictum elementum sit amet id dolor. Curabitur velit ex, pharetra sed dictum quis, faucibus vitae eros. Duis lectus orci, pellentesque vel lectus placerat, dignissim sollicitudin nibh. Etiam venenatis congue justo, id viverra risus pulvinar id.', 'image10.jpg', 'news', 0),
(25, '06/06/2020', 'Posebna vijest koja se ne prikazuje!', 'Ova vijest je arhivirana te se zbog toga nece prikazati! Watch carefully.', 'ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA', 'image6.jpg', 'news', 1),
(26, '06/06/2020', 'Sportsa vijest koja se neÄ‡e prikazati!', 'Ova vijest se neÄ‡e prikazati jer je arhivirana! ', 'ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA ARHIVA', 'image11.jpg', 'sport', 1),
(33, '09/06/2020', 'Newest article about sport', 'This is currently the newest article in the section of sport.', 'SPORT SPORT SPORT SPORT SPORT SPORT SPORT SPORT ', 'image2.jpg', 'sport', 1),
(35, '10/06/2020', 'NEWEST HEADING WOOO', 'This will be amazing!!', 'First this will be archived and then RELEASED.', 'image1.jpg', 'news', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
