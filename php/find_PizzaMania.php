<?php
	// modalFindPizzaMania (POP-UP)

	// Inclusion des fichiers
	require_once './fonctions.php';
	
	$coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);    
	mysqli_set_charset($coo, 'utf8');
?>
<head>		
	<style type="text/css">
		.modal-map{	
			color: #636363;
		}
		.modal-map .modal-content{
			padding: 50px;
			border-radius: 15px;
			border: none;
		}
		.modal-map .modal-header-map{
			border-bottom: none;   
			position: relative;
			justify-content: center;
		}
		.modal-map h4{
			font-family: 'Oswald', sans-serif;
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}
		.modal-map .close{
			position: absolute;
			top: -25px;
			right: -25px;
		}
		h4.modal-title-map{
			margin: 0 0 0;
		}
		#error_{ /* Pour cacher le message d'erreur de GoogleMap dans le footer */
			font-size: 0px;
			color: #fff;
			background-color: #3cb549;
		}	
	</style>
</head>
<div id="modalFindPizzaMania" class="modal fade">
		<div class="modal-dialog modal-map">
			<div class="modal-content">
				<div class="modal-header-map">
                    <h4 class="modal-title-map">Nous sommes ici!</h4>		
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body-map">
					<iframe width="400" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                        src="https://maps.google.com/maps?width=1040&amp;height=600&amp;hl=en&amp;q=201%20Avenue%20du%20Pr%C3%A9sident-Kennedy,%20Montr%C3%A9al,%20QC%20H2X%203Y7%20Montreal+(Universit%C3%A9%20du%20Qu%C3%A9bec%20%C3%A0%20Montr%C3%A9al)&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                    </iframe> 
                    <a href='http://maps-generator.com/fr'><br>http://Maps-Generator.com</br></a>
                    <script type='text/javascript' 
						src='https://embedmaps.com/google-maps-authorization/script.js?id=1ba3a1a3db336151a0c6c80d3b4ad43d535fae4b'>
					</script>
				</div>
			</div>
		</div>	
    </div>