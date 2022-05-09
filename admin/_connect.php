<?php
session_start();
    //Credentials
    $db_server = "OMITTED";
    $db_user = "OMITTED";
    $db_pass = "OMITTED";
    $db_database = "OMITTED";

    //Connect
    $db_connect = mysqli_connect($db_server, $db_user, $db_pass, $db_database); 
?>