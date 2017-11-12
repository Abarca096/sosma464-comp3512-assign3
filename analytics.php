<?php
include 'includes/book-config.inc.php';
$display="";
if(isset($_GET['data'])){
    switch($_GET['data']){
        case 'books': $display = "books"; 
            break;
        case 'activity': $display = "activity";
            break;
        case 'adopted': $display = "adopted";
            break;
        default: $display = "";
    }
}
function displayData($display){
    $connection = createConnString();
$db = new AnalyticsGateway($connection);
    $analytics="";
    if($display == "books"){
        $result = $db->findGetBookVisits(null);
        $analytics = "<table class='mdl-data-table  mdl-shadow--2dp'><th>Country</th><th>Count</th>";
        //call gateway here and append the data to this string
        foreach($result as $row){
            $analytics.="<tr><td>".$row['countryName']."</td><td>".$row['count']."</td></tr>";
        }
        $analytics.="</table>";
    }else if($display =="activity"){
        //what the heck kind of html am i supposed to do here??
        $analytics = "<ul id ='boxes'><li><ul>";
        $result = $db->findNumberofVisits(null);
        $visits = $result['visits'];
        $analytics.="<li>Box</li><li>$visits</li><li>There were $visits visits in June</li></ul></li>";
        $result = $db->findUniqueCountryCount(null);
        $countryCount = $result['countries'];
        $analytics.="<li><ul><li>Box</li><li>$countryCount</li><li>There were $countryCount unique countries</li></ul></li>";
        $result = $db->findEmployeeToDoCount(null);
        $toDoCount = $result['todos'];
        $analytics.="<li><ul><li>Box</li><li>$toDoCount</li><li>There were $toDoCount employee tasks</li></ul></li>";
        $result = $db->findEmployeeMessageCount(null);
        $messages = $result['messages'];
        $analytics.="<li><ul><li><i class='material-icons'>mail</i></li><li>$messages</li><li>There were $messages messages exchanged</li></ul></li>";
        $analytics.="</ul>";
    }else if ($display =="adopted"){
        $result = $db->findTopTen(null);
        $analytics = "<table class='mdl-data-table  mdl-shadow--2dp'><th>ImagePlaceHolder</th><th>Title</th><th>Quantity</th>";
        foreach($result as $row){
            $isbn = $row['ISBN10'];
            $analytics.="<tr><td><img src ='book-images/small/$isbn.jpg'></td><td><a href ='single-book.php?ISBN10=$isbn'>".$row['Title']."</a></td><td>".$row['sum']."</td></tr>";
        }
        $analytics.="</table>";
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
    <script src="js/search.js"></script>
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
                <div class="mdl-card__actions mdl-card--border">
                    <?php echo displayData($display);?>
                </div>
                <div class="topBooks-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="analytics.php?data=books">Top Books</a>
                    </div>
                </div>
                
                <div class="activity-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="analytics.php?data=activity">Activity</a>
                    </div>
                </div>
                <div class="adoptedBooks-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="analytics.php?data=adopted">Top Adopted Books</a>
                    </div>
                </div>
                </div>
                
            </div>
        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>