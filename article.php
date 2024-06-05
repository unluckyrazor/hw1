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



if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    
    $conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $query= "SELECT articles.id, image_path, article_title, article_small, article_author, article_content
        FROM articles JOIN article_images ON article_id=articles.id WHERE articles.id='".$_GET['id']."'";
    $result= mysqli_query($conn, $query) or die(mysqli_error($conn));

    if(mysqli_num_rows($result)>0){
        $article=mysqli_fetch_assoc($result);
    }else {
        echo "non ho trovato l'articolo";
        exit;
    }

}else {
    echo "id articolo invalido.";
    exit;
}
?>












<html>

<head>

    
    <link rel='stylesheet' href='global.css'>
    
    <link rel='stylesheet' href='article.css'>

    

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <title><?php $article['article_title'] ?></title>
    <script src="article.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
    
<body>

    <section>
        
            <article id="main_article"> 
                <h1 class="header"><?php echo ($article['article_title']); ?></h1>
                <h2 class="header_small"><?php echo ($article['article_small']); ?></h2>
                
                <img class ="image"src="<?php echo ($article['image_path']); ?>" >
                <p class ="content"><?php echo (($article['article_content'])); ?></p>
                <p class="author">di <?php echo ($article['article_author']); ?></p>
            </article>

       
    </section>
</body>


</html>




<?php

include('footer.html'); 

?>