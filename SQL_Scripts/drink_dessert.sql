DROP TABLE IF EXISTS DESSERT;
DROP TABLE IF EXISTS DRINK;

DROP TABLE IF EXISTS ASIDE;


CREATE TABLE ASIDE(
    asideID int PRIMARY KEY DEFAULT NULL AUTO_INCREMENT,
    asideName VARCHAR(40),
    price float,
    asideIcoURL TEXT
);

CREATE TABLE DRINK(
    drinkID int PRIMARY KEY DEFAULT NULL AUTO_INCREMENT,
    drinkName VARCHAR(25),
    price FLOAT,
    volume INTEGER,
    drinkIcoURL TEXT
);

INSERT INTO ASIDE VALUE(NULL,"Petites frites",2.99,"../images/icones/ico_frites_petite.png" );
INSERT INTO ASIDE VALUE(NULL,"Moyennes frites",4.25,"../images/icones/ico_frites_moyenne.png");
INSERT INTO ASIDE VALUE(NULL,"Grandes frites",4.99,"../images/icones/ico_frites_grande.png");

INSERT INTO ASIDE VALUE(NULL,"Petite Salade Cesar",2.99,"../images/icones/ico_salade_cesar_petite.png");
INSERT INTO ASIDE VALUE(NULL,"Moyenne Salade Cesar",4.49,"../images/icones/ico_salade_cesar_grande.png");
INSERT INTO ASIDE VALUE(NULL,"Salade Du Chef",3.99,"../images/icones/ico_salade_chef_grande.png");

INSERT INTO ASIDE VALUE(NULL,"Petites Rondelles d'oignons",2.99,"../images/icones/ico_rondelles_petite.png");
INSERT INTO ASIDE VALUE(NULL,"Moyennes Rondelles d'oignons",3.99,"../images/icones/ico_rondelles_moyenne.png");
INSERT INTO ASIDE VALUE(NULL,"Grandes Rondelles d'oignons",4.99,"../images/icones/ico_rondelles_grande.png");


INSERT INTO DRINK VALUE(NULL,"Pepsi",    1.25,355,"../images/icones/ico_pepsi_355.png");
INSERT INTO DRINK VALUE(NULL,"Coca-cola",1.25,  355,"../images/icones/ico_coca_cola_355.png");
INSERT INTO DRINK VALUE(NULL,"Pepsi",    2.99, 2000,"../images/icones/ico_pepsi_2L.png");
INSERT INTO DRINK VALUE(NULL,'Pepsi diet',1.25,355,"../images/icones/ico_pepsi_diet_355.png");
INSERT INTO DRINK VALUE(NULL,"Crush",   1.25,  355,"../images/icones/ico_crush_355.png");
INSERT INTO DRINK VALUE(NULL,"Sprite",  1.25,  355,"../images/icones/ico_sprite_355.png");
INSERT INTO DRINK VALUE(NULL,"Iced Tea", 1.75,  355,"../images/icones/ico_iced_tea_355.png");

