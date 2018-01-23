<?php
namespace \Core;
class Model{
   
    public $query = null;
    
    public function __construct(){
        $this->query = new QueryBuilder();
    }
    
    public function __call($method, $params){
        $this->query->$method(...$params);

        return $this;
    }

}




