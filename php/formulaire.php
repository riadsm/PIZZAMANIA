<?php
    require "./config.php";
    require "./fonctions.php";

    echo "<h1> Formulaire selection </h1>";

    $coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);

    if($_GET){
        $values = explode('|',$_GET['pizza']);
        $pizza = $values[0];
        $quality = $values[1];
        $size = $_GET['size'];
        echo "une pizza ".$pizza." coute : ".getPizzaPrice($coo,$size,$quality);
    }


    echo "<form action='#' method='GET'>";
    echo "<select name='pizza'>";
    $result = $coo -> query("SELECT * FROM PIZZA ORDER BY pizzaName");

    while($row = ($result ->fetch_assoc())){
        echo "<option value='".$row["pizzaName"]."|".$row['pizzaQuality']."'>".$row['pizzaName']."</option>";
    }
    echo "</select>";
    echo "<br>";
    echo "<select  name='size'>";

    $result = $coo -> query("SELECT * FROM SIZE ORDER BY size");
    while($row = ($result ->fetch_assoc())){
        echo "<option>".$row['size']."</option>";
    }
    echo "<input type='submit' name='Submit' value='calculer' >";
    echo "</form>";

?>