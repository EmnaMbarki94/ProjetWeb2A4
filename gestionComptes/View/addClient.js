function validerNom() {
    var erreurN="";
    var nom = document.getElementById("nom").value;
    var regexNom = /^[A-Za-z]+$/; // Expression régulière pour vérifier les lettres

    if (!regexNom.test(nom)) {
        erreurN = "Le nom ne doit contenir que des lettres.";
        document.getElementById("erreurNom").innerHTML = erreurN;
    }
   // return erreurN;
}

function validerPrenom() {
    var erreurP="";
    var prenom = document.getElementById("prenom").value;

    if (prenom.length < 2) {
        erreurP = "Le prénom doit avoir au moins 2 caractères.";
        document.getElementById("erreurPrenom").innerHTML = erreurP;
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
    } 
   // return erreurT;
}
function validerMotDePasse() {
    var erreurMotDePasse="";
    var mdp = document.getElementById('mdp').value;
    var repeterMdp = document.getElementById('repetermdp').value;
    var erreurMotDePasse = document.getElementById('erreurMotDePasse');

    if (mdp !== repeterMdp) {
        erreurMotDePasse.innerHTML = "Les mots de passe ne correspondent pas.";
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
});
/*
document.getElementById("formulaireInscription").addEventListener("submit", function(e) {
    var erreurN = validerNom();
    var erreurP= validerPrenom();
    var erreurT= validerTelephone();
    var erreurMotDePasse = validerMotDePasse();
    if (erreurN || erreurP || erreurT || erreurMotDePasse) {
        e.preventDefault(); // Empêche l'envoi du formulaire si des erreurs sont présentes
    }
});*/