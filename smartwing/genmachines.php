<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="genmachines.php";
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
					<h2 class="intro">EARLY FLYING MACHINES</h2>
					<p style="text-align: justify">
						Early flying machines include all forms of aircraft studied or constructed before the development of the modern aeroplane by 1910. The story of modern flight begins more than a century before the first successful manned aeroplane, and the earliest aircraft thousands of years before.
					</p>
					<h4 class="intro">Early kites</h4>
					<p style="text-align: justify;">
						The kite was invented in China, possibly as far back as the 5th century BC. These leaf kites were constructed by stretching silk over a split bamboo framework. The earliest known Chinese kites were flat (not bowed) and often rectangular. Later, tailless kites incorporated a stabilizing bowline. Designs often emulated flying insects, birds, and other beasts, both real and mythical. Some were fitted with strings and whistles to make musical sounds while flying.In 549 AD, a kite made of paper was used as a message for a rescue mission.
					</p>
					<p style="text-align: center;"><img style="width: 180px; height: 240px; margin-right: 10px;" src="articles/1kite2.jpg"><img style="width: 180px; height: 240px;" src="articles/1kite.jpg"></p>
					
					<h4 class="intro">Balloons</h4>
					<p style="text-align: justify">
						The first documented balloon flight in Europe was of a model made by the Brazilian-born Portuguese priest Bartolomeu de Gusmão. On 8 August 1709, in Lisbon, he made a small hot-air balloon of paper with a fire burning beneath it, lifting it about 4 metres (13 ft) in front of king John V and the Portuguese court.
					</p>
					<p style="text-align: center;"><img style="width: 400px; " src="articles/1ballon.jpg"></p>
					<h4 class="intro">Aircrafts</h4>
					<p style="text-align: justify">
						The first fully controllable free flight was made by Charles Renard and Arthur Constantin Krebs in a French Army electric-powered airship, La France was the 170-foot (52 m) long, 66,000-cubic-foot (1,900 m3) airship covered 8 km (5 mi) in 23 minutes with the aid of an 8.5 horsepower (6.3 kW) electric motor, returning to its starting point. This was the first flight over a closed circuit.
					</p>
					<p style="text-align: center;"><img style="width: 400px; " src="articles/1lafrance.jpg"></p>
					<h4 class="intro">The airplane dragged by horse</h4>
					<p style="text-align: justify">
						In 1799, George Cayley set forth the concept of the modern airplane as a fixed-wing flying machine with separate systems for lift, propulsion, and control. Cayley was building and flying models of fixed-wing aircraft as early as 1803, and he built a successful passenger-carrying glider in 1853. In 1856, Frenchman Jean-Marie Le Bris made the first powered flight, by having his glider "L'Albatros artificiel" pulled by a horse on a beach.
					</p>
					<p style="text-align: center;"><img style="width: 400px; " src="articles/1horseplane.jpg"></p>
					<h4 class="intro">The airplane with a steam engine</h4>
					<p style="text-align: justify">
						The Frenchman Clement Ader constructed his first of three flying machines in 1886, the Éole. It was a bat-like design run by a lightweight steam engine of his own invention, with four cylinders developing 20 horsepower (15 kW), driving a four-blade propeller. The engine weighed no more than 4 kilograms per kilowatt (6.6 lb/hp). There are no evidences that that machines could fly.
					</p>
					<p style="text-align: center;"><img style="width: 400px; " src="articles/1steamplane.jpg"></p>
					<h4 class="intro">Wright brothers and aeroplanes revolution</h4>
					<p style="text-align: justify">
						The American Wright brothers flights in 1903 are recognized by the Fédération Aéronautique Internationale (FAI), the standard-setting and record-keeping body for aeronautics, as "the first sustained and controlled heavier-than-air powered flight". By 1905, the Wright Flyer III was capable of fully controllable, stable flight for substantial periods. The Wright brothers credited Otto Lilienthal as a major inspiration for their decision to pursue manned flight. After that the aeroplane technologies was advancing horribly fast and completely changed the present world.
					</p>
					<p style="text-align: center;"><img style="width: 400px; " src="articles/1wrightplane.jpg"></p>
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