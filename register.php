
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('header.html');
require('db_config.php');


session_start();
//controlla se sono già loggato e in caso mi manda a index
if(isset($_SESSION["username"])) {
    
    header("Location: index.php");
    exit();
}
    $errore=false;

    if(isset($_POST["username"])&&isset($_POST["password"])&&isset($_POST["email"])) {

            $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));    
            
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            
            //check nome utente duplicato o mail duplicata e in caso
            //if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
                //echo "Username non valido";
               // if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                 //   $error[] = "Email non valida";
                 // $password = password_hash($password, PASSWORD_BCRYPT);
    
            $query = "SELECT username FROM users
                        WHERE username = '$username'";
            $query2 = "SELECT email FROM users
                        WHERE email = '$email'";

            $res1 = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $res2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

            if(!$res1||!$res2){
                echo  "fallita query";                
                exit;
            }
            if(mysqli_num_rows($res1) > 0){
                echo "username esistente";
                exit;
            }
            if(mysqli_num_rows($res2) > 0){
                echo "email esistente";
                exit;
            }


            // query di inserimento e inserimento nel db    
            $query= "INSERT INTO users (username, password, email) VALUES ('".$username."','".$password."','".$email."')";
            $res = mysqli_query($conn, $query);

            if($res) {
                mysqli_close($conn);
                //dopo che inserisco mi imposta la sessione e mi manda a index
                $_SESSION["username"] = $_POST["username"];
                header("Location: index.php");

                exit();

            }
            else {
                // altrimenti mi da errore

               $errore=true;
            }
        }  // vedere se ci sono altri errori non catturati per cui devo validare server side
        // se l'utente vuole bypassare il client per mettersi una pw meno sicura ' cavoli' suoi, non lo faccio 
        // forse lo devo fare
?>







<html>
    <head> 
        <link rel='stylesheet' href='login.css'>
        <link rel='stylesheet' href='global.css'>
        <link rel='stylesheet' href='sito.css'>

        <script src='register.js' defer></script>
    </head>

    <body> 
        <?php 
            if ($errore) {
                echo ("errore");
            }
        ?>

        <p id="register_text"> Nuovo Utente </p>
        <form class="form" name = 'register_form' method='post'>    
            <label> nome utente <input type='text' name='username'> </label>
            <label> password <input type='password' name ='password'></label>
            <label> email <input type='email' name='email'></label>
            <label> <input type='submit'> </label>
        </form>
    
    </body>
</html>


<?php
include('footer.html'); 
?>



