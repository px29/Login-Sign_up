<html>
<head>
  <title>Homepage</title>
  <style>
  .success
	{
		background-color:green; 
		color:white;
	}
	.left{
            float:left;
            padding-left:10px;
        }
	.mid
	{
		
		width:200px;
		margin:0 auto;
		font-size:30px
		
	}
	 a
	 {
          text-decoration: none;
		  color:black;
		  font-size:40px
     }
     a:hover 
	 { 
		 text-decoration:underline;
		 color: gray
	 }
	 h3
	{
		font-size:40px; 
		font-family:Georgia
	}

  </style>
</head>
<body style="text-align:center">

<?php if (isset($_SESSION['success'])){?>
<div class="success"><p> <?php echo $_SESSION['success']  ?></p></div>
<img src="<?php echo base_url('images/success.png'); ?>" width="200px" />


<div >
  <h3>welcome,&nbsp<?php echo $_SESSION['username']  ?><h3>
  <br>
  <div class="mid">
	<a href="<?php echo site_url('Auth/logout') ?>" ><img src="<?php echo base_url('images/logout.png'); ?>" class="left" width="50px" />logout</a>
  </div>
</div>
<?php }?>
</body>
</html>
