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
<title>TP-Link TL-WN725N V2</title>
</head>

<body class="site">

<?php include("includes/header.php")?>
	
	<main class="site-content">
	<h3>Setup a TP-Link TL-WN725N V2 Wireless Dongle on a Raspberry Pi2</h3>
	
	<p>This page outlines how to set up a TP-Link TL-WN725N V2 Wireless Dongle on a Raspberry Pi2, install and update the drivers.  
	I've written this to remind me how I set mine up. </p>
	
	<p>The bulk of this information comes from a posts on  
	<a href= 'http://raspberrypi.stackexchange.com/questions/37920/how-do-i-set-up-networking-wifi-static-ip-address/37921#37921' target="_top">Stack Exchange</a> 
	by <a href= 'http://raspberrypi.stackexchange.com/users/8697/milliways'>Milliways</a> and 
	<a href= 'https://www.raspberrypi.org/forums/viewtopic.php?p=462982#p462982'>raspberrypi.org</a> by MrEngman.</p>
	
	<h4>Networking Files</h4>

	<p>If you are running a recent Raspbian <code>/etc/network/interfaces</code> should be as below. If you have changed it put it back.</p>
	
	<pre>
	   # interfaces(5) file used by ifup(8) and ifdown(8)

	   # Please note that this file is written to be used with dhcpcd
	   # For static IP, consult /etc/dhcpcd.conf and 'man dhcpcd.conf'

	   # Include files from /etc/network/interfaces.d:
	     source-directory /etc/network/interfaces.d

	     auto lo
	     iface lo inet loopback

	     iface eth0 inet manual

	     allow-hotplug wlan0
	     iface wlan0 inet manual
             wpa-conf /etc/wpa_spplicant/wpa_supplicant.conf

	     allow-hotplug wlan1
	     iface wlan1 inet manual
             wpa-conf /etc/wpa_supplicant/wpa_supplicant.conf
	</pre>
	
	
	<p>The file <code>/etc/wpa_supplicant/wpa_supplicant.conf </code>will be created/modified by the recommended 
	setup methods, but can be setup by hand. It should contain something like the following:-</p>

	<pre>
       ctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev
       update_config=1
	
       network={
       ssid="ESSID"
       psk="Your_wifi_password"
       }
	</pre>
	
	<p>If you need to connect to a private network (i.e. no broadcast SSID) include the line scan_ssid=1 inside network={...}.</p>
	
    <p>NOTE If you want to connect to different networks (e.g. at work or home) you can include multiple network={...} entries.</p>
	
	<p>There are many other options which can be used see <code>man wpa_supplicant.conf</code>.</p>

	<h4>Setup a Static IP Address</h4>

	<p>Milliways recommends that you don't use Static IP's.  I like to use a mixture of both Static and Dynamic IP's primarily because 
	I use a website to monitor IP cameras and it is a real pain to have to change the camera monitoring software settings everytime the network 
	goes down.  He outlines two ways to set up a static IP address in his post and I chose the dhcpcd method primarily because 
	the first instruction said to leave <code>/etc/network/interfaces</code> as it was.</p>
		
	<h5>dhcpcd method</h5>

	<p>Leave /etc/network/interfaces at its default (as above).</p>
	
	<p>Here is an example which configures a static address, routes and dns.</p>
	
	<p>Edit <code>/etc/dhcpcd.conf</code> as follows:- </p>
	
	<pre>
       interface eth0
       static ip_address=10.1.1.30/24
       static routers=10.1.1.1
       static domain_name_servers=10.1.1.1
	
       interface wlan0
       static ip_address=10.1.1.31/24
       static routers=10.1.1.1
       static domain_name_servers=10.1.1.1
	</pre>

	<p><code>ip_address</code> is the IP address and size you want to set,<br>
	<code>routers</code> is the address of your router (or gateway), <br>
	<code>domain_name_servers</code> is the DNS address(es) from /etc/resolv.conf.</p>
	
	<h4>Install and update the Drivers</h4>
	
	<p>The simplest way to install and update the drivers for this dongle is using the script written 
	by MrEngman which can be installed by running the following:-</p>

	<pre>
	<!--instructions updated from information on base webpage -->
       sudo wget https://www.fars-robotics.net/install-wifi -O /usr/bin/install-wifi
       sudo chmod +x /usr/bin/install-wifi
	</pre>

	<p>Use command <code>sudo /usr/bin/install-wifi -h</code> for details on how you can use it to download or update the wifi driver. 
	This script will automatically determine the wifi you are using and search for the correct driver to download for the kernel 
	version you are using. The script can also install wifi drivers for wifi modules using 8192eu, 8812au, mt7610 or mt7612 drivers.</p>
	
	<p>The full article can be found on <a href= 'https://www.raspberrypi.org/forums/viewtopic.php?p=462982#p462982'>raspberrypi.org</a></p>

	<p>Once installed updating the drivers for the installed dongle is as simple as running 
	<code>sudo /usr/bin/install-wifi</code> after updating the kernel.</p>
		
	<p>That pretty much covers it but you should refer to the base articles if you want more information.</p>

	</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
</body> 
</html>