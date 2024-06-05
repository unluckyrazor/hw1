<?php


require_once('db_config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('header.html');

session_start();

if(!isset($_SESSION['username'])){
        // vai al login
        header("Location: login.php");
        exit;
    }
?>












<html>

<head>

    
    <link rel='stylesheet' href='global.css'>
    <link rel='stylesheet' href='article.css'>

    

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <title>hw1</title>
    <script src="article.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
    
<body>

    <section>
        
            <article id="main_article"> 
                
            </article>

       
    </section>
</body>


</html>




<?php

include('footer.html'); 

?>