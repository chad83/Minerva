<?php

require_once('tools/Database.php');
require_once("classes/Abstract.php");

class Books extends AbstractLibrary
{
    private mysqli $dbConnection;
    
    public function __construct()
    {
        $db = new Database();
        $this->dbConnection = $db->connect();
    }
 
     // I think table name should be assigned a value here. like $tablename = books or something.
     // but I keep getting an error message. okay and it's past midnight an i'm sleepy. ZzzZZZz
    public function getAll($tablename): array
    {

    }

    public function getBooksByIsbn(string $isbn): array
    {

        $query = $this->dbConnection->prepare('SELECT * FROM books WHERE isbn = ?');
        $query->bind_param('s', $isbn);
        $query->execute();
        $result = $query->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
