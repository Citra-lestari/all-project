const filterButtons = document.querySelectorAll('.tab-btn');
const items = document.querySelectorAll('.tab-content');

filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        filterButtons.forEach(btn => btn.classList.remove('tab-btn-active'));

        button.classList.add('tab-btn-active');

        const filter = button.getAttribute('data-tab');

        items.forEach(item => {
            const items = item.getAttribute('data-content');

            if (items.includes(filter)) {
                item.style.display = 'block'
            } else {
                item.style.display = 'none'
            }
        })
    })
})
