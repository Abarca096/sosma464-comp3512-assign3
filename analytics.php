<?php
$display="";
if(isset($_GET['data'])){
    switch($_GET['data']){
        case 'book': $display = "book"; 
            break;
        case 'activity': $display = "activity";
            break;
        case 'adopted': $display = "adopted";
            break;
        default: $display = "";
    }
}
function displayData($display){
    if($display == "books"){
        $analytics = "<table><th>Country</th><th>Count</th></table>";
        //call gateway here and append the data to this string
    }else if($display =="activity"){
        //what the heck kind of html am i supposed to do here??
        $analytics = "<ul id ='boxes'><ul><li>Box</li><li>Number</li><li>Label</li></ul></ul>";
    }else if ($display =="adopted"){
        $analytics = "<table><th>ImagePlaceHolder</th><th>Title</th><th>Quantity</th>";
        //call gateway here and append the data to this string
}
    return $analytics;
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
    
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php 
    include 'includes/header.inc.php';
    include 'includes/left-nav.inc.php';
    ?>
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
            <div class="mdl-grid">
                <div class="topBooks-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    </div>
                    <div class="mdl-card__supporting-text">
                        Top Books
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="analytics.php?data=books">Top Books</a>
                    </div>
                </div>
                
                <div class="activity-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    </div>
                    <div class="mdl-card__supporting-text">
                        Activity
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="analytics.php?data=activity">Activity</a>
                    </div>
                </div>
                <div class="adoptedBooks-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    </div>
                    <div class="mdl-card__supporting-text">
                        Top Adopted Books
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="analytics.php?data=adopted">Top Adopted Books</a>
                    </div>
                </div>
                </div>
                
                <div class="mdl-card__actions mdl-card--border">
                    <?php echo displayData($display);?>
                </div>
            </div>
        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>