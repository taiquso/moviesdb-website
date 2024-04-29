<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - Look4Movies</title>
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
    <section class="searchbar d-flex flex-column align-items-center justify-content-center" style="height:90vh;">
        <h1 class="mb-5">Search for a movie</h1>
        <div class="navbar bg-body-tertiary" style='width:50%;'>
            <form style='width:100%;' action="movie.php" method="get">
                <div class="input-group" style="height:65px; width:100%">
                    <input type="text" class="form-control" name="url" placeholder="Enter a movie name" aria-label="movie_name" aria-describedby="basic-addon1">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </section>

</body>

</html>