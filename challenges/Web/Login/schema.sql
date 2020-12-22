CREATE DATABASE loginbypass;
USE loginbypass;

CREATE TABLE `user` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `user` (`Username`, `Password`) VALUES
('admin', 'sfansdhfkjsdnfkja562dsfkjsdf');
COMMIT;



CREATE USER 'login1' IDENTIFIED BY 'asddva8439hefe4j';
GRANT SELECT ON loginbypass.* to 'login1'@'%';
FLUSH PRIVILEGES;





