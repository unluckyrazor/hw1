function load(){
    const urlParams = new URLSearchParams(window.location.search); 
    const id = urlParams.get('id');
    console.log(id);
    fetch("article_fetch.php"+"?id="+id)
    .then(response=>{return response.json()}).then(loadArticle)
}
function loadArticle(data){

        const mainArticle = document.querySelector('#main_article'); 

        const articleImage = document.createElement('img');
        articleImage.classList.add('image');
        articleImage.src = data['image_path'];
        
        const content = document.createElement('div');
        content.classList.add('content');
        content.textContent = data['article_content'];
        
        const header = document.createElement('h1');
        header.classList.add('header');
        header.textContent = data['article_title'];
        
        const small = document.createElement('h2');
        small.classList.add('header_small');
        small.textContent = data['article_small'];
        
        
        const author = document.createElement('p');
        author.classList.add('author');
        author.textContent = "di " + data['article_author'];
        
        mainArticle.appendChild(header);
        mainArticle.appendChild(small);
        mainArticle.appendChild(articleImage);
        mainArticle.appendChild(content);
        mainArticle.appendChild(author);

}

load()