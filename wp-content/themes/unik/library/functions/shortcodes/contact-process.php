<?php
if (isset($_REQUEST['type']) && $_REQUEST['type'] == 'shortcode'){
	if (isset($_REQUEST['contactemail'])){ $mailTo = $_REQUEST['cformcontactemail']; }
	if (isset($_REQUEST['name'])){ $mailFromName = $_REQUEST['cformname']; }
	if (isset($_REQUEST['email'])){ $mailFromEmail = $_REQUEST['cformemail']; }
	if (isset($_REQUEST['message'])){ $message = $_REQUEST['cformtext']; }
	if (isset($_REQUEST['mywebsite'])){ $mailFromWebsite = $_REQUEST['cformcontacturl']; }
        if (isset($_REQUEST['subject'])){ $mailFromSubject = $_REQUEST['cformcontactsubject']; }
	
	$msg = "This message was sent from: $mailFromWebsite \n\nby: $mailFromName \n\nEmail: $mailFromEmail \n\nSubject: $subject \n\nText of message: $message";
	$headers = "MIME-Version: 1.0\r\n Content-type: text/html; charset=utf-8\r\n From: $mailFromEmail\r\n Reply-To: $mailFromEmail";
	
	wp_mail($mailTo, $mailFromSubject, $msg, $headers);
}
?>
