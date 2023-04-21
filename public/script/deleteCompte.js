// Attendre que le contenu de la page soit chargé
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner le bouton de suppression du compte
    const supprimerCompte = document.querySelector("#deleteCompte button");

    if(supprimerCompte) {
        // Ajouter un écouteur d'événements 'click' au bouton de suppression du compte
        supprimerCompte.addEventListener("click", function(event) {
            // Afficher une boîte de confirmation et stocker la réponse de l'utilisateur
            const confirmation = confirm("Êtes-vous sûr de vouloir supprimer définitivement votre compte ?");

            // Si l'utilisateur annule la suppression, empêcher la soumission du formulaire
            if (!confirmation) {
                event.preventDefault();
            }
        });
    }
});

