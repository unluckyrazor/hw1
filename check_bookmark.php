
 <?php
require_once('db_config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(isset($_SESSION["username"])) {
    
    if(isset($_POST["article_id"])){
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));    
        $article = mysqli_real_escape_string($conn, $_POST['article_id']);
        $user = mysqli_real_escape_string($conn, $_SESSION['username']);
        
        // cerco nel mio db i miei user e mi prendo l'id

        $query ="SELECT id FROM users WHERE username='".$user."'";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        $id=$row['id'];
        //$id = mysqli_real_escape_string($conn, $id);

        $query = "SELECT user_id, article_id FROM read_later WHERE user_id='".$id."' AND article_id='".$article."'";
        $res=mysqli_query($conn, $query);

        if($res && mysqli_num_rows($res)>0){
            
            $isbookmarked=true;
            echo json_encode($isbookmarked);
            
            mysqli_close($conn);
            exit();
            
        }else{
            
            $isbookmarked=false;
            echo json_encode($isbookmarked);
            
            mysqli_close($conn);
            exit();
            
        }
        if($res){
            echo "tutto ok";
            mysqli_close($conn);
            exit();
        }else {
            
            echo "errore ";
        }
    } else { echo "non mi hai dato l'id bene";}

} else echo "non c'è la sessione";
?>