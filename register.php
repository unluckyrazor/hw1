
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('header.php');
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
            //devo fare escape?
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
                
            $query= "INSERT INTO users (username, password, email) VALUES ('".$username."','".$password."','".$email."')";
            

            $res = mysqli_query($conn, $query);

            if($res) {
                

                $_SESSION["username"] = $_POST["username"];
                header("Location: index.php");

                exit();

            }
            else {
                // altrimenti mi da errore

               $errore=true;
            }
        }  // mi devo fare tutti i casi in cui ci sono errori nel db e catturarli esempio var unique duplicate, niente inserito 
        // validazione dei dati server side da fare e error handling. 
        // se l'utente vuole bypassare il client per mettersi una pw meno sicura ' cavoli' suoi, non lo faccio
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
include('footer.php'); 
?>



