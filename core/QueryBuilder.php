<?php
class QueryBuilder{
    public $query = "";
    public $tableName = "";
    public $select = "*";
    public $where;
    public $joins;
    public $orderBy;
    public $group;

    public $attributes = [];

    

    public function table($table){
        $this->tableName= $table;

        return $this;
    }
    public function select ($fields){
        $this->select = $fields;
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
        $this->query .= "select * from ". $this->tableName . $this->where . $this->orderBy;
        return $this;
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
        $this->query .= "select * from ". $this->tableName . " ".  $this->joins . " ". $this->where . " " . $this->orderBy;
        var_dump($this->query);
        return $this;
        
    }

    public function join($table, $leftField, $operand = "=", $rightField){
        $this->joins .= "join " . $table . " on " . $leftField . $operand . $rightField;
        return $this;
    }
}