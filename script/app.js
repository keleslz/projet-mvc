var del = document.querySelectorAll("#suppr");
console.log(del);

/**
 * supprime ou non selon le choix de l'utilisateur
 * 
 * si @false rien est supprimé sinon on supprime
 */
function delOrNo(){
    
    del[0].addEventListener("click", function(e){
        var conf = confirm('voulez vous supprimer ce joueur ?');
        
        if(conf == false){
    
            e.preventDefault();
        } else {
            alert ('joueur supprimé')
        }
    }) 
}

delOrNo();