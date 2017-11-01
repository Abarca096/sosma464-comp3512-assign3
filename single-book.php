<?php

header("Content-Type:text/html; charset=ISO-8859-1");
include 'includes/book-config.inc.php';

$connection = createConnString();

function displayBookInfo($connection) {
    if (isset($_GET['ISBN10'])) {
        /* $sql = "SELECT ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst, Description, SubcategoryName, Status, Imprint, BindingType 
                FROM Books, Subcategories, Imprints,Statuses, BindingTypes 
                WHERE ISBN10=? 
                AND Books.SubcategoryID=Subcategories.SubcategoryID 
                AND Books.ImprintID=Imprints.ImprintID AND Books.ProductionStatusID=Statuses.StatusID 
                AND Books.BindingTypeID=BindingTypes.BindingTypeID;";
        $result = queryDatabase($sql,array($_GET['ISBN10']))->fetch(); */
        $bookDB = new BookGateway($connection);
        $result = $bookDB->findBySecondaryKey($_GET['ISBN10']);
        $returnVar;
        if ($result != false) {
            $ISBN10=$_GET['ISBN10'];
            $returnVar .= "<td><img src='book-images/medium/" . $result['ISBN10'] . ".jpg' alt='$ISBN10 Image'></td>";
            $returnVar .= "<td><ul><li><h5>" . $result['Title'] . "</h3></li><li>ISBN10: ". $result['ISBN10'] . "</li><li>ISBN13: " . $result['ISBN13'] 
                            . "</li><li>Copyright: &copy;" . $result['CopyrightYear']; 
            /* Get the Subcategory name */
            $subDB = new SubcategoriesGateway($connection);
            $subS = $subDB->findByID($result['SubcategoryID']);
            $returnVar .= "</li><li>Subcategory: " . $subC['SubcategoryName'];
            /* Get the Imprint name */
            $impDB = new ImprintsGateway($connection);
            $impS = $impDB->findByID($result['ImprintID']);
            $returnVar .= "</li><li>Imprint: " . $result['Imprint'];
            /* Get the Production Status */
            $statDB = new StatusGateway($connection);
            $statS = $statDB->findByID($result['StatusID']);
            $returnVar .= "</li><li>Production Status: " . $statS['Status'];
            /* Get the Binding Type and finish the rest of the markup*/
            $bindBD = new BindingGateway($connection);
            $bindS = $bindBD->findByID($result['BindingTypeID']);
            $returnVar .= "</li><li>Binding Type: " . $bindS['BindingType'] . "</li><li>Trim Size: " . $result['TrimSize'] 
                        . "</li><li>Page Count: " . $result['PageCountsEditorialEst'] . "</li><li>Description: " . $result['Description'] . "</li></ul></td>";
        } else {
            $returnVar .= ("An error has occured! No information about the book you have selected exists! <a href='browse-books.php'>Click Here</a> to go back.");
        }
    return $returnVar;
    }
}

function displayAuthors() {
    if (isset($_GET['ISBN10'])) {
        $sql = "SELECT FirstName, LastName, Institution FROM BookAuthors, Authors, Books WHERE Books.BookID=BookAuthors.BookID AND BookAuthors.AuthorID=Authors.AuthorID AND ISBN10=? ORDER BY 'Order';";
        $result = queryDatabase($sql,array($_GET['ISBN10']));
        $returnVar;
        
        while($row=$result->fetch()) { // loop through mysql results, echo appropriate information
            // check to see if an institution is listed
            if (($row['Institution'] == "")) { $row['Institution'] = "No Institution Listed"; }

            // echo list, because this needs to be set for each author a sizable portion of HTML may be needed
            $returnVar .= ("<li class='mdl-list__item mdl-list__item--three-line'>");
            $returnVar .= ("<span class='mdl-list__item-primary-content'>");
            $returnVar .= ("<i class='material-icons mdl-list__item-avatar'>person</i>");
            $returnVar .= ("<span>" . $row['FirstName'] . " " . $row['LastName'] . "</span>");
            $returnVar .= ("<span class='mdl-list__item-text-body'>" . $row['Institution']);
            $returnVar .= ("</span></span></li>");
        }
        return $returnVar;
    }
}

function displayAdoptedByUniverisities() {
    if (isset($_GET['ISBN10'])) {
        $sql = "SELECT DISTINCT Name FROM Universities, Books, AdoptionBooks, Adoptions WHERE Adoptions.UniversityID=Universities.UniversityID AND Adoptions.AdoptionID=AdoptionBooks.AdoptionID AND Books.BookID=AdoptionBooks.BookID AND ISBN10=?;";
        $result = queryDatabase($sql,array($_GET['ISBN10']));
        $returnVar;
        
        while($row=$result->fetch()) { // loop through mysql results, echo appropriate information
            $returnVar .= ("<li>" . $row['Name'] . "</li>");
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
                            <?php echo displayAuthors(); ?>
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
                            <?php echo displayAdoptedByUniverisities(); ?>
                        </ul>
                    </div>
                </div>  <!-- / mdl-cell + mdl-card -->
            </div>  <!-- / mdl-grid -->    
        </section>
    </main>    
</div>    <!-- / mdl-layout -->
</body>
</html>