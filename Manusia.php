<?php

abstract class MakhlukHidup
{
    abstract public function bernafas(string $alatPernapasan): string;
    abstract public function berjalan();
    abstract public function meraba();
}

class Manusia extends MakhlukHidup
{
    protected function _kick() {
        echo "Menendang dengan gaya kick boxing\n";
    }
    private function __mukul()
    {
        echo "Sedang nonjok pake dua kepalan tangan \n";
    }
    public function bernafas(string $alatPernapasan = "Paru-paru"): string
    {
        return "Manusia bernafas dengan $alatPernapasan";
    }
    public function berjalan()
    {
        echo "Manusia Berjalan dengan kedua kakinya\n";
    }
    public function meraba()
    {
        echo "";
    }
}


class ZamanPurba extends Manusia{
    protected function _kick()
    {
        $this->_kickTeakwondo();
        echo "Menendang dengan asal asalan\n";
        parent::_kick();
    }
    private function _kickTeakwondo()
    {
        echo "Menendang dengan gaya teakwondow";
    }
    public function berkelahi()
    {
        $this->_kick();
    }
}

$zamanPurba = new ZamanPurba();
echo $zamanPurba->bernafas().PHP_EOL;
$zamanPurba->berjalan();
$zamanPurba->berkelahi();
