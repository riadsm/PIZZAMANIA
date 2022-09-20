DROP TABLE IF EXISTS PIZZA;
DROP TABLE IF EXISTS TOPPING;
DROP TABLE IF EXISTS PIZZATOPPING;
DROP TABLE IF EXISTS SIZE;
DROP TABLE IF EXISTS COMMAND;
DROP TABLE IF EXISTS QUALITY;
DROP TABLE IF EXISTS SIZEQUALITY_PRICE;
DROP TABLE IF EXISTS SAUCE;
DROP TABLE IF EXISTS PIZZASAUCE;

-- Enum des différentes qualitées
CREATE TABLE QUALITY(
    pizzaQuality VARCHAR(10) PRIMARY KEY
);
INSERT INTO QUALITY VALUES ("low");
INSERT INTO QUALITY VALUES ("medium");
INSERT INTO QUALITY VALUES ("high");


-- Les noms de pizza, Hawaienne, DELUXE ...
CREATE TABLE PIZZA(
    pizzaName VARCHAR(25) PRIMARY KEY,
    pizzaDescription TEXT,
    pizzaQuality VARCHAR(10) DEFAULT "medium" REFERENCES QUALITY(pizzaQuality),
    pizzaImageURL TEXT
);


-- Les grosseurs de pizza possibles
CREATE TABLE SIZE(
    name VARCHAR(20),
    size int,
    CONSTRAINT PK_SIZE PRIMARY KEY (name, size)
);

CREATE TABLE SIZEQUALITY_PRICE(
    size int REFERENCES SIZE(size),
    quality VARCHAR(10) REFERENCES QUALITY(pizzaQuality),
    price FLOAT,

    CONSTRAINT PK_SQP PRIMARY KEY (size, quality)
);

CREATE TABLE SAUCE(
    sauceName VARCHAR(30) PRIMARY KEY,
    sauceIconURL TEXT,
    sauceImageURL TEXT
);
CREATE TABLE PIZZASAUCE(
    pizzaName VARCHAR(25) REFERENCES PIZZA(pizzaName),
    sauceName VARCHAR(30) REFERENCES SAUCE(sauceName),
    
    CONSTRAINT PK_ps PRIMARY KEY (pizzaName, sauceName)
);

-- Les toppings possibles, pepperonni, olives, bacon
CREATE TABLE TOPPING(
    toppingName VARCHAR(25) PRIMARY KEY, 
    toppingPrice FLOAT,
    toppingCategory TEXT,
    toppingOrder INT,
    toppingIconURL TEXT,
    toppingImageURL TEXT
);

-- Lie les toppings et la pizza
CREATE TABLE PIZZATOPPING(
    pizzaname VARCHAR(25) REFERENCES PIZZA(pizzaname),
    toppingname VARCHAR(25) REFERENCES TOPPING(topingname),

    CONSTRAINT PK_PT PRIMARY KEY (pizzaname,toppingname) 
);

INSERT INTO SIZE VALUES ("personal" ,7);
INSERT INTO SIZE VALUES ("medium"   ,12);
INSERT INTO SIZE VALUES ("large"    ,14);
INSERT INTO SIZE VALUES ("X-large"  ,16);
INSERT INTO SIZE VALUES ("jumbo"    ,20);

INSERT INTO SIZEQUALITY_PRICE VALUES (7, "low",   2.49);
INSERT INTO SIZEQUALITY_PRICE VALUES (7, "medium",2.69);
INSERT INTO SIZEQUALITY_PRICE VALUES (7, "high",  2.99);

INSERT INTO SIZEQUALITY_PRICE VALUES (12, "low",      8.99);
INSERT INTO SIZEQUALITY_PRICE VALUES (12, "medium",   9.49);
INSERT INTO SIZEQUALITY_PRICE VALUES (12, "high",     9.99);

INSERT INTO SIZEQUALITY_PRICE VALUES (14, "low",       10.99);
INSERT INTO SIZEQUALITY_PRICE VALUES (14, "medium",    11.99);
INSERT INTO SIZEQUALITY_PRICE VALUES (14, "high",      12.99);

INSERT INTO SIZEQUALITY_PRICE VALUES (16, "low",     12.99);
INSERT INTO SIZEQUALITY_PRICE VALUES (16, "medium",  14.49);
INSERT INTO SIZEQUALITY_PRICE VALUES (16, "high",    15.99);

INSERT INTO SIZEQUALITY_PRICE VALUES (20, "low",     15.99);
INSERT INTO SIZEQUALITY_PRICE VALUES (20, "medium",  17.99);
INSERT INTO SIZEQUALITY_PRICE VALUES (20, "high",    19.99);

-- SAUCE
INSERT INTO SAUCE VALUES ("sauce aux tomates","../images/icones/ico_sauce_tomate.png","../images/elements/ajout_sauce_tomate.png");
INSERT INTO SAUCE VALUES ("sauce alfredo","../images/icones/ico_sauce_alfredo.png","../images/elements/ajout_sauce_alfredo.png");
INSERT INTO SAUCE VALUES ("sauce à l'ancienne","../images/icones/ico_sauce_ancienne.png","../images/elements/ajout_sauce_ancienne.png");

-- TOPPINGS
INSERT INTO TOPPING VALUES ("tomate",0.79,"legume",3,"../images/icones/ico_tomate.png","../images/elements/ajout_tomate.png");
INSERT INTO TOPPING VALUES ("ail",0.49,"legume",26,"../images/icones/ico_ail.png","../images/elements/ajout_ail.png");
INSERT INTO TOPPING VALUES ("basilic", 0.45,"legume",20,"../images/icones/ico_basilic.png","../images/elements/ajout_basilic.png");
INSERT INTO TOPPING VALUES ("origan", 0.45,"legume",21,"../images/icones/ico_origan.png","../images/elements/ajout_origan.png");
INSERT INTO TOPPING VALUES ("oignon rouge",0.60,"legume",6,"../images/icones/ico_oignon_rouge.png","../images/elements/ajout_oignon_rouge.png");
INSERT INTO TOPPING VALUES ("oignon blanc",0.60,"legume", 5,"../images/icones/ico_oignon_blanc.png","../images/elements/ajout_oignon_blanc.png");

INSERT INTO TOPPING VALUES ("champignon", 0.40,"legume",4,"../images/icones/ico_champignon.png","../images/elements/ajout_champignon.png");
INSERT INTO TOPPING VALUES ("piment fort",0.99,"legume",23,"../images/icones/ico_piment_fort.png","../images/elements/ajout_piment_jalapeno.png");

INSERT INTO TOPPING VALUES ("poivron vert",0.99,"legume",11,"../images/icones/ico_poivron_vert.png","../images/elements/ajout_poivron_vert.png");
INSERT INTO TOPPING VALUES ("poivron rouge",0.99,"legume",10,"../images/icones/ico_poivron_rouge.png","../images/elements/ajout_poivron_rouge.png");
INSERT INTO TOPPING VALUES ("poivron jaune",0.99,"legume",8,"../images/icones/ico_poivron_jaune.png","../images/elements/ajout_poivron_jaune.png");
INSERT INTO TOPPING VALUES ("poivron orange",0.99,"legume",9,"../images/icones/ico_poivron_orange.png","../images/elements/ajout_poivron_orange.png");


INSERT INTO TOPPING VALUES ("épinard", 0.75,"legume",14,"../images/icones/ico_epinard.png","../images/elements/ajout_epinard.png");
INSERT INTO TOPPING VALUES ("olive verte",0.75,"legume",18,"../images/icones/ico_olive_verte.png","../images/elements/ajout_olive_verte.png");
INSERT INTO TOPPING VALUES ("olive noire",0.75,"legume",17,"../images/icones/ico_olive_noire.png","../images/elements/ajout_olive_noire.png");

-- Cheeses
INSERT INTO TOPPING VALUES ("mozzarella",0.69,
"fromage",1,"../images/icones/ico_mozzarella.png","../images/elements/ajout_mozza.png");
INSERT INTO TOPPING VALUES ("parmesan",0.69,"fromage",22,"../images/icones/ico_parmesan.png","../images/elements/ajout_parmesan.png");
INSERT INTO TOPPING VALUES ("fromage de chèvre",0.69,"fromage",16,"../images/icones/ico_chevre.png","../images/elements/ajout_chevre.png");
INSERT INTO TOPPING VALUES ("cheddar",0.69,"fromage",15,"../images/icones/ico_cheddar.png","../images/elements/ajout_cheddar.png");

-- MEAT
INSERT INTO TOPPING VALUES ("saucisse",1.99,"viande",7,"../images/icones/ico_saucisse.png","../images/elements/ajout_saucisse.png");
INSERT INTO TOPPING VALUES ("jambon",1.99,"viande",24,"../images/icones/ico_jambon.png","../images/elements/ajout_jambon.png");
INSERT INTO TOPPING VALUES ("boeuf haché",1.99,"viande",13,"../images/icones/ico_boeuf.png","../images/elements/ajout_boeuf_hache.png");
INSERT INTO TOPPING VALUES ("pepperoni",0.99,"viande",2,"../images/icones/ico_pepperoni.png","../images/elements/ajout_pepperoni.png");
INSERT INTO TOPPING VALUES ("bacon",0.99,"viande",19,"../images/icones/ico_bacon.png","../images/elements/ajout_bacon.png");
INSERT INTO TOPPING VALUES ("poulet",1.99,"viande",25,"../images/icones/ico_poulet.png","../images/elements/ajout_poulet.png");

INSERT INTO TOPPING VALUES ("ananas",1.99,"legume",12,"../images/icones/ico_ananas.png","../images/elements/ajout_ananas.png");
-- Marinara
INSERT INTO PIZZA VALUES (
    "Marinara",
    "Tomates, ail, origan et basilic",
    "medium",
    "../images/elements/choix_pizza_marinara.png"
);
INSERT INTO PIZZATOPPING VALUES ("Marinara", "tomate");
INSERT INTO PIZZATOPPING VALUES ("Marinara", "ail");
INSERT INTO PIZZATOPPING VALUES ("Marinara", "fines herbes");

INSERT INTO PIZZASAUCE VALUES ("Marinara", "Sauce aux tomates");

-- Chicago
INSERT INTO PIZZA VALUES (
    "Chicago",
    "Boeuf haché, saucisses, pepperoni, oignons blancs, champignons placés sur une sauce aux tomates",
    "high",
    "../images/elements/choix_pizza_chicago.png"
);
INSERT INTO PIZZATOPPING VALUES ("Chicago","boeuf haché");
INSERT INTO PIZZATOPPING VALUES ("Chicago","pepperoni");
INSERT INTO PIZZATOPPING VALUES ("Chicago","saucisse");
INSERT INTO PIZZATOPPING VALUES ("Chicago","oignon blanc");
INSERT INTO PIZZATOPPING VALUES ("Chicago","champignon");
INSERT INTO PIZZATOPPING VALUES ("Chicago","mozzarella");

INSERT INTO PIZZASAUCE VALUES ("Chicago", "sauce aux tomates");

-- Vegetarienne
INSERT INTO PIZZA VALUES(
    "Végétarienne Classique",
    "Poivrons verts, oignons rouges, olives noires, fromage de chèvre, sauce aux tomates",
    "low",
    "../images/elements/choix_pizza_vegetarienne_classique.png"
);
INSERT INTO PIZZATOPPING VALUES ("Végétarienne Classique ","poivron vert");
INSERT INTO PIZZATOPPING VALUES ("Végétarienne Classique ","oignon rouge");
INSERT INTO PIZZATOPPING VALUES ("Végétarienne Classique ","olive noire");
INSERT INTO PIZZATOPPING VALUES ("Végétarienne Classique ","fromage de chèvre");

INSERT INTO PIZZASAUCE VALUES ("Végétarienne Classique","sauce aux tomates");

-- Deluxe
INSERT INTO PIZZA VALUES(
    "Deluxe",
    "Poivrons verts, poivrons jaunes, bacon, olives vertes, champignons, pepperoni, mozzarella, sauce aux tomates",
    "medium",
    "../images/elements/choix_pizza_deluxe.png"
);
INSERT INTO PIZZATOPPING VALUES ("Deluxe ","poivron vert");
INSERT INTO PIZZATOPPING VALUES ("Deluxe ","poivron jaune");
INSERT INTO PIZZATOPPING VALUES ("Deluxe ","bacon");
INSERT INTO PIZZATOPPING VALUES ("Deluxe ","olive verte");
INSERT INTO PIZZATOPPING VALUES ("Deluxe ","champignon");
INSERT INTO PIZZATOPPING VALUES ("Deluxe ","pepperoni");

INSERT INTO PIZZASAUCE VALUES ("Deluxe","sauce aux tomates");

-- Maxicaine
INSERT INTO PIZZA VALUES(
    "Mexicaine",
    "Boeuf haché, cheddar, tomates, oignons blancs, piments forts, olives noires, mozzarella, sauce aux tomates",
    "medium",
    "../images/elements/choix_pizza_mexicaine.png"
);
INSERT INTO PIZZATOPPING VALUES ("Mexicaine ","piment fort");
INSERT INTO PIZZATOPPING VALUES ("Mexicaine ","cheddar");
INSERT INTO PIZZATOPPING VALUES ("Mexicaine ","oignon rouge");
INSERT INTO PIZZATOPPING VALUES ("Mexicaine ","tomate");
INSERT INTO PIZZATOPPING VALUES ("Mexicaine ","boeuf haché");
INSERT INTO PIZZATOPPING VALUES ("Mexicaine ","olive noire");


INSERT INTO PIZZASAUCE VALUES ("Mexicaine","sauce aux tomates");

-- 4 fromages
INSERT INTO PIZZA VALUES(
    "Quatre Fromages",
    "Cheddar, parmesan, fromage de chèvre, origan, basilic, mozzarella, sauce alfredo",
    "low",
    "../images/elements/choix_pizza_4_fromages.png"
);
INSERT INTO PIZZATOPPING VALUES ("Quatre Fromages","cheddar");
INSERT INTO PIZZATOPPING VALUES ("Quatre Fromages","parmesan");
INSERT INTO PIZZATOPPING VALUES ("Quatre Fromages","fromage de chèvre");
INSERT INTO PIZZATOPPING VALUES ("Quatre Fromages","mozzarella");
INSERT INTO PIZZATOPPING VALUES ("Quatre Fromages","fines herbes");

INSERT INTO PIZZASAUCE VALUES ("Quatre Fromages","sauce alfredo");

-- César
INSERT INTO PIZZA VALUES(
    "César",
    "Ail, parmesan, oignons rouges, tomates, poulet, mozzarella, sauce alfredo",
    "high",
    "../images/elements/choix_pizza_cesar.png"
);
INSERT INTO PIZZATOPPING VALUES ("César","mozzarella");
INSERT INTO PIZZATOPPING VALUES ("César","ail");
INSERT INTO PIZZATOPPING VALUES ("César","parmesan");
INSERT INTO PIZZATOPPING VALUES ("César","oignon rouge");
INSERT INTO PIZZATOPPING VALUES ("César","tomate");
INSERT INTO PIZZATOPPING VALUES ("César","poulet");


INSERT INTO PIZZASAUCE VALUES ("César","sauce alfredo");

-- Toute garnie
INSERT INTO PIZZA VALUES(
    "Toute Garnie",
    "Pepperoni, poivrons verts, champignons, oignons blancs, tomates, mozzarella, sauce aux tomates",
    "medium",
    "../images/elements/choix_pizza_toute_garnie.png"
);
INSERT INTO PIZZATOPPING VALUES ("Toute Garnie","mozzarella");
INSERT INTO PIZZATOPPING VALUES ("Toute Garnie","poivron vert");
INSERT INTO PIZZATOPPING VALUES ("Toute Garnie","oignon rouge");
INSERT INTO PIZZATOPPING VALUES ("Toute Garnie","tomate");
INSERT INTO PIZZATOPPING VALUES ("Toute Garnie","champignon");
INSERT INTO PIZZATOPPING VALUES ("Toute Garnie","pepperoni");

INSERT INTO PIZZASAUCE VALUES ("Toute garnie","sauce aux tomates");

-- Fan de Viande
INSERT INTO PIZZA VALUES(
    "Fan de Viande",
    "Boeuf haché, poulet, saucisses, bacon, parmesan, mozzarella, sauce aux tomates",
    "high",
    "../images/elements/choix_pizza_fan_viande.png"
);
INSERT INTO PIZZATOPPING VALUES ("Fan de Viande","mozzarella");
INSERT INTO PIZZATOPPING VALUES ("Fan de Viande","parmesan");
INSERT INTO PIZZATOPPING VALUES ("Fan de Viande","boeuf haché");
INSERT INTO PIZZATOPPING VALUES ("Fan de Viande","poulet");
INSERT INTO PIZZATOPPING VALUES ("Fan de Viande","saucisse");
INSERT INTO PIZZATOPPING VALUES ("Fan de Viande","bacon");


INSERT INTO PIZZASAUCE VALUES ("Fan de Viande","sauce aux tomates");

-- Quebecoise
INSERT INTO PIZZA VALUES(
    "Québécoise",
    "Bacon, pepperoni, champignons, oignons blancs, piments forts, mozzarella, sauce aux tomates",
    "medium",
    "../images/elements/choix_pizza_quebecoise.png"
);
INSERT INTO PIZZATOPPING VALUES ("Québécoise","mozzarella");
INSERT INTO PIZZATOPPING VALUES ("Québécoise","pepperoni");
INSERT INTO PIZZATOPPING VALUES ("Québécoise","bacon");
INSERT INTO PIZZATOPPING VALUES ("Québécoise","champignon");
INSERT INTO PIZZATOPPING VALUES ("Québécoise","oignon blanc");
INSERT INTO PIZZATOPPING VALUES ("Québécoise","piment fort");

INSERT INTO PIZZASAUCE VALUES ("Québécoise","sauce aux tomates");

-- Dragonborn
INSERT INTO PIZZA VALUES(
    "Dragonborn",
    "Extrêmement épiciée, cette pizza est constituée de piments jalapenos, oignons rouges, mozzarella sur une sauce aux tomates; elle est faite pour les intrépides!",
    "high",
    "../images/elements/choix_pizza_piquante.png"
);
INSERT INTO PIZZATOPPING VALUES ("Dragonborn","mozzarella");
INSERT INTO PIZZATOPPING VALUES ("Dragonborn","oignon rouge");
INSERT INTO PIZZATOPPING VALUES ("Dragonborn","piment fort");

INSERT INTO PIZZASAUCE VALUES ("Dragonborn","sauce aux tomates");


INSERT INTO PIZZA VALUES(
    "Hawaïenne",
    "Jambon, bacon, ananas, mozzarella, sauce aux tomates",
    "high",
   "../images/elements/choix_pizza_hawaienne.png" 
);
INSERT INTO PIZZATOPPING VALUES ("Hawaïenne","mozzarella");
INSERT INTO PIZZATOPPING VALUES ("Hawaïenne","jambon");
INSERT INTO PIZZATOPPING VALUES ("Hawaïenne","bacon");
INSERT INTO PIZZATOPPING VALUES ("Hawaïenne","ananas");

INSERT INTO PIZZASAUCE VALUES ("Hawaïenne","sauce aux tomates");


