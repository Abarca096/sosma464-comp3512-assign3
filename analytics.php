<?php
session_start();
include "checklogin.php";

header("Content-Type:text/html;");
//include 'includes/book-config.inc.php';
$connection = createConnString();
$db = new AnalyticsGateway($connection);
function displayCountries($db){
    $analytics="";
        $result = $db->findGetBookVisits(null);
        //call gateway here and append the data to this string
        foreach($result as $row){
            $analytics.="<tr><td>"."<img src = 'images/flags/".strtolower($row['Code']).".svg' width = '35' height = '25'>". $row['countryName']."</td><td>".$row['count']."</td></tr>";
        }
        return $analytics;
    }

function displayVisitors($db){
        $result = $db->findNumberofVisits(null);
        return $result['visits'];
}

function displayUniqueCountries($db){
    $result = $db->findUniqueCountryCount(null);
        return $result['countries'];
}

function displayEmployeeToDo($db){
    $result = $db->findEmployeeToDoCount(null);
    return $result['todos'];
}
function displayMessages($db){
        $result = $db->findEmployeeMessageCount(null);
        return $result['messages'];
}
function displayAdoptedBooks($db){
        $result = $db->findTopTen(null);
        $analytics="";
        foreach($result as $row){
            $isbn = $row['ISBN10'];
            $analytics.="<tr><td><img src ='book-images/thumb/$isbn.jpg'></td><td><a href ='single-book.php?ISBN10=$isbn'>".$row['Title']."</a></td><td>".$row['sum']."</td></tr>";
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
                
                 <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp" id = "cont">
                    <div class="mdl-card__title title ">Visitors
                    </div>
                    <i class="material-icons">people</i>
                    <div class="mdl-card__actions mdl-card--border content">
                        <b>
                        <?php $visits =  displayVisitors($db); echo $visits?>
                        </b>
                    </div>
                    <div class="mdl-card__supporting-text support">
                        <p>There were <?php echo $visits?> visits in June</p>
                    </div>
                </div>
                
                 <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title title">Unique Countries
                    </div>
                    <i class="material-icons">public</i>
                    <div class="mdl-card__actions mdl-card--border content">
                        <b><?php $countries =  displayUniqueCountries($db); echo $countries?></b>
                    </div>
                    <div class="mdl-card__supporting-text support">
                        <p>There were <?php echo $countries?> unique countries</p>
                    </div>
                </div>
                
                 <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title title">Employee Tasks
                    </div>
                    <i class="material-icons">content_paste</i>
                    <div class="mdl-card__actions mdl-card--border content">
                        <b><?php $toDos= displayEmployeeToDo($db); echo $toDos?></b>
                    </div>
                    <div class="mdl-card__supporting-text support">
                        <p>There were <?php echo $toDos?> employee tasks</p>
                    </div>
                </div>
                
                 <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title title">Messages Exchanged
                    </div>
                    <i class="material-icons">message</i>
                    <div class="mdl-card__actions mdl-card--border content">
                        
                        <b><?php $messages =  displayMessages($db); echo $messages?></b>
                    </div>
                    <div class="mdl-card__supporting-text support">
                        <p>There were <?php echo $messages?> messages exchanged</p>
                    </div>
                </div>
                
                <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title" id = "special">Top Visitor Countries
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <table class='mdl-data-table  mdl-shadow--2dp tWidth '><th class='mdl-data-table__cell--non-numeric'>Country</th><th class='mdl-data-table__cell--non-numeric'>Count</th>
                        <?php echo displayCountries($db);?>
                        </table>
                    </div>
                </div>
 
                <div class="mdl-cell mdl-cell--8-col card-lesson mdl-card  mdl-shadow--2dp  ">
                    <div class="mdl-card__title title">Top Adopted Books
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <table class='mdl-data-table  mdl-shadow--2dp tWidthD'><th class='mdl-data-table__cell--non-numeric'></th><th class='mdl-data-table__cell--non-numeric'>Title</th><th class='mdl-data-table__cell--non-numeric'>Quantity</th>
                        <?php echo displayAdoptedBooks($db);?>
                        </table>
                    </div>
                </div>
                </div>
                
            </div>
        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>