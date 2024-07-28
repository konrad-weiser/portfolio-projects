<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="conelements.php";
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
					<h2 class="intro">WHAT DOES THE DRONE CONSISTS OF?</h2>
					<p style="text-align: justify">A drone is an unmanned aircraft. Drones are more formally known as unmanned aerial vehicles (UAVs) or unmanned aircraft systems. Essentially, a drone is a flying robot that can be remotely controlled or fly autonomously using software-controlled flight plans in its embedded systems, that work in conjunction with onboard sensors and a global positioning system (GPS).UAVs were most often associated with the military. They were initially used for anti-aircraft target practice, intelligence gathering and, more controversially, as weapons platforms.</p>
					<h4 class="intro">How do drones work?</h4>
					<p style="text-align: justify">Drones have two basic functions: flight mode and navigation.To fly, drones must have a power source, such as battery or fuel. They also have rotors, propellers and a frame. The frame of a drone is typically made of a lightweight, composite material to reduce weight and increase maneuverability.Drones require a controller, which lets the operator use remote controls to launch, navigate and land the aircraft. Controllers communicate with the drone using radio waves, such as Wi-Fi.</p>

					<h4 class="intro">Drone's common components</h4>
					<p style="text-align: justify">Drones have a large number of components, including:</p>
					<ul style="color: #8e9198; margin-left: 20px;">
						<li>electronic speed controllers, which control a motor's speed and direction<img style="width: 180px;  display: block;" src="articles/3speedlimit.png"></li>
						<li>flight controller<img style="width: 180px;  display: block;" src="articles/3control.png"></li>
						<li>GPS module<img style="width: 180px;  display: block;" src="articles/3gps.png"></li>
						<li>battery<img style="width: 180px;  display: block;" src="articles/3battery.png"></li>
						<li>antenna<img style="width: 180px;  display: block; margin-top: 10px;" src="articles/3antenna.png"></li>
						<li>receiver<img style="width: 160px;  display: block;" src="articles/3receiver.png"></li>
						<li>cameras<img style="width: 160px;  display: block; margin-top: 10px;" src="articles/3camera.png"></li>
						<li>
							sensors
							<ul style="color: #8e9198;"> 
								<li>ultrasonic sensors</li>
								<li>collision avoidance sensors</li>
								<li>accelerometer, which measures speed</li>
								<li>altimeter, which measures altitude</li>
							</ul>
						</li>
					</ul>
					<p style="text-align: center;"></p>
					<h4 class="intro">Drone's common features</h4>
					<p style="text-align: justify">Drone features vary based on the use it is put to. Examples of features include:</p>
					<ul style="color: #8e9198; margin-left: 20px;">
						<li>various types of cameras with high-performance, zoom and gimbal steadycam and tilt capabilities</li>
						<li>artificial intelligence (AI) that enables the drone to follow objects</li>
						<li>augmented reality features that superimpose virtual objects on the drone's camera feed</li>
						<li>media storage format</li>
						<li>maximum flight time, which determines how long the drone can remain in the air</li>
						<li>maximum speeds, including ascent and descent</li>
						<li>hover accuracy</li>
						<li>obstacle sensory range</li>
						<li>altitude hold, which keeps the drone at a fixed altitude</li>
						<li>live video feed; and</li>
						<li>flight logs.</li>
					</ul>
					<p style="text-align: justify">Navigational systems, such as GPS, are typically housed in the nose of a drone. The GPS on a drone communicates its precise location to the controller. An onboard altimeter can communicate altitude information. The altimeter also helps keep the drone at a specific altitude if the controller designates one.</p>
					<p style="text-align: center;"><img style="width: 100%; " src="articles/3construct2.jpg"></p>
					<p style="text-align: justify">Drones can be equipped with sensors, including ultrasonic, laser or lidar distance sensors, time-of-flight sensors, chemical sensors, and stabilization and orientation sensors. Visual sensors offer still and video data. Red, green and blue sensors collect standard visual red, green and blue wavelengths, and multispectral sensors collect visible and nonvisible wavelengths, such as infrared and ultraviolet. Accelerometers, gyroscopes, magnetometers, barometers and GPS are also common drone features.</p>
					
					<p style="text-align: justify">For example, thermal sensors make possible surveillance and security applications, such as livestock monitoring and heat-signature detection. Hyperspectral sensors help identify minerals and vegetation, and are ideal for use in crop health, water quality and surface composition.</p>
					<p style="text-align: center;"><img style="width: 100%; " src="articles/3construct.jpg"></p>
					<p style="text-align: justify">Some drones use sensors to detect obstacles and avoid collisions. Initially, the sensors were designed to detect objects in front of the drone. Some drones now provide obstacle detection in five directions: front, back, below, above and side to side.</p>

					<p style="text-align: justify">For landing, drones use visual positioning systems with downward-facing cameras and ultrasonic sensors. The ultrasonic sensors determine how close the drone is to the ground.</p>
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