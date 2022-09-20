<?php
    require "./config.php";
    require "./fonctions.php";

//Le json_encode est nécessaire
if(isset($_POST['userID']) && isset($_POST['panier']) && isset($_POST['livraison'])){
    ajouterCommande($coo,$_POST["userID"],json_encode($_POST["panier"], JSON_UNESCAPED_UNICODE),$_POST["livraison"]);
    header('Location: ./welcome_Carousel.php?clear=1');
}

?>