<?php
interface Observer {
    public function update($msg);
}

interface Subject {
    public function attach(Observer $subject);
    public function detach(Observer $subject);
    public function notify($msg);
}

class TtnHospital implements Observer
{
    public function update($msg)
    {
        echo get_class($this) . ' received today\'s special' . $msg . "\n";
    }
}

class TtnFireStation implements Observer
{
    public function update($msg)
    {
        echo get_class($this) . ' received today\'s special' . $msg . "\n";
    }
}

class TtnSchool implements Observer
{
    public function update($msg)
    {
        echo get_class($this) . ' received today\'s special' . $msg . "\n";
    }
}

class TtnStudio implements Observer
{
    public function update($msg)
    {
        echo get_class($this) . ' received today\'s special' . $msg . "\n";
    }
}

class TtnBakery implements Subject
{
    protected $subjectList = [];

    public function attach( $subject)
    {
        $this->subjectList[] = $subject;
    }

    public function detach(Observer $subject)
    {
        unset($this->subjectList[array_search($subject, $this->subjectList)]);
    }

    public function notify($msg)
    {
        foreach ($this->subjectList as $subject) {
            $subject->update($msg);
        }
    }
}

class TodaySpecial
{
    protected $merchandise = [
        'Fruit' => ['Apple', 'Banana', 'Pomegranate'],
        'Beverage' => ['Juice', 'Tea', 'Coffee'],
        'Meat' => ['Chicken', 'Beef', 'Pork', 'Fish'],
    ];

    protected $type;
    protected $name;

    public function __construct()
    {
        $num = rand(0, count($this->merchandise)-1);
        $this->type = array_keys($this->merchandise)[$num];

        $num = rand(0, count($this->merchandise[$this->type])-1);
        $this->name = $this->merchandise[$this->type][$num];
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }
}

$bakery = new TtnBakery;

$hospital = new TtnHospital();
$fireStation = new TtnFireStation();
$school = new TtnSchool();
$studio = new TtnStudio();

$bakery->attach($hospital);
$bakery->attach($fireStation);
$bakery->attach($school);
$bakery->attach($studio);

$todaySpecial = new TodaySpecial();

$bakery->notify(' ' . $todaySpecial->getType() . ' ' . $todaySpecial->getName());
