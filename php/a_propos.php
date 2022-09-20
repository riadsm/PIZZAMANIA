<?php
?>
<head>		
	<style type="text/css">
		.modal-apropos{		
			color: #636363;
			width: 100%;
		}
		.modal-apropos .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-apropos .modal-apropos-header{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-apropos h4{			
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}

		.modal-apropos h5 {			
			text-align: center;
			font-size: 22px;
			margin: auto;
		}

		.modal-apropos .close{
			position: absolute;
			/*top: -5px;
			right: -5px;*/
			top: -55px !important;
    		right: -50px !important;
		}	
		.modal-apropos .modal-apropos-footer {
			text-align: center;
			justify-content: center;
			font-size: 13px;
		}
		.modal-apropos-footer {
			padding: 15px;
			text-align: right;
			border-top: 1px solid #e5e5e5;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-apropos .modal-apropos-footer a{
			font-family: 'Oswald', sans-serif;
			color: #999;
		}		
		.modal-apropos .avatar{
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
		.modal-apropos .avatar img{
			width: 100%;
		}
		.modal-apropos .modal-dialog{
			margin-top: 80px;
		}
		.modal-apropos .btn{
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
		.modal-apropos .btn:hover, .modal-apropos .btn:focus{
			min-height: 40px;
			border-radius: 3px; 
			background: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
		}

		.modal-apropos .modal-apropos-footer #link-apropos {
                margin: auto;
		}
	</style>
</head>
	<!-- Modal HTML -->
	<!-- (1/2) Tests seulement: Pour voir le pop-up, désactiver la première balise div ci-dessous , attention ceci affichera le pop-up dans les pages qui l'utilise -->
	<div id="modalApropos" class="modal fade">
		<div class="modal-dialog modal-apropos">
			<div class="modal-content">
				<div class="modal-apropos-header">
					<div class="avatar">
						<img src="../images/elements/pizza_multi.png" alt="Avatar">
					</div>				
					<h4 class="modal-title">Au sujet de PizzaMania</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<h5>Mission & vision</h5>
					<br></br>
					<p class="text-justify">PizzaMania est une pizzeria localisée au cœur de Montréal. Stratégiquement bien positionné et doté du personnel
aux talents exceptionnels, PizzaMania n’a cessé d’accroître sa part de marché et de booster son chiffres d’affaires.
De plus, la confection d’un menu adapté à la clientèle cible,la mise en place d’une stratégie technologique permettant
une grande visibilité et la diversification des méthodes de ventes ont contribué significativement à la prospérité de l’entreprise.
Pizzeria compte rejoindre progressivement les marchés plus éloignés de l’île.</p>
				</div>
				<div class="modal-apropos-footer">
					<!-- Bouton HTML (link-apropos : redirection de page vers la création de compte) -->
					
					<div id="link-apropos">
						<h5>Coordonnées</h5><br>
						<p class="text-center">Pavillon Président-Kennedy<br>
						201, avenue du Président-Kennedy, local PK-2150<br>
						Montréal (Québec), H2X 3Y7<br>
						Téléphone: (514) 987-3239</p>
					</div>
					<div id="link-apropos">
						<h5>Heures d'ouverture</h5>
						<p class="text-center">
							Lundi au vendredi: 11h00 à 23h00<br>
							Samedi et dimanche: 11h00 à 1h00<br>
						</p>	
					</div>
					<div id="link2">
						<h5>Attributions graphiques</h5>
						<h6>Certains éléments graphiques ont été partiellement ou complètement conçus par:</h6>
						<p class="text-center">
							<a href="http://www.freepik.com">Photoroyalty / Freepik</a><br>
							<a href="http://www.freepik.com">macrovector / Freepik</a><br>
							<a href="http://www.freepik.com">pch.vector / Freepik</a><br>
							<a href="http://www.freepik.com">Terdpongvector / Freepik</a><br>
							<a href="http://www.freepik.com">Freepik</a><br>
							<a href="https://www.flaticon.com/authors/freepik" title="Freepik">Icons made by Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
						</p>	
					</div>
				</div>
			</div>
		</div>
	</div>    
