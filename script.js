
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




