<?php


class Contract extends Model
{
    protected $table = "contract";
    protected $process_id = "";

    
    public function __construct()
    {

        parent::__construct();

    }

    public function current()
    {
        $sql = "select id, node_name from process_node where id = '" .$this->process_node_id."'";

        $result = $this->db->query($sql);

        if ($result)
        {
           
           $dataset = $result->fetch_assoc();
           
            return $dataset;
        }else{
            die ($this->db->error .": ". $sql);
        }


    }

    public function nodes()
    {
        
        $sql = "select * from process_node where process_id = '". $this->process_id. "' order by node_seq";
        $result = $this->db->query($sql);
        $dataset = array();

        if ($result)
        {
            while ($row=$result->fetch_assoc())
            {
                $dataset[] = $row;
            }
            return $dataset;
        }else{
            die ($this->db->error .": ". $sql);
        }
    }

    public function next()
    {
        $nodes = $this->nodes();
        $current = $this->current();
       
        if ($current == NULL) return $nodes[0];
        
        else {
            $index = 0;
            
            foreach($nodes as $k=>$node)
            {   
                
                if ($node['id'] == $current['id'])
                {
                    $index = $k+1;
                }
            }
            
            return $nodes[$index];
        }
        
    }

    public function setProcessId($process_id)
    {
        $this->process_id = $process_id;
    }

    public function approver($process_node_id)
    {
        $sql = "select * from process_node where id = '". (int)$process_node_id ."'";

        $result = $this->db->query($sql);
        $dataset = array();
        if (!$result)
        {
            while ($row=$result->fetch_assoc())
            {
                $dataset[] = $row;
            }
            return in_array($dataset[0]['role'], explode($_SESSION['roles']));
        }
        else{
            die ($this->db->error .": ". $sql);
        }
    }
    public function pass()
    {
        $next_nodes = $this->next();


        $this->process_node_id = $next_nodes['id'];

        $this->save();
    }

    public function reject()
    {
        $this->process_node_id = 1;
        $this->save();
    }

}
