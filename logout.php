<?php
// distrugge la sessione e manda a login
session_start();
session_destroy();
header("Location: login.php");
exit();
?>