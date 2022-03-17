-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Már 17. 18:44
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `helio`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `feladat_users`
--

CREATE TABLE `feladat_users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `feladat_users`
--

INSERT INTO `feladat_users` (`id`, `email`, `password`) VALUES
(4, 'beleczky.feri@gmail.com', '$2y$10$uauruLXW3CCz6NVmbi7JXezakF8K0eOHfpSvxyfymLqdYvi4Kb28y'),
(11, 'teszt@teszt.hu', '$2y$10$oIGblsKttG5I9ZdGbXZ4VehTG6F1f6b/2NZ5xVJtycRhjvChiweKO');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `feladat_users`
--
ALTER TABLE `feladat_users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `feladat_users`
--
ALTER TABLE `feladat_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
