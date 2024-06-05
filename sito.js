

function Mostra() {
    const cont_middle = document.querySelector('.middle-flex-cont'); 
    cont_middle.classList.add('flex')
    const item_middle = document.querySelectorAll('.mid_flex_article');
    
    
    for (let i of item_middle) {
    console.log("mostrando");
    i.classList.add('block');
    }
    
    button_altro.remove();
    aggiornaMore();
    
}



function aggiornaMore(){
    fetch("index_fetch.php")    
.then(onResponse).then(aggiornaInfoMore)
}



function aggiornaInfoMore(arrofarray){
    let i=0;
    
    const read_later_arr= document.querySelectorAll(".more_save"); 
    const titles=document.querySelectorAll(".more_header");
    const smalls = document.querySelectorAll(".more_sottotitolo");
    const authors = document.querySelectorAll(".more_autore");
    const img_paths = document.querySelectorAll(".more_ai");
    const article_url = document.querySelectorAll(".more_text_link");
    const article_url_imgs = document.querySelectorAll(".more_img_link");
    
    let loaded=load_index;
    
    for (;load_index<loaded+titles.length;load_index++){
    
    read_later_arr[i].dataset.id=arrofarray[load_index]['id'];
    titles[i].textContent=arrofarray[load_index]['article_title'];
    smalls[i].textContent=arrofarray[load_index]['article_small'];
    authors[i].textContent="di  " + arrofarray[load_index]['article_author'];
    img_paths[i].src=arrofarray[load_index]['image_path'];
    article_url[i].href='article.php?id='+arrofarray[load_index]['id'];
    article_url_imgs[i].href='article.php?id='+arrofarray[load_index]['id'];

    read_later_arr[i].addEventListener("click", saveItem);
    checkBookmarkFetch(arrofarray[load_index]['id'], read_later_arr[i]);

    i++;
}




    
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

    saveBookmarkFetch(article_id);
    bookmark.src="imgs/bookmark_blank.png";
    bookmark.dataset.bookmarked = "false";

}





function onTokenResponse(response){
    console.log("token response ritornato");
    if (!response.ok) {
        console.log("errore dentro")
        
    }
    return response.json();
    
    
}

function onResponse(response){
    console.log("response contenuto tornato");
    return response.json();
    
}


function onJson(json){
    console.log("json contenuto tornato");
    return json;
}


function selectTracks(playlist) {
    console.log("selezionando tracce");
    let selectedTracks = [];
    // prende 5 tracce a caso dalla playlist che riceve e le mette in selectedTracks
    for (let i=0;i<5;i++){
    let randomIndex= Math.floor(Math.random() * playlist.items.length);
    let randomTrack= playlist.items[randomIndex].track;
    selectedTracks.push(randomTrack); 
    }
    console.log('Selected tracks:', selectedTracks);    

    const tracklist= document.querySelectorAll(".track_name");
    const tracklinklist=document.querySelectorAll(".spoty_track_link");
    const trackimageList = document.querySelectorAll(".spoty_track_image");
    

    let i=0;
        
    for (let trackObj of selectedTracks) {
        
        // assegna per ogni traccia della lista link, immagine, titolo della canzone e li sostituisce agli attributi in html
        
        let trackLink = trackObj.external_urls.spotify;
        let trackName = trackObj.name;
        let trackImage = trackObj.album.images[1].url;
        console.log("track name", trackName);
        
        
        let trackimageh=trackimageList[i];
        let track=tracklist[i];
        let tracklinkh=tracklinklist[i];
        

        trackimageh.src=trackImage;
        track.textContent=trackName;
        tracklinkh.href=trackLink;
        
        i++;
        
        }
    
    
    }




// fetch degli articoli
function aggiorna(){
    fetch("index_fetch.php")    
       .then(onResponse).then(aggiornaInfo)
}


function aggiornaInfo(arrofarray){
    
    let i=0;
    
    const read_later_arr = document.querySelectorAll(".savebig");
    const titles=document.querySelectorAll(".header");
    const smalls = document.querySelectorAll(".sbig");
    const authors = document.querySelectorAll(".abig");
    const img_paths = document.querySelectorAll(".ai");
    const article_url = document.querySelectorAll(".text_link");
    const article_url_imgs = document.querySelectorAll(".img_link");

    

    for (;load_index<titles.length;load_index++){
        //in questo ciclo occhio a chi si riempie prima coi selectors, 
        //ci sono i due elementi nascosti e devi selezionare bene

        read_later_arr[i].dataset.id=arrofarray[load_index]['id'];
        titles[i].textContent=arrofarray[load_index]['article_title'];
        smalls[i].textContent=arrofarray[load_index]['article_small'];
        authors[i].textContent="di  " + arrofarray[load_index]['article_author'] ;
        img_paths[i].src=arrofarray[load_index]['image_path'];
        article_url[i].href='article.php?id='+arrofarray[load_index]['id'];
        article_url_imgs[i].href='article.php?id='+arrofarray[load_index]['id'];

        

        read_later_arr[i].addEventListener("click", saveItem);
        checkBookmarkFetch(arrofarray[load_index]['id'], read_later_arr[i]);

        i++;
}




    
}

function aggiornaAPI(){
    fetch("spotify.php").then(onResponse).then(selectTracks);
}

//lo devo fare per tutti gli articoli identificandoli diversamente , cambiando nomi per ognuno




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



let load_index=0;
const button_altro = document.querySelector("#mostra-altro")
button_altro.addEventListener("click", Mostra);

aggiorna();

aggiornaAPI();