<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of Index
 *
 * @author Johnson
 */
class Index extends Controller{
    //put your code here
    public function index()
    {
        $result = ['code'=>200,'msg'=>array('Laravel',1,56465)];
        $data = $_GET['laravel'];
        echo $data.'('.json_encode($result).')';
    }
}
