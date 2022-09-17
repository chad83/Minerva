<?php

class Database
{


    public function connect()
    {
        $mysqli = new mysqli("host.docker.internal:3306", "root", "secret", "minerva");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
          }

        return $mysqli;
    }
}