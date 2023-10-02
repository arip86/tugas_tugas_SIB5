<?php
require_once 'Person.php';
class Mahasiswa extends Person{
    public $semester;
    public $jurusan;
    public function __construct($nama, $gender, $semester, $jurusan){
        parent::__construct($nama, $gender);
        $this->semester = $semester;
        $this->jurusan = $jurusan;
    }
    public function cetak(){
        parent::cetak();
        echo '<br> Semester : '.$this->semester;
        echo '<br> Jurusan : '.$this->jurusan;
        echo '<hr>';
    }
}

?>