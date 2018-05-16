<?php
include_once( "Database.php" );
include_once("Drink.php");
include_once("Payment.php");

class Order extends Database
{
    public $drink;
    public $payment;
    public function __construct()
    {
        parent::__construct();
        $this->drink = new Drink();
        $this->payment = new Payment();
    }
    public function insertDbOrder($argumentsDB)
    {
        // cria order
        $client_id = $argumentsDB["client_id"];
        $status = $argumentsDB["status"];
        $value = $argumentsDB["value"];
        $delivery_id = $argumentsDB["deliveryman"];

        $query = "INSERT INTO `Order` (`id_Client`, `status`, `value`, `id_Delivery`) VALUES ('{$client_id}', '{$status}', '{$value}', '{$delivery_id}')";
        $result = $this->connection->query($query);

        $order_id = $this->connection->insert_id;

        if ($result == false) {
            echo 'Error: cannot execute the command'.$query;
            return false;
        }
        // fim
        foreach ($argumentsDB["items"] as $item) {
            $resultItem = $this->insertDbItemsOrder($item, $order_id);
            var_dump($resultItem);
            if (!$resultItem) {
                return $resultItem;
            }
        }

        $argumentsDB["id_order"] = $order_id;
        // $result = $this->insertDbOrderDelivery($argumentsDB);
        // if($result){
        $result = $this->payment->insertDbPayment($argumentsDB);
        // }


        $this->connection->close();
        return $result;
    }

    public function insertDbItemsOrder($item, $order_id)
    {
        $type = $item["type"];
        $id = $item["id"];
        $amount = $item["amount"];

        $amountStock = "";
        if ($type == "drink") {
            $type = "drinks";
            $amountStock = $this->drink->getAmount($id);
            $amountStock = $amountStock[0]["amount_stock"];
            if($amount > $amountStock){
                return false;
            }else{
                $amountStock = $amountStock- $amount;
                $result = $this->drink->updateStock($id,$amountStock);
                if(!$result){
                    return false;
                }
            }
        }

        $query = "INSERT INTO `Itens_order` (`id_".$type."` ,`id_order`, `amount`) VALUES ('{$id}', '{$order_id}', '{$amount}')";
        $result = $this->connection->query($query);
        if($result == false){
            echo 'Error: cannot execute the command'.$query;
            return false;
        }

        return true;
    }

    public function insertDbOrderDelivery($argumentsDB)
    {
        $order_id = $argumentsDB["id_Order"];
        $delivery_id = $argumentsDB["delivery_id"];

        $query = "INSERT INTO `Order/Delivery` (`id_Order`, `id_Delivery`) VALUES ('{$order_id}', '{$delivery_id}')";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }
        return $result;
    }

    public function getDbOrdersAll()
    {
        $query = '
            SELECT ord.id as order_id, ord.status, coalesce(drin.name,pz.name,mea.name,dess.name) as item,
            cli.name as client, del.name as deliveryman, iord.amount, coalesce(drin.price,pz.price,mea.price,dess.price) as price,
            cli.phoneNumber as phone, DATE_FORMAT(ord.date_hour, "%d/%m/%Y %H:%i") as date_hour
            FROM `Order` as ord
            LEFT JOIN Itens_order as iord
            ON ord.id = iord.id_order
            LEFT JOIN Client as cli
            ON cli.id = ord.id_Client
            LEFT JOIN Delivery as del
            ON del.id = ord.id_Delivery
            LEFT JOIN Drinks as drin
            ON drin.id = iord.id_drinks
            LEFT JOIN Pizzas as pz
            ON pz.id = iord.id_pizza
            LEFT JOIN Meals as mea
            ON mea.id = iord.id_meal
            LEFT JOIN Desserts as dess
            ON dess.id = iord.id_Dessert
            ORDER BY ord.status ASC
        ';
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            if($row['item'] == null){
                continue;
            }
            $rows[$row['order_id']]['client'] = $row['client'];
            $rows[$row['order_id']]['deliveryman'] = $row['deliveryman'];
            $rows[$row['order_id']]['status'] = $row['status'];
            $rows[$row['order_id']]['phone'] = $row['phone'];
            $rows[$row['order_id']]['date_hour'] = $row['date_hour'];
            $rows[$row['order_id']]['items'][] = $row;
        }

        $this->connection->close();
        return $rows;
    }

    public function getDbOrdersFinish($status)
    {
        $query = "SELECT * FROM Order WHERE status='{$status}'";
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        $this->connection->close();
        return $rows;
    }

    public function getItemSales()
    {
        $query = "
            SELECT coalesce(drin.name,pz.name,mea.name,dess.name) as product, COUNT(iord.id) as total
            FROM Itens_order as iord
            LEFT JOIN Drinks as drin
            ON drin.id = iord.id_drinks
            LEFT JOIN Pizzas as pz
            ON pz.id = iord.id_pizza
            LEFT JOIN Meals as mea
            ON mea.id = iord.id_meal
            LEFT JOIN Desserts as dess
            ON dess.id = iord.id_dessert
            GROUP BY product
            ORDER BY total DESC
        ";
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        $this->connection->close();
        return $rows;

    }

    public function getDbItemsOrder($order_id)
    {
        $query = "SELECT * FROM Itens_order WHERE id_order='{$order_id}'";
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        $this->connection->close();
        return $rows;
    }

    public function updateStatus($arguments)
    {
        $id = $arguments["id"];
        $status = $arguments["status_code"];

        $query = "UPDATE `Order` SET `status` = '$status' WHERE `Order`.`id` = $id";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }
}
