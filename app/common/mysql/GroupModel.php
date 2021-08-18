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

class GroupModel extends BaseModel
{

    use JumpReturn;
    protected $autoWriteTimestamp = true;
    protected $table = 'auth_group';

    /**
     * @Describe:添加编辑操作
     * @param $data
     * @return \think\Response
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/05 22:36
     */
    public function doAllData($data){
        try {
            if (isset($data['id'])){
                $result= self::update($data);
            }else{
                $result= self::create($data);
            }
            if ($result){
                return self::JsonReturn("更新添加成功");
            }else{
                return self::JsonReturn("更新添加失败",0);
            }
        }catch (\Exception $e){
            return self::JsonReturn($e->getMessage(),0);
        }
    }

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
        $data = $this->select()->toArray();
        return self::Success($data);
    }

    public function sort($data,$pid=0,$level=0)
    {


        static $arr = array();
        foreach ($data as $key=>$value){
            if ($value['pid'] == $pid){
                $value["level"] = $level;
                $arr[] = $value;
                $this->sort($data,$value['id'],$level+1);
            }
        }
        return $arr;
    }

    public function tree($data)
    {


        foreach ($data as $key=>$item){
            if ($item['level']==0){
                $data[$key]['title_show'] ='';
            }
            if ($item['level']==1){
                $data[$key]['title_show'] ="　╠";
            }
            if ($item['level']==2){
                $data[$key]['title_show'] ="　　╠═";
            }
            if ($item['level']==3){
                $data[$key]['title_show'] ="　　　　╠═";
            }

        }

        return $data;
    }


    /**
     * @Describe:单条和批量删除
     * @param $ids
     * @return \think\Response
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/05 22:37
     */
    public function del($ids){
        try {
            if (is_array($ids)){
                $id=$ids;
            }else{
                $id=@explode(",",$ids);
            }
            $result = self::where('id', 'in',$id)->delete();
            if ($result) {
                return self::JsonReturn("删除成功",'204');
            } else {
                return self::JsonReturn("删除失败",0);
            }
        } catch (\Exception $exception) {
            return self::JsonReturn($exception->getMessage(),0);
        }
    }


    public static function infiniteTree($data,$pid,$id){


        if (!is_array($data) || empty($data) ) return false;
        foreach ($data as $key=>$item){
            $data[$key]['spread'] = true;
            $data[$key]['field']= 'rule[]';
            if ($id ==0){
                $data[$key]['checked']= false;
            }

        }
        $tree = array();
        foreach ($data as $k => $v) {
            // 找出所有的儿子
            if ($v['pid'] == $pid) {
                // 将儿子数据赋值给sub键，递归看看儿子还有没有孙子
                $v['children'] = self::infiniteTree($data,$v['id'],$id);
                $tree[] = $v;
                // 删除遍历过的数组数据
                unset($data[$k]);
            }
        }
        return $tree;
    }


}