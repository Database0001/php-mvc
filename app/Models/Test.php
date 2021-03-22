<?php

namespace App\Models;

use abstracts\Model;

class Test extends Model
{

    public $table = "Test";
    public $db;

    public function __construct($db_index = 0)
    {
        global $db;
        $this->db = $db[$db_index];
        parent::__construct($this->db, $this->table);
    }


    public function getAll()
    {
        return $this->get();
    }

}
