CREATE DATABASE asean;
USE asean;

CREATE TABLE `info` (
  `Name` varchar(100) NOT NULL,
  `HeadOfState` varchar(100) NOT NULL,
  `Capital` varchar(100) NOT NULL,
  `Language` varchar(100) NOT NULL,
  `Currency` varchar(100) NOT NULL,
  `NationalSecret` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `info` (`Name`, `HeadOfState`, `Capital`, `Language`, `Currency`, `NationalSecret`) VALUES
('Brunei Darussalam', 'His Majesty Sultan Haji Hassanal Bolkiah Mu’izzaddin Waddaulah', 'Bandar Seri Begawan', 'Malay, English', 'B$ (Brunei Dollar)', 'No secret'),
('Cambodia', 'His Majesty King Norodom Sihamoni', 'Phnom Penh', 'Khmer', 'Riel', 'No secret'),
('Indonesia', 'President Joko Widodo', 'Jakarta', 'Indonesian', 'Rupiah', 'No secret'),
('Lao PDR', 'President Bounnhang Vorachith', 'Vientiane', 'Lao', 'Kip', 'No secret'),
('Malaysia', 'His Majesty Seri Paduka Baginda Yang di-Pertuan Agong XV Sultan Muhammad V', 'Kuala Lumpur', 'Malay, English, Chinese, Tamil', 'Ringgit', 'No secret'),
('Myanmar', 'U Win Myint', 'Nay Pyi Taw', 'Myanmar', 'Kyat', 'No secret'),
('Philippines', 'President Rodrigo Roa Duterte', 'Manila', 'Filipino, English, Spanish', 'Peso', 'No secret'),
('Singapore', 'President Halimah Yacob', 'Singapore', 'English, Malay, Mandarin, Tamil', 'S$ (Singapore Dollar)', 'No secret'),
('Thailand', 'His Majesty King Maha Vajiralongkorn Bodindradebayavarangkun', 'Bangkok', 'Thai', 'Baht', 'No secret'),
('Viet Nam', 'Nguyen Phu Trong', 'Ha Noi', 'Vietnamese', 'Dong', 'Gud, here is your flag: \r\nChristCTF{V137n4m_d035_n07_ch0053_h32d_1mmun17y}');
COMMIT;



CREATE USER 'vietnam' IDENTIFIED BY 'asddva8439hefe4j';
GRANT SELECT ON asean.* to 'vietnam'@'%';
FLUSH PRIVILEGES;





