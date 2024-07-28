//notebook
var begin=273;
setTimeout(leftheight, 200);
window.addEventListener("resize",leftheight);
var lefttextb=0;
function leftheight()
{
	if(window.innerWidth>=1084)
	lefttextb=document.querySelector(".lefttext55g").scrollHeight+60-begin-200; 
	document.querySelector(".notebook").removeAttribute("style");
}
document.addEventListener("wheel", wheel1);
function wheel1()
{
	if(window.innerWidth>=1084)
	{
		if((document.documentElement.getBoundingClientRect().top*(-1)>(begin-55))&&(document.documentElement.getBoundingClientRect().top*(-1)<lefttextb))
		{
			var bufor=(document.documentElement.getBoundingClientRect().top*(-1))-begin+100;
			document.querySelector(".notebook").style.margin=bufor+"px auto auto auto";
		}
		else
		{
			if(document.documentElement.getBoundingClientRect().top*(-1)<=(begin-55))
				document.querySelector(".notebook").style.margin=20+"px auto auto auto";
			else
				document.querySelector(".notebook").style.margin=(lefttextb-172)+"px auto auto auto";//240=selfheight
		}
	}
}