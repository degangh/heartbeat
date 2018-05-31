<?php
namespace app\controller;



class about {
    public function index(){
        echo "About me";

        $t = new \app\model\Task();

        $t->name = "test my mvc";

        $t->save();

    }
}