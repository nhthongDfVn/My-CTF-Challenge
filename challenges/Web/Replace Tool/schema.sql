create database anht0ictf01;
USE anht0ictf01;

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `user` (`username`, `password`) VALUES
('nhthong', '123drge45678'),
('nhthong123456', 'nhthdsfsfonerterg123456');
COMMIT;

CREATE USER 'preg' IDENTIFIED BY 'asddva8439hefe4j';
GRANT SELECT ON anht0ictf01.* to 'preg'@'%';
FLUSH PRIVILEGES;
GRANT INSERT ON anht0ictf01.* to 'preg'@'%';
FLUSH PRIVILEGES;
