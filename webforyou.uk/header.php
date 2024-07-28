<header class="navheader">
		<nav class="navbar">
			<div class="logo"><a href="home"><span style="color:#2596be;">net</span>foryou</a></div>
			<ul class="menu">
				<li><a href="home">Home</a></li>
				<li><a href="about-us">About us</a></li>
				<li><a href="websites-designing">Offer</a></li>
				<li><a href="blog">Blog</a></li>
				<li><a href="contact"style="color: #2596be;">Contact</a></li>
			</ul>
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