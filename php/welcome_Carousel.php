<?php 
    require_once "./nav.php";
?> 
<!-- <h1 class="m-b-20"><strong>Bienvenue chez PizzaMania <br> Commander vos Pizzas</strong></h1> -->
<!-- <title>Bienvenue PizzaMania</title> -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<head>
    <script src="../js/paiement.js"></script>
    <script src="../js/updateAllBuyable.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
<style type="text/css">
    .split{ /* Bannière image (configuration commune) */
        margin-top: 75px;
        display: flex; 
        height: 100%;
        width: 15%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        /* padding-top: 20px; */
        filter: blur(8px); /* Effet floue (1/2) */ 
        -webkit-filter: blur(8px); /* Effet floue (2/2) */
    }
    .left{ /* Bannière image (configuration gauche) */
        left: 0;
    }
    .right{ /* Bannière image (configuration droite) */
        right: 0;
        -webkit-transform: scaleX(-1); /* Effet mirroir (1/2) */ 
        transform: scaleX(-1); /* Effet mirroir (2/2) */ 
    }
    .perspective-text{
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFFFFF; /* Rouge très pâle */
        overflow: hidden;
        padding-right: 130px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 75px;
        color: white;
        font-family: Arial;
        font-size: 58px;
        font-weight: 900;
        letter-spacing: -2px;
        text-transform: uppercase;
    }
    .perspective-line{
        height: 50px;
        overflow: hidden;
        position: relative;
    }
    .p-Welcome-Carousel{
        margin: 0;
        height: 50px;
        line-height: 46px;
        transition: all 0.5s ease-in-out;
    }
    .perspective-line:nth-child(odd){
        transform: skew(60deg, -30deg) scaleY(0.667);
    }
    .perspective-line:nth-child(even){
        transform: skew(0deg, -30deg) scaleY(1.337);
    }
    .perspective-text:hover p{
        transform: translate(0, -50px);
    }
    .perspective-line:nth-child(1){
        left: 29px;
    }
    .perspective-line:nth-child(2){
        left: 58px;
        background: #8E1823; /* Rouge foncé */
    }
    .perspective-line:nth-child(3){
        left: 87px;
        background: #18191A;/* Noir pâle */ 
    }
    .perspective-line:nth-child(4){
        left: 116px;
        background: #1A7D1F; /* Vert */ 
    }
    .perspective-line:nth-child(5){
        left: 145px;
    }
    h2{
        font-family: 'Oswald', sans-serif;
        color: #000;
        font-size: 26px;
        font-weight: 300;
        text-align: center;
        text-transform: uppercase;
        position: relative;
        margin: 30px 0 80px;
    }
    b{
        font-family: 'Oswald', sans-serif;
        color: #ffc000; /* Jaune */ 
    }
    h2::after{
        content: "";
        width: 100px;
        position: absolute;
        margin: 0 auto;
        height: 4px;
        background: rgba(0, 0, 0, 0.2);  /* Convertir en code pour uniformisation */
        left: 0;
        right: 0;
        bottom: -20px;
    }
    .carousel{
        margin: 50px auto;
        padding: 0 70px;
    }
    .carousel .item{
        min-height: 330px;
        text-align: center;
        overflow: hidden;
    }
    .carousel .item .img-box{
        height: 160px;
        width: 100%;
        position: relative;
    }
    /*.carousel .item img{	
        max-width: 100%;
        max-height: 100%;
        display: inline-block;
        position: absolute;
        bottom: 0;
        margin: 0 auto;
        left: 0;
        right: 0;
    }*/
    .carousel .item h4{
        font-size: 18px;
        margin: 10px 0;
    }
    .carousel .item .btn{
        font-family: 'Oswald', sans-serif;
        color: #333;
        border-radius: 3px;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: bold;
        background: none;
        border: 1px solid #ccc;
        padding: 5px 10px;
        margin-top: 5px;
        line-height: 16px;
    }
    .carousel .item .btn:hover, .carousel .item .btn:focus{
        font-family: 'Oswald', sans-serif;
        color: #fff;
        background: #000;
        border-color: #000;
        box-shadow: none;
    }
    .carousel .item .btn i{
        font-family: 'Oswald', sans-serif;
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
    }
    .carousel .thumb-wrapper{
        font-family: 'Oswald', sans-serif;
        text-align: center;
    }
    .carousel .thumb-content{
        font-family: 'Oswald', sans-serif;
        padding: 15px;
    }
    .carousel .carousel-control{
        height: 100px;
        width: 40px;
        background: none;
        margin: auto 0;
        background: rgba(0, 0, 0, 0.2);  /* Convertir en code pour uniformisation */
    }
    .carousel .carousel-control i{
        font-size: 30px;
        position: absolute;
        top: 50%;
        display: inline-block;
        margin: -16px 0 0 0;
        z-index: 5;
        left: 0;
        right: 0;
        color: rgba(0, 0, 0, 0.8); /* Convertir en code pour uniformisation */
        text-shadow: none;
        font-weight: bold;
    }
    .carousel .item-price{
        font-family: 'Oswald', sans-serif;
        font-size: 13px;
        padding: 2px 0;
    }
    .carousel .item-price strike{
        font-family: 'Oswald', sans-serif;
        color: #999;
        margin-right: 5px;
    }
    .carousel .item-price span{
        font-family: 'Oswald', sans-serif;
        color: #86bd57;
        font-size: 110%;
    }
    .carousel .carousel-control.left i{
        margin-left: -3px;
    }
    .carousel .carousel-control.left i{
        margin-right: -3px;
    }
    .carousel .carousel-indicators{
        bottom: -50px;
    }
    .carousel-indicators li, .carousel-indicators li.active{
        width: 10px;
        height: 10px;
        margin: 4px;
        border-radius: 50%;
        border-color: transparent;
    }
    .carousel-indicators li{	
        background: rgba(0, 0, 0, 0.2);  /* Convertir en code pour uniformisation */
    }
    .carousel-indicators li.active{
        background: rgba(0, 0, 0, 0.6);  /* Convertir en code pour uniformisation */
    }
    .img-responsive-sides-welcome-carousel{
        width: 400px;
        margin-bottom: 180px;
        margin-top: 15px;
    }
    .fa-angle-right:before {
        transform: rotate(180deg);
        display: inline-block;
    }

    .fa-angle-double-right, .lien-menu {
        transition: .3s;
    }    
    
    .lien-menu:hover .fa-angle-double-right{
        transform: translateX(80%);                
    }
    
    .lien-menu:hover {
        transform: translateX(2%);
    }

</style>
</head>
    <!-- Centre -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Bannière image (1/2) : gauche 
                <div class="split left">
                    <img src="../images/photos/shaian-ramesht-exSEmuA7R7k-unsplash.jpg" class="img-responsive-sides-welcome-carousel">
                </div>-->
                <!-- Bannière image (2/2) : droite 
                <div class="split right">
                    <img src="../images/photos/shaian-ramesht-exSEmuA7R7k-unsplash.jpg" class="img-responsive-sides-welcome-carousel">
                </div>-->
                <div class="perspective-text">
                    <div class="perspective-line">
                        <p class="p-Welcome-Carousel">! ! ! ! ! !</p>
                        <p class="p-Welcome-Carousel">MANIA</p>
                    </div>
                    <div class="perspective-line">
                        <p class="p-Welcome-Carousel">PIZZA</p>
                        <p class="p-Welcome-Carousel">! ! ! ! ! !</p>
                    </div>
                    <div class="perspective-line">
                        <p class="p-Welcome-Carousel">MANIA</p>
                        <p class="p-Welcome-Carousel">PIZZA</p>
                    </div>
                    <div class="perspective-line">
                        <p class="p-Welcome-Carousel">! ! ! ! ! !</p>
                        <p class="p-Welcome-Carousel">MANIA</p>
                    </div>
                    <div class="perspective-line">
                        <p class="p-Welcome-Carousel">PIZZA</p>
                        <p class="p-Welcome-Carousel">! ! ! ! ! !</p>
                    </div>
                    </div>

                    <!-- <h1>Bienvenue chez PizzaMania</h1> -->
                    <!-- <h1><span>PIZZA</span><span>MANIA !!!</span></h1> -->
                    <h2>Nos <b>PROMOS!</b></h2>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Indicateurs du carrousel -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>                        
                    </ol>   
                    <!-- "Wrapper" pour les items du carrousel -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="text-center menu-case buyable" id="container-Toute-Garnie-Promo">    
                                            <div class="menu-border">
                                                <img class="menu-img-pizza" src="../images/elements/choix_pizza_toute_garnie.png"><h4>TOUTE GARNIE 14"</h4><h6>Pepperoni, poivrons verts, champignons, oignons blancs, tomates, mozzarella, sauce aux tomates</h6>
                                                <h6 data-pizza-prix="10.99" id="pizzaPrice-Toute-Garnie-promo" class="item-price"><strike>11.99$</strike> <span>10.99$</span></h6>
                                                <br>
                                                <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name='Toute Garnie 14" Promo' data-description="Pepperoni, poivrons verts, champignons, oignons blancs, tomates, mozzarella, sauce aux tomates" data-is-pizza="true">Commander !</a>                                            
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="text-center menu-case buyable" id="container-Marinana-Promo">    
                                            <div class="menu-border">
                                                <img class="menu-img-pizza" src="../images/elements/choix_pizza_marinara.png"><h4>MARINARA 20"</h4><h6>Tomates, ail, origan et basilic</h6>
                                                <h6 data-pizza-prix="15.99" id="pizzaPrice-Marinara-Promo" class="item-price"><strike>17.99$</strike> <span>15.99$</span></h6>
                                                <br>
                                                <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name='Marinara 20" Promo' data-description="Tomates, ail, origan et basilic" data-is-pizza="true">Commander !</a>                                            
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="text-center menu-case buyable" id="container-Chicago-Promo">    
                                            <div class="menu-border">
                                                <img class="menu-img-pizza" src="../images/elements/choix_pizza_chicago.png"><h4>CHICAGO 12"</h4><h6>Boeuf haché, saucisses, pepperoni, oignons blancs, champignons placés sur une sauce aux tomates</h6>
                                                <h6 data-pizza-prix="8.99" id="pizzaPrice-Chicago-Promo" class="item-price"><strike>9.99$</strike> <span>8.99$</span></h6>
                                                <br>
                                                <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name='Chicago 12" Promo' data-description="Boeuf haché, saucisses, pepperoni, oignons blancs, champignons placés sur une sauce aux tomates" data-is-pizza="true">Commander !</a>                                            
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="text-center menu-case buyable" id="container-Dragonborn-Promo">    
                                            <div class="menu-border">
                                                <img class="menu-img-pizza" src="../images/elements/choix_pizza_piquante.png"><h4>DRAGONBORN 14"</h4><h6>Extrêmement épiciée, cette pizza est constituée de piments jalapenos, oignons rouges, mozzarella sur une sauce aux tomates; elle est faite pour les intrépides!</h6>
                                                <h6 data-pizza-prix="10.99" id="pizzaPrice-Dragonborn-Promo" class="item-price"><strike>12.99$</strike> <span>10.99$</span></h6>
                                                <br>
                                                <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name='Dragonborn 14" Promo' data-description="Extrêmement épiciée, cette pizza est constituée de piments jalapenos, oignons rouges, mozzarella sur une sauce aux tomates; elle est faite pour les intrépides!" data-is-pizza="true">Commander !</a>                                            
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                            <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="text-center menu-case buyable" id="container-Québécoise-Promo">    
                                            <div class="menu-border">
                                                <img class="menu-img-pizza" src="../images/elements/choix_pizza_quebecoise.png"><h4>QUÉBÉCOISE 20"</h4><h6>Bacon, pepperoni, champignons, oignons blancs, piments forts, mozzarella, sauce aux tomates</h6>
                                                <h6 data-pizza-prix="15.99" id="pizzaPrice-Québécoise-promo" class="item-price"><strike>17.99$</strike> <span>15.99$</span></h6>
                                                <br>
                                                <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name='Québécoise 20" Promo' data-description="Bacon, pepperoni, champignons, oignons blancs, piments forts, mozzarella, sauce aux tomates" data-is-pizza="true">Commander !</a>                                            
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="text-center menu-case buyable" id="container-Hawaienne-Promo">    
                                            <div class="menu-border">
                                                <img class="menu-img-pizza" src="../images/elements/choix_pizza_hawaienne.png"><h4>HAWAÏENNE 7"</h4><h6>Jambon, bacon, ananas, mozzarella, sauce aux tomates</h6>
                                                <h6 data-pizza-prix="1.99" id="pizzaPrice-Hawaïenne-Promo" class="item-price"><strike>2.99$</strike> <span>1.99$</span></h6>
                                                <br>
                                                <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name='Hawaïenne 7" Promo' data-description="Jambon, bacon, ananas, mozzarella, sauce aux tomates" data-is-pizza="true">Commander !</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="text-center menu-case buyable" id="container-Fan-de-Viande-Promo">    
                                            <div class="menu-border">
                                                <img class="menu-img-pizza" src="../images/elements/choix_pizza_fan_viande.png"><h4>FAN DE VIANDE 14"</h4><h6>Boeuf haché, poulet, saucisses, bacon, parmesan, mozzarella, sauce aux tomates</h6>
                                                <h6 data-pizza-prix="11.49" id="pizzaPrice-Fan-de-Viande-Promo" class="item-price"><strike>12.99$</strike> <span>11.49$</span></h6>
                                                <br>
                                                <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name='Fan de Viande 14" Promo' data-description="Boeuf haché, poulet, saucisses, bacon, parmesan, mozzarella, sauce aux tomates" data-is-pizza="true">Commander !</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="text-center menu-case buyable" id="container-César-Promo">    
                                            <div class="menu-border">
                                                <img class="menu-img-pizza" src="../images/elements/choix_pizza_cesar.png"><h4>CÉSAR 20"</h4><h6>Ail, parmesan, oignons rouges, tomates, poulet, mozzarella, sauce alfredo</h6>
                                                <h6 data-pizza-prix="17.49" id="pizzaPrice-César-Promo" class="item-price"><strike>19.99$</strike> <span>17.49$</span></h6>
                                                <br>
                                                <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name='César 14" Promo' data-description="Ail, parmesan, oignons rouges, tomates, poulet, mozzarella, sauce alfredo" data-is-pizza="true">Commander !</a>                                           
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contrôles du Carrousel -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="text-center col-12"><h2>NOS <b>CLASSIQUES!</b></h2></div>            
            <div class="col-3"></div><div class="col-2 text-center menu-case buyable" id="container-Toute-Garnie">
                <div class="menu-border">
                    <img class="menu-img-pizza" src="../images/elements/choix_pizza_toute_garnie.png"><h4>TOUTE GARNIE 16"</h4><h6>Pepperoni, poivrons verts, champignons, oignons blancs, tomates, mozzarella, sauce aux tomates</h6>
                    <h6 data-pizza-prix="14.49" id="pizzaPrice-Toute-Garnie">Prix <strong>14.49$</strong></h6>
                    <br>
                    <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name="Toute Garnie" data-description="Pepperoni, poivrons verts, champignons, oignons blancs, tomates, mozzarella, sauce aux tomates" data-is-pizza="true">Commander !</a>
                </div>
            </div>   
            <div class="col-2 text-center menu-case buyable" id="container-Deluxe">
                <div class="menu-border">
                    <img class="menu-img-pizza" src="../images/elements/choix_pizza_deluxe.png"><h4>DELUXE 16"</h4><h6>Poivrons verts, poivrons jaunes, bacon, olives vertes, champignons, pepperoni, mozzarella, sauce aux tomates</h6>
                    <h6 data-pizza-prix="14.49" id="pizzaPrice-Deluxe">Prix <strong>14.49$</strong></h6>
                    <br>
                    <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name="Deluxe" data-description="Poivrons verts, poivrons jaunes, bacon, olives vertes, champignons, pepperoni, mozzarella, sauce aux tomates" data-is-pizza="true">Commander !</a>
                </div>
            </div>
            <div class="col-2 text-center menu-case buyable" id="container-Québécoise">
                <div class="menu-border">
                    <img class="menu-img-pizza" src="../images/elements/choix_pizza_quebecoise.png"><h4>QUÉBÉCOISE 16"</h4><h6>Bacon, pepperoni, champignons, oignons blancs, piments forts, mozzarella, sauce aux tomates</h6>
                    <h6 data-pizza-prix="14.49" id="pizzaPrice-Québécoise">Prix <strong>14.49$</strong></h6>
                    <br>
                    <a href="#modalCartUser" data-toggle="modal" class="btn btn-info btn-lg btn-primary" data-name="Québécoise" data-description="Bacon, pepperoni, champignons, oignons blancs, piments forts, mozzarella, sauce aux tomates" data-is-pizza="true">Commander !</a>
                </div>
            </div><div class="col-3"></div>
            <div class="col-3"></div>
            <div class="lien-menu col-6 text-left"><h6><a href="./menu.php"><br></br><u>VOIR TOUT LE MENU</u><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></h6></div>
            <div class="col-3"></div>            
        </div>        
        <hr>
    </div>
    <div class="spacer"></div>
<?php 
    include("footer.php");
?> 
