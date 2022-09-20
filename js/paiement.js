// Contient les méthodes qui permettent de gérer le panier


//Les elements devront etre sous le format:
// var element = {"nom":"...", "description":"...", "prix": 14.99};
// il est possible de générer un élément avec "genererElement(...)"

//Récupérer:
// sessionStorage.getItem("panier") donne un tableau d'éléments ci-haut sous format JSON
//  JSON.parse() permet de récupérer le tableau réel
function ajouterAuPanier(element){   
    var panier = sessionStorage.getItem("panier");
    if(panier == null){
        var tab = [];
        tab.push(element);
        sessionStorage.setItem("panier",JSON.stringify(tab));
    }else{
        var tableau = [];
        tableau = JSON.parse(panier);
        tableau.push(element);
        sessionStorage.setItem("panier",JSON.stringify(tableau));
    }
}

function updateQuantiteDuPanier(index, value){
    var panier = sessionStorage.getItem("panier");
    tableau = JSON.parse(panier);
    tableau[index]["quantity"] = parseInt(value);
    sessionStorage.setItem("panier",JSON.stringify(tableau));
}
function retirerDuPanier(index){
    var panier = sessionStorage.getItem("panier");
    var tab = [];
    tab = JSON.parse(panier);
    tab.splice(index,1);
    sessionStorage.setItem("panier",JSON.stringify(tab));
}

function afficherCompteur(){
    /* Affichage du compteur d'items en avant du panier */
    var nbItems;

    if(sessionStorage.getItem("panier") != null){ 
        var panierNav = JSON.parse(sessionStorage.getItem("panier"));
        nbItems = panierNav.length;
    } 
    if(nbItems > 0) {
        document.getElementById("cpt-items").innerHTML = nbItems;
    } else {
        document.getElementById("cpt-items").innerHTML = "";
    }
}

function afficherPanier(){
    var panier = sessionStorage.getItem("panier");

    panier = JSON.parse(panier);
    console.log(panier);
    for(var index in panier){
        console.log(panier[index]);
    }
}
function genererPizza(nom, description, imageSrc,prix,isPizza, size){
    quantity = 1;
    return {nom,description,imageSrc,prix, isPizza, size,quantity};
}
function genererElement(nom, description, prix, imageSrc){
    quantity = 1;
    return {nom,description,prix,imageSrc, quantity};
}

function clearPanier(){
    sessionStorage.clear();
}

function getPrixFinal(){
    var panier = sessionStorage.getItem("panier");
    panier = JSON.parse(panier);

    prix=0;
    for(let el in panier){
        prix += (panier[el]["quantite"]*panier[el]["prix"]*100)/100;
    }
    return prix;
}