<?php 
    require_once 'db_config.php';

    if(isset($_POST['username']) && isset($_POST['email'])) {
    
        $response= array('username_exists' => false, 'email_exists' => false, 'error' => '');

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        if(!$conn){
            $response['error'] = 'fallita connessione db ' . mysqli_connect_error();
            echo json.encode($response);
            exit;
        } 

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email= mysqli_real_escape_string($conn, $_POST['email']);
        //$username = $_POST['username'];
        //$email = $_POST['email'];



        $query = "SELECT username FROM users
                        WHERE username = '$username'";
        $query2 = "SELECT email FROM users
                        WHERE email = '$email'";

        $res1 = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $res2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

        if(!$res1||!$res2){
            $response['error'] = "fallita query" . mysqli_error($conn);
            echo json_encode($response);
            exit;
        }


        $response['username_exists'] = (mysqli_num_rows($res1) > 0);
        $response['email_exists'] = (mysqli_num_rows($res2) > 0);

        echo json_encode($response);
        mysqli_close($conn);
    
    } else {
        $response['error'] = 'richiesta invalida';
        echo json_encode($response);
    }
    
?>