function validerNom() {
    var erreurN;
    var nom = document.getElementById("nom").value;
    var regexNom = /^[A-Za-z]+$/; // Expression régulière pour vérifier les lettres

    if (!regexNom.test(nom)) {
        erreurN = "Le nom ne doit contenir que des lettres.";
        document.getElementById("erreurNom").innerHTML = erreurN;
    } else {
        document.getElementById("erreurNom").innerHTML = "<span style='color:green'>Correct</span>";
    }
}

function validerPrenom() {
    var erreurP;
    var prenom = document.getElementById("prenom").value;

    if (prenom.length < 1) {
        erreurP = "Le prénom doit avoir au moins 1 caractère.";
        document.getElementById("erreurPrenom").innerHTML = erreurP;
    } else {
        document.getElementById("erreurPrenom").innerHTML = "<span style='color:green'>Correct</span>";
    }
}

function validerTelephone() {
    var erreurT;
    var numero = document.getElementById("numTel").value;
    var regexTel = /^[0-9]{8}$/; // Expression régulière pour vérifier 8 chiffres

    if (!regexTel.test(numero)) {
        erreurT = "Le numéro de téléphone doit contenir exactement 8 chiffres.";
        document.getElementById("erreurTelephone").innerHTML = erreurT;
    } else {
        document.getElementById("erreurTelephone").innerHTML = "<span style='color:green'>Correct</span>";
    }
}
function validerFormulaire() {
    var mdp = document.getElementById('mdp').value;
    var repeterMdp = document.getElementById('repetermdp').value;
    var erreurMotDePasse = document.getElementById('erreurMotDePasse');

    if (mdp !== repeterMdp) {
        erreurMotDePasse.innerHTML = "Les mots de passe ne correspondent pas.";
    } else {
        erreurMotDePasse.innerHTML = "<span style='color:green'>Correct</span>"; 
    }
}

document.getElementById("formulaireInscription").addEventListener("submit", function(e) {
    e.preventDefault();
    validerNom();
    validerPrenom();
    validerTelephone();
    validerFormulaire();
});

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
