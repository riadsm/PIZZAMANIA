<?php
require "./config.php";
require "./fonctions.php";
    $coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);
    addNewAccount($coo,"simon","Perron","Anatole@pelvin3.do","Le grand chaton");
    if($coo){
        $handle = fopen("../ListeDeNoms.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
            
                $tab = explode(" ", $line);
                $prenom = $tab[0];
                $nom = $tab[1];
                $mail = $nom.random_int(14,1200)."@"."chaton.com";
                $mdp = 4000000000000000 + random_int(100000000000000,999999999999999);
               // $expirationMois = random_int(1,12);
               // $expirationAnnee = random_int(20,24);
               // $securityNo = random_int(100,999);

               echo $prenom." ".$nom." at: ".$mail."<br>";
               addNewAccount($coo,$prenom,$nom,$mail,$mdp);

              //  echo "la carte ".$card." expire le ". $expirationMois."/".$expirationAnnee." et le NO est : ".$securityNo."<br>";
              //  echo "cipher: ".generatePassword($card)."<br>";
            }
            fclose($handle);
        } else {
            // error opening the file.
        } 
    }
    ?>