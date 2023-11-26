function validerForm()
{
    var erreurN="";
    var erreurP="";
    var erreurT="";
    var erreurE="";
    var erreurMotDePasse="";
    var emailVal = email.value;

    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var numero = document.getElementById("numTel").value;
    var mdp = document.getElementById('mdp').value;
    var repeterMdp = document.getElementById('repetermdp').value;
    var erreurMotDePasse = document.getElementById('erreurMotDePasse');
    var erreurE = document.getElementById("erreurEmail");
   

    var regexNom = /^[A-Za-z]+$/; 
    var regexTel = /^[0-9]{8}$/; 
    var regexEmail = /@gmail\.com$/; 
    
    if (!regexNom.test(nom)) {
        erreurN = "Le nom ne doit contenir que des lettres.";
        document.getElementById("erreurNom").innerHTML = erreurN;
    } else {
        document.getElementById("erreurNom").innerHTML = "<span style='color:green'>Correct</span>";
    }
    if (!regexNom.test(prenom)) {
        erreurP = "Le prénom doit ne doit contenir que des lettres.";
        document.getElementById("erreurPrenom").innerHTML = erreurP;
    } else {
        document.getElementById("erreurPrenom").innerHTML = "<span style='color:green'>Correct</span>";
    }
    if (regexEmail.test(emailVal)) {
        erreurE.innerHTML = "<span style='color:green'>Adresse e-mail valide.</span>";
    } else {
        erreurE.innerHTML = "<span style='color:red'>Adresse e-mail invalide.</span>";
    }
    if (!regexTel.test(numero)) {
        erreurT = "Le numéro de téléphone doit contenir exactement 8 chiffres.";
        document.getElementById("erreurTelephone").innerHTML = erreurT;
    } else {
        document.getElementById("erreurTelephone").innerHTML = "<span style='color:green'>Correct</span>";
    }
    
    if (mdp !== repeterMdp) {
        erreurMotDePasse.innerHTML = "Les mots de passe ne correspondent pas.";
    } else {
        erreurMotDePasse.innerHTML = "<span style='color:green'>Correct</span>"; 
    }
    
    if (erreurN || erreurP || erreurT || erreurMotDePasse || erreurE ) 
    {
        return false;
    }
    else 
    {
        return true;
    }
   
    
}
/*function validerNom() {
    var erreurN="";
    var nom = document.getElementById("nom").value;
    var regexNom = /^[A-Za-z]+$/; // Expression régulière pour vérifier les lettres

    if (!regexNom.test(nom)) {
        erreurN = "Le nom ne doit contenir que des lettres.";
        document.getElementById("erreurNom").innerHTML = erreurN;
    } else {
        document.getElementById("erreurNom").innerHTML = "<span style='color:green'>Correct</span>";
    }
   // return erreurN;
}

function validerPrenom() {
    var erreurP="";
    var prenom = document.getElementById("prenom").value;

    if (prenom.length < 1) {
        erreurP = "Le prénom doit avoir au moins 1 caractère.";
        document.getElementById("erreurPrenom").innerHTML = erreurP;
    } else {
        document.getElementById("erreurPrenom").innerHTML = "<span style='color:green'>Correct</span>";
    }
   // return erreurP;
}

function validerTelephone() {
    var erreurT="";
    var numero = document.getElementById("numTel").value;
    var regexTel = /^[0-9]{8}$/; // Expression régulière pour vérifier 8 chiffres

    if (!regexTel.test(numero)) {
        erreurT = "Le numéro de téléphone doit contenir exactement 8 chiffres.";
        document.getElementById("erreurTelephone").innerHTML = erreurT;
    } else {
        document.getElementById("erreurTelephone").innerHTML = "<span style='color:green'>Correct</span>";
    }
   // return erreurT;
}
function validerFormulaire() {
    var erreurMotDePasse="";
    var mdp = document.getElementById('mdp').value;
    var repeterMdp = document.getElementById('repetermdp').value;
    var erreurMotDePasse = document.getElementById('erreurMotDePasse');

    if (mdp !== repeterMdp) {
        erreurMotDePasse.innerHTML = "Les mots de passe ne correspondent pas.";
    } else {
        erreurMotDePasse.innerHTML = "<span style='color:green'>Correct</span>"; 
    }
   // return erreurMotDePasse;
}

var email = document.getElementById("email");
email.addEventListener("keyup", function() {
    var emailVal = email.value;
    var regexEmail = /@gmail\.com$/; // Expression régulière pour vérifier l'email

    var erreurE = document.getElementById("erreurEmail");

    if (regexEmail.test(emailVal)) {
        erreurE.innerHTML = "<span style='color:green'>Adresse e-mail valide.</span>";
    } else {
        erreurE.innerHTML = "<span style='color:red'>Adresse e-mail invalide.</span>";
    }
});*/
/*
document.getElementById("formulaireInscription").addEventListener("submit", function(e) {
    var erreurN = validerNom();
    var erreurP= validerPrenom();
    var erreurT= validerTelephone();
    var erreurMotDePasse = validerFormulaire();
    if (erreurN || erreurP || erreurT || erreurMotDePasse) {
        e.preventDefault(); // Empêche l'envoi du formulaire si des erreurs sont présentes
    }
});*/