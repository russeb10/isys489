<html>

<head>
<title> Service Consumer registration </title>


</head>

<body>
<form action = "serviceConsumer.php" method = "post">

   <p>First Name: <input type="text" name="firstName" /></p>
 
   <p>Last Name: <input type="text" name="lastName" /></p>
 
   <p>Primary Address: <input type="text" name="address" /></p>
   
   <p>Secondary Address: <input type ="text" name="secondAddress" /></p>
   
   <p>City: <input type = "text" name ="city" /></p>
   
   <p>State/province/region <input type = "text" name = "state" /></p>
   
   <p>Zip/Postal code <input type ="text" name = "zip" /> </p>
   
   <p>Country <select name ="country">
     
	 <option value = "" > Select </option>
	 <option value = "United States"> United States </option>
	 <option value = "Canada"> Canada </option>
	 <option value = "Mexico"> Mexico </option>
	 
	</select> </p> <br>
    
<p> Birthday: 	
<?php 
	
	echo '</select>';
	echo '<select name="month">';
		echo '<option>Month </option>';
		for($i = 1; $i <= 12; $i++){
		  $i = str_pad($i, 2, 0, STR_PAD_LEFT);
			echo "<option value='$i'>$i</option>";
		}
	echo '</select>';
	echo '<select name="day">';
	  echo '<option>Day</option>';
		for($i = 1; $i <= 31; $i++){
		  $i = str_pad($i, 2, 0, STR_PAD_LEFT);
			echo "<option value='$i'>$i</option>";
		}
	echo '</select>';
	
	 echo '<select name="year">';
	  echo '<option>Year</option>';
		for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
		  echo "<option value='$i'>$i</option>";
		} 
?> </select> </p> <br>
</P>
  
   <p>Phone Type: <select name ="phoneType">
 
     <option value="">Select...</option>
     <option value ="Mobile"> Mobile </option>
     <option value ="Home"> Home</option>
     <option value ="Work"> Work </option>
  
  </select> </p> <br> 
  
    <p>Phone number: <input type = "text" name = "phone" /> </p>
  
  
   <p> Email: <input type ="email" name = "email" /> </p>
   
   <p>Preferred Communication method: <select name ="communicationMethod">
     
	 <option value =""> Select... </option>
	 <option value = "Email"> Email</option>
	 <option value = "Phone"> Phone</option>
	 
   </select> </p> <br>
   
   <p>Username: <input type ="text" name ="userName" </p>
   
   <p>Password: <input type ="password" name = "password" </p>
   
   <p>Confirm Password: <input type ="password" name ="confirmPass" </p>
   
   <p>Preferred Name: <input type ="text" name ="preferredName" </p>
   
   <p>Check to agree to the terms and conditions of grServicesSwap <input type="checkbox" name="conditions" value="I agree"> I agree </P>
   
   <p><input type="submit" name="submit" value="Register" /></p>
   
</form>
   
<?php   
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		
	$errors = array(); // Initialize an error array.
	
	// Check for first name:
	if (empty($_POST['firstName'])) {
		$errors[] = 'You forgot to enter your first name!';
	} /*else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['firstName']));
	} */
	
	// Check for an last Name:
	if (empty($_POST['lastName'])) {
		$errors[] = 'You forgot to enter your Last Name!';
	} /*else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lastName']));
	}*/
	
	// Check for an Address:
	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your Address!.';
	} /*else {
		$a = mysqli_real_escape_string($dbc, trim($_POST['address']));
	}*/
	
	// Check for a city:
	if (empty($_POST['city'])) {
		$errors[] = 'You forgot to enter your city.!';
	} /*else {
		$c = mysqli_real_escape_string($dbc, trim($_POST['city']));
	}*/
	
	// Check for a State:
	if (empty($_POST['state'])) {
		$errors[] = 'You forgot to enter your state or province/region!';
	} /*else {
		$s = mysqli_real_escape_string($dbc, trim($_POST['state']));
	}*/
	
	// Check for a Zip:
	if (empty($_POST['zip'])) {
		$errors[] = 'You forgot to enter your zip code!';
	}/* else {
		$z = mysqli_real_escape_string($dbc, trim($_POST['zip']));
	}*/
	//Check for a country:
	if (isset($_POST['country'])){
	$co = $_POST['county'];
	}
	else{
	$co = "";
	echo '<p class ="error"> You forgot to select your country.</p>';
	}
	
	
	if (isset($_POST['communicationMethod'])){
	$cm = $_POST['communicationMethod'];
	}
	else{
	$cm = "";
	echo '<p class ="error"> You forgot to select your preferred communication method!</p>';
	}
	
	
	
	// Check for a Zip:
	if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter your phone number!';
	} /*else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['zip']));
	}*/
	
	if (empty($_POST['userName'])) {
		$errors[] = 'You forgot to enter a user name!';
	} /*else {
		$un = mysqli_real_escape_string($dbc, trim($_POST['zip']));
	}*/
	
	if (empty($_POST['preferredName'])) {
		$errors[] = 'You forgot to enter your preferred name!';
	} /*else {
		$pn = mysqli_real_escape_string($dbc, trim($_POST['zip']));
	}*/
	
	}
	
	
	
	

	
		
		
?>
</body>
</html>
  

