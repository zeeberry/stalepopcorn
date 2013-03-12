<!DOCTYPE>

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
		
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<script type="text/javascript" src="login/logout.js"></script>
	</head>
	
	<body>
		<ul class="tabs">
			<!--
				This is the menu that will be displayed on all pages. Something that could be added is
				to make the specific window active. I don't currently know how to do this without adding
				the menu per page, and the current page would have the <li class="active"> tag.
			 -->
			<li><a href="index.php">Home</a></li>
			
			<script type="text/javascript">
			
			/* Checks to see if the user is logged in/out. Depending on the situation
			 * it will choose the correct option to display.
			 */
				if(localStorage.getItem("user") == null) {
					document.write("<li><a href=\"login.php\">Login</a></li>")
					document.write("<li><a href=\"register.php\">Register</a></li>")
				}
				else {
					document.write("<li><a href=\"javascript:logOut()\">Logout</a></li>")
					
					if(localStorage.getItem("isAdmin") != null) {
						if(localStorage.getItem("isAdmin") == 1) {
							document.write("<li><a href=\"search/search.php\">Admin CP</a></li>")
							document.write("Administrator")
						}
						else if(localStorage.getItem("isAdmin") == 0)
							document.write("Regular User")
						else
							document.write("Error")
					}
				}
			</script>
			
			<li><a href="members.php">Members</a></li>
			
		</ul>
	</body>
</html>