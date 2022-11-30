-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lis 2022, 15:56
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zsp-szop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `offers`
--

INSERT INTO `offers` (`id`, `user_id`, `offer_name`, `description`, `price`) VALUES
(1, 1, 'traktor', 'Tanioszka', 75000),
(2, 2, 'Oddam gruz', 'Oddam gruz za darmo', 0),
(3, 3, 'Za darmo GrUz', 'Gruz i cegły za free', 0),
(4, 3, 'Telefon', 'Telefon prawie nowy z niewielką usterką', 100),
(5, 4, 'Maskotki Gang Świeżaków', 'Maskotki z gangu świeżaków', 50),
(6, 1, 'Drukarka Brother ', 'Drukarka brother mfc 295', 500),
(7, 3, 'Gruz', 'Gruz', 0),
(8, 1, 'KoMpUtR', 'najepszy komputr gamigowy na rynku 200 rdzeniowy procesor, \r\nlepszej karty graficznej nigdy nie znajdziesz, 4GB RAMu i system Windows XP', 200000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `offer_id`, `user_id`) VALUES
(1, 4, 4),
(2, 6, 3),
(3, 1, 4),
(4, 7, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `is_admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `is_admin`) VALUES
(1, 'A', 'B', 'mail.123@gmail.com', 'haslo123', 0),
(2, 'D', 'F', 'qwer.123@gmail.com', 'lo123', 0),
(3, 'T', 'G', 'Mak.123@gmail.com', 'hao123', 0),
(4, 'Y', 'X', 'il.123@gmail.com', 'aso123', 0),
(5, 'Szmn', 'Jan', 'szymon.123@gmail.com', 'admin123', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_offers_users1` (`user_id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`offer_id`,`user_id`),
  ADD KEY `fk_users_has_offers_users` (`user_id`),
  ADD KEY `fk_users_has_offers_offers1` (`offer_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `fk_offers_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_users_has_offers_offers1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_offers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
