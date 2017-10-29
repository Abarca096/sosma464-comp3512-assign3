<?php

function queryDatabase($sql,$bindArray) {
    // Establish a connection to the database, return the required output
    // if error occurs return false
    // close connection
    try {
        $host='';
        $dbname='book';
        $user='joshuablair';
        $pass='';
    
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // turn on verbose messages
       
        $result = $pdo->prepare($sql);
        for ($i=0;$i<count($bindArray);$i++) {
            $result->bindValue($i+1,$bindArray[$i]);
        }
        
        $result->execute();
        return $result;
    } catch (PDOException $e) { 
        // in the event that an error occurs inform user
        echo "An error has occurred!<br>";
        return false; // return false, an error.
    }
    $pdo=null;
}

?>