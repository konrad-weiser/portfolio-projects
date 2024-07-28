const faqs=document.querySelectorAll(".faq");
const icons=document.querySelectorAll(".icon-right-open");
faqs.forEach(faq=>{
	faq.addEventListener("click", () =>{
		faq.classList.toggle("active");
	})
});