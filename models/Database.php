<?php

/**
 * Singleton database connection
 */
class ConnectDb
{
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "trim_salon";

    /**
     * Construct database connection
     */
    protected function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};
        dbname={$this->dbname}", $this->user, $this->pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    /**
     * if connection established, use established connection, else make connection
     *
     * @return ConnectDb
     */
    public static function getInstance(): ConnectDb
    {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }
        return self::$instance;
    }

    /**
     * return connection
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->conn;
    }
}
