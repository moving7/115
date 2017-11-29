<?php

namespace App\Http\Controllers;


class Data
{
    public function index()
    {
        $result = ['code'=>200,'msg'=>array('Laravel',1,56465)];
        $data = $_GET['laravel'];
        echo $data.'('.json_encode($result).')';
    }
}