<?php
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'blog_project');

class DatabaseConnection
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(
                DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE,
                DB_USER,
                DB_PASSWORD
            );
          
            //echo 'Connection successful';
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
          $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    
    public function prepare($query) {
        return $this->db->prepare($query);
    }

    public function lastInsertId(){
        return $this->db->lastInsertId();
    }
}
