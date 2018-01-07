<html>
    <head>
        <title>
            New User Registration
        </title>
		<style>
			.alert
				{
					background-color:pink; 
					color:white;
				}
			.v_error
				{
					
					background-color:pink; 
					color:white;
					width:30%;
					text-align:center;
					margin:0 auto;
					
				}
				h3
				{
					font-size:40px; 
					font-family:Georgia
				}

		</style>
    </head>
    <body style = "text-align: center;">
	<?php if (isset($_SESSION['fail'])){?>
	<div class="alert"><p> <?php echo $_SESSION['fail']  ?></p></div>
	<?php }?>
    <img src="<?php echo base_url('images/welcome.png'); ?>" width="350px" />
    <h3>please fill your information to join.</h3>
	
	
	<?php echo validation_errors('<div class="v_error">','</div>'); ?>

    <form action='' method='POST'>

        <table align="center" style="font-size:26px; font-family:Georgia">
            <tr><td>Username：</td><td><input type="text" name="username"></td></tr>


            <tr><td>Password：</td><td><input type="password" name="password"></td></tr>
		

			<tr><td>Confirm password：</td><td><input type="password" name="confirm_password"></td></tr>

            <tr><td>E-mail：</td><td><input type="text" name="email"></td></tr>
        </table>
		<br>
        <input type="submit" value="Join">
    </form>


    </body>
</html>
