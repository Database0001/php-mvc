<?php

namespace abstracts;

use PDO;

abstract class Model
{
    public $table;
    public $db;

    public function __construct($db, $table)
    {
        $this->table = $table;
        $this->db = $db->db;
    }

    public function get($fileds = "*")
    {
        return $this->db->query("SELECT $fileds FROM $this->table")->fetchAll(PDO::FETCH_ASSOC);
    }

}
