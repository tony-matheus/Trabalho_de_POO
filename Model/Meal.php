<?php
include_once( "ItemMenu.php" );

class Meal extends ItemMenu
{

    public function __construct()
    {
        $this->initDB();
    }

    public function insertDbMeal($argumentsDB)
    {
        $name = $argumentsDB["name"];
        $price = $argumentsDB["price"];

        $ingredients = $argumentsDB["ingredients"];
        $query = "INSERT INTO `Meals` (`name`, `price`) VALUES ('{$name}', '{$price}')";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            foreach ($this->$ingredients as $ingredient){
                $query = "INSERT INTO `ingredients` (`name`, `id_meal`) VALUES ('{$ingredient}')";
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

    public function getDbMealAll()
    {
        $query = "SELECT * FROM Meals";
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
