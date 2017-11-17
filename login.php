<?php
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
    
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="js/search.js"></script>
    
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
                        <h2 class="mdl-card__title-text">Login</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        
                        <form action="checklogin.php" method="GET">
                            <a>Username:</a> <input type="text" name="user" onfocus="removeText()"><br><br>
                            <a>Password:</a> <input type="password" name="password" onfocus="removeText()"><br><br>
                            <?php
                                if($_GET['error']==true){
                                    echo "<a id='errMsg'><font color='red'>Invalid username or password, please try again</font></a><br><br>";
                                }
                            ?>
                            <script>
                                function removeText(){
                                    document.getElementById("errMsg").style.display="none";
                                }
                            </script>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">SUBMIT</button>
                        </form>
                    </div>    
              </div>  <!-- / mdl-cell + mdl-card -->  
                
            </div>
        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>