<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="gentutorial.php";
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
					<h2 class="intro">DRONE FLYING TUTORIAL</h2>
					<p style="text-align: justify">
						No matter your drone model, the rest of this guide will help you prepare for your first flight, stay safe, get airborne, and learn some basic and advanced drone flying techniques.
					</p>
					<ol style="color: #8e9198; margin-left: 20px;">
						<li>Find an Open Area</li>
						<li>Place the drone</li>
						<li>Connect the transmitter</li>
						<li>Takeoff</li>
						<li>Hovering</li>
						<li>Rotating</li>
					</ol>
<h4 class="intro">Practice Techniques</h4>
<h4 class="intro">1. Secure an open area for practice</h4>
<p style="text-align: justify">If you already have a drone or are at least thinking of purchasing your own, you probably already have a place in mind for practice. It can be any open outdoor area, as long as it’s safe and free from obstructions so you don’t end up crashing the drone into a tree, wall, or possibly even other people. Also, make sure that the place permits the usage of drones so as not to break any laws.</p>

<h4 class="intro">2. Position the drone</h4>
<p style="text-align: justify">First and foremost, find a good takeoff spot. Make sure the drone is positioned according to the instruction manual—ideally in front of you and on a flat surface, with you and the drone facing the same direction. Do this before every flight and don’t attempt to do otherwise unless you’ve gained enough confidence and experience in flying your drone.</p>

<h4 class="intro">3. Connect the transmitter to the drone</h4>
<p style="text-align: justify">>There’s one more thing that you’ll need to remember before takeoff: sequencing. Here, we start with the steps that will require practice.

Right before you switch on the transmitter, push the throttle way down. Turn the transmitter on, and then connect the drone’s battery. This is a very important sequence that you’ll have to follow both before taking off and after landing. After your flying session, follow the steps in reverse order: disconnect your drone’s battery and then turn off the transmitter.</p>


<h4 class="intro">4. Practice takeoff and landing</h4>
<p style="text-align: justify">After following the previous steps for preparation before takeoff, you may slowly push the throttle (left stick) upwards and watch the drone lift off. Keep it in place without moving forward or to the sides with the help of the roll and pitch commands (right stick).

Once you’ve successfully launched the drone a few feet above ground, try to land it as smoothly as you can. Keep it steady and slowly push the throttle (left stick) down this time until it reaches the same spot on the ground.</p>

<h4 class="intro">5. Practice hovering</h4>
<p style="text-align: justify">The next thing you’ll be practicing is hovering. Lift off (step 5) a few feet above ground and hold the drone as steadily as you can. It will seem pretty tedious for first-timers as it requires concentration, but practicing this will help improve your flying skills (especially at the start and end of your flying sessions) and keep your drone safe.

Focus on mastering these basic maneuvers (take off, balancing, and landing) first as it will help you have an easier time executing more complicated flying techniques later on.</p>

<h4 class="intro">6. Practice rotating</h4>
<p style="text-align: justify">Another important maneuver you’ll need to be comfortable with is the rotation of the drone using the left stick’s yaw control. Now launch the drone, hover, and then slowly push the left stick right or left until the drone rotates to face you.

Many find it difficult at first since you’ll have to pay close attention to the drone’s orientation, particularly where its front and back are, but experience definitely makes it easier.

To aid you in flying the drone no matter where it’s facing, create a mental image of you being inside the drone and flying it. This is how experienced professionals stay on course no matter how much the drone spins and turns, and helps them envision how they should fly the drone to achieve winning aerial photographs.

If you still don’t get it on your fifth try, don’t fret. Many don’t get it even on their tenth. What’s important is that you are slowly (but surely!) becoming more used to controlling how the drone behaves.</p>

<h4 class="intro">7. Practice These Beginner Drone Techniques</h4>
<p style="text-align: justify">Now that you’ve learned all of the basic controls and maneuvers, it’s time to combine all of your acquired knowledge and experience into one session. This is also where you’ll finally get to use the right stick to actually move the quadcopter. Here are a few sample controls and movements that you can try out once the drone is in the air:</p>

<ul style="color: #8e9198; margin-left: 20px;">
	<li>Travel in parallel paths by moving the drone forward and backward using the pitch control (right stick) and then left and right using the roll control (right stick)</li>
	<li>Draw a square using the pitch and roll controls (right stick)</li>
	<li>Fly forwards and backwards in a parallel path with the drone facing the direction of the flight by moving the drone forward with the pitch control (right stick), stopping, rotating the drone 180 degrees until it is facing you, and moving the drone forward again until it reaches its original position</li>
	<li>Draw a square by moving the drone forward with the pitch control (right stick), stopping, rotating the drone 90 degrees to the left or right using the yaw control (left stick), and repeating all three steps until the drone returns to its original position</li>
	<li>Draw a circle using the yaw control (left stick) and pitch control (right stick)</li>
	<li>Draw a figure 8 using the yaw control (left stick) and pitch control (right stick)</li>
</ul>
	<p style="text-align: center;"><img src="articles/1tut.jpg" style="height: 300px;"></p>
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