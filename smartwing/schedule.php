<?php
	session_start();
	require_once "mutual.php";
	require "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	try
	{
		$link= new mysqli($host,$user,$password,$db_name);
		if($link->connect_errno!=0) throw new Exception($link->connect_errno);
		if(!$result=$link->query("SELECT * FROM schedule"))
			throw new Exception($link->error);
		$users=$result->num_rows;
		$board=array();
		$dates='';
		$notes='';
			for($i=0;$i<$users;$i++)
			{
				$board[$i]=$result->fetch_assoc();
				if($i<$users-1)$dates.=$board[$i]['date'].'|';
				else $dates.=$board[$i]['date'];
				if($i<$users-1)$notes.=$board[$i]['note'].'|';
				else $notes.=$board[$i]['note'];
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
<link rel="stylesheet" href="fontellix/css/fontello.css" type="text/css"/>
<link rel="stylesheet" href="schedule.css" type="text/css"/>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once "header.php";?>
	<main>
	<div class="sitess" style="margin-top:60px;">
		<div class="tabletandmothyear">
			<div id="monthyear">
				<div class="fullmonth">
				 <div style="float: left;"><i class="icon-angle-left"></i></div>
				 <div id="month" style="float: left;"></div>
				<div style="float: left;"><i class="icon-angle-right"></i></div>
				<div style="clear: both;"></div>
				</div>
				<div id="year">2021</div>
				<div style="clear: both;"></div>
			</div>
			<div id="tablet">
					<div id="weekdays">
					<div class="dayname">Mon</div>
					<div class="dayname">Tue</div>
					<div class="dayname">Wed</div>
					<div class="dayname">Thu</div>
					<div class="dayname">Fri</div>
					<div class="dayname">Sat</div>
					<div class="dayname">Sun</div>
					<div style="clear: both;"></div>
				</div>
				<div id="boxy">
					<div class="column">
						<div class="box"id="box1"></div>
						<div class="box"id="box2"></div>
						<div class="box"id="box3"></div>
						<div class="box"id="box4"></div>
						<div class="box"id="box5"></div>
						<div class="box"id="box6"></div>
						<div class="box"id="box7"></div>
						<div style="clear: both;"></div>
					</div>
					<div class="column">
						<div class="box"id="box8"></div>
						<div class="box"id="box9"></div>
						<div class="box"id="box10"></div>
						<div class="box"id="box11"></div>
						<div class="box"id="box12"></div>
						<div class="box"id="box13"></div>
						<div class="box"id="box14"></div>
						<div style="clear: both;"></div>
					<div class="column">
						<div class="box"id="box15"></div>
						<div class="box"id="box16"></div>
						<div class="box"id="box17"></div>
						<div class="box"id="box18"></div>
						<div class="box"id="box19"></div>
						<div class="box"id="box20"></div>
						<div class="box"id="box21"></div>
						<div style="clear: both;"></div>
					</div>
					<div class="column">
						<div class="box"id="box22"></div>
						<div class="box"id="box23"></div>
						<div class="box"id="box24"></div>
						<div class="box"id="box25"></div>
						<div class="box"id="box26"></div>
						<div class="box"id="box27"></div>
						<div class="box"id="box28"></div>
						<div style="clear: both;"></div>
					</div>
					<div class="column">
						<div class="box"id="box29"></div>
						<div class="box"id="box30"></div>
						<div class="box"id="box31"></div>
						<div class="box"id="box32"></div>
						<div class="box"id="box33"></div>
						<div class="box"id="box34"></div>
						<div class="box"id="box35"></div>
						<div style="clear: both;"></div>
					</div>
					<div class="column">
						<div class="box"id="box36"></div>
						<div class="box"id="box37"></div>
						<div class="box"id="box38"></div>
						<div class="box"id="box39"></div>
						<div class="box"id="box40"></div>
						<div class="box"id="box41"></div>
						<div class="box"id="box42"></div>
						<div style="clear: both;"></div>
					</div>
				</div>
				</div>
				
			</div>
		</div>
		<aside class="lefttextschedule">
					<div class="asidecat">
						<h3 style="color:#2ab3d2;">SCHEDULE</h3>
						<p>See recent articles and our plans for the future!</p>
					</div>
						<div class="notebook" style="height: 300px;">
							<h3 style="text-align: center;">21 December 2023</h3>
							<p>Common day.</p>
						</div>
		</aside>
	</div>
	</main>
	<input type="hidden" id="hiddate"<?='value="'.$dates.'" '?>>
	<input type="hidden" id="hidnote"<?='value="'.$notes.'" '?>>
	<script type="text/javascript" src="schedule.js"></script>
</body>
</html>