
// ------------------------------------------- SEARCH BAR ---------------------------------------------------------------
/*
const characterList = document.getElementById('characterList');
// console.log(characterList);
const searchBar = document.getElementById('searchBar');
let hpCharacters = [];
// console.log(searchBar);

searchBar.addEventListener('keyup', (e) => {
    const searchString = e.target.value.toLowerCase();
    // console.log(searchString);
    const filteredCharacters = hpCharacters.filter((character) => {
        return (
            character.name.toLowerCase().includes(searchString) ||
            character.house.toLowerCase().includes(searchString)
        );
    });
    displayCharacters(filteredCharacters);
})

const loadCharacters = async () => {
    try {
        const res = await fetch('https://hp-api.onrender.com/api/characters');
        hpCharacters = await res.json();
        displayCharacters(hpCharacters);
        // console.log(hpCharacters);
    } catch (err) {
        console.error(err);
    }
};

const displayCharacters = (characters) => {
    const htmlString = characters
        .map((character) => {
            return `
        <li class="characters">
          <h2>${character.name}</h2>
          <p>House: ${character.house}</p>
          <img src="${character.image}"></img>
        </li>
      `;
        })
        .join('');
    characterList.innerHTML = htmlString;
};

loadCharacters();
*/
// ---------------------------------------------------------------------------------------------------------------------
