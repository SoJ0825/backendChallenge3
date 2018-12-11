<?php
require_once 'RayBooks.php'; //getBooks
require_once 'JettBooks.php'; //getBookNames
require_once 'SojBooks.php';

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

        $swift_Jett = new JettSwiftBooks;
        $kotlin_Jett = new JettKotlinBooks;
        $php_Jett = new JettPHPBooks;

        $swift_Ray = new RaySwift;
        $kotlin_Ray = new RayKotlin;
        $php_Ray = new RayPHP;

        $this->swiftBookNames = $swift->getBookNames();
        $this->swiftBookType = $swift->getType();
        $this->kotlinBookNames = $kotlin->getBookNames();
        $this->kotlinBookType = $kotlin->getType();
        $this->phpBookNames = $php->getBookNames();
        $this->phpBookType = $php->getType();
        // var_dump($this->swiftBookType);
        array_push($this->bookTypes, $this->swiftBookType, $this->kotlinBookType, $this->phpBookType);

        //database from SojBooks
        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $this->swiftBookNames);

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $this->kotlinBookNames);

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $this->phpBookNames);

        //database from JettBooks
        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $swift_Jett->getBookNames());

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $kotlin_Jett->getBookNames());

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $php_Jett->getBookNames());

        //database from RayBooks
        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $swift_Ray->getBooks());

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $kotlin_Ray->getBooks());

        array_map(function ($book) {
            array_push($this->bookNames, $book);
        }, $php_Ray->getBooks());

        $this->swiftBookNames = array_merge($swift->getBookNames(), $swift_Jett->getBookNames(), $swift_Ray->getBooks());
        $this->kotlinBookNames = array_merge($kotlin->getBookNames(), $kotlin_Jett->getBookNames(), $kotlin_Ray->getBooks());
        $this->phpBookNames = array_merge($php->getBookNames(), $php_Jett->getBookNames(), $php_Ray->getBooks());
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
$library->searchTool('Category', 'Swift');
