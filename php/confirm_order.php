<?php
?>
<head>		
	<style type="text/css">
		.modal-confirmOrder{		
			color: #636363;
			width: 100%;
		}
		.modal-confirmOrder .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-confirmOrder .modal-confirmOrder-header{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-confirmOrder h4{			
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}

		.modal-confirmOrder h5 {			
			text-align: center;
			font-size: 22px;
			margin: auto;
		}

		.modal-confirmOrder .close{
			position: absolute;
			/*top: -5px;
			right: -5px;*/
			top: -55px !important;
    		right: -50px !important;
		}	
		.modal-confirmOrder .modal-confirmOrder-footer {
			text-align: center;
			justify-content: center;
			font-size: 13px;
		}
		.modal-confirmOrder-footer {
			padding: 15px;
			text-align: right;
			border-top: 1px solid #e5e5e5;
			border-bottom: 1px solid #e5e5e5;
		}
		.modal-confirmOrder .modal-confirmOrder-footer a{
			font-family: 'Oswald', sans-serif;
			color: #999;
		}		
		.modal-confirmOrder .avatar{
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
		.modal-confirmOrder .avatar img{
			width: 100%;
		}
		.modal-confirmOrder .modal-dialog{
			margin-top: 80px;
		}
		.modal-confirmOrder .btn{
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
		.modal-confirmOrder .btn:hover, .modal-confirmOrder .btn:focus{
			min-height: 40px;
			border-radius: 3px; 
			background: #8E1823; /* Rouge foncé */
			color: #FFFF; /* Blanc */
		}

		.modal-confirmOrder .modal-confirmOrder-footer #link-confirmOrder {
                margin: auto;
		}
	</style>
</head>
	<!-- Modal HTML -->
	<!-- (1/2) Tests seulement: Pour voir le pop-up, désactiver la première balise div ci-dessous , attention ceci affichera le pop-up dans les pages qui l'utilise -->
	<div id="confirmOrder" class="modal fade">
		<div class="modal-dialog modal-confirmOrder">
			<div class="modal-content">
				<div class="modal-confirmOrder-header">
					<div class="avatar">
						<img src="../images/elements/pizza_multi.png" alt="Avatar">
					</div>				
					<h4 class="modal-title">Commande reçue!</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-confirmOrder-footer">
					<!-- Bouton HTML (link-confirmOrder : redirection de page vers la création de compte) -->
					<p class="text-center">Et en traitement!</p>
				</div>
			</div>
		</div>
	</div>    
