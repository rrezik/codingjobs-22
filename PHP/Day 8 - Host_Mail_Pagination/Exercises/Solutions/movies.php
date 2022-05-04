<?php

$pageno = $_GET['page'];

// 1. Connect to the D.B.
include_once 'database.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

// Create empty array for movies
$movies = array();

// True if you connected, false if not
if ($conn) {

    // 2. Prepare the query
    $query = 'SELECT * FROM movies';

    // 3. Executing the query (send query to DB)
    $results = mysqli_query($conn, $query);

    // I retrieved results but I need to fetch before using them
    // 4. Fetch the results as an associative array
    $movies = mysqli_fetch_all($results, MYSQLI_ASSOC);
} else {
    echo 'Problem with connection !';
}

// Close the connection
mysqli_close($conn); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php include_once 'nav.php'; ?>

    <?php foreach ($movies as $movie) : ?>

        <img src="<?= $movie['poster']; ?>" width="200px">

        <p>
            <strong>Title :</strong>
            <a href="movie.php?id=<?= $movie['id']; ?>">
                <?= $movie['title']; ?>
            </a>

        </p>

        <p>
            <strong>Views :</strong>
            <?= $movie['views']; ?>
        </p>
        <hr>
    <?php endforeach; ?>
</body>

</html>