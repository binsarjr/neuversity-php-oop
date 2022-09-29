<?php
// Class => suatu definisi
class Car
{
    public string $name; // Property
    public int $speed = 0;
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->speed = 0;
    }
    // Method
    public function startEngine()
    {
        echo "$this->name telah dinyalakan\n";
    }

    public function go(int $speed = 2)
    {
        $this->speed += $speed;
        echo "Kecepatan Mobil saat ini adalah $this->speed km/jam\n";
    }
    public function stop()
    {
        echo "Mobil berhenti\n";
    }

    public function getName()
    {
        return $this->name;
    }
}

// Object => Data yang dibikin dari referensinya Class
$lamborgini = new Car("Lamborgini");
$lamborgini->startEngine();
$lamborgini->go();
$lamborgini->go();
$lamborgini->go(10);
$lamborgini->go();
$lamborgini->stop();


// protected => Hanya untuk diirnya sendiri dan turunananya
// private => Hanya untuk dirinya sendiri
// public => bebas digunakan dimana saja