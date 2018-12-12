<?php
require_once 'RayBooks.php'; //getBooks
require_once 'JettBooks.php'; //getBookNames
require_once 'SojBooks.php';

class SoJLibrary
{
    public $swiftBookNames;
    public $kotlinBookNames;
    public $phpBookNames;

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

        $this->swiftBookNames = array_merge($swift->getBookNames(), $swift_Jett->getBookNames(), $swift_Ray->getBooks());
        $this->kotlinBookNames = array_merge($kotlin->getBookNames(), $kotlin_Jett->getBookNames(), $kotlin_Ray->getBooks());
        $this->phpBookNames = array_merge($php->getBookNames(), $php_Jett->getBookNames(), $php_Ray->getBooks());
       
        $this->bookNames = array_merge($this->swiftBookNames, $this->kotlinBookNames, $this->phpBookNames);
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
                if (isset($result))
                {
	                print_r($result);
                } else {

                }
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
echo '<pre>';
$library->searchTool('Name', 'swift');
echo '</pre>';
