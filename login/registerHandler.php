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
 * */
 
	$user = strip_tags($_POST["user"]);
	$password = strip_tags($_POST["pass"]);
	$confirmPassword = strip_tags($_POST["cPass"]);
	$firstName = strip_tags($_POST["first"]);
	$lastName = strip_tags($_POST["last"]);
	$email = $_POST["email"];
	
	if($user == "" ||
	   $password == "" ||
	   $confirmPassword == "" ||
	   $firstName == "" |
	   $lastName == "")
	   echo "A field has been left blank. Make sure all fields are completed before submitting";
	else {
		if($password != $confirmPassword) 
			echo "Passwords Don't Match, Please Try Again";
		else {
			echo "<br/>";
			
			// Hash password
			$hashedPass = crypt($password);
			
			// Open connection to MySQL server
			$con = mysql_connect("localhost","root","root");
				
			// Check to see if it connected successfully
			if(!$con)
				echo "Cannot Connect To Database!<br/>";
			
			// Switch to demosite database
			if(!mysql_select_db("demosite", $con)) 
				echo "Error switching database";
				
			$userQuery = mysql_fetch_row(mysql_query("SELECT name FROM Users WHERE name = '$user'", $con));
			
			if(strcasecmp($userQuery[0], $user) == 0) 
				echo "User already exists</br>";
			else {
				if(mysql_query("INSERT INTO Users VALUES('$user','$hashedPass','$firstName','$lastName','$email', '0')", $con)) 
					echo "User created successfully. Your username will be $user<br/>";
				else
					echo "Error creating user<br/>";
			}
				
			$ccon = mysql_close($con);
			
			if(!$con)
				echo "Cannot close connection!";
		}
	}
?>