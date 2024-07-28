<section>
			<form class="secondcontact" action="form.php" method="post">
				<h2>Choose a package and contact us!</h2>
				<p>Leave your email/phone below or write a message to <a href="mailto:contact@netforyou.co.uk">contact@netforyou.co.uk</a> - I will contact you within 24 hours to talk about improving your current website or a completely new project.</p>
				<div class="emailbox">
					<label class="parallelbox">
						<span>E-mail address *</span>
						<input name="email" type="email" required placeholder="Your e-mail address">
					</label>
					<label class="parallelbox">
						<span>Phone number *<span>
						<input name="phone" type="tel" required placeholder="Your full phone number">
					</label>
					<input type="hidden" name="form" value="second">
					<label class="checklabel">
						<input name="check" required type="checkbox">
						<span class="checktext2">I accept the <a style="color:blue;"href="terms.php">terms of personal data processing</a></span>
					</label>
					<button>Send Contact</button>
				</div>
			</form>
		</section>
		<script>
			var forms=document.querySelectorAll('.secondcontact');
			
			forms.forEach(function(form) {
					var email = form.querySelector('input[type="email"]');
					var phone = form.querySelector('input[type="tel"]');
				
				email.addEventListener('input', function() {
					if (email.value.trim() != '') 
						phone.removeAttribute('required');
					else 
						phone.setAttribute('required', 'required');
				});

			phone.addEventListener('input', function() {
				if (phone.value.trim() != '')
					email.removeAttribute('required');
				else 
					email.setAttribute('required', 'required');
			});
			});
		</script>
	