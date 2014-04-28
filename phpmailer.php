<?php	
	ini_set('display_errors', '1');	
	
	error_reporting(E_ALL);
	//error_reporting(E_STRICT);

	require("mailchimp/class.mailchimp.php");
		
	$fname	= $_POST['FNAME'];
	$lname	= $_POST['LNAME'];		
	$email	= $_POST['EMAIL'];		
	$fone	= $_POST['PHONE'];		
	
	$MailChimp = new \drewm\MailChimp('8400dfbc1c91bc97d6b37a6a806150df-us8');
	$result = $MailChimp->call('lists/subscribe', array(
					'id'                => '13f1fa9e8c',
					'email'             => array('email'=> $email),
					'merge_vars'        => array('FNAME'=>$fname, 'LNAME'=>$lname, 'PHONE'=>$fone),
					'double_optin'      => false,
					'update_existing'   => true,
					'replace_interests' => false,
					'send_welcome'      => false,
				));
	echo json_encode($result);
?>