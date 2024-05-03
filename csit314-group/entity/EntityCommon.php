<?php
//This the general link class that connect to database,
// then all other entity classes only have to extend this class

require_once APP_ROOT . '/dbCommon/Db.php';

class EntityCommon
{
    //use protected, so every child class can access db
    protected $db = null;

    public function __construct() {
        $this->db = new Db();
    }

}