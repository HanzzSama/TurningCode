const btn = document.getElementById("btnAside");
const asidePage = document.getElementById("asidePage");
const body = document.body;

btn.onclick = function(e){
    e.stopPropagation();

    asidePage.classList.toggle("active");

    if(asidePage.classList.contains("active")){
        body.classList.add("no-scroll");
    }else{
        body.classList.remove("no-scroll");
    }
};

// klik luar aside menutup
asidePage.addEventListener("click", function(e){

    if(e.target === asidePage){
        asidePage.classList.remove("active");
        body.classList.remove("no-scroll");
    }

});
