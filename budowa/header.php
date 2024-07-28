<header class="navheader">
		<nav class="navbar">
			<div class="logo"><a href="index.php"><span style="color:#f8c218;">BRO</span>BUILD</a></div>
			<ul class="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About us</a></li>
				<li class="navoffer">
				Offer▾
				<ul class="uloffers">
						<li><a href="off1.php">Building houses</a></li>
						<li><a href="off2.php">Building restaurants</a></li>
						<li><a href="off3.php">Building office buildings</a></li>
						<li><a href="off4.php">Interior renovation</a></li>
				</ul>
				</li>
				<li><a href="realizations.php">Realizations</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
			<div class="number">+44 161 496 0660</div>
			<div class="hamburger">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
			</div>
		</nav>
	</header>
	
	<script>
	//menu
	const hamburger=document.querySelector(".hamburger");
	const menu=document.querySelector(".menu");
		hamburger.addEventListener("click", ()=>{
			hamburger.classList.toggle("active"); 
			menu.classList.toggle("active"); 
			let lis=document.querySelectorAll(".menu>li");
			var i=0;
			for(let li of lis)
			{
				if(i!=2)
				li.addEventListener("click",() =>{
					hamburger.classList.remove("active"); 
					menu.classList.remove("active");
						});
						i++;
			}
				
			
		});
	</script>