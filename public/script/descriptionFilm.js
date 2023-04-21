document.addEventListener('DOMContentLoaded', () => {
    // Récupérez la description du film depuis l'attribut data-description avec la propriété dataset qui permet de recupereer description sous la forme d'objet 
    let descriptionElement = document.getElementById("description");

    if (descriptionElement) {
        let description = descriptionElement.dataset.description;

        // Remplacez les sauts de ligne par des balises p
        description = '<p>' + description.replace(/\n/g, '</p><p>') + '</p>';

        // Mettez à jour l'élément HTML avec la description formatée dans l'id description
        document.getElementById("description").innerHTML = description;
    }
});





