<?php
include_once( "ItemMenu.php" );

class Dessert extends ItemMenu
{

    public function __construct()
    {
        $this->initDB();
    }

    public function insertDbDessert($argumentsDB)
    {
        $name = $argumentsDB["name"];
        $price = $argumentsDB["price"];

        $ingredients = $argumentsDB["ingredients"];
        $query = "INSERT INTO `Desserts` (`name`, `price`) VALUES ('{$name}', '{$price}')";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            foreach ($this->$ingredients as $ingredient){
                $query = "INSERT INTO `ingredients` (`name`) VALUES ('{$ingredient}')";
                $result = $this->connection->query($query);
                if ($result == false) {
                    echo 'Error: cannot execute the command';
                    return false;
                }
            }
        }

        $this->connection->close();
        return $result;
    }

    public function getDbDessertAll()
    {
        $query = "SELECT * FROM `Desserts`";
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
