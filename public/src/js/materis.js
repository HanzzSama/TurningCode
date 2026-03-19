const wrapper = document.querySelector(".wrapper-material");
const cards = document.querySelectorAll(".box-material");

/* =========================
   Center card
========================= */
function centerCard(card) {
    const scrollPosition =
        card.offsetLeft - wrapper.offsetWidth / 2 + card.offsetWidth / 2;

    wrapper.scrollTo({
        left: scrollPosition,
        behavior: "smooth",
    });
}

/* =========================
   Update active card
========================= */
function setActive(card) {
    cards.forEach((c) => c.classList.remove("active"));
    card.classList.add("active");
}

/* =========================
   Detect card tengah saat scroll
========================= */
function updateCenterCard() {
    const wrapperRect = wrapper.getBoundingClientRect();
    const wrapperCenter = wrapperRect.left + wrapperRect.width / 2;

    let closestCard = null;
    let closestDistance = Infinity;

    cards.forEach((card) => {
        const rect = card.getBoundingClientRect();
        const cardCenter = rect.left + rect.width / 2;

        const distance = Math.abs(wrapperCenter - cardCenter);

        if (distance < closestDistance) {
            closestDistance = distance;
            closestCard = card;
        }
    });

    if (closestCard) {
        setActive(closestCard);
    }
}

/* =========================
   Click card
========================= */
cards.forEach((card) => {
    card.addEventListener("click", () => {
        setActive(card); // aktifkan card yg dipilih
        centerCard(card); // pindahkan ke tengah
    });
});

/* =========================
   Scroll event
========================= */
wrapper.addEventListener("scroll", updateCenterCard);

/* =========================
   Load awal
========================= */
window.addEventListener("load", () => {
    const middle = Math.floor(cards.length / 2);

    setActive(cards[middle]);
    centerCard(cards[middle]);
});
