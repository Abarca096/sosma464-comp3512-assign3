<?php

include 'includes/book-config.inc.php';
session_start();
    
if (!isset($_SESSION['Email'])) {
     // not logged in
     if ((isset($_GET['user'])) && (isset($_GET['password']))) {
        // check for query string - if string exists then user is trying to login

        $connection = createConnString();
        $user = new CheckLoginGateway($connection);
        $result = $user->findById($_GET['user']);

        if ($result['Password'] == md5($_GET['password'] . $result['Salt'])) {
            // if the password entered matches the user entered
            $additionalinfo = $user->getAdditionalUserData($_GET['user']);
            
            // set session variables
            $_SESSION['Email']=$_GET['user'];
            $_SESSION['FirstName']=$additionalinfo['FirstName'];
            $_SESSION['LastName']=$additionalinfo['LastName'];
            $_SESSION['UserID']=$additionalinfo['UserID'];
            $_SESSION['PicID']=rand(1,10);
            
            // check if session last_page exists, if not redirect to main index page
            if(isset($_SESSION['last_page'])){
                header("Location:" . $_SESSION['last_page']);
            } else {
                header("Location: index.php");
            }
        } else {
            // if not correct, send back to login page with error because login information is incorrect
            header("Location:login.php?error=true");
        }
    } else {
        // if string nonexistant then redirect to login page
        $_SESSION['last_page']=basename($_SERVER['PHP_SELF']);
        header("Location:login.php");
    }
}
?>

