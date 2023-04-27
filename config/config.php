<?php


try{
    //we need for constant to connect to our server or database.

    //host
    if(!defined("HOSTNAME")) define("HOSTNAME", "localhost");

    //Database
    if(!defined("DBNAME")) define("DBNAME", "homeland");
 

    //user
    if(!defined("USER")) define("USER", "root");

    //password

    if(!defined("PASS")) define("PASS", "");

    //we need to create an object to instantiate to PDO class that is built in PHP
    $conn = new PDO("mysql:host=".HOSTNAME."; dbname=".DBNAME.";", USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // if ($conn == true) {
    //         echo "database is connected";
    //     }else{
    //         echo "error in connection";
    //     }

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}






?>