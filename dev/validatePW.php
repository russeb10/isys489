<?php
/*	Function:  	valid_pass
	Author:		Paul Gerndt
	Purpose:	Used to validate passwords to ensure minimum length and content
				requirements are met.
	Created:	2015-02-16	
*/


function valid_pass($candidate) {

// Declare and Initialize Local Variables
$CritCount = 0; //Tabulator for keeping track of number of criteria matched

/*
    Regular Ezpression Example $\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$
    $ = beginning of string
    \S* = any set of characters
    (?=\S{8,}) = of at least length 8
    (?=\S*[a-z]) = containing at least one lowercase letter
    (?=\S*[A-Z]) = and at least one uppercase letter
    (?=\S*[\d]) = and at least one number
    (?=\S*[\W]) = and at least a special character (non-word characters)
    $ = end of the string

 */
	// Test for each requirement 
    if (preg_match('$\S*(?=\S{8,})$', $candidate)) $CritCount = $CritCount + 10; // Value of 10 for minimum length
	if (preg_match('$\S*[a-z]$', $candidate)) $CritCount = $CritCount + 1; 	//Contains lower case a-z
	if (preg_match('$\S*[A-Z]$', $candidate)) $CritCount = $CritCount + 1; 	//Contains UPPER case A-Z
	if (preg_match('$\S*[\d]$', $candidate)) $CritCount = $CritCount + 1; 	//Contains at least one numeric digit
	if (preg_match('$\S*[\W]$', $candidate)) $CritCount = $CritCount + 1; 	//Contains at least one special Character (!@#$%^&*()-_, etc.)
	
    if ($CritCount > 12) //Meets minimum length, plus 3 additional criteria
	{
        return TRUE;
	}
    else 
	{
		return FALSE;
	}	
}
?>