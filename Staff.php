<?php
require_once 'Person.php';
class Staff extends Person{
    public $nip;
    public $divisi;
    public $gaji;
    public function __construct($nama, $gender, $nip, $divisi, $gaji){
        parent::__construct($nama, $gender);
        $this->nip = $nip;
        $this->divisi = $divisi;
        $this->gaji = $gaji;
    }
    public function cetak(){
        parent::cetak();
        echo '<br> Nomor NIP : '.$this->nip;
        echo '<br> Divisi : '.$this->divisi;
        echo '<br> Gaji : '.$this->gaji;
        echo '<hr>';
    }
}


?>