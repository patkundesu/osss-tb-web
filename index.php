<?php
require __DIR__ . "/vendor/autoload.php";
use Mailgun\Mailgun;

if(isset($_POST["action"])){
	echo "testing: {$_POST["action"]}<br>";
	# Instantiate the client.
	$mgClient = new Mailgun(getenv("MAILGUN_API_KEY"));
	$domain = getenv("MAILGUN_DOMAIN");

	# Make the call to the client.
	$result = $mgClient->sendMessage($domain, array(
	    'from'    => getenv("MAILGUN_SMTP_LOGIN"),
	    'to'      => $_POST["email"],
	    'subject' => 'Hello',
	    'text'    => 'Testing some Mailgun awesomness!'
	));
	
	echo "testing:<br>";
	if($result){
		print_r($result);
	}
}
?>

<form method="post">
<label>Enter email: </label>
<input type="email" name="email" required />
<button type="submit" name="action" value="submit_email">Submit</button>
</form>