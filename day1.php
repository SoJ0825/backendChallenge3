<?php 
interface Product
{
	public function calculatePrice();
}

class SmallProduct implements Product
{
	private $piece;
	private $cookie_price=10;
	private $package_price=10;

	function __construct($piece)
	{
		$this->piece = $piece;	
	}
	public function calculatePrice()
	{
		return $this->piece * $this->cookie_price + $this->package_price;
	}
}

class BigProduct implements Product
{
	private $piece;
	private $cookie_price=10;
	private $package_price=20;

	function __construct($piece)
	{
		$this->piece = $piece;	
	}
	public function calculatePrice()
	{
		return $this->piece * $this->cookie_price + $this->package_price;
	}
}

class LargeProduct implements Product
{
	private $piece;
	private $cookie_price = 10;
	private $package_price = 30;

	function __construct($piece)
	{
		$this->piece = $piece;	
	}
	public function calculatePrice()
	{
		return $this->piece * $this->cookie_price + $this->package_price;
	}
}

class CookieFactory
{
	private $orders;
	private $products = [];
	private $total_price = [];

	public function __construct($orders)
	{
		$this->orders = $orders;
		$this->selectPackage();
	}

	public function selectPackage()
	{
		foreach ($this->orders as $order)
		{
			if ($order < 6 && $order > 0)
			{
				array_push($this->products, new SmallProduct($order));
				continue;
			}
			if ($order < 11)
			{
				array_push($this->products, new BigProduct($order));
				continue;
			}
			if ($order < 16) {
				array_push($this->products, new LargeProduct($order));
				continue;
			}
		}
	}

	public function getTotalPrice()
	{
		foreach ($this->products as $product) {
			array_push($this->total_price, $product->calculatePrice());
		}
		echo implode(',', $this->total_price);
	}
}
$orders = [1,3,7,12];
$factory = new CookieFactory($orders);
$factory->getTotalPrice();

// interface, implode
// class SmallProduct
// {
// 	public $unit_price = 10;
// 	public $package_price = 10;
// }

// class BigProduct
// {
// 	public $unit_price = 10;
// 	public $package_price = 20;
// }

// class LargeProduct
// {
// 	public $unit_price = 10;
// 	public $package_price = 30;
// }

// class Store
// {
// 	protected $package;

// 	public function selectPackage($pic)
// 	{
// 		if ($pic < 6 && $pic > 0)
// 		{
// 			$this->package = new SmallProduct;
// 			return;
// 		}
// 		if ($pic < 11)
// 		{
// 			$this->package = new BigProduct;
// 			return;
// 		}
// 		if ($pic < 16)
// 		{
// 			$this->package = new LargeProduct;
// 			return;
// 		}
// 	}


// 	function calculatePrice($pic)
// 	{
// 		$this->selectPackage($pic);
// 		echo $this->package->unit_price * $pic + $this->package->package_price.' , ';
// 	}
// }

// $store = new Store;
// foreach ($orders as $order) {
// 	$store->calculatePrice($order);
// };

// array_map(function($order)
// {
// 	$store = new Store;
// 	$store->calculatePrice($order);
// }, $orders)

?>