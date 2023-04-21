document.addEventListener('DOMContentLoaded', () => {
  // Sélectionner le menu burger, le menu et le bouton de fermeture
  const burger = document.getElementById('burger');
  const menu = document.querySelector('.menu');
  const closeButton = document.getElementById('close');

  // Fonction pour afficher le menu
  function ouvertureMenu() {
    menu.classList.add('open');
    burger.style.display = 'none';
  }

  // Fonction pour masquer le menu
  function fermertureMenu() {
    menu.classList.remove('open');
    burger.style.display = 'initial';
  }

  //  écouteurs d'événements pour gérer les clics sur le menu burger et le bouton de fermeture
  burger.addEventListener('click', ouvertureMenu);
  closeButton.addEventListener('click', fermertureMenu);
});

  
  

  



