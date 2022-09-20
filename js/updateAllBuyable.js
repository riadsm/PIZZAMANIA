//Fonction qui associe un onclick à tous les objets buyable
//Il permet de récupérer leurs nom, description, prix, taille (...) et de les mettre dans le panier
$('document').ready(function(){
    var classes = document.getElementsByClassName("buyable");
    for(var i=0; i<classes.length;i++){
        var c = classes[i];
      //  console.log(c);
        var imageSrc = undefined;
        imageSrc = c.children[0].getElementsByTagName('img')[0].getAttribute("src");
        
        var el = c.getElementsByTagName('a')[0];
        el.setAttribute("data-src",imageSrc);
        
        el.addEventListener("click", function(){
            var parent = $(this).parent();

            if(this.getAttribute("data-is-pizza") != null){
                console.log("is a pizza");
                console.log("src: " + this.getAttribute("data-src"));
                var pizzaSize =parent.find("select").val();
                var prix;
                if(this.getAttribute("data-name") == "Pizza personnalisée"){
                    prix = $('#pizzaPrice-Perso').attr("data-pizza-prix");
                } else {
                    prix = parent.find('h6').last().text().split(" ")[1].slice(0, -1);
                }
                ajouterAuPanier(
                    genererPizza(this.getAttribute("data-name"),
                                this.getAttribute("data-description"),
                                this.getAttribute("data-src"),
                                prix,
                                true,
                                pizzaSize
                                ));
                    //alert("L'élément " + this.getAttribute("data-name") + " a été ajouté!");
                console.log(prix);
            }else{
                var prix = this.getAttribute("data-price");
                if(this.getAttribute("data-name") && this.getAttribute("data-price")){
                    ajouterAuPanier(genererElement(this.getAttribute("data-name"),this.getAttribute("data-description"),this.getAttribute("data-price"),this.getAttribute("data-src")));
                    //alert("L'élément " + this.getAttribute("data-name") + " a été ajouté!");
                }
            }
            
            //Mise à jour visuelle du panier et du prix total
            updatePanier(this.getAttribute("data-name"), this.getAttribute("data-description"), prix, this.getAttribute("data-src"));
          });
    }
});

// Ce qu'il se passe lorsqu'il y a une modification dans le panier
function updateListener(event){
    let tab = $("table").find("tr");
    let index = tab.index(event);
    let quantite = event.getElementsByTagName("input")[0].value;
    
    let quantity = parseInt(quantite);
    updateQuantiteDuPanier(index-1, quantity);
    refreshPrixPanier();
}

function removeElementListener(event){
    
    //<TBody>
    let remove = event.parentElement.parentElement.parentElement;

    //Index
    let tab = $("table").find("tbody");
    let index = tab.index(remove);

    //remove from panier
    retirerDuPanier(index);

    //physical remove
    remove.parentElement.removeChild(remove);   
    
    //notification
        //alert("click");
    //refresh
    refreshPrixPanier();
    afficherCompteur();
}


function refreshPrixPanier(){
    let TR = document.getElementById('cart').getElementsByTagName('tbody');
    let panier = sessionStorage.getItem("panier");
    let tableau = JSON.parse(panier);

    let prixTotal = 0;
    console.log(TR);
    for(let index=0; index < TR.length; index++){
        let p = TR[index];

        //prix brute
        let newPrice = parseFloat(tableau[index]["prix"])* parseFloat(tableau[index]["quantity"]);    
        prixTotal += newPrice;
       
        //prix rafine
        newPrice = Math.round(newPrice*100)/100;

        //update all fields
        p.childNodes[0].childNodes[1].innerHTML = tableau[index]["prix"];
        p.childNodes[0].childNodes[2].childNodes[0].value = tableau[index]["quantity"];
        p.childNodes[0].childNodes[3].innerHTML = newPrice;
    }

    let end = document.getElementById('prixFinalVisible');
    prixTotal = Math.round(prixTotal*100)/100
    end.innerHTML = "<strong>Total " + prixTotal + " $</strong>";

    end = document.getElementById('prixFinalHidden');
    end.innerHTML = "<strong>Total " + prixTotal + " $</strong>";
}


function updatePanier(nom, description, produitPrix, imageSrc){        
    var storage = JSON.parse(sessionStorage.getItem("panier"));
    
    //Récupération de l'index du dernier élément ajouté
    var index = storage.length -1;

    //Mise à jour du prix total
    var prix=0;
    for (var index in storage) {
        prix += parseFloat(storage[index]['prix']);
    }
    
    //Ajout de l'élément au tableau du panier
    var tbody = document.createElement('tbody');
    tbody.innerHTML =
        '<tr onchange="updateListener(this)">' +
        '<td data-th="Acticle-' + index + '">' +
            '<div class="row">' +
            '<div class="col-sm-2 hidden-xs"><img src="'+ imageSrc +  '" alt="..." class="img-responsive"/></div>' +
            '<div class="col-sm-10">' +
            '<h7 class="nomargin">' + nom + "</h7>" +
            '<p>' + description + "</p>" +
            '</td>' +
            '<td data-th="Price">' + produitPrix + '</td>' +
            '<td data-th="Quantity">' +
            '<input type="number" class="form-control text-center" value="1" min="1" max="25">' +
            '</td>' +
            '<td data-th="Subtotal" class="text-center price">'+ produitPrix + '</td>' +
            '<td class="actions" data-th="">' +
            //'<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>' +
            '<button onclick="removeElementListener(this)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>' +
        '</td>'
    '</tr>';
    document.getElementById("cart").insertBefore(tbody, document.getElementById("cart").lastChild);    

    afficherCompteur();   

    //Mise à jour du prix total affiché dans le panier
    refreshPrixPanier();
}