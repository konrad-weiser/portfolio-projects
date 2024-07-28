<?php session_start(); require_once "mutual.php";?>
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
<body onload="logooanimation()">
	<?php require_once "header.php";?>
	<main>
		<section>
			<div class="sites" style="margin-top:90px;">
					<form action="login.php" method="post" style="margin: auto;"class="contactform"><h2 style="text-align:center;"><span style="color:#2ab3d2;">Log</span> in</h2><div style="text-align:center;"><input name="email" type="email" placeholder="E-mail"></div><div style="text-align:center;"><div style="text-align:center;"><input name="pass" type="password" placeholder="Password"></div><div style="text-align:center;"><button>LOG IN</button></div><div class="alertzone">
					<?php
						if(isset($_SESSION['alert']))
							{
								echo $_SESSION['alert'];
								unset($_SESSION['alert']);
							}
					?>
					</div>
				</form>
				<div style="clear:both;"></div>
			</div>
		</section>
	</main>
</body>
</html>