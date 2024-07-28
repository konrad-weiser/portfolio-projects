<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Contact - Netforyou</title>
<meta name="description" content="Find here all the contact information you need for Netforyou. Send a form or email us at contact@netforyou.co.uk. We will do our best to reply to you within 24 hours with all the support you need."/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="alternate" hreflang="en-uk" href="https://netforyou.co.uk/contact">
<link rel="shortcut icon" href="img/logo.png" type="image/png">
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="fontello/css/fontello.css" type="text/css"/>
<link rel="stylesheet" href="about.css" type="text/css"/>
<link rel="stylesheet" href="contac.css" type="text/css"/>
<link rel="stylesheet" href="media.css" type="text/css"/>
<?php require_once "google_tag.php";?>
</head>
<body>
	<?php require_once "google_tag_body.php";?>
	<?php require_once "header.php";?>
<main>
	<section style="margin-top: 57px;">
			<div class="introduction">
				<h1>Contact netforyou</h1>
				<div class="aboutline"></div>
				<h2>We craft website design and functionality, optimizing for search engines.</h2>
				<div class="techrow">
					<div class="sm-aboutline"></div>
					<h4>We use technologies:</h4>
					<div class="sm-aboutline"></div>
				</div>
				<img width="410" height="109" alt="html, css, javascript, php" src="img/tech.webp">
			</div>
		</section>
		<section class="contactsquare">
				<form class="secondcontact" action="form.php" method="post">
				<h2>Ready for better online visibility?</h2>
				<p>Leave your email below or write a message to contact@netforyou.co.uk - I will contact you within 24 hours to talk about improving your current website or a completely new project.</p>
				<div class="emailbox">
					<label>
						<span>E-mail address</span>
						<input name="email" type="email" required placeholder="Your e-mail address">
					</label>
					<label>
						<span>Message</span>
						<textarea name="message" placeholder="Message"></textarea>
					</label>
					<input type="hidden" name="form" value="contact">
					<label class="checklabel" style="margin:15px auto;">
						<input name="check" required type="checkbox">
						<span class="checktext">I accept the terms of personal data processing</span>
					</label>
					<button>Send a message</button>
				</div>
			</form>
			<div class="rightcontact">
				<div class="whycon">
					<img width="600" height="400" alt="programmer building websites" class="conimg" src="img/me2.webp">
					<div class="textmebox">
						<i class="icon-mail abicon"></i>
						<a  class="textme" href="mailto:contact@netforyou.co.uk">contact@netforyou.co.uk</a>
					</div>
				</div>
			</div>
		</section>
</main>
		<?php require_once "footer.php";?>
	<script src="scripts.js"></script>
</body>
</html>