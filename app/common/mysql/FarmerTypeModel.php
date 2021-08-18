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

class FarmerTypeModel extends BaseModel
{

    use JumpReturn;
    protected $autoWriteTimestamp = true;
    protected $table = '5fkj_farmer_type';



    /**
     * @return \think\Response
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/05 17:38
     * @Describe:获取土地分类数据
     */
    public function getPageList()
    {
        $data = $this->select()->toArray();
        return self::Success($data);
    }
}