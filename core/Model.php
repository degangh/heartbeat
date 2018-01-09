<?php
class model{
    public $query = "";
    public $table_name = "";
    public $where;
    public $orderBy;
    public $group;

    public function table($table){
        $this->tableName= "select * from " . $table . " ";

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

    public function combineSql(){
        $this->query .= $where . $orderBy;
    }

    public function getAll(){

    }

    public function get(){
        $this->query .= $this->where . $this->orderBy;
    }

    public function chunk(){

    }

    public function getOne($id){

    }

    public function softDelete(){

    }

    public function save(){

    }

    public function toSql(){
        var_dump($this->query);
    }

}

//testing 

$m = new Model();

$m->table("tasks")->toSql();



