<?php
namespace app\controller;

use \app\model\Task;
use \core\Controller;
use StdClass;


class about extends Controller{
    public function index(){
        
        $log = "yes";
        return view("task/create", [
            "log" => $log,
            "customer" => "Degang",
            "obj" => new StdClass()
            ]);
        
    }
}

/* to move out later*/
function view($path, $data)
{
    if (!is_array($data)) exit;
    
    foreach ($data as $key => $value) $$key = $value;
    require_once dirname(__DIR__) . "/view/" . $path . ".view.php";
}