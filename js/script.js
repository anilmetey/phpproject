// Scroll olduğunda header'a gölge ekle
window.addEventListener("scroll", function() {
    const header = document.querySelector("header");
    if (window.scrollY > 50) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});

// (İleride kullanılmak üzere) Menü açma/kapatma sistemi (mobil için)
const menuToggle = document.querySelector("#menu-toggle");
const nav = document.querySelector("nav");

if (menuToggle) {
    menuToggle.addEventListener("click", () => {
        nav.classList.toggle("open");
    });
}