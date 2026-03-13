document.addEventListener("DOMContentLoaded", () => {

    const navButtons = document.querySelectorAll(".box-nav-bottom");

    const pages = {
        dashboard: document.querySelector(".page-dashboard"),
        history: document.querySelector(".page-history"),
        account: document.querySelector(".page-account"),
        materi: document.querySelector(".page-materi")
    };

    function showPage(target) {

        Object.keys(pages).forEach((key) => {
            const page = pages[key];

            if (page) {
                page.style.display = key === target ? "block" : "none";
            }
        });

    }

    navButtons.forEach((btn) => {

        btn.addEventListener("click", () => {

            const target = btn.dataset.page;

            // set active icon
            document
                .querySelectorAll(".icon-nav-bottom")
                .forEach((icon) => icon.classList.remove("active"));

            const icon = btn.querySelector(".icon-nav-bottom");
            if (icon) icon.classList.add("active");

            // tampilkan halaman
            showPage(target);

        });

    });

    // jika halaman dashboard ada maka tampilkan default
    if (pages.dashboard) {
        showPage("dashboard");
    }

});
