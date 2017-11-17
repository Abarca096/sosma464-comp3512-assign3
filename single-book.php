<?php

header("Content-Type:text/html; charset=ISO-8859-1");
session_start();
include "checklogin.php";


//include 'includes/book-config.inc.php';

$connection = createConnString();

function displayBookInfo($connection) {
    if (isset($_GET['ISBN10'])) {
        $bookDB = new BookGateway($connection);
        $result = $bookDB->fetchSpecificQuery(null, $_GET['ISBN10']);
        $returnVar = "";
        if ($result != false) {
            $ISBN10=$_GET['ISBN10'];
            $returnVar .= "<td id='bookDiv'><img src='book-images/medium/" . $ISBN10 . ".jpg' onload='addClick()' alt='". $result['Title'] . "' id='bookImg'></td>
                            </div>";
            $returnVar .= "<td><ul><li><h5>" . $result['Title']
                        . "</h5></li><li>ISBN10: ". $ISBN10
                        . "</li><li>ISBN13: " . $result['ISBN13']
                        . "</li><li>Copyright: &copy;" . $result['CopyrightYear']
                        . "</li><li>Subcategory: <a href='browse-books.php?subcat=". $result['SubID'] . "'>" . $result['SubcategoryName'] . '</a>'
                        . "</li><li>Imprint: <a href='browse-books.php?imprint=". $result['ImpID'] . "'>" . $result['Imprint'] . '</a>'
                        . "</li><li>Production Status: " . $result['Status']
                        . "</li><li>Binding Type: " . $result['BindingType'] . "</li><li>Trim Size: " . $result['TrimSize'] 
                        . "</li><li>Page Count: " . $result['PageCountsEditorialEst'] 
                        . "</li><li>Description: " . $result['Description'] . "</li></ul></td>"; 
        } else {
            $returnVar .= ("An error has occured! No information about the book you have selected exists! <a href='browse-books.php'>Click Here</a> to go back.");
        }
    return $returnVar;
    }
}

function displayAuthors($connection) {
    if (isset($_GET['ISBN10'])) {
        $authDB = new AuthorsGateway($connection);
        $returnVar ="";
        $getA = $authDB->fetchAllSpecificQuery("lastName", $_GET['ISBN10']);
        /*For each author found */
        foreach($getA as $result) {
            /* Check to see if the Author has an institution */
            if (($result['Institution'] == "")) { $result['Institution'] = "No Institution Listed"; }
            
            /* Echo a list of the Authors that wrote the book */
            $returnVar .= ("<li class='mdl-list__item mdl-list__item--three-line'>");
            $returnVar .= ("<span class='mdl-list__item-primary-content'>");
            $returnVar .= ("<i class='material-icons mdl-list__item-avatar'>person</i>");
            $returnVar .= ("<span>" . $result['FirstName'] . " " . $result['LastName'] . "</span>");
            $returnVar .= ("<span class='mdl-list__item-text-body'>" . $result['Institution']);
            $returnVar .= ("</span></span></li>");
        }
        return $returnVar;
    }
}

function displayAdoptedByUniverisities($connection) {
    if (isset($_GET['ISBN10'])) {
        $adoptDB = new AdoptionBooksGateway($connection);
        $returnVar = "";
        $getUni = $adoptDB->fetchAllSpecificQuery(null, $_GET['ISBN10']);
        
        foreach($getUni as $row) { // loop through mysql results, echo appropriate information
            $returnVar .= ("<li><a href='browse-universities.php?uid=". $row['UniversityID'] . "'>" . $row['Name'] . "</a></li>");
        }
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

    <link rel="stylesheet" href="css/styles.css">
    
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="js/search.js"></script>
    <script> 
    function addClick(){
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    document.getElementById('bookImg').addEventListener("click", function(e){
        document.getElementById('imgModal').style.display = "block";
        document.getElementById("largeImg").src = e.target.src;
        document.getElementById("caption").textContent = e.target.alt;
    });
    
    // When the user clicks on the image it closes it
    document.getElementById('largeImg').addEventListener("click", function() { 
        document.getElementById('imgModal').style.display = "none";
    });
    } 
    </script>
</head>
<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
            
        <!-- Large Image Modal -->
        <div id='imgModal' class='modal'>
            <img class='modal-content' id='largeImg'>
            <div id='caption'></div>
        </div>
        
            <div class="mdl-grid">
                <!-- mdl-cell + mdl-card -->
                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--green">
                        <h2 class="mdl-card__title-text">Book Information</h2>
                    </div>
                    
                    <div class="mdl-card__supporting-text">
                        <ul class="demo-list-item mdl-list">
                            <!-- display the details about the selected book -->
                            <table class="singlebookinfolist">
                                    <thead>
                                        <tr><td></td><td></td></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php echo displayBookInfo($connection); ?>
                                        </tr>
                                    </tbody>
                            </table>
                        </ul>
                    </div>
                </div>  <!-- / mdl-cell + mdl-card -->
            </div>  <!-- / mdl-grid -->    
            
            <div class="mdl-grid">
                <!-- mdl-cell + mdl-card -->
                <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--yellow">
                        <h2 class="mdl-card__title-text">Contributing Authors</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>The authors who contributed to the creation of this material are:</p>
                        <ul class="demo-list-three mdl-list">
                            <!-- display author information -->
                            <?php echo displayAuthors($connection); ?>
                        </ul>
                    </div>
                </div>  <!-- / mdl-cell + mdl-card -->
                
                <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--red">
                        <h2 class="mdl-card__title-text">University Adoption</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>The universities who have adopted this book are:</p>
                        <ul class="demo-list-item mdl-list">
                            <!-- display universities that have adopted the book -->
                            <?php echo displayAdoptedByUniverisities($connection); ?>
                        </ul>
                    </div>
                </div>  <!-- / mdl-cell + mdl-card -->
            </div>  <!-- / mdl-grid -->    
        </section>
    </main>    
</div>    <!-- / mdl-layout -->
</body>
</html>