let menu = document.querySelector('.menu');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('menu');
    navbar.classList.toggle('open');
}