CREATE DATABASE pisblog;
USE pisblog;

CREATE TABLE `get_point` (
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `get_point` (`name`) VALUES
('No no no, your flag in next index!!!'),
('PTITCTF{u_Kn0w_7ha7_15_5ql_71M3ba53d_1nJ3c710n}');


CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

CREATE USER 'pisblog' IDENTIFIED BY 'asddva8439hefe4j';
GRANT SELECT ON pisblog.* to 'pisblog'@'%';
FLUSH PRIVILEGES;
GRANT INSERT ON pisblog.info TO 'pisblog'@'%';
FLUSH PRIVILEGES;





