<?php
session_start();
include_once 'admin/koneksi.php';
include_once 'models/Member.php';

$uname = $_POST['username'];
$password = $_POST['password'];
$data =[
    $uname, $password
];

$obj = new Member();
$rs = $obj->cekLogin($data);

if(!empty($rs)){
    $_SESSION['MEMBER'] = $rs;
    header('location:admin/index.php?url=produk');
} else {
    header('location:index.php?hal=home');
    // echo '<script> alert("user/password anda salah");history.back();</script>';
}

?>