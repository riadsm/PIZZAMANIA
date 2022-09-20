<?php
    require "./config.php";

    // Retourne les infos d'une pizza
    // Besoin d'utiliser [pizzaDescription] et d'autres fields pour extraire
    function getPizza($coo, $pizzaname){
        $pizzaRQ = "SELECT * FROM PIZZA WHERE pizzaname ='".$pizzaname."'"; 
        $result = $coo -> query($pizzaRQ);
        return ($result->fetch_assoc());
    }

    //Fonction qui retourne toutes les éléments présents dans la DB
    //liée à la table passée en paramètres
    //La gestion des lignes est faite dans la page ayant fait la requête
    function getAll($coo, $table, $where, $order){
        $sql = "SELECT * FROM ".$table;

        //Ajout des conditions (ex $where = '(size = 7) [AND/OR (id > 2) ...]')
        if($where != ""){
            $sql .= " WHERE " .$where;
        }

        //Ajout de l'ordre de tri (ex $order = 'size ASC [, id ASC, ...]')
        if($order != ""){
            $sql .= " ORDER BY ".$order;
        }               
        $res = $coo->query($sql);
        return $res;
    }    

    // Retourne un array : Tu dois utiliser [x] pour acceder aux valeurs
    function getToppings($coo, $pizzaname){
       $topping =  "SELECT toppingname FROM PIZZATOPPING WHERE pizzaname ='".$pizzaname."'"; 
       $result = $coo -> query($topping);
       $list = array();

       while($v = $result->fetch_assoc()){
            $list[] = $v["toppingname"];
       }
       return $list;
    }    

    // Retourne un array : Tu dois utiliser [x] pour acceder aux valeurs et le nom pour acceder au field
    //Si la DB a 15 elements --> retourne 15 éléments
    // getAside($coo)[3] accède au 4e élément de la liste
    // getAside($coo)[3]["price"] accède au prix du 4e élément
    // Possible d'utiliser << print_r(getAside($coo)) >> pour comprendre la structure
    function getAside($coo){
        $RQ =  "SELECT * FROM ASIDE"; 
        $result = $coo -> query($RQ);
        $list = array();
 
        while($v = $result->fetch_assoc()){
             $list[] = $v;
        }
        return $list;
     }


    function getSauce($coo, $pizzaname){
        $sauce = "SELECT sauceName FROM PIZZASAUCE WHERE pizzaname ='".$pizzaname."'";
        $result = $coo -> query($sauce);
        $retour = $result->fetch_assoc();

        return $retour["sauceName"];
    }
    $coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);
    // echo getPizzaPrice($coo,14,"medium");

    function ajouterCommande($coo,$userID,$panier,$livraison){
        //preparation
        //attente
        //complet   
        $status = "attente";
        //d/m/Y::H:i == Day, month, year, hour, mins
        date_default_timezone_set("America/New_York");
        $request = 'INSERT INTO COMMAND (`orderID`, `userID`, `orderDate`, `orderTime`,`panier`, `commandStatus`, `livraison`) VALUES (NULL, "'.$userID.'","'.date("d/m/Y").'","'.date("H:i").'",'.$panier.',"'.$status.'","'.$livraison.'")';
        $coo -> query($request);
    }

    //Fonction qui retourne les commandes non complétées dans la BD, triées selon la date
    function getAllCommandes($coo){
        $result = $coo->query("SELECT * FROM COMMAND ORDER BY orderDate ASC, orderTime ASC;");
        return $result;
    }
    
    //Fonction qui retourne les commandes non complétées dans la BD, triées selon la date
    function getAllCommandesActives($coo){
        $result = $coo->query("SELECT * FROM COMMAND WHERE (commandStatus != 'complet') ORDER BY orderDate ASC, orderTime ASC;");
        return $result;
    }

    function getPizzaPrice($coo, $size, $quality){
        $result = $coo -> query("SELECT * FROM (SIZEQUALITY_PRICE NATURAL JOIN SIZE) WHERE quality ='".$quality."' AND size = '".$size."'");
        
        $retour = $result->fetch_assoc();
        return $retour['price'];
    }
    function addNewAccount($coo, $name, $lastname, $mail,$password){
        $request = 'INSERT INTO USERTABLE (`userID`, `userName`, `lastName`, `mail`, `userPassword`) VALUES (NULL, "'.$name.'","'.$lastname.'","'.$mail.'","'.generatePassword($password).'")';
        //echo $request."<br>";
        $coo -> query($request);
    }
    function addNewCustomer($coo, $name, $lastname, $email, $address, $phone, $password,$cardnumber){
        $request = 'INSERT INTO USERTABLE (`userID`, `username`, `lastname`, `mail`, `telephone`, `userAddress`, `userPassword`, `userCard`) VALUES (NULL, "'.$name.'","'.$lastname.'","'.$email.'","'.$phone.'","'.$address.'","'.generatePassword($password).'", NULL)';        
        $coo -> query($request);        
    }

    // echo getUser($coo, "kim","f")['userPassword'];
    function getUserFromName($coo,$name,$lastname){
        $result = $coo -> query("SELECT * FROM USERTABLE WHERE username='".$name."' AND lastname='".$lastname."'");
        return ($result->fetch_assoc());
    }

    // echo getUser($coo, "kim","f")['userPassword'];
    function getUserFromMail($coo,$mail){
        $result = $coo -> query("SELECT * FROM USERTABLE WHERE mail='".$mail."'");
        return ($result->fetch_assoc());
    }

    function getUserFromID($coo,$id){
        $result = $coo -> query("SELECT * FROM USERTABLE WHERE userID='".$id."'");
        return ($result->fetch_assoc());
    }

    //Permet d'afficher un array en PHP
    // print_r ( getUserFromMail($coo,"mar@chaotn.com") );

    //***************************** EXEMPLE DE VALIDATION D'AUTHENTIFICATION ******************* */

    /*
    $_POST["password"]
    $_POST["mail"]
    */
    //$_POST["mail"] --> abc
    /*$utilisateurFromMail = getUserFromMail($coo,"Anatole@pelvin3.do");
    $password = "";
    //l'addessse existe-telle ? 
    if(!is_null($utilisateurFromMail)){
        $password = $utilisateurFromMail["userPassword"];
        //$_POST["password"] --> moi
        $reponse =  validatePassword("Le grand chaton",$password );
        if($reponse){
            echo "is valid";
        }else{
            echo "is invalid";
        }
    }else{
        echo "cette addresse n'Exitste pas ! ";
    }
    */

    //***************************** SECURITE ******************* */
    
    //echo $cipher = generatePassword("chaton");
    //echo "<br>";
    //echo validatePassword("chaton",$cipher)."<br>";

    //Exmemple de validation de MDP
    //if(validatePassword("", $cipher) == 0){
    //    echo "wrong password";    
    //}else{
    //    echo "the password is good";
    //};

function generatePassword($password){
    return base64_encode(password_hash($password, PASSWORD_ARGON2I));
}

function validatePassword($password,$cipher){
    return password_verify ( $password ,base64_decode($cipher));
}
?>