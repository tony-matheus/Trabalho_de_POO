<?php
include_once("Model/Order.php");
include_once("Model/Pizza.php");
include_once("Model/Meal.php");
include_once("Model/Dessert.php");
include_once("Model/Drink.php");
include_once("Model/Payment.php");
include_once("Model/Client.php");
include_once("Model/Deliveryman.php");

class Manager
{
    public $order;
    public $pizza;
    public $meal;
    public $dessert;
    public $drink;
    public $payment;
    public $client;
    public $deliveryman;

    public function __construct()
    {
        $this->order = new Order();
        $this->pizza = new Pizza();
        $this->meal = new Meal();
        $this->dessert = new Dessert();
        $this->drink = new Drink();
        $this->payment = new Payment();
        $this->client = new Client();
        $this->deliveryman = new Deliveryman();
    }

    public function alterStatus($arguments)
    {
        $this->order->updateStatus($arguments);
        return $arguments;
    }

    public function getOrder()
    {
        $result = $this->order->getDbOrdersAll();
        return $result;
    }

    public function getOrderByStatus($arguments)
    {
        $status = $arguments["status"];
        $result = $this->order->getDbOrdersFinish($status);
        return $result;
    }

    public function getItemsOrder()
    {
        $result = $this->order->getItemSales();
        return $result;
    }

    public function createOrder($arguments)
    {
        // 0 = pending
        // 1 = finish
        // 2 = cancel
        // 3 = removed
        var_dump($arguments);
        $arguments = $arguments["data_insert_order"];
        $arguments["status"] = 0;
        $response = $this->order->insertDbOrder($arguments);
        return $response;
    }

    public function getClients()
    {
        $result = $this->client->getDbClientAll();

        return $result;
    }

    public function createClient($arguments)
    {
        $response = $this->client->insertDbClient($arguments);
        return json_encode($response);
    }

    public function getDeliverymans()
    {
        $result = $this->deliveryman->getDbDeliveryAll();
        return $result;
    }

    public function verifyDrinkStock($amount)
    {
        $response = $this->drink->checkStock($amount, $drink_id);
    }

    public function getAmountDrink()
    {
        $result = $this->drink->getAmount();
        return $result;
    }

    public function findPayment($arguments)
    {
        $responsePizza = $this->payment->getDbPaymentAll();

        return $responsePizza;
    }

    public function findPizza($arguments)
    {
        $responsePizza = $this->pizza->getDbPizzaAll();

        return $responsePizza;
    }

    public function findMeal($arguments)
    {
        $responseMeal = $this->meal->getDbMealAll();

        return $responseMeal;
    }

    public function findDessert($arguments)
    {
        $response = $this->dessert->getDbDessertAll();

        return $response;
    }

    public function findDrink($arguments)
    {
        $response = $this->drink->getDbDrinkAll();

        return $response;
    }
}
