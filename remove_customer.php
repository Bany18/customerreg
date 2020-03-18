<?php 
 
require_once 'config/db_config.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM customer WHERE id = {$id}";
    $result = $dbcon->query($sql);
    $data = $result->fetch_assoc();
 
    $dbcon->close();
?>
 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Delete | Customer Registration</title>
<!-- Meta -->
<meta name="description" content="">
<meta name="author" content="Alban Binagwa">

<!-- Bootstrap -->
<link rel="stylesheet" href="dist/css/bootstrap.css">
<link rel="stylesheet" href="dist/css/alban.css">
</head>
<body class="uni-font">
<div class="container">
<div class="form-custom" align="center">
<h3 class="">Are you Sure you want to Delete this Record?</h3>
<form class="" action="php_actions/delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
    <button type="submit" class="btn btn-primary">Yes! Delete</button>
    <a href="index.php"><button type="button" class="btn btn-info">Cancel</button></a>
</form>
 </div>
</div><!-- End Container -->
<script type="text/javascript" src="dist/js/bootstrap.js"></script>
</body>
</html>
 
<?php
}
?>