
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
include('header.html');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>

    <link rel="stylesheet" href="sito.css">
    <link rel='stylesheet' href='global.css'>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <title>hw1</title>
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
                        <a class="link img_link" href="www.finalround.it_.png">
                        <img class="left_article_image ai"
                            src="imgs/mario.png"> 
                        <span class="tag"> ATTUALITA </span>
                        
                        </a>
                        <img class="save savebig" src="imgs/bookmark_blank.png">
                        
                    </div>
                    
                    <!-- text-->
                        <a class="link text_link" href="www.finalround.it_.png"> 
                            <h1 id="sh1" class="side_header header" > test </h1> 
                        </a>
                        <p class="sottotitolo sbig"></p>
                        <p class="autore abig">   </p>
                </article>

                <article class="left_flex_item_article">
                    <!-- image-->
                    
                    <div class="left_image_container">
                        <a class="link img_link" href="www.finalround.it_.png">
                        <img class="left_article_image ai" src="">
                        <span class="tag"> RECENSIONE </span> 
                        </a>
                        <img class="save savebig" src="imgs/bookmark_blank.png">

                    </div>
                    
                    <!-- text-->
                        <a class="link text_link" href="www.finalround.it_.png">
                            <h1 id="sh2" class="side_header header" > </h1> </a>
                    <p class="sottotitolo sbig"></p>
                    <p class="autore abig">  </p>
                </article>
            </div>






            <!-- middle section -->
            <div id="flex_container_middle">
                <!-- big main article -->
                <article id="flex_item_article_middle" data-date="23/04/24">
                    <div class="big_mid_image_container">
                        <a class="link img_link" href="www.finalround.it_.png">
                             <img class="big_article_image_middle ai" src="">
                             <span class="tag"> ANTEPRIMA </span> 
                        </a>
                       <!-- <img class="arrow" src="imgs/white-arrow-transparent-png-22.png"> -->
                        <img class="save savebig" src="imgs/bookmark_blank.png">
                    </div>
                        
                        <a class="link text_link" href="www.finalround.it_.png">
                            <h1 class="middle_article_header header"></h1> 
                        </a>
                    <p class="sottotitolo sbig"> </p>
                    <p class="autore abig">  </p>
                        
                </article>



                

                <div id="mostra-altro"> Mostra altri </div>
                


                <!-- small mid mostra -->
                <div class="middle-flex-cont"> 


                     <article class="mid_flex_article"> 


                        <div class="mid_small_image_container">

                            <a class="link more_img_link" href="www.finalround.it_.png"> 
                            <img class="small_mid_img more_ai" src=""> <span class="tag"> RECENSIONE</span>
                            </a>
                            <img class="save more_save" src="imgs/bookmark_blank.png">
                        </div>

                        <a class="link more_text_link" href="www.finalround.it_.png">
                            <h1 class="middle_article_header more_header"> </h1> 
                        </a>
                            <p class="sottotitolo more_sottotitolo"> </p>
                            <p class="autore more_autore"> </p>
                    </article>



                    <article class="mid_flex_article"> 
                        <div class="mid_small_image_container">

                            <a class="link more_img_link" href="www.finalround.it_.png"> 
                            <img class="small_mid_img more_ai" src=""> <span class="tag"> ATTUALITA</span>
                            </a>
                            <img class="save more_save" src="imgs/bookmark_blank.png">
                        </div>

                        <a class="link more_text_link" href="www.finalround.it_.png">
                            <h1 class="middle_article_header more_header"> </h1></a>
                        <p class="sottotitolo more_sottotitolo"> </p>
                        <p class="autore more_autore"> </p>
                    </article>
                </div>

                <!-- prova api-->
                <div id="tracce"> Tracce più ascoltate da gamer come te: </div>

                <div class="flex_spoty_container"> 
                    <div class="show_content"><img class="spoty_track_image" src="imgs/grey.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name">Caricamento... </span></div></a>
                    <div class="show_content"><img class="spoty_track_image" src="imgs/grey.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> </span></div></a>
                    <div class="show_content"><img class="spoty_track_image" src="imgs/grey.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> </span></div></a>
                    <div class="show_content"><img class="spoty_track_image" src="imgs/grey.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> </span></div></a>
                    <div class="show_content"><img class="spoty_track_image" src="imgs/grey.png">
                    <a class="spoty_track_link" href="www.finalround.it_.png"><span  class="track_name"> </span></div></a>
                    
                    
                    
                   
                </div>
                <!--
                <div id="igdb_sect"> Giochi in arrivo</div>
                <div class="igdb_coming_soon"> </div>

                -->

            </div>








            <!-- right -->
            <div id="right_flex_cont">
                <article class="flex_item_article_right">
                    <div class="article_right_image_container">
                        <a class="link img_link" href="www.finalround.it_.png"> <img class="article_image_right ai" src="">
                        <span class="tag"> MONOGRAFIA </span> </a>
                        <img class="save savebig" src="imgs/bookmark_blank.png">
                    </div>
                    
                        <a class="link text_link" href="www.finalround.it_.png">
                            <h1 class="side_header header">a</h1> </a>
                    <p class="sottotitolo sbig"> </p>
                    <p class="autore abig">  </p>
                </article>
            </div>
        </div>

    </section>


</body>

<?php
include('footer.html'); 
?>



</html>


