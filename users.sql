-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Cze 2020, 09:54
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `day2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `login` varchar(50) COLLATE utf16_polish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf16_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf16_polish_ci NOT NULL,
  `wiek` int(11) NOT NULL,
  `telefon` int(11) NOT NULL,
  `Miejscowosc` varchar(50) COLLATE utf16_polish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`login`, `pass`, `email`, `wiek`, `telefon`, `Miejscowosc`, `admin`) VALUES
('Adam', '$2y$10$E3W9sqCysNpKKvuK01Ht9OZFsiZNVH2uw.arNTDE9HUpwaIilxnTi', 'adam@wp.pl', 22, 885234123, 'Szczecin', 0),
('Daniel', '$2y$10$6SZX4k8bgycdc74Sv8dK1OYAU9paTUlusNCl1lLKz6aRL7tbMXR.i', 'daniel@gmail.com', 24, 793123942, 'Goleniow', 1),
('Marek', '$2y$10$6SZX4k8bgycdc74Sv8dK1OYAU9paTUlusNCl1lLKz6aRL7tbMXR.i', 'marek@gmail.com', 31, 733463942, 'Poznan', 1),
('Robert', '$2y$10$bIc.mCk5Tdsu0HPEcHcrJusw2b.nqUUKBOAWhXQRhV0KfVpt7Agk6', 'robert@o2.pl', 44, 675666123, 'Szczecin', 0),
('Wojtek', '$2y$10$5KW1SCt7OzjfABRQMka0Le6WV9Igz9uB6KKfRKcIDcLeKSGvqzsB.', 'wojtek@o2.pl', 31, 334632673, 'Szczecin', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
