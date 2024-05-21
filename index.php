<!DOCTYPE html>
<?php

    // avvia sess
    session_start();
    // verifica se sono loggato
    if(!isset($_SESSION['username']))
    {
        // vai al login
        header("Location: login.php");
        exit;
    }
include('header.php');

?>

<html>

<head>

    <link rel="stylesheet" href="sito.css">
    <link rel='stylesheet' href='global.css'>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <title>mhw1</title>
    <script src="sito.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<body>


   

    <section>
        <div id="flex_container_whole">


            <!-- left-->
            <div class="left_flex_cont">
                <article class="left_flex_item_article"> 
                    <!-- image-->
                    <div class="left_image_container">
                        <a class="link" href="www.finalround.it_.png">
                        <img class="left_article_image"
                            src="imgs/rabbia.jpeg">
                        <span class="tag"> ATTUALITA </span>
                        
                        </a>
                    </div>
                    
                    <!-- text-->
                        <a class="link" href="www.finalround.it_.png"> 
                            <h1 class="side_header"> Altrimenti ci arrabbiamo </h1> 
                        </a>
                        <p class="sottotitolo">Negli ultimi anni i videogiochi difficili sono diventati mainstream</p>
                        <p class="autore"> di Alfio Rapisarda </p>
                </article>

                <article class="left_flex_item_article">
                    <!-- image-->
                    
                    <div class="left_image_container">
                        <a class="link" href="www.finalround.it_.png">
                        <img class="left_article_image" src="imgs/mario.png">
                        <span class="tag"> RECENSIONE </span> 
                        </a>
                    </div>
                    
                    <!-- text-->
                        <a class="link" href="www.finalround.it_.png">
                            <h1 class="side_header"> Kizaru sta bluffando?</h1> </a>
                    <p class="sottotitolo">Sappiamo che un giorno onepiece finirà...forse</p>
                    <p class="autore"> di Simone Spasentino </p>
                </article>
            </div>






            <!-- middle section -->
            <div id="flex_container_middle">
                <!-- big main article -->
                <article id="flex_item_article_middle" data-date="23/04/24">
                    <div class="big_mid_image_container">
                        <a class="link" href="www.finalround.it_.png">
                             <img class="big_article_image_middle" src="imgs/college.png">
                             <span class="tag"> ANTEPRIMA </span> 
                        </a>
                        <img class="arrow" src="imgs/white-arrow-transparent-png-22.png">
                        <img class="star" src="imgs/heart.png">
                    </div>
                        
                        <a class="link" href="www.finalround.it_.png">
                            <h1 class="middle_article_header"> Wise stickman vs instant gratification monkey</h1> 
                        </a>
                    <p class="sottotitolo"> Inside the mind of a master procrastinator</p>
                    <p class="autore"> di Ennio Guelfo </p>
                        
                </article>



                

                <div id="mostra-altro"> Mostra altri </div>
                



                <div class="middle-flex-cont"> 


                     <article class="mid_flex_article"> 


                        <div class="mid_small_image_container">

                            <a class="link" href="www.finalround.it_.png"> 
                            <img class="small_mid_img" src="imgs/college.png"> <span class="tag"> a </span>
                            </a>
                        </div>

                        <a class="link" href="www.finalround.it_.png">
                            <h1 class="middle_article_header"> header</h1> 
                        </a>
                            <p class="sottotitolo"> aaoisnfoai</p>
                            <p class="autore"> di zio turi</p>
                    </article>



                    <article class="mid_flex_article"> 
                        <div class="mid_small_image_container">

                            <a class="link" href="www.finalround.it_.png"> 
                            <img class="small_mid_img" src="imgs/college.png"> <span class="tag"> a </span>
                            </a>
                        </div>

                        <a class="link" href="www.finalround.it_.png">
                            <h1 class="middle_article_header"> tito</h1> </a>
                        <p class="sottotitolo"> aaoisnfoai</p>
                        <p class="autore"> di zio turi</p>
                    </article>
                </div>

                <!-- prova api-->
                <div id="tracce"> Tracce random dalla categoria gaming di spotify belle fresche: </div>

                <div class="flex_spoty_container"> 
                    <div class="show_content"><img class="spoty_track_image" src="imgs/mario.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> prova</span></div></a>
                    <div class="show_content"><img class="spoty_track_image" src="imgs/mario.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> prova</span></div></a>
                    <div class="show_content"><img class="spoty_track_image" src="imgs/mario.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> prova</span></div></a>
                    <div class="show_content"><img class="spoty_track_image" src="imgs/mario.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> prova</span></div></a>
                    <div class="show_content"><img class="spoty_track_image" src="imgs/mario.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> prova</span></div></a>
                    
                    
                    
                   
                </div>
                <div id="igdb_sect"> Giochi in arrivo</div>
                <div class="igdb_coming_soon"> </div>


            </div>








            <!-- right -->
            <div id="right_flex_cont">
                <article class="flex_item_article_right">
                    <div class="article_right_image_container">
                        <a class="link" href="www.finalround.it_.png"> <img class="article_image_right" src="imgs/bill.jpeg">
                        <span class="tag"> MONOGRAFIA </span> </a>
                    </div>
                    
                        <a class="link" href="www.finalround.it_.png">
                            <h1 class="side_header">Bill clinton ed elden ring</h1> </a>
                    <p class="sottotitolo"> Come l'ex-presidente ha salvato i videogiochi open-world</p>
                    <p class="autore"> di Fabio Catanese </p>
                </article>
            </div>
        </div>

    </section>


</body>

<?php
include('footer.php'); 
?>



</html>