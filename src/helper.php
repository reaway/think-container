<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2021 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
declare (strict_types=1);

use Think\Component\Container\Container;

if (!function_exists('container')) {
    /**
     * 快速获取容器中的实例 支持依赖注入
     * @template T
     * @param string|class-string<T> $name        类名或标识 默认获取当前应用实例
     * @param array                  $args        参数
     * @param bool                   $newInstance 是否每次创建新的实例
     * @return T|object|Container
     */
    function container(string $name = '', array $args = [], bool $newInstance = false)
    {
        return $name ? Container::getInstance()->make($name, $args, $newInstance) : Container::getInstance();
    }
}

if (!function_exists('bind')) {
    /**
     * 绑定一个类到容器
     * @param string|array $abstract 类标识、接口（支持批量绑定）
     * @param mixed $concrete 要绑定的类、闭包或者实例
     * @return Container
     */
    function bind($abstract, $concrete = null)
    {
        return Container::getInstance()->bind($abstract, $concrete);
    }
}

if (!function_exists('invoke')) {
    /**
     * 调用反射实例化对象或者执行方法 支持依赖注入
     * @param mixed $call 类名或者callable
     * @param array $args 参数
     * @return mixed
     */
    function invoke($call, array $args = [])
    {
        if (is_callable($call)) {
            return Container::getInstance()->invoke($call, $args);
        }

        return Container::getInstance()->invokeClass($call, $args);
    }
}
