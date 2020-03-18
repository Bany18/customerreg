<?php
      if(isset($_POST['Submit'])) {
         $first_name = $_POST['first_name'];
         $last_name  = $_POST['last_name'];
         $gender_id  = $_POST['gender_id'];
         $town_name  = $_POST['town_name'];
        
        include_once("../config/db_config.php");
                
        $result = mysqli_query($dbcon, "INSERT INTO customer(first_name,last_name,gender_id,town_name) VALUES('$first_name','$last_name','$gender_id','$town_name')");

        echo "Registration Successfully. <a href='../index.php'>Go Back</a>";
    }
    ?>