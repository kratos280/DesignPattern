<?php

/**
 * Class AbstractBook
 */
abstract class AbstractBook {
    public function getTitle()
    {
        return $this->title;
    }
    abstract function getInfo();
}

abstract class AbstractPhpBook extends AbstractBook {
    protected $title = "PHP";
}

abstract class AbstractMysqlBook extends AbstractBook {
    protected $title = "Mysql";
}

class EnglishPhpBook extends AbstractPhpBook {
    function getInfo()
    {
        echo "English: ".$this->getTitle();
    }
}


// Implements
class EnglishMysqlBook extends AbstractMysqlBook {
    function getInfo()
    {
        echo "English: ".$this->getTitle();
    }
}

class JapanesePhpBook extends AbstractPhpBook {
    function getInfo()
    {
        echo "Japanese: ".$this->getTitle();
    }
}

class JapaneseMysqlBook extends AbstractMysqlBook {
    function getInfo()
    {
        echo "Japanese: ".$this->getTitle();
    }
}

// Abstract Factory
abstract class AbstractFactory {
    abstract function createPhpBook();
    abstract function createMysqlBook();
}

class EnglishBookFactory extends AbstractFactory {
    function createPhpBook()
    {
        return new EnglishPhpBook();
    }

    function createMysqlBook()
    {
        return new EnglishMysqlBook();
    }
}

class JapaneseBookFactory extends AbstractFactory {
    function createPhpBook()
    {
        return new JapanesePhpBook();
    }

    function createMysqlBook()
    {
        return new JapaneseMysqlBook();
    }
}

$englishFactory = new EnglishBookFactory();
$englishPhp = $englishFactory->createPhpBook();
$englishPhp->getInfo();
echo PHP_EOL;

$japaneseFactory = new JapaneseBookFactory();
$japaneseMysql = $japaneseFactory->createMysqlBook();
$japaneseMysql->getInfo();
echo PHP_EOL;
