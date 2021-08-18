<?php
/**
 * Created by JumpReturn
 * User: tao <375419582@qq.com>
 * DateTime: 2021/8/4 12:16
 * Description:
 */


namespace app\common\traits;


use think\Response;

trait JumpReturn
{

    /**
     * @param array $data
     * @param string $message
     * @param int $count
     * @param int $code
     * @param string $type
     * @param array $header
     * @return Response
     * @User:tao <375419582@qq.com>
     * @Time:2021/08/04 12:41
     * @Describe:
     */
    public function Success(array $data=[] , int $count=0,string $message = '请求成功',  int $code = 200, string $type = 'json',$header = []) :Response
    {
        $result = [
            'code' => $code,
            'msg' => $message,
            'time' => time(),
            'data' => $data,
            'count'=> $count
        ];
        return  Response::create($result,$type)->header($header);
    }

    public function JsonReturn(string $msg="",int $code=200, array $data=[],$type = 'json',$header = []) :Response
    {
        $result = [
            'code' => $code,
            'msg' => $msg,
            'time' => time(),
            'data' => $data
        ];
        return Response::create($result,$type)->header($header);
    }

}