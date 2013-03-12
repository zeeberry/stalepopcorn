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
		<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<title>Home Page</title>
	</head>
	
	<body>
		<div class="container">
			<?php include 'header.php'; ?>
			
			<script type="text/javascript">
				if(localStorage.getItem('user') != null) {
					document.write('<span class="label success">Welcome to my domain ' + localStorage.getItem("user") + '</span>')
				}
				else {
					document.write('<span class="label important">Please login or register</span>')
				}
			</script></span>
		</div>
	</body>
</html>
