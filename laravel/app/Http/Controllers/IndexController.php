<?php

namespace App\Http\Controllers;

//use Illuminate\Http;
//use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public $e_put = ['code'=>404,'info'=>'Error'];
    public function index() {
        $data = ['code'=>200,'data'=>['name'=>'张三','age'=>35]];
        echo json_encode($data);
    }

    /*测数数据跑通*/
    public function get_data() {
        $back = Input::get('data_back');
//        $back = $_GET['back'];
//        if(!$back){
//            echo json_encode($this->e_put);exit;
//        }
        $data = [['title'=>'买车票','start'=>'2017,10,6'],['title'=>'买菜','start'=>'2017,10,8']];
        echo $back.'('.json_encode($data).')';
    }

    /*获取日程数据*/
    public function get_info() {
        $back = Input::get('data_back');
        if(!$back) {
            echo json_encode($this->e_put);exit;
        }
        $res = DB::table('dateinfo')->get()->toarray();
        echo $back.'('.json_encode($res).')';
//        print_r($res);

    }
}