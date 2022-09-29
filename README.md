# Konsep OOP

OOP adalah salah satu SOP programming atau design principle(Cara mendesain sebuah sistem supaya lebih terstruktur) dengan menerapkan 4 pilar yaitu enkapsulasi, abstraksi, inheritance, dan polymorphism.

Ada hal penting lainnya yaitu pentingnya mengetahui perbedaan class dan object

## Class
class hanya sebuah definisi yang akan digunakan untuk membuat object. Contohnya hanya sekedar blueprint

## Object
Sedangkan, object itu sendiri data yang dihasilkan dengan referensi dari class yang sudah didefinisikan atau bisa dibilang hasil jadi dari sebuah bluprint yang telah dibuat.

## Enkapsulasi
Enkapsulasi adalah mengelompokkan tugas tugas atau fungsinya masing masing.
Contoh Kasus: Masak Mie

SALAH:
```php
class Mie {
    public function __construct() {
        echo "Buka Bungkus Indomie Goreng";
        echo "Didihkan air di panci";
        echo "Buka Bumbu";
        echo "Masukkan mie ke dalam panci";
        echo "Mie siap dimakan";
    }
}
```

BENAR:
```php
class Mie {
    public string $name;
    public function __construct(string $name = "Indomie Goreng") {
        $this->name = $name;
    }

    public function masak() {
        $this->prepare();
        $this->siap();
    }

    public function prepare() {
        $this->siapkanMie();
        $this->masakAir();
    }

    public function siapkanMie() {
        echo "Buka Bungkus $this->name";
        echo "Buka bumbu mie";
    }
    public function masakAir() {
        echo "Masak Air di panci";
    }
    public function siap() {
        echo "$this->name siap dimakan";
    }
}
```


Dengan dipisahnya masing masing tugas kedalam methodnya masing masing. ini akan lebih memudahkan kita kedapannya untuk membaca kode kita sendiri dan lebih mudah dipahami oleh orang lain yang akan join kedalam tim kita.


## Abstraksi 
Abstraksi seperti halnya sebuah kontrak. Yang mana hal hal yang dituliskan didalam kontrak tersebut ada prasayatnya. contoh prasayatnya seperti wajib menuliskan sebuah method terhadap class yang mereferensi abstract class yang telah dibuat.

CONTOH:
```php
abstract class MakhlukHidup {
    abstract public function bernafas(): string
}

class Manusia extends MakhlukHidup {
    public function bernafas(): string {
        return "Manusia bernafas dengan paru paru";
    }
}
```

## Inheritance
Inheritance adalah penurunan sifat dari parent classnya selama access modifiernya bukan private (bisa dibilang diijinkan untuk diturunkan terhadap child classnya). Contoh lanjutan dari kode nomor abstract

```php
abstract class MakhlukHidup {
    abstract public function bernafas(): string
}

class Manusia extends MakhlukHidup {
    public function bernafas(): string {
        return "Manusia bernafas dengan paru paru";
    }
}

class ManusiaPurba extends Manusia {}
```


Bisa dilihat untuk ManusiaPurba tidak perlu lagi menuliskan fungsi bernafas karena sudah diturunkan(inheritance) sifat dari induknya yaitu Manusia


## Polymorphism

Polymorphism singkatnya yaitu satu nama dengan banyak bentuk. Contoh kita ambil kembali kode program dari inheritance

CONTOH:
```php
abstract class MakhlukHidup {
    abstract public function bernafas(): string
}

class Manusia extends MakhlukHidup {
    protected function tendang() {
        echo "Tendangan simadun";
    }
    public function bernafas(): string {
        return "Manusia bernafas dengan paru paru";
    }
}

class ManusiaPurba extends Manusia {
    public function tendang() {
        parent::tendang(); // memanggil fungsi tendang dari parent class
        echo "Menendang dengan asal asalan";
        $this->tendangTeakwondo();
    }
    private function tendangTeakwondo() {
        echo "Menendang tinggi ke angkasa";
    }
}
```

Bisa dilihat dalam class ManusiaPurba memiliki 3 buah nama yang sama dengan bentuk yang berbeda. fungsi tendangTeakwondo() kan beda namanya dengan tendang() kok masih masuk polymorphism? Perlu di ingat bahwsannya OOP merupakan konsep dalam programming yang artinya dari penerapannya memang bisa saja berbeda. Contohnya tentang tendangan tadi 3 fungsi tersebut dikatakan sama bukan sama berdasarkan methodnya tapi sebutannya yaitu `tendang`. tendang lah yang menjadikan ketiga fungsi tersebut sama dengan berbagai bentuk.