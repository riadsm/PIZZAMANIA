<?php
	require_once './postes.php';
?>
<head>		
	<style type="text/css">
		.modal-carriere{		
			color: #636363;
			width: 100%;
		}
		.modal-carriere .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-carriere .modal-carriere-header{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-carriere h4{			
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}

		.modal-carriere h5 {			
			text-align: center;
			font-size: 22px;
			margin: auto;
		}

		.modal-carriere .close{
			position: absolute;
			/*top: -5px;
			right: -5px;*/
			top: -55px !important;
    		right: -50px !important;
		}	
		.modal-carriere .modal-carriere-footer {
			text-align: center;
			justify-content: center;
			font-size: 13px;
		}
		.modal-carriere-footer {
			padding: 15px;
			text-align: right;
			border-top: 1px solid #e5e5e5;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-carriere .modal-carriere-footer a{
			font-family: 'Oswald', sans-serif;
			color: #999;
		}		
		.modal-carriere .avatar{
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
		.modal-carriere .avatar img{
			width: 100%;
		}
		.modal-carriere .modal-dialog{
			margin-top: 80px;
		}
		.modal-carriere .btn{
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
		.modal-carriere .btn:hover, .modal-carriere .btn:focus{
			min-height: 40px;
			border-radius: 3px; 
			background: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
		}

		#link-carriere {
			margin: auto;
		}
	</style>
</head>
	<!-- Modal HTML -->
	<!-- (1/2) Tests seulement: Pour voir le pop-up, désactiver la première balise div ci-dessous , attention ceci affichera le pop-up dans les pages qui l'utilise -->
	<div id="modalCarriere" class="modal fade">
		<div class="modal-dialog modal-carriere">
			<div class="modal-content">
				<div class="modal-carriere-header">
					<div class="avatar">
						<img src="../images/elements/pizza_multi.png" alt="Avatar">
					</div>				
					<h4 class="modal-title">Joignez-vous à nous!</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<h5>Travailler chez PizzaMania</h5>
					<br></br>
					<p class="text-center">
						Si la clientèle est votre priorité,<br>
						Si vous donnez le meilleur de vous-mêmes,<br>
						Si vous visez l'excellence dans votre travail,<br>
						Si la passion de la pizza vous habite,<br>
						Si vous souhaitez un environnement amical,<br>
						Votre place est chez PizzaMania.
					</p>
				</div>
				<div class="modal-carriere-footer">
					<!-- Bouton HTML (link-carriere : redirection de page vers les postes offerts) -->
					<div id="link-carriere">
						<h5><a href="#modalPostes" data-toggle="modal">Cliquez ici pour consulter les postes disponibles!</a></h5>
					</div>					
				</div>
			</div>
		</div>
	</div>    
