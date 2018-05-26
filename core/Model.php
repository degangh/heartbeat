<?php
namespace core;

use core\db;

abstract class Model
{
    
    protected $pk = "id";
    protected $fields;
    protected $table;
    protected $db;
    public function __construct()
    {
        if (!$this->table) 
        
        $this->table= camelCaseToUnderscore(get_class($this));
        
        $this->db = db::connect();
        
        $this->fields();
        
    }
    //save record to db
    public function save($record=null)
    {
        $pk = $this->pk;
        $sql = "";
        $dataSet = array();
        foreach ($this->fields as $field) 
        {
            if (isset($this->$field)) if($field != $this->pk) $dataSet[] = $field . " = '" . $this->$field. "'"; 
        }
        $sql  = implode ($dataSet, ", ");
        if (!isset($this->$pk))
        {
            $sql = "insert into " .$this->table . " set " . $sql;
        }
        else {
            $sql = "update " .$this->table ." set ". $sql . " where id = '" . $this->id . "'";
        }
       
        $this->db->query($sql); 
        
        if (!isset($this->$pk)) $this->$pk = $this->db->insert_id;
        
        var_dump($this->db->error . $sql);
    }
    //find record by id
    public function findOne($id = null)
    {
        $sql = "select * from " . $this->table . " where id = '" . $id . "'";
        $dataSet = $this->db->query($sql)->fetch_assoc();
        
        foreach ($dataSet as $property => $value) $this->$property = $value;
    }
    //list all record
    public function all($start = 0, $size = 45)
    {
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {        
        if (in_array($name, $this->fields)) $this->$name = $value;
    }
    public function data()
    {
        return get_object_vars($this);
    }
    public function fields()
    {
        
        $sql = "select * from " . $this->table ;
        echo $sql;
        $tableFields = $this->db->query($sql)->fetch_fields();
        foreach ($tableFields as $field) $fields[] = $field->name;
        
        $this->fields = $fields;
    }
    
}
function camelCaseToUnderscore($input)
{
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
}



