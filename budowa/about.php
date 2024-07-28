<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>Brobuild</title>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="subpages.css" type="text/css"/>
<link rel="stylesheet" href="media.css" type="text/css"/>
<link rel="stylesheet" href="fontello/css/fontello.css" type="text/css"/>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;900&display=swap" rel="stylesheet">

</head>
<body>
	<?php require_once "header.php";?>
	<section>
		<div class="buildersimg">
				<h1 class="mainh1">About us</h1>
				
		</div>
	</section>
	<section class="introsection" style="margin-top: 60px;">
		<div class="introduction">
			<h2>A few words about us</h2>
			<div class="divider"></div>
			<p>We are well aware that building a house or other property is a complicated process. Therefore, the most important thing here is to choose a construction company that understands the needs of the 21st century client, can advise well and, above all, perform the entrusted works. That is why we invite you to cooperate with Brobuild.</p>

			<p>We are a company specializing in general construction services. We have already built over 240 houses and properties.</p>
			<p>We deal with small and large investments, including public procurement..</p>
		</div>
		<div class="companyimg">
			<img src="img/company.jpg">
		</div>
	</section>
	<section>
		<div class="margin"></div>
		<div class="parallax">
			<div class="parallax-inner">
				<div class="introsection">
						<div class="introduction">
					<h2>What exactly do we do?</h2>
					<div class="divider"></div>
					<p class="whitep">We deal with, among others:</p>
					<ul>
						<li>building residential houses</li>
						<li>building restaurants</li>
						<li>building office buildings</li>
						<li>interior and exterior renovations</li>
					</ul>
					<a class="moreinfo"href="about.html">See our realizations</a>
					</div>
					<div class="companyimg">
						<img src="img/housefloor.jpg">
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section style="margin-top: 60px;">
		<h2 class="centerh2">Our experienced crew</h2>
		<div class="divider" style="margin-left: auto; margin-right: auto;"></div>
		<p class="centerp">Meet our best specialists in your field. It is thanks to their cooperation and appropriate approach that we have already completed hundreds of orders.</p>
		<div class="crewdetail">
			<div class="man mant">
				<div class="manimg">
					<img src="img/john.png" style="width:190px;">
				</div>
				<div class="mandesc">
					<p>John Bennet</p>
					<div class="mancontact">
						<i class="icon-facebook"></i>
						<i class="icon-twitter"></i>
						<i class="icon-linkedin"></i>
						<i class="icon-instagram"></i>
					</div>
				</div>
			</div>
			<p class="manp">John Bennet is the chief financial officer of the building houses company. He is responsible for managing the company's finances and ensuring it remains financially stable. He is known for his ability to capitalize on new business opportunities.</p>
			<div></div>
			<p class="manp">Dave Harris is the head of construction at the building houses company. He has been with the company for over 15 years and is responsible for overseeing the construction of all projects. He is known for his ability to manage large construction teams and deliver projects on time and within budget.</p>
			<div class="man mant">
				<div class="manimg">
					<img src="img/dave.png">
				</div>
				<div class="mandesc">
					<p>Dave Harris</p>
					<div class="mancontact">
						<i class="icon-facebook"></i>
						<i class="icon-twitter"></i>
						<i class="icon-linkedin"></i>
						<i class="icon-instagram"></i>
					</div>
				</div>
			</div>
			<div></div>
			
			<div class="man mant">
				<div class="manimg">
					<img src="img/jack.png">
				</div>
				<div class="mandesc">
					<p>Jack Sopott</p>
					<div class="mancontact">
						<i class="icon-facebook"></i>
						<i class="icon-twitter"></i>
						<i class="icon-linkedin"></i>
						<i class="icon-instagram"></i>
					</div>
				</div>
			</div>
			<p class="manp">Jack Sopott is the founder and CEO of the building houses company. He has extensive experience in the construction industry and is known for his attention to detail and ability to deliver high-quality projects. He is passionate about sustainable and energy-efficient building.</p>
			<div></div>
			<p class="manp">Mike Chriller is the chief architect at the building houses company. He is responsible for designing the company's houses and ensuring they meet the highest standards of quality and functionality. He is known for his creativity and innovative solutions to complex problems.</p>
			<div class="man mant">
				<div class="manimg">
					<img src="img/mike.png" style="width:160px;">
				</div>
				<div class="mandesc">
					<p>Mike Chriller</p>
					<div class="mancontact">
						<i class="icon-facebook"></i>
						<i class="icon-twitter"></i>
						<i class="icon-linkedin"></i>
						<i class="icon-instagram"></i>
					</div>
				</div>
			</div>
			<div></div>
		</div>
	</section>
	<?php require_once "footer.php";?>
</body>
</html>
<script>
window.addEventListener("resize",replaceabout);
window.onload=replaceabout;
function replaceabout()
{
	if(window.innerWidth<=440)
	{
		document.querySelector('.crewdetail').innerHTML='<div class="man mant"><div class="manimg"><img src="img/john.png" style="width:190px;"></div><div class="mandesc"><p>John Bennet</p><div class="mancontact"><i class="icon-facebook"></i><i class="icon-twitter"></i><i class="icon-linkedin"></i><i class="icon-instagram"></i></div></div></div><p class="manp">John Bennet is the chief financial officer of the building houses company. He is responsible for managing the company\'s finances and ensuring it remains financially stable. He is known for his ability to capitalize on new business opportunities.</p><div></div><div class="man mant"><div class="manimg"><img src="img/dave.png"></div><div class="mandesc"><p>Dave Harris</p><div class="mancontact"><i class="icon-facebook"></i><i class="icon-twitter"></i><i class="icon-linkedin"></i><i class="icon-instagram"></i></div></div></div><p class="manp">Dave Harris is the head of construction at the building houses company. He has been with the company for over 15 years and is responsible for overseeing the construction of all projects. He is known for his ability to manage large construction teams and deliver projects on time and within budget.</p><div></div><div class="man mant"><div class="manimg"><img src="img/jack.png"></div><div class="mandesc"><p>Jack Sopott</p><div class="mancontact"><i class="icon-facebook"></i><i class="icon-twitter"></i><i class="icon-linkedin"></i><i class="icon-instagram"></i></div></div></div><p class="manp">Jack Sopott is the founder and CEO of the building houses company. He has extensive experience in the construction industry and is known for his attention to detail and ability to deliver high-quality projects. He is passionate about sustainable and energy-efficient building.</p><div></div><div class="man mant"><div class="manimg"><img src="img/mike.png" style="width:160px;"></div><div class="mandesc"><p>Mike Chriller</p><div class="mancontact"><i class="icon-facebook"></i><i class="icon-twitter"></i><i class="icon-linkedin"></i><i class="icon-instagram"></i></div></div></div><p class="manp">Mike Chriller is the chief architect at the building houses company. He is responsible for designing the company\'s houses and ensuring they meet the highest standards of quality and functionality. He is known for his creativity and innovative solutions to complex problems.</p><div></div>';
	}
	else
	{
		document.querySelector('.crewdetail').innerHTML='<div class="man mant"><div class="manimg"><img src="img/john.png" style="width:190px;"></div><div class="mandesc"><p>John Bennet</p><div class="mancontact"><i class="icon-facebook"></i><i class="icon-twitter"></i><i class="icon-linkedin"></i><i class="icon-instagram"></i></div></div></div><p class="manp">John Bennet is the chief financial officer of the building houses company. He is responsible for managing the company\'s finances and ensuring it remains financially stable. He is known for his ability to capitalize on new business opportunities.</p><div></div><p class="manp">Dave Harris is the head of construction at the building houses company. He has been with the company for over 15 years and is responsible for overseeing the construction of all projects. He is known for his ability to manage large construction teams and deliver projects on time and within budget.</p><div class="man mant"><div class="manimg"><img src="img/dave.png"></div><div class="mandesc"><p>Dave Harris</p><div class="mancontact"><i class="icon-facebook"></i><i class="icon-twitter"></i><i class="icon-linkedin"></i><i class="icon-instagram"></i></div></div></div><div></div><div class="man mant"><div class="manimg"><img src="img/jack.png"></div><div class="mandesc"><p>Jack Sopott</p><div class="mancontact"><i class="icon-facebook"></i><i class="icon-twitter"></i><i class="icon-linkedin"></i><i class="icon-instagram"></i></div></div></div><p class="manp">Jack Sopott is the founder and CEO of the building houses company. He has extensive experience in the construction industry and is known for his attention to detail and ability to deliver high-quality projects. He is passionate about sustainable and energy-efficient building.</p><div></div><p class="manp">Mike Chriller is the chief architect at the building houses company. He is responsible for designing the company\'s houses and ensuring they meet the highest standards of quality and functionality. He is known for his creativity and innovative solutions to complex problems.</p><div class="man mant"><div class="manimg"><img src="img/mike.png" style="width:160px;"></div><div class="mandesc"><p>Mike Chriller</p><div class="mancontact"><i class="icon-facebook"></i><i class="icon-twitter"></i><i class="icon-linkedin"></i><i class="icon-instagram"></i></div></div></div><div></div>';
	}
}
</script>