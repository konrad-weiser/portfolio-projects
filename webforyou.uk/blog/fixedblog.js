setTimeout(fixit, 200);
window.addEventListener("wheel", fixit);
window.addEventListener("resize", fixit);
function fixit()
{
		var article=document.querySelector('.articlecontent');
		var sidebar=document.querySelector('.anotherarticle');
		var blogsec=document.querySelector('.blogsec');
		var arth=article.clientHeight;
	if(window.innerWidth>1160)
	{
		if(window.scrollY>article.getBoundingClientRect().bottom+window.scrollY-610)
		{
			var margin=article.clientHeight-552;
			blogsec.style.cssText=" width: 100%;display: flex; justify-content: space-between;";
			sidebar.style.cssText="margin-top: "+margin+"px; position:static;";
			article.style.cssText="width: calc(90% - 420px); margin-left: 5%;margin-right:0;";
		}
		else
		{
			blogsec.removeAttribute("style");
			sidebar.removeAttribute("style");
			article.removeAttribute("style");
		}
	}
	else
	{
		blogsec.removeAttribute("style");
			sidebar.removeAttribute("style");
			article.removeAttribute("style");
	}
}
