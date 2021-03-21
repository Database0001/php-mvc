<?php

namespace abstracts;

use PDO;

abstract class Model
{
    public $table;
    public $db;
    public $sql;

    public function __construct($db, $table)
    {
        $this->table = $table;
        $this->db = $db->db;
    }

    public function get()
    {
        return $this->db->query("SELECT * FROM " . $this->table)->fetchAll(PDO::FETCH_ASSOC);
    }
}
