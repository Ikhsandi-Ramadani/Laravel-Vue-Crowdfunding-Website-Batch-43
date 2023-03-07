<?php
trait Hewan
{
    public $nama;
    public $darah = 50;
    public $jumlahKaki;
    public $keahlian;

    public function atraksi()
    {
        echo $this->nama . " sedang " . $this->keahlian;
    }
}

abstract class Fight
{
    use Hewan;
    public $attackPower;
    public $defencePower;

    public function serang($hewan)
    {
        echo $this->nama . " sedang menyerang " . $hewan->nama . "<br>";

        $this->diserang($hewan);
    }

    public function diserang($hewan)
    {
        echo $hewan->nama . " sedang diserang " . $this->nama . "<br>";
        $this->darah = $this->darah - ($hewan->attackPower / $this->defencePower);
    }

    protected function getInfo()
    {
        echo "Nama: " . $this->nama . "<br>";
        echo "Darah: " . $this->darah . "<br>";
        echo "Jumlah kaki: " . $this->jumlahKaki . "<br>";
        echo "Keahlian: " . $this->keahlian . "<br>";
        echo "Attack power: " . $this->attackPower . "<br>";
        echo "Defence power: " . $this->defencePower . "<br>";
        echo $this->atraksi() . "<br>";
    }

    abstract public function getInfoHewan();
}

class Elang extends Fight
{
    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->jumlahKaki = 2;
        $this->keahlian = "terbang tinggi";
        $this->attackPower = 10;
        $this->defencePower = 5;
    }

    public function getInfoHewan()
    {
        echo "Jenis hewan: Elang <br>";
        $this->getInfo();
    }
}

class Harimau extends Fight
{
    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->jumlahKaki = 4;
        $this->keahlian = "lari cepat";
        $this->attackPower = 7;
        $this->defencePower = 8;
    }

    public function getInfoHewan()
    {
        echo "Jenis hewan: Harimau <br>";
        $this->getInfo();
    }
}

$elang = new Elang("Elang");
$elang->getInfoHewan();
echo "<br>";
$harimau = new Harimau("Harimau");
$harimau->diserang($elang);
$harimau->getInfoHewan();
