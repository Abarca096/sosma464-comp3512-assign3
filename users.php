<?php 
if(!isset($_COOKIE['userid'])){
    header('Location: index.php');
}
function getUserInfo(){
    if(isset($_COOKIE['userid'])){
    $userID = $_COOKIE['userid'];
    $db = new UsersGateway();
    $result = $db->findById($userID);
    $userInfo = "<td>".$result['FirstName']."</td><td>".$result['LastName']."</td><td>".$result['Address']."</td><td>".$result['City']."</td><td>".$result['Region']."</td><td>".$result['Country']."</td><td>".$result['Postal']."</td><td>".$result['Phone']."</td><td>".$result['Email']."</td>";
}
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
                <table class="mdl-data-table  mdl-shadow--2dp">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">First Name</th>
                                            <th class="mdl-data-table__cell--non-numeric">Last Name</th>
                                            <th class="mdl-data-table__cell--non-numeric">Address</th>
                                            <th class="mdl-data-table__cell--non-numeric">City</th>
                                            <th class="mdl-data-table__cell--non-numeric">Region</th>
                                            <th class="mdl-data-table__cell--non-numeric">Country</th>
                                            <th class="mdl-data-table__cell--non-numeric">Postal</th>
                                            <th class="mdl-data-table__cell--non-numeric">Phone</th>
                                            <th class="mdl-data-table__cell--non-numeric">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo getUserInfo(); ?>
                                    </tbody>
                                </table>
                                </div>
                                </section>
                                </main>
                                </html>