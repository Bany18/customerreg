<?php require_once 'config/db_config.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register | Customer Registration</title>
<!-- Meta -->
<meta name="description" content="">
<meta name="author" content="Alban Binagwa">

<!-- Bootstrap -->
<link rel="stylesheet" href="dist/css/bootstrap.css">
<link rel="stylesheet" href="dist/css/alban.css">
</head>
<body class="uni-font">
<div class="container">
<form name="registrationForm" class="form-custom col-lg-6" method="post" action="php_actions/create.php" onsubmit="return validateForm()">
<h3 align="left">Customer Registration Form</h3>
<br />
  <div class="form-group">
    <label for="">First Name</label>
    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
  </div>

   <div class="form-group">
    <label for="">Last Name</label>
    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
  </div>

  <div class="form-group">
    <label for="">Gender</label>
    <select name="gender_id" class="form-control">
       <?php
            $sql = "SELECT * FROM gender";
            $result = $dbcon->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['id'].">".$row['gender_name']."</option>";
                }
            } else {
                echo "No Data Avaliable";
            }
            ?>
    </select>
  </div>

  <div class="form-group">
    <label for="">Town Name</label>
    <input type="text" name="town_name" class="form-control" placeholder="Enter Your Town Name" required>
  </div>

  <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
</form>

<div align="center">
 <a href="index.php"><strong>Go Back</strong></button>
</a>

</div><!-- End Container -->
<script type="text/javascript" src="dist/js/bootstrap.js"></script>
<script type="text/javascript">
function validateForm()                
{ 

  var first_name = document.forms["registrationForm"]["first_name"];
  var last_name = document.forms["registrationForm"]["last_name"];

  if (first_name.value == "")                
  { 
    window.alert("Please enter your First Name"); 
    first_name.focus(); 
    return false; 
  }

   if (first_name.value.length < 3)                
  { 
    window.alert("First Name must be atleast 3 Characters"); 
    first_name.focus(); 
    return false; 
  }

 if (last_name.value == "")                
  { 
    window.alert("Please enter your Last Name"); 
    last_name.focus(); 
    return false; 
  }

}
</script> 
</body>
</html>