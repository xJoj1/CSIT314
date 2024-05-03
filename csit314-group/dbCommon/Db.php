<?php
//this class is used to connecting database


require_once APP_ROOT . '/dbCommon/Config.php';


class Db
{
    public $db = null;

    public function __construct()
    {
        //use mysqli to connect database
        $this->db = new mysqli(config::DB_HOST , config::DB_USERNAME , config::DB_PASSWORD , config::DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo '<p>Error: Could not connect to database.<br/>Please try again later.</p>';
            exit;
        }
        return $this->db;
    }


    //handle
    public function queryAll($query = '')
    {
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            return [];
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //
    public function exec($query = '')
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

}