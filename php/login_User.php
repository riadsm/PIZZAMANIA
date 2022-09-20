<?php
	// modalLoginUser (POP-UP)

	// Inclusion des fichiers
	require_once "./fonctions.php";

	$coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);    
	mysqli_set_charset($coo, 'utf8');
?>
<head>		
	<style type="text/css">
		body{
			font-family: 'Oswald', sans-serif;
		}
		.modal-login{		
			color: #636363;
			width: 350px;
		}
		.modal-login .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-login .modal-header{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-login h4{
			font-family: 'Oswald', sans-serif;
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}
		.modal-login .form-control:focus{
			border-color: #EA404F; /* Rouge pâle */
		}
		.modal-login .form-control{
			font-family: 'Oswald', sans-serif;
			border-radius: 3px; 
		}
		.modal-login .close{
			position: absolute;
			/*top: -5px;
			right: -5px;*/
			top: -55px !important;
    		right: -50px !important;
		}	
		.modal-login .modal-footer {
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
		.modal-login .modal-footer a{
			font-family: 'Oswald', sans-serif;
			color: #999;
		}		
		.modal-login .avatar{
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
		.modal-login .avatar img{
			width: 100%;
		}
		.modal-login.modal-dialog{
			margin-top: 80px;
		}
		.modal-login .btn{
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
		.modal-login .btn:hover, .modal-login .btn:focus{
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
		.form-group-login-txt{
			display: flex;
			padding-bottom: 20px
		}
		.form-group-login-remember{
			padding-bottom: 20px
		}
		.fa{
			color: #636363;
		}
		.login-user-lien-1{
			margin: 35px;
			margin-bottom: 0px;
			margin-top: 0px;
		}
		.login-user-lien-2{
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
			margin-right: none !important;
            margin-top: none !important;
		}
		.closebtn:hover{
			color: black;
		}
		button.close {
            margin-right: 0px !important;
            margin-top: 0px !important;
        }
        .fa-user-circle-o,.fa-envelope, .fa-key{
            display: flex;
            align-items: center;
            justify-content: center;
        }
	</style>
</head>
	<!-- Modal HTML -->
	<!-- (1/2) Tests seulement: Pour voir le pop-up, désactiver la première balise div ci-dessous , attention ceci affichera le pop-up dans les pages qui l'utilise -->
	<div id="modalLoginUser" class="modal fade">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header">
					<div class="avatar">
						<img src="../images/elements/pizza_multi.png" alt="Avatar">
					</div>				
					<h4 class="modal-title">Connexion à votre compte</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form method="post">
					<!-- <form method="post" onsubmit="return validationAuth()"> -->
						<i class="fa fa-envelope icon"></i>
						<div class="form-group-login-txt">
							<input type="email" class="form-control" name="email" placeholder="Courriel" required="required">	
						</div>
						<i class="fa fa-key icon"></i>
						<div class="form-group-login-txt">
							<input type="password" class="form-control" name="password" placeholder="Mot de passe" required="required">
						</div>
						<div class="form-group-login-remember">
							<!-- <span>Se souvenir de moi   </span><class="text-info"><span><input id="remember-me-login" name="remember-me-login" type="checkbox"></span>-->
							<br></br>
							<button type="submit" name="submit" class="btn btn-block btn-lg">Se connecter</button>
								<!-- Validation de l'authentification utilisateur -->
								<!-- <br> -->
								<!-- <script> -->
									<!-- function validationAuth(form) { -->
										<?php
											if(isset($_POST['submit'])){
												$usermail = $_POST["email"];
												$userpwd = $_POST["password"];
												$userFromMail = getUserFromMail($coo, $usermail);
												$passwordget = "";
												
												// L'addesse existe-telle ? 
												if(!is_null($userFromMail)){
													$passwordget = $userFromMail["userPassword"];
													$reponse =  validatePassword($userpwd,$passwordget);
													// Ne pas faire afficher de message quand c'est valide, le modal pop-up se ferme tout simplement
													if($reponse){
														//Attribut "loggedin" de la session mis à vrai
														$_SESSION['loggedin'] = true;
														$_SESSION['userID'] = $userFromMail['userID'];
														//Ajout de l'attribut ID au sessionStorage
														echo '<script>sessionStorage.setItem("userID","'.$userFromMail['userID'].'");</script>';
														
													}else{
										?>
														<br></br>
														<div class="alert">
															<span class="closebtn" onclick='this.parentNode.parentNode.removeChild(this.parentNode);'>&times;</span>  
															<strong>Erreur, authentification invalide.</strong>
														</div>
														<script>
															$(document).ready(function(){
																$("#modalLoginUser").modal('show');
															});
														</script>
										<?php
														$error = "Erreur, authentification invalide...";
														//$success = "";
														//echo $error;
														$error = "";
													}
												}else{
										?>
														<br></br>
														<div class="alert warning">
															<span class="closebtn" onclick='this.parentNode.parentNode.removeChild(this.parentNode);'>&times;</span>  
															<strong>Erreur, le courriel n'existe pas.</strong>
														</div>
														<script>
															$(document).ready(function(){
																$("#modalLoginUser").modal('show');
															});
														</script>
										<?php
														$error = "Erreur, le courriel n'existe pas...";
														//$success = "";
														//echo $error;
														$error = "";
												}
											}
										?>
									<!-- } -->
								<!-- </script> -->
								<!-- </br> -->
                        </div>
					</form>
				</div>
				<div class="modal-footer">
					<!-- Bouton HTML (redirection de page vers la création de compte) -->
					<div class="login-user-lien-1">
						<!-- <a href="./register_User.php">Pas de compte?</a> -->
						<a href="#modalRegisterUser" data-toggle="modal" data-dismiss="modal" aria-hidden="true">Pas de compte?</a>  
					</div>
					<!-- Bouton HTML (redirection de page vers À VENIR...) -->
					<!-- <div class="login-user-lien-2">
						<a href="#">Mot de passe oublié?</a>
					</div>-->
				</div>
			</div>
		</div>
	<!-- (2/2) Tests seulement: Pour voir le pop-up, désactiver la première balise div ci-dessous , attention ceci affichera le pop-up dans les pages qui l'utilise -->
	</div>    
