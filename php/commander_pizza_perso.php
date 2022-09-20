<?php
    include_once './fonctions.php';
?>
<head>		
	<style type="text/css">

		.modal-perso{		
			color: #636363;
			min-width: 60%;
		}
		.modal-perso .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-perso .modal-header{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-perso h4{
			font-family: 'Oswald', sans-serif;
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}
		.modal-perso .form-control:focus{
			border-color: #EA404F; /* Rouge pâle */
		}
		.modal-perso .form-control{
			font-family: 'Oswald', sans-serif;
			border-radius: 3px; 
		}
		.modal-perso .close{
			position: absolute;
			top: -5px;
			right: -5px;
		}	
		.modal-perso .modal-footer {
			text-align: center;
			justify-content: center;
			font-size: 13px;
		}
		.modal-footer {
			padding: 15px;
			text-align: right;
			border-top: 1px solid #e5e5e5;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-perso .modal-footer a{
			font-family: 'Oswald', sans-serif;
			color: #999;
		}		
		.modal-perso .avatar{
			position: absolute;
			margin: 0 auto;
			left: 0;
			right: 0;
			top: -70px;
			width: 95px;
			height: 95px;
			border-radius: 50%;
			z-index: 9;
			background: #BE1D2C; /* Rouge Header */
			padding: 15px;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
		}
		.modal-perso .avatar img{
			width: 100%;
		}
		.modal-perso.modal-dialog{
			margin-top: 80px;
		}
		.modal-perso .btn{
			font-family: 'Oswald', sans-serif;
			min-height: 40px;
			border-radius: 3px; 
			background: #BE1D2C; /* Rouge Header */
			border-color: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
			text-decoration: none;
			transition: all 0.4s;
			line-height: normal;
			border: none;
			font-weight: bold;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		}
		.modal-perso .btn:hover, .modal-perso .btn:focus{
			min-height: 40px;
			border-radius: 3px; 
			background: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
		}
		.trigger-btn{
			display: inline-block;
			margin: 100px auto;
		}
		span{
			font-family: 'Oswald', sans-serif;
		}
		.form-group-perso-txt{
			display: flex;
			padding-bottom: 20px
		}
		.form-group-perso-remember{
			padding-bottom: 20px
		}
		.fa{
			color: #636363;
		}
		#link1{
			margin: 35px;
			margin-bottom: 0px;
            margin-top: 0px;
            display: flex;
		}
		#link2{
			margin: 35px;
			margin-bottom: 0px;
			margin-top: 0px;
		}
		strong{
			font-family: 'Oswald', sans-serif;
			font-size: 16px;
		}	
		.alert{
			font-family: 'Oswald', sans-serif;
			background-color: #f44336;
			color: white;
			opacity: 1;
			transition: opacity 0.6s;
			margin-bottom: 15px;
			border-radius: 3px;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		}
		.alert.warning{
			background-color: #ff9800;
		}
		.closebtn{
			margin-left: 15px;
			color: white;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
		}
		.closebtn:hover{
			color: black;
        }
        
        .fa-plus-circle {
            font-size: 2.5rem;
            color: #3cb549;
            -webkit-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;    
        }
        .fa-plus-circle:hover {
            -webkit-transform: scale(1.3);
            -ms-transform: scale(1.3);
            transform: scale(1.3)
        }

        .label {
            padding-left: 2px;
            padding-right: 10px;
            color: #636363;
            font-size: 1.5rem;
        }

        .col-gauche, .col-droite {
            box-sizing: border-box;
            display: inline-block;            
            padding: 10px;
            flex: 1;
        }

        .col-gauche {
            width: 65%;                        
            border-right: 1px solid #e5e5e5;
        }

        .col-droite {            
            width: 35%;            
            vertical-align: middle;            
            position: relative;            
            min-height: 100%;
        }
        .perso-icon {
            width: 4rem;
        }


        .col-droite img {            
            width: 25rem;       
            margin: auto;     
            padding-left: 15px;
            left: 0;
        }        

        .base-perso{
            position: absolute;  
            text-align: center;                         
            z-index: 1;
        }

        .ing-perso {
            position: absolute;
            text-align: center;            
            z-index: 2;
            display: none;
        }

        .col-gauche button {
            width: 100%;
            background-color: #be1d2c;
            color: white;
            border: none;
            font-size: 2rem;
            padding: 10px;
            text-align: left;
        }

        .col-gauche button:hover {
            background-color: #ea404f;
        }

        .container-ingredient {
            padding: 10px 15px 10px 15px;
        }        

        .prix {
            position: relative;
        }

        @media screen and (max-width: 767px) {
            .modal-perso .modal-body, .modal-header {
                width: 100%;
            }

            .modal-perso .modal-content {
                width: 100%;
                padding: 15px;
            }

            #link1 {
                margin: auto;
            }

            .col-gauche {
                width: 100%;    
            }

            .col-droite {
                width: 100%;
                border-lefT: none;
                border-top: 1px solid #e5e5e5;
            }

            .col-droite img {
                width: 25rem;       
                margin: auto;     
                padding-left: 15px;
            }

            .base-perso{
                position: relative;                        
                z-index: 1;
            }

            .ing-perso {
                position: absolute;                
                z-index: 2;
            }

            .perso-icon {
               width: 3.5rem;
            }
        }
        
	</style>
</head>
<script>
    //Var globales pour le string de la commande
    var string = [];
</script>
<?php 
    $grandeur = getAll($coo, "SIZE", "", "size ASC");
    $sauces = getAll($coo, "SAUCE", "", "");
    $qualite = getAll($coo, "SIZEQUALITY_PRICE", "", "");
    $ing_legume = getAll($coo, "TOPPING", "(toppingCategory = 'legume')", "toppingName ASC");
    $ing_fromage = getAll($coo, "TOPPING", "(toppingCategory = 'fromage')", "toppingName ASC");
    $ing_viande = getAll($coo, "TOPPING", "(toppingCategory = 'viande')", "toppingName ASC");
    $ing_img = getAll($coo, "TOPPING", "", "toppingOrder ASC");
    $ing_sauce_img = getAll($coo, "SAUCE", "", "");
?>
<div id="pizzaPerso" class="modal fade">
		<div class="modal-dialog modal-perso">
			<div class="modal-content">
				<div class="modal-header">
					<div class="avatar">
						<img src="../images/elements/pizza_multi.png" alt="Avatar">
					</div>				
					<h4 class="modal-title">Votre pizza!</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <div id="link1">
                    <!-- TODO: les éléments ci-dessous seront récupérés à partir de la BD -->
                        <div class="col-gauche">
                            <form method="post">
                                <button type="button" data-toggle="collapse" data-target="#grandeur">Grandeur</button>
                                <div id="grandeur" class="collapse container-ingredient">
                                    <?php 
                                        while($row = ($grandeur->fetch_assoc())){                                        
                                            echo '<input type="radio" id="'.$row['size'].'pouces-perso" onclick="calculerQualite()" name="grandeur" value="'.$row['size'].'">&nbsp;<label class="label" for="'.$row['size'].'pouces">'.$row['size'].' pouces</label><br>';
                                        }
                                    ?>                                    
                                    <div class="spacer-2"></div>
                                </div>                                
                                <button type="button" data-toggle="collapse" data-target="#sauce">Sauces</button>
                                <div id="sauce" class="collapse container-ingredient">                   
                                    <?php 
                                        while($row = ($sauces->fetch_assoc())){                                            
                                            $id = str_replace("'","",$row['sauceName']);
                                            $id = str_replace(" ", "-", $id);
                                            echo '<input type="radio" id="ing-'.$id.'" name="sauce" onclick="afficherSauce(\''.$id.'\')" value="'.$id.'">&nbsp;<img class="perso-icon" src="'.$row['sauceIconURL'].'"><label class="label" for="sauce">'.ucfirst($row['sauceName']).'</label><br>';
                                        }
                                    ?>            
                                    <div class="spacer-2"></div>
                                </div>
                                <button type="button" data-toggle="collapse" data-target="#fromage">Fromages</button>
                                <div id="fromage" class="collapse container-ingredient">
                                    <?php 
                                        while($row = ($ing_fromage->fetch_assoc())){
                                             $id = str_replace("'","",$row['toppingName']);
                                            $id = str_replace(" ", "-", $id);
                                            echo '<input type="checkbox" id="ing-'.$id.'" name="fromage" class="fromage" onclick="afficherIngredient(\''.$id.'\')" value="'.$id.'">&nbsp;<img class="perso-icon" src="'.$row['toppingIconURL'].'"><label class="label" for="fromage">'.ucfirst($row['toppingName']).'</label><br>';    
                                        }
                                    ?>
                                    <div class="spacer-2"></div>
                                </div>
                                <button type="button" data-toggle="collapse" data-target="#legume">Légumes et herbes</button>
                                <div id="legume" class="collapse container-ingredient">
                                    <?php 
                                        while($row = ($ing_legume->fetch_assoc())){
                                            $id = str_replace("'","",$row['toppingName']);
                                            $id = str_replace(" ", "-", $id);
                                            echo '<input type="checkbox" id="ing-'.$id.'" name="legume" class="legume" onclick="afficherIngredient(\''.$id.'\')" value="'.$id.'">&nbsp;<img class="perso-icon" src="'.$row['toppingIconURL'].'"><label class="label" for="legume">'.ucfirst($row['toppingName']).'</label><br>'; 
                                        }
                                    ?>
                                </div>
                                <button type="button" data-toggle="collapse" data-target="#viande">Viandes</button>
                                <div id="viande" class="collapse container-ingredient">
                                    <?php 
                                        while($row = ($ing_viande->fetch_assoc())){
                                            $id = str_replace("'","",$row['toppingName']);
                                            $id = str_replace(" ", "-", $id);
                                            echo '<input type="checkbox" id="ing-'.$id.'" name="viande" class="viande" onclick="afficherIngredient(\''.$id.'\')" value="'.$id.'">&nbsp;<img class="perso-icon" src="'.$row['toppingIconURL'].'"><label class="label" for="viande">'.ucfirst($row['toppingName']).'</label><br>';
                                        }
                                    ?>                                    
                                </div>
                                <!-- <i class="fa fa-plus-circle" aria-hidden="true"></i> -->
                            </form>
                        </div><div class="col-droite">                            
                            <div>
                                <img class="base-perso" src="../images/elements/pizza_croute2.png">           

                                <?php
                                    while($row = ($ing_sauce_img->fetch_assoc())){
                                        $id = str_replace("'","",$row['sauceName']);
                                        $id = str_replace(" ", "-", $id);
                                        echo '<img id="'.$id.'" class="ing-perso sauce" src="'.$row['sauceImageURL'].'">';
                                    }
                                    while($row = ($ing_img->fetch_assoc())){
                                        $id = str_replace("'","",$row['toppingName']);
                                        $id = str_replace(" ", "-", $id);
                                        echo '<img id="'.$id.'" class="ing-perso" src="'.$row['toppingImageURL'].'">';
                                    }
                                ?>

                            </div>                            
                            <div class="spacer-2"></div>
                            <div class="prix text-right">
                                <label for="prix">Total:</label>
                                <label id="label-prix-perso">0.00$</label>
                            </div>
                        </div>                        
                    </div>                                    
				</div>
				<div class="modal-footer">					
					<div id="link1 text-center" class="buyable">
                        <div>
                            <img style="display: none;" class="menu-img-pizza" src="../images/elements/pizza_croute2.png"><h4></h4><h6></h6>
                            <h6 style="display: none;" data-pizza-prix="0.00" id="pizzaPrice-Perso"></h6>
                            <a id="container-perso" onclick="setPizza()" class="btn btn-info btn-lg btn-primary" data-name="Pizza personnalisée" data-description="-" data-is-pizza="true">AJOUTER!</a>
                            <!--<a href="#modalCartUser" data-toggle="modal" onclick="setPizza()"><button type="button" data-is-pizza="true">AJOUTER!</button></a>-->
                            <button type="button" class="btn btn-info btn-lg btn-primary" onclick="resetPizzaPerso()">Réinitialiser</button>
                        </div>
                    </div>					
                </div>
			</div>
		</div>	
    </div>    
    <script>                                    
        function resetPizzaPerso(){
            $('input[name="grandeur"]').attr('checked', false);
            $('input[name="sauce"]').attr('checked', false);
            $('input[name="fromage"]').attr('checked', false);
            $('input[name="viande"]').attr('checked', false);

            $('#label-prix-perso').html("0.00$");
            //Le prix est affiché et data-pizza-prix et data-description est mis à jour        
            $('#pizzaPrice-Perso').attr("data-pizza-prix", "0.00");
            $('#container-perso').attr("data-description", "-");
            $('.ing-perso').hide();
        }
        //Fonction qui est appelée lors d'un clic et qui affiche l'image de la sauce correspondante       
        function afficherSauce(sauce){
            $('.sauce').hide();
            $("#"+sauce).css('display', 'inline-block');

            calculerQualite();
        }

        //Fonction qui est appelée lors d'un clic et qui affiche l'image de l'ingrédient correspondant        
        function afficherIngredient(ing){
            if(!$('#'+ing).is(':visible')) $('#'+ing).css('display', 'inline-block');
            else $('#'+ing).css('display', 'none');
            
            calculerQualite();
        }

        //Fonction qui met à jour le contenu de la liste globale "string" qui sera utilisée
        //pour ajouter la commande à la BD
        function ajouterElement(ing){            
            string.push(ing); 
        }

        //Fonction qui détermine le prix de la pizza en fonction de la taille choisie
        //et de la qualité générale de la pizza. Les ingrédients (nombre et nature) 
        //permettent de déterminer la qualité de la pizza, en lien avec la taille.

        //Les prix liés à chaque ingrédient pourront être utilisés pour déterminer la qualité
        function calculerQualite(){
            <?php 
                $array = array();

                while($row = ($qualite->fetch_assoc())){
                    array_push($array, $row);
                }
            ?>
            var size_quality = <?php echo json_encode($array, JSON_PRETTY_PRINT); ?>;   
            
            var size = $('input[name="grandeur"]:checked').val();
            var fromages = $(".fromage:checked").length;
            var legumes = $(".legume:checked").length;
            var viandes = $(".viande:checked").length;

            var total = fromages + legumes + viandes;
            var qualite;

            if(total >= 18){
                qualite = "high";
            } else if(total >= 9 && total < 18){
                qualite = "medium";
            } else if(total < 9){
                qualite = "low";
            }

            var price = "";
            var fk = size_quality.keys();
            for(x of fk){                                        
                if(size_quality[x]['quality'] == qualite && size_quality[x]['size'] == size){
                    price = size_quality[x]['price'];
                    break;
                }             
            }

            $('#label-prix-perso').html(price+"$");
            //Le prix est affiché et data-price est mis à jour        
            $('#pizzaPrice-Perso').attr("data-pizza-prix", price);
        }

        function setPizza(){
            if(validerPizza()){

                var size = $('input[name="grandeur"]:checked').val();
                var sauce = $('input[name="sauce"]:checked').val();

                if(sauce != undefined){
                    var ingredients = size + " pouces, " + sauce.replace(/-/g, " ");
                } else {
                    var ingredients = size + " pouces";
                }

                $(".fromage:checked").each(function(){
                    var str = $(this).val();
                    str = str.replace(/-/g, " ");                
                    ingredients += ", " + str;
                });

                $(".legume:checked").each(function(){
                    var str = $(this).val();
                    str = str.replace(/-/g, " ");                
                    ingredients += ", " + str;
                });

                $(".viande:checked").each(function(){
                    var str = $(this).val();
                    str = str.replace(/-/g, " ");                
                    ingredients += ", " + str;
                });

                $('#container-perso').attr("data-description", ingredients);

                //Le modal perso est caché (pas réinitialisé)
                $('#pizzaPerso').modal("toggle");            
                //Le modal cartUser est affiché
                $('#modalCartUser').modal('toggle');            
            }
        }

        function validerPizza(){
            var valide = true;
            if($('input[name="grandeur"]:checked').length < 1){
                valide = false;
                alert("Sélectionner une grandeur pour la pizza!");
            }

            return valide;
        }
    </script>