-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 09:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kobyskreaties`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `title`) VALUES
(1, 1, 'Geen Subcategorie'),
(37, 28, 'Speenkoorden'),
(38, 28, 'Punnikwoorden'),
(39, 28, 'Slofjes'),
(40, 28, 'MacramÃ© ster'),
(41, 29, 'Knuffels'),
(42, 29, 'Bijtringen'),
(43, 29, 'Rammelaars'),
(44, 29, 'Speelgoed'),
(45, 29, 'Boxmobielen'),
(46, 29, 'Babygyms'),
(49, 34, 'Kerst'),
(51, 31, 'Dekentjes'),
(52, 31, 'Muziekdoosjes'),
(53, 32, 'Speenkoord met naam'),
(54, 32, 'Punniknaam'),
(55, 32, 'Naamlampje'),
(63, 34, 'Zwarte vrijdag'),
(64, 34, 'Nieuw Jaar');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Geen Categorie'),
(28, 'Accessoires'),
(29, 'Spelen'),
(31, 'Slapen'),
(32, 'Personaliseren'),
(34, 'Feestdagen');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `title`) VALUES
(1, 'Geen Kleur'),
(35, 'Wit'),
(36, 'Marmer'),
(37, 'Vanille'),
(38, 'Mosterd'),
(39, 'Oker'),
(40, 'Koraal'),
(41, 'Baksteen'),
(42, 'Bordeaux'),
(43, 'Oudroze'),
(44, 'Framboos'),
(45, 'Pioen'),
(46, 'Perzik'),
(47, 'Parel'),
(48, 'Foxglove'),
(49, 'Clematis'),
(50, 'Schemerblauw'),
(51, 'Denim'),
(52, 'Petrol'),
(53, 'Baby blauw'),
(54, 'IJsblauw'),
(55, 'Glas'),
(56, 'Eucalyptus'),
(57, 'Teal'),
(58, 'Mintgroen'),
(59, 'Flesgroen'),
(60, 'Goud'),
(61, 'Taupe'),
(62, 'Eikenbruin'),
(63, 'Karamel'),
(64, 'Aardebruin'),
(65, 'Zwart'),
(66, 'Antraciet'),
(67, 'Zachtgrijs'),
(69, 'Berkenbruin'),
(70, 'Wit met oranje'),
(71, 'Wit met roze'),
(72, 'Blauw'),
(73, 'Multicolor'),
(74, 'Roze');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(255) NOT NULL,
  `show-post-logs` varchar(255) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `show-post-logs`) VALUES
(1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `crm`
--

CREATE TABLE `crm` (
  `id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `time` varchar(255) NOT NULL,
  `extra` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crm`
--

INSERT INTO `crm` (`id`, `project`, `date`, `description`, `time`, `extra`, `status`) VALUES
(31, 1, '21-12-2022', 'Gewerkt met het toevoegen van de CRM lijst op de Console', '01:15', '', 2),
(34, 1, '21-12-2022', 'CRM getest', '00:15', '', 2),
(36, 0, '22-12-2022', 'Ik heb de kleuren en grotes aangepast dat dit nu bij alle producten vloeiend werkt. Je kunt nu de vooraad zien voor elke groote, wat heel helpvol is. Ook heb ik toevevoegd dat je meteen een bericht krijgt als er geen enkele product op vooraad is. Deze kan je dan ook niet bestellen', '03:00', '', 2),
(37, 0, '22-12-2022', 'Nieuwe tabjes toevoegd aan de homepage', '02:00', '', 1),
(38, 0, '18-02-2023', 'Gewerkt aan de header en de footer van de homepagina', '02:00', '', 4),
(39, 0, '19-02-2023', 'Gewerkt aan de homepage. Ik heb de review section begin aan gemaakt, en de subscribe section. Deze zijn zeker nog lang niet klaar maar het begin staat er.', '03:00', '', 4),
(40, 0, '19-02-2023', 'Vandaag gewerkt aan de review section en de informatie section', '02:00', '', 4),
(41, 0, '24-03-2023', 'Ik heb de design van de website een stuk beter gemaakt. De homepage ziet er nu een stuk vriendelijker uit.', '03:00', '', 1),
(42, 0, '30-03-2023', 'Werkshop werkend maken. Alleen moeten er nog een paar dingen gebeuren voordat het helemaal klaar is.', '12:00', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `newsletter` varchar(1) NOT NULL DEFAULT 'N',
  `phonenumber` varchar(255) NOT NULL,
  `last_online` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `street_name` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `newsletter`, `phonenumber`, `last_online`, `created_at`, `street_name`, `house_number`, `city`, `postal`, `country`) VALUES
(57, 'Semih', 'Huigen', 'SemihHuigen@teleworm.us', 'N', '06-78247591', '2023-04-08', '2023-04-08', 'Okapistraat', '75', 'Nijmegen', '6531 RK', 'Netherlands'),
(58, 'Theadora', 'de Beijer', 'TheadoradeBeijer@jourrapide.com', 'N', '06-38746066', '2023-04-08', '2023-04-08', 'Toekanweg', '138', 'Haarlem', '2035 LC', 'Netherlands'),
(59, 'Marcel', 'van Rhijn', 'MarcelvanRhijn@dayrep.com', 'N', '06-39644869', '2023-04-08', '2023-04-08', 'Oude Kerkhof', '87', 'Veldhoven', '5503 TG', 'Netherlands'),
(60, 'Zora', 'Eijkenboom', 'ZoraEijkenboom@rhyta.com', 'N', '06-46562167', '2023-04-08', '2023-04-08', 'Kwelkade', '58', 'Tiel', '4001 RL', 'Netherlands'),
(61, 'Cansu', 'Boiten', 'CansuBoiten@jourrapide.com', 'N', '06-56795819', '2023-04-08', '2023-04-08', 'Kerkendijk', '112', 'Someren', '5712 ES', 'Netherlands'),
(62, 'Jeen ', 'Thijs', 'JeenThijs@jourrapide.com', 'N', '06-51819529', '2023-04-08', '2023-04-08', 'Rembrandtlaan', '113', 'Alphen aan den Rijn', '2406 GZ', 'Netherlands'),
(63, 'Joleen', 'van Netten', 'JoleenvanNetten@dayrep.com', 'N', '06-93752164', '2023-04-08', '2023-04-08', 'Touwslagerwei', '117', 'Valkenswaard', '5551 SJ', 'Netherlands'),
(64, 'Philippa ', 'Boudewijns', 'PhilippaBoudewijns@dayrep.com', 'N', '06-48827751', '2023-04-08', '2023-04-08', 'Zilverakkerweg', '174', 'Dieren', '6952 DP', 'Netherlands'),
(65, 'Annemiek ', 'Wielens', 'AnnemiekWielens@teleworm.us', 'N', '06-92071283', '2023-04-08', '2023-04-08', 'Notenakker', '42', 'Cothen', '3945 EM', 'Netherlands'),
(66, 'Pawan ', 'Schiks', 'PawanSchiks@dayrep.com', 'N', '06-23685706', '2023-04-08', '2023-04-08', 'Wanswerterdijk', '11', 'Burdaard', '9111 HD', 'Netherlands'),
(67, 'Linette', 'Korf', 'LinetteKorf@rhyta.com', 'N', '06-61343800', '2023-04-08', '2023-04-08', 'Thomaslaan ', '23', 'Eindhoven', '5631 GL', 'Netherlands'),
(68, 'Vivien ', 'Hietbrink', 'VivienHietbrink@jourrapide.com', 'N', '06-94527185', '2023-04-08', '2023-04-08', 'Zijlweg ', '40', 'Haarlem', '2013 DM', 'Netherlands'),
(69, 'VÃ©ronique ', 'Sep', 'VeroniqueSep@rhyta.com', 'N', '06-32556643', '2023-04-08', '2023-04-08', 'Middenweg ', '195', 'Anna Paulowna', '1761 LC', 'Netherlands');

-- --------------------------------------------------------

--
-- Table structure for table `deliverys`
--

CREATE TABLE `deliverys` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_costs`
--

CREATE TABLE `delivery_costs` (
  `id` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_costs`
--

INSERT INTO `delivery_costs` (`id`, `country`, `title`) VALUES
(1, 'Netherlands', '7.95'),
(2, 'Netherlands', '4.95');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'awaiting',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `status`, `created_at`) VALUES
(12412795, 56, 'Processing Payment', '2023-04-08'),
(12412796, 57, 'Processing Payment', '2023-04-08'),
(12412797, 58, 'Processing Payment', '2023-04-08'),
(12412798, 59, 'Processing Payment', '2023-04-08'),
(12412799, 60, 'Processing Payment', '2023-04-08'),
(12412800, 61, 'Processing Payment', '2023-04-08'),
(12412801, 62, 'Processing Payment', '2023-04-08'),
(12412802, 63, 'Processing Payment', '2023-04-08'),
(12412803, 64, 'Processing Payment', '2023-04-08'),
(12412804, 65, 'Processing Payment', '2023-04-08'),
(12412805, 66, 'Processing Payment', '2023-04-08'),
(12412806, 67, 'Processing Payment', '2023-04-08'),
(12412807, 68, 'Processing Payment', '2023-04-08'),
(12412808, 69, 'Processing Payment', '2023-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_description` longtext NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_delivery_cost` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_title`, `product_category`, `product_brand`, `product_description`, `product_price`, `product_size`, `product_color`, `product_delivery_cost`, `quantity`) VALUES
(53287582, 12412795, 'Octopus knuffel', 'Spelen', 'Knuffels', 'Deze octopus knuffel is een favoriete musthave voor je kleintje. De tentakels van de octopus voelen voor de baby net zo aan als de navelstreng, dit zorgt voor een kalmerend effect en geeft een veilig gevoel. Dus heerlijk om aan te friemelen en mee te spelen. \r\n\r\nDe octopus is in verschillende kleuren te krijgen. Wil je graag een octopus in een andere kleur hebben? Deze is in overleg samen te stellen in jouw eigen gewenste kleuren. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '16.95', 'Normaal', 'Marmer', '7.95', 2),
(53287583, 12412795, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Oker', '7.95', 1),
(53287584, 12412795, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Zachtgrijs', '7.95', 1),
(53287585, 12412796, 'Avocado rammelaar', 'Spelen', 'Rammelaars', 'Deze houten rammelaar in de vorm van een avocado is een absolute musthave voor alle hippe babyâ€™s. In de avocado zit een rammelkraal verwerkt, wat gegarandeerd voor uren speelplezier zorgt. De beukenhouten ring maakt het vasthouden van de rammelaar extra makkelijk en is daarnaast ook prima te gebruiken als bijtring. Ideaal om pijn bij doorkomende tandjes te verlichten. \r\n\r\nAfmeting houten ring: 5,5 cm\r\nAfmeting incl. avocado hanger: 16 cm.\r\nMateriaal avocado: 100% katoen. daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '12.95', 'Normaal', 'Mintgroen', '7.95', 3),
(53287586, 12412796, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Oker', '7.95', 1),
(53287587, 12412797, 'Octopus knuffel', 'Spelen', 'Knuffels', 'Deze octopus knuffel is een favoriete musthave voor je kleintje. De tentakels van de octopus voelen voor de baby net zo aan als de navelstreng, dit zorgt voor een kalmerend effect en geeft een veilig gevoel. Dus heerlijk om aan te friemelen en mee te spelen. \r\n\r\nDe octopus is in verschillende kleuren te krijgen. Wil je graag een octopus in een andere kleur hebben? Deze is in overleg samen te stellen in jouw eigen gewenste kleuren. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '16.95', 'Normaal', 'Marmer', '7.95', 1),
(53287588, 12412797, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Eikenbruin', '7.95', 2),
(53287589, 12412798, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Oker', '7.95', 1),
(53287590, 12412799, 'Octopus knuffel', 'Spelen', 'Knuffels', 'Deze octopus knuffel is een favoriete musthave voor je kleintje. De tentakels van de octopus voelen voor de baby net zo aan als de navelstreng, dit zorgt voor een kalmerend effect en geeft een veilig gevoel. Dus heerlijk om aan te friemelen en mee te spelen. \r\n\r\nDe octopus is in verschillende kleuren te krijgen. Wil je graag een octopus in een andere kleur hebben? Deze is in overleg samen te stellen in jouw eigen gewenste kleuren. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '16.95', 'Normaal', 'Marmer', '7.95', 1),
(53287591, 12412800, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Oker', '7.95', 1),
(53287592, 12412801, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Parel', '7.95', 1),
(53287593, 12412802, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Eikenbruin', '7.95', 1),
(53287594, 12412803, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Oker', '7.95', 2),
(53287595, 12412804, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Zachtgrijs', '7.95', 1),
(53287596, 12412804, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Parel', '7.95', 1),
(53287597, 12412805, 'Avocado rammelaar', 'Spelen', 'Rammelaars', 'Deze houten rammelaar in de vorm van een avocado is een absolute musthave voor alle hippe babyâ€™s. In de avocado zit een rammelkraal verwerkt, wat gegarandeerd voor uren speelplezier zorgt. De beukenhouten ring maakt het vasthouden van de rammelaar extra makkelijk en is daarnaast ook prima te gebruiken als bijtring. Ideaal om pijn bij doorkomende tandjes te verlichten. \r\n\r\nAfmeting houten ring: 5,5 cm\r\nAfmeting incl. avocado hanger: 16 cm.\r\nMateriaal avocado: 100% katoen. daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '12.95', 'Normaal', 'Mintgroen', '7.95', 1),
(53287598, 12412805, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Eikenbruin', '7.95', 1),
(53287599, 12412806, 'Octopus knuffel', 'Spelen', 'Knuffels', 'Deze octopus knuffel is een favoriete musthave voor je kleintje. De tentakels van de octopus voelen voor de baby net zo aan als de navelstreng, dit zorgt voor een kalmerend effect en geeft een veilig gevoel. Dus heerlijk om aan te friemelen en mee te spelen. \r\n\r\nDe octopus is in verschillende kleuren te krijgen. Wil je graag een octopus in een andere kleur hebben? Deze is in overleg samen te stellen in jouw eigen gewenste kleuren. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '16.95', 'Normaal', 'Marmer', '7.95', 1),
(53287600, 12412806, 'Avocado rammelaar', 'Spelen', 'Rammelaars', 'Deze houten rammelaar in de vorm van een avocado is een absolute musthave voor alle hippe babyâ€™s. In de avocado zit een rammelkraal verwerkt, wat gegarandeerd voor uren speelplezier zorgt. De beukenhouten ring maakt het vasthouden van de rammelaar extra makkelijk en is daarnaast ook prima te gebruiken als bijtring. Ideaal om pijn bij doorkomende tandjes te verlichten. \r\n\r\nAfmeting houten ring: 5,5 cm\r\nAfmeting incl. avocado hanger: 16 cm.\r\nMateriaal avocado: 100% katoen. daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '12.95', 'Normaal', 'Mintgroen', '7.95', 1),
(53287601, 12412807, 'Knuffeldoekje konijn', 'Spelen', 'Knuffels', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '15.95', 'Normaal', 'Zachtgrijs', '7.95', 1),
(53287602, 12412808, 'Octopus knuffel', 'Spelen', 'Knuffels', 'Deze octopus knuffel is een favoriete musthave voor je kleintje. De tentakels van de octopus voelen voor de baby net zo aan als de navelstreng, dit zorgt voor een kalmerend effect en geeft een veilig gevoel. Dus heerlijk om aan te friemelen en mee te spelen. \r\n\r\nDe octopus is in verschillende kleuren te krijgen. Wil je graag een octopus in een andere kleur hebben? Deze is in overleg samen te stellen in jouw eigen gewenste kleuren. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', '16.95', 'Normaal', 'Marmer', '7.95', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_group` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'Y',
  `size` varchar(255) NOT NULL,
  `color` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_updated` date NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_group`, `status`, `size`, `color`, `price`, `image`, `date_updated`, `date_created`, `views`) VALUES
(2224, '530102', 'Y', '3', 35, '0', 'main-banner-2.jpeg', '0000-00-00', '2023-03-31', 0),
(2225, '530102', 'Y', '3', 36, '0', '933332.jpg', '0000-00-00', '2023-03-31', 0),
(2226, '530102', 'Y', '3', 37, '0', '515894.jpg', '0000-00-00', '2023-03-31', 0),
(2227, '530102', 'Y', '3', 38, '0', '542447.jpg', '0000-00-00', '2023-03-31', 0),
(2228, '530102', 'Y', '3', 39, '15.95', '2228.jpeg', '0000-00-00', '2023-03-31', 0),
(2229, '530102', 'Y', '3', 40, '0', '451045.jpg', '0000-00-00', '2023-03-31', 0),
(2230, '530102', 'Y', '3', 41, '0', '143917.jpg', '0000-00-00', '2023-03-31', 0),
(2231, '530102', 'Y', '3', 42, '0', '137715.jpg', '0000-00-00', '2023-03-31', 0),
(2232, '530102', 'Y', '3', 43, '0', '528808.jpg', '0000-00-00', '2023-03-31', 0),
(2233, '530102', 'Y', '3', 44, '0', '315706.jpg', '0000-00-00', '2023-03-31', 0),
(2234, '530102', 'Y', '3', 45, '0', '237153.jpg', '0000-00-00', '2023-03-31', 0),
(2235, '530102', 'Y', '3', 46, '0', '254501.jpg', '0000-00-00', '2023-03-31', 0),
(2236, '530102', 'Y', '3', 47, '15.95', '2236.jpeg', '0000-00-00', '2023-03-31', 0),
(2237, '530102', 'Y', '3', 48, '0', '990462.jpg', '0000-00-00', '2023-03-31', 0),
(2238, '530102', 'Y', '3', 49, '0', '705827.jpg', '0000-00-00', '2023-03-31', 0),
(2239, '530102', 'Y', '3', 50, '0', '219059.jpg', '0000-00-00', '2023-03-31', 0),
(2240, '530102', 'Y', '3', 51, '0', '243240.jpg', '0000-00-00', '2023-03-31', 0),
(2241, '530102', 'Y', '3', 52, '0', '470474.jpg', '0000-00-00', '2023-03-31', 0),
(2242, '530102', 'Y', '3', 53, '0', '488855.jpg', '0000-00-00', '2023-03-31', 0),
(2243, '530102', 'Y', '3', 54, '0', '62774.jpg', '0000-00-00', '2023-03-31', 0),
(2244, '530102', 'Y', '3', 55, '0', '683961.jpg', '0000-00-00', '2023-03-31', 0),
(2245, '530102', 'Y', '3', 56, '0', '483944.jpg', '0000-00-00', '2023-03-31', 0),
(2246, '530102', 'Y', '3', 57, '0', '826366.jpg', '0000-00-00', '2023-03-31', 0),
(2247, '530102', 'Y', '3', 58, '0', '771159.jpg', '0000-00-00', '2023-03-31', 0),
(2248, '530102', 'Y', '3', 59, '0', '317633.jpg', '0000-00-00', '2023-03-31', 0),
(2249, '530102', 'Y', '3', 60, '0', '762791.jpg', '0000-00-00', '2023-03-31', 0),
(2250, '530102', 'Y', '3', 61, '0', '471922.jpg', '0000-00-00', '2023-03-31', 0),
(2251, '530102', 'Y', '3', 62, '15.95', '2251.jpeg', '0000-00-00', '2023-03-31', 0),
(2252, '530102', 'Y', '3', 63, '0', '101873.jpg', '0000-00-00', '2023-03-31', 0),
(2253, '530102', 'Y', '3', 64, '0', '288837.jpg', '0000-00-00', '2023-03-31', 0),
(2254, '530102', 'Y', '3', 65, '0', '671540.jpg', '0000-00-00', '2023-03-31', 0),
(2255, '530102', 'Y', '3', 66, '0', '621612.jpg', '0000-00-00', '2023-03-31', 0),
(2256, '530102', 'Y', '3', 67, '15.95', '2256.jpeg', '0000-00-00', '2023-03-31', 0),
(2257, '530102', 'Y', '3', 69, '0', '819648.jpg', '0000-00-00', '2023-03-31', 0),
(2258, '530102', 'Y', '3', 70, '0', '383403.jpg', '0000-00-00', '2023-03-31', 0),
(2259, '530102', 'Y', '3', 71, '0', '707972.jpg', '0000-00-00', '2023-03-31', 0),
(2260, '530102', 'Y', '3', 72, '0', '52215.jpg', '0000-00-00', '2023-03-31', 0),
(2261, '530102', 'Y', '3', 73, '0', '944861.jpg', '0000-00-00', '2023-03-31', 0),
(2262, '530102', 'Y', '3', 74, '0', '152905.jpg', '0000-00-00', '2023-03-31', 0),
(2263, '758036', 'Y', '3', 35, '0', '179549.jpg', '0000-00-00', '2023-03-31', 0),
(2264, '758036', 'Y', '3', 36, '16.95', '2264.jpeg', '0000-00-00', '2023-03-31', 0),
(2265, '758036', 'Y', '3', 37, '0', '872282.jpg', '0000-00-00', '2023-03-31', 0),
(2266, '758036', 'Y', '3', 38, '0', '121811.jpg', '0000-00-00', '2023-03-31', 0),
(2267, '758036', 'Y', '3', 39, '0', '467208.jpg', '0000-00-00', '2023-03-31', 0),
(2268, '758036', 'Y', '3', 40, '0', '212793.jpg', '0000-00-00', '2023-03-31', 0),
(2269, '758036', 'Y', '3', 41, '0', '94794.jpg', '0000-00-00', '2023-03-31', 0),
(2270, '758036', 'Y', '3', 42, '0', '934518.jpg', '0000-00-00', '2023-03-31', 0),
(2271, '758036', 'Y', '3', 43, '0', '115683.jpg', '0000-00-00', '2023-03-31', 0),
(2272, '758036', 'Y', '3', 44, '0', '779778.jpg', '0000-00-00', '2023-03-31', 0),
(2273, '758036', 'Y', '3', 45, '0', '621373.jpg', '0000-00-00', '2023-03-31', 0),
(2274, '758036', 'Y', '3', 46, '0', '554334.jpg', '0000-00-00', '2023-03-31', 0),
(2275, '758036', 'Y', '3', 47, '0', '596378.jpg', '0000-00-00', '2023-03-31', 0),
(2276, '758036', 'Y', '3', 48, '0', '508804.jpg', '0000-00-00', '2023-03-31', 0),
(2277, '758036', 'Y', '3', 49, '0', '628346.jpg', '0000-00-00', '2023-03-31', 0),
(2278, '758036', 'Y', '3', 50, '0', '450422.jpg', '0000-00-00', '2023-03-31', 0),
(2279, '758036', 'Y', '3', 51, '0', '422035.jpg', '0000-00-00', '2023-03-31', 0),
(2280, '758036', 'Y', '3', 52, '0', '359573.jpg', '0000-00-00', '2023-03-31', 0),
(2281, '758036', 'Y', '3', 53, '0', '698103.jpg', '0000-00-00', '2023-03-31', 0),
(2282, '758036', 'Y', '3', 54, '0', '998708.jpg', '0000-00-00', '2023-03-31', 0),
(2283, '758036', 'Y', '3', 55, '0', '910383.jpg', '0000-00-00', '2023-03-31', 0),
(2284, '758036', 'Y', '3', 56, '0', '957219.jpg', '0000-00-00', '2023-03-31', 0),
(2285, '758036', 'Y', '3', 57, '0', '258228.jpg', '0000-00-00', '2023-03-31', 0),
(2286, '758036', 'Y', '3', 58, '0', '226027.jpg', '0000-00-00', '2023-03-31', 0),
(2287, '758036', 'Y', '3', 59, '0', '832328.jpg', '0000-00-00', '2023-03-31', 0),
(2288, '758036', 'Y', '3', 60, '0', '538892.jpg', '0000-00-00', '2023-03-31', 0),
(2289, '758036', 'Y', '3', 61, '0', '689242.jpg', '0000-00-00', '2023-03-31', 0),
(2290, '758036', 'Y', '3', 62, '0', '705432.jpg', '0000-00-00', '2023-03-31', 0),
(2291, '758036', 'Y', '3', 63, '0', '198296.jpg', '0000-00-00', '2023-03-31', 0),
(2292, '758036', 'Y', '3', 64, '0', '1682.jpg', '0000-00-00', '2023-03-31', 0),
(2293, '758036', 'Y', '3', 65, '0', '649478.jpg', '0000-00-00', '2023-03-31', 0),
(2294, '758036', 'Y', '3', 66, '0', '664792.jpg', '0000-00-00', '2023-03-31', 0),
(2295, '758036', 'Y', '3', 67, '0', '940191.jpg', '0000-00-00', '2023-03-31', 0),
(2296, '758036', 'Y', '3', 69, '0', '212828.jpg', '0000-00-00', '2023-03-31', 0),
(2297, '758036', 'Y', '3', 70, '0', '633693.jpg', '0000-00-00', '2023-03-31', 0),
(2298, '758036', 'Y', '3', 71, '0', '195231.jpg', '0000-00-00', '2023-03-31', 0),
(2299, '758036', 'Y', '3', 72, '0', '428907.jpg', '0000-00-00', '2023-03-31', 0),
(2300, '758036', 'Y', '3', 73, '0', '628922.jpg', '0000-00-00', '2023-03-31', 0),
(2301, '758036', 'Y', '3', 74, '0', '727992.jpg', '0000-00-00', '2023-03-31', 0),
(2302, '431808', 'Y', '3', 35, '0', '225548.jpg', '0000-00-00', '2023-03-31', 0),
(2303, '431808', 'Y', '3', 36, '0', '656809.jpg', '0000-00-00', '2023-03-31', 0),
(2304, '431808', 'Y', '3', 37, '0', '339696.jpg', '0000-00-00', '2023-03-31', 0),
(2305, '431808', 'Y', '3', 38, '0', '900347.jpg', '0000-00-00', '2023-03-31', 0),
(2306, '431808', 'Y', '3', 39, '0', '725430.jpg', '0000-00-00', '2023-03-31', 0),
(2307, '431808', 'Y', '3', 40, '0', '769421.jpg', '0000-00-00', '2023-03-31', 0),
(2308, '431808', 'Y', '3', 41, '0', '686042.jpg', '0000-00-00', '2023-03-31', 0),
(2309, '431808', 'Y', '3', 42, '0', '245452.jpg', '0000-00-00', '2023-03-31', 0),
(2310, '431808', 'Y', '3', 43, '0', '556195.jpg', '0000-00-00', '2023-03-31', 0),
(2311, '431808', 'Y', '3', 44, '0', '809462.jpg', '0000-00-00', '2023-03-31', 0),
(2312, '431808', 'Y', '3', 45, '0', '541816.jpg', '0000-00-00', '2023-03-31', 0),
(2313, '431808', 'Y', '3', 46, '0', '210546.jpg', '0000-00-00', '2023-03-31', 0),
(2314, '431808', 'Y', '3', 47, '0', '413379.jpg', '0000-00-00', '2023-03-31', 0),
(2315, '431808', 'Y', '3', 48, '0', '392725.jpg', '0000-00-00', '2023-03-31', 0),
(2316, '431808', 'Y', '3', 49, '0', '575818.jpg', '0000-00-00', '2023-03-31', 0),
(2317, '431808', 'Y', '3', 50, '0', '474559.jpg', '0000-00-00', '2023-03-31', 0),
(2318, '431808', 'Y', '3', 51, '0', '435788.jpg', '0000-00-00', '2023-03-31', 0),
(2319, '431808', 'Y', '3', 52, '0', '387891.jpg', '0000-00-00', '2023-03-31', 0),
(2320, '431808', 'Y', '3', 53, '0', '242781.jpg', '0000-00-00', '2023-03-31', 0),
(2321, '431808', 'Y', '3', 54, '0', '36900.jpg', '0000-00-00', '2023-03-31', 0),
(2322, '431808', 'Y', '3', 55, '0', '393634.jpg', '0000-00-00', '2023-03-31', 0),
(2323, '431808', 'Y', '3', 56, '0', '130240.jpg', '0000-00-00', '2023-03-31', 0),
(2324, '431808', 'Y', '3', 57, '0', '538245.jpg', '0000-00-00', '2023-03-31', 0),
(2325, '431808', 'Y', '3', 58, '12.95', 'Avocado-rammelaar.jpeg', '0000-00-00', '2023-03-31', 0),
(2326, '431808', 'Y', '3', 59, '12.95', 'Avocado-rammelaar.jpeg', '0000-00-00', '2023-03-31', 0),
(2327, '431808', 'Y', '3', 60, '0', '191435.jpg', '0000-00-00', '2023-03-31', 0),
(2328, '431808', 'Y', '3', 61, '0', '83955.jpg', '0000-00-00', '2023-03-31', 0),
(2329, '431808', 'Y', '3', 62, '0', '757960.jpg', '0000-00-00', '2023-03-31', 0),
(2330, '431808', 'Y', '3', 63, '0', '341908.jpg', '0000-00-00', '2023-03-31', 0),
(2331, '431808', 'Y', '3', 64, '0', '632508.jpg', '0000-00-00', '2023-03-31', 0),
(2332, '431808', 'Y', '3', 65, '0', '415909.jpg', '0000-00-00', '2023-03-31', 0),
(2333, '431808', 'Y', '3', 66, '0', '195112.jpg', '0000-00-00', '2023-03-31', 0),
(2334, '431808', 'Y', '3', 67, '0', '625210.jpg', '0000-00-00', '2023-03-31', 0),
(2335, '431808', 'Y', '3', 69, '0', '893429.jpg', '0000-00-00', '2023-03-31', 0),
(2336, '431808', 'Y', '3', 70, '0', '159298.jpg', '0000-00-00', '2023-03-31', 0),
(2337, '431808', 'Y', '3', 71, '0', '588679.jpg', '0000-00-00', '2023-03-31', 0),
(2338, '431808', 'Y', '3', 72, '0', '386234.jpg', '0000-00-00', '2023-03-31', 0),
(2339, '431808', 'Y', '3', 73, '0', '894914.jpg', '0000-00-00', '2023-03-31', 0),
(2340, '431808', 'Y', '3', 74, '0', '227013.jpg', '0000-00-00', '2023-03-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_groups`
--

CREATE TABLE `product_groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `delivery_costs` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `banner` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_groups`
--

INSERT INTO `product_groups` (`id`, `title`, `brand`, `category`, `delivery_costs`, `description`, `banner`) VALUES
(431808, 'Avocado rammelaar', '43', '29', '1', 'Deze houten rammelaar in de vorm van een avocado is een absolute musthave voor alle hippe babyâ€™s. In de avocado zit een rammelkraal verwerkt, wat gegarandeerd voor uren speelplezier zorgt. De beukenhouten ring maakt het vasthouden van de rammelaar extra makkelijk en is daarnaast ook prima te gebruiken als bijtring. Ideaal om pijn bij doorkomende tandjes te verlichten. \r\n\r\nAfmeting houten ring: 5,5 cm\r\nAfmeting incl. avocado hanger: 16 cm.\r\nMateriaal avocado: 100% katoen. daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', 'http://www.kobyskreaties.nl/includes/images/advocado_rammerlaar_banner.jpg'),
(530102, 'Knuffeldoekje konijn', '41', '29', '1', 'Dit zachte knuffel konijntje zorgt gegarandeerd voor uren knuffel plezier voor je kleintje. Door het ongevuld buikje heeft het de vorm van een knuffeldoekje, maar het ontwerp is net even wat speelser! Dit lappenpopje is dan ook het ultieme vriendje voor in de box, in bed of onderweg in de wandelwagen of de buggy. \r\n\r\nHet konijntje is in verschillende kleuren te krijgen. Wil je graag een konijntje in een andere kleur hebben? Deze is in overleg aan te passen aan jouw eigen gewenste kleur. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', 'http://www.kobyskreaties.nl/includes/images/octopus_banner.jpg'),
(758036, 'Octopus knuffel', '41', '29', '1', 'Deze octopus knuffel is een favoriete musthave voor je kleintje. De tentakels van de octopus voelen voor de baby net zo aan als de navelstreng, dit zorgt voor een kalmerend effect en geeft een veilig gevoel. Dus heerlijk om aan te friemelen en mee te spelen. \r\n\r\nDe octopus is in verschillende kleuren te krijgen. Wil je graag een octopus in een andere kleur hebben? Deze is in overleg samen te stellen in jouw eigen gewenste kleuren. Heb je hier interesse in? Stuur me dan vrijblijvend een bericht. \r\n\r\nMateriaal: 100% katoen, daardoor goed (voorzichtig) op deÂ handÂ teÂ wassen.', 'http://www.kobyskreaties.nl/includes/images/konijn_banner.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `stars` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `title`) VALUES
(1, 'Heel klein'),
(2, 'Klein'),
(3, 'Normaal'),
(4, 'Heel groot');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_group_id` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_group_id`, `size`, `color`, `stock`) VALUES
(538, '182338', 1, 1, '2'),
(540, '218005', 3, 35, '1'),
(541, '218005', 3, 36, '1'),
(542, '218005', 3, 37, '1'),
(543, '218005', 3, 38, '1'),
(544, '218005', 3, 39, '0'),
(545, '218005', 3, 40, '0'),
(546, '218005', 3, 41, '0'),
(547, '218005', 3, 42, '0'),
(548, '218005', 3, 43, '0'),
(549, '218005', 3, 44, '0'),
(550, '218005', 3, 45, '0'),
(551, '218005', 3, 46, '0'),
(552, '218005', 3, 47, '0'),
(553, '218005', 3, 48, '0'),
(554, '218005', 3, 49, '0'),
(555, '218005', 3, 50, '0'),
(556, '218005', 3, 51, '0'),
(557, '218005', 3, 52, '0'),
(558, '218005', 3, 53, '0'),
(559, '218005', 3, 54, '0'),
(560, '218005', 3, 55, '0'),
(561, '218005', 3, 56, '0'),
(562, '218005', 3, 57, '0'),
(563, '218005', 3, 58, '0'),
(564, '218005', 3, 59, '0'),
(565, '218005', 3, 60, '0'),
(566, '218005', 3, 61, '0'),
(567, '218005', 3, 62, '0'),
(568, '218005', 3, 63, '0'),
(569, '218005', 3, 64, '0'),
(570, '218005', 3, 65, '0'),
(571, '218005', 3, 66, '0'),
(572, '218005', 3, 67, '0'),
(573, '218005', 3, 69, '0'),
(574, '218005', 3, 70, '0'),
(575, '218005', 3, 71, '0'),
(576, '218005', 3, 72, '0'),
(577, '218005', 3, 73, '0'),
(578, '218005', 3, 74, '0'),
(580, '530102', 3, 35, '0'),
(581, '530102', 3, 36, '0'),
(582, '530102', 3, 37, '0'),
(583, '530102', 3, 38, '0'),
(584, '530102', 3, 39, '2'),
(585, '530102', 3, 40, '0'),
(586, '530102', 3, 41, '0'),
(587, '530102', 3, 42, '0'),
(588, '530102', 3, 43, '0'),
(589, '530102', 3, 44, '0'),
(590, '530102', 3, 45, '0'),
(591, '530102', 3, 46, '0'),
(592, '530102', 3, 47, '1'),
(593, '530102', 3, 48, '0'),
(594, '530102', 3, 49, '0'),
(595, '530102', 3, 50, '0'),
(596, '530102', 3, 51, '0'),
(597, '530102', 3, 52, '0'),
(598, '530102', 3, 53, '0'),
(599, '530102', 3, 54, '0'),
(600, '530102', 3, 55, '0'),
(601, '530102', 3, 56, '0'),
(602, '530102', 3, 57, '0'),
(603, '530102', 3, 58, '0'),
(604, '530102', 3, 59, '0'),
(605, '530102', 3, 60, '0'),
(606, '530102', 3, 61, '0'),
(607, '530102', 3, 62, '1'),
(608, '530102', 3, 63, '0'),
(609, '530102', 3, 64, '0'),
(610, '530102', 3, 65, '0'),
(611, '530102', 3, 66, '0'),
(612, '530102', 3, 67, '1'),
(613, '530102', 3, 69, '0'),
(614, '530102', 3, 70, '0'),
(615, '530102', 3, 71, '0'),
(616, '530102', 3, 72, '0'),
(617, '530102', 3, 73, '0'),
(618, '530102', 3, 74, '0'),
(619, '758036', 3, 35, '0'),
(620, '758036', 3, 36, '1'),
(621, '758036', 3, 37, '0'),
(622, '758036', 3, 38, '0'),
(623, '758036', 3, 39, '0'),
(624, '758036', 3, 40, '0'),
(625, '758036', 3, 41, '0'),
(626, '758036', 3, 42, '0'),
(627, '758036', 3, 43, '0'),
(628, '758036', 3, 44, '0'),
(629, '758036', 3, 45, '0'),
(630, '758036', 3, 46, '0'),
(631, '758036', 3, 47, '1'),
(632, '758036', 3, 48, '1'),
(633, '758036', 3, 49, '0'),
(634, '758036', 3, 50, '0'),
(635, '758036', 3, 51, '0'),
(636, '758036', 3, 52, '0'),
(637, '758036', 3, 53, '0'),
(638, '758036', 3, 54, '0'),
(639, '758036', 3, 55, '0'),
(640, '758036', 3, 56, '1'),
(641, '758036', 3, 57, '0'),
(642, '758036', 3, 58, '0'),
(643, '758036', 3, 59, '0'),
(644, '758036', 3, 60, '0'),
(645, '758036', 3, 61, '0'),
(646, '758036', 3, 62, '1'),
(647, '758036', 3, 63, '0'),
(648, '758036', 3, 64, '0'),
(649, '758036', 3, 65, '0'),
(650, '758036', 3, 66, '0'),
(651, '758036', 3, 67, '0'),
(652, '758036', 3, 69, '0'),
(653, '758036', 3, 70, '0'),
(654, '758036', 3, 71, '0'),
(655, '758036', 3, 72, '0'),
(656, '758036', 3, 73, '0'),
(657, '758036', 3, 74, '0'),
(658, '431808', 3, 35, '0'),
(659, '431808', 3, 36, '0'),
(660, '431808', 3, 37, '0'),
(661, '431808', 3, 38, '0'),
(662, '431808', 3, 39, '0'),
(663, '431808', 3, 40, '0'),
(664, '431808', 3, 41, '0'),
(665, '431808', 3, 42, '0'),
(666, '431808', 3, 43, '0'),
(667, '431808', 3, 44, '0'),
(668, '431808', 3, 45, '0'),
(669, '431808', 3, 46, '0'),
(670, '431808', 3, 47, '0'),
(671, '431808', 3, 48, '0'),
(672, '431808', 3, 49, '0'),
(673, '431808', 3, 50, '0'),
(674, '431808', 3, 51, '0'),
(675, '431808', 3, 52, '0'),
(676, '431808', 3, 53, '0'),
(677, '431808', 3, 54, '0'),
(678, '431808', 3, 55, '0'),
(679, '431808', 3, 56, '0'),
(680, '431808', 3, 57, '0'),
(681, '431808', 3, 58, '2'),
(682, '431808', 3, 59, '2'),
(683, '431808', 3, 60, '0'),
(684, '431808', 3, 61, '0'),
(685, '431808', 3, 62, '0'),
(686, '431808', 3, 63, '0'),
(687, '431808', 3, 64, '0'),
(688, '431808', 3, 65, '0'),
(689, '431808', 3, 66, '0'),
(690, '431808', 3, 67, '0'),
(691, '431808', 3, 69, '0'),
(692, '431808', 3, 70, '0'),
(693, '431808', 3, 71, '0'),
(694, '431808', 3, 72, '0'),
(695, '431808', 3, 73, '0'),
(696, '431808', 3, 74, '0');

-- --------------------------------------------------------

--
-- Table structure for table `stock_logs`
--

CREATE TABLE `stock_logs` (
  `id` int(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `old_stock` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_logs`
--

INSERT INTO `stock_logs` (`id`, `product_id`, `stock`, `old_stock`, `date`) VALUES
(68, '2228', '2', '1', '2023-04-03 19:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `status`, `priority`, `title`, `created_at`, `description`) VALUES
(2, 'open', 'important', 'Problemen met mijn website', '2022-09-20', 'Ja dit is een test bericht die best lang is en bla bla bla ik verzien hier wel iets leuks bij');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(1) NOT NULL DEFAULT 'C',
  `account_created` date NOT NULL,
  `last_online` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `account_created`, `last_online`) VALUES
(1, 'Jelte', 'Cost', 'info@kobyskreaties.nl', 'Kaas123', 'A', '0000-00-00', '2022-10-14 00:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `darkmode` varchar(1) NOT NULL DEFAULT 'N',
  `console_log` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`id`, `user_id`, `darkmode`, `console_log`) VALUES
(1, '1', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `visit_log`
--

CREATE TABLE `visit_log` (
  `id` int(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `description`, `image`, `timestamp`) VALUES
(20, 'Homepage Hoofd titel', 'This is an excellent headline and it might go two lines long.', 'images/widgets/84706', '2022-12-06'),
(21, 'Homepage Hoofd beschrijving', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, \r\nsed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'images/widgets/17898', '2022-12-06'),
(22, 'This is an excellent headline and it might go two lines long.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, \r\nsed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, \r\nsed do eiusmod tempor.', 'images/widgets/14672about.png', '2022-12-06'),
(23, 'This is an excellent headline ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, ed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, \r\nsed do eiusmod tempor. \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, ed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet', 'images/widgets/64608all-colors.png', '2022-12-06'),
(24, 'Hear it from our customers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut', 'images/widgets/51095', '2022-12-06'),
(25, 'Join Our News Letters', 'Leverage agile frameworks to provide a robust synopsis for high level \r\noverviews. Iterative approaches to corporate strategy foster ', 'images/widgets/89499', '2022-12-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm`
--
ALTER TABLE `crm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverys`
--
ALTER TABLE `deliverys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_costs`
--
ALTER TABLE `delivery_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_logs`
--
ALTER TABLE `stock_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_log`
--
ALTER TABLE `visit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crm`
--
ALTER TABLE `crm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `deliverys`
--
ALTER TABLE `deliverys`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_costs`
--
ALTER TABLE `delivery_costs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12412809;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53287603;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2341;

--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=999096;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=697;

--
-- AUTO_INCREMENT for table `stock_logs`
--
ALTER TABLE `stock_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visit_log`
--
ALTER TABLE `visit_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
