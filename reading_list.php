<?php


require_once('db_config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('header.html');

session_start();

if(!isset($_SESSION['username']))
    {
        // vai al login
        header("Location: login.php");
        exit;
    }
?>

<html>

<head>

    
    <link rel='stylesheet' href='global.css'>
    <link rel='stylesheet' href='reading_list.css'>
    <link rel='stylesheet' href='sito.css'>

    

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <title>hw1</title>
    <script src="reading_list.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
    
<body>

    <section>
        <div id="container">



            <div class="inner_container"> <!-- test
        <article class="item_article"> 
                    
                    <div class="image_container">
                        <a class="link img_link" href="">
                        <img class="article_image ai"
                            src="imgs/mario.png">                                             
                        </a>
                        <img class="save" src="imgs/bookmark_blank.png">
                    </div>
                    
                    <a class="link text_link" href=""> 
                            <h1 id="sh1" class="rl_header" > test </h1> 
                        </a>
                    <p class="rl_sottotitolo"></p>
                    <p class="rl_autore">   </p>
                    </article>
            
       
        <article class="item_article">
                    <div class="image_container">
                        <a class="link img_link" href="">
                        <img class="article_image ai"
                            src="imgs/mario.png">                                             
                        </a>
                        <img class="save" src="imgs/bookmark_blank.png">
                    </div>
                    
                    <a class="link text_link" href=""> 
                            <h1 id="sh1" class="rl_header" > test </h1> 
                        </a>
                    <p class="rl_sottotitolo"></p>
                    <p class="rl_autore">   </p>
                    </article>
        -->
        

        </div>
        

     </div>
        
                
    </section>
</body>


<html>




<?php


 
include('footer.html'); 

?>