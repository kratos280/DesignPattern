<?php

class StrategyContext
{

    private $strategy = NULL;

    public function __construct($strategyId)
    {
        switch ($strategyId) {
            case 'A':
                $this->strategy = new StrategyA();
                break;
            case 'B':
                $this->strategy = new StrategyB();
                break;
        }
    }

    public function showTitle($book)
    {
        return $this->strategy->showTitle($book);
    }
}


interface StrategyInterface {
    public function showTitle($book);
}


class StrategyA implements StrategyInterface
{
    public function showTitle($book)
    {
        echo "Strategy A: $book".PHP_EOL;
    }
}

class StrategyB implements StrategyInterface
{
    public function showTitle($book)
    {
        echo "Strategy B: $book".PHP_EOL;
    }
}

$book = "Design Pattern Book";

$strategyContextA = new StrategyContext('A');
$strategyContextA->showTitle($book);

$strategyContextB = new StrategyContext('B');
$strategyContextB->showTitle($book);
