document.querySelectorAll(".eye").forEach((icon) => {
    icon.addEventListener("click", function () {
        const input = this.parentElement.querySelector("input");

        if (input.type === "password") {
            input.type = "text";
            this.classList.replace("bx-show", "bx-hide");
        } else {
            input.type = "password";
            this.classList.replace("bx-hide", "bx-show");
        }
    });
});
