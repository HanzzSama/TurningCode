const element = document.getElementById("loads");

setInterval(() => {
    element.classList.add("slide");
}, 1000);

const alertClose = document.querySelector(".alert-close");

setInterval(() => {
    alertClose.classList.add("active");
}, 5000);
