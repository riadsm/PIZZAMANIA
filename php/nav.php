<?php 
    require_once './header.php';
    require_once './find_PizzaMania.php';
    require_once './login_User.php';
    require_once './register_User.php';
    require_once './cgu.php';
    require_once './politique.php'; 
    require_once './cart_User.php';
    require_once "./order_User_Choice.php";
    require_once './a_propos.php';
    require_once './carriere.php';
    require_once './confirm_order.php';    
?>

<?php if(isset($_GET['clear']) && (isset($_SERVER['HTTP_REFERER'])) && (strpos($_SERVER['HTTP_REFERER'], "payment_User") !== false)){ ?>
        <script>
            sessionStorage.removeItem("panier");
            sessionStorage.removeItem("livraison");
            $('#confirmOrder').modal("toggle");
			$('#cart tbody').remove();
			$('#prixFinalHidden').html('<strong>Total 0.00</strong>');
        </script>
<?php } ?>
<!-- MENU DU SITE -->
<div id="div-menu">
    <div style="display: inline-block;"><img id="img-logo" src="../images/elements/logo_pizzamania.png"></div>
     
    <div class="dropdown">
        <!-- Bouton HTML (redirection de page vers l'accueil) -->
        <a href="./welcome_Carousel.php"><div class="dropbtn" id="dropbtn1">ACCUEIL</div></a>
    </div>     
    <div class="dropdown" id="dropdown1">
        <a href="./menu.php"><div class="dropbtn" id="dropbtn3">MENU<span class="caret"></span></div></a>
        <div class="dropdown-content" id="dropdown-content1">
            <a href="./menu.php#pizza">Pizzas</a>
            <a href="./menu.php#perso">Votre pizza</a>
            <a href="./menu.php#cote">À-côtés</a>
        </div>
    </div>  
    <div class="dropdown" id="dropdown2">
        <a href="#"><div class="dropbtn" id="dropbtn4">INFORMATION<span class="caret"></span></div></a>
        <div class="dropdown-content" id="dropdown-content2">
            <a href="#modalFindPizzaMania" data-toggle="modal">Trouver un restaurant</a>             
            <a href="#modalApropos" data-toggle="modal">À propos</a>            
        </div>
    </div>
    <div class="dropdown">
        <a href="#modalCarriere" data-toggle="modal"><div class="dropbtn" id="dropbtn2">CARRIÈRE</div></a>
    </div>     
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){ ?>
        <div class="dropdown" id="dropdown3">
            <a href="./deconnexion.php"><div class="dropbtn" id="dropbtn5">DÉCONNEXION</div></a>        
        </div>
    <?php } else { ?>
    <!-- Suppression de l'item 'userID' dans sessionStorage s'il existe -->
    <script>sessionStorage.removeItem("userID");</script>
    <div class="dropdown" id="dropdown3">
        <a href="#"><div class="dropbtn" id="dropbtn5">CONNEXION<span class="caret"></span></div></a>
        <div class="dropdown-content" id="dropdown-content3">
            <!-- Bouton HTML (redirection de page vers la création d'un compte utilisateur, pop-up) -->
            <!-- <a href="./register_User.php">Enregistrez-vous!</a>-->
            <a href="#modalRegisterUser" data-toggle="modal">Enregistrez-vous!</a>   
            <!-- Bouton HTML (déclencher le login, pop-up) -->
            <a href="#modalLoginUser" data-toggle="modal">Connectez-vous!</a>            
        </div>
    </div>
    <?php } ?>
    <div class="dropdown">
        <a href="#modalCartUser" data-toggle="modal"><div class="dropbtn" id="dropbtn6" style="font-size:32px;color:white"><i class="fa fa-shopping-cart"><span id="cpt-items"></span></i></div></a>
    </div> 
</div>
<!-- Top Navigation Menu -->
<div class="topnav">
    <a href="./welcome_Carousel.php" class="active-nav">PizzaMania</a>

    <div id="myLinks">
        <a href="./welcome_Carousel.php">ACCUEIL</a>
        
        <a href="#" id="topnav-menu" onclick="showSubMenu('#menu')">MENU<span class="caret"></span></a>
        <div class="topnav-sub" id="menu">
            <a href="./menu.php#pizza">Pizza</a>
            <a href="./menu.php#perso">Votre pizza</a>
            <a href="./menu.php#cote">À-côtés</a>            
        </div>
    <a href="#" onclick="showSubMenu('#info')">INFORMATION<span class="caret"></span></a> 
    <div class="topnav-sub" id="info">
        <a href="#modalFindPizzaMania" data-toggle="modal">Trouver un restaurant</a>  
        <a href="#modalApropos" data-toggle="modal">À propos</a>            
    </div>      
    <a href="#modalCarriere" data-toggle="modal">CARRIÈRE</a>     
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){ ?>       
        <a href="./deconnexion.php">DÉCONNEXION</a>
    <?php } else { ?>
        <a href="#" onclick="showSubMenu('#connexion')">CONNEXION<span class="caret"></span></a>
            <div class="topnav-sub" id="connexion">
                <a href="#modalRegisterUser" data-toggle="modal">Enregistrez-vous!</a>  
                <a href="#modalLoginUser" data-toggle="modal">Connectez-vous!</a>                    
            </div>
    <?php } ?>
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="showMobileMenu()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<script>
    $(document).ready(function(){
   
    });
    
    function showSubMenu(id){        
            $('.topnav-sub').hide();
            $(id).show();
    } 
    
</script>
<script>
    /* Activation du menu mobile en-dessous d'une certaine résolution */
    function showMobileMenu() {
      var x = document.getElementById("myLinks");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }
</script>

<!-- FIN MENU -->