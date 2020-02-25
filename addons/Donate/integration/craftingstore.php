<?php
/*
 *	Made by Samerton
 *  http://worldscapemc.co.uk
 *
 *  License: MIT
 */

$API = $queries->getWhere('donation_settings', array("name", "=", "api_key"));
$API = $API[0]->value;

$ch = curl_init();
<<<<<<< HEAD
=======
curl_setopt($ch, CURLOPT_HTTPHEADER, array('token: ' . $API));
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Packages
<<<<<<< HEAD
curl_setopt($ch, CURLOPT_URL, 'https://api.craftingstore.net/v2/' . $API . '/packages');
=======
curl_setopt($ch, CURLOPT_URL, 'https://api.craftingstore.net/v4/general/packages');
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
$cs_packages = curl_exec($ch);
$cs_packages = json_decode($cs_packages, true);

// Categories
<<<<<<< HEAD
curl_setopt($ch, CURLOPT_URL, 'https://api.craftingstore.net/v2/' . $API . '/categories');
=======
curl_setopt($ch, CURLOPT_URL, 'https://api.craftingstore.net/v4/general/categories');
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
$cs_categories = curl_exec($ch);
$cs_categories = json_decode(str_replace("&quot;", "\"", strip_tags($cs_categories)), true);

// Payments
<<<<<<< HEAD
curl_setopt($ch, CURLOPT_URL, 'https://api.craftingstore.net/v2/' . $API . '/payments');
=======
curl_setopt($ch, CURLOPT_URL, 'https://api.craftingstore.net/v4/general/payments');
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
$cs_donors = curl_exec($ch);
$cs_donors = json_decode(str_replace("&quot;", "\"", strip_tags($cs_donors)), true);

curl_close($ch);