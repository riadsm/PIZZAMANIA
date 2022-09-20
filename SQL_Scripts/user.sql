DROP TABLE IF EXISTS USERTABLE;
DROP TABLE IF EXISTS COMMAND;


CREATE TABLE USERTABLE(
    userID int PRIMARY KEY DEFAULT NULL AUTO_INCREMENT,
    username VARCHAR(20),
    lastname VARCHAR(20),
    mail VARCHAR(50),
    telephone int,

    -- The password is hashed for security
    userAddress VARCHAR(100),
    userPassword VARCHAR(255),
    userCard VARCHAR(255)
);
ALTER TABLE `USERTABLE` ADD INDEX( `userID`);

-- Status:(ordre)
    -- attente
    -- preparation
    -- complet
-- livraison:
    -- livraison
    -- recuperation
CREATE TABLE COMMAND(
    orderID int PRIMARY KEY DEFAULT NULL AUTO_INCREMENT,
    userID int REFERENCES USERTABLE(userID),
    orderDate varchar(11),
    panier TEXT(2000),
    commandStatus VARCHAR(25),
    livraison VARCHAR(25)
);