<?php

include 'includes/book-config.inc.php';
$connection = createConnString();
function displayStates($connection) {
    $connection = createConnString();
    $university = new UniversitiesGateway($connection);
    $result = $university->findStates();
    
    
    
   foreach ($result as $row) {
        $returnVar .= ("<option 'value='" . $row['State'] . "'>" . $row['State'] . "</option>");
    }
    return $returnVar;
}

function displayUniversities($connection) {
     
     $university = new UniversitiesGateway($connection);
     $returnVar ="";
    if ((isset($_GET['state'])) && ($_GET['state'] != "top20")) {
        // a state was selected
        
        
        $returnVar = ("<p>The top universities for " . $_GET['state'] . " are listed below (alphabetically). <a href='browse-universities.php'>Click here to see the top 20 universities from all states (remove this filter)</a>.</p>");
        
      
        $result = $university->findByState($_GET['state']);
        
    } else {
        // a state was not selected
      
           $result = $university->findAllLimit(null,20, null);
    }
    
    if (!(isset($_GET['uid']))) {
        foreach ($result as $row) {
            $returnVar .= ("<li><a href='browse-universities.php?uid=" .$row['UniversityID'] . "'>" . $row['Name'] . "</a></li>");
        }
        return $returnVar;
    }
    
    
}

function displayDetailedUniversity($connection) {
    
     $university = new UniversitiesGateway($connection);
    if (isset($_GET['uid'])) {
        // a university was specified, show the detailed information about that univeristy
        
        
        $infoArray = $university->findById($_GET['uid']);
        $returnVar = ("<li><h5>" . $infoArray['Name'] . "</h5></li><li>Address: " . $infoArray['Address'] . "</li><li>State: " . $infoArray['State'] . "</li><li>Zip: " . $infoArray['Zip'] . "</li><li>Website: <a href='http://" . $infoArray['Website'] . "'>" . $infoArray['Website'] . "</a></li><li>Longitude: " . $infoArray['Longitude'] . "</li><li>Latitude: " . $infoArray['Latitude'] . "</li>");
        $returnVar .= ("<br><p><a href='browse-universities.php'>Click here to see the top 20 universities from all states (remove this filter)</a>.</p>");
        
        return $returnVar;
    }
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

    <link rel="stylesheet" href="css/styles.css?2">
    
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
                <!-- mdl-cell + mdl-card -->
                <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--orange">
                        <h2 class="mdl-card__title-text">Filter by State</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <ul class="demo-list-item mdl-list">
                            <!-- show list of states for users to select -->
                            <p>To filter by state please select one then hit the submit button!<br></p>
                            <form action="browse-universities.php" method="GET">
                                <select name="state">
                                    <option value='top20'>No Filter</option>
                                    <?php echo displayStates($connection); ?>
                                </select><br><br>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">SUBMIT</button>
                            </form>
                        </ul>
                    </div>
                </div>  <!-- / mdl-cell + mdl-card -->
              
                <!-- mdl-cell + mdl-card -->
                <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                        <h2 class="mdl-card__title-text">Universities</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <!-- display requested list of universities, detailed university information -->
                        <ul class="universitylist">
                            <?php 
                            echo displayUniversities($connection);
                            echo displayDetailedUniversity($connection);
                            ?>
                        </ul>
                    </div>    
                </div>  <!-- / mdl-cell + mdl-card -->   
            </div>  <!-- / mdl-grid -->    
        </section>
    </main>    
</div>    <!-- / mdl-layout -->
</body>
</html>