<?php    
    require_once './nav.php';
    require_once './fonctions.php';
    include_once './commander_pizza_perso.php';
    
    $coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);    
    mysqli_set_charset($coo, 'utf8');
                        
    $res = getAll($coo, "PIZZA", "", "");    
    $sizequality = getAll($coo, "SIZEQUALITY_PRICE", "", "");
    $aside = getAll($coo, "ASIDE", "", "");
    $drink = getAll($coo, "DRINK", "", "");
?>
<head>
    <script src="../js/paiement.js"></script>
    <script src="../js/updateAllBuyable.js"></script>
</head>
<div class="content">
    <div class="spacer"></div>
    <div class="d-flex">
        <div class="col" id="menu-main">
            <h2 class="menu-titre-page text-center">MENU</h2>
            <br><br>
            <h3 class="menu-titre" id="pizza">Nos pizzas!</h3>
            <br>
            <div class="row">
                <!-- Affichage des pizzas retournées dans la requête -->            
                <?php while($row = ($res->fetch_assoc())){ ?>                           
                <?php $price = getPizzaPrice($coo, 16, $row['pizzaQuality']); ?>
                <div class="col-4 text-center menu-case buyable" id="container-<?php echo str_replace(" ", "-", $row['pizzaName']);?>">
                    <div class="menu-border">
                        <img class="menu-img-pizza" src="<?php echo $row['pizzaImageURL'];?>"><h4><?php echo $row['pizzaName'];?></h4><h6><?php echo $row['pizzaDescription'];?></h6>
                        <h6>Grandeur</h6>
                        <select id="grandeur-<?php echo str_replace(" ", "-", $row['pizzaName']);?>" onchange="changePizzaPrice('#container-<?php echo str_replace(' ', '-', $row['pizzaName']);?>', '#grandeur-<?php echo str_replace(' ', '-',$row['pizzaName']);?>', '#pizzaPrice-<?php echo str_replace(' ', '-', $row['pizzaName']);?>', '<?php echo $row['pizzaQuality'];?>', '<?php echo $row['pizzaName'];?>', '#<?php echo str_replace(' ', '-', $row['pizzaName']);?>')">
                            <!--<option value=""></option>-->                     
                            <option value="7">7"</option>                        
                            <option value="12">12"</option>
                            <option value="14">14"</option>    
                            <option value="16" selected>16"</option>                        
                            <option value="20">20"</option>                       
                        </select>
                        <br>
                        <h6 data-pizza-prix="" id="pizzaPrice-<?php echo str_replace(" ", "-", $row['pizzaName']);?>">Prix <strong><?php echo $price;?>$</strong></h6>
                        <br>
                        <a href="#modalCartUser" id="<?php echo str_replace(" ", "-", $row['pizzaName']);?>" data-toggle="modal" class="btn btn-info btn-lg btn-primary"  data-name='<?php echo $row['pizzaName'];?> 16"' data-description="<?php echo $row['pizzaDescription'];?>" data-is-pizza="true">Commander !</a>
                    </div>
                </div><br><br><br>
                <?php } ?>
            </div>
            <div class="spacer-2"></div>
            <h3 class="menu-titre" id="perso">Votre pizza!</h3>
            <br>
            <div class="row">
                <div class="col text-left"><h4>Faites votre pizza &agrave; votre goût!</h4></div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="menu-perso-zoom">
                        <a href="#pizzaPerso" data-toggle="modal"><img class="menu-img-perso" src="../images/elements/pizza_croute2.png"></a>
                    </div>
                </div>            
            </div>
            <div class="spacer-2"></div>
            <h3 class="menu-titre" id="cote">Les à-côtés!</h3>
            <br>
            <div class="row">
                <?php 
                    while($row = ($aside->fetch_assoc())){
                        echo '<div class="col-3 text-center menu-case buyable"><div class="menu-border"><img class="menu-img-cote" src="'.$row["asideIcoURL"].'"><h6>'.$row["asideName"].'</h6><h6>Prix: <strong>'.$row['price'].'$</strong></h6><a href="#modalCartUser" data-toggle="modal"  data-name="'.$row["asideName"].'" data-description="'.$row["asideName"].'" data-price="'.number_format($row["price"],2).'" class="btn btn-info btn-lg btn-primary">Ajouter !</a></div></div>';                        }
                ?>            
            </div>
            <div class="spacer-2"></div>
            <h3 style="background-color: white !important; color: black !important;" class="menu-titre" id="cote">Les breuvages!</h3>
            <br>
            <div class="row">
                <?php 
                    while($row = ($drink->fetch_assoc())){
                        echo '<div class="col-3 text-center menu-case buyable"><div class="menu-border"><img class="menu-img-cote" src="'.$row["drinkIcoURL"].'"><h6>'.$row["drinkName"].'</h6><h6>Prix: <strong>'.$row['price'].'$</strong></h6><a href="#modalCartUser" data-toggle="modal" data-name="'.$row["drinkName"].'" data-description="'.$row["drinkName"].'" data-price="'.number_format($row["price"],2).'" class="btn btn-info btn-lg btn-primary">Ajouter !</a></div></div>';                        }
                ?>            
            </div>   
        </div>    
    </div>
    <div class="spacer"></div>
</div>
<script>
    function updatePizzaSize(name, url){
        $('#nomPizza').html(name);
        $('#imgPizza').attr('src', url);        
    }
    
    /*
     * Fonction pour afficher le prix adéquat en fonction de la grandeur de la pizza
     */

    function changePizzaPrice(containerID, id, elementID, quality, pizzaName, pizzaID){       
        <?php 
            $array = array();

            while($row = ($sizequality->fetch_assoc())){
                array_push($array, $row);
            }
        ?>
        
        //Récupération de la grandeur sélectionnée de la pizza 
        var size = $(id).children("option:selected").val();        
        //Variable JS qui contient toutes les qualités/size/prix
        var size_quality = <?php echo json_encode($array, JSON_PRETTY_PRINT); ?>;        

        var price;
        var size;
        //Boucle pour trouver le prix correspondant à la qualité et grandeur de la pizza
        var fk = size_quality.keys();
        for(x of fk){                        
            
            if(size_quality[x]['quality'] == quality && size_quality[x]['size'] == size){
                price = size_quality[x]['price'];
                size = size_quality[x]['size'];
                break;
            }             
        }
   
        //Le prix est affiché et data-price est mis à jour
        $(elementID).html('Prix <strong>'+price+'$</strong>');
        $(containerID).attr("data-price", price);
        $(pizzaID).attr('data-name', (pizzaName+' '+size+'"'));
    }
</script>
<?php
    include 'footer.php';
?>