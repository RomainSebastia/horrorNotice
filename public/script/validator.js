// Définition d'une fonction pour faire disparaître progressivement un élément d'alerte
function disparitionAlert(alertElement, delaiAvantDisparition = 2000, dureeDeTransition = 1000) {
  // Attendre un certain délai avant de faire disparaître l'élément .alert
  setTimeout(function() {
    if (alertElement) {
      // Ajouter une transition CSS pour le fondu enchaîné
      alertElement.style.transition = `opacity ${dureeDeTransition}ms ease-out`;
      alertElement.style.opacity = '0';

      // Attendre la fin de la transition avant de supprimer l'élément de la page
      setTimeout(function() {
        alertElement.style.display = 'none';
      }, dureeDeTransition);
    }
  }, delaiAvantDisparition);
}

// Récupération des éléments d'alerte
const successAlert = document.querySelector('.alert-success');
const errorAlert = document.querySelector('.alert-danger');

// Si l'élément d'alerte de réussite est présent, faire disparaître l'alerte après un certain délai
if (successAlert) {
  disparitionAlert(successAlert);
} 
// Sinon, si l'élément d'alerte d'erreur est présent, faire disparaître l'alerte après un certain délai
else if (errorAlert) {
 disparitionAlert(errorAlert);
}






