-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2020 às 15:21
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u558134221_esterilavos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `codigo` int(11) DEFAULT NULL,
  `arquivo` varchar(40) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` int(100) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Endereco` varchar(100) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `Uf` varchar(100) NOT NULL,
  `Solicitante` varchar(100) NOT NULL,
  `Setor` varchar(100) NOT NULL,
  `Desativado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `Nome`, `Endereco`, `Cidade`, `Uf`, `Solicitante`, `Setor`, `Desativado`) VALUES
(4, 'Elisa Débora Andrea Vieira', 'Rua Jonatas Batista', 'Teresina', 'PI', 'Elisa Débora Andrea Vieira', 'Hospitalar', b'0'),
(5, 'Caleb Otávio da Luz', 'Rua Pastor Euclides Arlindo', 'Aracaju', 'SE', 'Caleb Otávio da Luz', 'Hospitalar', b'0'),
(6, 'Márcio Ruan Luan Campos', 'Rua Bela Vista', 'Dourados', 'MS', 'Márcio Ruan Luan Campos', 'Hospitalar', b'0'),
(7, 'Márcio Ruan Luan Campos', 'Rua Bela Vista', 'Dourados', 'MS', 'Márcio Ruan Luan Campos', 'Hospitalar', b'0'),
(8, 'Brock', 'Ap #398-7913 Consequat Rd.', 'Les Bulles', 'Faroe Islands', 'Dana', 'Botswana', b'0'),
(9, 'Dale', 'P.O. Box 338, 920 Odio, St.', 'Hallein', 'Micronesia', 'Chelsea', 'Switzerland', b'0'),
(10, 'Kennan', '7577 Consectetuer Avenue', 'Pozantı', 'Philippines', 'Lavinia', 'Bulgaria', b'0'),
(11, 'Uriel', 'Ap #496-9082 Non, Ave', 'Bruderheim', 'Norfolk Island', 'Miriam', 'South Africa', b'0'),
(12, 'Michael', '233-5444 Ante. Road', 'Kearney', 'Panama', 'Mercedes', 'Grenada', b'0'),
(13, 'Ethan', 'P.O. Box 869, 8461 Leo. Road', 'Mumbai', 'El Salvador', 'Elaine', 'Guernsey', b'0'),
(14, 'Cole', '595-8260 Risus. St.', 'Westlock', 'Venezuela', 'Denise', 'Ecuador', b'0'),
(15, 'Yasir', 'Ap #384-1120 Non, St.', 'Diyarbakır', 'Burundi', 'Xaviera', 'Bosnia and Herzegovina', b'0'),
(16, 'Maxwell', '8583 Pellentesque Av.', 'HavrŽ', 'Korea, South', 'Heidi', 'Venezuela', b'0'),
(17, 'Hakeem', 'Ap #573-1683 A St.', 'Aklavik', 'Equatorial Guinea', 'Beatrice', 'Belgium', b'0'),
(18, 'Cairo', 'P.O. Box 514, 4575 Imperdiet Rd.', 'Flamierge', 'Guyana', 'Rebecca', 'Togo', b'0'),
(19, 'Duncan', '8920 Erat Road', 'Buti', 'Spain', 'Cheryl', 'Viet Nam', b'0'),
(20, 'Linus', '732-4034 Lobortis Av.', 'Wekweti', 'France', 'Lisandra', 'Kiribati', b'0'),
(21, 'Drake', '704-4631 Nulla Avenue', 'Hollabrunn', 'Ecuador', 'Jane', 'Guatemala', b'0'),
(22, 'joao', '1949 Phasellus Av.', 'Casanova Elvo', 'Vanuatu', 'Leigh', 'Samoa', b'0'),
(24, 'Rooney', 'P.O. Box 408, 7478 Tristique Street', 'Antibes', 'Nigeria', 'Angelica', 'Togo', b'0'),
(25, 'Jarrod', '774-1922 Mauris Street', 'Plancenoit', 'Algeria', 'Eden', 'Lebanon', b'0'),
(26, 'Cameron', '6130 Eu St.', 'Nässjö', 'Jamaica', 'Haviva', 'Central African Republic', b'0'),
(27, 'Sebastian', '4697 Curabitur St.', 'Wakefield', 'Åland Islands', 'Daryl', 'Mauritania', b'0'),
(28, 'Lamar', '9596 Eu, Rd.', 'Bekegem', 'Mayotte', 'Cherokee', 'Viet Nam', b'0'),
(31, 'Rogan', 'P.O. Box 234, 6389 Convallis Road', 'Greymouth', 'Iceland', 'Anne', 'Laos', b'0'),
(32, 'Simon', '443-3294 Amet Rd.', 'Southaven', 'Uzbekistan', 'Shelley', 'Australia', b'0'),
(33, 'Daquan', '7889 Ac Rd.', 'Hines Creek', 'Mali', 'Regan', 'Bolivia', b'0'),
(34, 'Derek', 'P.O. Box 980, 974 Aenean Rd.', 'St. Clears', 'France', 'Regan', 'Holy See (Vatican City State)', b'0'),
(35, 'Daquan', 'Ap #584-4135 Magna. Street', 'Merritt', 'Myanmar', 'Rhiannon', 'Montenegro', b'0'),
(36, 'Zeus', '980-5388 Donec Street', 'Joliet', 'Mongolia', 'Miriam', 'French Polynesia', b'0'),
(37, 'Charles', '362 Sodales Road', 'Medan', 'France', 'Desiree', 'Finland', b'0'),
(38, 'Abraham', 'Ap #668-141 Volutpat Street', 'Batiscan', 'Vanuatu', 'Debra', 'Jersey', b'0'),
(39, 'Jackson', 'Ap #208-1732 Odio. St.', 'Inuvik', 'New Caledonia', 'Chiquita', 'Honduras', b'0'),
(40, 'Malcolm', 'Ap #665-5048 Turpis. Av.', 'Salice Salentino', 'Chile', 'Illana', 'South Sudan', b'0'),
(41, 'Alec', 'P.O. Box 506, 7910 A Ave', 'Weelde', 'Guam', 'Lysandra', 'Maldives', b'0'),
(42, 'Jack', 'Ap #944-9995 Rhoncus. Ave', 'Malartic', 'Belarus', 'Freya', 'Tonga', b'0'),
(43, 'Acton', 'Ap #679-6248 Natoque St.', 'Strasbourg', 'Uzbekistan', 'Gretchen', 'Cambodia', b'0'),
(44, 'Leo', 'Ap #643-4190 Sociis St.', 'Omaha', 'Marshall Islands', 'Melanie', 'Congo, the Democratic Republic of the', b'0'),
(45, 'Russell', '458-4756 Suspendisse Avenue', 'Schwerin', 'Romania', 'Pamela', 'Madagascar', b'0'),
(46, 'Marshall', 'Ap #426-4057 Lectus Road', 'Pavone del Mella', 'Seychelles', 'Sylvia', 'Mauritania', b'0'),
(47, 'Octavius', '883-2160 Cursus Rd.', 'La Salle', 'Cambodia', 'Galena', 'French Guiana', b'0'),
(48, 'Hilel', '5180 Lacus. St.', 'Quispamsis', 'Sierra Leone', 'Dorothy', 'Ecuador', b'0'),
(49, 'Patrick', 'P.O. Box 111, 7236 Adipiscing Av.', 'Paju', 'Hungary', 'Alisa', 'Nigeria', b'0'),
(50, 'Brian', '8867 Neque Rd.', 'Fishguard', 'Uganda', 'Zoe', 'Palestine, State of', b'0'),
(51, 'Kennan', '7495 Egestas Av.', 'Gangneung', 'Hong Kong', 'Pearl', 'Sint Maarten', b'0'),
(52, 'Joel', 'Ap #613-1943 Nonummy Rd.', 'Sulzbach', 'Angola', 'Marcia', 'Bahamas', b'0'),
(53, 'Lev', 'Ap #162-3441 Iaculis St.', 'Champorcher', 'Albania', 'Rae', 'Botswana', b'0'),
(54, 'Lucius', '7769 Nec Road', 'Kupang', 'Azerbaijan', 'Azalia', 'South Georgia and The South Sandwich Islands', b'0'),
(55, 'Vaughan', 'P.O. Box 343, 9569 Nulla. Road', 'Grandrieu', 'Bermuda', 'Zoe', 'South Georgia and The South Sandwich Islands', b'0'),
(56, 'Joseph', '409-8464 Nec Avenue', 'Baricella', 'Isle of Man', 'Kay', 'Viet Nam', b'0'),
(57, 'Lucas', '225-7525 Odio. St.', 'Kincardine', 'Thailand', 'Uta', 'Tonga', b'0'),
(58, 'Akeem', 'Ap #814-5290 Odio Rd.', 'Santo Domingo', 'Somalia', 'Noelani', 'Bouvet Island', b'0'),
(59, 'Thor', 'Ap #411-9603 Adipiscing St.', 'Emines', 'Botswana', 'Lila', 'Peru', b'0'),
(60, 'Oliver', '527-7215 Vel St.', 'Värnamo', 'Liberia', 'Noelle', 'Taiwan', b'0'),
(61, 'Russell', 'P.O. Box 121, 2609 Nunc Rd.', 'Oostkerke', 'Switzerland', 'Kitra', 'Martinique', b'0'),
(62, 'Gareth', 'P.O. Box 679, 743 Suspendisse Avenue', 'Mahbubnagar', 'Tonga', 'Adele', 'Bahrain', b'0'),
(63, 'Moses', '2902 Erat. Av.', 'Harderwijk', 'Yemen', 'Isabella', 'Gibraltar', b'0'),
(64, 'Richard', '703-550 Purus Ave', 'Richmond', 'Andorra', 'Adria', 'Samoa', b'0'),
(65, 'Melvin', '267-2163 Sollicitudin Road', 'Kaaskerke', 'Marshall Islands', 'Rhona', 'Cape Verde', b'0'),
(66, 'Malik', 'Ap #592-8610 Massa. St.', 'Dornoch', 'Mauritania', 'Zelda', 'Russian Federation', b'0'),
(67, 'Blake', '4973 Magna. St.', 'Bionaz', 'Guadeloupe', 'April', 'Papua New Guinea', b'0'),
(68, 'Howard', '756-5597 Metus. Road', 'Dawson Creek', 'Thailand', 'Jillian', 'Lithuania', b'0'),
(69, 'Kasimir', '3966 Et, Ave', 'Mores', 'Paraguay', 'Kylynn', 'Montserrat', b'0'),
(70, 'Bruno', '7976 Semper, Rd.', 'Herne', 'Uruguay', 'Ocean', 'Fiji', b'0'),
(71, 'Malachi', '8093 Felis. Rd.', 'Houtain-le-Val', 'Barbados', 'Ima', 'Spain', b'0'),
(72, 'Lars', '3069 In St.', 'Beringen', 'Chile', 'Chiquita', 'Mauritius', b'0'),
(73, 'Hayden', 'P.O. Box 725, 7924 Vehicula Ave', 'Stockerau', 'New Zealand', 'Ria', 'Somalia', b'0'),
(74, 'Neville', '587-6449 Erat. Ave', 'Saint-Lô', 'Greece', 'Jena', 'Nauru', b'0'),
(75, 'Dolan', '6365 Neque. Avenue', 'Grado', 'United Arab Emirates', 'Hyacinth', 'French Southern Territories', b'0'),
(76, 'Noah', '4471 Diam. St.', 'Gougnies', 'Western Sahara', 'Macy', 'Liechtenstein', b'0'),
(77, 'Jared', 'P.O. Box 260, 6756 Quisque St.', 'Villa Alemana', 'American Samoa', 'Francesca', 'Morocco', b'0'),
(78, 'Patrick', '7376 Orci. Street', 'Tiruvarur', 'Holy See (Vatican City State)', 'Anika', 'Cuba', b'0'),
(79, 'Chaim', 'P.O. Box 295, 6315 Commodo Rd.', 'Cuceglio', 'Russian Federation', 'Kendall', 'Chile', b'0'),
(80, 'Kareem', 'P.O. Box 291, 4655 Duis Rd.', 'Chapecó', 'Nigeria', 'Charissa', 'Tokelau', b'0'),
(81, 'Herrod', 'Ap #524-411 In Avenue', 'Ruddervoorde', 'Jersey', 'Courtney', 'Czech Republic', b'0'),
(82, 'Nero', '1033 Pretium Rd.', 'Recoleta', 'Isle of Man', 'Kirby', 'Finland', b'0'),
(83, 'Lucian', '470-5519 In St.', 'Challand-Saint-Victor', 'South Africa', 'Nita', 'Moldova', b'0'),
(84, 'Cade', '575-6360 Accumsan Avenue', 'Pepingen', 'Mayotte', 'Rebekah', 'Chad', b'0'),
(85, 'Magee', '7277 Aliquet Rd.', 'Cap-Saint-Ignace', 'Antigua and Barbuda', 'Quon', 'Mozambique', b'0'),
(86, 'Jacob', 'P.O. Box 827, 9675 Augue Road', 'Shrewsbury', 'Bahrain', 'Kerry', 'Peru', b'0'),
(87, 'Raymond', '7281 Duis Rd.', 'Klosterneuburg', 'Cocos (Keeling) Islands', 'Gretchen', 'Trinidad and Tobago', b'0'),
(88, 'Shad', 'P.O. Box 285, 7047 Nulla. St.', 'Alexeyevka', 'Syria', 'Rosalyn', 'Swaziland', b'0'),
(89, 'Abdul', 'Ap #709-8050 Consectetuer St.', 'Curon Venosta/Graun im Vinschgau', 'Japan', 'Lenore', 'Palau', b'0'),
(90, 'Jermaine', 'P.O. Box 626, 794 Nisi St.', 'Quispamsis', 'Cyprus', 'Angela', 'Sweden', b'0'),
(91, 'Alfonso', '6977 Id, Rd.', 'Gravelbourg', 'Timor-Leste', 'Indira', 'Nigeria', b'0'),
(92, 'Elton', 'P.O. Box 211, 6900 Ac, Street', 'Avin', 'Micronesia', 'Kirsten', 'Monaco', b'0'),
(93, 'Finn', '762-473 Phasellus Rd.', 'Pontey', 'Greece', 'Rebekah', 'Solomon Islands', b'0'),
(94, 'Elijah', 'P.O. Box 748, 3681 Sit Rd.', 'Pointe-au-Pic', 'Svalbard and Jan Mayen Islands', 'Alexandra', 'Tajikistan', b'0'),
(95, 'Ryder', 'Ap #782-3987 Ante Av.', 'Torreón', 'Taiwan', 'Charity', 'Brunei', b'0'),
(96, 'Marvin', '1828 Ullamcorper, Rd.', 'Casperia', 'Cambodia', 'Karly', 'China', b'0'),
(97, 'Burke', '1694 Aliquet Ave', 'Termini Imerese', 'Kazakhstan', 'Sandra', 'Sint Maarten', b'0'),
(98, 'Hiram', '2017 Magna St.', 'Nizamabad', 'Macao', 'Rebecca', 'Turks and Caicos Islands', b'0'),
(99, 'Reed', '4179 Nec Rd.', 'Grimaldi', 'Guinea-Bissau', 'Amber', 'Syria', b'0'),
(100, 'Davis', 'Ap #389-3994 Dapibus Street', 'Macerata', 'Saint Lucia', 'Dorothy', 'Tanzania', b'0'),
(101, 'Amal', 'Ap #412-309 Sem Av.', 'Glovertown', 'Luxembourg', 'Leandra', 'Guernsey', b'0'),
(102, 'Igor', 'Ap #795-3908 Aliquam St.', 'Brixton', 'Oman', 'Hillary', 'Saint Barthélemy', b'0'),
(103, 'Lucian', 'P.O. Box 945, 8554 Nam St.', 'Aylesbury', 'Cocos (Keeling) Islands', 'Fiona', 'Australia', b'0'),
(104, 'Malcolm', 'Ap #441-621 Integer St.', 'Girona', 'Netherlands', 'Beatrice', 'Wallis and Futuna', b'0'),
(105, 'Todd', 'Ap #640-2707 Sed St.', 'Bossuit', 'Yemen', 'Aubrey', 'Kazakhstan', b'0'),
(108, 'testes', 's', 'ss', '', 's', 's', b'0'),
(109, 'joão vitor de souza diroteldes', 'dsafasdf', 'A', 't13', 'A', 'a', b'0'),
(110, 'a', 'a', 'aa', 't01', 'a', 'a', b'0'),
(111, 'Lucas', '121312', 'Jales', 'SP', 'João', '4', b'0'),
(112, 'joao diroteldes', 'fasdfas', 'asdfsad', 'DF', 'dfasdf', 'dsfsdfasdfasd', b'0'),
(113, 'Marcos Ricardo Diroteldes ', 'fasdfas', 'asdfsad', 'AC', 'dfasdf', 'dsfsdfasdfasd', b'0'),
(114, 'Marcos Ricardo Diroteldes ', 'ss', 'asdfsad', 'CE', 'dfasdf', 'dsfsdfasdfasd', b'0'),
(115, 'Marcos Ricardo Diroteldes ', 'fasdfas', 'asdfsad', 'CE', 'dfasdf', 'dsfsdfasdfasd', b'0'),
(116, 'Marcus vinicius de souza diroteldes', 'asdfas', 'Jales', 'TO', 'dfasdf', 'asdfasdfsdfasd', b'0'),
(117, 'Teste', 'teste', 'São Paulo', 'SP', 'Teste', 'Eng Clínica', b'0'),
(118, 'carlos', 'centro', 'votu', 'SP', 'teste', 'teste', b'0'),
(119, 'hospital santa casa', 'asdsad', 'aasdasda', 'AC', 'asdasda', 'adsasdadsasd', b'0'),
(120, 'cliente teste', 'rua teste', 'Fortaleza', 'CE', 'gleidson', 'setor teste', b'0'),
(121, 'teste1', 'centro', 'botu', 'GO', 'teste1', '', b'1'),
(122, 'hospital santa casa2', 'centro', 'votu', 'AC', 'teste', '', b'1'),
(123, 'hospital santa casa4', 'centro', 'votu', 'AC', 'teste', '', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `img`
--

CREATE TABLE `img` (
  `idimg` int(50) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_code` varchar(250) NOT NULL,
  `item_description` text NOT NULL,
  `item_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `idOS` int(11) NOT NULL,
  `id_OsCliente` int(100) NOT NULL,
  `AutoCN` varchar(100) NOT NULL,
  `AutoCS` varchar(50) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `AnoFabrica` varchar(50) NOT NULL,
  `NPART` varchar(50) NOT NULL,
  `Obs` text NOT NULL,
  `Status` varchar(50) NOT NULL,
  `DATA` date NOT NULL DEFAULT current_timestamp(),
  `img` varchar(40) NOT NULL,
  `ANO` varchar(20) NOT NULL,
  `MES` varchar(20) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`idOS`, `id_OsCliente`, `AutoCN`, `AutoCS`, `Modelo`, `AnoFabrica`, `NPART`, `Obs`, `Status`, `DATA`, `img`, `ANO`, `MES`, `tipo`) VALUES
(1, 108, 's', 'ss', 's', 's', 's', 's', 'Reprovadas', '2020-08-21', 'b119f8313291fc4e0d0fdcc76796f018', '2020', '01', 't01'),
(2, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', 'a7b439d253c66e90bd6570f35a1dfbcd', '2020', '02', 't02'),
(3, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '2b97ecd0ea1656a08deedc737f44d67b', '2020', '02', 't03'),
(4, 108, 'a', 'a', 'a', 'a', 'a', 'a', 'Reprovadas', '2020-08-21', '9917e2d42b1b70c0bf40d80619714467', '2020', '03', 't03'),
(5, 108, 'az', 'a', 'a', 'a', 'a', 'a', 'Aprovado', '2020-08-21', '693364ac3dbd05236f647aad429d167a', '2020', '03', 't02'),
(6, 108, 's', 'qs', 's', 's', 's', 's', 'Aprovado', '2020-08-21', 'a102c00a2d822f9a63a22ff19a34d87a', '2020', '03', 't01'),
(7, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '7832bae00c2c5c06ea886a3cd844f8ee', '2020', '04', 't01'),
(8, 108, 'a', 'a', 'a', 'a', 'aa', 'a', 'Reprovadas', '2020-08-21', '64361fa7f396cc4fcfed23f1cd9173dd', '2020', '04', 't01'),
(9, 108, 'a', 'a', 'a', 'a', 'a', 'a', 'Aprovado', '2020-08-21', 'bdf92a2ebaece5c64a014d75ff3de5ab', '2020', '04', 't03'),
(10, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', 'b183bac6c3808d9e66a4cb2d9d11da27', '2020', '04', 't03'),
(11, 108, 'a', 'a', 'a', 'a', 'a', 'a', 'Aprovado', '2020-08-21', 'dacd24d4c0c13ea145aa651efaca0f65', '2020', '05', 't01'),
(12, 108, 'a', 'a', 'a', 'a', 'a', 'a', 'Aprovado', '2020-08-21', '12aaa7f5005785ac2dc298d007eb5a02', '2020', '05', 't01'),
(13, 108, 'a', 'a', 'aa', 'a', 'a', 'a', 'Aprovado', '2020-08-21', '9632fec2c122e84e8cf3ec15fe3f05aa', '2020', '05', 't01'),
(14, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '52035fa6e5559a46cb1a4b79a177c409', '2020', '05', 't01'),
(15, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '9625ab5f06651fe4f210bab4c3870d1a', '2020', '05', 't01'),
(16, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', 'fe3d014d7452c0a0c8856ea873b92716', '2020', '06', 't02'),
(17, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '62a0149bca5063d2b628780db102d74b', '2020', '06', 't01'),
(18, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '0e48bf98bba192ef9d9cf89ff73a5195', '2020', '06', 't01'),
(19, 108, 'a', 'a', 'a', 'a', 'a', 'a', 'Aprovado', '2020-08-21', '44a959de191048376fbb7580a69b084a', '2020', '06', 't01'),
(20, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '152f28fb229e2ec782b944b097586f0d', '2020', '06', 't01'),
(21, 108, 'a', 'a', 'aa', 'a', 'a', 'a', 'Aprovado', '2020-08-21', '2c9632fb63dcb5a617e2e878d589e415', '2020', '06', 't01'),
(22, 108, 's', 's', 's', 's', 's', 's', 'Reprovadas', '2020-08-21', '0ace0ffeb7a7fe8903fbb8f8ea5c1efe', '2020', '07', 't01'),
(23, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '6b479a10c055bed6b01bb34886422742', '2020', '07', 't01'),
(24, 108, 's', 's', 's', 's', 's', 's', 'Aprovado', '2020-08-21', '2d4cab02d53479b95cafe2463167f6f3', '2020', '07', 't01'),
(25, 108, 's', 'ws', 's', 's', 's', 's', 'Em Analise', '2020-08-21', 'fb97d000282fecd5f0263b141c76f6f1', '2020', '07', 't01'),
(26, 108, 'ss', 's', 's', 's', 's', 'ss', 'Em Analise', '2020-08-21', 'd89df953a25a44842babadd1df94f8e8', '2020', '07', 't03'),
(27, 108, 'waesdw', 'qdqwd', 'qwd', 'qwd', 'qwd', 'qwd', 'Em Analise', '2020-08-21', '6f5163b94d2a59ecd4beabe90090b6c4', '2020', '07', 't01'),
(28, 108, 'ws', 'qwesq', 'wdq', 'wd', 'qwd', 'qwdqwd', 'Em Analise', '2020-08-21', '8f20c98c3c8b31e08bbe2865ee9fd707', '2020', '07', 't01'),
(29, 108, '03s', 's', 's', 's', 's', 's', 'Em Analise', '2020-08-21', 'd0397b4f5234001fa7324d8573a96a7b', '2020', '08', 't02'),
(30, 108, 'ass', 's', 's', 's', 's', 's', 'Em Analise', '2020-08-21', 'bfcdc7c11051d9972c70f3f20c4af040', '2020', '08', 't02'),
(31, 108, 'dd', 'd', 'd', 'd', 'd', 'd', 'Em Analise', '2020-08-21', '53c91304a597a568501a2182e387470a', '2020', '08', 't02'),
(32, 108, 'wedq', 'wdq', 'd', 'qwd', 'qwd', 'qwdq', 'Em Analise', '2020-08-21', '5c9ebe1cdd2cda768f815dc4f49d9996', '2020', '08', 't02'),
(33, 108, 'as', 'a', 'a', 'a', 'a', 'a', 'Em Analise', '2020-08-21', 'cffb40b320bae0b99a4ac8b5b542db3f', '2020', '08', 't02'),
(34, 108, 's', 's', 's', 'ss', 's', 's', 'Em Analise', '2020-08-21', 'f7a18f30c45b7d1278caaf82bcc4d178', '2020', '08', 't02'),
(35, 108, 's', 'qs', 'ss', 's', 's', 's', 'Em Analise', '2020-08-21', 'f1522955c5c8c968775305b0325d3af2', '2020', '08', 't03'),
(36, 108, 's', 's', 'ss', 's', 's', 's', 'Em Analise', '2020-08-21', '7ce0f3cae394545dcdf64cafe7ae96c7', '2020', '08', 't02'),
(37, 108, 's', 's', 's', 's', 's', 's', 'Em Analise', '2020-08-22', '02baa50e8888499b7c9110528dbb081e', '2020', '08', 't02'),
(38, 108, 's', 's', 's', 's', 's', 's', 'Em Analise', '2020-08-22', '02baa50e8888499b7c9110528dbb081e', '2020', '08', 't02'),
(39, 108, 'qs', 's', 's', 's', 's', 's', 'Em Analise', '2020-08-22', '76852b730ed047ea76898a0b433f8bb1', '2020', '12', 't01'),
(40, 108, 's', 's', 's', 's', 's', 's', 'Em Analise', '2020-08-22', 'bc014ee65de14631bde732746d3e60af', '2020', '02', 't01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `peca`
--

CREATE TABLE `peca` (
  `id_peca` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumeroS` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tamanho` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cor` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Marca` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_setor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `peca`
--

INSERT INTO `peca` (`id_peca`, `Nome`, `NumeroS`, `Tamanho`, `Cor`, `Marca`, `Tipo`, `fk_setor`) VALUES
(10, 'd', 'qd', 'qwd', 'qwdq', 'wqwdqwd', 'qw', 1),
(11, 'RODA', 'ASD', 'QDSQ', 'WDQ', 'WDQ', 'WQWDD', 1),
(12, 'PENEU', 'SD', 'QWDQWDQWDQ', 'WD', 'QWDQWDQWD', 'QWDDDD', 1),
(13, 'peça', '123213', 'p', 'green', 'marca', 'diferente', 1),
(14, 'joão', '18', '2nm', 'verde', 'alguma', 'tipo', 1),
(15, 'cambio', '123123123', '12', 'branco', 'chevrolet', 'peça', 1),
(16, 'teste', '123', '123', 'branco', 'chevrolet', 'peça', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pecac`
--

CREATE TABLE `pecac` (
  `id` int(11) NOT NULL,
  `Nome` varchar(52) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtd` varchar(52) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(52) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pecac`
--

INSERT INTO `pecac` (`id`, `Nome`, `qtd`, `order_id`) VALUES
(1, 'gdfgds', '445', '54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `id_setor` int(11) NOT NULL,
  `nomeSetor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id_setor`, `nomeSetor`) VALUES
(1, 'CME'),
(3, 'LABORATÓRIO'),
(2, 'LACTÁRIO'),
(4, 'OUTROS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `order_items_id` int(11) NOT NULL,
  `order_id` varchar(150) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit_name`) VALUES
(1, 'Bags'),
(2, 'Bottles'),
(3, 'Box'),
(4, 'Dozens'),
(5, 'Feet'),
(6, 'Gallon'),
(7, 'Grams'),
(8, 'Inch'),
(9, 'Kg'),
(10, 'Liters'),
(11, 'Meter'),
(12, 'Nos'),
(13, 'Packet'),
(14, 'Rolls');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `id` int(100) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `Senha` varchar(40) NOT NULL,
  `Telefone` varchar(100) NOT NULL,
  `Endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tecnico`
--

INSERT INTO `tecnico` (`id`, `Nome`, `email`, `Senha`, `Telefone`, `Endereco`) VALUES
(10, 'a', 'a', 'a', '(43242423432', 'a'),
(11, 'a', 'a', 'a', '(', 'a'),
(12, 'a', 'a', 'a', '(', 'a'),
(13, 'a', 'a', 'a', '(', 'a'),
(14, 'a', 'a', 'a', '(', 'a'),
(15, 'ss', 'ss', 's', '(23) 12312-3', 'ss');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', 'cesar@celke.com.br', '$2y$10$d8Hpwwj/DENEW4sBuUDvUuCw4/2QgEoWvs8YlAXASltHqw5w7vKDm'),
(2, 'Kelly', 'kelly@celke.com.br', 'kelly@celke.com.br', '$2y$10$vbRUBxSLOCK00HsOd4Djxu.6I8JWzqMkhR2UwdMiCKvvB3lq/yD1u'),
(3, 'Jessica', 'jessica@celke.com.br', 'jessica@celke.com.br', '$2y$10$3QR5vemGVmxMXNh68/XdHumXRSpK6UXdl7yK9dmqLfh4QSw.lKMPy'),
(5, 'asdfs', 'qsq', 'wdwqdq', '$2y$10$v8qV3KTcNBZzQo4EFtzqdeA7Ch79LyLKV94uz5fu3EbL9kLgsERSW'),
(6, 'weqrwqer', 'weqrwqer', 'wqerwqer', '$2y$10$D5H8lZUvrqEg6va6qKWStu3IpzYtsnGiY9cdqMa3cGMuBgBu8AqpK'),
(7, 'joao', 'joao.diroteldes@gmail.com', 'joao', '$2y$10$EXOPQSoMLrMoRh2ixZ2M9.Rh69e6qPNDhOzVvu5odckhozaQwuEXq'),
(8, 'EWRWQER', 'REWRQER', 'EWQR QWER', '$2y$10$M1hALTdNQylmOWB2VwmxPO0iphoFj3qOILme8BZcdyX1UncZWzeXG'),
(9, 'adm', 'adm', 'adm', '$2y$10$STsb.hAMDJOSHclV6A6Lw.VckmhNcqCWbhxxv6huFlxxRDIuTvQTW'),
(10, 'Lucas Santos', 'lucas@gmail.com', 'lucas', '$2y$10$6mJH.4GVEME89wNShrWRQeAcyao9IHM//qBNPbojYBWjME5l4q9cy'),
(11, 'João', 'joao@gmail.com', 'joao', '$2y$10$Ht1oai95k3stjIs3FtWQX.7qJgPxOygj4ITUjAlBwnZx1mHf/P1nG'),
(12, 'Thais', 'Thais@gmail.com', 'thais', '$2y$10$6LaWRJb15tZ20muAXzlm8uwRV1aA3jhjl.HHvHFD.peYDvt4HBTva'),
(13, 'André', 'andre@gmail.com', 'andre', '$2y$10$09/sNO84QW3h.4ALRbjSkeSmHRatHBqMVpJE2vovPtg8pat./cO5q'),
(14, 'Paulo', 'paulo@gmail.com', 'paulo', '$2y$10$DEfT5b0/TFTEX8GP5vhaAuiVn26DSXXaMnO3i8Gh1x1GMg52rWSki'),
(15, 'Renata', 'renata@gmail.com', 'renata', '$2y$10$k8CRQdevsMQHeelNmbJpQOetOeNx/A/zZ7eSQpSPPmhDCd3OaZiRm'),
(16, 'Marcos', 'marcos@gmail.com', 'marcos', '$2y$10$urBHba6N4EzOZBTBDSawU.iSTmU/ebzM.QyIx0k9uc4ImsfcVf8EO'),
(17, 'AAAAAA', 'ADSFASDF', 'FASDFAS', '$2y$10$t7r5ZqriDscMyCxsf8CEQeINRlyWTE24XNFojP8UYDp7bNoD/0fkS'),
(18, 'ADFASDF', 'ASDFAD', 'SDFASDF', '$2y$10$vlgY.I3mxTv82y3Sf4ft7eif1cNItiNNbJxfgUOuWWv9AkABaIIxW'),
(19, 'Allan', 'Allan', 'Allan', '$2y$10$Rd7iHTWmbJD2/p0lEwQVa.YwR1WOos97Ui9s9eB1P/y6VZiLOTQpS'),
(20, 'allan', 'allan', 'allan', '$2y$10$vKIW6GHu2XE8mukrlYjhquUklEcOT7w7APKl/Sy9eJ85hmVR8AQBm'),
(21, 'usuario', 'usuario', 'usuario', '$2y$10$MJoLhKILk3tRuWo/jR42AuHZSO64wcrg4S1y/FonJA0rqFXnhkENK'),
(22, 'caio', 'caio', 'caio', '$2y$10$m3bxhWcQ3oUy136mi7p/COop/9kocF4vzBfIzEoQhzfZV0jr4ioXm'),
(23, 'ed', 'ed', 'ed', '$2y$10$x15zlz73zZJxu2rFRdvoTu67jiX.Bu1VOiekYxNptrgcX8pn8nVg.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Índices para tabela `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`idimg`);

--
-- Índices para tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Índices para tabela `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`idOS`);

--
-- Índices para tabela `peca`
--
ALTER TABLE `peca`
  ADD KEY `fk_setor` (`fk_setor`);

--
-- Índices para tabela `pecac`
--
ALTER TABLE `pecac`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id_setor`),
  ADD UNIQUE KEY `nomeSetor` (`nomeSetor`);

--
-- Índices para tabela `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`order_items_id`);

--
-- Índices para tabela `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Índices para tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de tabela `img`
--
ALTER TABLE `img`
  MODIFY `idimg` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `os`
--
ALTER TABLE `os`
  MODIFY `idOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `pecac`
--
ALTER TABLE `pecac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `peca`
--
ALTER TABLE `peca`
  ADD CONSTRAINT `peca_ibfk_1` FOREIGN KEY (`fk_setor`) REFERENCES `setores` (`id_setor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
