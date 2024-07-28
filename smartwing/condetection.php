<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="condetection.php";
	$website=$_SESSION['website'];
	require "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	try
		{
			$link= new mysqli($host,$user,$password,$db_name);
					if($link->connect_errno!=0) throw new Exception($link->connect_errno);
					if(!$result=$link->query("SELECT comments, times, likes, dislikes, emails FROM comments WHERE site_name='$website'"))
						throw new Exception($link->error);
						$board=$result->fetch_assoc();
					$comments=explode("|",$board['comments']);
					$times=explode("|",$board['times']);
					$likes=explode("|",$board['likes']);
					$dislikes=explode("|",$board['dislikes']);
					$emails=explode("|",$board['emails']);
					$num=count($comments)-1;
					$curdate=new DateTime();
					$allcomments="";
					for($i=0;$i<$num;$i++)
					{
						$date=new DateTime($times[$i]);
						$diff=$date->diff($curdate);
							$timeago=$diff->format('%s').' seconds ago';
						if($diff->format('%i')!=0)
							$timeago=$diff->format('%i').' minutes ago';
						if($diff->format('%h')!=0)
							$timeago=$diff->format('%h').' hours ago';
						if($diff->format('%d')!=0)
							$timeago=$diff->format('%d').' days ago';
						if($diff->format('%m')!=0)
							$timeago=$diff->format('%m').' months ago';
						if($diff->format('%y')!=0)
							$timeago=$diff->format('%y').' years ago';
						$e=$emails[$i];
						if(!$result=$link->query("SELECT name FROM users WHERE email='$e'"))
						throw new Exception($link->error);
						$board=$result->fetch_assoc();
						$allcomments=$allcomments.'<div class="comment">
						<img class="comimgu"src="img/noavatar.png">
						<div class="textandbutu">
							<div class="nametimeu">
								<span class="comname">'.$board['name'].'</span>
								<span class="comtime">• '.$timeago.'</span>
							</div>
							<p class="comp">'.$comments[$i].'</p>
							<div class="comreact">
								<div class="comvote">
									<span class="com-up-num">'.$likes[$i].'</span>
									<i class="icon-up-open"></i>
								</div>
								<div class="comvote">
									<i class="icon-down-open"></i>
									<span class="com-down-num">'.$dislikes[$i].'</span>
								</div>
								<span class="comanswer">• Reply</span>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>';
					}
					$result->close();
					$link->close();
		}
		catch(Exception $e)
		{
			echo "Server error".$e;
		}
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
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="genknow.css" type="text/css"/>
<link rel="stylesheet" href="about.css" type="text/css"/>
<link rel="stylesheet" href="media.css" type="text/css"/>
<link rel="stylesheet" href="fontello/css/fontello.css" type="text/css"/>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" 
rel="stylesheet">
</head>
<body>
	<?php require_once "header.php";?>
	<main>
		<section>
			<div class="sitesg" style="margin-top:60px;">
				<article class="lefttext55g">
					<h2 class="intro">DRONE DETECTION SYSTEM</h2>
					<p style="text-align: justify">
						In today's fast growing drone market, sensor technologies are often the unheralded secret sauce inside. In this article, we discuss some of the types of sensor technologies that power today's drones.
					</p>
				
					<h4 class="intro">The Technology That Makes Drones Work</h4>
					<p style="text-align: center;"><img style="width: 100%; " src="articles/3construct2.jpg"></p>
					<h4 class="intro">Accelerometers</h4>

				<p style="text-align: justify">Accelerometers are used to determine position and orientation of the drone in flight. Like your Nintendo Wii controller or your iPhone screen position, these small silicon-based sensors play a key role in maintaining flight control. MEMS accelerometers sense movement in several ways. One type of technology senses the micro movement of very small structures embedded in a small integrated circuit. The movement of these small 'diving boards' changes the amount of electrical current moving through the structure, indicating a change of position relative to gravity.</p>
				<p style="text-align: center;"><img style="width: 180px; " src="articles/3accelometer.png"><img style="width: 180px; " src="articles/3accelometer2.png"></p>
				<p style="text-align: justify">Another technology used in accelerometers is thermal sensing, which offers several distinct advantages. It does not have moving parts, but instead senses changes in the movement of gas molecules passing over a small integrated circuit. Because of the sensitivity of these sensors, they play a role in stabilizing on-board cameras that are vital for applications like filmmaking.</p>

				<p style="text-align: justify">By controlling up and down movement, as well as removing jitter and vibration, filmmakers are able to capture extremely smooth looking video. Additionally, because these sensors are more immune to vibrations than other technologies, thermal MEMS sensors are perfect in drone applications to minimize problems from the increased vibration generated by the movement of rotating propulsion fans and propellers.</p>

				<h4 class="intro">Tilt Sensors</h4>

				<p style="text-align: justify">Tilt sensors, combined with gyros and accelerometers, provide input to the flight-control system in order to maintain level flight. This is extremely important for applications where stability is paramount, from surveillance to delivery of fragile goods.</p>
				<p style="text-align: center;"><img style="width: 190px; " src="articles/3tilt.png"><img style="width: 170px; " src="articles/3tilt2.png"></p>
				<p style="text-align: justify">These types of sensors combine accelerometers with gyroscopes, allowing the detection of small variations of movement. It is the gyroscope compensation that allows these tilt sensors to be used in moving applications like motor vehicles or drones.</p>

				<h4 class="intro">Current Sensors</h4>

				<p style="text-align: justify">In drones, power consumption and use are important. Current sensors can be used to monitor and optimize power drain, safe charging of internal batteries, and detect fault conditions with motors or other areas of the system.</p>
				<p style="text-align: center;"><img style="width: 140px; " src="articles/3obstacle.png"><img style="width: 260px; " src="articles/3obstacle2.png"></p>
				<p style="text-align: justify">Current sensors work by measuring electrical current (bi-directional) and ideally provide electrical isolation to reduce power loss and eliminate the opportunity for electrical shock or damage to the user or systems. Sensors with fast response time and high accuracy optimize battery life and performance of drones.</p>

				<h4 class="intro">Magnetic Sensors</h4>

				<p style="text-align: justify">In drones, electronic compasses provide critical directional information to inertial navigation and guidance systems. Anisotropic magnetoresistive (AMR) permalloy technology sensors, which have superior accuracy and response time characteristics while consuming significantly less power than alternative technologies, are well-suited to drone applications. Turnkey solutions provide drone manufacturers with quality data sensing in a very rugged and compact package.</p>

				<h4 class="intro">Engine Intake Flow Sensors</h4>

				<p style="text-align: justify">Flow sensors can be used to effectively monitor air flow into small gas engines used to power some drone varieties. These help the engine CPU determine the proper fuel-to-air ratio at a specified engine speed, which results in improved power and efficiency, and reduced emissions.</p>

				<p style="text-align: justify">Many gas engine mass-flow sensors employ a calorimetric principal utilizing a heated element and at least one temperature sensor to quantify mass flow. MEMS thermal mass air flow sensors also utilize the calorimetric principal, but in a micro scale, making it highly suitable for applications where reduced weight is critical.</p>
				<?php
				echo $commentnotebook1;
				if(!isset($_SESSION["email"]))
									echo '<a href="about.php"><span style="color:#2ab3d2;">LOG</span> IN</a>';
				echo $commentnotebook2.$allcomments.$commentnotebook3
				?>
		</section>
	</main>
	<?php require_once "footer.php";?>
	<script type="text/javascript" src="comments.js"></script> 
</body>
</html>