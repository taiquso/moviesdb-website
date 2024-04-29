# MoviesDB Website

MoviesDB Website is a PHP-based web application that allows users to view movie details from IMDb and add them to a database.

## Introduction

MoviesDB Website fetches movie details from IMDb and allows users to add them to a database. Users can view movie posters, titles, release years, ratings, plots, and cast details. Additionally, users can add their own ratings and comments to each movie and save them to a database for future reference.

## Features

- Fetch movie details from IMDb
- View movie posters, titles, release years, ratings, plots, and cast details
- Add personal ratings and comments for each movie
- Save movie details along with personal ratings and comments to a database
- Responsive design

## Installation

To run the MoviesDB Website on your local machine, follow these steps:

1. Clone the repository to your local machine:

   ```bash
   git clone git@github.com:taiquso/moviesdb-website.git
   ```

2. Navigate to the `htdocs` directory in your XAMPP installation:

   ```bash
   cd /path/to/xampp/htdocs/
   ```

3. Move the cloned `moviesdb-website` directory into the `htdocs` directory.

4. Start XAMPP and ensure that the Apache and MySQL servers are running.

5. Open phpMyAdmin by clicking on "Admin" for the MySQL server in the XAMPP control panel.

6. Create a new database named `imdb_movies`.

7. In the `imdb_movies` database, import the `movie_table.sql` file located in the `sql` directory of the cloned repository.

## Usage

1. Open your web browser and enter the following URL: http://localhost/moviesdb-website/index.php

2. Browse through the movies, view details, and add your personal ratings and comments.
