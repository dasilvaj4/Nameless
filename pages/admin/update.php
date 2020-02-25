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
 */

// Ensure user is logged in, and is admin
if($user->isLoggedIn()){
	if($user->canViewACP($user->data()->id)){
		if($user->isAdmLoggedIn()){
			// Can view
		} else {
			Redirect::to('/admin');
			die();
		}
	} else {
		Redirect::to('/');
		die();
	}
} else {
	Redirect::to('/');
	die();
}
<<<<<<< HEAD
 
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
// Set page name for sidebar
$adm_page = "update";

require('core/includes/htmlpurifier/HTMLPurifier.standalone.php'); // HTMLPurifier

// Update check
// Get current version and also the unique site ID
$current_version = $queries->getWhere('settings', array('name', '=', 'version'));
$current_version = $current_version[0]->value;

$uid = $queries->getWhere('settings', array('name', '=', 'unique_id'));
$uid = $uid[0]->value;


<<<<<<< HEAD
if($update_check = file_get_contents('https://worldscapemc.co.uk/nl_core/nl1/stats.php?uid=' . $uid . '&version=' . $current_version)){
=======
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL, 'https://worldscapemc.co.uk/nl_core/nl1/stats.php?uid=' . $uid . '&version=' . $current_version);
if($update_check = curl_exec($ch)){
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	if($update_check == 'Failed'){
		$update_check = 'error';
	}
} else {
	$update_check = 'error';
}
<<<<<<< HEAD
=======
curl_close($ch);
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin panel">
    <meta name="author" content="<?php echo $sitename; ?>">
	<meta name="robots" content="noindex">
	<?php if(isset($custom_meta)){ echo $custom_meta; } ?>
<<<<<<< HEAD
	
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	<?php
	// Generate header and navbar content
	// Page title
	$title = $admin_language['update'];
<<<<<<< HEAD
	
	require('core/includes/template/generate.php');
	?>
	
=======

	require('core/includes/template/generate.php');
	?>

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	<!-- Custom style -->
	<style>
	html {
		overflow-y: scroll;
	}
	</style>
<<<<<<< HEAD
	
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
  </head>

  <body>
	<?php
	// "Update" page
	// Load navbar
	$smarty->display('styles/templates/' . $template . '/navbar.tpl');
<<<<<<< HEAD
	  
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	echo '<br />';

	if(Session::exists('adm-alert')){
		echo Session::flash('adm-alert');
	}
	?>
	<div class="container">
	  <div class="row">
		<div class="col-md-3">
		  <?php require('pages/admin/sidebar.php'); ?>
		</div>
		<div class="col-md-9">
		  <div class="well">
			<h2><?php echo $admin_language['update']; ?></h2>
			<?php if($update_check == 'None'){ ?>
			<div class="alert alert-success"><?php echo $admin_language['installation_up_to_date']; ?></div>
			<?php } else if($update_check == 'error'){ ?>
			<div class="alert alert-warning"><?php echo $admin_language['update_check_error']; ?></div>
<<<<<<< HEAD
			<?php 
			} else { 
=======
			<?php
			} else {
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
				// Update database values to say we need a version update
				$update_needed_id = $queries->getWhere('settings', array('name', '=', 'version_update'));
				$update_needed_id = $update_needed_id[0]->id;
				$queries->update('settings', $update_needed_id, array(
					'value' => 'true'
				));
<<<<<<< HEAD
				
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
				// Update database value to say when we last checked
				$update_needed_id = $queries->getWhere('settings', array('name', '=', 'version_checked'));
				$update_needed_id = $update_needed_id[0]->id;
				$queries->update('settings', $update_needed_id, array(
					'value' => date('U')
				));
			?>
			<div class="alert alert-info">
			  <p><strong><?php echo $admin_language['new_update_available']; ?></strong></p>
			</div>
			  <p>
			    <?php echo $admin_language['your_version']; ?> <strong><?php echo htmlspecialchars($current_version); ?></strong><br />
			    <?php echo $admin_language['new_version']; ?> <strong><?php echo htmlspecialchars($update_check); ?></strong>
			  </p>
			  <p>
			  Update instructions:
			  <?php
			  // Get instructions
<<<<<<< HEAD
			  if($instructions = file_get_contents('https://worldscapemc.co.uk/nl_core/nl1/instructions.php?version=' . $current_version)){
=======
			  $ch = curl_init();
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			  curl_setopt($ch, CURLOPT_URL, 'https://worldscapemc.co.uk/nl_core/nl1/instructions.php?version=' . $current_version);

			  if($instructions = curl_exec($ch)){
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
				$config = HTMLPurifier_Config::createDefault();
				$config->set('HTML.Doctype', 'XHTML 1.0 Transitional');
				$config->set('URI.DisableExternalResources', false);
				$config->set('URI.DisableResources', false);
				$config->set('HTML.Allowed', 'u,p,b,i,a,small,blockquote,span[style],span[class],p,strong,em,li,ul,ol,div[align],br,img');
				$config->set('CSS.AllowedProperties', array('float', 'color','background-color', 'background', 'font-size', 'font-family', 'text-decoration', 'font-weight', 'font-style', 'font-size'));
				$config->set('HTML.AllowedAttributes', 'src, href, height, target, width, alt, class, *.style');
				$purifier = new HTMLPurifier($config);
<<<<<<< HEAD
				
				echo $purifier->purify($instructions);
			  }
			  ?>
			  </p>
			  <hr>
			  <a class="btn btn-success" target="blank" href="https://worldscapemc.co.uk/nl_core/nl1/updates/<?php echo htmlspecialchars(str_replace('.', '', $update_check)); ?>.zip"><?php echo $admin_language['download']; ?></a> 
=======

				echo $purifier->purify($instructions);
			  }

			  curl_close($ch);
			  ?>
			  </p>
			  <hr>
			  <a class="btn btn-success" target="blank" href="https://worldscapemc.co.uk/nl_core/nl1/updates/<?php echo htmlspecialchars(str_replace('.', '', $update_check)); ?>.zip"><?php echo $admin_language['download']; ?></a>
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			  <a class="btn btn-info" href="/admin/update_execute" onclick="return confirm('<?php echo $admin_language['update_warning']; ?>')"><?php echo $admin_language['update']; ?></a>
			<?php } ?>
		  </div>
		</div>
<<<<<<< HEAD
      </div>	  
    </div>
	
=======
      </div>
    </div>

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	<?php
	// Footer
	require('core/includes/template/footer.php');
	$smarty->display('styles/templates/' . $template . '/footer.tpl');
<<<<<<< HEAD
	
	// Scripts 
=======

	// Scripts
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
	require('core/includes/template/scripts.php');
	?>

  </body>
</html>
