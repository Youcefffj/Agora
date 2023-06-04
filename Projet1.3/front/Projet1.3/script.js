// Pour ajouter une fonctionnalité de défilement automatique
var slides = document.getElementsByClassName('slide');
var currentSlide = 0;

function showSlide(index) {
    if (index >= slides.length) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = slides.length - 1;
    }

    for (var i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
    }

    slides[currentSlide].classList.add('active');
}

setInterval(function() {
    currentSlide++;
    showSlide(currentSlide);
}, 3000); // Défilement automatique toutes les 3 secondes
