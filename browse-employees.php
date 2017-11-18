<?php
session_start();
include "checklogin.php";
$connection = createConnString();

function displayEmpList($connection) {
    // display list of employees depending on filter conditions
    $employee = new EmployeesGateway($connection);
    if ((isset($_GET['filter_city'])) && (isset($_GET['filter_lastname'])) && ($_GET['filter_city']!=null) && ($_GET['filter_lastname']!=null)) {
        // if city and lastname are set and are not null
        $result = $employee->getEmployeeByCityAndName($_GET['filter_city'],$_GET['filter_lastname']);
    } elseif ((isset($_GET['filter_city']) && ($_GET['filter_city']!=null))) {
        // if city is set and is not null
        $result = $employee->getEmployeeByCity($_GET['filter_city']);
    } elseif ((isset($_GET['filter_lastname']) && ($_GET['filter_lastname']!=null))) {
        // if lastname is set and is not null
        $result = $employee->getEmployeeByName($_GET['filter_lastname']);
    } else {
        // if nothing is set, show all employees
        $result = $employee->findAllSorted(true);
    }
    $returnVar = "";
    foreach ($result as $row) {
        // for each row in result, generate html and return it
        $EmployeeID=$row['EmployeeID'];
        $returnVar .= ("<li><a href='?emp=$EmployeeID'>" . $row['FirstName'] . " " . $row['LastName'] . "</a></li>");
    }
    return $returnVar;
}

function displayDetailedEmpInformation($connection) {
    // display detailed information about each employee
    if (isset($_GET['emp'])) { // check to see if server query exists
        $employee = new EmployeesGateway($connection);
        $result=$employee->findById($_GET['emp']);
        $returnVar = "";
        
        if ($result != false) { // check for errors getting data from mysql
            // go through mysql results, generate appropriate information
            $returnVar .= ("<h3>" . $result['FirstName'] . " " . $result['LastName'] . "</h3>");
            $returnVar .= ("<p>" . $result['Address'] . "<br />");
            $returnVar .= ($result['City'] . ", " . $result['Region'] . "<br />");
            $returnVar .= ($result['Country'] . ", " . $result['Postal'] . "<br />");
            $returnVar .= ($result['Email'] . "</p>");
        } else { // error, display appropriate message
            $returnVar .= ("An error has occurred!<br>");
            $returnVar .= ("No employee found that matches request! ... try clicking on an employee from the list.<br>"); 
        }
    } else { // inform the user that nothing was queried
        $returnVar = ("<p>Please try clicking on an employee from the list.</p>");
    }
    return $returnVar;
}

function displayDetailedEmpToDoRecords($connection) {
    // display detailed employee todo records
    if (isset($_GET['emp'])) { // check to see if server query exists
        $employee = new EmployeesGateway($connection);
        $result=$employee->getEmployeeToDoRecords($_GET['emp']);
        $returnVar = "";

        if ($result != false) { // check for errors getting data from mysql
            foreach ($result as $row) { // for each row in result, generate html and return it
                $returnVar .= ("<tr><td>" . date('Y-M-d',strtotime($row['DateBy'])) . "</td><td>" . $row['Status'] . "</td><td>" . $row['Priority'] . "</td><td>" . substr($row['Description'],0,40));
            }
        } else { // error, display appropriate message
            $returnVar .= ("An error has occurred!<br>");
            $returnVar .= ("No employee found that matches request! ... try clicking on an employee from the list.<br>"); 
        }
    return $returnVar;
    } else { // inform the user that nothing was queried
        return ("<p>Please try clicking on an employee from the list.</p>");
    }
}

function displayEmpMessages($connection) {
    // display employee messages
    if (isset($_GET['emp'])) { // check to see if server query exists
        $employee = new EmployeesGateway($connection);
        $result=$employee->getEmpMessages($_GET['emp']);
        $returnVar = "";
        
        if ($result != false) { // check for errors getting data from mysql
            foreach ($result as $row) { // for each row in result, generate html and return it
                $var=$employee->findById($row['ContactID']);
                $returnVar .= ("<tr><td>" . date("Y-M-d",strtotime($row['MessageDate'])) . "</td><td>" . $row['Category'] . "</td><td>" . $var['FirstName'] . " " . $var['LastName'] . "</td><td>" . substr($row['Content'],0,40) . "</td></tr>");
            }
        } else { // error, display appropriate message
            $returnVar .= ("An error has occurred!<br>");
            $returnVar .= ("No employee found that matches request! ... try clicking on an employee from the list.<br>"); 
        }
    return $returnVar;
    } else { // inform the user that something went wrong
        return ("<p>Please try clicking on an employee from the list.</p>");
    }
}

function displayCityFilterList($connection) {
    // display filter list options
    $employee = new EmployeesGateway($connection);
    $result=$employee->getEmployeeCities(true);
    
    $returnVar = "<option value=''></option>";
    foreach ($result as $row) { // for each row in result, generate html and return it
        $returnVar .= "<option value='" . $row['City'] . "'>" . $row['City'] . "</option>";
    }
    return $returnVar;
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
                <div class="mdl-cell mdl-cell--2-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--orange">
                        <h2 class="mdl-card__title-text">Employees</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <ul class="demo-list-item mdl-list">
                            <!-- display list of employees -->
                            <?php echo displayEmpList($connection); ?>            
                        </ul>
                    </div>
                </div>  <!-- / mdl-cell + mdl-card -->
              
              <!-- mdl-cell + mdl-card -->
                <div class="mdl-cell mdl-cell--7-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                        <h2 class="mdl-card__title-text">Employee Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                            <div class="mdl-tabs__tab-bar">
                                <a href="#address-panel" class="mdl-tabs__tab is-active">Address</a>
                                <a href="#todo-panel" class="mdl-tabs__tab">To Do</a>
                                <a href="#messages-panel" class="mdl-tabs__tab">Messages</a>
                            </div>
                        
                            <div class="mdl-tabs__panel is-active" id="address-panel">
                                <!-- display requested employees information based on employee id -->
                                <?php echo displayDetailedEmpInformation($connection); ?>
                            </div>
                          
                            <div class="mdl-tabs__panel" id="todo-panel">
                                <table class="mdl-data-table  mdl-shadow--2dp">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">Date</th>
                                            <th class="mdl-data-table__cell--non-numeric">Status</th>
                                            <th class="mdl-data-table__cell--non-numeric">Priority</th>
                                            <th class="mdl-data-table__cell--non-numeric">Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- display requested employees to-do list information based on employee id -->
                                        <?php echo displayDetailedEmpToDoRecords($connection); ?>
                                    </tbody>
                                </table>
                            </div>
                          
                            <div class="mdl-tabs__panel" id="messages-panel">
                                <table class="mdl-data-table  mdl-shadow--2dp">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">Date</th>
                                            <th class="mdl-data-table__cell--non-numeric">Category</th>
                                            <th class="mdl-data-table__cell--non-numeric">From</th>
                                            <th class="mdl-data-table__cell--non-numeric">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- display requested employees messages list based on employee id -->
                                        <?php echo displayEmpMessages($connection); ?>
                                    </tbody>
                                </table>
                            </div>    
                        </div>                         
                    </div>    
              </div>  <!-- / mdl-cell + mdl-card -->   
              
              
               <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp" id = "box">
                    <div class="mdl-card__title mdl-color--light-green mdl-color-text--white " id = "filter">
                      <h2 class="mdl-card__title-text "><div id="tt1" class="icon material-icons">arrow_drop_down</div>Filters</h2>
                    </div>
                    <div class="mdl-card__supporting-text" id="filtercard">
                        
                        <form action="browse-employees.php" method="GET">
                            <!-- Filter by city -->
                            Filter By City: <select name="filter_city">
                                <!-- display requested list of citie -->
                                <?php echo displayCityFilterList($connection); ?>
                            </select><br><br>
                            
                            <!-- Filter by name -->
                            Filter By Lastname: <input type="text" name="filter_lastname"><br>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">SUBMIT</button>
                        </form>
                    </div>    
              </div>  <!-- / mdl-cell + mdl-card -->   
            </div>  <!-- / mdl-grid -->    
        </section>
    </main>    
</div>    <!-- / mdl-layout -->
</body>
</html>