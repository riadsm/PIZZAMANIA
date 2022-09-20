<?php
?>
<head>		
	<style type="text/css">
		.modal-cgu{		
			color: #636363;
			width: 100%;
		}
		.modal-cgu .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-cgu .modal-cgu-header{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-cgu h4{			
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}

		.modal-cgu h5 {			
			text-align: center;
			font-size: 22px;
			margin: auto;
		}

		.modal-cgu .close{
			position: absolute;
			/*top: -5px;
			right: -5px;*/
			top: -55px !important;
    		right: -50px !important;
		}	
		.modal-cgu .modal-cgu-footer {
			text-align: center;
			justify-content: center;
			font-size: 13px;
		}
		.modal-cgu-footer {
			padding: 15px;
			text-align: right;
			border-top: 1px solid #e5e5e5;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-cgu .modal-cgu-footer a{
			font-family: 'Oswald', sans-serif;
			color: #999;
		}		
		.modal-cgu .avatar{
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
		.modal-cgu .avatar img{
			width: 100%;
		}
		.modal-cgu .modal-dialog{
			margin-top: 80px;
		}
		.modal-cgu .btn{
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
		.modal-cgu .btn:hover, .modal-cgu .btn:focus{
			min-height: 40px;
			border-radius: 3px; 
			background: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
		}

		.modal-cgu .modal-cgu-footer #link-cgu {
                margin: auto;
		}
	</style>
</head>
	<!-- Modal HTML -->
	<!-- (1/2) Tests seulement: Pour voir le pop-up, désactiver la première balise div ci-dessous , attention ceci affichera le pop-up dans les pages qui l'utilise -->
	<div id="modalCgu" class="modal fade">
		<div class="modal-dialog modal-cgu">
			<div class="modal-content">
				<div class="modal-cgu-header">
					<div class="avatar">
						<img src="../images/elements/pizza_multi.png" alt="Avatar">
					</div>				
					<h4 class="modal-title">Aspects légaux</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<h5>Conditions d'utilisation</h5>
					<br></br>
					<p class="text-justify">Le présent document a pour objet de définir les modalités et conditions dans lesquelles d'une part, PizzaMania, 
                    ci-après dénommé L'ÉQUIPE #7, met à la disposition de ses utilisateurs le site, et les services disponibles sur le site et d'autre part, 
                    la manière par laquelle l'utilisateur accède au site et utilise ses services. 
                    Toute connexion au site est subordonnée au respect des présentes conditions. 
                    Pour l'utilisateur, le simple accès au site de L'ÉQUIPE #7 à l'adresse URL actuelle implique 
                    l'acceptation de l'ensemble des conditions sur la propriétés intellectuelle de PizzaMania.
                    Source: (https://www.droitissimo.com/contrat/conditions-generales-dutilisation-cgu-dun-site-internet)</p>
				</div>
				<!--<div class="modal-cgu-footer">
				</div>-->
			</div>
		</div>
	</div>    

