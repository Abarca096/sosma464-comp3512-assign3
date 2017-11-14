<?php

include 'includes/book-config.inc.php';
session_start();

if (isset($_SESSION['sessionuser'])) {
 } else {
     // not logged in
     if ((isset($_GET['user'])) && (isset($_GET['password']))) {
        // check for query string - if string exists then user is trying to login
        
        $connection = createConnString();
        $user = new CheckLoginGateway($connection);
        $result = $user->findById($_GET['user']);

        if (($_GET['password'] != "") && ($_GET['password'] != null) && ($result['Password'] == md5($_GET['password'] . $result['Salt']))) {
            // check if username and password is correct
            // if correct, save session state and send them back where they came from, consider them now 'logged in'
            $_SESSION['sessionuser']=$_GET['user'];
            header("Location:index.php");
        } else {
            // if not correct, send back to login page with error because login information is incorrect
            header("Location:login.php");
        }
    } else {
        // if string nonexistant then redirect to login page
        header("Location:login.php");
    }
 }
 
?>