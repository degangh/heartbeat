<?php
namespace core;

class db {
    static public function connect()
    {
        return new \mysqli("localhost", "root", "", "tasks");
    }

}
