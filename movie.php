<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie - Look4Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <style>
        .movies-div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .movie-container {
            display: flex;
            flex-direction: column;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 80%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .movie-details {
            display: flex;
            align-items: center;
            justify-content: start;
            gap: 20px;

            h1 a {
                color: #333;
                text-decoration: none;
                transition: ease-in-out 0.2s;

                &:hover {
                    color: #ff6b6b;
                }
            }

            p {
                margin: 5px 0;
            }

            img {
                height: 124px;
                width: 80px;
                border-radius: 10px 0 0 10px;
            }

            .year-and-star {
                display: flex;
                gap: 8px;
            }

            .star-image {
                height: 30px;
                width: 30px;
                background-color: black;
                border-radius: 20px;
                padding: 5px;
            }

        }
    </style>
</head>

<body>
    <?php
    $allDataAvailable = true;

    try {
        // Connect to the database
        $db = new PDO(
            'mysql:host=localhost;dbname=imdb_movies',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        // Prepare and execute the query
        $stmt = $db->prepare("SELECT title, release_date, plot, note, actors, poster_url, my_note, comment FROM movie_table");
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
    <div class='movies-div'>
        <?php
        if (isset($_GET['url'])) {
            $input = $_GET['url'];
            $url = "https://www.imdb.com/find/?q=" . urlencode($input) . "&ref_=nv_sr_sm";

            // html content of the search
            $html = file_get_contents($url);
            if ($html === false) {
                echo "Error fetching HTML content";
                exit;
            }

            // regex search for the title
            $getTitle = '/<a class="ipc-metadata-list-summary-item__t.*?>(.*?)<\/a>/';
            preg_match_all($getTitle, $html, $titles);

            // regex search for the year
            $getYear = '/<span class="ipc-metadata-list-summary-item__li" aria-disabled="false">(\d{4}).*?<\/span>/';
            preg_match_all($getYear, $html, $years);

            // regex search for the poster
            $getPoster = '/<img alt=".*?" .*? src="(.*?)"/';
            preg_match_all($getPoster, $html, $poster);

            // regex search for the poster
            $getActors = '/<ul .*? ipc-metadata-list-summary-item__stl base".*?><li .*?>.*?>(.*?)<\/li>/';
            preg_match_all($getActors, $html, $actors);

            // regex search for the link of the movie
            $getHref = '/<a class="ipc-metadata-list-summary-item__t.*?href="(.*?)".*?>.*?<\/a>/';
            preg_match_all($getHref, $html, $hrefs);


            if (!empty($titles[1]) && !empty($years[1]) && !empty($poster[1]) && !empty($actors[1])) {
                $titleOfMovies = array_slice($titles[1], 0, 5);
                $yearOfMovies = array_slice($years[1], 0, 5);
                $posterOfMovies = array_slice($poster[1], 0, 5);
                $actorsOfMovies = array_slice($actors[1], 0, 5);
                $hrefOfMovies = array_slice($hrefs[1], 0, 5); // Fixed variable name
                foreach ($titleOfMovies as $index => $titleOfMovie) {
                    $yearOfMovie = isset($yearOfMovies[$index]) ? $yearOfMovies[$index] : "Year not found";
                    $posterOfMovie = isset($posterOfMovies[$index]) ? $posterOfMovies[$index] : "poster not found";
                    $actorsOfMovie = isset($actorsOfMovies[$index]) ? $actorsOfMovies[$index] : "actors not found";
                    $hrefOfMovie = isset($hrefOfMovies[$index]) ? $hrefOfMovies[$index] : "#";

                    // Check if the movie exists in the database
                    $stmt = $db->prepare("SELECT title, release_date FROM movie_table WHERE title = :title AND release_date = :release_date");
                    $stmt->bindParam(':title', $titleOfMovie);
                    $stmt->bindParam(':release_date', $yearOfMovie);
                    $stmt->execute();
                    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo "<div class='movie-container'>
                    <div class='movie-details'>
                        <img src='$posterOfMovie' alt='Movie Poster'>
                        <div>
                            <h1><a href='movie_details.php?title=" . urlencode($titleOfMovie) . "&href=$hrefOfMovie'>$titleOfMovie</a></h1>
                            <div class='year-and-star'>
                            <p>Year: $yearOfMovie</p>";
                    // If the movie exists in the database, echo 'the star'
                    if ($movie) {
                        echo '<img src="./images/star-svgrepo-com.svg" alt="" class="star-image">';
                    }
                    echo "</div>
                            <p>Main Actors : $actorsOfMovie</p>
                        </div>
                    </div>
                </div>";
                }
            } else {
                echo "<h1>No title found</h1>";
                $allDataAvailable = false;
            }
        }
        ?>
    </div>
</body>

</html>