<?php
// GESTION DU SITE: Gestion des commandes

// Inclusion des fichiers
// require "./header.php"; // JE NE PENSE PAS QUE LE HEADER/FOOTER CE SOIT NÉCESSAIRE
require_once "./fonctions.php";
$coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);    
mysqli_set_charset($coo, 'utf8');

$orders = getAllCommandesActives($coo);

/* DANS LE CAS OÙ ON NE VOUDRAIT RÉCUPÉRER TOUTES LES COMMANDES
*   $orders = getAllCommandes($coo);
*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tableau des commandes PizzaMania</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body{
            color: #566787;
            background: #f5f5f5;
            font-family: 'Oswald', sans-serif;
        }
        .table-responsive{
            margin: 30px 0;
        }
        .table-wrapper{
            width: 850px;
            background: #fff;
            margin: 0 auto;
            padding: 20px 30px 5px;
            box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
        }
        .table-title .btn-group{
            float: right;
        }
        .table-title .btn{
            min-width: 150px;
            border-radius: 2px;
            border: none;
            padding: 6px 12px;
            font-size: 95%;
            outline: none !important;
            height: 30px;
        }
        .table-title{
            min-width: 100%;
            border-bottom: 1px solid #e9e9e9;
            padding-bottom: 15px;
            margin-bottom: 5px;
            background: rgb(0, 50, 74); /* Couleur de la bannière du tableau */
            margin: -20px -31px 10px;
            padding: 15px 30px;
            color: #fff;
        }
        .table-title h2{
            margin: 2px 0 0;
            font-size: 24px;
        }
        table.table{
            min-width: 100%;
        }
        table.table tr th, table.table tr td{
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child{
            width: 40px;
        }
        table.table tr th:last-child{
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd){
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover{
            background: #f5f5f5;
        }
        table.table td a{
            color: #2196f3;
        }
        table.table td .btn.manage{
            padding: 2px 10px;
            background: #37BC9B;
            color: #fff;
            border-radius: 2px;
        }
        table.table td .btn.manage:hover{
            background: #2e9c81;		
        }

        .floating-link {
            position: absolute;
            left: 30px;
            top: 30px;            
            border-radius: 5px;
            text-align: center;
            background-color: white;
            border: 1px solid black;
            padding: 5px;
            box-sizing: border-box;
            vertical-align: middle;
            margin: auto;
        }

        .hidden {
            display: none;
        }

        /* LOGIN */
        .login {
            position: relative;
            margin: 30px auto;
            padding: 20px 20px 20px;
            width: 310px;
            background: white;
            border-radius: 3px;
            -webkit-box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .login:before {
            content: '';
            position: absolute;
            top: -8px;
            right: -8px;
            bottom: -8px;
            left: -8px;
            z-index: -1;
            background: rgba(0, 0, 0, 0.08);
            border-radius: 4px;
        }

        .login h1 {
            margin: -20px -20px 21px;
            line-height: 40px;
            font-size: 15px;
            font-weight: bold;
            color: white;
            text-align: center;            
            background: #be1d2c;
            border-bottom: 1px solid #cfcfcf;
            border-radius: 3px 3px 0 0;
            background-image: -webkit-linear-gradient(top, whiteffd, #eef2f5);
            background-image: -moz-linear-gradient(top, whiteffd, #eef2f5);
            background-image: -o-linear-gradient(top, whiteffd, #eef2f5);
            background-image: linear-gradient(to bottom, whiteffd, #eef2f5);
            -webkit-box-shadow: 0 1px whitesmoke;
            box-shadow: 0 1px whitesmoke;
        }

        .login p {
            margin: 20px 0 0;
        }

        .login p:first-child {
            margin-top: 0;
        }

        .login input[type=text], .login input[type=password] {
            width: 278px;
        }

        .login p.remember_me {
            float: left;
            line-height: 31px;
        }

        .login p.remember_me label {
            font-size: 12px;
            color: #777;
            cursor: pointer;
        }

        .login p.remember_me input {
            position: relative;
            bottom: 1px;
            margin-right: 4px;
            vertical-align: middle;
        }

        .login p.submit {
            text-align: right;
        }

        .login-help {
            margin: 20px 0;
            font-size: 11px;
            color: white;
            text-align: center;
            text-shadow: 0 1px #2a85a1;
        }

        .login-help a {
            color: #cce7fa;
            text-decoration: none;
        }

        .login-help a:hover {
            text-decoration: underline;
        }

        :-moz-placeholder {
            color: #c9c9c9 !important;
            font-size: 13px;
        }

        ::-webkit-input-placeholder {
            color: #ccc;
            font-size: 13px;
        }

        input {                
            font-size: 14px;
        }

        input[type=text], input[type=password] {
            margin: 5px;
            padding: 0 10px;
            width: 200px;
            height: 34px;
            color: #404040;
            background: white;
            border: 1px solid;
            border-color: #c4c4c4 #d1d1d1 #d4d4d4;
            border-radius: 2px;
            outline: 5px solid #eff4f7;
            -moz-outline-radius: 3px;
            -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
        }

        input[type=text]:focus, input[type=password]:focus {
            border-color: #7dc9e2;
            outline-color: #dceefc;
            outline-offset: 0;
        }

        input[type=submit] {
            padding: 0 18px;
            height: 29px;
            font-size: 12px;
            font-weight: bold;
            color: white;            
            background: #be1d2c;
            border: 1px solid;
            border-color: #b4ccce #b3c0c8 #9eb9c2;
            border-radius: 16px;
            outline: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;           
            -webkit-box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
            box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
        }

        input[type=submit]:active {
            background: #cde5ef;
            border-color: #9eb9c2 #b3c0c8 #b4ccce;
            -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
            box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
        }

        .lt-ie9 input[type=text], .lt-ie9 input[type=password] {
            line-height: 34px;
        }

    </style>
    <script>
        $(document).ready(function(){
            $(".btn-group .btn").click(function(){
                var inputValue = $(this).find("input").val();
                if(inputValue != 'all'){
                    var target = $('table tr[data-status="' + inputValue + '"]');
                    $("table tbody tr").not(target).hide();
                    target.fadeIn();
                } else {
                    $("table tbody tr").not(".hidden").fadeIn();
                }
            });
            // Changement du label de status de la classe pour prendre en charge Bootstrap 4 
            var bs = $.fn.tooltip.Constructor.VERSION;
            var str = bs.split(".");
            if(str[0] == 4){
                $(".label").each(function(){
                    var classStr = $(this).attr("class");
                    var newClassStr = classStr.replace(/label/g, "badge");
                    $(this).removeAttr("class").addClass(newClassStr);
                });
            }
        });
    </script>
</head>
<body>
<?php if(isset($_POST['login-admin'])){ ?>
    <?php if($_POST['password'] == '123'){ ?>
<div class="floating-link">
    <a href="./welcome_Carousel.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> RETOUR AU SITE</a>
</div>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6"><h2>Gestion<br><b>des commandes</b></h2></div>
                    <div class="col-sm-6">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-info active">
                                <input type="radio" name="status" value="all" checked="checked"> Toutes
                            </label>
                            <label class="btn btn-success">
                                <input type="radio" name="status" value="active"> Complétée
                            </label>
                            <label class="btn btn-warning">
                                <input type="radio" name="status" value="inactive"> En préparation
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="status" value="expired"> En attente
                            </label>							
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Identification</th>
                        <th>Réception</th>
                        <th>Status</th>
                        <th>Adresse&nbsp;client</th>
                        <th>Commande</th>
                    </tr>
                </thead>
                <tbody>
                        <?php $cptr = 1; ?>
                        <?php while($row = ($orders->fetch_assoc())){ ?>
                            <?php if($row['commandStatus'] == "attente"){ ?>
                                <tr data-status="expired" id="visible-<?php echo $cptr;?>"> <!-- data-status= active, inactive, expired-->
                            <?php } else if($row['commandStatus'] == "preparation"){ ?>
                                <tr data-status="inactive" id="visible-<?php echo $cptr;?>"> 
                            <?php } else { ?>
                                <tr data-status="active" id="visible-<?php echo $cptr;?>"> 
                            <?php } ?>

                            <td><?php echo $cptr;?></td>
                            <td><?php echo str_pad($row['orderID'], 9, "0", STR_PAD_LEFT);?></td>
                            <td><?php echo $row['orderDate'] ." ". $row['orderTime'];?></td>                            
                            <?php if($row['commandStatus'] == "attente"){ ?>
                                <td id="statut-<?php echo $cptr;?>"><span class="label label-danger">En attente</span></td> <!-- class= label-success, label-warning, label-danger -->
                            <?php } else if($row['commandStatus'] == "preparation"){ ?>
                                <td id="statut-<?php echo $cptr;?>"><span class="label label-warning">En préparation</span></td>
                            <?php } else { ?>
                                <td id="statut-<?php echo $cptr;?>"><span class="label label-success">Complétée</span></td>
                            <?php } ?>

                            <?php $user = getUserFromID($coo, $row['userID']); ?>
                            <td><?php echo $user['userAddress'];?></td>
                            <td><a class="btn btn-sm manage" onclick="showHiddenRow('hidden-<?php echo $cptr;?>')">Consulter</a></td>
                        </tr>              
                        <tr class="hidden" style="border-left: 1px solid black; border-right: 1px solid black;" id="hidden-<?php echo $cptr;?>">
                                <?php $arr = json_decode($row['panier'], TRUE);?>
                            <td colspan="6">
                                <?php foreach($arr as $a){ ?>                                                                        
                                <?php echo '<div style="padding: 15px 0;"><div><strong>Nom</strong>: '.$a['nom'].'</div><div><strong>Description</strong>: '.$a['description'].'</div><div><strong>Quantité</strong>: '.$a['quantity'].'</div></div>';?>
                                <?php } ?>
                                <?php echo '<div style="padding: 15px 0;"><strong>Mode de récupération</strong>:'.$row['livraison']; ?>
                                <?php echo '<div style="padding: 15px 0;"><strong>Changer le statut</strong>:';
                                echo '<div><input type="radio" name="statut-'.$cptr.'" value="attente" onclick="changeStatus(\'attente\', '.$cptr.', '.$row['orderID'].')"><span class="label label-danger">En attente</span></span></div>';
                                echo '<div><input type="radio" name="statut-'.$cptr.'" value="preparation" onclick="changeStatus(\'preparation\','.$cptr.', '.$row['orderID'].')"><span class="label label-warning">En préparation</span></div>';                                                                
                                echo '<div><input type="radio" name="statut-'.$cptr.'" value="complet" onclick="changeStatus(\'complet\','.$cptr.', '.$row['orderID'].')"><span class="label label-success">Complétée</span></div></div>';
                                ?>
                            </td>
                        </tr>
                        <?php $cptr++; ?>          
                        <?php } ?>
                </tbody>
            </table>
        </div> 
    </div>   
</div> 
</body>
</html>                                		
<script>
    function showHiddenRow(id){        
        $('#'+id).toggle("fast");
    }

    //Changement des statuts qui inclut la mise à jour de l'attribut data-status pour le filtrage
    function changeStatus(statut, cptr, orderID){
        switch(statut){
            case 'attente':
                $('#statut-'+cptr).html('<span class="badge badge-danger">En attente</span>');
                $('#visible-'+cptr).attr("data-status", "expired");
                updateStatus('attente', orderID);
                break;
            case 'preparation':
                $('#statut-'+cptr).html('<span class="badge badge-warning">En préparation</span>');
                $('#visible-'+cptr).attr("data-status", "inactive");
                updateStatus('preparation', orderID);
                break;
            case 'complet':
                $('#statut-'+cptr).html('<span class="badge badge-success">Complétée</span>');
                $('#visible-'+cptr).attr("data-status", "active");
                updateStatus('complet', orderID);
                break;
        }
        
    }

    //Appel AJAX pour modifier le statut de la commande dans la BD en temps réel
    function updateStatus(orderStatus, orderID){
        var xhttp = new XMLHttpRequest();

        xhttp.open("GET", "./orders_Management_Status.php?status="+orderStatus+"&orderID="+orderID, true);
        xhttp.send();
    }
</script>
<?php } else { ?>
    <div class="floating-link">
        <a href="./welcome_Carousel.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> RETOUR AU SITE</a>
    </div>
    <div class="login">
    <h1>Connectez-vous à la section ADMIN</h1>
    <form method="post" action="">    
        <p><input type="password" name="password" value="" placeholder="Mot de passe"></p>
        <p style="padding: 10px; width: 100%; text-align: center; background-color: red; color: white;">Le mot de passe est invalide!</p>
        <p class="submit"><input type="submit" name="login-admin" value="Soumettre"></p>
    </form>
    </div>
<?php } ?>
<?php } else { ?>
<div class="floating-link">
    <a href="./welcome_Carousel.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> RETOUR AU SITE</a>
</div>
<div class="login">
  <h1>Connectez-vous à la section ADMIN</h1>
  <form method="post" action="">    
    <p><input type="password" name="password" value="" placeholder="Mot de passe"></p>
    <p class="submit"><input type="submit" name="login-admin" value="Soumettre"></p>
  </form>
</div>
<?php } ?>