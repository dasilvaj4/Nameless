<<<<<<< HEAD
<?php 
$GLOBALS['email'] = array(
	'username' => '', //Enter username but its usually EMAIL@YOURDOMAIN.com
	'password' => '', //Enter password if you have one
	'name' => '', // Enter the same info as the username.
	'host' => '', //Hostname like the email server address
	'port' => 587,//Port 25 may be default(May vary by your provider so ask them for this info)
	'secure' => 'tls', //Security method: none,ssl and tls
	'smtp_auth' => true //Keep this enabled
=======
<?php
$GLOBALS['email'] = array(
  'email' => '',
  'username' => '',
  'password' => '',
  'name' => '',
  'host' => '',
  'port' => 587,
  'secure' => 'tls',
  'smtp_auth' => true,
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
);
