<?php

//if no session is started...start one 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//if username exists in the session...
if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $_SESSION["username"] = $username;
}
//create a connection to database
$conn = new mysqli("localhost", "root", "", "cs161");
if ($conn->connect_error) {
    echo 'jjj';
}
?>
    
