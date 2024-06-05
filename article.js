function load(){

    fetch("article_fetch.php")
    .then(response=>{return response.json()}).then(loadArticle)
}
function loadArticle(data){

        const mainArticle = document.querySelector('main_article'); 

        const articleImage = document.createElement('img');
        articleImage.classList.add('image');
        articleImage.src = data['image_path'];
        
        const content = document.createElement('div');
        articleImage.classList.add('content');
        articleImage.textContent = data['article_content'];
        
        const header = document.createElement('h1');
        header.classList.add('header');
        header.textContent = data['article_title'];
        
        const small = document.createElement('h2');
        subtitle.classList.add('header_small');
        header.textContent = data['article_small'];
        
        
        const author = document.createElement('p');
        author.classList.add('author');
        header.textContent = data['article_author'];
        
        mainArticle.appendChild(header);
        mainArticle.appendChild(small);
        mainArticle.appendChild(articleImage);
        mainArticle.appendChild(content);
        mainArticle.appendChild(author);

}

load()