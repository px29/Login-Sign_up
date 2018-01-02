<html>
    <head>
        <title>
            New User Registration
        </title>
    </head>
    <body style = "text-align: center;">
    <img src="<?php echo base_url('images/welcome.png'); ?>" />
    <h3>please fill your information to join.</h3>

	<?php echo validation_errors('<div>','</div>'); ?>
    <form action='' method='POST'>

        <table align="center">
            <tr><td>Username：</td><td><input type="text" name="username"></td></tr>

            <tr><td>Password：</td><td><input type="password" name="password"></td></tr>

			<tr><td>Confirm password：</td><td><input type="password" name="confirm_password"></td></tr>

            <tr><td>E-mail：</td><td><input type="text" name="email"></td></tr>
        </table>

        <input type="submit" value="Join">
    </form>


    </body>
</html>
