<?php 
include('db_config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_GET['id']) && is_numeric($_GET['id'])) {


$conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
$query= "SELECT articles.id, image_path, article_title, article_small, article_author, article_content
    FROM articles JOIN article_images ON article_id=articles.id WHERE articles.id='".$_GET['id']."'";
$result= mysqli_query($conn, $query) or die(mysqli_error($conn));

if(mysqli_num_rows($result)>0){
    $article=mysqli_fetch_assoc($result);
    echo json_encode($article);
}else {
    echo json_encode("non ho trovato l'articolo");
    exit;
}

}else {
echo json_encode("id articolo invalido.");
exit;
}


    
    
  // devo fare escape dei caratteri?  
?>