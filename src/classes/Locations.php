<?php

// The "require" keyword includes the file in its argument with this one. In this case, we are
// requiring the file (that also has the class) Database.php because we will be using methods
// declared in it.

require_once('tools/Database.php');

class Locations
{
    // Any variables declared outside a method in a class are available throughout the class using
    // the syntax $this->variable (ie: $this->dbconnection).
    // "private" means it's only accessible inside this class. Similarly, "protected" means it's only
    // accessible in this class and any class that extends this class while "public" means it can be
    // called from any class after this class is instantiated.

    private mysqli $dbConnection;

    // A constructor is a class method that automatically runs when the class is instantiated and
    // it runs before any other methods in that class. You don't need to call it manually. In this
    // case, we're using it to instantiate a db-connection object and persist it throughout the class
    // so that we don't need to redo a db connect in every method that needs it. (this class will
    // need a lot of db interaction).

    public function __construct()
    {
        $db = new Database();
        $this->dbConnection = $db->connect();
    }

    /**
     * Gets all locations.
     * 
     * @return array
     */
    public function getAllLocations(): array
    {
        $queryObject = $this->dbConnection->query('SELECT * FROM LOCATIONS');
        
        // MYSQLI_ASSOC creates an associative array as the result. An associative array is like the
        // one we worked on before where the key is a description of the content ie: ['name' => 'Van Dam']
        // the 'name' is the key here instead of the default '0' which makes this an associative array.
        // The result in this case will be the name of the db column as the key to the value, for instance
        // ['id' => 1, 'name' => 'My Favorite Library', ...]

        return $queryObject->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Gets all locations in a specific country code.
     * 
     * @return array
     */
    public function getLocationsByCountryCode(string $countryCode): array
    {
        // This is an example of a prepared statement. Instead of passing $countryCode directly to the
        // db, we pass it through a prepared statement. This is to avoid allowing users to inject
        // malicious data and execute it. Any data that could potentially be filled by a user should
        // always be passed through a prepared statement.

        $query = $this->dbConnection->prepare('SELECT * FROM LOCATIONS WHERE country_code = ?');
        $query->bind_param('s', $countryCode);
        $query->execute();
        $result = $query->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}