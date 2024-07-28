<?php session_start(); require_once "mutual.php"; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>Smartwing - drone blog</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="about.css" type="text/css"/>
<link rel="stylesheet" href="media.css" type="text/css"/>
<script type="text/javascript" src="functions.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" 
rel="stylesheet">
</head>
<body onload="aboutstart();">
	<?php require_once "header.php";?>
	<main>
		<section>
			<div class="sites" style="margin-top:60px;">
				<div class="lefttext55">
					<h2 class="intro">Welcome to the Smartwing drone blog!</h2>
					<p style="text-align: justify">
						Are you a fun of drone technology? 
						If the answer sounds yes you are in a good place then! Smartwing is the blog where you can find the latest news about drones. New models, new construction techniques and drones happenings are announcing here. You can read our articles and share your ideas and opinions in the comment section. To do it you should create an account - I recommend doing it as soon as possible, as there are hidden articles for regular users ;)
					</p>
					<div class="logoobox"></div>
				</div>
				<div class="lefttext35">
					<div id="loginorregister">
						<form action="register.php" method="post" class="contactform">
							<h2 style="text-align:center;"><span style="color:#2ab3d2;">Sign</span> up</h2>
							<div style="text-align:center;"><input name="name" type="text" placeholder="Name"
							<?php if(isset($_SESSION['r_name'])) echo 'value="'.$_SESSION['r_name'].'" ';?>></div>
							<div style="text-align:center;"><input name="email" type="email" placeholder="E-mail"
							<?php if(isset($_SESSION['r_email'])) echo 'value="'.$_SESSION['r_email'].'" ';?>></div>
							<div style="text-align:center;"><input name="pass" type="password" placeholder="Password"
							<?php if(isset($_SESSION['r_pass'])) echo 'value="'.$_SESSION['r_pass'].'" ';?>></div>
							<div class="statute"><label><input name="check" type="checkbox"
							<?php if(isset($_SESSION['r_check'])) echo 'checked';?>>Accept the statute</label></div>
							<div style="text-align:center;"><button>SAVE</button></div>
							<div class="alertzone">
							<?php 
							if(isset($_SESSION['e_register']))
							{
								echo $_SESSION['e_register'];
								unset($_SESSION['e_register']);
							}
							?></div>
						</form>
					</div>
				<div id="secondoption"><span style="color:#2ab3d2;">LOG</span> IN</div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</section>
	</main>
	<?php require_once "footer.php";?>
</body>
</html>
<style>
@media(max-width: 330px)
{
	.sites
	{
		width:100%;
	}
	.lefttext35
	{
		padding:5px;
	}
}
</style>