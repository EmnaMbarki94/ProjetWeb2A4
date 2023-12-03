
function validateForm() {
    var adresse_cabinet = document.getElementById("adresse_cabinet").value;
    var specialite = document.getElementById("specialite").value;
   
    var regexAdresse = /^[A-Za-z]+$/; // Expression régulière pour vérifier les lettres
    var erreurAdresse = "";
    var erreurSpecialite = "";
    

    if (!regexAdresse.test(adresse_cabinet)) 
    {
        erreurAdresse = "L'adresse du cabinet ne doit contenir que des lettres.";
        document.getElementById("erreurAdresse").innerHTML = erreurAdresse;
    } else {
        document.getElementById("erreurAdresse").innerHTML = "";
    }

    if (!regexAdresse.test(specialite)) {
        erreurSpecialite = "Veuillez entrer une specialite valide.";
        document.getElementById("erreurSpecialite").innerHTML = erreurSpecialite;
    } else {
        document.getElementById("erreurSpecialite").innerHTML = "";
    }

   
    

    // Si une des validations échoue, on empêche le formulaire de se soumettre
    if (erreurSpecialite||erreurAdresse ) {
        return false;
    }

    // Si tout est correct, le formulaire se soumet normalement
    return true;
}
