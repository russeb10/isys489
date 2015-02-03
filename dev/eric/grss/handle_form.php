<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Order Confirmation - Thank You</title>
	<link rel="stylesheet" type="text/css" media="screen" href="productStyle.css" />
	</style>
</head>
<body>
<?php # Script 2.4 - handle_form.php #3

$e = 0; 					// Extended Cost
$orderSubTotal;  	// Order Sub Total
$orderTax;  		// Tax on Order
$orderTotal;  		// Grand Total
$orderSubTotal = 0;	// 

function outputTable($q, $i, $c) {
$e = $q * $c;
echo "<tr valign='top'>
		<td align = 'center'>$q</td>
		<td><thl>$i</thl></td> 
		<td align = 'right'>" . number_format($c, 2) . "</td>
		<td align = 'right'><B>" . number_format($e, 2) . "</B></td>
	</tr>";
	totalOrder($e);
}

function summarizeTable($lineType, $lineAmount) {
echo "<tr valign='top'>		
		<td></td>
		<td align = 'right'><b>$lineType</b></td> 
		<td></td>
		<td align = 'right'><b>$ " . number_format($lineAmount,2) . "</b></td>
	</tr>";
}

function totalOrder($e) {
	global $orderSubTotal;
	$orderSubTotal = $orderSubTotal + $e;
}

function finalizeOrder($orderSubTotal) {
// Access page variables
global $orderSubTotal;
global $orderTax;
global $orderTotal;
global $resident;

// Output the Pre-Tax total
summarizeTable('Subtotal', $orderSubTotal);

// Calculate tax and order grand total
if ($resident == 'Y') {
	$orderTax = $orderSubTotal * .06;
	summarizeTable('6% Michigan Sales Tax', $orderTax);
	} else {
	$orderTax = 0;
	summarizeTable('Exempt from Michigan Sales Tax', $orderTax);
	}
$grandTotal = $orderSubTotal + $orderTax;

// Output the tax and grand total

summarizeTable('Grand Total', $grandTotal);
}
	
// Validate the name:
if (!empty($_POST['name'])) 
	{
	$name = $_POST['name'];
	} 
else
	{
	$name = NULL;
	echo '<p class="error">You forgot to enter your name!</p>';
	}
	
// Validate the address:
if (!empty($_POST['address'])) 
	{
	$address = $_POST['address'];
	} 
else
	{
	$address = NULL;
	echo '<p class="error">You forgot to enter your address!</p>';
	}

// Validate the City:
if (!empty($_POST['city'])) 
	{
	$city = $_POST['city'];
	} 
else
	{
	$city = NULL;
	echo '<p class="error">You forgot to enter your city!</p>';
	}
	
// Validate the State:
if (!empty($_POST['state'])) 
	{
	$state = $_POST['state'];
	} 
else
	{
	$state = NULL;
	echo '<p class="error">You forgot to enter your state!</p>';
	}

// Validate the ZIP:
if (!empty($_POST['ZIP'])) 
	{
	$ZIP = $_POST['ZIP'];
	} 
else
	{
	$ZIP = NULL;
	echo '<p class="error">You forgot to enter your ZIP code!</p>';
	}	
	
// Validate the email:
if (!empty($_POST['email'])) 
	{
	$email = $_POST['email'];
	} 
else
	{
	$email = NULL;
	echo '<p class="error">You forgot to enter your email address!</p>';
	}
	
// Validate the resident
if ($state=="MI") 
	{
		$resident = 'Y';
	} else {
		$resident = 'N';
	}
	
		if ($resident == 'Y')
		{
		$greeting = '<p>plus 6% Michigan sales tax: </p>';
		} 
		elseif ($resident == 'N')
		{
		$greeting = '<p><b>No additional sales tax.</b></p>';
		}
		else 
		{
		$resident = NULL;
		echo '<p class="error">You must enter weather or not you are a Michigan resident!</p>';
		}

	
// Validate the comments:
if (!empty($_POST['comments'])) 
	{
	$comments = $_POST['comments'];
	} 

// if everything is OK, process the order and print the confirmation:
if ($name && $address && $city && $state && $ZIP && $email)
	{
	$csz = $city . ", " . $state . "  " . $ZIP;
	echo '<script language="javascript">';
	echo 'alert("Your order has been placed")';
	echo '</script>';
	
	// here is where the order goes
	
	echo "<h1>Grand Rapids Service Swap</h1>
	<p>Your service provider account has been established.<br/>
	<p><b>$name</b></p>
	<p><b>$address</b></p>
	<p><b>$csz</b></p>
	<table border='1'>
	<caption>Summary</caption>
	<col width='75'>
	<col width='350'>
	<col width='100'>
	<col width='100'>
	<tr>
		<th><b>QTY</th>
		<th>ITEM</th> 
		<th>PRICE EA</th>
		<th>EXT PRICE</b></th>
	</tr>";
	
	// For each item ordered, add it to the invoice 
	//if (isset($SSD)) outputTable($SSDQ,$SSD,$SSDC);
	//if (isset($RAM)) outputTable($RAMQ, $RAM,$RAMC);	
	//if (isset($MB)) outputTable($MBQ, $MB, $MBC);	
	//if (isset($VC)) outputTable($VCQ, $VC,$VCC);	
	//if (isset($EHD)) outputTable($EHDQ, $EHD,$EHDC);	
	//if (isset($PS)) outputTable($PSQ, $PS,$PSC);	
	//if (isset($Pi)) outputTable($PiQ, $Pi,$PiC);	
	//if (isset($PCC)) outputTable($PCCQ, $PCC,$PCCC);	
	//if (isset($SSHD)) outputTable($SSHDQ, $SSHD,$SSHDC);	
	//if (isset($Mon)) outputTable($MonQ, $Mon,$MonC);	

	finalizeOrder($orderTotal);
		
	echo "</table>
	<tt><b>Comments / Special Instructions:</b>$comments</tt></p>
	<p>Thanks for joining Grand Rapids Service Swap!!</p>
	<p>An account verification e-mail will be sent to you at <i><b>$email</b></i> respond to complete your account set-up.</p>\n";
	}
// missing form value	
else  
	{
	echo '<script language="javascript">';
	echo 'alert("You missed something. Please go back and fill out the form again.")';
	echo '</script>';
	}
	

?>
<p><b>Click here to return to the </b> <a href="index.html">Create Service Account Page</a>.  </p>

</body>
</html>