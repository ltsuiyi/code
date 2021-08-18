<?php
/**
 * Created by LatinTypeModel
 * User: tao <375419582@qq.com>
 * DateTime: 2021/8/5 18:49
 * Description:
 */


namespace app\common\mysql;


use app\common\traits\JumpReturn;

class LatinTypeModel extends BaseModel
{
    use JumpReturn;
    protected $autoWriteTimestamp = true;
    protected $table = '5fkj_land_lationtype';



    /**
     * @return \think\Response
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/05 17:38
     * @Describe:获取土地分类数据
     */
    public function getList()
    {
        $data = $this->where('status',1)->select()->toArray();
        return self::Success($data);
    }

}