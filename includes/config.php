<?php
ob_start();
static $con;
    
if(!isset($con)) {
    //database connection is stored in a separate file outside root folder.
    //this is then parsed into a local variable 
    $config = parse_ini_file('../../private-config/config.ini'); 

//connection using php 7.1 way: new mysqli. the old method of mysqli_connect is deprecated
//$con =	mysqli_connect($server, $user, $pass, $mydb);
    $con =	mysqli_connect('localhost', $config['username'], $config['password'], "google");
}

// If connection was not successful, handle the error
if($con === false) {
    if(mysqli_connect_errno()) {
        die( "Failed to connect to MySQL: " . mysqli_connect_errno() );
    }
}

mysqli_set_charset($con, 'utf8');

