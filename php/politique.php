<?php
?>
<head>		
	<style type="text/css">
		.modal-politique{		
			color: #636363;
			width: 100%;
		}
		.modal-politique .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-politique .modal-politique-header{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-politique h4{			
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}

		.modal-politique h5 {			
			text-align: center;
			font-size: 22px;
			margin: auto;
		}

		.modal-politique .close{
			position: absolute;
			/*top: -5px;
			right: -5px;*/
			top: -55px !important;
    		right: -50px !important;
		}	
		.modal-politique .modal-politique-footer {
			text-align: center;
			justify-content: center;
			font-size: 13px;
		}
		.modal-politique-footer {
			padding: 15px;
			text-align: right;
			border-top: 1px solid #e5e5e5;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-politique .modal-politique-footer a{
			font-family: 'Oswald', sans-serif;
			color: #999;
		}		
		.modal-politique .avatar{
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
		.modal-politique .avatar img{
			width: 100%;
		}
		.modal-politique .modal-dialog{
			margin-top: 80px;
		}
		.modal-politique .btn{
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
		.modal-politique .btn:hover, .modal-politique .btn:focus{
			min-height: 40px;
			border-radius: 3px; 
			background: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
		}

		.modal-politique .modal-politique-footer #link-politique {
                margin: auto;
		}
	</style>
</head>
	<!-- Modal HTML -->
	<!-- (1/2) Tests seulement: Pour voir le pop-up, désactiver la première balise div ci-dessous , attention ceci affichera le pop-up dans les pages qui l'utilise -->
	<div id="modalPolitique" class="modal fade">
		<div class="modal-dialog modal-politique">
			<div class="modal-content">
				<div class="modal-politique-header">
					<div class="avatar">
						<img src="../images/elements/pizza_multi.png" alt="Avatar">
					</div>				
					<h4 class="modal-title">Aspects légaux</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<h5>Politique de confidentialité</h5>
					<br></br>
					<p class="text-justify">PizzaMania recueille des informations lorsque vous vous inscrivez sur notre site, lorsque vous vous connectez à votre compte, faites un achat, et / ou lorsque vous vous déconnectez.
					Les informations recueillies incluent votre nom, votre adresse e-mail, numéro de téléphone, et / ou carte de crédit.
					De plus, PizzaMania est le seul propriétaire des informations recueillies sur ce site. Vos informations personnelles ne seront pas vendues, 
					échangées, transférées, ou données à une autre société pour n'importe quelle raison, sans votre consentement, 
					en dehors de ce qui est nécessaire pour répondre à une demande et / ou une transaction, comme par exemple pour expédier une commande.
					Source: (https://help.kooneo.com/article/433-politique-confidentialite-modele-gratuit-telecharger)</p>
				</div>
				<!--<div class="modal-politique-footer">
				</div>-->
			</div>
		</div>
	</div>    

