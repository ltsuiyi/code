<?php
/**
 * Created by LandModel
 * User: tao <375419582@qq.com>
 * DateTime: 2021/8/5 20:58
 * Description:
 */


namespace app\common\mysql;


use app\common\traits\JumpReturn;
use think\model\concern\SoftDelete;

class AdminModel extends BaseModel
{

    use JumpReturn;
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;
    protected $table = '5fkj_admin';
    /**
     * @Describe:土地类型
     * @return \think\model\relation\HasOne
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/06 14:45
     */
    public function LandType()
    {
        return $this->hasOne(LandTypeModel::class,'id','type_id');
    }

    /**
     * @Describe:土地流转类型
     * @return \think\model\relation\HasOne
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/06 14:45
     */
    public function LatinType()
    {
        return $this->hasOne(LatinTypeModel::class,'id','lation_id');
    }
}