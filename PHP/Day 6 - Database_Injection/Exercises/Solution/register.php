<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>

    <?php
    $userName = '';
    $email = '';

    // Make sure I clicked on the submit btn
    if (!empty($_POST)) {
        $userName = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = $_POST['password'];

        $errors = false;

        // Username : mandatory
        if (empty($userName)) {
            echo 'Username is mandatory.';
            $errors = true;
        }

        if (empty($email)) {
            echo 'Email is mandatory.';
            $errors = true;
        } else if (!strpos($email, '@')) {
            echo 'Email is not valid.';
            $errors = true;
        }

        if (empty($password)) {
            echo 'Password is mandatory.';
            $errors = true;
        } else if ($password != $_POST['cPassword']) {
            echo 'Passwords are not matching.';
            $errors = true;
        }

        // Inserts only if NO errors
        if (!$errors) {
            // 1. Connect to the D.B.
            $conn = mysqli_connect('localhost', 'root', '', 'movie_db');

            // 2. Prepare the query
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users(username, email, password)
            VALUES('$userName', '$email', '$hashedPassword')";

            // 3. Executing the query (send query to DB)
            $result = mysqli_query($conn, $query);

            // When insert/update/delete, it returns true or false
            if ($result)
                echo 'Successfully inserted in the DB!';
            else
                echo 'Problem inserting into the DB.';

            mysqli_close($conn);
        }
    }


    ?>

    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="cPassword" placeholder="Confirm Password"><br>
        <input type="submit" name="registerBtn" value="Register">
    </form>

</body>

</html>