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
    
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <!--<script src="js/functions.js"></script>-->
    
    <script type="text/javascript" src="js/register.js"></script>
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--5-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--light-green mdl-color-text--white">
                        <h2 class="mdl-card__title-text">Register</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <form id="registerForm" method="POST" action="updateUser.php">
                           <?php 
                           //this happens when a user tries to register, but their username is already taken. (uodateUser.php redirects back to here with a query string if registration fails)
                           if(isset($_GET['reg'])){
                               if($_GET['reg']=="false"){
                           echo "<a id='errMsg'><font color='red'>This Username Already Exists!</font></a><br><br>";
                           }
                           }
                           ?>
                            <label>First Name:</label> <input type="text" name="firstname"><br><br>
                            <label>Last Name:</label> <input class="required" type="text" name="lastname"><br><br>
                            <label>Address:</label> <input type="text" name="address"><br><br>
                            <label>City:</label> <input class="required" type="text" name="city"><br><br><br>
                            <label>Region:</label> <input type="text" name="region"><br><br>
                            <label>Country:</label> <input class="required" type="text" name="country"><br><br>
                            <label>Postal:</label> <input type="text" name="postal"><br><br>
                            <label>Phone:</label> <input type="text" name="phone"><br><br>
                            <label>Email</label> <input id="userName" class="required" type="text" name="user">
                            <a id="aside">(This will be your Username)</a><br><br>
                            <label>Password:</label> <input class="required passwd" type="password" name="password"><br><br>
                            <label>Confirm Password:</label> <input class="required passwd" type="password" name="password"><br><br>
                            <button type="submit">Register</button><br><br>
                            <a class="reqMsg">Please fill out the required fields</a>
                        </form>
                    </div>    
              </div>  <!-- / mdl-cell + mdl-card -->  
            </div>
        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
</body>
</html>