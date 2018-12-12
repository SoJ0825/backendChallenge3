<?php 
interface Agency
{
	public function observe($menu);
	public function recive();
}

class Hospistal implements Agency
{
	private $menu;

	public function observe($menu)
	{
		$this->menu = $menu;
	}

	public function recive()
	{
		echo "Hospistal recived $this->menu .</br>";
	}
}

class FireStation implements Agency
{
	private $menu;

	public function observe($menu)
	{
		$this->menu = $menu;
	}
	
	public function recive()
	{
		echo "FireStation recived $this->menu .</br>";
	}
}

class School implements Agency
{
	private $menu;

	public function observe($menu)
	{
		$this->menu = $menu;
	}
	
	public function recive()
	{
		echo "School recived $this->menu .</br>";
	}
}

class DonStudio implements Agency
{
	private $menu;

	public function observe($menu)
	{
		$this->menu = $menu;
	}
	
	public function recive()
	{
		echo "DonStudio recived $this->menu .</br>";
	}
}

class Bakery
{
	private $menu;	

	public function create($menu)
	{
		$this->menu = $menu;
	}

	public function notify($agecy)
	{
		// $hospistal = new Hospistal;
		// $fireStation = new FireStation;
		// $school = new School;
		// $donstudio = new donstudio;

		// $hospistal->observe($this->menu);
		// $fireStation->observe($this->menu);
		// $school->observe($this->menu);
		// $donstudio->observe($this->menu);
		$agecy->observe($this->menu);
		
		

		// $hospistal->recive();
		// $fireStation->recive();
		// $school->recive();
		// $donstudio->recive();
		$agecy->recive();
	}
}

// class SojCity
// {
// 	public $bakery = new Bakery;

// 	public $hospistal = new Hospistal;
// 	public $fireStation = new FireStation;
// 	public $school = new School;

// 	$bakery->menu;


// }

$angecyResource = ['Hospistal', 'FireStation', 'School', 'DonStudio'];

$bakery = new Bakery;
$bakery->create('chicken');
echo 'Bakery send the menu. </br>';
echo '---------------------</br>';
foreach ($angecyResource as $agecy) {
	$bakery->notify(new $agecy);
}

 ?>
