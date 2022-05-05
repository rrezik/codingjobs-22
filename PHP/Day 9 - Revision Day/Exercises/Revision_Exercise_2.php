<?php

/*
    -- Exercise 1 :
    
    Thanks to that array : 
    $array = array(
        'lastname' => 'simon',
        'firstname' => 'simon',
        'phone' => '+3526455748'
        'mail' => 'simon@simon.fr',
        'address' => '6 rue de la gare',
        'city' => 'Mondelange'
    );

    Using a loop, display the content of this array (keys and values)
*/

echo '<hr>';
echo '<h3>Exercise 1</h3>';

$array = array(
	'lastname' => 'simon',
	'firstname' => 'simon',
	'phone' => '+3526455748',
	'mail' => 'simon@simon.fr',
	'address' => '6 rue de la gare',
	'city' => 'Mondelange'
);

foreach ($array as $key => $value) {
	echo $key . ' : ' . $value . '<br>';
}


/* -- Exercise : 
	1 :
	Create a function 'multiplicationTable'
	2 :
	This function should have on argument $x
	3:
	The function should return the multiplication table of $x (from 1 to 20).
	4 :
	Create a form with one input.
	When you validate this form, it should display the multiplication table of the number you entered (using the function).
	You have to check if the value is correct (no float and no string, ONLY integer).
	5 :
	Display the multiplication table in a nice HTML format table style.
*/

echo '<hr>';
echo '<h3>Exercise 2</h3>';

// Declare function
function multiplicationTable($x)
{
	if (!is_numeric($x))
		return false;

	$table = array();
	for ($i = 1; $i <= 20; $i++) {
		$table[$i] = $i * $x;
	}

	return $table;
}

// Using the function if we click on the submit button
if (isset($_POST['multiplyBtn'])) {
	$result = multiplicationTable($_POST['number']);
	if ($result == false)
		echo 'Must be a number !';
	else {
		echo '<table border=1>';
		foreach ($result as $key => $value) {
			echo '<td>' . $key . '*' . $_POST['number'] . '=' . $value . '</td>';
		}
		echo '</table>';
	}
}


?>

<form method="post">
	<input type="text" name="number" placeholder="Your number"><br>
	<input type="submit" name="multiplyBtn" value="Multiply">
</form>