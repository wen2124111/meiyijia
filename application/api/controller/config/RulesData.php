<?php

namespace app\api\controller\config;
/**
 * Reules
 * @param $model  模块名称 Reules
 * 验证
 */

class RulesData
{
  public  $rules = array(
    'User' => array(
      'login' => array(
        'user_name' => ['require', 'chsDash', 'max' => 20],
        'user_pwd' => 'require|length:32'
      ),
      'index' => array(
        'kk' => ['require', 'max' => 3],
      ),
      'signup' => array(
        'user_name' => ['require'],
      ),
    ),
    'Code' => array(
      'get_code' => array(
        'username' => ['require'],
      ),

    ),
    'V1.Cart' => array(
      'cart_create' => array(
        'user_id' => ['require', 'number', 'length' => 16],
        'goods_id' => ['require', 'number', 'length' => 18],
        'product_id' => ['require', 'number', 'max' => 10],
        'goods_name' => ['require'],
        'goods_number' => ['require', 'number'],
        'spec_key_name' => ['require'],
        'cart_price' => ['require', 'float'],
        'ratio' => ['require', 'number'],
      ),
      'cart_list' => array(
        'user_id' => ['require', 'number', 'length' => 16],
        'num' => 'number',
        'page' => 'number',
      ),
      'cart_update' => array(
        'cart_id' =>  ['require', 'number'],
        'type' => ['require', 'number', 'length' => 1, 'between' => '1,2'],

      ),
      'cart_delete' => array(
        'user_id' => ['require', 'number', 'length' => 16],
        'cart_id' =>  ['require'],
        

      ),

    ),

  );
 
}
