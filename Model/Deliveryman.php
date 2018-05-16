<?php
include_once("Database.php");

class Deliveryman extends database
{
    public $address;
    public function __construct()
    {
        parent::__construct();
    }

    public function insertDbDelivery($argumentsDB)
    {
        $name = $argumentsDB["name"];
        $board_numer = $argumentsDB["board_number"];

        $query = "INSERT INTO `Delivery` (`name`, `board_numer`) VALUES ('{$name}', '{$board_numer}')";
        $result = $this->connection->query($query);

        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }
        $this->connection->close();
        return $result;
    }

    public function getDbDeliveryAll()
    {
        $query = "
            SELECT del.*, SUM(COALESCE(drin.price,pz.price,mea.price,dess.price)) as total,
            ROUND(SUM(COALESCE(drin.price,pz.price,mea.price,dess.price)) * 0.05, 2) as percent
            FROM Delivery as del
            LEFT JOIN `Order` as ord
            ON ord.id_Delivery = del.id
            LEFT JOIN Itens_order as iord
            ON iord.id_order = ord.id
            LEFT JOIN Drinks as drin
            ON drin.id = iord.id_drinks
            LEFT JOIN Pizzas as pz
            ON pz.id = iord.id_pizza
            LEFT JOIN Meals as mea
            ON mea.id = iord.id_meal
            LEFT JOIN Desserts as dess
            ON dess.id = iord.id_Dessert
            GROUP BY del.id
        ";
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
