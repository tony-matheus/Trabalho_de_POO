<?php
include_once( "ItemMenu.php" );

class Pizza extends ItemMenu
{

    public function __construct()
    {
        $this->initDB();
    }

    public function insertDbPizza($argumentsDB)
    {
        $name = $argumentsDB["name"];
        $price = $argumentsDB["price"];
        $size = $argumentsDB["size"];

        $ingredients = $argumentsDB["ingredients"];
        $query = "INSERT INTO `Pizzas` (`name`, `price`, `size`) VALUES ('{$name}', '{$price}', '{$size}')";
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

    public function getDbPizzaAll()
    {
        $query = "SELECT * FROM `Pizzas`";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }

        $this->connection->close();
        return $rows;
    }
}
