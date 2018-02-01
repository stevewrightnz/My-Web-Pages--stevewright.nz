// Javascript coding for wright family web site

// Access to ZoneMinder
function PassWord() {
var testV = 1;
var pass1 = prompt('Please Enter Your Password','Password');
while (testV < 3) {
if (!pass1)
history.go(-1);
if (pass1.toLowerCase() == "steve") {
<!--alert('You Got it Right!');-->
window.open('zoneminder.php');
break;
}
testV+=1;
var pass1 =
prompt('Access Denied - Password Incorrect, Please Try Again.','Password');
}
if (pass1.toLowerCase()!="password" & testV ==3)
history.go(-1);
return " ";
}

	
// Write document.lastModified property in page.	
function pgupdate() {
		var oLastModif = new Date(document.lastModified);
		document.write("This page was last updated:" + oLastModif);
}

//Open Home Page
function openHome() {
    myWindow = window.open("/index.php", "_self");   // Opens a new window
}

//Open Contact Page
function openContact() {
    myWindow = window.open("/contact.php", "_self");   // Opens a new window
}



















