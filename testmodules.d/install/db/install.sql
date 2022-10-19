CREATE TABLE `books_u` (
                           `ID` INT NOT NULL AUTO_INCREMENT,
                           `NAME` VARCHAR(255) NOT NULL,
                           `DESCRIPTION` VARCHAR(255) NOT NULL,
                           `FILES` VARCHAR(255) NOT NULL,
                           `DATE_BOOK` DATETIME NOT NULL,
                           `PRICE` VARCHAR(255) NOT NULL,
                           `AUTHOR_ID` VARCHAR(255) NOT NULL,
                           PRIMARY KEY (`ID`));
CREATE TABLE `autor_info` (
                              `ID` INT NOT NULL AUTO_INCREMENT,
                              `FIO_AUTOR` VARCHAR(255) NOT NULL,
                              `CITY` VARCHAR(255) NOT NULL,
                              PRIMARY KEY (`ID`)
);

INSERT INTO books_u (`NAME`, `DESCRIPTION`,`FILES`,`DATE_BOOK`, `PRICE`, `AUTHOR_ID`)
VALUES ('Книга1', 'Какая-то книга', 'SRC', '18.10.2022', '100k', '1');

INSERT INTO autor_info (`FIO_AUTOR`, `CITY`)
VALUES ('Автобус', 'Белгород');
