<?php

/*

	-- Exercise 1 :


	Write a function that:
	    - Takes two arguments as numbers.
		- Function should make sure the arguments are numbers
	    - Check which is the largest number.
		- RETURN the message (don't echo inside the function)

	The expected result is this:
		If one of the arguments is not a number, display : 
			'Expecting numbers !!!';
		Else : 
		    The first number is larger (if the first number is larger than the second number)
	    	The first number is smaller (if the first number is smaller than the second number)
		    The two numbers are identical (if the two numbers are equal)

*/

echo '<hr>';
echo '<h3>Exercise 1</h3>';

function whichIsGreater($x, $y)
{
	if (!is_numeric($x) or !is_numeric($y)) {
		return 'Both arguments should be numbers !';
	}

	if ($x > $y)
		return "x=$x is greater than x=$y";
	elseif ($x < $y)
		return "x=$x is lower than x=$y";
	else
		return "x=$x is equal to x=$y";
}


echo whichIsGreater(5, 10) . '<br>';
echo whichIsGreater(5, 'hello') . '<br>';


/*
	-- Exercise 2 :
	
	Based on this array : 

	$contact = array(
		0 => array(
			'name' => 'ricardo',
		    'phone' => '036487487',
		    'email' => 'ricard@gmail.com'
		),
		1 => array(
			'name' => 'emmanuel',
		    'phone' => '03644287487',
		    'email' => 'manu@gmail.com'
		),
		2 => array(
			'name' => 'john',
		    'phone' => '036492377',
		    'email' => 'john@gmail.com'
		)
	);


	Write a PHP script that displays the mail and phone next to username (for each user)
	Output should looks like this :

		Ricardo informations
			Phone : 036487487
			Mail : ricard@gmail.com

		Emmanuel informations
			Phone : 03644287487
			Mail : manu@gmail.com


*/
echo '<hr>';
echo '<h3>Exercise 2</h3>';

$contact = array(
	0 => array(
		'name' => 'ricardo',
		'phone' => '036487487',
		'email' => 'ricard@gmail.com'
	),
	1 => array(
		'name' => 'emmanuel',
		'phone' => '03644287487',
		'email' => 'manu@gmail.com'
	),
	2 => array(
		'name' => 'john',
		'phone' => '036492377',
		'email' => 'john@gmail.com'
	)
);

foreach ($contact as $key => $c) {
	echo '<strong>' . ucfirst($c['name']) . ' informations' . '</strong><br>';
	echo 'Phone : ' . $c['phone'] . '<br>';
	echo 'Mail : ' . $c['email'] . '<br>';
	echo '<br>';
}

/*
	-- Exercise 3 :
	
	Based on Exercise 2

	Create a function that :
		- Expect a name(string) as argument
		- Look in the array if you find a contact matching the name
		- If yes, display informations about it
		- If no, display a message saying 'No results matching your search'
*/

echo '<hr>';
echo '<h3>Exercise 3</h3>';

function searchContact($name)
{
	$contact = array(
		0 => array(
			'name' => 'ricardo',
			'phone' => '036487487',
			'email' => 'ricard@gmail.com'
		),
		1 => array(
			'name' => 'emmanuel',
			'phone' => '03644287487',
			'email' => 'manu@gmail.com'
		),
		2 => array(
			'name' => 'john',
			'phone' => '036492377',
			'email' => 'john@gmail.com'
		)
	);

	$search = false;
	foreach ($contact as $c) {
		if ($c['name'] == $name) {
			$search = $c;
			break;
		}
	}

	if ($search == false)
		echo 'No results matching your search';
	else {
		foreach ($search as $key => $value) {
			echo $key . ' = ' . $value . '<br>';
		}
	}
}

$search = searchContact('ricardo');
