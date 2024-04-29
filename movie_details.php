<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details - Look4Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <style>
        .content {
            margin: 0 20% 0 20%;
            padding-top: 15px;

            img {
                border-radius: 13px;
            }

            input {
                border-radius: 10px;
            }

            .btn {
                border-radius: 10px;
            }

            p#wordCount {
                margin: 0;
            }
        }

        .disabled {
            opacity: 0.5;

            &:hover {
                cursor: not-allowed;
            }
        }

        .vertical-textarea {
            width: 300px;
            height: 150px;
            resize: none;
            overflow: hidden;
            border-radius: 10px;
        }
    </style>
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
    <div class='d-flex flex-column align-items-center justify-content-center content'>
        <?php
        $allDataAvailable = true; // Initialize $allDataAvailable

        //getting the url page of the specific clicked movie from imdb
        $href = $_GET['href'];

        //changing the url to get html content
        if (!empty($href)) {
            $url = "https://www.imdb.com" . $href;
            $html = file_get_contents($url);
        } else {
            echo "No URL found";
        }

        //regex for the poster
        $getPoster = '/<img\s+alt="[^"]+"\s+class="ipc-image"\s+loading="eager"\s+src="([^"]+)"\s+srcSet="[^"]+"\s+sizes="[^"]+"\s+width="190"/';
        preg_match_all($getPoster, $html, $poster);

        // Check for poster
        if (!empty($poster[1])) {
            $posterimg = $poster[1][0];
            echo "<img src='$posterimg' style='height:420px;''>";
        } else {
            echo "<h1>No poster found</h1>";
            $allDataAvailable = false;
        }

        $getTitle = '/<span class="hero__primary-text" .*?>(.*?)<\/span>/';
        preg_match_all($getTitle, $html, $title);

        // Check for title
        if (!empty($title[1])) {
            $title = $title[1][0];
            echo "<h1>$title</h1>";
        } else {
            echo "<h1>No title found</h1>";
            $allDataAvailable = false;
        }

        //regex for the year
        $getYear = '/<a class="ipc-link ipc-link--baseAlt ipc-link--inherit-color" role="button" tabindex="0" aria-disabled="false" href=".*?">(\d{4})/';
        preg_match_all($getYear, $html, $year);

        // Check for year
        if (!empty($year[1])) {
            $yearText = $year[1][0];
            echo "<p>$yearText</p>";
        } else {
            echo "<h1>No year found</h1>";
            $allDataAvailable = false;
        }

        //regex for the note
        $getNote = '/<div data-testid="hero-rating-bar__aggregate-rating__score".*?><span.*?>(.*?)<\/span><span>\/.*?<\/span><\/div>/';
        preg_match_all($getNote, $html, $note);

        // Check for note
        if (!empty($note[1])) {
            $noteText = $note[1][0];
            echo "<p>$noteText</p>";
        } else {
            echo "<h1>No note found</h1>";
            $allDataAvailable = false;
        }

        //regex for the plot 
        $getPlot = '/<p data-testid="plot".*?><span .*?">(.*?)<\/span/';
        preg_match_all($getPlot, $html, $plot);

        // Check for plot
        if (!empty($plot[1])) {
            $plotText = $plot[1][0];
            echo "<p class='text-center'>$plotText</p>";
        } else {
            echo "<h1>No plot found</h1>";
            $allDataAvailable = false;
        }

        //regex for the actors
        $getActors = '/<a data-testid="title-cast-item__actor".*?>(.*?)<\/a>/';
        preg_match_all($getActors, $html, $actors);

        // Check for actors
        if (!empty($actors[1])) {
            $actorsText = implode(", ", $actors[1]); // Concatenate all actors with a comma and space
            echo "<p class='text-center'>$actorsText</p>";
        } else {
            echo "<h1>No actor found</h1>";
            $allDataAvailable = false;
        }

        // If all data is available, display the form
        if ($allDataAvailable) {
            echo "<form action='add_to_database.php' method='post' class='d-flex flex-column' style='gap:15px'>
             <input type='hidden' name='title' value='$title'>
             <input type='hidden' name='poster' value='$posterimg'>
             <input type='hidden' name='year' value='$yearText'>
             <input type='hidden' name='note' value='$noteText'>
             <input type='hidden' name='plot' value='$plotText'>
             <input type='hidden' name='actors' value='$actorsText'>
             <input type='text' name='my_note' id='my_note' placeholder='Note /10'>
             <p id='wordCount'>0/<span id='maxWords'>15</span></p>
             <textarea class='vertical-textarea' name='comment' id='comment' placeholder='Comment'></textarea>
             <button type='submit' class='btn btn-primary mb-5 btn-db'>Add to database</button>
             </form>";
        } else {
            echo "<h1 class='text-danger'>Data missing</h1>";
            echo "<a href='index.php' class='btn btn-primary'>Return to Homepage</a>";
        }
        ?>
    </div>
    <script>
        const comment = document.querySelector('#comment');
        const wordCountDisplay = document.querySelector('#wordCount');
        const maxWords = document.querySelector('#maxWords');
        const dbBtn = document.querySelector('.btn-db');
        const rating = document.querySelector('#my_note');

        rating.addEventListener('input', function(event) {
            const number = parseInt(event.target.value);
            if (isNaN(number) || number < 0 || number > 10 || !Number.isInteger(number)) {
                dbBtn.classList.add('disabled');
            } else {
                dbBtn.classList.remove('disabled');
            }
        });

        comment.addEventListener('input', function(event) {
            const wordCount = event.target.value.split(/\s+/).filter(function(word) {
                return word.length > 0;
            }).length;
            wordCountDisplay.textContent = `${wordCount}/15`;
            if (wordCount > maxWords.innerHTML) {
                dbBtn.classList.add('disabled');
                event.preventDefault();
                wordCountDisplay.style.color = 'red';
            } else {
                dbBtn.classList.remove('disabled');
                wordCountDisplay.style.color = 'black';
            }
        });
    </script>
</body>

</html>