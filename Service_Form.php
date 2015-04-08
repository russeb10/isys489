<?php
	//detect form submission
	if (isset($_POST['submit'])) {
	//form was submitted
	$categories = $_POST['categories'];
	$DescriptionOfServices = $_POST['DescriptionOfServices'];
	$CostOfService = $_POST['CostOfService'];
	$PaymentOfJob = $_POST['PaymentOfJob'];
	$Supplies =$_POST['SuppliesProvided'];
	$AvailableTimes = $_POST['AvailableTimes'];
	$TransportationProvided = $_POST['TransportationProvided'];
	echo "Form was submitted";
	//successful login
	 redirect_to('database.php');
	}else{
	$message = "There were some errors";
?>
//validation by Tim
   <?php
      include('includes/validations.php');
    ?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobs</title>
<style type="text/css">
body,td,th {
	font-size: 12px;
}
.style2 {font-size: 16px}
.style3 {font-size: 14px}
</style>
</head>

<body>

 <form name="my_form" action="process_form.php" method="post">

  <fieldset>
  <table width="1086" height="26" border="0">
  <caption align="left"><span class="style2">Provider-Consumer Jobs</span>
  </caption>
  
  <tr>
    <th width="99" scope="col"><div align="left">Categories</div></th>
    
  </tr>
</table>

  <legend></legend>

   
     <div align="left">
<select name="Categories">
<option value="Categories" selected="selected">Categories</option>
<option value="Automotive">Automotive Services</option>
<option value="Beauty Services">Beauty Services</option>
<option value="Computer Services">Computer Services</option>
<option value="Creative Services">Creative Services</option>
<option value="Cleaning Services">Cleaning Services</option>
<option value="Cycling Services">Cycling Services</option>
<option value="Event Services">Event Services</option>
<option value="Farming">Farming</option>
<option value="Farm Garden Services">Farm &amp;Garden Services</option>
<option value="Financial Services">Financial Services</option>
<option value="Labor Services">Labor Services</option>
<option value="Lessons Tutoring Services">Lessons &amp;Tutoring Services</option>
<option value="Marine Services">Marine Services</option>
<option value="Pet Services">Pet Services</option>
<option value="Real Estate Services">Real Estate Services</option>
<option value="Skilled Trade Services">Skilled Trade Services</option>
<option value="Small Biz Ad Services">Small Biz Ad Services</option>
<option value="Therapeutic Services">Therapeutic Services</option>
<option value="Travel Services">Travel Services</option>
</select>
</div>
  <p><br />
  <br />
  <span class="style3">Description Of Service</span><br />
    <textarea cols="40" rows="5" name="Description of Service"> </textarea>
</p>
<p>&nbsp;</p>
<br />
Cost of Service
<input name="Cost of Service" type="text" />
<br />
<br />
<br />


Payment for job<br />
<input name="By the Job" type="radio" value="checked" />By the job
<input type="radio" name="by_the_hour" />By the hour

<br />
<br />
<br />
<span class="style3">Are Supplies Provided</span>

  <p>
    <label>
      <input type="radio" name="check[]" value="checked" />
      Yes</label>
  
    <label>
      <input type="radio" name="Are Supplies Provided" value="radio" />
      No</label>
    <br />
  </p>
  <br />
  <br />

 <?php
   $todaysDate = date("m/d/y");
     echo "Today is:";
     echo $todaysDate;
?>
  <span class="style2">Available Times and Dates</span><br />
    <textarea cols="40" rows="3" name=""> </textarea>
	<br />
	<br />
	
	<span class="style3">Transportation Provided</span><br />
	<input name="Yes" type="radio" value="Yes" />Yes
	<input name="No" type="radio" value="No" />No<br/><br/><br/>
	<input type="submit" value="Submit">
         
</form>

</body>
</html>



