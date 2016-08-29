<?php

class Sql {
    private $servername = "localhost";
    private $username = "root";
    private $password = "essayleap2016";
    private $conn = null;

    function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
}