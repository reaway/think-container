# think-container

## 安装
```bash
composer require reaway/think-container
```

## 特性
* 支持PSR-11规范
* 支持依赖注入
* 支持容器对象绑定
* 支持闭包绑定
* 支持接口绑定

## 用法
```php
use Think\Component\Container\Container;

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// 获取容器实例
$container = Container::getInstance();
// 绑定一个类、闭包、实例、接口实现到容器
$container->bind('cache', '\app\common\Cache');
// 判断是否存在对象实例
$container->has('cache');
// 从容器中获取对象的唯一实例
$container->get('cache');
// 从容器中获取对象，没有则自动实例化
$container->make('cache');
// 删除容器中的对象实例
$container->delete('cache');
// 执行某个方法或者闭包 支持依赖注入
$container->invoke($callable, $vars);
// 执行某个类的实例化 支持依赖注入
$container->invokeClass($class, $vars);
```

对象化操作
```php
use Think\Component\Container\Container;

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// 获取容器实例
$container = Container::getInstance();
// 绑定一个类、闭包、实例、接口实现到容器
$container->cache = '\app\common\Cache';
// 判断是否存在对象实例
isset($container->cache);
// 从容器中获取对象的唯一实例
$container->cache;
// 删除容器中的对象实例
unset($container->cache);
```