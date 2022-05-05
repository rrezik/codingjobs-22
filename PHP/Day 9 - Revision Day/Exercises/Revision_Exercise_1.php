<?php

/*
	1. Display the type of each variable at the end of the script (using only one function)
	2. Display the type AND the value of each variable (using only one function)
*/

echo '<h3>Exercise 1</h3>';

$x = 5;
$y = "1";
$z = true;
$n = 2.5;
$z = $x + $y;
$k = $n * $y;

echo gettype($x) . '<br>';
echo gettype($y) . '<br>';
echo gettype($z) . '<br>';
echo gettype($n) . '<br>';
echo gettype($k) . '<br>';


/*
	Show the date (in a nice format) for :
		- Today
		- Tomorrow
		- The same date than today one month later
*/

echo '<hr>';
echo '<h3>Exercise 2</h3>';

echo 'Today : ' . date('d/m/Y') . '<br>';
echo 'Tomorrow : ' . date('d/m/Y', strtotime('+1 day')) . '<br>';
echo 'One month later : ' . date('d/m/Y', strtotime('+1 month')) . '<br>';

/*
	Create an array with the numbers from 1 to 100 : Create it dynamically using a loop.
	Once it has been created, display it in a HTML list (ul/li)

	Use one loop to create the array.
	Use a second loop to display it.
*/
echo '<hr>';
echo '<h3>Exercise 3</h3>';

// Create the array : 
$array = array();
for ($i = 0; $i <= 100; $i++) {
	$array[] = $i;
}

// Display it : 
echo '<ul>';
foreach ($array as $value) {
	echo '<li>' . $value . '</li>';
}
echo '</ul>';

/*
	Practice query using the moviedb :
	1. Connect to DB and choose the moviedb
	2. Go to SQL tab and run a query to get all movies by George Lucas
	3. Display the movies in a HTML <table>
		You should display title, views, the poster and the name of the director.
*/

echo '<hr>';
echo '<h3>Exercise 4</h3>';

$conn = mysqli_connect('localhost', 'root', '', 'movie_db');
$query = 'SELECT * 
FROM movies 
INNER JOIN directors ON movies.director_id = directors.id
WHERE name = "George Lucas"';
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<table border="1px">
	<tr>
		<th>Title</th>
		<th>Views</th>
		<th>Director</th>
	</tr>

	<?php foreach ($movies as $movie) : ?>
		<tr>
			<td><?= $movie['title']; ?></td>
			<td><?= $movie['views']; ?></td>
			<td><?= $movie['name']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>