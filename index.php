<?php

$uri = explode('index.php/', $_SERVER['REQUEST_URI']);
$uri = explode('/', $uri[1]);

$class = ucfirst($uri[0]);
$method = @lcfirst($uri[1]);

if(@!$uri[1]){
    include_once('View/'.lcfirst($class).'.php');
    die;
}

include ("Controller/Manager.php");

$param = $_POST;
$instance_class = new $class($param);
$response = $instance_class->$method($param);
echo json_encode($response);
