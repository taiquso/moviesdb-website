<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites - Look4Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <style>
        .card {
            transition: transform ease-in-out 0.3s;
            margin-top: 30px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .star-image {
            height: 30px;
            width: 30px;
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: white;
            border-radius: 50%;
            padding: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php
    try {
        // Connect to the database
        $db = new PDO(
            'mysql:host=localhost;dbname=imdb_movies',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        // Prepare and execute the query
        $stmt = $db->prepare("SELECT title, release_date, plot, note, actors, poster_url, my_note, comment FROM movie_table ORDER BY id DESC");
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

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

    <section style="height:auto;">
        <div class="d-flex flex-column align-items-center mx-5 mb-5">
            <h1 class="mt-5">List of all movies in the Database</h1>
            <div class="d-flex flex-row flex-wrap justify-content-center" style='margin-left : 10%; margin-right : 10%'>
                <?php
                // Fetch the data and display each movie
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $title = $row['title'];
                    $release_date = $row['release_date'];
                    $plot = $row['plot'];
                    $note = $row['note'];
                    $actors = $row['actors'];
                    $poster_url = $row['poster_url'];
                    $my_note = $row['my_note'];
                    $comment = $row['comment'];

                    // Output the movie details within the loop
                    echo '<div class="card mx-3 mb-4" style="width: 18rem;">';
                    echo '<img src="' . $poster_url . '" class="card-img-top" alt="Movie Poster" style="height:400px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $title . '</h5>';
                    echo '<p class="card-text">Release Date: ' . $release_date . '</p>';
                    echo '<p class="card-text text-truncate">Plot: ' . $plot . '</p>';
                    echo '<p class="card-text">Others Rating: ' . $note . '/10</p>';
                    echo '<img src="./images/star-svgrepo-com.svg" alt="" class="star-image">';
                    echo '<p class="card-text">My Rating: ' . $my_note . '/10</p>';
                    echo '<p class="card-text">Comment: <br>' . $comment . '</p>';
                    echo '<p class="card-text text-truncate">Actors: ' . $actors . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>