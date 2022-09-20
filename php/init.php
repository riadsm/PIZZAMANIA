<?php
        require "./config.php";

                /**
                 * Creer une connection a une BD mysql-connect;
                 * Creer les requetes $x = "";
                 * Obetnir les Requetes $request = mysqli_query(bd,requete)
                 * Recuperer l'info des requetes avec msqli_fetch_assoc(requete)
                 * 
                 * CREATE USER 'ab123456'@'%' IDENTIFIED VIA mysql_native_password USING '***';
                 * GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON *.* TO 'ab123456'@'%' 
                 * REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
                    */

    /*******************************START INIT************************************************************ */
            /*********************ACCESS DB ****************************** */
                    $coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);
                    if($coo){
                        echo "La connexion est fructueuse! ";
                    }else{
                        printf("Erreur %d, %s <br>", mysqli_connect_errno(), mysqli_connect_error());
                    }

                    /********************* ACCESS SZIE ******************************* */
                    //Query
                    $query = "SELECT * FROM SIZE";
                    
                    //Result
                    $result = $coo -> query($query);
                    
                    //Retrieve
                    while($row = ($result ->fetch_assoc())){
                        echo "<br>";
                        echo "name : ".$row['name']."<br>";
                        echo "size : ".$row['size']."<br>";
                    }



                    $result = $coo -> query(getPizza("chicago"));
                    $ext = $result ->fetch_assoc();
                    echo "la pizza ".$ext["pizzaName"]."<br>";
                    echo "Description: ".$ext["pizzaDescription"]."<br>";
                    echo "Quality: ".$ext["pizzaQuality"]."<br>";

                
                    //PRIX
                    $result = $coo -> query("SELECT * FROM (SIZEQUALITY_PRICE NATURAL JOIN SIZE) WHERE quality ='".$ext['pizzaQuality']."'");
                    while($row = ($result ->fetch_assoc())){
                        echo "une pizza Chicago de ".$row['size']." po, coûte\t".$row['price']." \$<br>";
                    }


                    // TOPPINGS
                    $result = $coo -> query(getToppings("chicago"));

                    echo "<div style='background-color: grey'>";
                    while($row = ($result ->fetch_assoc())){
                        echo "<a href='https://google.ca' style='color:white'>".$row['toppingname']."</p>";
                    }
                    echo "</div>";

                    function getPizza($pizzaname){
                        return "SELECT * FROM PIZZA WHERE pizzaname ='".$pizzaname."'"; 
                    }
                    function getToppings($pizzaname){
                        return "SELECT toppingname FROM PIZZATOPPING WHERE pizzaname ='".$pizzaname."'"; 
                    }

?>