<?php
Class Person {
    public $nama;
    public $gender;

    //buat constructor
    public function __construct($nama, $gender){
        $this->nama = $nama;
        $this->gender = $gender;
    }
    public function cetak(){
        echo 'Nama : '.$this->nama;
        echo '<br> Jenis Kelamin : '.$this->gender;
    }
}


?>