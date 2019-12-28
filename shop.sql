-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Gru 2019, 13:09
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(3) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `client`
--

CREATE TABLE `client` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `contactno` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `client`
--

INSERT INTO `client` (`id`, `firstname`, `lastname`, `email`, `address`, `city`, `zipcode`, `contactno`) VALUES
(1, 'Jan', 'Kowalski', 'jan@gmail.com', 'Wojska Polskiego 50', 'Krakow', '022004', '5555555554'),
(2, 'Jan', 'Kowalski', 'jan@gmail.com', 'Wojska Polskiego 50', 'Krakow', '022004', '5454545455'),
(3, 'Jan', 'Kowalski', 'jan@gmail.com', 'Wojska Polskiego 5', 'Warszawa', '01-000', '555666888'),
(4, 'Jan', 'Nowak', 'jan@gmil.com', 'Wojska 3', 'Kraków', '02-888', '555444777'),
(5, 'Jan', 'Kowalski', 'jan@gmail.com', 'Wojska 1', 'Warszawa', '01-200', '551551551'),
(6, 'Jan', 'Kowalski', 'jan@gmail.com', 'Wojska 1', 'Warszawa', '02-555', '555666333'),
(7, 'Zygmunt', 'Nowak', 'zigi@gmail.cpm', 'Aleja 5', 'Warszawa', '02-222', '666999888'),
(8, 'Marek', 'Kowalski', 'marek@gmail.com', 'Powstańców 1', 'Warszawa', '02-555', '777444111'),
(9, 'Damian', 'Kowalski', 'damian@gmail.com', 'Wojska 1', 'Wrocław', '44-555', '666333222'),
(10, 'Damian', 'Kowalski', 'damian@gmail.com', 'Wojska 1', 'Wrocław', '44-555', '666333222'),
(11, 'Damian', 'Kowalski', 'kowal@kowal.com', 'Aleja 4', 'Warszawa', '01-111', '777444111'),
(12, 'Marek', 'Kowalski', 'kowal@kowal.pl', 'Aleja 5', 'Kraków', '11-555', '666555444');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `product_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_qty` int(5) NOT NULL,
  `product_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `product_category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pproduct_desc` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_category`, `pproduct_desc`) VALUES
(3, 'CLASSIC WORLD DREWNIANY CHODZIK PCHACZ WIELOFUNKCYJNY 3326', 289, 3, 'product_image/e12c10d223af8879e9bbb50515b951c1Screenshot_80.png', 'Drewniane', 'Firma Classic World posiada ponad 20 letnie doświadczenie w produkcji drewnianych zabawek dla dzieci. Wszystkie zabawki spełniają rygorystyczne normy dotyczące bezpieczeństwa. Ponadto cechują się wysoką jakością wykonania a do ich produkcji używane jest drewno bez konserwantów chemicznych oraz nietoksyczne farby.\r\n\r\nDrewniany chodzik-pchacz został zaprojektowany z myślą o najmłodszych dzieciach, tak aby mogły one bezpiecznie i stabilnie poruszać się trzymając pchacz za rączkę. Zabawka łączy funk'),
(4, 'CLASSIC WORLD DREWNIANY JEŹDZIK PCHACZ 2w1 3317', 179, 6, 'product_image/db32f1c0f29e3f10d24c2903685188c0Screenshot_81.png', 'Drewniane', 'Firma Classic World posiada ponad 20 letnie doświadczenie w produkcji drewnianych zabawek dla dzieci. Wszystkie zabawki spełniają rygorystyczne normy dotyczące bezpieczeństwa. Ponadto cechują się wysoką jakością wykonania a do ich produkcji używane jest drewno bez konserwantów chemicznych oraz nietoksyczne farby.\r\n\r\nDrewniany jeździk-pchacz nawiązujący kształtem do samochodu to doskonała zabawa i nauka w jednym. Maluch może używać zabawki jako pchacza, do czego wykorzysta rączkę z otworem. Na rą'),
(5, 'CLASSIC WORLD DREWNIANY SORTER KSZTAŁTÓW LITERKI 5008', 84, 8, 'product_image/7d1b2211138690eedb47d13aa3e9fd3aScreenshot_82.png', 'Drewniane', 'Firma Classic World posiada ponad 20 letnie doświadczenie w produkcji drewnianych zabawek dla dzieci. Wszystkie zabawki spełniają rygorystyczne normy dotyczące bezpieczeństwa. Ponadto cechują się wysoką jakością wykonania a do ich produkcji używane jest drewno bez konserwantów chemicznych oraz nietoksyczne farby.\r\n\r\nSorter kształtów to funkcjonalna zabawka, która zapewni dziecku rozrywkę na wiele godzin. Zadanie polega na dopasowaniu klocków o różnych kształtach do właściwych otworów. Wyraziste '),
(6, 'CLASSIC WORLD MAŁE LUSTERKO DO ZABAWY KWIATEK 3060', 29, 9, 'product_image/ca1cac43e0f6274c4db53a158b5c90f0Screenshot_83.png', 'Drewniane', 'Firma Classic World posiada ponad 20 letnie doświadczenie w produkcji drewnianych zabawek dla dzieci. Wszystkie zabawki spełniają rygorystyczne normy dotyczące bezpieczeństwa. Ponadto cechują się wysoką jakością wykonania a do ich produkcji używane jest drewno bez konserwantów chemicznych oraz nietoksyczne farby.\r\n\r\nA kuku! Widzę Cię! Spoglądanie do lusterka i obserwowanie odbijających się w nim kształtów to niezwykle intrygujące zajęcie. W lusterku zobaczyć można zawsze coś nowego, a z czasem -'),
(7, 'ARTYK E-EDU EDUKACYJNY MIŚ EDUŚ UCZNIACZEK 129780', 99, 3, 'product_image/b1bf72d55ca5f3b4340a411fb254308bScreenshot_84.png', 'Interaktywne', 'Miś Eduś to słodki miś edukacyjny którego pokocha każdy maluch. Ten brązowy pluszak wspiera dziecko w oswajaniu nowych umiejętności i poszerzaniu wiedzy! Dzięki recytacji wesołych wierszyków sprawi, że malec bez problemu zapamięta numery alarmowe i przyswoi zasady bezpiecznej zabawy. Zabawka wesprze go także w nawiązywaniu relacji z rówieśnikami i pocieszy, kiedy czas oczekiwania na powrót mamy zacznie się dłużyć. Miś Eduś zna wierszyki, piosenki i bajki. W łapkach ma czipy, które po naciśnięciu'),
(8, 'ARTYK E-EDU PLUSZOWY JEŻYK JULEK 129414', 89, 5, 'product_image/b319e1b6a9e9f6c3d01773c49d2dd09dScreenshot_85.png', 'Interaktywne', 'Pluszowy Jeżyk Julek to edukacyjna maskotka, która uczy dzieci zasad zdrowego odżywiania i aktywnego spędzania czasu. Dzięki niemu dzieci dowiedzą się jak ważna jest zdrowa dieta i ruch.\r\n\r\nJulek Jeż to mądry zwierz, który wie, co warto jeść! Zdrowa dieta to podstawa plus ćwiczenia - ważna sprawa. Żeby zdrowy brzuszek mieć, trzeba mądrze jeść. Skacz i biegaj ile sił, żebyś zawsze krzepkim był. Bądź najzdrowszym przedszkolakiem, zjadaj owoce ze smakiem. Chrup warzywa też dla zdrówka, po nich jest'),
(9, 'BRIGHT STARTS KOKOSOWA KATAPULTA Z PIŁECZKAMI 10346', 65, 4, 'product_image/7591eca9aa509ebfb1714be27a3420d5Screenshot_86.png', 'Interaktywne', 'Razem z gorylem trenuj rzuty piłeczkowymi kokosami i ćwicz koordynację ruchową. Aby załadować katapultę połóż jedną z dołączonych do zabawki kolorowych piłeczek na dłonie małpki i naciśnij palmę, a goryl wyrzuci piłką za siebie. Zabawie towarzyszy 25 zabawnych dźwięków i przyjemnych dla ucha melodii, a regulacja głośności pozwala dostosować zabawkę do potrzeb malucha.\r\n\r\nZasilanie: 2 baterie AA (baterie testowe w zestawie).\r\n\r\nWymiary całkowite zabawki (dł x szer x wys): 29 x 12,5 x 20,5 cm\r\n\r\nW'),
(10, 'BRIGHT STARTS ZABAWNE AKWARIUM Z PIŁECZKAMI 10351', 89, 5, 'product_image/cec19f1e0c280b262e44526fa240019fScreenshot_87.png', 'Interaktywne', 'Złota rybka i jej magiczne akwarium wyczarują cudowną zabawę pełną światełek i wesołych melodii! Ustaw przełącznik na tryb zabawnych dźwięków lub melodii i daj się porwać eksplozji radości. Naciskaj na rybkę szybciej i szybciej, a akwarium będzie wirować przy dźwiękach wesołych odgłosów lub melodii, świecąc, rozchylając na boki swoje ścianki i wyrzucając kolorowe piłeczki! Złap je wszystkie i wrzuć z powrotem do środka akwarium, aby rozpocząć zabawę od początku. W zestawie 4 piłeczki.\r\n\r\nZasilan'),
(11, '4M BALANSUJĄCY ROBOT 3364 BALANSUJĄCY ROBOT 3364', 39, 6, 'product_image/065df6e0a765f827d72d31bd0d40b591Screenshot_88.png', 'Naukowe', 'Zaskocz swoich znajomych i rodzinę grawitacyjnymi sztuczkami, które potrafi utalentowany robot-akrobata. Obserwując jego triki na sznurku oraz cienkiej tyczce dowiesz się jak działa niewidzialna siła grawitacji. To świetna zabawa!\r\n\r\nZawartość zestawu:\r\n\r\nzestaw części ciała robota\r\nzestaw obciążników\r\nbalansujący drążek\r\nzestaw do statywu i monocyklu\r\nsznurek\r\n Potrzebne będą także, a nie są dołączone do zestawu:\r\n\r\nmały śrubokręt krzyżakowy\r\nmonety\r\nWymiary opakowania: 17 x 22 x 6 cm\r\n\r\nWiek: '),
(12, '4M DZWONEK DO DRZWI - ZRÓB TO SAM 3368', 39, 9, 'product_image/8d440ab49a28a8507b996b488968792cScreenshot_89.png', 'Naukowe', 'Zgłębiaj tajemnice dotyczące oddziaływania elektromagnetycznego i przekształć metalową śrubę w magnetyczny młoteczek. Zamknij obwód elektryczny i zbuduj podręczny dzwonek do drzwi. Używaj go w swoim pokoju, jako naukowy gadżet. To świetna zabawa!\r\n\r\nZawartość zestawu:\r\n\r\nelementy dzwonka do drzwi\r\n Potrzebne będą także, a nie są dołączone do zestawu:\r\n\r\nmały śrubokręt krzyżakowy\r\n2 baterie 1,5 V typu AA\r\nWymiary opakowania: 17 x 22 x 6 cm\r\n\r\nWiek: powyżej 8 lat\r\n\">\">'),
(13, '4M EASTCOLIGHT HODOWLA KRYSZTAŁÓW BIAŁE 36101', 23, 4, 'product_image/a9975fdb0ef7fed9cce6231f8f06f294Screenshot_90.png', 'Naukowe', 'Kolorowe kryształy w domach dotąd nie powstawały!\r\n\r\nNowoczesne doświadczenie dla dzieci! Nie przegap tego niewiarygodnego eksperymentu, który poszerzy Twoje horyzonty! Wyhoduj wspaniałe kryształy! Do dyspozycji masz wszystko, co jest niezbędne do wyhodowania białego kryształu: proszek krystaliczny, bazę kryształu, trójkątny ekspozytor z pokrywką, łyżeczkę i instrukcję.\r\n\r\nZawartość zestawu:\r\n\r\nfiolka z proszkiem krystalicznym w kolorze białym (fosforan monoamonowy)\r\ntrójkątny ekspozytor z pokry'),
(14, '4M EASTCOLIGHT HODOWLA KRYSZTAŁÓW CZERWONE 36104', 23, 7, 'product_image/44c9b3b186cbdb1da4b6ae097e01fa83Screenshot_91.png', 'Naukowe', 'Kolorowe kryształy w domach dotąd nie powstawały!\r\n\r\nNowoczesne doświadczenie dla dzieci! Nie przegap tego niewiarygodnego eksperymentu, który poszerzy Twoje horyzonty! Wyhoduj wspaniałe kryształy! Do dyspozycji masz wszystko, co jest niezbędne do wyhodowania czerwonego kryształu: proszek krystaliczny, bazę kryształu, trójkątny ekspozytor z pokrywką, łyżeczkę i instrukcję.\r\n\r\nZawartość zestawu:\r\n\r\nfiolka z proszkiem krystalicznym w kolorze czerwonym (fosforan monoamonowy)\r\ntrójkątny ekspozytor z');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `torder`
--

CREATE TABLE `torder` (
  `id` int(5) NOT NULL,
  `order_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_qty` int(5) NOT NULL,
  `product_total` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `torder`
--

INSERT INTO `torder` (`id`, `order_id`, `client_id`, `product_id`, `product_price`, `product_qty`, `product_total`) VALUES
(4, '1', '5', '7', 99, 1, '99'),
(5, '1', '5', '8', 89, 2, '178'),
(6, '2', '6', '7', 99, 1, '99'),
(7, '2', '6', '8', 89, 3, '267'),
(8, '2', '6', '2', 68, 1, '68'),
(9, '3', '7', '1', 39, 1, '39'),
(10, '3', '7', '3', 289, 1, '289'),
(11, '4', '8', '5', 84, 1, '84'),
(12, '4', '8', '3', 289, 1, '289'),
(13, '5', '9', '5', 84, 1, '84'),
(14, '5', '9', '3', 289, 2, '578'),
(15, '5', '9', '7', 99, 1, '99'),
(16, '6', '10', '5', 84, 1, '84'),
(17, '6', '10', '3', 289, 2, '578'),
(18, '6', '10', '7', 99, 1, '99'),
(19, '7', '11', '5', 84, 1, '84'),
(20, '7', '11', '3', 289, 2, '578'),
(21, '7', '11', '7', 99, 1, '99'),
(22, '8', '12', '5', 84, 1, '84'),
(23, '8', '12', '3', 289, 2, '578'),
(24, '8', '12', '7', 99, 1, '99');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `torder_id`
--

CREATE TABLE `torder_id` (
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `torder_id`
--

INSERT INTO `torder_id` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `torder`
--
ALTER TABLE `torder`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `torder_id`
--
ALTER TABLE `torder_id`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `client`
--
ALTER TABLE `client`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `torder`
--
ALTER TABLE `torder`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `torder_id`
--
ALTER TABLE `torder_id`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
