<?php
require('classes/Books.php');

$books = new Books();

$booksList = [];

if (!isset($_GET['isbn'])) {
    $booksList = $books->getAllBooks();
} else {
    $booksList = $books->getBooksByIsbn($_GET['isbn']); 
}
?>


<html>
    <head>
    <link rel="stylesheet" href="resources/style.css">
    </head>
    <body>
        <div class="locations-list">
            <div class="location-header">
                <div class="header-element">ISBN</div>
                <div class="header-element">Author</div>
                <div class="header-element">Title</div>
                <div class="header-element">Genre</div>
            </div>
            <?php
            foreach($booksList as $book) {
            ?>
                <div class="location-row">
                    <div class="location-item"><?= $book['isbn'] ?></div>
                    <div class="location-item"><?= $book['author'] ?></div>
                    <div class="location-item"><?= $book['title'] ?></div>
                    <div class="location-item"><?= $book['genre'] ?></div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>