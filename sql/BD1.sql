 CREATE DATABASE IF NOT EXISTS agenday;

 CREATE TABLE IF NOT EXISTS agenday.usuarios (
    esta_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     estabelecimento VARCHAR(40) NOT NULL,
     email VARCHAR(30) NOT NULL,
     senha  VARCHAR(40) NOT NULL,
 )ENGINE=INNODB DEFAULT CHARSET=utf8;