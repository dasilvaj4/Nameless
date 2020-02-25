<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
/*
 *	Made by Samerton
 *  http://worldscapemc.co.uk
 *
 *  License: MIT
 *  Copyright (c) 2016 Samerton
 */

<<<<<<< HEAD
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); 
=======
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="<?php echo $sitename; ?>">
    <link rel="icon" href="/core/assets/favicon.ico">

    <title>404 &bull; <?php echo $sitename; ?></title>
<<<<<<< HEAD
	
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	<link href="/core/assets/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <br /><br /><br />
    <div class="container">
      <div class="jumbotron">
	    <h1>404</h1>
		<h4><?php echo $general_language['404']; ?></h4>
		<div class="btn-group" role="group" aria-label="...">
<<<<<<< HEAD
		  <a href="#" class="btn btn-primary btn-lg" onclick="window.history.back()"><?php echo $general_language['back']; ?></a>
=======
		  <button class="btn btn-primary btn-lg" onclick="javascript:history.go(-1)"><?php echo $general_language['back']; ?></button>
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
		  <a href="/" class="btn btn-success btn-lg"><?php echo $navbar_language['home']; ?></a>
	    </div>
	  </div>
	</div>
  </body>
</html>
