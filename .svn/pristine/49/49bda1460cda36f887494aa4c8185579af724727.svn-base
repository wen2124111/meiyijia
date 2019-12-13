<?php

namespace app\api\controller\config;

use think\Request;
use think\Controller;
use think\Validate;
use app\api\controller\config\RulesData;

/**
 * Common
 * @param $model  模块名称 Common
 * 类的注释必须卸载定义Class 关键字的前面
 */

class Common extends Controller
{
  protected $request; //处理参数
  protected $validater; //验证请求参数
  protected $params = 0; //复核要求的参数
  //初始化
  protected function _initialize()
  {

    parent::_initialize();
    $this->request = Request::instance();
    // //验证时间戳
    // $this->check_time($this->request->only(['time']));
    // //验证token
    // $this->check_token($this->request->param());
    //验证参数
    $this->chec_params($this->request->except(['time', 'token']));
  }


  /**
   * 验证请求是否超时
   * @param [array] $arr  [包含时间戳的参数数组]
   * @return json  [检测结果]
   * @throws ReflectionException
   * 格式：   /**
   * @name 增加权限
   */

  public function check_time($arr)
  {

    if (!isset($arr['time']) || intval($arr['time'] <= 1)) {
      $this->return_msg(400, '时间戳错误!');
    }
    if (time() - intval($arr['time']) > 60) {
      $this->return_msg(400, '请求超时!');
    }
  }

  /**
   * 验证TOKEN
   * @param [array] $arr  [请求参数]
   * @return json  [检测结果]
   * @throws ReflectionException
   * 格式：   /**
   * @name 增加权限
   */
  public function check_token($arr)
  {
    if (!isset($arr['token']) || empty($arr['token'])) {
      $this->return_msg(400, 'token错误!');
    }
    $app_token = $arr['token']; //api请求的tokne
    unset($arr['token']);
    $service_token = '';

    foreach ($arr as $key => $value) {
      $service_token .= md5($value);
    }

    $service_token = md5('api_' . $service_token . '_api'); //服务器生成的token


    //token校验

    if ($app_token !== $service_token) {
      $this->return_msg(400, 'token值不正确!');
    }
  }

  /**
   * 验证请求参数
   * @param [array] $arr  [请求参数]
   * @return json  [检测结果]
   * @throws ReflectionException
   * 格式：   /**
   * @name 增加权限
   */
  public function chec_params($arr)
  {

    // echo $this->request->controller();
    // echo $this->request->action();
    // exit;

    $RulesData = new RulesData();
    $rule = $RulesData->rules[$this->request->controller()][$this->request->action()];

    //验证参数

    $this->validater = new Validate($rule);

    if (!$this->validater->check($arr)) {

      $this->return_msg(400, $this->validater->getError());
    }


    $this->params = $arr;
  }

  public function return_msg($code, $msg = '', $data = [])
  {
    //组合数据
    $return_data['code'] = $code;
    $return_data['msg'] = $msg;
    $return_data['data'] = $data;
    echo json_encode($return_data);
    die;
  }
}
