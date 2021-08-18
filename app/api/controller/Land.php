<?php


namespace app\api\controller;


use app\common\mysql\LandModel;
use app\common\mysql\LandTypeModel;
use app\common\mysql\LatinTypeModel;

class Land extends Base
{

    public function getList(LandModel $model)
    {
        $data = $this->request->param();                    /*获取搜索数据*/

        return $model->getPageList($data);
    }

    public function getPageList(LandTypeModel $model)
    {
       return $model->getPageList();
    }

    public function LatinList(LatinTypeModel $model)
    {
        return $model->getList();
    }

}