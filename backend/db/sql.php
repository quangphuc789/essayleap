<?php

class Sql {
    private $servername = "localhost";
    private $username = "root";
    private $password = "essayleap2016";
    private $conn = null;
    private $dbname = "essayleap";

    function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    /**
     * Prototype for querying
     * @param  [type] $sql [description]
     * @return [type]      [description]
     */
    public function query($sql) {
        $result = [];
        $obj = $this->conn->query($sql);
        if ($obj->num_rows > 0) {
            // output data of each row
            while ($row = $obj->fetch_assoc()) {
                $result[] = $row;
            }
        }

        return $result;
    }
}