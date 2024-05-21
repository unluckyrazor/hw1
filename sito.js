function onHover() {
    
    console.log("hoverato");
    const article = document.querySelector("#flex_item_article_middle");
    
    //prende la data segnata nell'articolo e la appende all'articolo

    
    console.log("hoverato");
    
    flex_item_article_middle.appendChild(date);
    date.textContent=article.dataset.date;
    header_middle.removeEventListener("mouseover", onHover);
   


}

function onLeave(){
    // quando tolgo il mouse sparisce la data 
    date.remove();
    header_middle.addEventListener("mouseover", onHover);


}

function cambiaMidImage() {
    console.log("cliccato");
    midImage.src="imgs/mario.png";
}

function Mostra() {
    const cont_middle = document.querySelector('.middle-flex-cont'); 
    console.log("mostrando");
    cont_middle.classList.add('flex')
    const item_middle = document.querySelectorAll('.mid_flex_article'); 
    
    for (let i of item_middle) {
    console.log("mostrando");
    i.classList.add('block');
    }

    button_altro.remove();

    // poi questo dovrebbe caricare un tot di articoli 
}


function favItem() { 
    star_fav.classList.add('fav');  
}

function provaAccedi(){
    flex_item_article_middle.remove();
    const accedi = document.createElement('input');
    flex_container_middle.appendChild(accedi);
    button_altro.remove();
    bottone.remove();
}

// pulsante che mostra altri articoi
const button_altro = document.querySelector("#mostra-altro")
button_altro.addEventListener("click", Mostra);




//questa è una prova di ascoltare il mouse che va sopra ad una immagine e cambiava l'immagine l'ho tolto
//const mid_image_container = document.querySelector(".mid_image_container");
// mid_image_container.addEventListener("mouseover", onHover);

// voglio una arrow in overlay sul'articolo principlae che mi cambia immagine 
// e testo al massimo . 
const arrow_button = document.querySelector(".arrow");
const midImage = document.querySelector(".big_article_image_middle")
arrow_button.addEventListener("click", cambiaMidImage);;

//pulsante preferito cambia colore quando lo clicco

const star_fav = document.querySelector(".star");
star_fav.addEventListener("click", favItem);

// mettera delle caselle di testo 


//hover su titolo dell'articolo mid e spunta la data passata come data-* in html
// quando tolgo il mouse toglie la data

const date = document.createElement('span');
date.classList="data";
const header_middle= document.querySelector(".middle_article_header");

header_middle.addEventListener("mouseover", onHover);
header_middle.addEventListener("mouseleave", onLeave);







// chiamata api rest igdb 

const twitch_client_id= '4xc9gc11f5vtpv15695cb46blzrf3k';
const twitch_client_secret = 'e5lhn1beq7gpxca4cilpwyeyt8fjvf';
const cors_proxy ="https://corsproxy.io/?";
let token='';
const platform_id= 167;
const year_in_ms = 1714936092   ; // maggio 5 24 in ms da epoch
let gameidList=[];


function onTokenResponseIGDB(response){
    console.log("token ritornato");
    if (!response.ok) {
        console.log("errore dentro")
        
    }
    return response.json();
    
    
} 

function onTokenJsonIGDB(json){
    console.log("json tornato");
    console.log(json);
    if (!json) {
        console.log("errore json non funziona\n")
    }
    token=json.access_token;
    console.log(token);
    prendiIGDB();
}

function onErrorResponseIGDB(failure) {
    console.log("fallito")
}

function onResponseIGDB(response) {
    console.log("response ritornato 2")
    if(!response.ok) {
        console.log("errore non ok")
    }
    return response.json();
}
function onJsonIGDB(json){
    console.log("json ritornato 2")
    console.log(json);
    return json;

}
function onErrorIGDB(error) {
    console.log(error);
    console.log("errore");
}


// fetcha per il token 
fetch("https://id.twitch.tv/oauth2/token", {
    method: "post",
    body: "client_id=" + twitch_client_id + "&client_secret=" + twitch_client_secret + "&grant_type=client_credentials",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded"
 }
 }).then(onTokenResponseIGDB, onErrorResponseIGDB).then(onTokenJsonIGDB);



function prendiIGDB() {fetch(cors_proxy + "https://api.igdb.com/v4/release_dates/", {
    method: "post",
    
    body: " fields *; where date > " + year_in_ms + "; sort date asc; limit 5;",
    headers: {
        Accept: "application/json",
        "Client-ID": twitch_client_id,
        "Authorization": "Bearer " + token
 }
 }).then(onResponseIGDB, onErrorIGDB).then(onJsonIGDB).then(handleData);

}

function prendiGiocoPerID() {
    const gameIds = gameidList.join(","); // converte l'array a csv
    console.log(gameIds);

    fetch(cors_proxy + "https://api.igdb.com/v4/games/", {
    method: "post",
    
    
    body: " fields *; where id=(" + gameIds +"); limit 5;",
    headers: {
        Accept: "application/json",
        "Client-ID": twitch_client_id,
        "Authorization": "Bearer " + token
 }
 }).then(onResponseIGDB, onErrorIGDB).then(onJsonIGDB).then(stampaGiochi);
}

 

function handleData(games_by_date){
    for( let game of games_by_date) {
        gameidList.push(game.game);
       
    }
    console.log(gameidList);
    prendiGiocoPerID();
    
}

function stampaGiochi(lista_giochi){
    console.log(lista_giochi);
    // crea gli elementi dei giochi 
    for(let gioco of lista_giochi) {

        let nome= document.createElement("div")
        
        nome.textContent = gioco.name;
        let igdb_sect= document.querySelector(".igdb_coming_soon")

        igdb_sect.appendChild(nome);
    }
}



// fine api igdb








































 //  api spotify 

 const spotify_client_id='5510ef73fb5348c8b8dec19039f1dc9d';
 const spotify_client_secret='2b9a114862484c86bc8fb75c8406fb52';


let token_spotify='';
let spoty_content;
  
 

function onTokenResponse(response){
    console.log("token response ritornato");
    if (!response.ok) {
        console.log("errore dentro")
        
    }
    return response.json();
    
    
}
function onTokenJson(json){
    console.log("json token tornato");
    
    if (!json) {
        console.log("errore json non funziona\n")
    }
    token_spotify=json.access_token;
    
    
    prendi();
    
    
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

function handlePlaylist(playlists) {
    
    
    
    if (!playlists.playlists || !playlists.playlists.items || playlists.playlists.items.length === 0) {
        console.error('non ho trovato  playlist');
        return;
    }
    
    // sceglie una playlist a caso
    
    const randomIndex= Math.floor(Math.random() * playlists.playlists.items.length);
    const randomPlaylistId = playlists.playlists.items[randomIndex].id;
    
    // fetcha tracce dalla playlist

    fetch('https://api.spotify.com/v1/playlists/'+ randomPlaylistId + '/tracks', {
        headers: {
            "Authorization": "Bearer " + token_spotify
        }
    })
    .then(onResponse)
    .then(selectTracks);
    
}


// ritorna il contenuto che mi interessa
function prendi() { fetch("https://api.spotify.com/v1/browse/categories/gaming/playlists" ,
{
    headers:{
        "Authorization": "Bearer " + token_spotify
    }
}).then(onResponse).then(onJson).then(handlePlaylist); }

// fetcha il token che mi serve
fetch("https://accounts.spotify.com/api/token", {
    method: "post",
    body: "grant_type=client_credentials",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Basic " + btoa(spotify_client_id + ":" + spotify_client_secret)
 }
 }).then(onTokenResponse).then(onTokenJson);


// fine api spoty