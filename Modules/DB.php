<?php

namespace Modules;

use PDO;

class DB
{
    public $db;

    public function __construct($dbname = null, $host = "localhost", $user = "root", $password = null)
    {
        $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    }
}
