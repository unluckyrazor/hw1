<?php 
include('header.php');
include('db_config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    session_start();
    //controlla se sono già loggato e in caso mi manda a index
    if(isset($_SESSION["username"])) {
        
        header("Location: index.php");
        exit();
    }
    

    // se ha ricevuto username e pw dal form si connette al db e controlla che ci sia l'utente
    // devo implementare l'anti injection
    if(isset($_POST["username"])&&isset($_POST["password"])) {

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn)); 
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password= mysqli_real_escape_string($conn, $_POST['password']);   
        //$username = $_POST['username'];
        //$password = $_POST['password'];
        
        $query= "SELECT * FROM users WHERE username ='". $username . "' AND password = '" .$password. "'" ;
        

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if(mysqli_num_rows($res)>0) {
            // se lo trova mi setta la sessione e mi manda a index
 
            $_SESSION["username"] = $_POST["username"];
            header("Location: index.php");

            exit();

        }
        else {
            // altrimenti mi da errore
            
            $errore = true;
        }
    }  
?> 


<html>
    <head> 
        <link rel='stylesheet' href='login.css'>
        <link rel='stylesheet' href='global.css'>
        <link rel='stylesheet' href='sito.css'>

        <script src='login.js' defer></script>
    </head>

    <body> 
        
        <form class="form" name = 'login_form' method='post'>    
            <p><label id=name> nome utente <input type='text' name='username'> </label> </p>
            <p><label id=pw> password <input type='password' name ='password'></label> </p>
            <p><label><input type='submit'> <label> </p>
        </form>

            <div class="register_container">
                 <a id="register_link_text" href="/sito/register.php">

                     <div class="register_link_button">REGISTRATI</div>
                </a> 
            </div> 
        
        
        <?php 
            if(isset($errore)) {
                echo "<p>  credenziali errate </p>";
            }
        ?>

    </body>
</html>


<?php
include('footer.php'); 
?>

