
    function validateForm() {
        var nom_patient = document.getElementById("nom_patient").value;
        var email_patient = document.getElementById("email_patient").value;
        var nom_medecin = document.getElementById("nom_medecin").value;
        var date_consultation = document.getElementById("date_consultation").value;
        var heure_consultation = document.getElementById("heure_consultation").value;
        var symtomes = document.getElementById("symtomes").value;

        var regexNom = /^[A-Za-z]+$/; // Expression régulière pour vérifier les lettres
        var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expression régulière pour vérifier le format de l'email
        var erreurNom = "";
        var erreurNomM = "";
        var erreurEmail = "";
        var erreurDate = "";
        var erreurHeure = "";
        var erreurSymtomes = "";

        if (!regexNom.test(nom_patient)) {
            erreurNom = "Le nom du patient ne doit contenir que des lettres.";
            document.getElementById("erreurNom").innerHTML = erreurNom;
        } else {
            document.getElementById("erreurNom").innerHTML = "";
        }

        if (!regexEmail.test(email_patient)) {
            erreurEmail = "Veuillez entrer une adresse email valide.";
            document.getElementById("erreurEmail").innerHTML = erreurEmail;
        } else {
            document.getElementById("erreurEmail").innerHTML = "";
        }

        if (!regexNom.test(nom_medecin)) {
            erreurNomM = "Le nom du médecin ne doit contenir que des lettres.";
            document.getElementById("erreurNomM").innerHTML = erreurNomM;
        } else {
            document.getElementById("erreurNomM").innerHTML = "";
        }

        

        // Si une des validations échoue, on empêche le formulaire de se soumettre
        if (erreurNom || erreurEmail||erreurNomM ) {
            return false;
        }

        // Si tout est correct, le formulaire se soumet normalement
        return true;
    }
