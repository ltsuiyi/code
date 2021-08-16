<?php


namespace app\api\controller;


use app\BaseController;
use think\facade\Db;

class Land extends BaseController
{

    public function getList()
    {
       $data =  Db::name('5fkj_land')->select()->toArray();

        dd($data);
    }
}