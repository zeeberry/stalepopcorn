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

function logOut() {
	if(localStorage.getItem("user") != null) {
		localStorage.removeItem("user")
		
		if(localStorage.getItem("isAdmin") != null) 
			localStorage.removeItem("isAdmin")
			
		document.write("Log out complete, have a good day")
	}
	else {
		document.write("You aren't logged in")
	}
}

function saveUser() {
	var currentUser = document.getElementById('user').value;
	
	localStorage.setItem("user", currentUser);
}

function loadUser() {
	document.getElementById('user').value = '';
	
	if(localStorage != null) {
		document.getElementById('user').value = localStorage.getItem('user');
	}
}

function clearUser() {
	if(localStorage.getItem('user') != null) {
		localStorage.removeItem('user');
	}
	
	if(localStorage.getItem('user') != null) document.write("Error clearing user variable from localStorage")
}

function destroy() {
	localStorage.clear();
}