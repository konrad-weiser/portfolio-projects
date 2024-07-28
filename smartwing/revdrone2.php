<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="revdrone2.php";
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
					<h2 class="intro">DJI F550 Hexacopter</h2>
					<p style="text-align: justify">
						DJI has another drone product, the DJI F550 Hexacopter, also known as the Flame Wheel, which is different from the other DJI-made drones. For the reason that unlike the previous DJI products, which are all ready-to-fly drones, the DJI F550 hexacopter will arrive at your doorstep bare but with complete basic parts. This way, you will be able to build your very own customized hexacopter.
					</p>
					<p style="text-align: justify">DJI Flame Wheel has three models: the F330, F450, and the F550. But among the three, only the DJI F550 can be categorized as a hexacopter, while the F330 and F450 are both quadcopters. All three versions have the same parts but differ in design. DJI F550 hexacopter has a distinct design that allows it to have a more stable flight, ideal for aerial photography, videography, or simply for recreational flying.</p>
					<p style="text-align: center;"><img style="width: 400px;" src="articles/4drone32.jpg"></p>
					 <h4 class="intro">Elements</h4>
<p style="text-align: justify">The Flame Wheel has everything DIY copter enthusiasts need to create their own hexacopter.

<p style="text-align: justify">ncluded in the package are the following:</p>

<p style="text-align: justify">Heavy-Duty Materials
The copter’s attractive frame arms are made of PA66+30GF, a sturdy material that can resist falls. The frame panel uses a tough PCB material for extra strength support.</p>

<p style="text-align: justify">Combined PCB Wiring
Also included is a durable PCB frame board for an easier and safer wiring of battery and ESCs.</p>

<p style="text-align: justify">Ample Assembly Room
The frame’s design aims to provide sufficient space for the construction of autopilot system.</p>

<p style="text-align: justify">Attractive Frame Arms
DJI also provides colored frame arms for a colorful flight. You can choose from red, black, and white arms for your customized copter.</p>

<p style="text-align: justify">A Hobbyist Solution
Whether you are a newbie or an experienced pilot, the DJI F550 hexacopter is an excellent device that allows you to build hexacopter according to your liking. It has Naza-M control system, the H3-2D gimbal, and the DT7 RC—a perfect combination for hobbyist.</p>
<p style="text-align: center;"><img style="width: 400px;" src="articles/4drone31.jpg"></p>
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