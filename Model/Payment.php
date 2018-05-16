<?php
include_once( "Database.php" );

class Payment extends Database
{

    public function initDB()
    {
        parent::__construct();
    }

    public function insertDbPayment($argumentsDB)
    {
        #1 true | 0 false
        $id_order = $argumentsDB["id_order"];
        $type = $argumentsDB["payment_type"];
        var_dump($argumentsDB);
        $id = 1;
        if($type == "bank_check"){
            $id = $this->insertDbBank_check($argumentsDB["check_params"]);
        }

        $value =$argumentsDB["value"];

        $query = "INSERT INTO `Payment_form` (`$type`, `id_order`) VALUES ('{$id}', '{$id_order}' )";

        $result = $this->connection->query($query);

        if ($result == false) {
            echo 'Error: cannot execute the command'.$query;
            return false;
        }

        $this->connection->close();
        return $result;
    }

    public function insertDbBank_check($argumentsDB)
    {
        #1 true | 0 false
        $number = $argumentsDB["number"];
        $agency = $argumentsDB["agency"];
        $account = $argumentsDB["account"];
        $bank = $argumentsDB["bank"];

        var_dump($argumentsDB);
        $query = "INSERT INTO `Bank_check` (`number`, `agency`,`account`, `bank`) VALUES ('{$number}', '{$agency}', '{$account}', '{$bank}')";
        $result = $this->connection->query($query);
        $bank_check_id = $this->connection->insert_id;

        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        }

        return $bank_check_id;
    }

    public function getDbPaymentAll()
    {
        $query = "SELECT * FROM Payment_form";
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
