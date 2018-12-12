<?php 
interface Agency
{
	public function observe($category, $menu);
	public function receive();
}

class Hospital implements Agency
{
	private $category;
	private $menu;

	public function observe($category, $menu)
	{
		$this->category = $category;
		$this->menu = $menu;
	}

	public function receive()
	{
		// static::class 可以取得自己的 class 名稱
		echo "Hospital recived today special $this->category $this->menu .</br>";
	}
}

class FireStation implements Agency
{
	private $category;
	private $menu;

	public function observe($category, $menu)
	{
		$this->category = $category;
		$this->menu = $menu;
	}
	
	public function receive()
	{
		echo "FireStation recived today special $this->category $this->menu .</br>";
	}
}

class School implements Agency
{
	private $category;
	private $menu;

	public function observe($category, $menu)
	{
		$this->category = $category;
		$this->menu = $menu;
	}
	
	public function receive()
	{
		echo "School recived today special $this->category $this->menu .</br>";
	}
}

class DonStudio implements Agency
{
	private $category;
	private $menu;

	public function observe($category, $menu)
	{
		$this->category = $category;
		$this->menu = $menu;
	}
	
	public function receive()
	{
		echo "DonStudio recived today special $this->category $this->menu .</br>";
	}
}

class Bakery
{
	private $category;
	private $menu;

	private $agencies = [];

	public function createMeal($category, $menu)
	{
		$this->menu = $menu;
		$this->category = $category;
		echo 'Bakery create meal </br>';
		echo '------------------------ </br>';
	}

	public function addObserver(Agency $agency)
	{
		array_push($this->agencies, $agency);
	}

	public function removeObserver(Agency $agency)
	{
		unset($this->agencies[array_search($agency, $this->agencies)]);
	}

	public function notify()
	{
		array_map(function($agency) {
			$agency->observe($this->category, $this->menu);
		}, $this->agencies);
	}
}

$bakery = new Bakery;
$agencyResource = ['Hospital', 'FireStation', 'School', 'DonStudio'];
$agencyObjects = [];
$menuLists = [
	'Fruit' => ['Apple', 'Banana', 'Lemon', 'Orange'],
	'Meat' => ['Beef', 'Pork', 'Chicken'],
	'Dessert' => ['Cake', 'Cheese', 'Ice Cream']
];
$category = array_rand($menuLists, 1);
$menu = $menuLists[$category][array_rand($menuLists[$category], 1)];

$bakery->createMeal($category, $menu);

foreach ($agencyResource as $agency) {
	$agencyObject = new $agency;
	$bakery->addObserver($agencyObject);
	array_push($agencyObjects, $agencyObject);
}
$bakery->notify();

$agencyObjects[0]->receive();
$agencyObjects[1]->receive();

 ?>
