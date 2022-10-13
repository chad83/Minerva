<?php

abstract class AbstractLibrary
{
//I have been doing some reading and I think I understand the concept but i'm not quite there yet.
//I was going back and forth on whether or not the database connection should be in the abstract class 
//or not. I think it makes sense that we have it here. but that raises some questions that we can discuss
//in the meeting.
    protected mysqli $dbConnection;
    public function __construct()
        {
        $db = new Database();
        $this->dbConnection = $db->connect();
    }
    public function getAll(string $tablename): array
    {
        $queryObject = $this->dbConnection->query('SELECT * FROM $tablename');
        
        return $queryObject->fetch_all(MYSQLI_ASSOC);
    }
    
   
}