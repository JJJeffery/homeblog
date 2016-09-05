<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
function set_html_content_type() {
	return 'text/html';
}

//If the form is submitted
if(isset($_POST['send'])) {
	$al_options = explode('|', $_POST['options']);
	$email= isset($_POST['mail']) ? trim($_POST['mail']) : '';
	$message = '';
	$website = stripslashes(trim($_POST['website']));
	$contactName = stripslashes(trim($_POST['name']));
	
	//If there is no error, send the email
	if(!isset($hasError)) {
		if($contactName === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} 
		
		//Check to make sure sure that a valid email address is submitted
		//Check to make sure sure that a valid email address is submitted
		if($email === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
            $emailError = 'You entered an invalid email address.';
            $hasError = true;
		}
		 
		//Check to make sure comments were entered 
		if(trim($_POST['comment']) === '') {
			$messageError = 'You forgot to enter your message.';
			$hasError = true;
		} 
		else {
			if(function_exists('stripslashes')) {
		  		$message = stripslashes(trim($_POST['comment']));
		 	} 
		 	else {
		  		$message = trim($_POST['comment']);
			}
		}
	}

	
	
	if(!isset($hasError)) {
		If (!empty ($website) ) $message = $message.'<br />Website: '.$website;
		$subject = $al_options[2];
		$mailto = $al_options[3];
		$error  = empty($al_options[0]) ? 'Submission error. Please make sure all fields are filled correctly.' : $al_options[0];
		$success = empty($al_options[1]) ? 'Thanks for your email' : $al_options[1];
		$headers = 'From: '.$contactName.' <'.$email.'>' . "\r\n";
		
		add_filter('wp_mail_content_type', 'set_html_content_type');
		if (!wp_mail( $mailto, $subject, $message, $headers)){
			$status =  '<span class="label label-danger">'.$error.'</span>';
		}
		else
		{
			$status =  '<span class="label label-success">'.$success.'</span>';
		}
		remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
		echo $status;
		die();
	} 
} 
?>