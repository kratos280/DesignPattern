<?php
class MyCloneable
{
    public $object1;
    public $object2;
    public $name;
    function __clone() {
        // Force a copy of this->object, otherwise it will point to same object.
        $this->object1 = clone $this->object1;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        echo $this->name;
    }
}

class SubObject
{
    static $instances = 0;
    public $instance;
    public function __construct() {
        $this->instance = ++self::$instances;
    }
    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

$obj = new MyCloneable();
$obj->setName('Obj 1');

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;
$obj2->setName('Obj 2');

print("Original Object:\n");
print_r($obj);

echo PHP_EOL;

print("Cloned Object:\n");
print_r($obj2);

?>
