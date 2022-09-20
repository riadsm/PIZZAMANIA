<?php
	// modalRegisterUser (POP-UP)

	// Inclusion des fichiers
	require_once "./nav.php";
	//require "./login_User.php"; // Inclusion effectuée dans header.php
	require_once "./fonctions.php";

	$coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);    
	mysqli_set_charset($coo, 'utf8');
?>
<head>
	<!-- <title>Compte PizzaMania</title> -->
	<style type="text/css">
		.form-control{
			font-family: 'Oswald', sans-serif;
			height: 40px;
			border-color: #BE1D2C; /* Rouge Header */
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			color: #636363;
		}
		.form-control:focus{
			border-color: #ff4500;
		}
		.form-control, .btn{        
			border-radius: 3px;
		}
		.signup-form .hint-text{
			font-family: 'Oswald', sans-serif;
			color: #999;
			/*margin-bottom: 30px;*/
			text-align: center;
		}
		.signup-form .form-group{
			margin-bottom: 20px;
		}
		.signup-form input[type="checkbox"]{
			margin-top: 3px;
		}
		.signup-form .btn{    
			font-family: 'Oswald', sans-serif;
			background-color: #BE1D2C; /* Rouge Header */
			color: #FFFF; /* Blanc */
			font-size: 16px;
			font-weight: bold;
			min-width: 200px;
			outline: none !important;
			margin: 0 auto; /* Centrer le bouton dans la marge */
			display: block; /* Centrer le bouton dans la marge */
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		}
		.signup-form .btn:hover, .signup-form.btn:focus{
			background: #8E1823; /* Rouge foncé */
		}
		.signup-form .row div:first-child{
			padding-right: 10px;
		}
		.signup-form .row div:last-child{
			padding-left: 10px;
		}    	
		.signup-form a{
			font-family: 'Oswald', sans-serif;
			color: #FFF;
			text-decoration: underline;
		}
		.signup-form a:hover{
			text-decoration: none;
		}
		.signup-form form a{
			color: #ff4500;
			text-decoration: none;
		}	
		.signup-form form a:hover{
			text-decoration: underline;
		}
		.checkbox-inline{
			font-weight: bold;
		}
        .signup-form form{
            color: #999;
            border-radius: 15px;
            padding-top: 1px;
            padding-bottom: 15px;
            margin: 25px;
            margin-top: 0px;
            margin-bottom: 45px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding-left: 25px;
            padding-right: 25px;
        }
        .signup-form .hint-text{
            margin-bottom: none;
            text-align: center;
        }
        label{
            border: none !important;
            border-radius: none !important;
            padding: none !important;
            margin-bottom: none !important;
            margin: none !important;
            box-shadow: none !important;
            position: none !important;
        }
        button.close{
            margin-right: 15px !important;
            margin-top: 15px !important;
            min-height: 30px;
			border-radius: 3px; 
        }
        h0{
            font-family: 'Oswald', sans-serif;
            display: flex;
            justify-content: center;
            font-size: 28px;
            color: #636363;
            font-weight: bold;
        }
        .fa-user-circle-o,.fa-envelope, .fa-key{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        hr.rounded {
            border-top: 8px solid #bbb;
            border-radius: 5px;
        }
    </style>
</head>
<?php 
    if(isset($_POST['submit-register'])){                
        $userFromMail = getUserFromMail($coo, $_POST['email']);

        if(!is_null($userFromMail)){
            echo '<script>alert("Cette adresse courriel est déjà utilisée!");</script>';
        } else {            
            addNewCustomer($coo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['password'], NULL);
            $user = getUserFromMail($coo, $_POST['email']);
            if(!is_null($user)){
                echo '<script>alert("Votre compte a été créé!");</script>';
                $_SESSION['loggedin'] = true;
                $_SESSION['userID'] = $user['userID'];
                //Ajout de l'attribut ID au sessionStorage
                echo '<script>sessionStorage.setItem("userID","'.$user['userID'].'");</script>';
            } else {
                echo '<script>alert("Le compte n\'a pu être créé!");</script>';
            }
        }
    }  

?>
<div id="modalRegisterUser" class="modal fade">
		<div class="modal-dialog modal-register">
			<div class="modal-content">
				<div class="modal-header-register">
                    <!-- <h4 class="modal-title-register">Votre panier</h4> -->
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body-register">
                    <div class="signup-form">
                        <form method="post"
                                oninput='confirm_password.setCustomValidity(confirm_password.value != password.value ? "Les mots de passes ne sont pas identiques." : "")'>
                            <h0>CRÉER UN COMPTE PIZZAMANIA</h0>
                            <hr class="rounded">
                            <p class="hint-text">Veuillez remplir ce formulaire pour effectuer la création de votre compte.</p>
                            <div class="form-group">
                                <i class="fa fa-user-circle-o"></i>
                                <div class="row">
                                    <div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="Prénom" required="required"></div>
                                    <div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Nom" required="required"></div>
                                </div>        	
                            </div>
                            <div class="form-group">
                                <i class="fa fa-envelope icon"></i>
                                <input type="email" class="form-control" name="email" placeholder="Courriel" required="required">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-key icon"></i>
                                <input type="password" class="form-control" name="password" placeholder="Mot de passe" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirmation du mot de passe" required="required">
                            </div>                            
                            <div class="form-group">
                                <i class="fa fa-address-card fa-key icon" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="address" placeholder="Votre adresse" required="required">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-phone fa-key icon" aria-hidden="true"></i>
                                <input type="tel" class="form-control" name="phone" pattern="^\d{10}$" placeholder="Votre # de téléphone ( XXXXXXXXXXX )" required="required">
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" required="required"> J'accepte les <a href="#modalCgu" data-toggle="modal">Conditions d'utilisation</a> et la <a href="#modalPolitique" data-toggle="modal">Politique de confidentialité</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn" name="submit-register">Envoyer</button>
                            </div>
                        <!-- Bouton HTML (déclencher le login, pop-up) -->
                        <div class="text-center">Vous êtes déjà inscrit(e)?
                            <a href="#modalLoginUser" data-toggle="modal" data-dismiss="modal" aria-hidden="true">Connexion</a>.
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>	
    </div>
