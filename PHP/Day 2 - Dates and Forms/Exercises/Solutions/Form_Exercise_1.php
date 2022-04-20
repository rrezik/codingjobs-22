<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.alert {
			color: red;
		}
	</style>
</head>

<body>
	<?php

	// Make sure I clicked
	if (!empty($_POST)) {
		// Check if email contains an @symbol
		if (strpos($_POST['email'], '@'))
			echo '<span style="color:green">Email is valid !</span>';
		else
			echo '<span class="alert">Email is not valid!</span>';
	}

	?>
	<form action="" method="POST">
		<input type="text" name="email" placeholder="Your email"><br>
		<input type="text" name="password" placeholder="Your password"><br>
		<input type="submit" value="Send">
	</form>
</body>

</html>