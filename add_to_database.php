<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Add - Look4Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Look4Movies</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php">Search a movie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="movies_list.php">Favorites</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class='d-flex flex-column align-items-center justify-content-center' style='height:90vh; gap:15px'>
        <?php
        // Connect to the database
        $db = new PDO(
            'mysql:host=localhost;dbname=imdb_movies',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        // Check if the movie already exists
        $checkStmt = $db->prepare("SELECT COUNT(*) FROM movie_table WHERE title = :title AND plot = :plot");
        $checkStmt->bindParam(':title', $_POST['title']);
        $checkStmt->bindParam(':plot', $_POST['plot']);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();

        //get the previous page URL for if the value of my_note isn't between 0 and 10
        $previous_page_url = $_SERVER['HTTP_REFERER'];

        if ($count > 0) {
            echo "<h1 class='text-danger'>Movie already in the database!</h1>";
            echo "<a href='index.php' class='btn btn-primary'>Return to Homepage</a>";
        } else if ($_POST['my_note'] < 0 || $_POST['my_note'] > 10) {
            echo '<h1 class="text-danger">Please enter a number !</h1>';
            echo "<a href='$previous_page_url' class='btn btn-primary'>Retry</a>";
        } else {
            $insertStmt = $db->prepare("INSERT INTO movie_table (title, poster_url, release_date, note, plot, actors, my_note, comment) VALUES (:title, :poster, :year, :note, :plot, :actors, :my_note, :comment)");

            $insertStmt->bindParam(':title', $_POST['title']);
            $insertStmt->bindParam(':poster', $_POST['poster']);
            $insertStmt->bindParam(':year', $_POST['year']);
            $insertStmt->bindParam(':note', $_POST['note']);
            $insertStmt->bindParam(':plot', $_POST['plot']);
            $insertStmt->bindParam(':actors', $_POST['actors']);
            $insertStmt->bindParam(':my_note', $_POST['my_note']);
            $insertStmt->bindParam(':comment', $_POST['comment']);

            $insertStmt->execute();

            echo "<h1 class='text-success'>Movie added successfully</h1>";
            echo "<a href='index.php' class='btn btn-primary'>Return to Homepage</a>";
        }


        ?>
    </div>
</body>

</html>