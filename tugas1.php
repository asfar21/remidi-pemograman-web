<?php
namespace App\Models;

// Trait
trait ResponseFormatter {
    public function formatResponse($message) {
        return json_encode(['message' => $message]);
    }
}

// Abstract Class
abstract class Hewan {
    protected $jenis;
    protected $nama;

    public function __construct($jenis, $nama) {
        $this->jenis = $jenis;
        $this->nama = $nama;
    }

    abstract public function suara();
}

// Class dan Inheritance
class Anjing extends Hewan {
    use ResponseFormatter;

    private $jenisRas;

    public function __construct($nama, $jenisRas) {
        parent::__construct("Anjing", $nama);
        $this->jenisRas = $jenisRas;
    }

    public function suara() {
        return "Guk guk!";
    }

    public function getJenisRas() {
        return $this->jenisRas;
    }

    public function __toString() {
        return $this->formatResponse("Nama: {$this->nama}, Ras: {$this->jenisRas}");
    }
}

class Kucing extends Hewan {
    use ResponseFormatter;

    private $warnaBulu;

    public function __construct($nama, $warnaBulu) {
        parent::__construct("Kucing", $nama);
        $this->warnaBulu = $warnaBulu;
    }

    public function suara() {
        return "Meong!";
    }

    public function getWarnaBulu() {
        return $this->warnaBulu;
    }

    public function __toString() {
        return $this->formatResponse("Nama: {$this->nama}, Warna Bulu: {$this->warnaBulu}");
    }
}

// Namespace
namespace App;

use App\Models\Anjing;
use App\Models\Kucing;

// Program Utama
$anjing = new Anjing("Buddy", "Golden Retriever");
$kucing = new Kucing("Milo", "Hitam");

echo $anjing->suara() . "<br>";
echo $anjing . "<br>";
echo $kucing->suara() . "<br>";
echo $kucing . "<br>";
?>
