<?php
/*
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
 */
	// Get Data from previous form and strip tags for security/sanity
	$user = strip_tags($_POST["user"]);
	$password = strip_tags($_POST["pass"]);
	
	// Establish connection to MySQL server
	$con = mysql_connect("localhost","root","root");
	
	// Check if there was a problem connecting to the database
	if(!$con)
		echo "Error connecting to database<br/>";
		
	// Select a database on the MySQL server
	mysql_select_db("demosite", $con);
	
	// Select the name and password of the user trying to login, and store it as an array
	$userResults = mysql_fetch_row(mysql_query("SELECT name, password, isAdmin FROM Users WHERE name = '$user'", $con));
	
	// Check if user exists in database, and if they do, check if passwords match
	if(strcasecmp($userResults[0],$user) == 0) {
		echo "User Found!<br/>";
		
		if(crypt($password, $userResults[1]) == $userResults[1]) {
			echo "Passwords Match, Verification Complete.<br/>";
			
			echo "<script type=\"text/javascript\">
					localStorage.setItem(\"user\",\"$userResults[0]\")
					localStorage.setItem(\"isAdmin\",\"$userResults[2]\")
				</script>";			
		}
		else
			echo "Incorrect Password<br/>";
	}
	else
		echo "User not found!<br/>";

	// Close connection to MySQL server
	$ccon = mysql_close($con);
	
	// Check if there was an error closing connection
	if(!$ccon) 
		echo "Error closing database connection<br/>";
?>
			
