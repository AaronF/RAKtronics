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
			<div class="c8">
				<h1>Contact Us</h1>
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
					<input type="submit" value="Send" class="float--right">
				</form>
				
			</div>
			<div class="c4 end">
				<h1>Other</h1>
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
			return false;
		});
	});
	</script>

	<script src="include/js/home.js"></script>
</body>
</html>