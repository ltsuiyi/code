<?php


namespace app\api\controller;


use app\common\mysql\FarmerModel;
use app\common\mysql\FarmerServiceTypeModel;
use app\common\mysql\FarmerTypeModel;

class Farmer extends Base
{

    public function getList(FarmerModel $model)
    {

        $data = $this->request->param();                    /*获取搜索数据*/

        return $model->getPageList($data);
    }

    public function getPageList(FarmerTypeModel $model)
    {
       return $model->getPageList();
    }

    public function LatinList(FarmerServiceTypeModel $model)
    {
        return $model->getPageList();
    }


}