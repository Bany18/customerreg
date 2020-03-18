<?php 
require_once '../config/db_config.php';
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "UPDATE customer SET is_deleted = 1 WHERE id = {$id}";
    if($dbcon->query($sql) === TRUE) {
        echo "<p>Successfully Deleted!</p>";
        echo "<a href='../index.php'>Go Back</a>";
    } else {
        echo "Error deleting record : " . $dbcon->error;
    }
 
    $dbcon->close();
}
 
?>