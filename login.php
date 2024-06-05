<?php 
include('header.html');
include('db_config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    session_start();

    if(isset($_SESSION["username"])) {
        
        header("Location: index.php");
        exit;
    }
    

    
    if(isset($_POST["username"])&&isset($_POST["password"])) {

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn)); 

        $username = mysqli_real_escape_string($conn, $_POST['username']);        
        $query= "SELECT * FROM users WHERE username ='".$username."'" ;        

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) >0 ) {
            $entries = mysqli_fetch_assoc($res);

            if(password_verify($_POST['password'], $entries['password'])){
                $_SESSION["username"] = $_POST["username"];
                header("Location: index.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;

            }    
        }
        
        
        else {            
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
include('footer.html'); 
?>

