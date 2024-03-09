const hero = document.querySelector(".hero");
const about = document.querySelector(".about");

const heroteste = hero.offsetTop;
const aboutteste = about.offsetTop;

function myFunction() {
    if (window.scrollY >= heroteste) {
        hero.classList.add("visible");
    }

    if (window.scrollY > heroteste) {
        about.classList.add("visible");
    } else {
        about.classList.remove("visible");
    }
}

window.addEventListener("scroll", myFunction);

var open = document.getElementById("openNav");
open.addEventListener("click", () => {
    document.getElementById("myNav").style.width = "100%";
});

var close = document.getElementById("closeNav");
close.addEventListener("click", () => {
    document.getElementById("myNav").style.width = "0%";
});