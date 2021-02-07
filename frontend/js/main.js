let menuIcon = document.querySelector('.menuIcon');
let nav = document.querySelector('.overlay-menu');

menuIcon.addEventListener('click', () => {
    if (nav.style.transform != 'translateX(0%)') {
        nav.style.transform = 'translateX(0%)';
        nav.style.transition = 'transform 0.2s ease-out';
        $("body").addClass("mostrar_transparencia");
        $("body").addClass("no_scroll");
    } else {
        nav.style.transform = 'translateX(-100%)';
        nav.style.transition = 'transform 0.2s ease-out';
        $("body").removeClass("mostrar_transparencia");
        $("body").removeClass("no_scroll");
    }
});

let toggleIcon = document.querySelector('.menuIcon');

toggleIcon.addEventListener('click', () => {
    if (toggleIcon.className != 'menuIcon toggle') {
        toggleIcon.className += ' toggle';
    } else {
        toggleIcon.className = 'menuIcon';
    }
});

$(".overlay-menu .accordeon > a").click(function () {
    event.preventDefault();
    $(this).parent().toggleClass("desplegar");
});