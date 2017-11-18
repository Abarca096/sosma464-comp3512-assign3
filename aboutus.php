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
    include "checklogin.php";

    header("Content-Type:text/html;");
    //include 'includes/book-config.inc.php';
    include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
            <div class="mdl-grid">
                
                <!-- mdl-cell + mdl-card-->
                <div class="mdl-cell mdl-cell--8-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--orange">
                        <h2 class="mdl-card__title-text">About Us</h2>
                    </div>
                    
                    <div class="mdl-card__supporting-text">
                        <p>This site is hypothetical and was created as an assignment for COMP-3532-001 at Mount Royal University taught by Randy Connolly.<br>
                        GitHub Project Page: <a href='https://github.com/samocr7/web-assign2'>https://github.com/samocr7/web-assign2</a><br><br>
                            Contributors:<br></p>
                                <div class="mdl-grid">
                                    <div class="josh-card-wide mdl-card mdl-shadow--2dp">
                                        <div class="mdl-card__title"> 
                                            <h2 class="mdl-card__title-text">Joshua Blair</h2>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            Josh was assigned the functionality for browse employees, and the log in function.
                                            <br>
                                            <a href="https://github.com/jblai698">Josh's GitHub</a>
                                        </div>
                                    </div>
                                    
                                    <div class="sam-card-wide mdl-card mdl-shadow--2dp">
                                        <div class="mdl-card__title"> 
                                            <h2 class="mdl-card__title-text">Samer Osman</h2>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            Sam was assigned the functionality for the browse books, browse universities map, the User profile page,
                                            and part of the Analytics page.
                                            <br>
                                            <a href="https://github.com/samocr7">Sam's GitHub</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mdl-grid">
                                    <div class="cryston-card-wide mdl-card mdl-shadow--2dp">
                                        <div class="mdl-card__title"> 
                                            <h2 class="mdl-card__title-text">Cryston Robin</h2>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            Cryston was assigned the functionality for the browse universities, simple search, employee filtering and part of the Analytics page.
                                            <br>
                                            <a href="https://github.com/crobin51">Cryston's GitHub</a>
                                        </div>
                                    </div>
                                    
                                    <div class="jorge-card-wide mdl-card mdl-shadow--2dp">
                                        <div class="mdl-card__title"> 
                                            <h2 class="mdl-card__title-text">Jorge Abarca</h2>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            Jorge was assigned the functionality for the single book page, the log in/out functionality,
                                            and general page design/style.
                                            <br>
                                            <a href="https://github.com/jorge00096">Jorge's GitHub</a>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>  
                <!-- / mdl-cell + mdl-card -->
            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--8-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--pink">
                        <h2 class="mdl-card__title-text">Resource Links</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                            <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">Used Resource Description</th>
                                    <th class="mdl-data-table__cell--non-numeric">Link</th>
                                    <th class="mdl-data-table__cell--non-numeric">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Card image on index page</td>
                                    <td>http://www.pyaethitsaraung.com/images/aboutus.jpg</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Card image on index page</td>
                                    <td>https://thumbs.dreamstime.com/z/books-shelf-assorted-cartoon-sitting-36948584.jpg</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Card image on index page</td>
                                    <td>https://dahetalk.files.wordpress.com/2017/06/employee.jpg?w=1200</td>
                                    <td>1</td>
                                    
                                </tr>
                                <tr>
                                    <td>Card image on index page</td>
                                    <td>http://clipartsign.com/upload/2016/02/21/vintage-college-image-the-graphics-fairy-clipart.jpg</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>MDL Styling</td>
                                    <td>https://getmdl.io/</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td>Flag Icons</td>
                                    <td>http://flag-icon-css.lip.is/r</td>
                                    <td>NA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!--  / mdl-cell + mdl-card -->
                </div>
                </div>
            </div>
        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>