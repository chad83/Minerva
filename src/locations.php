<?php
require('classes/Locations.php');

$locations = new Locations();

$locationsList = [];

if (!isset($_GET['countryCode'])) {
    $locationsList = $locations->getAllLocations();
} else {
    $locationsList = $locations->getLocationsByCountryCode($_GET['countryCode']);
}
?>


<html>
    <head>
    <link rel="stylesheet" href="resources/style.css">
    </head>
    <body>
        <div class="locations-list">
            <div class="location-header">
                <div class="header-element">Name</div>
                <div class="header-element">Address</div>
                <div class="header-element">Opening Hours</div>
                <div class="header-element">Accepts Cash</div>
            </div>
            <?php
            foreach($locationsList as $location) {
            ?>
                <div class="location-row">
                    <div class="location-item"><?= $location['name'] ?></div>
                    <div class="location-item"><?= $location['address'] . '<br>' . $location['city'] . ', ' . $location['country'] ?></div>
                    <div class="location-item"><?= $location['opens_at'] . ' - ' . $location['closes_at'] ?></div>
                    <div class="location-item"><?= $location['accepts_cash'] == 1 ? 'Yes' : 'No' ?></div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>