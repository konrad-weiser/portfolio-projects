let nums=document.querySelectorAll(".num");
let section=document.querySelector(".numbersbar");
let started=false;
window.onscroll=function() {
	if(window.scrollY>=section.offsetTop-window.innerHeight+50)
	{
		if(!started)
		{
			nums.forEach(num => {startCount(num);});
		}
		started=true;
	}
};
function startCount(el)
{
	let goal=el.dataset.goal;
	let count= setInterval( ()=>{
		if(el.textContent[el.textContent.length-1]!='%')
		{
			el.textContent++;
			if(el.textContent==goal)
			{
				clearInterval(count);
			}
		}
		else
		{
			var bufor=el.textContent.substr(0,el.textContent.length-1);
			bufor=parseInt(bufor);
			bufor=bufor+1;
			el.textContent=bufor+'%';
			if(el.textContent==goal+'%')
			{
				clearInterval(count);
			}
		}
		},2000/goal);
}