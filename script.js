
// ------------ HOVER CARDS ---------------

const cards = document.querySelectorAll(".card");
console.log(cards);

cards.forEach(card => {
  card.addEventListener('mouseover', () => {
    card.style.transform = "scale(1.2)";
    card.style.position = "relative";
    card.style.transition = "250ms";
  });

  card.addEventListener('mouseout', () => {
    card.style.transform = "scale(1)";
  });
});

// ------------ HIDDEN HEADER ON SCROLL ----------------

// -------- SEARCH SECTION -------------------------


function filtrerCards() {
  const searchInput = document.getElementById('searchInput');
  const cartes = document.getElementsByClassName('card');

  const termeRecherche = searchInput.value.toLowerCase();

  for (const carte of cartes) {
    const titre = carte.querySelector('.card__ttl').innerText.toLowerCase();

    if (titre.includes(termeRecherche)) {
      carte.style.display = 'flex';
    } else {
      carte.style.display = 'none';
    }
  }
}

const searchInput = document.getElementById('searchInput');
searchInput.addEventListener('input', filtrerCards);

filtrerCards();

// -------------- BURGER MENU -------------------



const nav = document.querySelector(".nav");
const icons = document.querySelector(".nav__ico");

icons.addEventListener("click", () => {
  nav.classList.toggle("active");
});



