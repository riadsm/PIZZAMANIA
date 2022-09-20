<?php
?>
<head>		
	<style type="text/css">

		#modalPostes{
			z-index: 2000;
		}
		.modal-poste{		
			color: #636363;
			width: 100%;			
		}
		.modal-poste .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-poste .modal-header{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-poste h4{			
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}

		.modal-poste h5{			
			text-align: center;
			font-size: 22px;
			margin: auto;
		}

		.modal-poste .close{
			position: absolute;
			/*top: -5px;
			right: -5px;*/
			top: -55px !important;
    		right: -50px !important;
		}	
		.modal-poste .modal-footer{
			text-align: center;
			justify-content: center;
			font-size: 13px;
		}
		.modal-footer{
			padding: 15px;
			text-align: right;
			border-top: 1px solid #e5e5e5;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-poste .modal-footer a{
			font-family: 'Oswald', sans-serif;
			color: #999;
		}		

		.modal-poste .modal-footer #link-poste{
			margin: auto;
		}	

		.modal-poste .avatar{
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
		.modal-poste .avatar img{
			width: 100%;
		}
		.modal-poste .modal-dialog{
			margin-top: 80px;
		}
		.modal-poste .btn{
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
		.modal-poste .btn:hover, .modal-poste .btn:focus{
			min-height: 40px;
			border-radius: 3px; 
			background: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
		}
	</style>
</head>
	<!-- Modal HTML -->
	<!-- (1/2) Tests seulement: Pour voir le pop-up, désactiver la première balise div ci-dessous , attention ceci affichera le pop-up dans les pages qui l'utilise -->
	<div id="modalPostes" class="modal fade">
		<div class="modal-dialog modal-poste">
			<div class="modal-content">
				<div class="modal-header">
					<div class="avatar">
						<img src="../images/elements/pizza_multi.png" alt="Avatar">
					</div>				
					<h4 class="modal-title">Joignez-vous à nous!</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<h5>Postes disponibles!</h5>
					<p class="text-center">
						Contactez-nous si un des postes ci-dessous vous intéresse!<br>
						Téléphone: (514) 987-3239
					</p>					
				</div>
				<div class="modal-footer">
					<!-- Bouton HTML (link1 : redirection de page vers la création de compte) -->
					<div id="link-poste">
						<h5>Livreurs</h5>
						<p class="text-left">
							Nombre de poste(s) à combler: 2<br>
							N­­° de l'offre: 7626800<br>
							Appellation d'emploi à l'interne: Expert-livreur
						</p>
						<h6>Lieu de travail</h6>
						<p class="text-left">
							Pavillon Président-Kennedy<br>
							201, avenue du Président-Kennedy, local PK-2150<br>
							Montréal (Québec) H2X 3Y7
						</p>
						<h6>Principale fonction</h6>
						<p class="text-left">
							Livrer les commandes au domicile des clients.
						</p>
						<h6>Exigences et conditions de travail</h6>
						<p class="text-left">
							Niveau d'études : Secondaire<br>
							Années d'expérience reliées à l'emploi : un atout<br>							
							Langues parlée(s) : français<br>
							Langue(s) écrite(s) : français<br>
							Salaire offert : à discuter<br>
							Nombre d'heures par semaine : 35<br>
							Statut d'emploi : permanent<br>
							Temps plein : jour, soir, fin de semaine<br>
							Date prévue d'entrée en fonction : 2020-08-01<br>
						</p>
					</div>					
					<div id="link-poste">
						<h5>Cuisiniers</h5>
						<p class="text-left">
							Nombre de poste(s) à combler: 3<br>
							N­­° de l'offre: 7626801<br>
							Appellation d'emploi à l'interne: Expert-cuisinier
						</p>
						<h6>Lieu de travail</h6>
						<p class="text-left">
							Pavillon Président-Kennedy<br>
							201, avenue du Président-Kennedy, local PK-2150<br>
							Montréal (Québec) H2X 3Y7
						</p>
						<h6>Principales fonctions</h6>
						<p class="text-left">
							Assister le chef dans la préparation des commandes et accomplir toutes autres fonctions liées au poste.
						</p>
						<h6>Exigences et conditions de travail</h6>
						<p class="text-left">
							Niveau d'études : Secondaire<br>
							Années d'expérience reliées à l'emploi : 2 années<br>							
							Langues parlée(s) : français<br>
							Langue(s) écrite(s) : français<br>
							Salaire offert : 16.00$/h<br>
							Nombre d'heures par semaine : 30 ou plus<br>
							Statut d'emploi : permanent<br>
							Temps plein : la semaine de 16h00 à 22h00<br>
							Date prévue d'entrée en fonction : 2020-08-01<br>
						</p>					
					</div>
				</div>
			</div>
		</div>
	</div>    
