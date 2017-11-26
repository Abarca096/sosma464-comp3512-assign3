<?php 
session_start();
include "checklogin.php";
$connection = createConnString();

//this function returns user profile information, based on the userID of the session.
function getUserInfo($connection){
    $userID=null;
    if(isset($_SESSION['UserID'])){
    $userID = $_SESSION['UserID']; //sets the userID to the value stored in the session
    }
    $db = new UsersGateway($connection);
    $result = $db->findById($userID); //queries for user information based on the userID.
    $userInfo="";
    $userInfo .= "<li><b>Address: </b>".$result['Address']
                ."</li><li><b>City: </b>".$result['City']
                ."</li><li><b>Region: </b>".$result['Region']
                ."</li><li><b>Country: </b>".$result['Country']
                ."</li><li><b>Postal: </b>".$result['Postal']
                ."</li><li><b>Phone: </b>".$result['Phone']
                ."</li><li><b>Email: </b>".$result['Email']."</li>";
return $userInfo;
}

function generateUserForm($connection){
    $userID=null;
    if(isset($_SESSION['UserID'])){
    $userID = $_SESSION['UserID']; //sets the userID to the value stored in the session
    }
    $db = new UsersGateway($connection);
    $result = $db->findById($userID); //queries for user information based on the userID.
    /* FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email, Privacy */
    $form = "";
    $form .= '<label>First Name:</label> <input type="text" name="firstName" value="'. $result['FirstName'] . '"> <br>
            <label>Last Name:</label> <input class="required" type="text" name="lastName" value="' . $result['LastName'] . '"> <br>
            <label>Address:</label> <input type="text" name="address" value="' . $result['Address'] . '"> <br>
            <label>City:</label> <input class="required" type= "text" name="city" value="' . $result['City'] . '"> <br>
            <label>Region:</label> <input type="text" name="region" value="' . $result['Region'] . '"> <br>
            <label>Country:</label> <input class="required" type="text" name="country" value="' . $result['Country'] . '"> <br>
            <label>Postal:</label> <input type="text" name="postal" value="' . $result['Postal'] . '"> <br>
            <label>Phone:</label> <input type="text" name="phone" value ="' . $result['Phone'] . '"> <br>
            <label>Email:</label> <input id="userName" class="required" type="text" name="email" value ="' . $result['Email'] . '"> <br>
            <input type="hidden" name="UserID" value="'.$_SESSION['UserID'].'" />';
    
    return $form;
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
    <script src="js/functions.js"></script>
    <script src ="js/users.js"></script>
    
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
                    <div id="user" class="mdl-card__supporting-text" id = "supported">
                        <div id="editProfile">
                            <form id = "profileForm" action = "updateUser.php" method="POST">
                                <h4>Edit your Information</h4>
                                <?php echo generateUserForm($connection); ?>
                                <button type="submit" value="Submit changes">Submit Changes</button>
                                <button type="button" id="cancelButton">Cancel</button>
                                <p><i><font color="#405d27">Items in green will be changed</font></i></p>
                            </form>
                        </div>
                            <table>
                                <thead>
                                        <tr><td></td><td></td></tr>
                                    </thead>
                                    <tbody>
                            <?php
                            echo '<td><img id="profilePicture" src="images/users/' . $_SESSION['PicID'] . '.jpg"></td>
                                    <h2>';
                            if(isset($_SESSION['FirstName'])){
                                echo "<b>".$_SESSION['FirstName']." </b>";
                            }
                            if(isset($_SESSION['LastName'])){
                                echo "<b>".$_SESSION['LastName']."</b>";
                            }
                            echo "</h2>"
                            ?>
                           <!-- </h2> -->
                           <td id="userInformation">
                            <?php echo getUserInfo($connection) ?>
                            </td>
                        </tr>
                        </tbody>
                        </table>
                        <button id="editButton"><i class='material-icons'>mode_edit</i>Edit your Profile</button>
                    </div>
                </div>
                
                               </div>
                                </section>
                                </main>
                                </html>