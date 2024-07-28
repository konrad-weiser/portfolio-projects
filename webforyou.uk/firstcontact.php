				<form class="firstcontact" action="form.php" method="post">
					<h2>Leave your email <br>here - I'll text back</h2>
					<p> <strong>Hey!</strong> Leave your email address and I'll text you back within 24 hours to talk about the offer.</p>
					<div class="konradinfo">
						<img src="img/konrad.gif" class="konradgif" height="611" width="700">
						<div style="float: left;width:calc(100% - 90px);margin-top:10px;">
							<b>Konrad Weiser</b><br>
							<span style="font-size: 14px;">Project Manager</span>
						</div>
						<div style="clear:both;"></div>
					</div>
					<label><span class="emailhead">Email address</span><input name="email" type="email"placeholder="Your email" required></label>
					 <input type="hidden" name="form" value="first">
					<label><input name="check" type="checkbox" required><span class="checktext">I accept the <a style="color:blue;"href="terms.php">terms of personal data processing</a></span></label>
					<button>SEND</button>
				</form>