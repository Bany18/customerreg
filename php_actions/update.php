<?php 
 
require_once '../config/db_config.php';
 
if($_POST) {
      $first_name = $_POST['first_name'];
      $last_name  = $_POST['last_name'];
      $town_name  = $_POST['town_name'];
      $gender_id  = $_POST['gender_id'];
      $id = $_POST['id'];

    $sql = "UPDATE customer SET first_name = '$first_name', last_name = '$last_name', town_name = '$town_name', gender_id = '$gender_id' WHERE id = {$id}";
    if($dbcon->query($sql) === TRUE) {
        echo "<p>Customer Updated</p>";
        echo "<a href='../index.php'>Go Back</a>";
    } else {
        echo "Erorr while updating record : ". $dbcon->error;
    }
 
    $dbcon->close();
 
}
 
?>