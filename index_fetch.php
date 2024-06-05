<?php 
include('db_config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    $conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $query= "SELECT articles.id, image_path, article_title, article_small, article_author, article_path
     FROM articles JOIN article_images ON article_id=articles.id ORDER BY article_id";
    $result= mysqli_query($conn, $query) or die(mysqli_error($conn));
    $articles=array();
    
    if(!$result){
        echo  "fallita query";                
        exit;
    }
    
    


    while($row=mysqli_fetch_assoc($result)){
        $articles[]=$row;
    }

    mysqli_free_result($result);
    mysqli_close($conn);

    if (!$articles) {
        echo json_encode(["error" => "non ho trovato niente"]);
        exit;
    }

    
    echo json_encode($articles);
  // devo fare escape dei caratteri?  
?>