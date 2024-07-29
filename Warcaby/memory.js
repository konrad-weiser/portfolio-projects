var czerwone=0;
var biale=0;
var kolej='<img src="img/bialy.png">';
var antykolej='<img src="img/czerwony.png">';
var pnr; //nr przedostatnio kliknietego pola
var nr;//nr ostatnio kliknietego pola
function generuj_plansze()
{
	var plansza="";
	var rzad="";
	var jakzaczoc; //0-bialy na 0 miejscu 1-bialy na 1 miejscu
	var i, clear;
	var id=1;
	for(j=0;j<8;j++)
	{
		i=0;
		if(j%2==0) jakzaczoc=0; else jakzaczoc=1; 
		while(i<8)
		{
			if(i==0) clear='style="clear:both;"'; else clear="";
			if(i%2==jakzaczoc) rzad=rzad+'<div id="pole'+id+'" class="polab"'+clear+'><img src="img/b.png"></div>';
			else {rzad=rzad+'<div id="pole'+id+'"class="polaz"'+clear+'><img src="img/z.png"></div>';}
			i++; id++;
		}
		plansza=plansza+rzad;
		rzad="";
	}
	document.getElementById("plansza").innerHTML=plansza;
}
function ustawienie_poczatkowe()
{
	czerwone=12;
	biale=12;
	kolej='<img src="img/bialy.png">';
	for(let i=1;i<65;i++)
	{
		if(document.getElementById('pole'+i).innerHTML=='<img src="img/z.png">')
		{
			if(i<25) document.getElementById('pole'+i).innerHTML='<img src="img/czerwony.png">';
			else if(i>40) document.getElementById('pole'+i).innerHTML='<img src="img/bialy.png">';
			//dodanie onclickow do zielonych pól
			document.getElementById('pole'+i).addEventListener("mouseover", function() {co_mozesz(i);});
			document.getElementById('pole'+i).addEventListener("mouseout", function() {wylaczenie_opcji_ruchu(i);});
			document.getElementById('pole'+i).addEventListener("click", function() {gdzie_mozesz_sie_nim_ruszyc(i);});
			document.getElementById('pole'+i).addEventListener("click", function() {jakie_pole_kliknieto(i);});
		}
	}
	
}
function jakie_pole_kliknieto(i)
{
	if(($('#pole'+i).css('opacity')=='0.99') || ($('#pole'+i).css('opacity')=='0.98'))
	{
		if(nr!=undefined)pnr=nr;
		nr=i;
	}
}
function co_mozesz(i)////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	var mozesz=false;    //cokolwiek
	var mozesz_sie=""; //co?(ruszyc/zbic)
	//czy stoi na nim pion twojego koloru
	if(kolej==document.getElementById('pole'+i).innerHTML)
	{
		//ruch
		if(kolej=='<img src="img/bialy.png">')
		{
			if((i>8)&&((document.getElementById('pole'+(i-7)).innerHTML=='<img src="img/z.png">') || (document.getElementById('pole'+(i-9)).innerHTML=='<img src="img/z.png">')))//możliwość ruchu
			{
				mozesz_sie="ruszyc";
				mozesz=true;
			}
		}
		else
		{
			if((i<57)&&((document.getElementById('pole'+(i+7)).innerHTML=='<img src="img/z.png">') || (document.getElementById('pole'+(i+9)).innerHTML=='<img src="img/z.png">')))//możliwość ruchu
			{
				mozesz_sie="ruszyc";
				mozesz=true;
			}
		}
		//bicie
			if(((i-14>0)&&(document.getElementById('pole'+(i-14)).innerHTML=='<img src="img/z.png">') && (document.getElementById('pole'+(i-7)).innerHTML==antykolej)) || ((i-18>0)&&(document.getElementById('pole'+(i-18)).innerHTML=='<img src="img/z.png">') && (document.getElementById('pole'+(i-9)).innerHTML==antykolej)) || ((i+14<64)&&(document.getElementById('pole'+(i+14)).innerHTML=='<img src="img/z.png">') && (document.getElementById('pole'+(i+7)).innerHTML==antykolej)) || ((i+18<64)&&(document.getElementById('pole'+(i+18)).innerHTML=='<img src="img/z.png">') && (document.getElementById('pole'+(i+9)).innerHTML==antykolej)))
			{
				mozesz_sie="zbic";
				mozesz=true;
			}
	}
	if(mozesz==true)
	{
		$('#pole'+i).addClass('pole_aktywne');
	}
}
function wylaczenie_opcji_ruchu(i)
{
	$('#pole'+i).removeClass('pole_aktywne');
}
function sprzatanie()
{
	for(j=1;j<65;j++)
	{
		$('#pole'+j).removeClass('pole_2akt');
		document.getElementById('pole'+j).removeEventListener("click", ruch);
		document.getElementById('pole'+j).removeEventListener("click", bicie);
		document.getElementById('pole'+j).removeAttribute("style");
	}
}
function gdzie_mozesz_sie_nim_ruszyc(i)////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	if($('#pole'+i).css('opacity')=='0.99') //czy jest aktywne
	{
		sprzatanie();
		if(kolej=='<img src="img/bialy.png">')
		{
			//podswietlenie ruchu
			if((i>8)&&(document.getElementById('pole'+(i-7)).innerHTML=='<img src="img/z.png">'))
			{
				$('#pole'+(i-7)).addClass('pole_2akt');
				document.getElementById('pole'+(i-7)).addEventListener("click",ruch);
			}
			if((i>8)&&(document.getElementById('pole'+(i-9)).innerHTML=='<img src="img/z.png">'))
			{
				$('#pole'+(i-9)).addClass('pole_2akt');
				document.getElementById('pole'+(i-9)).addEventListener("click",ruch);
			}
		}
		else
		{
			if((i<57)&&(document.getElementById('pole'+(i+7)).innerHTML=='<img src="img/z.png">'))
			{
				$('#pole'+(i+7)).addClass('pole_2akt');
				document.getElementById('pole'+(i+7)).addEventListener("click", ruch);
			}
			if((i<57)&&(document.getElementById('pole'+(i+9)).innerHTML=='<img src="img/z.png">'))
			{
				$('#pole'+(i+9)).addClass('pole_2akt');
				document.getElementById('pole'+(i+9)).addEventListener("click", ruch);
			}
	}
			
		//podswietlenie bicia
			if((i-14>0)&&(document.getElementById('pole'+(i-14)).innerHTML=='<img src="img/z.png">') && (document.getElementById('pole'+(i-7)).innerHTML==antykolej))
			{
				$('#pole'+(i-14)).addClass('pole_2akt');
				document.getElementById('pole'+(i-14)).addEventListener("click",bicie);
			}
			if((i-18>0)&&(document.getElementById('pole'+(i-18)).innerHTML=='<img src="img/z.png">') && (document.getElementById('pole'+(i-9)).innerHTML==antykolej))
			{
				$('#pole'+(i-18)).addClass('pole_2akt');
				document.getElementById('pole'+(i-18)).addEventListener("click",bicie);
			}
			if((i+14<64)&&(document.getElementById('pole'+(i+14)).innerHTML=='<img src="img/z.png">') && (document.getElementById('pole'+(i+7)).innerHTML==antykolej))
			{
				$('#pole'+(i+14)).addClass('pole_2akt');
				document.getElementById('pole'+(i+14)).addEventListener("click",bicie);
			}
			if((i+18<64)&&(document.getElementById('pole'+(i+18)).innerHTML=='<img src="img/z.png">') && (document.getElementById('pole'+(i+9)).innerHTML==antykolej))
			{
				$('#pole'+(i+18)).addClass('pole_2akt');
				document.getElementById('pole'+(i+18)).addEventListener("click",bicie);
			}
			
	$('#pole'+i).css('border', '2px solid #1F2024');
	}
}
function ruch()////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	i_z=pnr;
	i_do=nr; 
	document.getElementById('pole'+i_z).innerHTML='<img src="img/z.png">';
	if(kolej=='<img src="img/bialy.png">') document.getElementById('pole'+i_do).innerHTML='<img src="img/bialy.png">';
	else document.getElementById('pole'+i_do).innerHTML='<img src="img/czerwony.png">';
	sprzatanie();
	zmiana_kolej();
}
function bicie()////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	i_z=pnr;
	i_do=nr; 
	bity=pnr+(nr-pnr)/2;
	document.getElementById('pole'+i_z).innerHTML='<img src="img/z.png">';
	document.getElementById('pole'+bity).innerHTML='<img src="img/z.png">';
	if(kolej=='<img src="img/bialy.png">') 
	{
		document.getElementById('pole'+i_do).innerHTML='<img src="img/bialy.png">';
		czerwone--;
		if(czerwone==0)
		{
			document.getElementById("plansza").innerHTML='Wygrywa: <span style="color: #f2f2e1;">gracz biały</span>!';
		}
	}
	else 
	{
		document.getElementById('pole'+i_do).innerHTML='<img src="img/czerwony.png">';
		biale--;
		if(biale==0)
		{
			document.getElementById("plansza").innerHTML='Wygrywa: <span style="color: #d02416;">gracz czerwony</span>!';
		}
	}
	sprzatanie();
	zmiana_kolej();
}
function zmiana_kolej()
{
	if(kolej=='<img src="img/bialy.png">')
	{
		kolej='<img src="img/czerwony.png">';
		antykolej='<img src="img/bialy.png">';
		document.getElementById('kolej').innerHTML='<span style="color: #d02416;">gracz czerwony</span>';
	}
	else 
	{
		kolej='<img src="img/bialy.png">';
		antykolej='<img src="img/czerwony.png">';
		document.getElementById('kolej').innerHTML='<span style="color: #f2f2e1;">gracz biały</span>';
	}
	
}
function nowa_rozgrywka()
{
	generuj_plansze();
	ustawienie_poczatkowe();
}
