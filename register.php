<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">

		<!-- Zainab's CSS Imports -->
		<link rel="stylesheet" type="text/css" href="../lib/style.css" media="screen" />
		<link href="../lib/nivo-slider.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="../lib/default.css" rel="stylesheet"  type="text/css" media="screen" />
		<link href="../lib/rating_style.css" rel="stylesheet"  type="text/css" media="screen" />
		<link rel="stylesheet" href="../poll/poll.css" type="text/css" />
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		
		<!-- Remove bullets style -->
		<link rel="stylesheet" href="login/styles/style.css" type="text/css" />
	
		
		<title>Register Page</title>
	</head>
	
	<body>
	
		<!-- Makes the information centered and "scales" it down -->
		<div id="wrap">
		
		<!-- Header image -->
		<a href="index.html">
			<div id="header"></div>
		</a>
		
		<!-- Makes a space between the header image and the content -->
		<div id="top"></div>
		
		<!-- Content is in here -->
		
		
		
		
		<div id="content">
			
			<?php include 'header.php'; ?>
			<!-- Register code -->
			<form method="post"
				  action="login/registerHandler.php">
				  
				  <fieldset>
					<legend>Register</legend>
						<ul class="no-bullets">
							<li>
								<label for="first">First Name:</label>
								<input id="first" name="first" />
							</li>
							
							<li>
								<label for="last">Last Name:</label>
								<input id="last" name="last" />
								
							</li>
						
							<li>
								<label for="last">E-Mail:</label>
								<input id="last" type="email" name="email" />
								
							</li>
							
							<li>
								<label for="user">Desired Username:</label>
								<input id="user" name="user" />
							</li>
							
							<li>
								<label for="password">Password:</label>
								<input id="password" type="password" name="pass" />
							</li>
							
							<li>
								<label for="cPass">Confirm Password:</label>
								<input id="cPass" type="password" name="cPass" />
							</li>
						</ul>
					</fieldset>
					
					<fieldset>
						<button class="primary btn">Submit</button>
						<button type="reset" class="btn">Reset</button>
					</fieldset>
			</form>
		</div>
		
		<div id="footer">
			Developed by Danielle Clarke, Zainab Ebrahimi, Richard Ramos and Jonathan Vasquez.
		</div>
	</div>
	</body>
</html>