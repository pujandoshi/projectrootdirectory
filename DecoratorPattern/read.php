<?php

/*
 * Example of Decorator Pattern in PHP
 *
*/

class ReadStr {
    protected $str;
    
    function __construct($str) {
        $this->str = $str;
    }

    function display() {
        return $this->str;
    }
}

class StrDecorator extends ReadStr {
    protected $str;
    protected $readStr;

    function __construct(ReadStr $readStr) {
        $this->readStr = $readStr;
        $this->str = $this->readStr->display();
    }

    function display() {
        return $this->str;
    }
}

class StrToUpperDecorator extends StrDecorator {
    private $strDecorator;

    function __construct(StrDecorator $strDecorator) {
        $this->strDecorator = $strDecorator;
        $this->stringToUpper();
    }

    function stringToUpper() {
        $this->strDecorator->str = strtoupper($this->strDecorator->str);
    }

}

class StrReverseDecorator extends StrDecorator {
    private $strDecorator;

    function __construct(StrDecorator $strDecorator) {
        $this->strDecorator = $strDecorator;
        $this->stringReverse();
    }

    function stringReverse() {
        $this->strDecorator->str = strrev($this->strDecorator->str);
    }
}

$readStr = new ReadStr('Decorator Pattern!');
$decorator = new StrDecorator($readStr);
echo $decorator->display() . "n";
span>$strToUpper = new StrToUpperDecorator($decorator);
echo $decorator->display() . "n";
$strReverse = new StrReverseDecorator($decorator);
echo $decorator->display();


