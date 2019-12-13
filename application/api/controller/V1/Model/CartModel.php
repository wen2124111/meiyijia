<?php

namespace app\api\controller\v1\model;

use app\api\controller\config\Common;
use think\db;


class CartModel extends Common
{
    protected  $_tableName = "cart"; //表

    /**
     * 更新购物车商品数量
     * @param  $id 购物车唯一标识
     * @param  $goods_number 购物车数量
     * @return 
     * @throws ReflectionException
     * 格式：   /**
     * @name 
     */
    public function number_update($where, $goods_number)
    {
        /*********** 接收参数  ***********/
        $data['goods_number'] = $goods_number;
        $data['updated_at'] = time();

        $info = db($this->_tableName)->where($where)->update($data);
        if ($info) {
            $this->return_msg(200, '更新购物车成功!', $info);
        } else {
            $this->return_msg(400, '更新购物车失败!');
        }
    }


    /**
     * 查询购物车的商品
     * @param $user_id 用户唯一标识
     * @param $product_id SKU唯一标识
     * @return 
     * @throws ReflectionException
     * 格式：   /**
     * @name 
     */
    public function cart_details($where)
    {

        $info  = db($this->_tableName)->where($where)->find();
        //   dump( Db::getLastSql());
        return  $info;
    }
}
