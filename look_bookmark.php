<?php
require_once('db_config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (isset($_SESSION["username"])) {
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));    
    $user = mysqli_real_escape_string($conn, $_SESSION['username']);
    
    $query = "SELECT id FROM users WHERE username='$user'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $id = $row['id'];

    $query = "SELECT a.id, image_path, article_title, article_small, article_author, article_path
                  FROM read_later rl
                  JOIN articles a ON rl.article_id = a.id
                  JOIN article_images ai ON a.id = ai.article_id
                  WHERE rl.user_id='$id'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        $bookmarkedArticles = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $bookmarkedArticles[] = $row;
        }
        echo json_encode($bookmarkedArticles);
    } else {
        echo json_encode([]);
    }

    mysqli_close($conn);
    exit();
} else {
    echo "non ho la sessione utente";
}
?>