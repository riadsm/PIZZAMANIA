<?php
// Inclusion des fichiers
require_once "./fonctions.php";

//require_once "./nav.php";
$coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);    
mysqli_set_charset($coo, 'utf8');
?>
<!-- CSS À RÉVISER: CE N'EST PAS TOUTES LES OPTIONS CONFIGURÉES QUI APPARAISSENT (BIEN IDENTIFIER LES CLASS ET LES RENDRE UNIQUE) -->
    <style type="text/css">
        section{
            margin: 30px 0 -15px;
            display: flex;
            flex-flow: row wrap;
        }
        section > div{
            flex: 1;
            /*padding-left: 55px;
            padding-right: 55px;*/
        }
        .radio-Order-User-Choice{
            display: none;
            &:not(:disabled) ~ label{
            cursor: pointer;
            }
            &:disabled ~ .label-Order-User-Choice{
            color: hsla(150, 5%, 75%, 1);
            border-color: hsla(150, 5%, 75%, 1);
            box-shadow: none;
            cursor: not-allowed!;
            }
        } 
        h5{
            /*padding: 20px;*/
            font-family: 'Oswald', sans-serif;
            text-align: center;
            font-size: 26px;
            /*margin: 30px 0 -15px;*/
        } 
        h3{
            font-family: 'Oswald', sans-serif;
            font-size: 20px;
            font-weight: 300;
            text-align: center;
            text-transform: uppercase;
            position: relative;
            margin: 30px 0 80px;
        }
        .label-Order-User-Choice{
            font-family: 'Oswald', sans-serif !important;
            height: 100% !important;
            display: block !important;
            border: 2px solid #EA404F !important; /* Rouge pâle */
            border-radius: 20px !important;
            padding: 1rem !important;
            margin-bottom: 1rem !important;
            margin: 1rem !important;
            text-align: center !important;
            box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5) !important;
            position: relative !important;
        }
        .radio-Order-User-Choice:checked + .label-Order-User-Choice{
            background: #8E1823 !important; /* Rouge foncé */
            color: hsla(215, 0%, 100%, 1) !important;
            box-shadow: 0px 0px 20px #BE1D2C !important; /* Rouge Header */
            &::after {
            color: hsla(215, 5%, 25%, 1) !important;
            font-family: FontAwesome !important;
            border: 2px solid #8E1823 !important; /* Rouge foncé */
            content: "\f00c" !important;
            font-size: 24px !important;
            position: absolute !important;
            top: -25px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            height: 50px !important;
            width: 50px !important;
            line-height: 50px !important;
            text-align: center !important;
            border-radius: 50% !important;
            background: white !important;
            box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25) !important;
            }
        }
        /*input[type="radio"]#control_05:checked + label{
            background: red;
            border-color: red;
        }*/
        /*p {
            font-weight: 900;
        }*/

        @media only screen and (max-width: 700px){
            section {
                flex-direction: column;
            }
        }
        .modal-footer {
            display: unset; /* Bouton du footer avec toute la largeur possible */
            margin-top: 15px;
        }
        .modal-footer .btn{
            font-family: 'Oswald', sans-serif;
            min-height: 40px;
            border-radius: 3px; 
            background: #BE1D2C; /* Rouge Header */
            border-color: #8E1823; /* Rouge foncé */
            color: #FFFF; /* Blanc */
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            /* border: none; */
            font-weight: bold;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            text-align: center;
            margin: auto;
        }
        .modal-footer .btn:hover, .modal-footer .btn:focus{
            min-height: 40px;
            border-radius: 3px; 
            background: #8E1823; /* Rouge foncé */
            color: #FFFF; /* Blanc */
        }
        /*.trigger-btn{
            display: inline-block;
            margin: 100px auto;
        }*/
        .modal-header .close{
            margin-top: -2px;
        }
        .img-responsive{
            border-radius: 15px;
        }
</style>                          
<!-- Décommenter pour tester : Lance le modal avec un bouton -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalOrderUserChoice">Commander !</button> -->
<!-- Modal (pop-up) -->
<div class="modal fade" id="myModalOrderUserChoice" role="dialog">
    <div class="modal-dialog">
        <!-- Contenu du Modal (pop-up) -->
        <div class="modal-content">
            <div class="modal-header">
                <h5>Faites-votre choix!</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title"></h6>
            </div>
            <div class="modal-body">
                <section>
                    <div>
                        <input class="radio-Order-User-Choice" type="radio" id="control_01" name="select" value="recuperation" checked>
                        <label class="label-Order-User-Choice" for="control_01">
                            <div class="img-box-Order-User-Choice">
                                <h3>Pour emporter !<img src="../images/choices/pickup_Order_Choice.png" class="img-responsive" alt=""></h3>
                            </div>   
                        </label>
                    </div>
                    <div>
                        <input class="radio-Order-User-Choice" type="radio" id="control_02" name="select" value="livraison">
                        <label class="label-Order-User-Choice" for="control_02">
                            <div class="img-box-Order-User-Choice">
                                <h3>Pour livrer !<img src="../images/choices/delivery_Order_Choice.png" class="img-responsive" alt=""></h3>
                            </div>  
                        </label>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <a href="./payment_User.php">
                    <button id="confirmer" type="button" class="btn btn-block btn-lg">Confirmer</button>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- confirmer onclick -->
<script>
    document.getElementById("confirmer").addEventListener("click",function(){
       sessionStorage.setItem("livraison", document.querySelector('input[name="select"]:checked').value);
    });

</script>