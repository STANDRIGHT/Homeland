<?php
class Database extends PDO
{
    private $host = "localhost";

    /**
     * @return string[]
     */
    protected function DB(): array
    {
        if (strtolower($_SERVER['SERVER_NAME']) == 'localhost') {
            return array(
                "user" => "root",
                "pass" => "",
                "dbname" => "homeland"
            );
        } else {
            
            return array(
                "user" => "root",
                "pass" => "",
                "dbname" => "homeland"
            );
        }
    }

    public function __construct()
    {
        try {
            parent::__construct("mysql:host=" . $this->host . ";dbname=" . $this->DB()['dbname'], $this->DB()['user'], $this->DB()['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "Oops, connection lost, please retry again!";
        }
    }
}
?>
