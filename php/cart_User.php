<?php
// modalCartUser (POP-UP)

// Inclusion des fichiers
require_once './fonctions.php';

$coo = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);
mysqli_set_charset($coo, 'utf8');
?>
<head>

    <script src="../js/paiement.js"></script>
    <style type="text/css">
        .modal-cart {
            color: #636363;
            min-width: 60%;
        }

        .modal-cart .modal-content {
            padding: 25px;
            border-radius: 15px;
            border: none;
        }

        .modal-cart .modal-header-cart {
            border-bottom: none;
            position: relative;
            justify-content: center;
        }

        .modal-cart .h7 {
            font-family: 'Oswald', sans-serif;
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-cart .form-control:focus {
            border-color: #EA404F;
            /* Rouge pâle */
        }

        .modal-cart .form-control {
            font-family: 'Oswald', sans-serif;
            border-radius: 3px;
        }

        .modal-cart .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .modal-cart .modal-footer {
            text-align: center;
            justify-content: center;
            font-size: 16px;
        }

        .modal-footer {
            padding: 15px;
            text-align: right;
            border-top: 1px solid #e5e5e5;
            border-bottom: 1px solid #e5e5e5;
        }

        .modal-cart .modal-footer a {
            font-family: 'Oswald', sans-serif;
            color: #999;
        }

        .modal-cart .avatar {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #BE1D2C;
            /* Rouge Header */
            padding: 15px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .modal-cart .avatar img {
            width: 100%;
        }

        .modal-cart.modal-dialog {
            margin-top: 80px;
        }

        .modal-cart .btn {
            font-family: 'Oswald', sans-serif;
            min-height: 40px;
            border-radius: 3px;
            background: #BE1D2C;
            /* Rouge Header */
            border-color: #8E1823;
            /* Rouge foncé */
            color: #FFFF;
            /* Blanc */
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
            font-weight: bold;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .modal-cart .btn:hover,
        .modal-cart .btn:focus {
            min-height: 40px;
            border-radius: 3px;
            background: #8E1823;
            /* Rouge foncé */
            color: #FFFF;
            /* Blanc */
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }

        span {
            font-family: 'Oswald', sans-serif;
        }

        .form-group-perso-txt {
            display: flex;
            padding-bottom: 20px
        }

        .form-group-perso-remember {
            padding-bottom: 20px
        }

        .fa {
            color: #636363;
        }

        #link1 {
            margin: 35px;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        #link2 {
            margin: 35px;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        strong {
            font-family: 'Oswald', sans-serif;
            font-size: 16px;
        }

        .alert {
            font-family: 'Oswald', sans-serif;
            background-color: #f44336;
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
            margin-bottom: 15px;
            border-radius: 3px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .alert.warning {
            background-color: #ff9800;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

        .fa-plus-circle {
            font-size: 2.5rem;
            color: #3cb549;
            -webkit-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        .fa-plus-circle:hover {
            -webkit-transform: scale(1.3);
            -ms-transform: scale(1.3);
            transform: scale(1.3)
        }

        .label {
            padding-left: 2px;
            padding-right: 10px;
            color: #636363;
            font-size: 1.5rem;
        }

        .col-gauche,
        .col-droite {
            box-sizing: border-box;
            display: inline-block;
        }

        .col-gauche {
            width: 65%;
            padding: 10px;
            border-right: 1px solid #e5e5e5;
        }

        .col-droite {
            width: 35%;
            text-align: center;
            vertical-align: middle;
            position: relative;
            vertical-align: top;
        }

        .col-droite img {
            width: 25rem;
            margin: auto;
            padding-left: 15px;
        }

        .perso-icon {
            width: 4rem;
        }

        .base-perso {
            position: relative;
            z-index: 1;
        }

        .ing-perso {
            position: absolute;
            left: 14px;
            z-index: 2;
            display: none;
        }

        .col-gauche button {
            width: 100%;
            background-color: #be1d2c;
            color: white;
            border: none;
            font-size: 2rem;
            padding: 10px;
            text-align: left;
        }

        .col-gauche button:hover {
            background-color: #ea404f;
        }

        .container-ingredient {
            padding: 10px 15px 10px 15px;
        }

        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            /*vertical-align: middle;*/
        }

        th {
            color: #636363;
        }

        .custom-select {
            font-size: 16pt;
        }

        @media screen and (max-width: 767px) {

            .modal-cart .modal-body,
            .modal-header-cart {
                width: 100%;
            }

            .modal-cart .modal-content {
                width: 100%;
                padding: 15px;
            }

            #link1 {
                margin: auto;
            }

            .col-gauche {
                width: 100%;
            }

            .col-droite {
                width: 100%;
                border-lefT: none;
                border-top: 1px solid #e5e5e5;
            }

            .col-droite img {
                width: 25rem;
                margin: auto;
                padding-left: 15px;
            }

            .base-perso {
                position: relative;
                z-index: 1;
            }

            .ing-perso {
                position: absolute;
                left: 23px;
                z-index: 2;
            }

            .perso-icon {
                width: 3.5rem;
            }
        }

        .h7.modal-title-cart {
            margin: 0 0 0;
        }

        .nomargin {
            font-size: 24px;
        }

        .img-responsive {
            padding-bottom: 0px !important;
        }

        a.btn.btn-warning {
            background-color: #f0ad4e !important;
            border-color: #eea236 !important;
        }

        a.btn.btn-success {
            color: #fff;
            background-color: #5cb85c !important;
            border-color: #4cae4c !important;
        }

        .btn.btn-info.btn-sm {
            background-color: #5bc0de;
            border-color: #46b8da;
        }
    </style>

</head>
<div id="modalCartUser" class="modal fade">
    <div class="modal-dialog modal-cart">
        <div class="modal-content">
            <div class="modal-header-cart">
                <!-- <h4 class="modal-title-cart">Votre panier</h4> -->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body-cart">
                <div class="containerCartUser">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:50%;font-size:30px">Votre panier</th>
                                <th style="width:10%">Prix</th>
                                <th style="width:8%">Quantitée</th>
                                <th style="width:22%" class="text-center">Sous-total</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>  
        var storage = JSON.parse(sessionStorage.getItem("panier"));
        console.log(storage);
        var prix=0;
        for (var index in storage) {
            let localPrice = (parseFloat(storage[index]["prix"])*parseFloat(storage[index]["quantity"])*100)/100;
            prix += localPrice;
            var tbody = document.createElement('tbody');
            tbody.innerHTML =
                '<tr  onchange="updateListener(this)">' +
                '<td data-th="Acticle' + index + '">' +
                    '<div class="row">' +
                    '<div class="col-sm-2 hidden-xs"><img src="'+ storage[index]["imageSrc"]+  '" alt="..." class="img-responsive"/></div>' +
                    '<div class="col-sm-10">' +
                    '<h7 class="nomargin">' + storage[index]["nom"] + "</h7>" +
                    '<p>' + storage[index]["description"] + "</p>" +
                    '</td>' +
                    '<td data-th="Price">' + storage[index]["prix"] + '</td>' +
                    '<td data-th="Quantity">' +
                    '<input type="number" class="form-control text-center" value="'+storage[index]["quantity"] + '" min="1" max="25">' +
                    '</td>' +
                    '<td data-th="Subtotal" class="text-center price">'+localPrice + '</td>' +
                    '<td class="actions" data-th="">' +
                    //'<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>' +
                    '<button  onclick="removeElementListener(this)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>' +
                '</td>'
            '</tr>';
            document.getElementById("cart").appendChild(tbody);
        }
        var tfoot = document.createElement('tfoot');
        prix = Math.round(prix*100)/100;
            tfoot.innerHTML=    '<tr class="visible-xs">'+
                                    '<td id="prixFinalVisible" class="text-center"><strong>Total '+ prix.toFixed(2) + '</strong></td>'+
                                '</tr>' + 
                                '<tr>' +
                                    '<td><a data-dismiss="modal" aria-hidden="true" class="btn btn-warning"> RETOUR</a></td></button>' +
                                '<td colspan="2" class="hidden-xs"></td>'+
                                '<td id="prixFinalHidden" class="hidden-xs text-center"><strong>Total ' + prix.toFixed(2) +'</strong></td>'+
                                '<td><a onclick="checkConnection()" class="btn btn-success">PAYER </a></td>'+
                            '</tr>';
            document.getElementById("cart").appendChild(tfoot);

            function checkConnection(){                
                //Vérification de la connexion de l'utilisateur (pas connecté: ne peut pas continuer le checkout)
                if(sessionStorage.getItem("userID") != null && sessionStorage.getItem("panier") != null && JSON.parse(sessionStorage.getItem("panier")).length > 0){
                    $("#modalCartUser").modal("toggle");
                    $("#myModalOrderUserChoice").modal("toggle");
                } else {
                    if(sessionStorage.getItem("userID") == null){
                        //Une alerte et le modal de connexion sont affichés                    
                        alert("Il faut être connecté pour passer une commande!");
                        $('#modalCartUser').modal("toggle");                    
                        $('#modalLoginUser').modal("toggle");                        
                    } else if(sessionStorage.getItem("panier") == null || JSON.parse(sessionStorage.getItem("panier")).length == 0){                        
                        alert("Le panier est vide!");
                    }
                }                
            }

            $(document).ready(function (){
                afficherCompteur();
            });
   </script>