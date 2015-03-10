<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/06
 * Time: 18:36
 */
interface ICar{
    public function start();
    public function stop();
}

class DefaultCar implements ICar {
    function start() {
        echo "Car is running";
    }

    function stop() {
        echo "Car is stopping";
    }
}
