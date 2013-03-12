<!DOCTYPE html>

<html>
<!--
 * Copyright (C) 2011 by Jonathan Vasquez
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * -->
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
		
		<title>Member List</title>
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
	
		
			<?php include 'header.php'; ?>
				
			<?php
			
				$con = mysql_connect("localhost","root","root");
				
				mysql_select_db("demosite", $con);
				
				$members = mysql_query("SELECT name, firstName, lastName FROM Users", $con);
			
				
				echo "<table class='bordered-table'>
						<tr>
							<td>User</td>
							<td>First Name</td>
							<td>Last Name</td>
						</tr>";
					  
				while($row = mysql_fetch_array($members)) {
					printf("<tr>
								<td> %s</td>
								<td> %s</td>
								<td> %s</td>
							</tr>", $row[0], $row[1], $row[2]);	  
				}
				
				echo '</table>';
				
				$ccon = mysql_close($con);
			?>
		</div>
	</body>
</html>