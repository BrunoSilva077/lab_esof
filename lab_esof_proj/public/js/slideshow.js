let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides((slideIndex += n));
}

function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let i;
    const slides = document.getElementsByClassName("slide");
    const traces = document.getElementsByClassName("trace");

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    for (i = 0; i < traces.length; i++) {
        traces[i].className = traces[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    traces[slideIndex - 1].className += " active";
}

document.addEventListener("DOMContentLoaded", function () {
    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");

    prevButton.addEventListener("click", function () {
        plusSlides(1);
    });

    nextButton.addEventListener("click", function () {
        plusSlides(-1);
    });

    // Adiciona mudança automática a cada 2 segundos
    setInterval(function () {
        plusSlides(1);
    }, 5000);
});
