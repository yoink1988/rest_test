<?php

//echo 'car';
include_once '../index.php';
class Car extends RestServer
{
    public function getCar($param=null)
    {
        echo '<pre>';
       // echo var_dump($param);
        echo var_dump($this->test);
      echo var_dump($this->responseType);
    }
    
    public function postCar($param=null)
    {
 //   echo '<pre>';
        echo var_dump($param);
    }

    public function putCar($param)
    {
        echo var_dump($param);
    }
    
    public function deleteCar($param=null)
    {
        echo 'deleteCar';
    }
}

$c = new Car;
$c->start();
