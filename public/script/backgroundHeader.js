// je selectionne l' HTML avec background-header et le stocke dans la variable backgroundHeader
const backgroundHeader = document.getElementById("background-header");

//  fonction qui sélectionne une image de fond d'écran aléatoire parmi une liste prédéfinie et l'applique à l'élément backgroundHeader
function BackgroundImage() {
  if(!backgroundHeader) return;

  // Déclare un tableau contenant les noms des images de fond d'écran disponibles
  const backgroundImages = [
    "halloween.png",
    "nuit.jpg",
    "foret.jpg",
    "fantasy.jpg",
  ];

  // Génère un indice aléatoire entre 0 et la longueur du tableau "backgroundImages" et le stocke dans la variable "randomIndex"
  const randomIndex = Math.floor(Math.random() * backgroundImages.length);

  // Je sélectionne l'image de fond d'écran correspondant à l'indice aléatoire et la stocke dans la variable "randomImage"
  const randomImage = backgroundImages[randomIndex];

  // J"applique l'image de fond d'écran sélectionnée à l'élément backgroundHeader en utilisant la propriété CSS background-image
  backgroundHeader.style.backgroundImage = `url('public/images/${randomImage}')`;
}

// J'apelle la function setRandomBackgroundImage une première fois pour définir une image de fond d'écran aléatoire lors du chargement de la page
BackgroundImage();

// ensuite j'apelle BackgroundImage toutes les 1 minute à l'aide de la méthode setInterval
setInterval(BackgroundImage, 60000);
