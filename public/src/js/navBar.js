const btnSearch = document.querySelector("#searchBar");
const navSearch = document.querySelector("#navBar");

btnSearch.addEventListener("click", function () {
    navSearch.classList.toggle("show");
});
