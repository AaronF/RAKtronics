<?php
	include_once("include/functions.php");
	// mailUser("a@aaronfisher.co", "Aaron", "Test", "<p>This is just a drill!</p>", "aaronfisher@me.com", "Aaron fisher");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>RAKtronics - Contact</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="stylesheet" href="include/css/style.min.css">
	<link rel="stylesheet" href="include/css/external/animate.css">
	<link rel="stylesheet" href="include/css/external/font-awesome.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">

	</script>
</head>

<body>
	<div class="header">
		<div class="grid w900">
			<div class="row">
				<div class="c6 logo">
					<a href="index.html"><img src="include/images/small_logo.png"></a>
				</div>
				<div class="c6 nav">
					<nav>
						<a href="index.html">Home</a>
						<a href="info.html">More Info</a>
						<a href="#">Blog</a>
						<a href="contact.php" class="current" >Contact</a>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="main">
		<div class="container contact grid w900">
			<div class="c8 contact_form">
				<h1>Contact Us</h1>
				<div class="success_callout hide">
					<p>Success! Your message has been sent.</p>
				</div>
				<div class="error_callout hide">
					<p>Error, try again.</p>
				</div>
				<form id="contact_form">
					<label for="name">Your Name</label>
					<input type="text" name="name" required placeholder="Your name...">
					<label for="company">Company</label>
					<input type="text" name="company" required placeholder="Company...">
					<label for="email">Your Email</label>
					<input type="email" name="email" required placeholder="Your email...">
					<label for="subject">Subject</label>
					<input type="text" name="subject" required placeholder="Subject...">
					<label for="message">Message</label>
					<textarea required name="message" placeholder="Your message..."></textarea>
					<lavel for="copyself"><input id="copyself" type="checkbox" checked name="copyself"> Send a Copy to Myself</label>
					<input type="submit" value="Send" class="float--right">
				</form>

			</div>
			<div class="c4 end contact_sidebar">
				<h1>Other</h1>
				<a href="mailto:info@raktronics.com">Email me directly</a>
			</div>
			<div class="cf"></div>
		</div>
	</div>

	<div class="footer">
		<div class="grid w900">
			<div class="c12">
				<p>&copy; Copyright RAKtronics Limited</p>
				<a href="http://twitter.com/RAKtronics" class="twitter"><i class="icon-twitter"></i></a>
				<a href="http://facebook.com/RAKtronics" class="facebook"><i class="icon-facebook"></i></a>
				<a href="http://www.linkedin.com/profile/view?id=92009145" class="linkedin"><i class="icon-linkedin"></i></a>
			</div>
			<div class="cf"></div>
		</div>
	</div>

	<script>
	$(document).ready(function(){
		$("#contact_form").on("submit", function(){
			console.log("submitted");
			var your_name = $("input[name=name]").val();
			var company = $("input[name=company]").val();
			var your_email = $("input[name=email]").val();
			var subject = $("input[name=subject]").val();
			var message = $("textarea[name=message]").val();
			var copyself;

			copyself = document.getElementById("copyself");
			if(copyself.checked){
				copyself = 1;
			} else {
				copyself = 0;
			}

			$.ajax({
		        type: "POST",
		        data: "type=contactform&your_name="+your_name+"&your_email="+your_email+"&company="+company+"&subject="+subject+"&message="+message+"&copyself="+copyself+" ",
		        url: "include/functions.php",
		        success: function(msg){
		        	if(msg == "sentsent"){
		        		$(".success_callout").removeClass("hide");
		        		$("input[name=name]").val("");
						$("input[name=company]").val("");
						$("input[name=email]").val("");
						$("input[name=subject]").val("");
						$("textarea[name=message]").val("");
		        	} else {
		        		$(".error_callout").removeClass("hide");
		        	}
		        }
		    });
			return false;
		});
	});
	</script>

	<script src="include/js/home.js"></script>
</body>
</html>
