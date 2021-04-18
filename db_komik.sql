-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 03:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_komik`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_manga` int(11) DEFAULT NULL,
  `comment` text,
  `date_submitted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_user`, `id_manga`, `comment`, `date_submitted`) VALUES
(2, 3, 1, 'Da best. Manga. Ever.', '2019-04-30'),
(3, 3, 6, 'Relatable. Dank.', '2019-04-30'),
(4, 3, 3, 'Much mystery. Detective much. Dank.', '2019-04-30'),
(5, 3, 5, 'Much death. Absurd notebook. Wkwkwkw', '2019-04-30'),
(6, 3, 13, 'Dank hunter. Da best animu.', '2019-04-30'),
(7, 4, 3, 'Harold is a curious person. This is my first time reading a manga. I like detectives.', '2019-04-30'),
(8, 4, 1, 'Manga updates are slow. I gib 4/5 ty.', '2019-04-30'),
(9, 4, 6, 'Protagonist die, I no like boo.', '2019-04-30'),
(10, 4, 13, 'I like old anime, dis is gud.', '2019-04-30'),
(11, 4, 5, 'I like deaths, but not out of revenge. so 3/5 ehe', '2019-04-30'),
(12, 5, 2, 'ehe. only 5 chapters.', '2019-04-30'),
(13, 5, 3, 'EEEEEEEHHeeeee. Susiripris, ceritanya bagus.', '2019-04-30'),
(14, 5, 4, 'Dank romance. So sad, much cry.', '2019-04-30'),
(15, 5, 7, 'ehe. Ketipu judul.', '2019-04-30'),
(16, 5, 1, 'Keren. Naise plot.', '2019-04-30'),
(17, 5, 5, 'Sisiripris, gak suka yg mati-mati ah', '2019-04-30'),
(18, 5, 6, 'I like romance and sci-fi.', '2019-04-30'),
(19, 5, 9, 'ngakaks.', '2019-04-30'),
(20, 6, 8, 'Dank comedy. 360.', '2019-04-30'),
(21, 6, 6, '360\'d this anime.', '2019-04-30'),
(22, 6, 3, '420 blazing detectives.', '2019-04-30'),
(23, 7, 1, 'Great but not so great', '2019-04-30'),
(24, 7, 5, 'Good story', '2019-04-30'),
(25, 8, 14, 'Great car racing', '2019-04-30'),
(26, 8, 18, 'I LOVE IT!', '2019-04-30'),
(27, 8, 12, 'Great manga but still need some work', '2019-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `ID` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `text_profile` varchar(255) NOT NULL,
  `tag_preference` varchar(255) NOT NULL,
  `tipe` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`ID`, `username`, `password`, `nickname`, `tanggal_lahir`, `profile_pic`, `text_profile`, `tag_preference`, `tipe`) VALUES
(3, 'kevin1868', '%ÕZÒƒª@\nôdÇmq<­', 'kevinz_69', '2000-06-02', '../img/default_user_img.png', '../db_komik/userprofile/kevin186830-04-19-05-17profil.txt', '01|02|04|14', 'Member'),
(4, 'harold_99', '>v‚Î>Gz¸%™ÜÜæ', 'cringe_99', '2001-07-07', '../img/default_user_img.png', '../db_komik/userprofile/harold_9930-04-19-05-33profil.txt', '02|03|07', 'Member'),
(5, 'anak-bangsat', 'jß.ŽwM½œLª¾â\ZM', 'anak_soleh', '1999-08-01', '../img/default_user_img.png', '../db_komik/userprofile/kevinbangsat30-04-19-05-57profil.txt', '06|14', 'Member'),
(6, 'steven', '[ÔI9NßùsahÞXkÚ|', 'Xx_st3v3n_pro_banget', '2000-04-19', '../img/default_user_img.png', '../db_komik/userprofile/steven30-04-19-06-15profil.txt', '09|10|11|13', 'Member'),
(7, 'alextri12', 'ˆïI‰ˆhÂ™J•;Ž‘.', 'alextri12', '2000-12-07', '../db_komik/userprofilepic/Capture.PNG', '../db_komik/userprofile/alextri1230-04-19-07-07profil.txt', '01|02|03|07|17', 'Member'),
(8, 'christ', 'èñüø-/›°Êg8¡Ÿ', 'ChrisT', '1999-10-11', '../db_komik/userprofilepic/the_alchemist.jpg', '../db_komik/userprofile/christ30-04-19-09-53profil.txt', '01|02|04|05|07|08|13|14', 'Member'),
(9, 'admin', '!#/)zW¥§C‰JJ€Ã', 'AdminNo.1', '1990-10-05', '../db_komik/userprofilepic/someone.jpg', '../db_komik/userprofile/admin30-04-19-10-16profil.txt', '08|13|14|17|18|20', 'Admin'),
(10, 'helloworld', 'LWrÏá>äV!%´­îg(', 'Hello Everyone', '1901-01-01', '../db_komik/userprofilepic/great_me.png', '../db_komik/userprofile/helloworld30-04-19-10-19profil.txt', '01|02|03|04|05|06|11|15', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `komik`
--

CREATE TABLE `komik` (
  `id` int(11) NOT NULL,
  `title` char(50) DEFAULT NULL,
  `author` char(50) DEFAULT NULL,
  `tags` char(30) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `banyakRating` int(11) DEFAULT NULL,
  `synopsis` text,
  `thumbnail` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komik`
--

INSERT INTO `komik` (`id`, `title`, `author`, `tags`, `rating`, `banyakRating`, `synopsis`, `thumbnail`, `date`) VALUES
(1, 'Fullmetal Alchemist', 'Hiromu Arakawa', '01, 02, 04, 14, 19', 4.5, 4, '../db_komik/synopsis/Fullmetal Alchemist.txt', '../db_komik/cover/fullmetal-alchemist.jpg', '2001-07-12'),
(2, 'Abigaile no Kemono-tachi', 'Naki, Ringo', '10, 13', 3, 1, '../db_komik/synopsis/Abigaile no Kemono-tachi.txt', '../db_komik/cover/Abigaile-no-Kemono-tachi.jpg', '2015-07-05'),
(3, 'Bungou Stray Dogs', 'Asagiri Kafuka', '01, 13, 17', 4.4, 5, '../db_komik/synopsis/Bungou Stray Dogs.txt', '../db_komik/cover/bungou-stray-dogs.jpg', '2012-12-04'),
(4, 'Clannad', 'KEY', '10, 11', 4, 1, '../db_komik/synopsis/Clannad.txt', '../db_komik/cover/clannad.jpg', '2005-05-07'),
(5, 'Death Note', 'Ohba Tsugumi', '06, 07, 14, 17', 4, 4, '../db_komik/synopsis/Death Note.txt', '../db_komik/cover/death-note.jpg', '2003-12-01'),
(6, 'Eureka Seven', 'Tomonori Sugihara', '02, 10, 14', 3.5, 4, '../db_komik/synopsis/Eureka Seven.txt', '../db_komik/cover/eureka-seven.jpg', '2005-08-29'),
(7, 'Eromanga Sensei', 'Tsukasa Fushimi', '04, 10, 18', 3, 1, '../db_komik/synopsis/Eromanga Sensei.txt', '../db_komik/cover/eromanga-sensei.jpg', '2013-12-10'),
(8, 'Grand Blue', 'Kenji Inoue', '04, 18', 4, 1, '../db_komik/synopsis/Grand Blue.txt', '../db_komik/cover/grandblue.jpg', '2014-04-07'),
(9, 'Gintama', 'Hideaki Sorachi', '01, 04, 14, 15', 5, 1, '../db_komik/synopsis/Gintama.txt', '../db_komik/cover/gintama.jpg', '2003-12-08'),
(10, 'Gakuen Babysitters', 'Hari Tokeino', '04, 11, 13, 18', 0, 0, '../db_komik/synopsis/Gakuen Babysitters.txt', '../db_komik/cover/gakuen-babysitters.jpg', '2009-07-24'),
(12, 'Haikyuu', 'Haruichi Furudate', '04, 11, 14, 16', 4, 1, '../db_komik/synopsis/Haikyuu.txt', '../db_komik/cover/haikyuu.jpg', '2012-02-20'),
(13, 'Hunter x Hunter', 'Yoshihiro Togashi', '01, 02, 07, 14, 17', 3.5, 2, '../db_komik/synopsis/Hunter x Hunter.txt', '../db_komik/cover/hunterxhunter.jpg', '1998-03-03'),
(14, 'Initial D', 'Shuuici Shigeno', '01, 16', 5, 1, '../db_komik/synopsis/Initial D.txt', '../db_komik/cover/inditial-d.jpg', '1995-06-26'),
(15, 'InuYasha', 'Tomoko Konparu', '02, 04, 05, 07, 08, 14', 0, 0, '../db_komik/synopsis/InuYasha.txt', '../db_komik/cover/inuyasha.jpg', '1996-11-13'),
(16, 'JoJo no Kimyou na Bouken Part 1 Phantom Blood', 'Hirohiko Araki', '01, 02, 08, 09, 14', 0, 0, '../db_komik/synopsis/JoJo no Kimyou na Bouken Part 1 Phantom Blood.txt', '../db_komik/cover/JoJo.jpg', '1986-12-02'),
(17, 'Love is War', 'Aka Akasaka', '04, 10, 11', 0, 0, '../db_komik/synopsis/Love is War.txt', '../db_komik/cover/loveiswar.jpg', '2015-05-19'),
(18, 'Kimi No Nawa', 'Makoto Shinkai', '10, 11, 17', 5, 1, '../db_komik/synopsis/Kimi No Nawa.txt', '../db_komik/cover/kimi-no-nawa.jpg', '2016-05-27'),
(19, 'Made In Abyss', 'Akihito Tsukushi', '02, 07', 0, 0, '../db_komik/synopsis/Made In Abyss.txt', '../db_komik/cover/made-in-abyss.jpg', '2012-08-20'),
(20, 'Monogatari Series', 'Isin Nisio', '01, 04, 06, 10, 17', 0, 0, '../db_komik/synopsis/Monogatari Series.txt', '../db_komik/cover/monogatari.jpg', '2006-11-01'),
(21, 'Natsume Yuujinchou', 'Yuki Midorikawa', '13, 17', 0, 0, '../db_komik/synopsis/Natsume Yuujinchou.txt', '../db_komik/cover/natsume.jpg', '2003-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `genre` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Game'),
(4, 'Comedy'),
(5, 'Demons'),
(6, 'Mystery'),
(7, 'Fantasy'),
(8, 'Historical'),
(9, 'Horror'),
(10, 'Romance'),
(11, 'School'),
(12, 'Martial Arts'),
(13, 'Shoujo'),
(14, 'Shounen'),
(15, 'Space'),
(16, 'Sports'),
(17, 'Super Power'),
(18, 'Slice of Life'),
(19, 'Military'),
(20, 'Thriller'),
(21, 'Ecchi');

-- --------------------------------------------------------

--
-- Table structure for table `update_chapter`
--

CREATE TABLE `update_chapter` (
  `id` int(11) NOT NULL,
  `nomor_chp` varchar(50) DEFAULT NULL,
  `judul_chp` char(50) DEFAULT NULL,
  `link` text,
  `uploaded_time` date DEFAULT NULL,
  `manga_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_chapter`
--

INSERT INTO `update_chapter` (`id`, `nomor_chp`, `judul_chp`, `link`, `uploaded_time`, `manga_id`) VALUES
(1, 'Vol.1 Chapter 1', 'The Two Alchemists', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_1', '2019-04-29', 1),
(2, 'Vol.1 Chapter 2', 'The Price of a Life', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_2', '2019-04-29', 1),
(3, 'Vol.1 Chapter 3', 'The Coal Mine Town', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_3', '2019-04-29', 1),
(4, 'Vol.1 Chapter 4', 'Battle On The Train', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_4', '2019-04-29', 1),
(5, 'Vol.2 Chapter 5', 'An Alchemist\'s Anguish', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_5', '2019-04-29', 1),
(6, 'Vol.2 Chapter 6', 'The Right Hand of Destruction', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_6', '2019-04-29', 1),
(7, 'Vol.2 Chapter 7', 'After The Rain', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_7', '2019-04-29', 1),
(8, 'Vol.2 Chapter 8', 'A Hopeful Road', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_8', '2019-04-29', 1),
(9, 'Vol.3 Chapter 9', 'The House Where Their Family is Waiting', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_9', '2019-04-29', 1),
(10, 'Vol.3 Chapter 10', 'The Philosopher\'s Stone', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_10', '2019-04-29', 1),
(11, 'Vol.3 Chapter 11', 'The Two Guardians', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_11', '2019-04-29', 1),
(12, 'Vol.3 Chapter 12', 'The Definition of a Human Being', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_12', '2019-04-29', 1),
(13, 'Vol.4 Chapter 13', 'Steel Body', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_13', '2019-04-29', 1),
(14, 'Vol.4 Chapter 14', 'The Feelings of an Only Child', 'https://manganelo.com/chapter/read_fullmetal_alchemist_manga/chapter_14', '2019-04-29', 1),
(15, 'Vol.1 Chapter 1', '1st Break', 'https://mangabat.com/chapter-serie/1088907969/chap_1.2', '2019-04-29', 2),
(19, 'Vol.1 Chapter 2', '2nd Break', 'https://mangabat.com/chapter-serie/1088907969/chap_2', '2019-04-29', 2),
(20, 'Vol.1 Chapter 3', '3rd Break', 'https://mangabat.com/chapter-serie/1088907969/chap_3', '2019-04-29', 2),
(21, 'Vol.1 Chapter 4', '4th Break', 'https://mangabat.com/chapter-serie/1088907969/chap_4', '2019-04-29', 2),
(22, 'Vol.1 Chapter 5', '5th Break', 'https://mangabat.com/chapter-serie/1088907969/chap_5', '2019-04-29', 2),
(23, 'Vol.1 Chapter 1', 'Losing a Tiger may be a Blessing in Disguise', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_1', '2019-04-29', 3),
(24, 'Vol.1 Chapter 2', 'A Certain Bomb', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_2.2', '2019-04-29', 3),
(26, 'Vol.1 Chapter 3', 'Yokohama Gangsta, Paradise Part 1', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_3.2', '2019-04-29', 3),
(27, 'Vol.1 Chapter 4', 'Yokohama Gangsta, Paradise Part 2', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_4.2', '2019-04-29', 3),
(28, 'Vol.2 Chapter 5', 'Sorrow of the Fatalist', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_5.2', '2019-04-29', 3),
(29, 'Vol.2 Chapter 6', 'Murder on D Street', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_6.2', '2019-04-29', 3),
(30, 'Vol.2 Chapter 7', 'To Kill and then to Die Part 1', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_7.2', '2019-04-29', 3),
(31, 'Vol.2 Chapter 8', 'To Kill and then to Die Part 2', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_8.2', '2019-04-29', 3),
(32, 'Vol.3 Chapter 9', 'Beautiful People are like Silent Statues', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_9.2', '2019-04-29', 3),
(33, 'Vol.3 Chapter 10', 'Detective Boys', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_10.2', '2019-04-29', 3),
(34, 'Vol.3 Chapter 11', '... Of Days Gone by', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_11.2', '2019-04-29', 3),
(35, 'Vol.3 Chapter 12', 'Rashomon and Tiger', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_12.2', '2019-04-29', 3),
(36, 'Vol.4 Chapter 13', 'Ecstatic Detective Agency', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_13.2', '2019-04-29', 3),
(37, 'Vol.4 Chapter 14', 'An Occupation That Does Not Suit Her', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_14.2', '2019-04-29', 3),
(38, 'Vol.4 Chapter 15', 'Born Back Ceaselessly into the Past Part 1', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_15.2', '2019-04-29', 3),
(39, 'Vol.4 Chapter 16', 'Born Back Ceaselessly into the Past Part 2', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_16', '2019-04-29', 3),
(41, 'Vol.5 Chapter 17', 'The First Mission', 'https://manganelo.com/chapter/bungou_stray_dogs/chapter_17', '2019-04-29', 3),
(42, 'Vol.1 Chapter 1', 'The Beginning At The Bottom Of The Hill', 'https://mangabat.com/chapter-serie/1088894109/chap_1', '2019-04-29', 4),
(43, 'Vol.1 Chapter 2', 'For That Smile', 'https://mangabat.com/chapter-serie/1088894109/chap_2', '2019-04-29', 4),
(44, 'Vol.1 Chapter 3', 'The Rain Falls', 'https://mangabat.com/chapter-serie/1088894109/chap_3', '2019-04-29', 4),
(45, 'Vol.1 Chapter 4', 'The Wish To Sora', 'https://mangabat.com/chapter-serie/1088894109/chap_4', '2019-04-29', 4),
(46, 'Vol.1 Chapter 5', '\"Change\"', 'https://mangabat.com/chapter-serie/1088894109/chap_5', '2019-04-29', 4),
(47, 'Vol.1 Chapter 6', 'One And Only', 'https://mangabat.com/chapter-serie/1088894109/chap_6', '2019-04-29', 4),
(48, 'Vol.2 Chapter 7', 'Dreams', 'https://mangabat.com/chapter-serie/1088894109/chap_7', '2019-04-29', 4),
(49, 'Vol.2 Chapter 8', 'And Then Finally, The Place They Will Reach', 'https://mangabat.com/chapter-serie/1088894109/chap_8', '2019-04-29', 4),
(50, 'Vol.2 Chapter 9', 'You Are Not Alone', 'https://mangabat.com/chapter-serie/1088894109/chap_9', '2019-04-29', 4),
(51, 'Vol.2 Chapter 10', 'Count Down', 'https://mangabat.com/chapter-serie/1088894109/chap_10', '2019-04-29', 4),
(52, 'Vol.2 Chapter 11', 'Founder\'s Festival', 'https://mangabat.com/chapter-serie/1088894109/chap_11', '2019-04-29', 4),
(53, 'Vol.2 Chapter 12', 'Two People', 'https://mangabat.com/chapter-serie/1088894109/chap_12', '2019-04-29', 4),
(54, 'Vol.3 Chapter 13', 'Interlude', 'https://mangabat.com/chapter-serie/1088894109/chap_13', '2019-04-29', 4),
(55, 'Vol.3 Chapter 14', 'The Desire To Fulfill The Past', 'https://mangabat.com/chapter-serie/1088894109/chap_14', '2019-04-29', 4),
(56, 'Vol.0 Chapter 0', 'Pilot', 'https://manganelo.com/chapter/read_death_note_manga_online/chapter_0', '2019-04-29', 5),
(57, 'Vol.1 Chapter 1', 'Bordem', 'https://manganelo.com/chapter/read_death_note_manga_online/chapter_1', '2019-04-29', 5),
(58, 'Vol.1 Chapter 2', 'L', 'https://manganelo.com/chapter/read_death_note_manga_online/chapter_2', '2019-04-29', 5),
(59, 'Vol.1 Chapter 3', 'Family', 'https://manganelo.com/chapter/read_death_note_manga_online/chapter_3', '2019-04-29', 5),
(60, 'Vol.1 Chapter 1', 'Chapter 1', 'https://manganelo.com/chapter/ero_manga_sensei/chapter_1', '2019-04-29', 7),
(61, 'Vol.1 Chapter 2', 'Chapter 2', 'https://manganelo.com/chapter/ero_manga_sensei/chapter_2', '2019-04-29', 7),
(62, 'Vol.1 Chapter 3', 'Chapter 3', 'https://manganelo.com/chapter/ero_manga_sensei/chapter_3', '2019-04-29', 7),
(63, 'Vol.1 Chapter 4', 'Chapter 4', 'https://manganelo.com/chapter/ero_manga_sensei/chapter_4', '2019-04-29', 7),
(64, 'Vol.1 Chapter 5', 'Chapter 5', 'https://manganelo.com/chapter/ero_manga_sensei/chapter_5', '2019-04-29', 7),
(65, 'Vol.2 Chapter 6', 'Chapter 6', 'https://manganelo.com/chapter/ero_manga_sensei/chapter_6', '2019-04-29', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_chapter`
--
ALTER TABLE `update_chapter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komik`
--
ALTER TABLE `komik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `update_chapter`
--
ALTER TABLE `update_chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
