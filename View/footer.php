<?php
    if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = '16012337@uhi.ac.uk'; 
		$subject = 'Message from Contact Demo ';
		
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
 
        // If there are no errors, send the email
        if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
        	if (mail ($to, $subject, $body, $from)) {
        		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
        		$_POST['name']='';
        		$_POST['email']='';
        		$_POST['message']='';
        		$_POST['human']='';
        	} else {
        		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
        	}
        }
	}
?>
<footer>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <h3> Contact form </h3>
        		<div class="col-md-12">
        		    <form method="post"  enctype="multipart/form-data">
        			 	<div class="form-group">     
        				    <label class="control-label">Name </label><font color="red">*</font>
        				    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
        				    <?php echo "<p class='text-danger'>$errName</p>";?>
        				</div>
        			    <div class="form-group">
        				    <label class="control-label">Mail </label><font color="red">*</font>
        				    <input name="email" id="mail" type="email" class="form-control" placeholder="email@ex.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
        				    <?php echo "<p class='text-danger'>$errEmail</p>";?>
        				</div>
        			    <div class="from-group">
        				    <label class="control-label">Message</label><font color="red">*</font>
        				    <textarea name="message" id="message" class="form-control" placeholder="Type Here"><?php echo htmlspecialchars($_POST['message']);?></textarea>
        				    <?php echo "<p class='text-danger'>$errMessage</p>";?>
        				</div>
        				<div class="form-group">
                    		<label class="control-label">2 + 3 = ?</label><font color="red">*</font>
                			<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                			<?php echo "<p class='text-danger'>$errHuman</p>";?>
                    	</div>
        				</br>
    			    	<button id="submit" name="submit" class="btn btn-success" type="submit">Submit</button></br>
    			    	<?php echo $result; ?> 
        			</form></br>
        		</div>
            </div>
            <div class="col-md-4">
                </br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2207.714173758286!2d-3.4608552337897867!3d56.40375103073241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48863b4853204adb%3A0xf9bc3853d8b3ab39!2sWebster+Building+and+Student+Union%2C+Perth+PH1+2LU%2C+Royaume-Uni!5e0!3m2!1sfr!2sfr!4v1487868712951" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>    
            </div>
            <div class="col-md-4">
                <h3>Contact information</h3></br>
                <h5>
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"> </span> Crieff Road Perth PH1 2NX
                </h5></br>
                <h5>
                    <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"> </span>  01738 877634
                </h5></br>
                <h5>
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>  aswinfo.perth@uhi.ac.uk / salonappointments.perth@uhi.ac.uk
                </h5>
            </div>
        </div>
    </div>
</footer>
