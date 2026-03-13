const element = document.getElementById("loads");

setInterval(() => {
    element.classList.add("slide");
}, 1500);

const alertClose = document.querySelector(".alert-close");

setInterval(() => {
    alertClose.classList.add("active");
}, 5000);
