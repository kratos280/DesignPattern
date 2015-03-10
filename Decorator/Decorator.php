<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/06
 * Time: 17:20
 */

class Book {
    private $author;
    private $title;

    function __construct($author, $title) {
        $this->author = $author;
        $this->title = $title;
    }

    function getAuthor() {
        return $this->author;
    }

    function getTitle() {
        return $this->title;
    }

    function getAuthorAndTitle() {
        return $this->author .' by ' . $this->title;
    }

}

class BookTitleDecorator {
    protected $book;
    protected $title;

    public function __construct(Book $book) {
        $this->book = $book;
        $this->resetTitle();
    }

    function resetTitle() {
        $this->title = $this->book->getTitle();
    }

    function showTitle() {
        return $this->title;
    }
}

class BookTitleExclaimDecorator extends BookTitleDecorator {
    private $btd;
    public function __construct(BookTitleDecorator $btd) {
        $this->btd = $btd;
    }

    function exclaimTitle() {
        $this->btd->title = "!" . $this->btd->title .'!';
    }
}


class BookTitleStarDecorator extends BookTitleDecorator {
    private $btd;
    public function __construct(BookTitleDecorator $btd) {
        $this->btd = $btd;
    }

    function starTitle() {
        $this->btd->title = str_replace(" ", "*", $this->btd->title);
    }
}

echo 'Begin Testing Decorator Pattern'.PHP_EOL;

$patternBook = new Book('Tran Ngoc Cuong', 'Design Patterns');

$decorator = new BookTitleDecorator($patternBook);
$starDecorator = new BookTitleStarDecorator($decorator);
$exclaimDecorator = new BookTitleExclaimDecorator($decorator);

echo 'showing title:'.PHP_EOL;
echo $decorator->showTitle().PHP_EOL;
echo PHP_EOL;


echo 'showing title after twice exclaims added:'.PHP_EOL;
echo $exclaimDecorator->exclaimTitle();
echo $exclaimDecorator->exclaimTitle();
echo $decorator->showTitle().PHP_EOL;
echo PHP_EOL;

echo 'showing title after start exclaims added:'.PHP_EOL;
echo $starDecorator->starTitle();
echo $decorator->showTitle().PHP_EOL;
echo PHP_EOL;

echo 'showing title after reset:'.PHP_EOL;
echo $decorator->resetTitle();
echo $decorator->showTitle().PHP_EOL;
echo PHP_EOL;


