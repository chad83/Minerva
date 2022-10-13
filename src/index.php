<?php

require('classes/Locations.php');
require('classes/Books.php');

/**
 * This is a debug variable, call it passing any kind of variable in it to see it in a
 * clearer design.
 */
function debug(mixed $variable): void
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
}


// $locations = new Locations();
// debug($locations->getAllLocations());
// debug($locations->getLocationsByCountryCode('FR'));

// var_dump($locations->getAllLocations());

?>

<html>
    <head></head>

    <body>

        <div class="browse-locations">
            <a href="locations.php">Checkout all our locations</a>
            <a href="locations.php?countryCode=FR">Checkout all our locations in France</a>
        </div>
        <div class="browse-locations">
            <a href="books.php">Checkout all our books</a>
            <a href="books.php?isbn=9653212345328">Chadi's Book</a>
        </div>

    </body>
</html>