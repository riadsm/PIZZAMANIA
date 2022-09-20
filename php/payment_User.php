<?php
// Inclusion des fichiers
require_once "./fonctions.php";
require "./nav.php";

$coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);    
mysqli_set_charset($coo, 'utf8');
?>
<head>
    <script src="../js/paiement.js"></script>
	<style type="text/css">
        .card{
            border-radius: 15px;
            width: 80%;
            margin: auto;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
		.form-control-Payment-User, .container-Payment-User, .col-sm-6, .tab-content, .form-group-Payment-User, .alert, .alert-succes{
            margin: auto;
            padding: 5px;
            font-family: 'Oswald', sans-serif;
            font-size: 16px;
		}
        .tab-content{
            padding-bottom: 0px;
        }
        .form-Payment-User{
            margin-block-end: 0em;
        }
        .btn-Payment-User{
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
		.btn-Payment-User:hover, .btn-Payment-User:focus{
			min-height: 40px;
			border-radius: 3px; 
			background: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
		}
        .input-group>.custom-select:not(:last-child),
        .input-group>.form-control-Payment-User:not(:last-child){
            border-radius: 3px;
        }
        .input-group>.custom-file+.custom-file, .input-group>.custom-file+.custom-select, 
        .input-group>.custom-file+.form-control-Payment-User, .input-group>.custom-select+.custom-file, 
        .input-group>.custom-select+.custom-select, .input-group>.custom-select+.form-control-Payment-User, 
        .input-group>.form-control-Payment-User+.custom-file, .input-group>.form-control-Payment-User+.custom-select, 
        .input-group>.form-control-Payment-User+.form-control-Payment-User, .input-group>.form-control-Payment-User-plaintext+.custom-file, 
        .input-group>.form-control-Payment-User-plaintext+.custom-select, 
        .input-group>.form-control-Payment-User-plaintext+.form-control-Payment-User{
            margin-left: 0px;
            border-radius: 3px;
        }
        .label-Payment-User, .hidden-xs-Payment-User {
            font-family: 'Oswald', sans-serif;
            font-weight: normal;
            display: inline-block;
        }  
        .form-control-Payment-User{
            font-family: 14px 'Oswald', sans-serif;
            font-weight: bold;
            margin-bottom: 30px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .form-control-Payment-User:focus, .form-control-Payment-User:hover{
			border-color: #ff4500;
        }
        .input-group-append {
            margin-left: 0px;
        }
        .input-group-text{
            font-size: 20px;
            padding-left: 45px;
            padding-right: 45px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .input-group-text.text-muted{
            font-size: 20px;
            padding-left: 15px;
            padding-right: 15px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .alert, .alert-succes{
            font-family: 'Oswald', sans-serif;
            font-size: 16px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .p-Payment-User, .u-Payment-User{
            font-family: 'Oswald', sans-serif;
            font-size: 100%;
            height: 50px;
            line-height: 46px;
            /*padding-bottom: 15px;*/
        }
        .nav-link{ /* Boutons non sélectionnés par défaut */
            font-family: 'Oswald', sans-serif;
            color: #FFFF; /* Blanc */
            background: #F26B77; /* Rouge très pâle */
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .nav-link:hover{ /* Boutons non sélectionnés par défaut lorsque le focus passe sur le bouton */
            font-family: 'Oswald', sans-serif;
            color: #BE1D2C; /* Rouge Header */
            background: #F26B77; /* Rouge très pâle */
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{ /* Sélection de bouton */
            font-family: 'Oswald', sans-serif;
            color: #FFFF; /* Blanc */
            background-color: #BE1D2C; /* Rouge Header */
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        #rcorners1{
            font-family: 'Oswald', sans-serif;
            color: #FFF;
            background: #F26B77; /* Rouge très pâle */
            border-radius: 15px;
            padding-left: 2%;
            border: 3px solid #8E1823; /* Rouge foncé */
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        #rcorners2 {
            font-family: 'Oswald', sans-serif;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color: #BE1D2C; /* Rouge Header */
            background: #FFF;
            float: right;
            border-radius: 35%;
            padding: 4.50%;
            margin-top: 2.75%;
            margin-right: 1.75%;
            bottom: 30%;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .form-control-Payment-User{
            text-align: center;
        }
        .form-control-Payment-User-Credit-Input-Text{
            width: 67.5%;
        }
        .form-control-Payment-User-Bank-Input-Text {
            width: 135%;
        }
        .form-control-Payment-User-Bank-Input-Text-Full{
            width: 100%;
        }
        .row-Payment-User-Bank, .row-Payment-User-Bank-Last{
            display: flex;
        }
        .column-Payment-User-Bank, .column-Payment-User-Bank-First{
            flex: 50%;
        }
        .column-Payment-User-Bank-First{
            padding-left: 12.5%;
        }
    </style>
</head>
<script>
        function verifierPaiement(){
            var valide = true;
            if(sessionStorage.getItem("panier") == null || sessionStorage.getItem("panier").length < 3){
                alert("Il n'y a aucun produit dans la commande!");                
                valide = false;
                return false;
            }             
            
            if(sessionStorage.getItem("userID") == null){
                alert("Commande sans connexion: impossible de continuer");
                valide = false;
                return false;
            }

            return valide;
        }
</script>
    <div class="container-Payment-User">
        <div class="row">
            <aside class="col-sm-6">
                <p class="p-Payment-User" style="font-family:Oswald,sans-serif;font-size:32px;color:#636363">Informations sur la commande</p>
                <article class="card">
                    <div id="commande-card" class="card-body p-5">
                    </div>
                </article> <!-- card.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!--container-Payment-User end.//-->
    <div class="container-Payment-User">
        <div class="row">
            <aside class="col-sm-6">
                <p class="p-Payment-User" style="font-family:Oswald,sans-serif;font-size:32px;color:#636363">Informations sur le paiement</p>
                <article class="card">
                    <div class="card-body p-5">
                        <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link" data-toggle="pill" href="#nav-tab-card">
                                <i class="fa fa-credit-card"></i>   Carte de crédit</a></li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                                <i class="fa fa-paypal"></i>   Paypal</a></li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                <i class="fa fa-bank"></i>   Virement bancaire</a></li>
                        </ul>
                        <div class="tab-content">
                            <p class="p-Payment-User" class="p-Payment-User" id="rcorners1">    Paiement final <sub id="rcorners2"></sub></p>
                            <!-- Information Crédit -->
                            <div class="tab-pane active" id="nav-tab-card">
                                <form class ="form-Payment-User" role="form" action="./recu.php" method="post">
                                <p class="p-Payment-User" style="font-family:Oswald,sans-serif;color:#636363"><b><u class="u-Payment-User">Détails liés à votre carte de crédit:</u></b></p>
                                    <div class="form-group-Payment-User">
                                        <label class="label-Payment-User" for="username">Nom complet (sur la carte)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                        
                                            <input id="livraison_carte" type="hidden" name ="livraison" value=""> 
                                            <input id="userID_carte" type="hidden" name ="userID" value=""> 
                                            <input id="panier_carte" type="hidden" name="panier" value="" />
                                            <input type="text" class="form-control-Payment-User form-control-Payment-User-Credit-Input-Text" name="username" placeholder="" required="required">
                                        </div> <!-- input-group.// -->
                                    </div> <!-- form-group-Payment-User.// -->
                                    <div class="form-group-Payment-User">
                                        <label class="label-Payment-User" for="cardNumber">Numéro de carte</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-cc-visa">&nbsp;</i>
                                                    <i class="fa fa-cc-amex" >&nbsp;</i> 
                                                    <i class="fa fa-cc-mastercard"></i>
                                                </span>
                                            </div>
                                            <input type="tel" class="form-control-Payment-User form-control-Payment-User-Credit-Input-Text" name="cardNumber" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="XXXX XXXX XXXX XXXX" required="required">
                                        </div>
                                    </div> <!-- form-group-Payment-User.// -->
                                    <div class="row">
                                            <div class="form-group-Payment-User">
                                                <label class="label-Payment-User"><span class="hidden-xs-Payment-User">Expiration</span> </label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control-Payment-User" placeholder="MM" name="MM" min="01" max="12" required="required">
                                                    <input type="number" class="form-control-Payment-User" placeholder="AA" name="AA" min="16" max="24" required="required">
                                                    <label class="label-Payment-User" data-toggle="tooltip" title="Code à 3 chiffres au verso de votre carte" data-original-title="3 digits code on back side of the card">&nbsp;&nbsp;CVV <i class="fa fa-question-circle">&nbsp;</i></label>
                                                    <input type="number" class="form-control-Payment-User" name="CVV" data-min="3" data-max="3" min="000" max="999" required="required">
                                                </div> <!-- form-group-Payment-User.// -->
                                            </div>
                                    </div> <!-- row.// -->
                                    <!--<div class="form-group-payment-credit-remember">
                                        <span class="span-Payment-User">Se souvenir de mes informations   </span><label class="label-Payment-User" for="form-group-payment-credit-remember" class="text-info"><span><input id="form-group-payment-credit-remember" name="form-group-payment-credit-remember" type="checkbox"></span></label>
                                        <br></br>
                                    </div>-->
                                    <button type="submit" name="submit" onclick="return verifierPaiement();" class="btn-Payment-User btn btn-block btn-lg">Confirmer</button>
                                </form>
                            </div> <!-- tab-pane.// -->
							<!-- Information Paypal -->
                            <div class="tab-pane" id="nav-tab-paypal">
                                <p class="p-Payment-User" style = "font-family:Oswald,sans-serif;color:#636363"><b><u class="u-Payment-User">Paypal est la meilleure façon de payer en ligne!</u></b></p>
                                <br></br>
                                <!-- Bouton HTML (redirection de page vers le signin de Paypal Canada ) -->
                                <p class="p-Payment-User"><a href="https://www.paypal.com/ca/signin"><button type="button" onclick="return verifierPaiement();" class="btn-Payment-User btn btn-block btn-lg"> <i class="fa fa-paypal"></i> Se connecter dans mon Paypal </button></a></p>
                                <br></br>
                                <p class="p-Payment-User"><strong>Note:</strong> En cliquant sur le lien ci-haut, vous serez redirigé vers le site de Paypal. </p>
                            </div> <!-- tab-pane.// -->
							<!-- Information Banque -->
							<div class="tab-pane" id="nav-tab-bank">
                                <form class="form-Payment-User" role="form" action="recu.php" method="post">
                                <p class="p-Payment-User" style = "font-family:Oswald,sans-serif;color:#636363"><b><u class="u-Payment-User">Détails bancaire:</u></b></p>
                                <div class="row-Payment-User-Bank">
                                    <div class="form-group-Payment-User">
                                        <label class="label-Payment-User" for="accountName">Nom complet (titulaire)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                
                                                <input id="livraison_banque" type="hidden" name ="livraison" value=""> 
                                                <input id="userID_banque" type="hidden" name ="userID" value=""> 
                                                <input id="panier_banque" type="hidden" name="panier" value="" />
                                                <input type="text" class="form-control-Payment-User form-control-Payment-User-Bank-Input-Text" name="accountName" placeholder="" required="required">
                                            </div> <!-- input-group.// -->
                                        </div> <!-- form-group-Payment-User.// -->
                                    <div class="column-Payment-User-Bank-First">
                                        <div class="form-group-Payment-User">
                                                <label class="label-Payment-User" for="accountNumber">Numéro bancaire (7 à 12 chiffres)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                    </div>
                                                    <input type="tel" class="form-control-Payment-User" name="accountNumber" inputmode="numeric" pattern="^(\d{7}|\d{12})$" autocomplete="cc-number" maxlength="7" maxlength="12" placeholder="XXXXXXXXXXXX" required="required">
                                                </div>
                                        </div> <!-- form-group-Payment-User.// -->
                                    </div>
                                </div>
                                <div class="form-group-Payment-User">
                                        <label class="label-Payment-User" for="bankName">Nom de l'institution</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-muted"><i class="fa fa-bank"></i></span>
                                            </div>
                                            <input type="text" class="form-control-Payment-User form-control-Payment-User-Bank-Input-Text-Full" name="bankName" placeholder="" required="required">
                                        </div> <!-- input-group.// -->
                                    </div> <!-- form-group-Payment-User.// -->
                                <div class="row-Payment-User-Bank-Last">
                                    <div class="form-group-Payment-User">
                                        <label class="label-Payment-User" for="transitNumber">Numéro de transit</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-muted"><i class="fa fa-bank"></i></span>
                                            </div>
                                            <input type="tel" class="form-control-Payment-User" name="transitNumber" inputmode="numeric" pattern="\b\d{5}\b" autocomplete="cc-number" maxlength="5" placeholder="XXXXX" required="required">
                                        </div> <!-- input-group.// -->
                                    </div> <!-- form-group-Payment-User.// -->
                                    <div class="column-Payment-User-Bank">
                                        <div class="form-group-Payment-User">
                                            <label class="label-Payment-User" for="bankInstitutionNumber">Numéro de l'institution</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-muted"><i class="fa fa-bank"></i></span>
                                                </div>
                                                <input type="tel" class="form-control-Payment-User" name="bankInstitutionNumber" inputmode="numeric" pattern="\b\d{3}\b" autocomplete="cc-number" maxlength="3" placeholder="XXX" required="required">
                                            </div>
                                        </div> <!-- form-group-Payment-User.// -->
                                    </div>
                                </div>
                                    <!--<div class="form-group-payment-bank-remember">
                                        <span>Se souvenir de mes informations   </span><label class="label-Payment-User" for="form-group-payment-bank-remember" class="text-info"><span><input id="form-group-payment-bank-remember" name="form-group-payment-bank-remember" type="checkbox"></span></label>
                                        <br></br>
                                    </div>-->
                                    <button type="submit" name="submit" onclick="return verifierPaiement();" class="btn-Payment-User btn btn-block btn-lg">Confirmer</button>
                                </form>
                            </div> <!-- tab-pane.// -->
                        </div> <!-- tab-content .// -->
                    </div> <!-- card-body.// -->
                </article> <!-- card.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!--container-Payment-User end.//-->
<?php
	require "./footer.php";
?>
    <script>
        //Affichage de la commande
        $(document).ready(function(){
            var storage = JSON.parse(sessionStorage.getItem("panier"));
            console.log(storage);
            var prix=0;

            $('#commande-card').append(''+                
                '<div style="box-sizing: border-box;">' + 
                '<div class="text-left" style=" display: inline-block; width: 60%;"><strong>DESCRIPTION</strong></div>' +
                '<div class="text-center" style="display: inline-block; width: 15%;"><strong>PRIX</strong></div>' + 
                '<div class="text-center" style="display: inline-block; width: 10%;"><strong>QTÉ</strong></div>' + 
                '<div class="text-center" style="display: inline-block; width: 15%;"><strong>Sous-total</strong></div>' +                 
                '</div>');

            for (var index in storage) {
                let localPrice = (parseFloat(storage[index]["prix"])*parseFloat(storage[index]["quantity"])*100)/100;
                
                prix += localPrice;                

                $('#commande-card').append(''+
                '<div style="padding: 10px 0 10px 0;">' + 
                '<h7 class="nomargin">' + storage[index]["nom"] + '</h7>' +
                '<div style="box-sizing: border-box;">' + 
                '<div class="text-left" style=" display: inline-block; width: 60%;">' + storage[index]["description"] +'</div>' +
                '<div class="text-center" style="display: inline-block; width: 15%;">' + storage[index]["prix"] + '$</div>' + 
                '<div class="text-center" style="display: inline-block; width: 10%;">'+ storage[index]["quantity"] + '</div>' + 
                '<div class="text-center" style="display: inline-block; width: 15%;">' + localPrice + '$</div>' + 
                '</div>' +
                '</div>');                
            }

            //Affichage du ss-total            
            $('#commande-card').append(''+                
                '<div style="box-sizing: border-box; padding-top: 15px;">' + 
                '<div class="text-left" style=" display: inline-block; width: 60%;"></div>' +                
                '<div class="text-right" style="display: inline-block; width: 25%;">Sous-total:</div>' + 
                '<div class="text-center" style="display: inline-block; width: 15%;">'+prix.toFixed(2)+'$</div>' +                 
                '</div>');

            //Affichage de la TVQ
            var tps = prix * 0.05;
            $('#commande-card').append(''+                
                '<div style="box-sizing: border-box; padding-top: 15px;">' + 
                '<div class="text-left" style=" display: inline-block; width: 60%;"></div>' +                
                '<div class="text-right" style="display: inline-block; width: 25%;">TPS (5%):</div>' + 
                '<div class="text-center" style="display: inline-block; width: 15%;">'+tps.toFixed(2)+'$</div>' +                 
                '</div>');

            //Affichage de la TVQ
            var tvq = (prix) * 0.09975;
            $('#commande-card').append(''+                
                '<div style="box-sizing: border-box; padding-top: 15px;">' + 
                '<div class="text-left" style=" display: inline-block; width: 60%;"></div>' +
                '<div class="text-right" style="display: inline-block; width: 25%;">TVQ (9.975%):</div>' + 
                '<div class="text-center" style="display: inline-block; width: 15%;">'+tvq.toFixed(2)+'$</div>' +                 
                '</div>');

            //Affichage du total
            $('#commande-card').append(''+                
                '<div style="box-sizing: border-box; padding-top: 15px;">' + 
                '<div class="text-left" style=" display: inline-block; width: 60%;"></div>' +                
                '<div class="text-right" style="display: inline-block; width: 25%;"><strong>Total: </strong></div>' + 
                '<div class="text-center" style="display: inline-block; width: 15%;"><strong>'+(prix+tps+tvq).toFixed(2)+'$</strong></div>' +                 
                '</div>');

            //Espaceur
            $('#commande-card').append('<div style="height: 20px;"></div>');
            //Mode de récupération
            var livraison = sessionStorage.getItem("livraison");            
            if(livraison == "recuperation"){
                $('#commande-card').append('<div style="width: 100%;">Mode de récupération: ramassage en restaurant</div>');                
                $('#commande-card').append('<div style="width: 100%;">Adresse du restaurant: 201 avenue du Président-Kennedy, Montréal (Québec)</div>');             
            } else {
                <?php $user = getUserFromID($coo, $_SESSION['userID']);?>
                $('#commande-card').append('<div style="width: 100%;">Mode de récupération: livraison à domicile</div>');
                $('#commande-card').append('<div style="width: 100%;">Adresse de livraison: <?php echo $user['userAddress'];?></div>');
            }       
        });

        

            var panier = sessionStorage.getItem("panier");
            document.getElementById("panier_carte").setAttribute("value",panier);
            panier = JSON.parse(panier);
            let v=0;
            for(let el in panier){
                v += (parseInt(panier[el]["quantity"])* parseFloat(panier[el]["prix"])*100)/100;
            }
            v = (v + ((v * 0.09975) + (v * 0.05))).toFixed(2);
        document.getElementById("rcorners2").innerHTML = v + "$";


        var id = sessionStorage.getItem("userID");
        document.getElementById("userID_carte").setAttribute("value",id);
        document.getElementById("userID_banque").setAttribute("value",id);

        
        var livraison = sessionStorage.getItem("livraison");
        document.getElementById("livraison_carte").setAttribute("value",livraison);
        document.getElementById("livraison_banque").setAttribute("value",livraison);

        
    </script>