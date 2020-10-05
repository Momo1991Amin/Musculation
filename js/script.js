var images = [
  "images/1.jpg",
  "images/2.jpg",
  "images/3.jpg",
  "images/4.jpg",
  "images/5.jpg",
  "images/6.jpg",
];
var boutonPlay = document.querySelector('#play');
var boutonSuivant = document.querySelector('.next');
var boutonPrecedent = document.querySelector('.prev');
var boutonAleatoire = document.querySelector('#random');
var idInterval;
var defile = false;
var indexImage=0;

boutonSuivant.addEventListener('click', imageSuivante);
boutonPrecedent.addEventListener('click', imagePrecedente);
boutonPlay.addEventListener('click', play);
boutonAleatoire.addEventListener('click', random);
document.addEventListener('keydown', clavier);
