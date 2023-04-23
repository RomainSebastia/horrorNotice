document.addEventListener('DOMContentLoaded', () => {
    // Récupérez la description du film depuis l'attribut data-description avec la propriété dataset qui permet de récupérer description sous la forme d'objet 
    let descriptionElements = document.querySelectorAll('.description');

    if (descriptionElements) {
        descriptionElements.forEach((descriptionElement) => {
            let description = descriptionElement.dataset.description;

            // Remplacez les sauts de ligne par des balises p
            description = '<p>' + description.replace(/\n/g, '</p><p>') + '</p>';

            // Mettre à jour l'élément HTML avec la description formatée
            descriptionElement.innerHTML = description;
        });
    }
});




