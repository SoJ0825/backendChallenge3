<?php

interface Book
{
    public function getBookNames();
    public function getType();
}

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

class SoJLibrary
{
    public $swiftBookNames;
    public $swiftBookType;
    public $kotlinBookNames;
    public $kotlinBookType;
    public $phpBookNames;
    public $phpBookType;

    public $bookTypes = [];
    public $bookNames = [];

    public function __construct()
    {
        $swift = new SoJSwiftBooks;
        $kotlin = new SoJKotlinBooks;
        $php = new SoJPHPBooks;
        $this->swiftBookNames = $swift->getBookNames();
        $this->swiftBookType = $swift->getType();
        $this->kotlinBookNames = $kotlin->getBookNames();
        $this->kotlinBookType = $kotlin->getType();
        $this->phpBookNames = $php->getBookNames();
        $this->phpBookType = $php->getType();
        // var_dump($this->swiftBookType);
        array_push($this->bookTypes, $this->swiftBookType, $this->kotlinBookType, $this->phpBookType);

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $this->swiftBookNames);

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $this->kotlinBookNames);

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $this->phpBookNames);
    }

    public function searchTool($filter, $keyword)
    {
        switch ($filter) {
            case 'Name':
            	$result = [];
            	foreach ($this->bookNames as $name) {
            		if (strpos($name, $keyword) !== false) {
            			array_push($result, $name);
                    }
            	}
            	print_r($result);

                break;
    
            case 'Category':
                switch ($keyword) {
                    case 'Swift':
                        print_r($this->swiftBookNames);
                        break;
                    case 'Kotlin':
                        print_r($this->kotlinBookNames);
                        break;
                    case 'PHP':
                        print_r($this->phpBookNames);
                        break;
                    default:
                    	echo 'The category is not exist.';
                }
                break;

            default:
            	echo 'The title is not exist.';
            	break;
        }
    }
}

$library = new SoJLibrary;
//category: Swift, Kotlin, PHP
$library->searchTool('Category', 'ir');
