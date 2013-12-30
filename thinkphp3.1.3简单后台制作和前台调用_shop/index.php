<?php

  define('APP_NAME', 'shop');
  define('APP_PATH', './shop/');
  define('RUNTIME_PATH', APP_PATH . 'Runtime/');
  define('APP_DEBUG', true);
  include './ThinkPHP3.1.3/ThinkPHP.php';

/*
//反射的简单使用
class Person {

	public $name = "xiaoming";

	public function say() {
		echo "I am " . $this->name;
	}
	
	public function run($addr,$age) {
		echo "I am " . $this->name.' 我今年:'.$age;
		echo '<br /> 我在 '.$addr;
	}	

}

$pre = new Person();
//利用反射实现对象调用方法
//反射方法对象
$md = new ReflectionMethod('Person', 'say');
//让指定的对象调用这个方法
$md->invoke($pre);

//通过反射执行带参数的方法
$mda = new ReflectionMethod('Person', 'run');
$mda->invokeArgs($pre, array('北京',23));
*/




