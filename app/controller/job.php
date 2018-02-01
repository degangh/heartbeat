<?php
namespace app\controller;

use app\model\Car;
class job{
    public function index(){
        echo "jobs";

        $c = new Car();

        var_dump($c);
    }
}