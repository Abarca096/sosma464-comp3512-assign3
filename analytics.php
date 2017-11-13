<?php
include 'includes/book-config.inc.php';
$connection = createConnString();
$db = new AnalyticsGateway($connection);
function displayCountries($db){
    $analytics="";
        $result = $db->findGetBookVisits(null);
        $analytics = "<table class='mdl-data-table  mdl-shadow--2dp'><th>Country</th><th>Count</th>";
        //call gateway here and append the data to this string
        foreach($result as $row){
            $analytics.="<tr><td>".$row['countryName']."</td><td>".$row['count']."</td></tr>";
        }
        $analytics.="</table>";
        return $analytics;
    }

function displayVisitors($db){
    $analytics="";
        $result = $db->findNumberofVisits(null);
        $visits = $result['visits'];
        $analytics.="<p>$visits</br>There were $visits visits in June</p>";
        return $analytics;
}

function displayUniqueCountries($db){
    $result = $db->findUniqueCountryCount(null);
    $analytics="";
        $countryCount = $result['countries'];
        $analytics.="<p>$countryCount</br>There were $countryCount unique countries</p>";
        return $analytics;
}

function displayEmployeeToDo($db){
    $result = $db->findEmployeeToDoCount(null);
    $analytics="";
        $toDoCount = $result['todos'];
        $analytics.="<p>$toDoCount</br>There were $toDoCount employee tasks</p>";
        return $analytics;
}
function displayMessages($db){
        $result = $db->findEmployeeMessageCount(null);
        $analytics="";
        $messages = $result['messages'];
        $analytics.="<p>$messages</br>There were $messages messages exchanged</p>";
        return $analytics;
}
function displayAdoptedBooks($db){
        $result = $db->findTopTen(null);
        $analytics = "<table class='mdl-data-table  mdl-shadow--2dp'><th>ImagePlaceHolder</th><th>Title</th><th>Quantity</th>";
        foreach($result as $row){
            $isbn = $row['ISBN10'];
            $analytics.="<tr><td><img src ='book-images/small/$isbn.jpg'></td><td><a href ='single-book.php?ISBN10=$isbn'>".$row['Title']."</a></td><td>".$row['sum']."</td></tr>";
        }
        $analytics.="</table>";

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
                
                 <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title">Visitors
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <?php echo displayVisitors($db);?>
                    </div>
                </div>
                
                 <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title">Unique Countries
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <?php echo displayUniqueCountries($db);?>
                    </div>
                </div>
                
                 <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title">Employee Tasks
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <?php echo displayEmployeeToDo($db);?>
                    </div>
                </div>
                
                 <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title">Messages Exchanged
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <?php echo displayMessages($db);?>
                    </div>
                </div>
                
                <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title">Top Visitor Countries
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <?php echo displayCountries($db);?>
                    </div>
                </div>
 
                <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title">Top Adopted Books
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <?php echo displayAdoptedBooks($db);?>
                    </div>
                </div>
                </div>
                
            </div>
        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>