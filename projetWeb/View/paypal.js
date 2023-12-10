var scriptTag = document.currentScript || document.querySelector('script[data-variable="maValeur"]');

        // Obtenez la valeur de l'attribut personnalisé
        var maValeur = scriptTag.getAttribute('data-variable');

        // Utilisez la valeur comme nécessaire
        //console.log(maValeur);
        alert('Mavaleur ' + maValeur);
paypal.Buttons({
    
    createOrder: function(data, actions) {
        
        // This function sets up the details of the transaction, including the amount and Line item details.
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: maValeur // Assurez-vous que la valeur est une chaîne
                }
            }]
        });
    },
   

    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            alert('Transaction completed by ' + details.payer.name.given_name);
        });
    }
}).render('#paypal-button-container');
// paypal.js

/*function initPaypalButton(variableValue) {
    paypal.Buttons({
        createOrder: function(data, actions) {
            // Utilisez la variableValue ici pour définir la valeur
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: variableValue.toString() // Assurez-vous que la valeur est une chaîne
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
            });
        }
    }).render('#paypal-button-container');
}*/

function showPaymentNotification(payerName) {
    // Utilisez l'API de notification du navigateur ou ajoutez un élément pour afficher un message
    // Par exemple, en utilisant l'API Notification (compatible avec les navigateurs modernes)
    if (Notification.permission === "granted") {
        new Notification('Paiement réussi', {
            body: 'Transaction complétée par ' + payerName
        });
    } else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(function(permission) {
            if (permission === "granted") {
                new Notification('Paiement réussi', {
                    body: 'Transaction complétée par ' + payerName
                });
            }
        });
    } else {
        // Si les notifications ne sont pas prises en charge ou sont refusées
        // Vous pouvez également ajouter un élément à votre page pour afficher le message
        alert('Paiement réussi par ' + payerName);
    }
}
var paypalContainer = document.getElementById('paypal-button-container');
if (paypalContainer) {
    paypalContainer.style.textAlign = 'center';
}
// Contenu de paypal.js
alert('Le script PayPal est chargé !');
