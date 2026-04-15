document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("btnNav");
    const sidebar = document.querySelector(".sidebar-setting");

    btn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-open");
        sidebar.classList.toggle("sidebar-closed");
    });

    document.addEventListener("click", (close) => {
        if (
            sidebar.classList.contains("sidebar-open") &&
            !sidebar.contains(close.target) &&
            !btn.contains(close.target)
        ) {
            sidebar.classList.remove("sidebar-open");
            sidebar.classList.add("sidebar-closed");
        }
    });
});
