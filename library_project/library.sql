-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 25 ное 2022 в 22:53
-- Версия на сървъра: 10.4.22-MariaDB
-- Версия на PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `library`
--

-- --------------------------------------------------------

--
-- Структура на таблица `audiobooks`
--

CREATE TABLE `audiobooks` (
  `audiobook_id` int(11) NOT NULL,
  `audiobook_file` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `audiobooks`
--

INSERT INTO `audiobooks` (`audiobook_id`, `audiobook_file`, `book_id`) VALUES
(1, 'audiobooks/harrypotteraudio1mp3.mp3', 13);

-- --------------------------------------------------------

--
-- Структура на таблица `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_genre` varchar(255) NOT NULL,
  `book_isbn` varchar(15) NOT NULL,
  `book_publisher` varchar(255) NOT NULL,
  `book_publishingdate` varchar(255) NOT NULL,
  `book_length` int(5) NOT NULL,
  `book_description` text NOT NULL,
  `book_cover` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_author`, `book_genre`, `book_isbn`, `book_publisher`, `book_publishingdate`, `book_length`, `book_description`, `book_cover`) VALUES
(9, 'Сумрачен патрул', 'Сергей Лукяненко', 'Фантастика', '9789542834373', 'Сиела', '2020', 176, 'Третата книга от поредицата „Нощен патрул“ на Сергей Лукяненко ни изпраща в убийствения Сумрак.\r\nОт както свят светува Сумракът принадлежи на Различните. Хората дори не подозират за съществуването му, а и да знаеха, никога не биха могли да потънат в дълбините му без чужда помощ.', 'bookcovers/patrul3.jpg'),
(10, 'Разкази. Пътеписи', 'Иван Вазов', 'Класически роман', '9789545276040', 'Дамян Яков', '2019', 374, 'В пътеписите си авторът пресъздава един свят колкото чужд, толкова и близък на този, който познаваме от разказите му. И тук проблемите на настоящето безспорно си остават, но верен на безусловното си преклонение към природата, писателят сякаш намира в нея алтернативата на човешкото несъвършенство, излаза от болните проблеми на общността.', 'bookcovers/vazov-cover.jpg'),
(11, 'Реликвите на смъртните - книга 1 - Град от кости', 'Касандра Клеър', 'Фантастика', '9789549321265', 'Ибис', '2010', 444, 'Преди хиляда години ангелът Разиел смесил своята кръв с човешка и създал Нефилимите. Полухора, полуангели, те бродят в нашия свят, невидими, но винаги край нас – те са нашите защитници.\r\n\r\nНаричат себе си Ловци на сенки.', 'bookcovers/klear1.jpg'),
(12, 'Реликвите на смъртните - книга 4 - Град на паднали ангели', 'Касандра Клеър', 'Фантастика', '9789549321586', 'Ибис', '2011', 364, 'Любов. Кръв. Предателство. Отмъщение. Залозите са по-високи от всякога...\r\n\r\nСамо два месеца след като войната за Реликвите на смъртните е приключила, мистериозни събития заплашват да разпалят нова, този път още по-кръвопролитна. Някой избива ловци на сенки и оставя телата им пръснати из териториите на Долноземците...', 'bookcovers/klear4.jpeg'),
(13, 'Хари Потър и Философският камък - книга 1', 'Дж. К. Роулинг', 'Фантастика', '9789542726227', 'Егмонт', '2021', 420, 'Отправете се (отново) към перон „Девет и три четвърти“ и поемете към магичния свят на „Хогуортс“ заедно с Хари Потър и неговите верни приятели Хърмаяни и Рон.\r\nЖивотът на Хари Потър се променя завинаги на единадесетия му рожден ден, когато великан с очи, блестящи като бръмбари, му донася писмо и невероятна новина. Хари Потър не е обикновено момче, той е магьосник. Едно невероятно приключение е на път да започне.', 'bookcovers/harrypotterbook1.jpeg'),
(14, 'Космос - брой 6', 'Слави Ангелов', 'Научна фантастика', '977260343203806', '\"168 часа\" ЕООД', '2022', 80, '„Космос“ е българско списание, основано през 1962 г. като „научно-художествено списание за юноши“.\r\n\r\nСъздадено е по идея на Борис Ангелушев, който е автор е на графичния дизайн на първите броеве на списание „Космос“ през 1962 г. Списанието публикува научно-популярни статии, криминални и научно-фантастични разкази на български и чужди автори.', 'bookcovers/kosmos62022.jpg'),
(15, 'Адски устройства - книга 1 - Ангел с часовников механизъм', 'Касандра Клеър', 'Фантастика', '9789549321593', 'Ибис', '2011', 396, 'Шестнайсетгодишната Тереза Грей пристига от слънчев Ню Йорк в дъждовния, мрачен Лондон, за да види своя брат Нат, но вместо това попада в плен на Сестрите на мрака и се озовава в свят на тъмна магия и смъртоносни интриги. Над нея се надига зловещата сянка на загадъчен мъж, наричан Магистъра, а тя е неговият ключ към световно господство. Единствената й надежда за спасение е в Ловците на сенки - смъртоносните воини, закрилящи човечеството от силите на мрака.', 'bookcovers/angle1.jpeg');

-- --------------------------------------------------------

--
-- Структура на таблица `books_taken`
--

CREATE TABLE `books_taken` (
  `taken_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `taken_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `books_taken`
--

INSERT INTO `books_taken` (`taken_id`, `users_id`, `book_id`, `taken_date`, `return_date`) VALUES
(34, 1, 10, '2022-11-15', '2022-12-15');

-- --------------------------------------------------------

--
-- Структура на таблица `ebooks`
--

CREATE TABLE `ebooks` (
  `ebook_id` int(11) NOT NULL,
  `ebook_download` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `ebooks`
--

INSERT INTO `ebooks` (`ebook_id`, `ebook_download`, `book_id`) VALUES
(2, 'ebooks/ebookPatrul3.epub', 9);

-- --------------------------------------------------------

--
-- Структура на таблица `magazines`
--

CREATE TABLE `magazines` (
  `magazine_id` int(11) NOT NULL,
  `magazine_link` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `magazines`
--

INSERT INTO `magazines` (`magazine_id`, `magazine_link`, `book_id`) VALUES
(1, 'https://bg.wikipedia.org/wiki/%D0%9A%D0%BE%D1%81%D0%BC%D0%BE%D1%81_(%D1%81%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5)', 14);

-- --------------------------------------------------------

--
-- Структура на таблица `paperbooks`
--

CREATE TABLE `paperbooks` (
  `paperbook_id` int(11) NOT NULL,
  `paperbook_status` tinyint(1) NOT NULL DEFAULT 1,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `paperbooks`
--

INSERT INTO `paperbooks` (`paperbook_id`, `paperbook_status`, `book_id`) VALUES
(1, 0, 10),
(2, 1, 11),
(3, 1, 12),
(4, 1, 15);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_username` tinytext NOT NULL,
  `users_password` longtext NOT NULL,
  `users_email` tinytext NOT NULL,
  `users_role` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`users_id`, `users_username`, `users_password`, `users_email`, `users_role`) VALUES
(1, 'sonerkabilov', '$2y$10$l4PpSINvfAZxi6ymi9opie.85nPjEQy9M.OGo2jMvQZhYrCuuJuFe', 'sonerkabilov@abv.bg', 'user'),
(3, 'alex', '$2y$10$nRb8pXU0Ak7z6ijd4EFXl.6FUJEXNriKfr2cgU.yv.bmtpxno7A/C', 'alex.panajotova12@gmail.com', 'user'),
(4, 'admin', '$2y$10$9k85NuzxDcOjNKgA/WIbleiKBk3Lpr.F5UTETBWvjAjgFLEQCCx7u', 'admin@reglibrary.bg', 'admin'),
(5, 'ivan', '$2y$10$Sec5Sx0ihhGC9Qq4l8CTm..SthPbHulrTqYVEIkmB7ecoR8LE38Ea', 'ivandragan@abv.bg', 'user');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `audiobooks`
--
ALTER TABLE `audiobooks`
  ADD PRIMARY KEY (`audiobook_id`),
  ADD KEY `fk_audiobook` (`book_id`);

--
-- Индекси за таблица `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Индекси за таблица `books_taken`
--
ALTER TABLE `books_taken`
  ADD PRIMARY KEY (`taken_id`),
  ADD KEY `fk_user` (`users_id`),
  ADD KEY `fk_book` (`book_id`);

--
-- Индекси за таблица `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`ebook_id`),
  ADD KEY `fk_ebook` (`book_id`);

--
-- Индекси за таблица `magazines`
--
ALTER TABLE `magazines`
  ADD PRIMARY KEY (`magazine_id`),
  ADD KEY `fk_magazine` (`book_id`);

--
-- Индекси за таблица `paperbooks`
--
ALTER TABLE `paperbooks`
  ADD PRIMARY KEY (`paperbook_id`),
  ADD KEY `fk_paperbook` (`book_id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audiobooks`
--
ALTER TABLE `audiobooks`
  MODIFY `audiobook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `books_taken`
--
ALTER TABLE `books_taken`
  MODIFY `taken_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `ebook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `magazines`
--
ALTER TABLE `magazines`
  MODIFY `magazine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paperbooks`
--
ALTER TABLE `paperbooks`
  MODIFY `paperbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `audiobooks`
--
ALTER TABLE `audiobooks`
  ADD CONSTRAINT `fk_audiobook` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения за таблица `books_taken`
--
ALTER TABLE `books_taken`
  ADD CONSTRAINT `fk_book` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE;

--
-- Ограничения за таблица `ebooks`
--
ALTER TABLE `ebooks`
  ADD CONSTRAINT `fk_ebook` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения за таблица `magazines`
--
ALTER TABLE `magazines`
  ADD CONSTRAINT `fk_magazine` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения за таблица `paperbooks`
--
ALTER TABLE `paperbooks`
  ADD CONSTRAINT `fk_paperbook` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
