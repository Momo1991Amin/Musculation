// console.log("functions.js");


/***************PREV/NEXT*****************/

var slider1 = document.getElementById('slider1');
var slider2 = document.getElementById('slider2');
var sliderHTML = document.getElementById('slider');


/*******************BG*******************/


function afficherImage(nouvelIndex){

  sliderHTML.src = images[nouvelIndex];
  var plus = nouvelIndex+1;
  var moin = nouvelIndex-1;
  var pluss = nouvelIndex+2;
  var moinn = nouvelIndex-2;
  if (moin == -1) {
    slider1.src= images[5];
  }
  else {
    slider1.src = images[moin]
  }
  if (plus == 6) {
    slider2.src = images[0];
  }
  else {
    slider2.src = images[plus];
  }
  if (pluss == 6) {
    slider4.src = images[0];
  }
  else if (pluss == 7) {
    slider4.src = images[1];
  }
  else {
    slider4.src = images[pluss];
  }
  if (moinn == -1) {
    slider3.src = images[5];
  }
  else if (moinn == -2) {
    slider3.src = images[4];
  }
  else {
    slider3.src = images[moinn];
  }
}


function imageSuivante (event) {
  indexImage++;
  if (indexImage > images.length -1) {
    indexImage = 0;
  }
  afficherImage(indexImage);
}

function imagePrecedente (event) {
  indexImage--;
  if (indexImage < 0 ) {
    indexImage = 5;
  }
  afficherImage(indexImage);
}

/*****************PLAY*****************/

function majPlay(event) {
  var icone = document.querySelector("#play i");
  icone.classList.toggle ("fa-play-circle");
  icone.classList.toggle ("fa-pause");
}

function play (event) {
  majPlay();
  gererDefilement();
}

function gererDefilement (event) {
  if (defile == false) {
    idInterval = setInterval(imageSuivante, 1700);
    defile = true;
  }
  else {
    clearInterval(idInterval);
    defile = false;
  }
}


/*************ALEATOIRE****************/

function nbEntierAleatoire (min,max) {
  return Math.floor(Math.random()*(max-min+1))+min;
}

function random (event) {
  var aleatoire = nbEntierAleatoire(0,5);
  afficherImage(aleatoire);
  indexImage = aleatoire;
}

function clavier (event) {
  if(event.keyCode == 39) {
    imageSuivante();
  }
  if(event.keyCode == 37) {
    imagePrecedente();
  }
}
