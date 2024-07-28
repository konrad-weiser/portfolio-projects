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
<link rel="stylesheet" href="about.css" type="text/css"/>
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="media.css" type="text/css"/>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" 
rel="stylesheet">
</head>
<body>
	<?php require_once "header.php";?>
	<main>
		<section>
			<div class="sites" style="margin-top:90px;">
					<form style="margin: auto;"class="contactform"><h2 style="text-align:center;"><span style="color:#2ab3d2;">Write</span> to us</h2><div style="text-align:center;"><input name="email" type="email" placeholder="E-mail"></div><div style="text-align:center;"><div style="text-align:center;"><textarea placeholder="Your message..."class="contacttextarea"></textarea></div><button>SEND</button></div><div class="alertzone">
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
	<?php require_once "footer.php";?>
</body>
</html>