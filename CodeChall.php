<?php

abstract class Printing
{
    abstract public function print();
}

class Alamat extends Printing
{
    public function __construct(
        public string $rt,
        public string $rw,
        public string $kelurahan,
        public string $kecamatan,
        public string $kabupaten,
        public string $provinsi,
        public string|null $catatan = null,
        public string|null $jalan = null,
    ) {
    }


    public function formatJalan()
    {
        $jalan = '';
        if ($this->jalan !== null) {
            // Jl. Melati RT bla bla bla
            $jalan = $this->jalan . " ";
        }
        return $jalan;
    }
    public function formatCatatan()
    {
        $catatan = '';
        if ($this->catatan !== null) {
            // Prov. bla bla (Catatan: Depan toko bla bla)
            $catatan = " (Catatan: " . $this->catatan . ")";
        }
        return $catatan;
    }
    public function print()
    {
        // Polymorphism: Satu nama berbagai bentuk
        $jalan = $this->formatJalan();
        $catatan = $this->formatCatatan();

        echo "{$jalan}RT {$this->rt} RW {$this->rw} Kel. {$this->kelurahan} Kec. {$this->kecamatan} Kab. {$this->kabupaten} Prov. {$this->provinsi}{$catatan}";
    }
}


class Nasabah extends Printing
{

    public function __construct(
        public string $nama,
        public string $nik,
        public Alamat $alamatRumah,
        public Alamat|null $alamatKantor = null,
        public string|null $nohp = null,
        public int|null $gaji = null,
    ) {
    }
    public function print()
    {
        echo "NAMA: {$this->nama}\n";
        echo "NIK: {$this->nik}\n";
        echo "Alamat Rumah: ";
        $this->alamatRumah->print();
        if ($this->alamatKantor !== null) {
            echo "Alamat Kantor: ";
            $this->alamatKantor->print();
        }
        if ($this->nohp !== null) {
            echo "NOHP: {$this->nohp}\n";
        }
        if ($this->gaji !== null) {
            echo "GAJI: {$this->gaji}\n";
        }
    }
}

$alamatRumah = new Alamat("01", "02", "Candong catur", "Depok", "Sleman", "D.I Yogyakarta", "Depan toko samsul", "Jl. Melati");


$alamatKantor = new Alamat("02", "02", "Candong catur", "Depok", "Sleman", "D.I Yogyakarta", "Depan toko samsul", "Jl. Melati");

$nasabahBinsar = new Nasabah("Binsar Dwi Jasuma", "1234567890", $alamatRumah, null, "08123456789", 9000000);
$nasabahBinsar->print();
