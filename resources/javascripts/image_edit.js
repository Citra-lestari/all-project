
    function previewImage(event) {
        const preview = document.getElementById('previewImage');
        const oldImage = document.getElementById('oldImage');

        const file = event.target.files[0];
        if (!file) return;

        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');

        // image lama otomatis jadi pilihan kedua
        oldImage.classList.add('opacity-60');
    }
