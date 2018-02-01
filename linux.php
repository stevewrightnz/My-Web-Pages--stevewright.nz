<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<link rel="shortcut icon" href="favicon.ico" >
<link rel="stylesheet" type="text/css" href="wrightfamily.css">
<script src="wrightfamily.js"></script>
<title>Linux Stuff</title>
</head>

<body class="site">


<?php include("includes/header.php")?>

	<main class="site-content">

	<p>This stuff is really here so that I can find it again when I need it.</p>
	
	<p>Bluetooth Dongle Manufacturer is "Silicon Wave" - Passcode = "0000"</p>

	<h3>Linux Stuff</h3>
	<ul style="list-style-type:none">
	<li><a href="#1">Email on restart.</a><br></li>
	<li><a href="#2">Make file executable.</a><br></li>
	<li><a href="#3">Starting and stopping services at system start.</a><br></li>
	<li><a href="#4">Delete all root mail - postfix.</a><br></li>	
	<li><a href="#5">Fix ZoneMinder 1.28.109 video not working.</a><br></li>
	<li><a href="#6">List Files including size.</a><br></li>
	<li><a href="#7">Restarting Samba.</a><br></li>
	<li><a href="#8">Get the status of a service.</a><br></li>
	<li><a href="#9">Renew LetsEncrypt Certs.</a><br></li>
	<li><a href="#10">Some cURL stuff.</a><br></li>	
	<li><a href="#11">Tail.</a><br></li>
	<li><a href="#12">Tightvnc.</a><br></li>
	<li><a href="#13">mysql.</a><br></li>
	</ul>
	
	<br><hr>
	<!--This script should be placed in /etc/init.d and should send an email when the system either starts or stops.-->
	<a id="1"></a>
	<h4>Email on restart</h4>
		<p>Create a new file using your favorite file editor. I'm using nano and I've called the file "bootmail",  you can call it whatever you like. </p>
	<p><code>$ sudo nano /etc/init.d/bootmail</code></p>
	<p>Copy and paste the following in to it.</p>

<pre><code>	
### BEGIN INIT INFO
# Provides:          bootmail
# Required-Start:    $local_fs $network
# Required-Stop:     $local_fs
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: bootmail
# Description:       send mail on boot
### END INIT INFO

#!/bin/sh
# chkconfig: 2345 99 01
# Description: Sends an email at system start and shutdown
 
#############################################
#                                           #
# Send an email on system start/stop to     #
# a user.                                   #
#                                           #
#############################################
 
EMAIL="someone@domain"
RESTARTSUBJECT="["`hostname`"] - System Startup"
SHUTDOWNSUBJECT="["`hostname`"] - System Shutdown"

RESTARTBODY="This is an automated message to notify you that "`hostname`" started successfully.
Start up Date and Time: "`date`

SHUTDOWNBODY="This is an automated message to notify you that "`hostname`" is shutting down.
Shutdown Date and Time: "`date`

LOCKFILE=/var/lock/SystemEmail
RETVAL=0
 
# Source function library.
. /lib/lsb/init-functions
 
stop()
{
echo -n $"Sending Shutdown Email: "
echo "${SHUTDOWNBODY}" | mail -s "${SHUTDOWNSUBJECT}" ${EMAIL}
RETVAL=$?
 
if [ ${RETVAL} -eq 0 ]; then
rm -f ${LOCKFILE}
success
else
failure
fi
echo
return ${RETVAL}
}
 
start()
{
echo -n $"Sending Startup Email: "
echo "${RESTARTBODY}" | mail -s "${RESTARTSUBJECT}" ${EMAIL}
RETVAL=$?
 
if [ ${RETVAL} -eq 0 ]; then
touch ${LOCKFILE}
success
else
failure
fi
echo
return ${RETVAL}
}
 
case $1 in
stop)
stop
;;
 
start)
start
;;
 
*)
 
esac
exit ${RETVAL}
</code></pre>

<p>Find the line EMAIL="someone@domain" and enter the email address you want the notifications to go to. Quotes required.</p>
<p>Save the file</p>
<p> Make the file executable <code>$ sudo chmod +x /etc/init.d/bootmail</code></p>
<p>When your computer restarts you should get two emails, one as it goes down and one as it comes back up.  
If it loses power then you will get one as it restarts when the power comes back on assuming you have set the 
BIOS to restart the machine when power is restored.</p>

<a id="2"></a> 
<h4>Make a file executable</h4>
<p>To make a script file executable run the following command</p>
<p><code>$ sudo chmod +x "filename"</code></p>

<a id="3"></a> 
<h4>Starting and stopping services at system start</h4>
<p>To prevent a service that currently runs in system start up run the following command, replace "service" 
with the name of the service you want to prevent starting.<p>
<p>To disable it do this:</p>
<p><code>sudo update-rc.d service disable</code></p>
<p>To remove it do this:</p>
<p><code>sudo update-rc.d service remove</code></p>
<p>To start on boot do this:</p>
<p><code>sudo update-rc.d service defaults</code></p>

<a id="4"></a>
<h4>Delete postfix root mail</h4>
<p>Run <code> > /var/mail/root </code>as root </p>
<p>or</p>
<p>Run <code> > /var/mail/username </code>  </p>

<a id="5"></a>
<h4>Fix ZoneMinder 1.28.109 video not working</h4>
<p>Open Zoneminder. Click on Options - Paths.</p>
<p>Change PATH_ZMS to /zm/cgi-bin/nph-zms</p> 

<a id="6"></a>
<h4>List files including size</h4>
<p>To get a list of files including the file size do this:</p>
<p><code>ls -l</code></p>

<a id="7"></a>
<h4>Restarting Samba</h4>
<p>Running <code> sudo service samba restart</code> gives an error.  You need to start both services separately!</p>
<p>Run <code>sudo service smbd restart && sudo service nmbd restart</code>.</p>
<p>Use <code>stop</code> or <code>start</code> to stop and start the individual services if that's what you want to do.</p>

<a id="8"></a>
<h4>To get the status of a service.</h4>
<p>Apache 2.4</p>
<p>Run <code>systemctl status apache2.service</code></p>

<a id="9"></a>
<h4>Renew LetsEncrypt Certificates</h4>
<p>Instructions to renew my Let's Encrypt certificates are <a href="http://stevewright.nz/letsencrypt.php">here</a>.</p>

<a id="10"></a>
<h4>Various cURL Commands</h4>

<p>Man page <a href="https://curl.haxx.se/docs/manpage.html">here</a>. 
Tutorial <a href="http://www.slashroot.in/curl-command-tutorial-linux-example-usage">here</a>.</p>

<p><code>curl -IL http://zm.stevewright.nz/zm </code></p>

<p>-I, --head </p>

<p>TP/FTP/FILE) Fetch the HTTP-header only! HTTP-servers feature the command HEAD which this uses to get nothing 
but the header of a document. When used on an FTP or FILE file, curl displays the file size and last modification time only. </p>

<p>-L, --location</p>

<p>(HTTP/HTTPS) If the server reports that the requested page has moved to a different location (indicated with a Location: header 
and a 3XX response code), this option will make curl redo the request on the new place. If used together with -i, --include or -I, --head, 
headers from all requested pages will be shown. When authentication is used, curl only sends its credentials to the initial host. 
If a redirect takes curl to a different host, it won't be able to intercept the user+password. See also --location-trusted on how 
to change this. You can limit the amount of redirects to follow by using the --max-redirs option.</p>

<p>When curl follows a redirect and the request is not a plain GET (for example POST or PUT), it will do the following request with 
a GET if the HTTP response was 301, 302 , or 303. If the response code was any other 3xx code, curl will re-send the following request 
using the same unmodified method.</p>

<p>You can tell curl to not change the non-GET request method to GET after a 30x response by using the dedicated options for 
that: --post301, --post302 and --post303. </p>

<p>-v, --verbose</p>

<p>Be more verbose/talkative during the operation. Useful for debugging and seeing what's going on "under the hood". A line starting 
with '>' means "header data" sent by curl, '&lt;' means "header data" received by curl that is hidden in normal cases, and a line 
starting with '*' means additional info provided by curl.</p>

<p>Note that if you only want HTTP headers in the output, -i, --include might be the option you're looking for.</p>

<p>If you think this option still doesn't give you enough details, consider using --trace or --trace-ascii instead.</p>

<p>This option overrides previous uses of --trace-ascii or --trace.</p>

<p>Use -s, --silent to make curl quiet. </p>


<a id="11"></a>
<h4>Tail</h4>
<p>tail is a program on Unix and Unix-like systems used to display the tail end of a text file or piped data.</p>
<p>
tail has a special command line option -f (follow) that allows a file to be monitored. Instead of just 
displaying the last few lines and exiting, tail displays the lines and then monitors the file. As new lines 
are added to the file by another process, tail updates the display. This is particularly useful for monitoring 
log files. The following command will display the last 10 lines of messages and append new lines to the display 
as new lines are added to messages:</p>
<p><code>tail -f /var/adm/messages</code></p>
<p>More than one implementation (see BSD and GNU manuals) provides an option -F to aid in cases when the user is 
following a log file that rotates. This keeps following the log even when it is recreated, renamed, or removed as 
part of log rotation.</p>
<p><code>tail -F /var/adm/messages</code></p>
<p>To interrupt tail while it is monitoring, break-in with Ctrl+C.</p>


<a id="12"></a>
<h4>Tightvnc</h4>
<p> To start tightvnc, open a terminal and enter: </p> 
<p><code> vncserver </code></p>
<p> To kill an existing session if something gets screwed up: </p>
<p><code>vncserver -kill :1 </code></p>
<p>where 1 is the session number.</p>

<a id="13"></a>
<h4>MySQL</h4>

<p>To Log in:- </p>
<p><code>$ mysql -u root -p</code></p>
<p>To choose the database: </p>
<p><code>mysql> use &lt;database&gt;</code></p>
<p>To delete all records from a table:</p>
<p><code>mysql> TRUNCATE TABLE &lt;tablename&gt;</code></p>
<p>Show table layout:</p>
<p><code>mysql> describe &lt;tablename&gt;</code></p>



	</main>
	<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
	</body> 
</html>
