<?php require_once 'config/db_config.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Customer Registration | Home</title>
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
<h1 align="center">Customers</h1>
<button class="btn btn-primary" style="margin-left: 92%" onclick="window.location='registration.php'">Register</button><br><br>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Town Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php
            $sql = "SELECT c.`id` , c.`first_name` , c.`last_name` , c.`town_name` , g.`gender_name`
            FROM `customer` AS c
            RIGHT JOIN `gender` AS g
            ON g.`id` = c.`gender_id`
            WHERE is_deleted = 0";

            $result = $dbcon->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['first_name']."</td>
                        <td>".$row['last_name']."</td>
                        <td>".$row['town_name']."</td>
                        <td>".$row['gender_name']."</td>
                        <td>
                            <a href='view.php?id=".$row['id']."'><button type='button' class='btn btn-success'>View</button></a>
                            <a href='edit.php?id=".$row['id']."'><button type='button' class='btn btn-info'>Edit</button></a>
                            <a href='remove_customer.php?id=".$row['id']."'><button type='button' class='btn btn-danger'>Remove</button></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
  </tbody>
</table>
</div>



</div><!-- End Container -->
<script type="text/javascript" src="dist/js/bootstrap.js"></script>
</body>
</html>