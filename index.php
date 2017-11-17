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
    <script src="js/search.js"></script>
    
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php 
    session_start();
    if($_SESSION['Email'] != null) {
        include "checklogin.php";
    }
    include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50" id="indexPage">
        <section class="page-content">
            <div class="mdl-grid">
                <div class="browseuniviersities-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="browse-universities.php">Browse Universities</a>
                    </div>
                </div>
                
                <div class="browsebooks-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="browse-books.php">Browse Books</a>
                    </div>
                </div>
            </div>
            
            <div class="mdl-grid">
                <div class="browseemployees-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="browse-employees.php">Browse Employees</a>
                    </div>
                </div>
            
                <div class="aboutus-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="aboutus.php">About Us</a>
                    </div>
                </div>
            </div>
        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>