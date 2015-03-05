<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/01/08
 * Time: 12:39
 */
/**
 * Assume have the hundreds of Product
 * Product construct can be modify
 */

abstract class Product {
    protected $type=null;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    private $name;
    private $cost;

}
// There are hundereds product type
class Product_Chair extends Product {
    protected $type = 'chair';
}

class Product_Table extends Product {
    protected $type = 'table';
}

class Product_Computer extends Product {
    protected $type = 'computer';
}

class ProductFactory {
    public static function build($type, $name, $cost)
    {
        $className = "Product_".$type;
        $instance = new $className($name, $cost);
        return $instance;
    }
}

echo "Factory Method pattern: ".PHP_EOL;
$chair = ProductFactory::build('Chair', 'X001', '$9999');
print($chair->getName());
echo PHP_EOL;
print($chair->getCost());
echo PHP_EOL;



