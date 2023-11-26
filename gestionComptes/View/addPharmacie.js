function validerForm()
{
    var erreurN="";
    var erreurT="";
    var erreurE="";
    var erreurMotDePasse="";
    var emailVal = email.value;

    var nom = document.getElementById("nomPh").value;
    var numero = document.getElementById("numPh").value;
    var mdp = document.getElementById('mdp').value;
    var repeterMdp = document.getElementById('repetermdp').value;
    var erreurMotDePasse = document.getElementById('erreurMotDePasse');
    var erreurE = document.getElementById("erreurEmail");

    var regexNom = /^[A-Za-z]+$/; // Expression régulière pour vérifier les lettres
    var regexTel = /^[0-9]{8}$/; // Expression régulière pour vérifier 8 chiffres
    var regexEmail = /@gmail\.com$/; // Expression régulière pour vérifier l'email
    
    if (!regexNom.test(nom)) {
        erreurN = "Le nom ne doit contenir que des lettres.";
        document.getElementById("erreurNom").innerHTML = erreurN;
    } else {
        document.getElementById("erreurNom").innerHTML = "<span style='color:green'>Correct</span>";
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

    if (regexEmail.test(emailVal)) {
        erreurE.innerHTML = "<span style='color:green'>Adresse e-mail valide.</span>";
    } else {
        erreurE.innerHTML = "<span style='color:red'>Adresse e-mail invalide.</span>";
    }
    if (erreurN  || erreurT || erreurMotDePasse|| erreurE) 
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
    var nom = document.getElementById("nomPh").value;
    var regexNom = /^[A-Za-z]+$/; // Expression régulière pour vérifier les lettres

    if (!regexNom.test(nom)) {
        erreurN = "Le nom ne doit contenir que des lettres.";
        document.getElementById("erreurNom").innerHTML = erreurN;
    } else {
        document.getElementById("erreurNom").innerHTML = "<span style='color:green'>Correct</span>";
    }
   // return erreurN;
}

function validerTelephone() {
    var erreurT="";
    var numero = document.getElementById("numPh").value;
    var regexTel = /^[0-9]{8}$/; // Expression régulière pour vérifier 8 chiffres

    if (!regexTel.test(numero)) {
        erreurT = "Le numéro de téléphone doit contenir exactement 8 chiffres.";
        document.getElementById("erreurTelephone").innerHTML = erreurT;
    } else {
        document.getElementById("erreurTelephone").innerHTML = "<span style='color:green'>Correct</span>";
    }
   // return erreurT;
}
function validerMdp() {
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
    var erreurMotDePasse = validerMdp();
    if (erreurN || erreurP || erreurT || erreurMotDePasse) {
        e.preventDefault(); // Empêche l'envoi du formulaire si des erreurs sont présentes
    }
});*/