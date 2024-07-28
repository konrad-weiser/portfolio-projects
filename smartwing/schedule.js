var aktualmonth=0;
var aktualyear=0;
window.onload=time;
document.querySelector('.icon-angle-left').addEventListener("click", previousmth);
document.querySelector('.icon-angle-right').addEventListener("click", nextmth);
var boxes=document.querySelectorAll('.box');

var iffirst=true;
today=0;
todaymth=0;
todayyear=0;
dayplace=0;

boxes.forEach(box=>{box.addEventListener("click", boxclick);});

function nextmth()
{
	aktualmonth+=1;
	if(aktualmonth>12) 
	{
		aktualmonth=1;
		aktualyear++;
	}
	time();
}
function previousmth()
{
	aktualmonth-=1;
	if(aktualmonth<1) 
	{
		aktualmonth=12;
		aktualyear--;
	}
	time();
}
function time()
{
	if(iffirst==false)
	{
		for(i=1;i<=42;i++) 
		{
			document.getElementById('box'+i).removeAttribute("style"); //normal again
			document.getElementById('box'+i).classList.remove('eventblue');
		}
	}
	var dz=new Date();                                                                         //today date
	var day=dz.getDate();
	var nrdayname=dz.getDay();if(nrdayname==0)nrdayname=7; 
	var mth;
	if(aktualmonth==0) 
	{
		mth=dz.getMonth()+1;
        aktualmonth=mth;		
	}	
	else mth=aktualmonth;
	var year;
	if(aktualyear==0) 
	{
		year=dz.getFullYear();
        aktualyear=year;		
	}	
	else year=aktualyear; 
	//miesiąc 
	var mthname,engl, iledni;
	var pop;           //pop to iledni from the previous mth
	switch(mth)
	{                                              
		case 1: engl="January"; iledni=31; pop=31;break;
		case 2: engl="February";
		if(year%4==0)iledni=29; else iledni=28; pop=31; break;
		case 3: engl="March"; iledni=31; 
		if(year%4==0)pop=29; else pop=28; break;
		case 4: engl="April"; iledni=30; pop=31; break;
		case 5:  iledni=31;engl="May"; pop=30; break;
		case 6:  iledni=30;engl="June"; pop=31; break;
		case 7:  iledni=31;engl="July"; pop=30; break;
		case 8:  iledni=31;engl="August"; pop=31; break;
		case 9:  iledni=30;engl="September"; pop=31; break;
		case 10: iledni=31;engl="October"; pop=30; break;
		case 11: iledni=30;engl="November"; pop=31; break;
		case 12: iledni=31;engl="December"; pop=30; break;
	}
	var dzpierwszy = new Date(engl+"1"+","+year);   //setting parameters for 1
	var pierwszy=dzpierwszy.getDay();if(pierwszy==0)pierwszy=7;
	var dzien1=0,dzien2=0;    //dzien1,2 necessary for numeration
	if(pierwszy!=1)                                                             //gray before
		{
			for(var j=pierwszy-1;j>0;j--)
			{
				document.getElementById("box"+j).innerHTML='<span style="color:gray; text-shadow: 0px 0px 1px rgba(128, 128, 128, 1);">'+pop+"</span>"; pop--;
			}
		}
	for(var i=pierwszy; i<=42;i++)
	{
		dzien1++;
		document.getElementById("box"+i).innerHTML=dzien1;
		if(dzien1==day && iffirst==true) dayplace=i; //to color todays day
		if(i>pierwszy+iledni-1)                                                 //gray after
		{
			dzien2++;
			document.getElementById("box"+i).innerHTML='<span style="color:gray; text-shadow: 0px 0px 1px rgba(128, 128, 128, 1);">'+dzien2+"</span>";
		}
	}
	document.getElementById("month").innerHTML=engl;
	document.getElementById("year").innerHTML=year;
	if(iffirst==true)
	{
		today=day;
		todaymth=document.getElementById("month").innerHTML;
		todayyear=document.getElementById("year").innerHTML;
		var chosen=day+' '+todaymth+' '+todayyear;
			document.querySelector('.notebook > h3').innerHTML=chosen;
			iffirst=false;
	}
	if(todaymth==document.getElementById("month").innerHTML && todayyear==aktualyear)
	{
		document.getElementById('box'+dayplace).style.background="rgba(255,255,255,0.1)";
		document.getElementById('box'+dayplace).style.border="1px solid rgba(49,179,210,0.3)";
	}
	specialevents();
}
function boxclick()
{
	if(this.innerHTML.charAt(0)=='<')
	{
		var span='#'+this.id+' > span';
		if(document.querySelector(span).innerHTML<15) 
			nextmth();
		else 
			previousmth();
	}
	else
	{
		var chosen=this.innerHTML+' '+document.getElementById("month").innerHTML+' '+document.getElementById("year").innerHTML;
		document.querySelector('.notebook > h3').innerHTML=chosen;
		document.querySelector('.notebook > p').innerHTML='Common day';
	}
}
//special events
var wholedate=document.getElementById('hiddate').value.split('|');
var note=document.getElementById('hidnote').value.split('|');
var date=[];
for(i=0;i<wholedate.length;i++)
{
	date[i]=wholedate[i].split(' ');
}
function specialevents()
{
	for(let i=0;i<wholedate.length;i++)
	{
		if(aktualyear==date[i][2] && date[i][1]==document.getElementById("month").innerHTML)
		{
			for( j=1;j<=42;j++)
			{
				if(document.getElementById('box'+j).innerHTML==date[i][0])
				{
					document.getElementById('box'+j).classList.add('eventblue');
					document.getElementById('box'+j).addEventListener("click",function() {addnote(i);});
				}
			}
		}
	}
}
function addnote(i)
{
	if(aktualyear==date[i][2] && date[i][1]==document.getElementById("month").innerHTML)
	document.querySelector('.notebook > p').innerHTML=note[i];
}