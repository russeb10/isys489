<?php
	// Start the session
	session_start();
	include('includes/global-vars.php');
	$title = "Index";
	$page = "index";
	$content = "";

	if (isset($_SESSION["notice"]))
	{
		$content .= '<div class="alert alert-success" role="alert">'.$_SESSION["notice"].'</div><br /><br />'."\r\n";
		unset($_SESSION["notice"]);
	}

	$content .= "
		<h1>Service4Service is currently under construction.<br />
		ETA is May 2015.<br /><br />
		Thank you for your patience.</h1>
		\r\n";
	include('includes/template.php');
?>