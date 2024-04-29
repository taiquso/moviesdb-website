-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 06:06 PM
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
-- Database: `imdb_movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_table`
--

CREATE TABLE `movie_table` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` year(4) DEFAULT NULL,
  `plot` text DEFAULT NULL,
  `note` decimal(3,1) DEFAULT NULL,
  `actors` text DEFAULT NULL,
  `poster_url` varchar(255) DEFAULT NULL,
  `my_note` float DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_table`
--

INSERT INTO `movie_table` (`id`, `title`, `release_date`, `plot`, `note`, `actors`, `poster_url`, `my_note`, `comment`) VALUES
(42, 'Invincible', '2021', 'An adult animated series based on the Skybound/Image comic about a teenager whose father is the most powerful superhero on the planet.', 8.7, 'Steven Yeun, J.K. Simmons, Sandra Oh, Grey Griffin, Zazie Beetz, Walton Goggins, Gillian Jacobs, Jason Mantzoukas, Andrew Rannells, Chris Diamantopoulos, Kevin Michael Richardson, Khary Payton, Zachary Quinto, Melise, Ross Marquand, Fred Tatasciore, Nyima Funk, Bobby Kesselman', 'https://m.media-amazon.com/images/M/MV5BZGY2ZTQxZGUtZDY2ZC00Mjc5LTlkZWQtNTA5YjUwOTIxYjEzXkEyXkFqcGdeQXVyMTY3MDE5MDY1._V1_QL75_UY281_CR18,0,190,281_.jpg', 10, 'I love it best show !'),
(44, 'Invincible', '2006', 'Based on the story of Vince Papale, a 30-year-old bartender from South Philadelphia who overcame long odds to play for the NFL\'s Philadelphia Eagles in 1976.', 7.0, 'Mark Wahlberg, Greg Kinnear, Elizabeth Banks, Kevin Conway, Michael Rispoli, Kirk Acevedo, Dov Davidoff, Michael Kelly, Sal Darigo, Nicoye Banks, Turron Kofi Alleyne, Cosmo DeMatteo, Stink Fisher, Michael Mulheren, Michael Nouri, Jack Kehler, Lola Glaudini, Paige Turco', 'https://m.media-amazon.com/images/M/MV5BMjA1NjI2ODA5MF5BMl5BanBnXkFtZTcwNjMyMTMzMQ@@._V1_QL75_UY281_CR0,0,190,281_.jpg', 4, 'Didn\'t watch that movie'),
(46, 'Dune: Part Two', '2024', 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.', 8.7, 'Timothée Chalamet, Zendaya, Rebecca Ferguson, Javier Bardem, Josh Brolin, Austin Butler, Florence Pugh, Dave Bautista, Christopher Walken, Léa Seydoux, Stellan Skarsgård, Charlotte Rampling, Souheila Yacoub, Roger Yuan, Babs Olusanmokun, Alison Halstead, Giusi Merli, Kait Tenison', 'https://m.media-amazon.com/images/M/MV5BN2QyZGU4ZDctOWMzMy00NTc5LThlOGQtODhmNDI1NmY5YzAwXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_QL75_UX190_CR0,0,190,281_.jpg', 9.5, 'Very good movie, I loved the edits on Tik tok'),
(47, 'Poketto monsutâ', '1997', 'Covering the continuing adventures of series protagonist Ash Ketchum and Pikachu, and his best friend Brock, the two meet a new coordinator named Dawn, who travels with them through Sinnoh a...<!-- --> <a class=\"ipc-link ipc-link--baseAlt\" role=\"button\" tabindex=\"0\" aria-disabled=\"false\" data-testid=\"plot-read-all-link\" href=\"plotsummary?ref_=tt_ov_pl\">Read all</a>', 7.5, 'Veronica Taylor, Rachael Lillis, Eric Stuart, Ikue Ôtani, Rica Matsumoto, Rodger Parsons, Shin\'ichirô Miki, Megumi Hayashibara, Inuko Inuyama, Sarah Natochenny, Kayzie Rogers, Unshô Ishizuka, James Carter Cathcart, Yûji Ueda, Michele Knotz, Christopher Collet, Bill Rogers, Erica Schroeder', 'https://m.media-amazon.com/images/M/MV5BY2EzZjE4YjgtZDlmZS00MDUxLWJhNTItODhkZTNmNGY1MzlmXkEyXkFqcGdeQXVyNjg0NDgwMjk@._V1_QL75_UY281_CR10,0,190,281_.jpg', 8, 'I love pokémon !'),
(48, 'Iron Man', '2008', 'After being held captive in an Afghan cave, billionaire engineer Tony Stark creates a unique weaponized suit of armor to fight evil.', 7.9, 'Robert Downey Jr., Gwyneth Paltrow, Terrence Howard, Jeff Bridges, Leslie Bibb, Shaun Toub, Faran Tahir, Clark Gregg, Bill Smitrovich, Sayed Badreya, Paul Bettany, Jon Favreau, Peter Billingsley, Tim Guinee, Will Lyman, Tom Morello, Marco Khan, Dastan Khalili', 'https://m.media-amazon.com/images/M/MV5BMTczNTI2ODUwOF5BMl5BanBnXkFtZTcwMTU0NTIzMw@@._V1_QL75_UX190_CR0,0,190,281_.jpg', 10, 'Childhood movie'),
(49, 'Spider-Man: Across the Spider-Verse', '2023', 'Miles Morales catapults across the multiverse, where he encounters a team of Spider-People charged with protecting its very existence. When the heroes clash on how to handle a new threat, Mi...<!-- --> <a class=\"ipc-link ipc-link--baseAlt\" role=\"button\" tabindex=\"0\" aria-disabled=\"false\" data-testid=\"plot-read-all-link\" href=\"plotsummary?ref_=tt_ov_pl\">Read all</a>', 8.6, 'Shameik Moore, Hailee Steinfeld, Brian Tyree Henry, Luna Lauren Velez, Jake Johnson, Oscar Isaac, Jason Schwartzman, Issa Rae, Daniel Kaluuya, Karan Soni, Shea Whigham, Greta Lee, Mahershala Ali, Amandla Stenberg, Jharrel Jerome, Andy Samberg, Jack Quaid, Rachel Dratch', 'https://m.media-amazon.com/images/M/MV5BMzI0NmVkMjEtYmY4MS00ZDMxLTlkZmEtMzU4MDQxYTMzMjU2XkEyXkFqcGdeQXVyMzQ0MzA0NTM@._V1_QL75_UX190_CR0,0,190,281_.jpg', 9.5, 'Masterclass'),
(50, 'Naruto', '2002', 'Naruto Uzumaki, a mischievous adolescent ninja, struggles as he searches for recognition and dreams of becoming the Hokage, the village\'s leader and strongest ninja.', 8.4, 'Junko Takeuchi, Maile Flanagan, Kate Higgins, Chie Nakamura, Noriaki Sugiyama, Yuri Lowenthal, Dave Wittenberg, Tony Beck, Laurent Vernin, Colleen O\'Shaughnessey, Steve Staley, Kôichi Tôchika, Kazuhiko Inoue, Shôtarô Morikubo, Tom Gibis, Kyle Hebert, Brian Donovan, Yôichi Masukawa', 'https://m.media-amazon.com/images/M/MV5BZmQ5NGFiNWEtMmMyMC00MDdiLTg4YjktOGY5Yzc2MDUxMTE1XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_QL75_UY281_CR1,0,190,281_.jpg', 10, 'Nostlagia ;)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_table`
--
ALTER TABLE `movie_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie_table`
--
ALTER TABLE `movie_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
