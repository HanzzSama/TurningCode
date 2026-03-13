const wrapper = document.querySelector(".wrapper-material");
const cards = document.querySelectorAll(".box-material");

/* =========================
   Scroll ke card tertentu
========================= */
function centerCard(index){

    const card = cards[index];

    const scrollPosition =
        card.offsetLeft -
        wrapper.offsetWidth / 2 +
        card.offsetWidth / 2;

    wrapper.scrollLeft = scrollPosition;

}


/* =========================
   Detect card tengah
========================= */
function updateCenterCard(){

    const wrapperRect = wrapper.getBoundingClientRect();
    const wrapperCenter = wrapperRect.left + wrapperRect.width / 2;

    let closestCard = null;
    let closestDistance = Infinity;

    cards.forEach(card => {

        const cardRect = card.getBoundingClientRect();
        const cardCenter = cardRect.left + cardRect.width / 2;

        const distance = Math.abs(wrapperCenter - cardCenter);

        if(distance < closestDistance){
            closestDistance = distance;
            closestCard = card;
        }

    });

    cards.forEach(card => card.classList.remove("active"));

    if(closestCard){
        closestCard.classList.add("active");
    }

}


/* =========================
   Event
========================= */

wrapper.addEventListener("scroll", updateCenterCard);

window.addEventListener("load", () => {

    /* card ke 2 jadi posisi awal */
    centerCard(1);

    updateCenterCard();

});
