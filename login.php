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
		<link rel="stylesheet" href="styles/style.css" type="text/css" />
		
		<title>Login Page</title>
		
		<script type="text/javascript" src="login/logout.js"></script>
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
		<?php include 'header.php'; ?>
			
			<form method="post" action="login/loginHandler.php" class="form-stacked">
				<fieldset>
					<legend>Login</legend>
					
					<ul class="no-bullets">
						
						<li>
							<label for="user">Username:</label>
							<input id="user" name="user" />
						</li>
						<li>
							<label for="pass">Password: </label>
							<input id="pass" type="password" name="pass" />
						</li>
					</ul>
				</fieldset>
					
				<fieldset>
					<button class="primary btn">Login</button>
					<a href="register.html" class="btn">Register</a>
				</fieldset>
			</form>
		</div>
	</body>
</html>
