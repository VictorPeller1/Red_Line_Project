
// ------------ HOVER CARDS ---------------

const cards = document.querySelectorAll(".card");
console.log(cards);

cards.forEach(card => {
  card.addEventListener('mouseover', () => {
    card.style.transform = "scale(1.2)";
    card.style.position = "relative";
    card.style.transition = "250ms";
    //card.style.z-index="1";
  });

  card.addEventListener('mouseout', () => {
    card.style.transform = "scale(1)";
  });
});

// ------------ HIDDEN HEADER ON SCROLL ----------------


const header = document.querySelector('.header');
console.log(header);

window.addEventListener('scroll', () => {

  if (window.scrollY < 400) {
    header.style.top = "0";
  } else {
    header.style.top = "-100px";
  }
});

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
