<?php
include_once("Address.php");
include_once("Database.php");

class Client extends database
{
    public $address;
    public function __construct()
    {
        parent::__construct();
        $this->address = new Address();
    }

    public function insertDbClient($argumentsDB)
    {
        $name = $argumentsDB["client"]["name"];
        $phoneNumber = $argumentsDB["client"]["phone"];

        $query = "INSERT INTO `Client` (`name`, `phoneNumber`) VALUES ('{$name}', '{$phoneNumber}')";
        $result = $this->connection->query($query);
        $id_Client = $this->connection->insert_id;
        
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }
        $argumentsDB["client_id"] = $id_Client;
        $result = $this->address->insertDbAddress($argumentsDB);

        $this->connection->close();
        return $result;
    }

    public function getDbClientAll()
    {
        $query = "SELECT * FROM Client";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }

        return $rows;
    }

    public function getClientId($name){
        $query = "SELECT id FROM Client WHERE name='{$name}'";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }

        return $rows;
    }
}
