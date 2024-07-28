<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="revdrone1.php";
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
					<h2 class="intro">DJI Mavic 2 Enterprise</h2>
					<p style="text-align: justify">
						The DJI Mavic 2 Enterprise is for professionals who need more than a photography drone.  The newly released Mavic 2 Pro and Mavic 2 Zoom are pretty awesome drones. They come with great cameras and a few other upgrades that make them perfect for amateur and pro creatives.
					</p>
					<h4 class="intro">Overview</h4>
					<p style="text-align: justify">The Mavic 2 Enterprise joins at the lower end of the price range in this category, though it’s still more expensive than most DJI camera drones.It’s an excellent choice for companies, organizations, and professionals looking for an entry-level commercial drone.The Mavic 2 Enterprise is not as revolutionary or feature-packed as other pricier DJI drones like the $5,000 Matrice 600 Pro. But that’s because it is a modified version of the Mavic 2 Zoom.The basic specs are similar with only a few modifications and additions for specialized enterprise applications.</p>
					<p style="text-align: center;"><img style="width: 400px;" src="articles/4drone13.jpg"></p>
					<p style="text-align: justify">For example, you can opt for a dual option that carries a visual and thermal camera. They have also added accessories that are essential out in the field including a spotlight, beacon, and loudspeaker. They have refined the safety system to avoid accidents between the drone and other aircraft. The drone also comes with data processing and visualization software which you can use via the DJI Pilot app. If you are not looking for an enterprise drone, read my recently-updated guide for reviews of the best amateur and professional camera drones.</p>
					<h4 class="intro">Flying It</h4>
					<p style="text-align: justify">Despite being an enterprise drone, the Mavic 2 Enterprise is pretty easy to fly. If you are used to flying DJI camera drones, this one is just as easy to operate. Similar to the Mavic 2 Zoom, the enterprise is laden with omnidirectional sensors on the left, right, topside, bottom, front, and back. So the drone can watch out for obstacles from every side. This not only makes flight safer, but it also gives you the freedom to wedge the drone into some tight spaces, which is necessary in certain situations.</p> 
					<p style="text-align: center;"><img style="width: 400px;" src="articles/4drone12.jpg"></p>
					<p style="text-align: justify">For extra safety, the Enterprise is equipped with DJI AirSense that detects signals from helicopters and airplanes nearby and alerts you to their presence. The drone is quieter compared to most other drones thanks to a new propulsion system and redesigned propellers. If you need to be even more inconspicuous especially in the dark, a discrete mode turns off all LED nights. The advertised battery life is 31 minutes when flying at a constant speed of 25kph in no wind.In real life use though, the battery life is going to be a few minutes shorter especially, when it’s windy, or you are powering an extra accessory.</p>

					<h4 class="intro">Professional Accessories</h4>
					<p style="text-align: justify">Spotlight: The dual 26W spotlight is handy for low light situations. It produces 11 Lux at 30 meters with a 17-degree field of view. You can only adjust the angle of the spotlight before taking off.Loudspeaker: Essential for communicating with people on the ground. It produces 100 decibels of sound at 1 meter. The max hearing range is 65-130 feet depending on the conditions. You can play pre-recorded messages with the speaker or transmit a live recording when the drone is in the air.Beacon: This improves drone visibility especially in low light conditions. In fair conditions, the beacon is visible for up to 3 miles.All accessories connect to the drone using micro USB port.The controller itself is the standard one you’ll also get with the Pro and Zoom drones. It’s compact, foldable and features detachable thumbsticks for easier portability and storage.</p>
					<p style="text-align: center;"><img style="width: 400px;" src="articles/4drone11.jpg"></p>
					<h4 class="intro">Specifications</h4>
					<ul style="color: #8e9198; line-height: 200%;margin-left: 20px;">
						<li>Weight: 905g (899g for the dual option)</li>
						<li>Dimensions: 214×91×84 mm folded and 322×242×84 mm unfolded</li>
						<li>Max speed: 72kph (44.7mph)</li>
						<li>4K video quality and 12MP still images</li>
						<li>3-axis mechanical gimbal</li>
						<li>Max flight time: 31 minutes</li>
						<li>Omnidirectional sensors</li>
						<li>8km transmission range</li>
						<li>3 accessories – beacon, spotlight, and speaker</li>
					</ul>
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