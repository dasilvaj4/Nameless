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

// Maintenance mode?
// Todo: cache this
$maintenance_mode = $queries->getWhere('settings', array('name', '=', 'maintenance'));
if($maintenance_mode[0]->value == 'true'){
	// Maintenance mode is enabled, only admins can view
	if(!$user->isLoggedIn() || !$user->canViewACP($user->data()->id)){
		require('pages/forum/maintenance.php');
		die();
	}
}
<<<<<<< HEAD
 
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
// User must be logged in to proceed
if(!$user->isLoggedIn()){
	Redirect::to('/forum');
	die();
}

// Deal with the reputation change
if(Input::exists()) {
	if(Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'pid' => array(
				'required' => true
			),
			'tid' => array(
				'required' => true
			),
			'type' => array(
				'required' => true
			),
			'uid' => array(
				'required' => true
			)
		));
		if($validation->passed()){
<<<<<<< HEAD
=======
			// Ensure user exists
			if(!is_numeric($_POST['pid']) || !is_numeric($_POST['tid']) || !is_numeric($_POST['uid'])){
				Redirect::to('/forum');
				die();
			}

			$rep_user = $queries->getWhere('users', array('id', '=', Input::get('uid')));
			if(!count($rep_user)){
				Redirect::to('/forum');
				die();
			} else
				$user_id = $rep_user[0]->id;

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
			if(Input::get('type') === 'positive'){
				try {
					$queries->create("reputation", array(
						'user_received' => Input::get('uid'),
						'post_id' => Input::get('pid'),
						'topic_id' => Input::get('tid'),
						'user_given' => $user->data()->id,
						'time_given' => date('Y-m-d H:i:s')
					));
<<<<<<< HEAD
					$queries->increment("users", Input::get('uid'), "reputation");
=======
					$queries->increment("users", $user_id, "reputation");
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
					Redirect::to("/forum/view_topic/?tid=" . Input::get('tid') . "&pid=" . Input::get('pid'));
					die();
				} catch(Exception $e){
					die($e->getMessage());
				}
			} else if(Input::get('type') === 'negative'){
				$reputation_id = $queries->getWhere("reputation", array("post_id", "=", Input::get('pid')));
				$rep_id = 0;
<<<<<<< HEAD
				
=======

>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
				foreach($reputation_id as $reputation){
					if($reputation->user_given == $user->data()->id){
						$rep_id = $reputation->id;
						break;
					}
				}
				if($rep_id == 0){
					Redirect::to("/forum/view_topic/?tid=" . Input::get('tid') . "&pid=" . Input::get('pid'));
					die();
				}
				try {
					$queries->delete("reputation", array("id", "=", $rep_id));
<<<<<<< HEAD
					$queries->decrement("users", Input::get('uid'), "reputation");
=======
					$queries->decrement("users", $user_id, "reputation");
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
					Redirect::to("/forum/view_topic/?tid=" . Input::get('tid') . "&pid=" . Input::get('pid'));
					die();
				} catch(Exception $e){
					die($e->getMessage());
				}
			}
		}
	} else {
		// Invalid token
		Redirect::to("/forum/view_topic/?tid=" . Input::get('tid') . "&pid=" . Input::get('pid'));
		die();
	}
} else {
	Redirect::to("/forum");
	die();
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 37925b97dfac5fe1053307fd1e84ee176b24878b
