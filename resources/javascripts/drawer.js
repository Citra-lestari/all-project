const drawer = document.querySelector('.drawer-placement-bottom');
const openButton = document.querySelector('.btn-form-borrow');

openButton.addEventListener('click', (e) => {
    e.preventDefault();
    drawer.show();
});
