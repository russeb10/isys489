<?php

	include("../../db.php");
	include("../includes/functions.php");

	if($_REQUEST['command']=='update'){
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		$city=$_REQUEST['city'];
		$state=$_REQUEST['state'];
		$zip=$_REQUEST['zip'];
		$cctype=$_REQUEST['cctype'];
		$ccNumber=$_REQUEST['ccNumber'];
		$ccExpMonth=$_REQUEST['ccExpMonth'];
		$ccExpYear=$_REQUEST['ccExpYear'];
		$comments=$_REQUEST['comments'];
		
		
		$result=mysql_query("insert into store_customer values('','$name','$email','$address','$phone', '$city', '$state', '$zip', '$cctype', '$ccNumber', '$ccExpYear', '$ccExpMonth')");
		$customerid=mysql_insert_id();
		$date=date('Y-m-d');
		$result=mysql_query("insert into store_order values('','$date','$customerid')");
		$orderid=mysql_insert_id();
		
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			mysql_query("insert into store_order_detail values ($orderid,$pid,$q,$price)");
		}
		die('Thank You! your order has been placed!');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing Info</title>
<script language="javascript">
	function validate(){
		var f=document.form1;
		if(f.name.value==''){
			alert('Your name is required');
			f.name.focus();
			return false;
		}
		f.command.value='update';
		f.submit();
	}
</script>
</head>


<body>
<form name="form1" onsubmit="return validate()">
    <input type="hidden" name="command" />
	<div align="center">
        <h1 align="center">Billing Info</h1>
        <table border="0" cellpadding="2px">
        	<tr><td>Order Total:</td><td align="right"><?= '$' . number_format(get_order_total(), 2) ?></td></tr>
            <tr><td>Name:</td><td><input type="text" name="name" /></td></tr>
            <tr><td>Address:</td><td><input type="text" name="address" /></td></tr>
			<tr><td>City:</td><td><input type="text" name="city" /></td></tr>
			<tr><td>State:</td><td>
				<select name="state">
					<option value="  ">--Select a State --</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>/></td></tr>
			<tr><td>ZIP+4:</td><td><input type="text" name="zip" /></td></tr>

            <tr><td>Email:</td><td><input type="text" name="email" /></td></tr>
            <tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr>
			
			<tr><td>Credit Card:</td><td>
						<select name="cctype">
						<option value="--">Choose Card Type</option>
						<option value="MC">MasterCard</option>
						<option value="VISA">VISA</option>
						<option value="AMEX">American Express</option>
						</select>/></td></tr>
            <tr><td>Card Number:</td><td><input type="text" id="ccNumber" name="ccNumber" size="20" maxlength="20" /></td></tr>
            <tr><td>Expiration Month/Year:</td><td>
				<input type="text" id="ccExpMonth" name="ccExpMonth" size="2" maxlength="2" placeholder="10" /> / 
				<input type="text" id="ccExpYear" name="ccExpYear" size="4" maxlength="4" placeholder="2014" />
				</td></tr>
				
            <tr><td>Order Comments:</td><td><input type="text" name="comments" /></td></tr>
			<tr></tr>
			<tr><td>&nbsp;</td><td><input type="submit" value="Place Order" /></td></tr>

        </table>
	
	</div>
</form>
</body>
</html>
