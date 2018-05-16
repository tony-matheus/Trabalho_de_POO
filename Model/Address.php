<?php
include_once( "Database.php" );

class Address extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertDbAddress($argumentsDB)
    {
        $client_id = $argumentsDB["client_id"];
        $street = $argumentsDB["client_address"]["place"];
        $number = $argumentsDB["client_address"]["number"];
        $reference_point = $argumentsDB["client_address"]["reference_point"];

        $query = "INSERT INTO `Address` (`id_Client`, `street`,`number`, `reference_point`) VALUES ('{$client_id}', '{$street}','{$number}', '{$reference_point}')";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }

        $this->connection->close();
        return $result;
    }

    public function getDbAddressAll()
    {
        $query = "SELECT * FROM `Drinks`";
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
