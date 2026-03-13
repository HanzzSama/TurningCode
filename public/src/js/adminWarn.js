function checkDesktop() {
    if (window.innerWidth < 1024) {
        document.getElementById("desktop-warning").style.display = "flex";
    } else {
        document.getElementById("desktop-warning").style.display = "none";
    }
}

checkDesktop();
window.addEventListener("resize", checkDesktop);
