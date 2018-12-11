<?php
class SoJSwiftBooks
{
    public $type = 'Swift';
    public $names = ['s-firstBook', 's-secondBook', 's-thirdBook', 's-fourthBook'];

    public function getBookNames()
    {
        return $this->names;
    }

    public function getType()
    {
        return $this->type;
    }
}

class SoJKotlinBooks
{
    public $type = 'Kotlin';
    public $names = ['k-firstBook', 'k-secondBook', 'k-thirdBook', 'k-fourthBook'];

    public function getBookNames()
    {
        return $this->names;
    }

    public function getType()
    {
        return $this->type;
    }
}

class SoJPHPBooks
{
    public $type = 'PHP';
    public $names = ['p-firstBook', 'p-secondBook', 'p-thirdBook', 'p-fourthBook'];

    public function getBookNames()
    {
        return $this->names;
    }

    public function getType()
    {
        return $this->type;
    }
}