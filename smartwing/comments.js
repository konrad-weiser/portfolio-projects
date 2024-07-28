//comments
document.querySelector(".comtextarea").addEventListener("click", addsend);
document.querySelector(".comtextarea").addEventListener("blur", remsend);
function addsend()
{
	document.querySelector(".combut").style.display="inline";
	document.querySelector(".comtextarea").style.margin="0";
	document.querySelector(".combut").style.cursor="pointer";
}
function remsend()
{
	if(document.querySelector(".comtextarea").value=="")
	{
		document.querySelector(".combut").style.display="none";
		document.querySelector(".comtextarea").style.margin="0 0 18px 0";
		document.querySelector(".combut").style.cursor="";
	}
}
comments=document.querySelectorAll(".comment");
i_up=document.querySelectorAll(".icon-up-open");
i_down=document.querySelectorAll(".icon-down-open");
n_up=document.querySelectorAll(".com-up-num");
n_down=document.querySelectorAll(".com-down-num");
comnumber=comments.length-1;
reply=document.querySelectorAll(".comanswer"); //reply
comname=document.querySelectorAll(".comname");
for(let i=0;i<comnumber;i++)
{
	i_up[i].addEventListener("click", function() {upordown(i,"up");});
	i_down[i].addEventListener("click", function() {upordown(i,"down");});
	reply[i].addEventListener("click",function() {replyaction(i);});
}
function upordown(i,ud)
{
	if(document.querySelector(".comlog").innerHTML=='')
	{ 
		var b ='icon-'+ud+'-open chosen';
		if(ud=="up") var z=i_up[i];
		else z=i_down[i];
		if(z.classList!=b)
		{
			if(ud=="up")
			{
				i_up[i].classList.add("chosen");
				n_up[i].innerHTML=parseInt(n_up[i].innerHTML)+1;
				if(i_down[i].classList=="icon-down-open chosen")
				{
					n_down[i].innerHTML=parseInt(n_down[i].innerHTML)-1;
					i_down[i].classList.remove("chosen");
				}
			}
			else
			{
				i_down[i].classList.add("chosen");
				n_down[i].innerHTML=parseInt(n_down[i].innerHTML)+1;
				if(i_up[i].classList=="icon-up-open chosen")
				{
					n_up[i].innerHTML=parseInt(n_up[i].innerHTML)-1;
					i_up[i].classList.remove("chosen");
				}
			}
		}
		else
		{
			if(ud=="up")
			{
				i_up[i].classList.remove("chosen");
				n_up[i].innerHTML=parseInt(n_up[i].innerHTML)-1;
			}
			else
			{
				i_down[i].classList.remove("chosen");
				n_down[i].innerHTML=parseInt(n_down[i].innerHTML)-1;
			}
		}
	}
	else
		location.href="about.php";
}
function replyaction(i)
{
	document.querySelector(".comtextarea").value='@'+comname[i].innerHTML;
}
//SORT BY//
document.querySelector('.sortby > ul >li:nth-child(1)').addEventListener("click", sortoptionsshow);
document.querySelector('.sortby > ul').addEventListener("blur",function() {
	document.querySelector('.sortby > ul >li:nth-child(2)').removeAttribute("style");
	document.querySelector('.sortby > ul >li:nth-child(1)').removeEventListener("click",sort);
	document.querySelector('.sortby > ul >li:nth-child(2)').removeEventListener("click",sort);});
	var commentschron=document.querySelector('.s').innerHTML;
function sortoptionsshow()
{
	if(document.querySelector('.sortby > ul >li:nth-child(2)').style.display!="block")
	{
		document.querySelector('.sortby > ul >li:nth-child(2)').style.display="block";
		document.querySelector('.sortby > ul >li:nth-child(1)').addEventListener("click",sort);
		document.querySelector('.sortby > ul >li:nth-child(2)').addEventListener("click",sort);
	}
}
function sortItems(likes,comments) 
{
	var likesnum=[];
	var outercomments=[];
		for(let g = 0; g < likes.length; g++)
		{				
			likesnum[g]=parseInt(likes[g].innerHTML);
			outercomments[g]=comments[g].outerHTML;
		}
	for (let i = 0; i < likes.length; i++) {
		for (let j = 0; j < likes.length; j++) {
			if (likesnum[j] < likesnum[j + 1]) {
				let temp = likesnum[j];
				likesnum[j] = likesnum[j + 1];
				likesnum[j + 1] = temp;
				var bufor=outercomments[j];
				outercomments[j] = outercomments[j + 1];
				outercomments[j + 1] = bufor;
			}
		}
	}
	return outercomments;
}
function sort()
{
	if(this.innerHTML=='popularity' ||this.innerHTML=='popularity▾')
	{
		var likes=document.querySelectorAll('.com-up-num');//obj
		var comments=document.querySelectorAll('.comment');
		var all="";
			var sortedcomments=sortItems(likes,comments);
			for (let i = 0; i < likes.length; i++)all+=sortedcomments[i];
			document.querySelector('.s').innerHTML=all;
			document.querySelector('.sortby > ul >li:nth-child(2)').innerHTML='chronology';
			document.querySelector('.sortby > ul >li:nth-child(1)').innerHTML='popularity▾';
	}
	else
	{
		document.querySelector('.s').innerHTML=commentschron;
		document.querySelector('.sortby > ul >li:nth-child(2)').innerHTML='popularity';
		document.querySelector('.sortby > ul >li:nth-child(1)').innerHTML='chronology▾';
	}
	document.querySelector('.sortby > ul >li:nth-child(2)').removeAttribute("style");
	document.querySelector('.sortby > ul >li:nth-child(1)').removeEventListener("click",sort);
	document.querySelector('.sortby > ul >li:nth-child(2)').removeEventListener("click",sort);
}
//clear the textarea
document.querySelector('.notebut').addEventListener("click", function() {document.querySelector('.comtextarea').value="";});
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
//aside menu chosen
var url=document.location.toString();
var parts=url.split('/');
if(parts[4].substr(0,3)=='gen') document.querySelector('.sideul > li:nth-child(1)').classList.add('chosen');
else if(parts[4].substr(0,3)=='bas') document.querySelector('.sideul > li:nth-child(2)').classList.add('chosen');
else if(parts[4].substr(0,3)=='con') document.querySelector('.sideul > li:nth-child(3)').classList.add('chosen');
else document.querySelector('.sideul > li:nth-child(4)').classList.add('chosen');
//articles shortcut description
var longcut=[];
window.addEventListener("resize",shortcut_ver);
shortcut_ver();
function shortcut_ver()
{
	var articlep=document.querySelectorAll(".articlep");
	if(window.innerWidth<854 || (window.innerWidth<1308 && window.innerWidth>1084))
	{
		var i=0;
		var len=0, halflen=0, dot=false;
		var shortcut=[], longcutdot;
		for(let a of articlep)
		{
			if(longcut[i]==undefined) longcut[i]=a.innerHTML;
			len=longcut[i].length;
			halflen=Math.floor((len/2));
			while(longcut[i].charAt(halflen)!=' ') 
			{
				if(longcut[i].charAt(halflen)==',' || longcut[i].charAt(halflen)=='.')
				dot=halflen;
				halflen++;
			}
			if(dot!=false) 
			{
				longcutdot=longcut[i].substring(0,dot)+longcut[i].substring(dot+1,len);
				shortcut[i]=longcutdot.substr(0,halflen-1);
			}
			else 
			{
				longcutdot=longcut[i];
				shortcut[i]=longcutdot.substr(0,halflen);
			}
			shortcut[i]=shortcut[i]+'...';
			a.innerHTML=shortcut[i];
			i++;
		}
	}
	else
	{
		var i=0;
		for(let a of articlep)
		{
			if(longcut[i]!=undefined)
			a.innerHTML=longcut[i];
			i++;
		}
	}
}