<html>
<head>
  <title>Homepage</title>
</head>
<body style="text-align:center">
<?php if (isset($_SESSION['success'])){?>
<div><p style="color:pink"> <?php echo $_SESSION['success']  ?></p></div>
<div>
  welcome,<?php echo $_SESSION['username']  ?>
</div>
<?php }?>
</body>
</html>
