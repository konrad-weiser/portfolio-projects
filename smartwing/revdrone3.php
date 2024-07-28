<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="revdrone3.php";
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
					<h2 class="intro">YUNH5EEU Multikopter</h2>
					<p style="text-align: justify">
						YUNH5EEU Multikopter has been specially developed for commercial applications and provides rescue services,Inspectors, police, fire brigade and surveying teams have a versatile tool at hand. The H520E is a robust, powerful and flexible UAV platform that is ideal for individualRequirements. Long flight times and high-quality camera systems allow the fast and accurate detection of an area, while the interference-free precision compass enables flying even in environments that have been difficult to fly.
					</p>


<h4 class="intro">Intelligent security concept</h4>
<p style="text-align: justify">The YUNH5EEU  was developed with the highest demands on safety and functionality. The 6-rotor system enables a stable and safe flight in which it ensures that the H520E can continue safely even in case of failure of a rotor. Built-in ultrasonic sensors let the drone detect obstacles, while the battery issues battery warnings when the voltage is too low and finally switches to a fail-safe function. In addition, the H520E is equipped with a redundant control signal, a return home and a geo-fence function.</p>
<p style="text-align: center;"><img style="width: 400px;" src="articles/4drone21.png"></p>
<h4 class="intro">DataPilot software</h4>
<p style="text-align: justify">Yunecs DataPilot™ is a software solution for the planning of waypoint and survey missions, which is fully integrated into the hardware and software of the H520E. The DataPilot™ app enables efficient and consistent creation of orthomaps, 3D scans and camera flights with repeatable flight paths without the need for additional third-party software. The DataPilot™ can process and store maps of different providers in order to be able to fly even where there is no Internet access available.</p>

<h4 class="intro">Data security</h4>
<p style="text-align: justify">The H520E has been developed as a closed system whose technical design prevents communication with third-party servers. Communication only takes place between the drone, the payload and the ST16E remote control. Log files are stored locally in the drone and required by Yuneec exclusively for service purposes in the event of a warranty claim. The data is read out via a cable. We guarantee: There are no interfaces to our own servers, development stations or internal IT infrastructure.</p>

<h4 class="intro">ST16E controller</h4>
<p style="text-align: justify">The Android-based ST16E features a fast Intel quad-core processor and OFDM support that allows you to transfer images up to 7 kilometers. The integrated 7" display with touch screen provides for a precise, intuitive operation of the H520E and displays all flight information as well as the live image of the camera. Via the HDMIoutput of the remote control, the live image can also be transferred comfortably to a larger monitor.</p>
<p style="text-align: center;"><img style="width: 400px;" src="articles/4drone22.jpg"></p>
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