window.onload=start;
/*about*/
function nice2()
{
	document.querySelector(".logoobox").classList.remove('logobox2');
	var timer2=setTimeout(nice1,3000);
}
function nice1()
{
	document.querySelector(".logoobox").classList.add('logobox2');
	var timer3=setTimeout(nice2,3000);
}
function aboutstart()
{
	document.getElementById("secondoption").addEventListener("click",loginorregister);
		if(window.innerWidth>=1084)
			var timer1=setTimeout(nice2,3000);
}
function loginorregister()
{
	if(document.getElementById("secondoption").innerHTML=='<span style="color:#2ab3d2;">LOG</span> IN')
	{
		document.getElementById("loginorregister").innerHTML='<form action="login.php" method="post" class="contactform"><h2 style="text-align:center;"><span style="color:#2ab3d2;">Log</span> in</h2><div style="text-align:center;"><input name="email" type="email" placeholder="E-mail"></div><div style="text-align:center;"><input name="pass" type="password" placeholder="Password"></div><div style="text-align:center;"><button>LOG IN</button></div><div class="alertzone"></div></form>';
		document.getElementById("secondoption").innerHTML='<span style="color:#2ab3d2;">SIGN</span> UP';
	}
	else
	{
		document.getElementById("loginorregister").innerHTML='<form action="register.php" method="post" class="contactform"><h2 style="text-align:center;"><span style="color:#2ab3d2;">Sign</span> up</h2><div style="text-align:center;"><input name="name" type="text" placeholder="Name"></div><div style="text-align:center;"><input name="email" type="email" placeholder="E-mail"></div><div style="text-align:center;"><input name="pass" type="password" placeholder="Password"></div><div class="statute"><label><input name="check" type="checkbox">Accept the statute</label></div><div style="text-align:center;"><button>SAVE</button></div><div class="alertzone"></div></form>';
		document.getElementById("secondoption").innerHTML='<span style="color:#2ab3d2;">LOG</span> IN';
	}
}
/*index*/
function start()
{
	document.getElementById("li1").addEventListener("click", function() {activateli(1);});
	document.getElementById("li2").addEventListener("click", function() {activateli(2);});
	document.getElementById("li3").addEventListener("click", function() {activateli(3);});
}
function activateli(n)
{
	var lis=document.querySelectorAll(".bcatbox > ul > li");
	lis.forEach(button =>{button.removeAttribute("class");});
	document.getElementById("li"+n).classList.add("active");
	let l, m;
	document.querySelector(".bbox").style.opacity='0';
	setTimeout(function() {if(n==3)
	{
		l=2; m=1;
		document.querySelector(".bbox").innerHTML='<div class="imgbox"><a href="https://www.amazon.com/Building-Smart-Drones-ESP8266-Arduino-ebook/dp/B0753H1F34/ref=sr_1_2?keywords=building+a+drone&qid=1668970139&sr=8-2" target="_blank"><img class="imgbooks" src="img/book4.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/Build-Drone-Step-Step-Constructing/dp/1510707050/ref=sr_1_1?keywords=drones+book&qid=1668968403&sr=8-1" target="_blank"><img class="imgbooks" src="img/book1.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/Building-Your-Own-Drones-Beginners/dp/078975598X" target="_blank"><img class="imgbooks" src="img/book2.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/How-build-quadcopter-drone-controlled-ebook/dp/B0155LNQ1I" target="_blank"><img class="imgbooks" src="img/book3.jpg"></a></div>';
	}
	else if(n==2)
	{
		l=1; m=3;
		document.querySelector(".bbox").innerHTML='<div class="imgbox"><a href="https://www.amazon.com/Electronics-Beginners-Introduction-Schematics-Microcontrollers/dp/1484259785/ref=sr_1_3?keywords=basic+electronics&qid=1668972211&s=books&sr=1-3" target="_blank"><img class="imgbooks" src="img/book5.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/Basic-Electronics-Practice-Sean-Westcott/dp/1683925289/ref=sr_1_14?crid=1I5PN6H0MCICI&keywords=basics+electronics&qid=1668972437&sprefix=basics+electronic%2Caps%2C197&sr=8-14" target="_blank"><img class="imgbooks" src="img/book6.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/Electronics-Scientists-Engineers-Dennis-Eggleston/dp/0521154308/ref=sr_1_15?crid=1I5PN6H0MCICI&keywords=basics+electronics&qid=1668972626&sprefix=basics+electronic%2Caps%2C197&sr=8-15" target="_blank"><img class="imgbooks" src="img/book7.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/Grobs-Electronics-Engineering-Technologies-Trades/dp/0073373877/ref=sr_1_19?crid=1I5PN6H0MCICI&keywords=basics+electronics&qid=1668972626&sprefix=basics+electronic%2Caps%2C197&sr=8-19" target="_blank"><img class="imgbooks" src="img/book8.jpg"></a></div>';
	}
	else 
	{
		l=2; m=3;
		document.querySelector(".bbox").innerHTML='<div class="imgbox"><a href="https://www.amazon.com/Drones-Ultimate-Guide-learning-building/dp/1547020830/ref=sr_1_8?crid=3EUY6Q3S8QP6K&keywords=drones+books&qid=1668973297&sprefix=drones+book%2Caps%2C313&sr=8-8" target="_blank"><img class="imgbooks" src="img/book9.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/Big-Book-Drones-Ralph-DeFrangesco/dp/1032062827/ref=sr_1_16?crid=3EUY6Q3S8QP6K&keywords=drones+books&qid=1668973464&sprefix=drones+book%2Caps%2C313&sr=8-16&asin=1032062819&revisionId=&format=4&depth=1" target="_blank"><img class="imgbooks" src="img/book10.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/Drones-Dummies-Mark-LaFay/dp/1119049784/ref=sr_1_4?crid=3EUY6Q3S8QP6K&keywords=drones+books&qid=1668973464&sprefix=drones+book%2Caps%2C313&sr=8-4" target="_blank"><img class="imgbooks" src="img/book11.jpg"></a></div><div class="imgbox"><a href="https://www.amazon.com/DRONE-LOG-BOOK-Logbook-Maintenance/dp/B0BJHNSJNM/ref=sr_1_13?crid=3EUY6Q3S8QP6K&keywords=drones+books&qid=1668973464&sprefix=drones+book%2Caps%2C313&sr=8-13" target="_blank"><img class="imgbooks" src="img/book12.jpg"></a></div>';
	}
	document.querySelector(".bbox").style.opacity='1';},300);
	
	
}