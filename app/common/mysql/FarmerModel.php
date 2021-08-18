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

class FarmerModel extends BaseModel
{

    use JumpReturn;
    use SoftDelete;

    protected $defaultSoftDelete = 0;
    protected $table = '5fkj_farmer';



    public function getPageList(array $param=[])
    {


        $where = [];
        if (!empty($param['type_id']) && (int)$param['type_id']!=0) {
            $where[] = ['type_id', '=', $param['type_id']];
        }    /*土地类型*/
        if (!empty($param['service_id']) && (int)$param['service_id']!=0) {
            $where[] = ['service_id', '=', $param['service_id']];
        }

        try {
            $data = $this::with([
                'FarmerType'  => function($query){$query->field('id,title');},
                'ServiceType' => function($query){$query->field('id,title');}])
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
     * @Describe:农机类型
     * @return \think\model\relation\HasOne
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/08 23:11
     */
    public function FarmerType()
    {
        return $this->hasOne(FarmerTypeModel::class,'id','type_id');
    }

    /**
     * @Describe:农机服务类型
     * @return \think\model\relation\HasOne
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/08 23:11
     */
    public function ServiceType()
    {
        return $this->hasOne(FarmerServiceTypeModel::class,'id','service_id');
    }
}