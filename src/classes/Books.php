<?php

require_once('tools/Database.php');

class Books 
{
    private mysqli $dbConnection;
    
    public function __construct()
    {
        $db = new Database();
        $this->dbConnection = $db->connect();
    }

    public function getAllBooks(): array
    {
        $queryObject = $this->dbConnection->query('SELECT * FROM books');
        
        return $queryObject->fetch_all(MYSQLI_ASSOC);
    }

}