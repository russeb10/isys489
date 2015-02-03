<?php # Script 10.2 - delete_user.php
// This page is for deleting a user record.
// This page is accessed through view_users.php.

$page_title = 'Delete a Book';
include ('includes/header.html');
echo '<h1>Delete a Book</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['bookid'])) && (is_numeric($_GET['bookid'])) ) { // From view_users.php
	$id = $_GET['bookid'];
} elseif ( (isset($_POST['bookid'])) && (is_numeric($_POST['bookid'])) ) { // Form submission.
	$id = $_POST['bookid'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

require ('../mysqli_connect.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['sure'] == 'Yes') { // Delete the record.

		// Make the query:
		$q = "DELETE FROM books WHERE bookid=$id LIMIT 1";		
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			// Print a message:
			echo '<p>The book has been deleted.</p>';	

		} else { // If the query did not run OK.
			echo '<p class="error">The book could not be deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
		}
	
	} else { // No confirmation of deletion.
		echo '<p>The book has NOT been deleted.</p>';	
	}

} else { // Show the form.

	// Retrieve the user's information:
	$q = "SELECT CONCAT(author, ', ', title FROM books WHERE books=$id";
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

		// Get the user's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		// Display the record being deleted:
		echo "<h3>Name: $row[0]</h3>
		Are you sure you want to delete this book?";
		
		// Create the form:
		echo '<form action="delete_user.php" method="post">
	<input type="radio" name="sure" value="Yes" /> Yes 
	<input type="radio" name="sure" value="No" checked="checked" /> No
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
	
	} else { // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>';
	}

} // End of the main submission conditional.

mysqli_close($dbc);
		
include ('includes/footer.html');
?>