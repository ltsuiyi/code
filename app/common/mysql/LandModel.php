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
use think\Exception;
class LandModel extends BaseModel
{

    use JumpReturn;
    use SoftDelete;
    protected $defaultSoftDelete = 0;
    protected $table = '5fkj_land';




    public function getPageList(array $param=[])
    {

        $where = [];
        if (!empty($param['type_id']) && (int)$param['type_id']!=0) {
            $where[] = ['type_id', '=', $param['type_id']];
        }    /*土地类型*/
        if (!empty($param['lation_id']) && (int)$param['lation_id']!=0) {
            $where[] = ['lation_id', '=', $param['lation_id']];
        }

        try {
            $data = $this::with([
                    'LandType'  => function($query){$query->field('id,title');},
                    'LatinType' => function($query){$query->field('id,title');}])
                ->where($where)
                ->order('id desc')
                ->where('status',1)
                ->where('type',4)
                ->select()
                ->toArray();
            if (!empty($data)){
                foreach ($data as $key=>$value){
                    $data[$key]['picture'] =explodeArr($value['picture']);
                }
            }
            return self::Success($data);
        }catch (Exception $exception){
            return self::Success([],'0',$exception->getMessage(),'0');  /*抛出异常*/
        }
    }



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