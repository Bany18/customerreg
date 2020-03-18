<?php 
require_once 'config/db_config.php';
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT c.`id` , c.`first_name` , c.`last_name` , c.`town_name` , g.`gender_name`
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
<title>View | Customer Registration</title>
<!-- Meta -->
<meta name="description" content="">
<meta name="author" content="Alban Binagwa">

<!-- Bootstrap -->
<link rel="stylesheet" href="dist/css/bootstrap.css">
<link rel="stylesheet" href="dist/css/alban.css">
</head>
<body class="uni-font">
<div class="container">
<div class="form-custom">
<h3>Details for <span class="badge badge-info"><?php echo $data['first_name'] ?></span></h3>
<br />
<table class="table table table-bordered">
  <tbody>
    <tr>
      <td class="left">
        <strong>ID</strong>
      </td>
      <td class="right"><?php echo $data['id'] ?></td>
    </tr>

    <tr>
      <td class="left">
        <strong>Fist Name</strong>
      </td>
      <td class="right"><?php echo $data['first_name'] ?></td>
    </tr>

    <tr>
      <td class="left">
        <strong>Last Name</strong>
      </td>
      <td class="right"><?php echo $data['last_name'] ?></td>
    </tr>

    <tr>
      <td class="left">
        <strong>Town Name</strong>
      </td>
      <td class="right"><?php echo $data['town_name'] ?></td>
    </tr>

    <tr>
      <td class="left">
        <strong>Gender</strong>
      </td>
      <td class="right"><?php echo $data['gender_name'] ?></td>
    </tr>

  </tbody>
</table>
</div>

<div align="center">
 <a href="index.php"><strong>Go Back</strong></button>
</a>

</div><!-- End Container -->
<script type="text/javascript" src="dist/js/bootstrap.js"></script>
</body>
</html>