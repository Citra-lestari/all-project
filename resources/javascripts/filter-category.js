const filterButtons = document.querySelectorAll('.btn-category');
const items = document.querySelectorAll('.item');

filterButtons.forEach(button => {
    button.addEventListener('click', () => {

        filterButtons.forEach(btn => btn.classList.remove('btn-category-active'));
        button.classList.add('btn-category-active');

        const filter = button.getAttribute('data-category');

        items.forEach(item => {
            const itemCategory = item.getAttribute('data-item');

            // jika all, tampilkan semua
            if (filter === 'all') {
                item.style.display = 'flex';
            }
            else if (itemCategory === filter) {
                item.style.display = 'flex';
            }
            else {
                item.style.display = 'none';
            }
        });
    });
});
