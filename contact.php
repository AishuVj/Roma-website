<div class="w3-row header">
	<?php
		// define variables and set to empty values
		$name = $email = $comment = "";
		//check if the form has been submitted via post method
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//get and cleanse the form input data using input function
			$name = test_input($_POST["name"]);
			$email = test_input($_POST["email"]);
			$comment = test_input($_POST["comment"]);
			}
			//define a function to clean the input data
			function test_input($data) {
			$data = trim($data);//remove any leading trailing white space
			$data = stripslashes($data);//remove any backslashes added
			$data = htmlspecialchars($data);//convert special characters to HTML entities to prevent hacking
			return $data;// return the input data
			}
		?>
	<div class="w3-content" style="max-width:350px;">
	<h4 class="w3-center"><b>Contact Us</b></h4>
	<!--  Form section collecting name,email and message using input fields-->
	<form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
		<div class="w3-section">
			<label>Name</label>
		<input class="w3-input w3-border" type="text" name="name"  required>
		</div>
		<div class="w3-section">
			<label>Email</label>
			<input class="w3-input w3-border" type="text" name="email" required>
		</div>
		<div class="w3-section">
				<label>Comment</label>
				<input class="w3-input w3-border" type="text" name="comment" style="height:150px" required>
		</div>
		<!--  Submit button -->
		<div class="w3-center">
			<input type="submit" name="submit" value="Submit" class="w3-button roma_green"> 
		</div>
	</form><!--  end of form -->
	</div>
		<?php
			// Recipient mail id
			$to = 'tvcvijay@yahoo.co.uk';
			//subject of the mail
			$subject = "Contact Submission Form";
			//body of the mail
			$msg = "Hello, \r\n";
			$msg .= "You have received a contact form submission from RomaKetane website.\r\n";
			$msg .= "Name: " . $name . "\r\n";
			$msg .= "Email: " . $email . "\r\n";
			$msg .= "Message: " . $comment . "\r\n";
			$msg .= "Thank you.\r\n";
			//echo nl2br($msg);
			if(isset($_POST['submit'])){
			//calling mail() function to send the contact submission form to the recipient mail id provided
			(mail($to,$subject,$msg));
			}
		?>
</div>

