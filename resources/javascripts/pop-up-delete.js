const buttons = document.querySelectorAll('.button-delete-data');
const popup = document.getElementById('popUpDelete');
const deleteText = document.getElementById('deleteText');
const cancelBtn = document.getElementById('cancelDelete');

buttons.forEach(btn => {
    btn.addEventListener('click', () => {
        const route = btn.dataset.route;
        const name  = btn.dataset.name;

        popup.action = route;
        deleteText.textContent = `Are you sure to delete "${name}" data?`;

        popup.classList.remove('hidden');
        popup.classList.add('block');
    });
});

cancelBtn.addEventListener('click', () => {
    popup.classList.add('hidden');
    popup.classList.remove('block');
});
