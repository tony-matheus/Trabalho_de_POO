<?php
include_once( "ItemMenu.php" );

class Drink extends ItemMenu
{

    public function __construct()
    {
        $this->initDB();
    }

    public function insertDbDrink($argumentsDB)
    {
        $name = $argumentsDB["name"];
        $price = $argumentsDB["price"];
        $amount = $arguments["amount"];

        $ingredients = $argumentsDB["ingredients"];
        $query = "INSERT INTO `Drinks` (`name`, `price`,`amount`) VALUES ('{$name}', '{$price}','{$amount}')";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }

        $this->connection->close();
        return $result;
    }

    public function getDbDrinkAll()
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

    public function checkStock($amount, $drink_id)
    {
        $query = "SELECT `amount_stock` FROM `Drinks` WHERE id = {$drink_id}";
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
        return false;
        // continuar a partir daqui
    }

    public function getAmount($drink_id)
    {
        $query = "SELECT `amount_stock` FROM `Drinks` WHERE id = {$drink_id}";
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
        // continuar a partir daqui
    }

    public function updateStock($drink_id, $newAmount)
    {

        $query = "UPDATE `Drinks` SET `amount_stock` = '$newAmount' WHERE `Drinks`.`id` = $drink_id";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }
}
