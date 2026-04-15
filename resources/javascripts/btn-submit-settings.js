const submitBtn = document.getElementById('submit-btn');

document.querySelector("form").addEventListener("submit", function () {
    document.getElementById("submitBtn").disabled = true;
});