<?php 
session_start();
include "checklogin.php";
//include 'includes/book-config.inc.php';
//include 'includes/book-config.inc.php';
$connection = createConnString();
/*
if(!isset($_SESSION['userid'])){
>>>>>>> Stashed changes
    header('Location: index.php');
}
*/
function getUserInfo($connection){
    $userID=null;
    if(isset($_SESSION['UserID'])){
    $userID = $_SESSION['UserID'];
    }
    $db = new UsersGateway($connection);
    $result = $db->findById($userID);
    $userInfo="";
    $userInfo .= "<li><b>Address: </b>".$result['Address']."</li><li><b>City: </b>".$result['City']."</li><li><b>Region: </b>".$result['Region']."</li><li><b>Country: </b>".$result['Country']."</li><li><b>Postal: </b>".$result['Postal']."</li><li><b>Phone: </b>".$result['Phone']."</li><li><b>Email: </b>".$result['Email']."</li>";
return $userInfo;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chapter 14</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.blue-light_blue.min.css" />

    <link rel="stylesheet" href="css/styles.css">

    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    
</head>

<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__actions mdl-card--border content"></div>
                    <div class="mdl-card__title title ">Your Profile</div>
                    <div id="user" class="mdl-card__supporting-text support">
                        <ul class="demo-list-item mdl-list">
                            <table>
                                <thead>
                                        <tr><td></td><td></td></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                            <!--<img id="profilePicture" src = "https://image.flaticon.com/icons/svg/21/21294.svg"/>
                            <h2> -->
                            <?php
                            echo '<td><img id="profilePicture" src="images/users/' . $_SESSION['PicID'] . '.jpg"></td>
                                    <li><h2>';
                            if(isset($_SESSION['FirstName'])){
                                echo "<b>".$_SESSION['FirstName']." </b>";
                            }
                            if(isset($_SESSION['LastName'])){
                                echo "<b>".$_SESSION['LastName']."</b>";
                            }
                            echo "</h2></li>"
                            ?>
                           <!-- </h2> -->
                           <td>
                            <?php echo getUserInfo($connection) ?>
                            </td>
                        </tr>
                        </tbody>
                        </table>
                        </ul>
                        <button><i class='material-icons'>mode_edit</i>Edit your Profile</button>
                    </div>
                </div>
                
                               </div>
                                </section>
                                </main>
                                </html>