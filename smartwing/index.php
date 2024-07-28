<?php session_start();
require_once "mutual.php";
	$_SESSION['website']="index.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>Smartwing - drone blog</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="about.css" type="text/css"/>
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="media.css" type="text/css"/>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" 
rel="stylesheet">
</head>
<body>
	<?php require_once "header.php";?>
	<main>
		<section style="margin-top: 80px; padding-top: 4vh;" class="darksection">
			<h2 style="font-size: 24px;"><span style="color:#2ab3d2;">Recent</span> series</h2>
			<div class="container">
				<div class="fastdrone">
				<a href="revdrone1.php">
					<img src="articles/4drone14.jpg" class="fastdroneimg" >
					<div class="fastdronetextdiv">
						<h3>DJI Mavic 2 Enterprise</h3>
						<p>
							Produced by company Mavic for professionals.<br>
							<span style="color: #d2d3d6;">Range:</span> 8000 meters<br>
							<span style="color: #d2d3d6;">Max speed:</span> 72km/h<br>
							<span style="color: #d2d3d6;">Flight time:</span> 32min. 
						</p>
					</div>
					</a>
				</div>
				
				<div class="fastdrone">
				<a href="revdrone3.php">
					<img src="articles/4drone23.jpg" class="fastdroneimg" >
					<div class="fastdronetextdiv">
						<h3>YUNH5EEU Multikopter</h3>
						<p>
							Produced by company Mavic for professionals.<br>
							<span style="color: #d2d3d6;">Range:</span> 3500 meters<br>
							<span style="color: #d2d3d6;">Max speed:</span> 45km/h<br>
							<span style="color: #d2d3d6;">Flight time:</span> 25min. 
						</p>
					</div>
					</a>
				</div>
				<div class="fastdrone">
				<a href="revdrone2.php">
					<img src="articles/4drone33.jpg" class="fastdroneimg" >
					<div class="fastdronetextdiv">
						<h3>DJI F550 Hexacopter</h3>
						<p>
							Recreational drone produced by CSIdrones.<br>
							<span style="color: #d2d3d6;">Range:</span> 2000 meters<br>
							<span style="color: #d2d3d6;">Max speed:</span> 50km/h<br>
							<span style="color: #d2d3d6;">Flight time:</span> 32min. 
						</p>
					</div>
				</a>
				</div>
			</div>
		</section>
		<section>
			<div class="sites">
				<h2><span style="color:#2ab3d2;">Entries</span> Categories</h2>
				<p class="underp">
					This blog is dedicated to drones. We share all the knowledge we have about drones here. To your convenience all the entries are sorted into theese categories.  
				</p>
				<div class="row">
					<figure class="cat">
							<a href="genknow.php"><img src="img/cat4.jpg" class="images"></a>
							<a class="catplus" href="genknow.php"><div class="plus">+</div></a>
							<a href="genknow.php"><figcaption>General knowledge</figcaption></a>
					</figure>
					<figure class="cat">
						<a href="basics.php"><img src="img/cat1.jpg" class="images"></a>
						<a class="catplus" href="basics.php"><div class="plus">+</div></a>
						<a href="basics.php"><figcaption>Basics of electronics</figcaption></a>
					</figure>
					<div class="catseparator"></div>
					<figure class="cat">
						<a href="construction.php"><img src="img/cat2.jpg" class="images"></a>
						<a class="catplus" href="construction.php"><div class="plus">+</div></a>
						<a href="construction.php"><figcaption>Drone construction</figcaption></a>
					</figure>
					<figure class="cat">
						<a href="reviews.php"><img src="img/cat3.jpg" class="images"></a>
						<a class="catplus" href="reviews.php"><div class="plus">+</div></a>
						<a href="reviews.php"><figcaption>Drone reviews</figcaption></a>
					</figure>
				</div>
			</div>
		</section>
		<section class="darksection">
			<div class="sites">
				<h2><span style="color:#2ab3d2;">Latest</span> Entries</h2>
				<p class="underp">
					Below are the 4 most recent entries. If you are interested in the schedule of upcoming publications - click here.
				</p>
						<a  class="lateblock" href="conmotors.php">
							<p class="categp">DRONE CONSTRUCTION</p>
							<h4>Drone's Motors</h4>
							<p class="categp">This guide will help you understand the dynamics behind brushless drone motor used on quadcopters and how they influence flight characteristics. We'll dive into types of motors...</p>
						</a>
						<a  class="lateblock later" href="genmachines.php">
							<p class="categp">GENEREAL KNOWLEDGE</p>
							<h4>Early flying machines</h4>
							<p class="categp">Early flying machines include all forms of aircraft studied or constructed before the development of the modern aeroplane by 1910. The story of modern flight begins more than a century...</p>
						</a>
						<a  class="lateblock" href="basohm.php">
							<p class="categp">BASICS OF ELECTRICS</p>
							<h4>Ohm's law</h4>
							<p class="categp">Ohm's Law is a formula used to calculate the relationship between voltage, current and resistance in an electrical circuit.To students of electronics, Ohm's Law (E = IR) is as fundamentally important as...</p>
						</a>
						<a  class="lateblock later" href="condetection.php">
							<p class="categp">DRONE CONSTRUCTION</p>
							<h4>Drone detection system</h4>
							<p class="categp">LIn today's fast growing drone market, sensor technologies are often the unheralded secret sauce inside. In this article, we discuss some of the types of sensor technologies that...</p>
						</a>
					
			</div>
		</section>
		<section>
			<div class="sites">
				<h2><span style="color:#2ab3d2;">Valuable</span> Books</h2>
				<p class="underp">
					This is the frequently asked question: which book to invest in? Below you can find a list of books worth reading.</p>
					<div class="bookbox">
						<div class="bcatbox">
							<ul>
								<li id="li1"class="active">General knowledge</li>
								<li id="li2">Basics of electronics</li>
								<li id="li3">Drone construction</li>
							</ul>
						</div>
						<div class="bbox">
							<a class="imgbox" class="blink"href="https://www.amazon.com/Drones-Ultimate-Guide-learning-building/dp/1547020830/ref=sr_1_8?crid=3EUY6Q3S8QP6K&keywords=drones+books&qid=1668973297&sprefix=drones+book%2Caps%2C313&sr=8-8" target="_blank"><img class="imgbooks" src="img/book9.jpg"></a>
							<a class="imgbox" href="https://www.amazon.com/Big-Book-Drones-Ralph-DeFrangesco/dp/1032062827/ref=sr_1_16?crid=3EUY6Q3S8QP6K&keywords=drones+books&qid=1668973464&sprefix=drones+book%2Caps%2C313&sr=8-16&asin=1032062819&revisionId=&format=4&depth=1" target="_blank"><img class="imgbooks" src="img/book10.jpg"></a>
							<a class="imgbox" href="https://www.amazon.com/Drones-Dummies-Mark-LaFay/dp/1119049784/ref=sr_1_4?crid=3EUY6Q3S8QP6K&keywords=drones+books&qid=1668973464&sprefix=drones+book%2Caps%2C313&sr=8-4" target="_blank"><img class="imgbooks" src="img/book11.jpg"></a>
							<a class="imgbox" href="https://www.amazon.com/DRONE-LOG-BOOK-Logbook-Maintenance/dp/B0BJHNSJNM/ref=sr_1_13?crid=3EUY6Q3S8QP6K&keywords=drones+books&qid=1668973464&sprefix=drones+book%2Caps%2C313&sr=8-13" target="_blank"><img class="imgbooks" src="img/book12.jpg"></a
						</div>
					</div>
			</div>
		</section>
	</main>
	<section class="darksection">
		<h2><span style="color:#2ab3d2;">Advertising</span> Cooperation</h2>
		<p class="underp">
			If you are interested in advertising cooperation, I invite you to determine the possible forms of the campaign. In each collaboration we put emphasis on a wise advertising action, for the benefit of readers, Advertisers and our own. 
		</p>
		<a href="contact.php" class="but cobutton">COOPERATING DETAILS</a>
	</section>
	<section class="bluesection">
		<h2>Become an Articlewriter!</h2>
		<p class="underp">
			Do you have experience and want to share your knowledge or maybe you bought a new drone and you wish spread your thoughts with other drone fanatics? Write your own article and we will put it on our blog!
		</p>
		<a href="contact.php" class="but cobutton">REPORT BACK</a>
	</section>
	<?php require_once "footer.php";?>
	<script type="text/javascript" src="functions.js"></script>
</body>
</html>