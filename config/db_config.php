<?php 
$localhost = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ongeza_test"; 
 
$dbcon = new mysqli($localhost, $username, $password, $dbname); 
 
if($dbcon->connect_error) {
    die("connection failed : " . $dbcon->connect_error);
} else {

}
 
?>