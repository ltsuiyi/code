<?php
/**
 * Created by LandTypeModel
 * User: tao <375419582@qq.com>
 * DateTime: 2021/8/4 17:03
 * Description:
 */


namespace app\common\mysql;


use app\common\traits\JumpReturn;
use think\Model;

class LandTypeModel extends BaseModel
{

    use JumpReturn;
    protected $table = '5fkj_land_type';


    /**
     * @return \think\Response
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getPageList()
    {
        $data = $this->where('status',1)->select()->toArray();
        return self::Success($data);
    }

}