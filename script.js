const articles = [
    {
        "Id_article": 1,
        "article_title": "Title 1",
        "article_content": "Content 1",
        "article_date": "2023-07-08",
        "Id_Validation": 1,
        "Id_category": 1,
        "Id_someone": 1
    },
    {
        "Id_article": 2,
        "article_title": "Title 2",
        "article_content": "Content 2",
        "article_date": "2023-07-09",
        "Id_Validation": 2,
        "Id_category": 1,
        "Id_someone": 2
    },
    {
        "Id_article": 3,
        "article_title": "Title 3",
        "article_content": "Content 3",
        "article_date": "2023-07-10",
        "Id_Validation": 1,
        "Id_category": 2,
        "Id_someone": 1
    }
];

const articleContainer = document.getElementById('articleContainer');
const searchInput = document.getElementById('searchInput');
const categoryFilter = document.getElementById('categoryFilter');

function renderArticles(articles) {
    articleContainer.innerHTML = '';

    articles.forEach(function (article) {
        const articleCard = document.createElement('div');
        articleCard.classList.add('article-card');

        const titleElement = document.createElement('h3');
        titleElement.textContent = article.article_title;

        const contentElement = document.createElement('p');
        contentElement.textContent = article.article_content;

        const dateElement = document.createElement('p');
        dateElement.textContent = 'Date: ' + article.article_date;

        articleCard.appendChild(titleElement);
        articleCard.appendChild(contentElement);
        articleCard.appendChild(dateElement);

        articleContainer.appendChild(articleCard);
    });
}

function filterArticles() {
    const searchValue = searchInput.value.toLowerCase();
    const categoryValue = categoryFilter.value;

    const filteredArticles = articles.filter(function (article) {
        const titleMatch = article.article_title.toLowerCase().includes(searchValue);
        const categoryMatch = categoryValue === '' || article.Id_category.toString() === categoryValue;

        return titleMatch && categoryMatch;
    });

    renderArticles(filteredArticles);
}

searchInput.addEventListener('input', filterArticles);
categoryFilter.addEventListener('change', filterArticles);

// Initial rendering
renderArticles(articles);
