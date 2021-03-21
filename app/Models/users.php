<?php

namespace App\Models;

use abstracts\Model;

class Users extends Model
{

    public $table = "users";
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
