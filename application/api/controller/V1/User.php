<?php

namespace app\api\controller;

class User extends Common
{
    public function index()
    {
        echo 111;
        $data = $this->params;
        dump($data);
    }
    /**
     * 登陆接口
     * @param 
     * @return 
     * @throws ReflectionException
     * 格式：   /**
     * @name 
     */
    public function login()
    {
        $data = $this->params;
        echo "登陆接口";
        dump($data);
    }

    /**
     * 注册接口
     * @param 
     * @return 
     * @throws ReflectionException
     * 格式：   /**
     * @name 
     */
    public function signup()
    {
        $data = $this->params;
        echo "注册接口";
        dump($data);
    }
}
