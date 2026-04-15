document.addEventListener("DOMContentLoaded", function() {
    const timeElement = document.getElementById('time-set');
    if (!timeElement) return;

    const now = new Date();
    const hour = now.getHours();

    if (hour >= 18 || hour < 5) {
        timeElement.textContent = "Good Night";
    } else if (hour >= 5 && hour < 12) {
        timeElement.textContent = "Good Morning";
    } else if (hour >= 12 && hour < 18) {
        timeElement.textContent = "Good Afternoon";
    }else{
        this.textContent= "Gagal Muncul"
    }
});