-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 10:45 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtspirala4`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `Tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `Novost` int(11) NOT NULL,
  `Korisnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `Tekst`, `Novost`, `Korisnik`) VALUES
(2, 'meni je ovo super', 3, 2),
(3, 'Vrh je ovo meni', 9, 2),
(4, 'Jako lijepo', 11, 4),
(6, 'poucno', 6, 4),
(7, 'prejakooooooooooo', 6, 4),
(8, 'lijepa slika', 5, 4),
(9, 'jako lijepa slika', 3, 4),
(10, 'komentar', 3, 4),
(12, 'lalalallalallallal', 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `Ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `Prezime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_slovenian_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `Password` varchar(150) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `Ime`, `Prezime`, `Email`, `Username`, `Password`) VALUES
(1, 'Admin', 'Adminic', 'admin@nesto.com', 'admin', '3b82839d6b97ec197ab621b59edeb114'),
(2, 'Neko', 'Nekic', 'mail@gmail.com', 'user1', '7d1b5a4329b6478e976508ab9a49ee3d'),
(3, 'Selma', 'Mujanovic', 'mail1@gmail.com', 'user2', '72881e285cdb0f9370dcdf1db0d9a869'),
(4, 'Mujo', 'Dedic', 'mail2@gmail.com', 'user3', '16bd93afc66e593f3aeedecdf1201ee6'),
(5, 'Alma', 'Dedovic', 'mail3@gmail.com', 'user4', '47e1c205dd73d4c06405bd08d255e320'),
(6, 'Almedina', 'Nekovic', 'mail4@gmail.com', 'user5', '1dc34834df4da4804236eb250118fb41'),
(7, 'Selma', 'Hamidovic', 'mail5@gmail.com', 'user6', 'bdf2912fce3ee3f6657bacc65527c7bd'),
(8, 'Dino', 'Selmanovic', 'mail6@gmail.com', 'user7', 'c5068c076d70d192c7f205a9bba4c469');

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE `novost` (
  `id` int(11) NOT NULL,
  `Naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `Sadrzaj` text COLLATE utf8_slovenian_ci NOT NULL,
  `Slika` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `Kategorija` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `novost`
--

INSERT INTO `novost` (`id`, `Naslov`, `Sadrzaj`, `Slika`, `Kategorija`) VALUES
(1, 'Lorem Ipsum 13', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/fw3.jpg', 'Home'),
(3, 'Lorem Ipsum 3', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/4.jpg', 'Home'),
(4, 'Lorem Ipsum 4', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/gljiva.jpg', 'Zdravlje'),
(5, 'Lorem Ipsum 5', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/ivy2.jpg', 'Zdravlje'),
(6, 'Lorem Ipsum 6', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/jezero.jpg', 'Zdravlje'),
(7, 'Lorem Ipsum 7', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/images.jpg', 'Ljepota'),
(8, 'Lorem Ipsum 8', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/ivy2.jpg', 'Ljepota'),
(9, 'Lorem Ipsum 9', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/fw2.jpg', 'Ljepota'),
(10, 'Lorem Ipsum 10', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/images.jpg', 'Lifestyle'),
(11, 'Lorem Ipsum 11', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/gljiva.jpg', 'Lifestyle'),
(12, 'Lorem Ipsum 12', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut odio at purus malesuada tristique. Nam suscipit nisl libero, ac porttitor tellus fermentum sollicitudin. Aliquam erat volutpat. Suspendisse sagittis sollicitudin mauris, quis consequat nibh hendrerit ac. Phasellus ac ullamcorper purus. Nam ut mattis arcu. Nam justo mauris, blandit a turpis a, pretium volutpat est. Sed iaculis, justo id volutpat rutrum, lorem dui pharetra dolor, ac vulputate nulla sapien vitae purus. Suspendisse rhoncus lectus sollicitudin pellentesque varius.\r\n\r\nDuis blandit, diam eu elementum blandit, arcu lectus placerat lectus, nec rutrum purus augue vitae nibh. Integer at urna at lorem gravida pellentesque. Ut egestas scelerisque magna ac tempus. Phasellus a ultrices mi. Morbi consectetur eros sit amet leo bibendum semper. Aliquam commodo diam elit, non maximus elit fermentum id. Sed commodo finibus leo, finibus malesuada tortor iaculis sit amet. Nam eu ex turpis.\r\n\r\nDonec vel venenatis eros, ac iaculis lectus. Cras posuere ornare urna interdum rhoncus. Fusce vehicula dolor nec urna pharetra, sit amet euismod sem venenatis. Nunc ornare turpis ipsum, id ultrices dolor feugiat a. Maecenas quis lectus a odio sagittis imperdiet non in urna. Etiam eget nisl ultricies, mollis nisi quis, porta libero. Pellentesque auctor eu diam et dignissim. Pellentesque eget elit turpis. Cras interdum egestas diam, tristique luctus lectus gravida id. Curabitur posuere volutpat lacus, ac luctus turpis. Maecenas dapibus, est nec ullamcorper efficitur, est velit faucibus sem, non rutrum enim ex non nisi. Duis faucibus, risus non feugiat lobortis, libero enim accumsan turpis, ut dignissim est nisi nec risus. ', 'slike/fw4.jpg', 'Lifestyle'),
(13, '0', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas iaculis metus non pellentesque facilisis. Donec pharetra rutrum libero quis consequat. Fusce tempus et tortor id faucibus. Duis scelerisque ligula eu massa condimentum aliquet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam quis aliquet ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\nNulla quam odio, feugiat vitae sapien luctus, viverra scelerisque ligula. Nulla vestibulum est id rhoncus tempor. Praesent a eleifend nunc, non convallis arcu. Cras pellentesque, urna et maximus condimentum, nisi magna dignissim magna, vitae semper ipsum dolor vitae risus. Nullam vitae tincidunt lacus. Maecenas blandit gravida mi in lacinia. In hac habitasse platea dictumst. Proin ipsum est, vulputate id quam in, congue vestibulum velit. Aenean ultricies consectetur mollis. Quisque fermentum lacinia massa, sit amet gravida magna facilisis ac. Phasellus euismod ligula odio. Quisque posuere luctus velit, eu dictum orci. Phasellus laoreet venenatis fermentum. Proin faucibus rhoncus fringilla. Morbi eget est metus. Sed nec orci vel erat venenatis finibus at id est.', 'slike/fw3.jpg', 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"wtspirala4","table":"komentar"}]'),
('wtberina', '[{"db":"wtspirala4","table":"korisnik"},{"db":"wtspirala4","table":"novost"},{"db":"wtspirala4","table":"komentar"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Korisnik` (`Korisnik`),
  ADD KEY `Novost` (`Novost`) USING BTREE;

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novost`
--
ALTER TABLE `novost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `novost`
--
ALTER TABLE `novost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `FK_korisnik` FOREIGN KEY (`Korisnik`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `FK_novost` FOREIGN KEY (`Novost`) REFERENCES `novost` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
