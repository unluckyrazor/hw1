

function onResponse(response){
    console.log("response contenuto tornato");
    return response.json();
    
}



function saveBookmarkFetch(article_id){
    fetch("save.php",{
        method:"POST",
        headers: {
            'Content-Type':'application/x-www-form-urlencoded'
        },
        body: 'article_id=' + encodeURIComponent(article_id)
    })
        
    .then(resp => {
        if (!resp.ok) {
            console.log('network errore');
        }
        return resp.text();  
    })
    .then(data => {
        console.log("tutto apposto:", data);
    })
    
    .catch(error => {
        console.error("problema con la fetch del salvataggio:", error);
    });
}

function saveItem(event) {
    const bookmark= event.target;
    let article_id=bookmark.dataset.id;
    const isBookmarked = bookmark.dataset.bookmarked === "true";
    if(!isBookmarked){
    saveBookmarkFetch(article_id);
    bookmark.src="imgs/bookmark_black.png";
    bookmark.dataset.bookmarked = "true";
    } else {
        console.log("unsaving");
        unsaveItem(event);
        bookmark.dataset.bookmarked = "false";

    }
    

}


function unsaveItem(event){
    const bookmark = event.target;
    let article_id=bookmark.dataset.id;
    
    bookmark.src="imgs/bookmark_blank.png";
    bookmark.dataset.bookmarked = "false";
    saveBookmarkFetch(article_id);
    

}


function checkBookmarkFetch(article_id, toBookmark){
    fetch("check_bookmark.php",{
        method:"POST",
        headers: {
            'Content-Type':'application/x-www-form-urlencoded'
        },
        body: 'article_id=' + encodeURIComponent(article_id)
    })
        
    .then(resp => {
        if (!resp.ok) {
            console.log('network errore');
        }
        return resp;
    })
    .then(data => {
        console.log("tutto apposto:", data);
        return data;
    })
    .then(onResponse).then(boolean => {
        if(boolean==true){
            appearSaved(toBookmark);
        }
    })
    .catch(error => {
        console.error("problema con la fetch ", error);
    });
}


function appearSaved(bookmark){
    bookmark.src="imgs/bookmark_black.png";
    bookmark.dataset.bookmarked = "true";

}


function lookForBookmarks(){
    fetch("look_bookmark.php")
        
    .then(resp => {
        if (!resp.ok) {
            console.log('network errore');
        }
        return resp;
    })
    .then(data => {
        console.log("tutto apposto:", data);
        return data;
    })
    .then(response => {
        return response.json();
    })
    .then(arrofarray=>{aggiornaLista(arrofarray);})
    .catch(error => {
        console.error("problema con la fetch ", error);
    });
}


function aggiornaLista(arrofarray){
    const parentContainer=document.querySelector('#container');
    let innerContainers = [];

    for (let j=0;j<(arrofarray.length);j++){
        if (j % 2 === 0){
    const innerContainer=document.createElement("div");
    innerContainers[j]=innerContainer;
    innerContainers[j].classList.add('inner_container');
    
    parentContainer.appendChild(innerContainers[j]);
        }else {

        }
    }

    
    for(let i=0;i<arrofarray.length;i++){

        const article = document.createElement('article');
        article.classList.add('item_article');
        
        const imageContainer = document.createElement('div');
        imageContainer.classList.add('image_container');
        
        const imageLink = document.createElement('a');
        imageLink.classList.add('link', 'img_link');
        imageLink.href = '';
        
        const articleImage = document.createElement('img');
        articleImage.classList.add('article_image', 'ai');
        articleImage.src = '';
        
        imageLink.appendChild(articleImage);
        
        const saveImage = document.createElement('img');
        saveImage.classList.add('save');
        saveImage.src = 'imgs/bookmark_black.png';
        
        imageContainer.appendChild(imageLink);
        imageContainer.appendChild(saveImage);
        
        const textLink = document.createElement('a');
        textLink.classList.add('link', 'text_link');
        textLink.href = '';
        
        const header = document.createElement('h1');
        header.id = 'sh1';
        header.classList.add('rl_header');
        header.textContent = '';
        
        textLink.appendChild(header);
        
        const subtitle = document.createElement('p');
        subtitle.classList.add('rl_sottotitolo');
        
        const author = document.createElement('p');
        author.classList.add('rl_autore');
        
        article.appendChild(imageContainer);
        article.appendChild(textLink);
        article.appendChild(subtitle);
        article.appendChild(author);

        if(i %2 ===0){
            if (innerContainers[i]) {
                innerContainers[i].appendChild(article);
            }
            }else {
                innerContainers[i-1].appendChild(article);
        }
        

        saveImage.dataset.id=arrofarray[i]['id'];
        header.textContent=arrofarray[i]['article_title'];
        subtitle.textContent=arrofarray[i]['article_small'];
        author.textContent="di  " + arrofarray[i]['article_author'] ;
        articleImage.src=arrofarray[i]['image_path'];
        textLink.href='article.php?id=' + arrofarray[i]['id'];
        imageLink.href='article.php?id=' + arrofarray[i]['id'];
        
        saveImage.dataset.bookmarked = "true";
        saveImage.addEventListener("click", saveItem);
        
        


        
}

if(arrofarray.length==0){
    const NoArticleText= document.createElement('div');
    NoArticleText.textContent="non ho trovato nessun articolo";
    innerContainers[0].appendChild(NoArticleText);

}


}



lookForBookmarks();





