<?php
require_once("config/db_config2.php");
$dbcon = new DBController();
$query ="SELECT * FROM gender";
$results = $dbcon->runQuery($query);
?>

<?php 
require_once 'config/db_config.php';
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT c.`id` , c.`first_name` , c.`last_name` , c.`town_name` , c.`gender_id` , g.`gender_name`
            FROM `customer` AS c
            RIGHT JOIN `gender` AS g
            ON g.`id` = c.`gender_id` WHERE c.`id` = {$id}";


    $result = $dbcon->query($sql);
 
    $data = $result->fetch_assoc();
 
    $dbcon->close();
  }
  ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update | Customer Registration</title>
<!-- Meta -->
<meta name="description" content="">
<meta name="author" content="Alban Binagwa">

<!-- Bootstrap -->
<link rel="stylesheet" href="dist/css/bootstrap.css">
<link rel="stylesheet" href="dist/css/alban.css">
</head>
<body class="uni-font">
<div class="container">
<form name="registrationForm" class="form-custom col-lg-6" method="post" action="php_actions/update.php" onsubmit="return validateForm()">
<h3 align="left">Update Customer Information</h3>
<br />
  <div class="form-group">
    <label for="">First Name</label>
    <input type="text" name="first_name" class="form-control" value="<?php echo $data['first_name'] ?>" placeholder="Enter First Name">
  </div>

   <div class="form-group">
    <label for="">Last Name</label>
    <input type="text" name="last_name" class="form-control" value="<?php echo $data['last_name'] ?>" placeholder="Enter Last Name">
  </div>

    <div class="form-group">
    <label for="">Gender</label>
    <select name="gender_id" class="form-control">
    <option value="<?php echo $data['gender_id'] ?>">--<?php echo $data['gender_name'] ?>--</option>
    <?php
    foreach($results as $gender) {
     ?>
     <option value="<?php echo $gender['id']; ?>"><?php echo $gender["gender_name"]; ?></option>
     <?php
     }
     ?>
    </select>
  </div>

  <div class="form-group">
    <label for="">Town Name</label>
    <input type="text" name="town_name" class="form-control" value="<?php echo $data['town_name'] ?>" placeholder="Enter Your Town Name" required>
  </div>
  
  <input type="hidden" name="id" value="<?php echo $data['id']?>" />

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