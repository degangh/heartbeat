<?php
class model{
    public $query = "";
    public $table_name = "";
    public $where;
    public $orderBy;

    public function table($table){
        $this->query = "select * from " . $table . " ";

        return $this;
    }

    public function where($field, $operand, $value){
        $this->where .= "where " . $field . " ". $operand . " '". $value. "'";

        return $this;   
    }

    public function orderBy($field, $option){
        $this->orderBy .= " order by " . $field . " " . $option;
        return $this;
    }

    public function getAll(){

    }

    public function chunk(){

    }

    public function getOne($id){

    }

    public function softDelete(){

    }

    public function save(){

    }

}

$m = new Model();

$m->table("tasks")->where("date", ">=", time())->orderBy;

echo $m->query;