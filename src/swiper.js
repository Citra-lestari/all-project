document.addEventListener('DOMContentLoaded', function () {
    var customersSlider = new Swiper('.card-review-customer', {
        slidesPerView: 4, // Jumlah slide default yang tampil
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            type: 'bullets',
        },
        breakpoints: {
            // Ukuran layar >= 300px
            300: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            // ukuran layar >= 768px
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

            // ukuran layar >= 1024
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },

            1920:{
                slidePerView: 6,
                spaceBetween: 20,
            }
        }
    });
});