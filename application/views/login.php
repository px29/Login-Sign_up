
<html>
  <head>
    <title>Please login</title>
  </head>

  <body style = "text-align: center;">
    <?php if (isset($_SESSION['fail'])){?>
  <div><p style="color:pink"> <?php echo $_SESSION['fail']  ?></p></div>
<?php }?>
  <img src="<?php echo base_url('images/welcome.png'); ?>" />

  <h3>Login if already a user</h3>
  <?php echo validation_errors('<div>','</div>'); ?>
  <form action="" method="POST">

    <table align="center">
      <tr><td>Username：</td><td><input type="text" name="username"></td></tr>
      <tr><td>Password：</td><td><input type="password" name="password"></td></tr>
    </table>

    <input type="submit" name="action" value="Login">
    <input type="submit" name="action" value="New User">
  </form>

  </body>
</html>
