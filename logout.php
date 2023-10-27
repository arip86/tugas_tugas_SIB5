<?php
session_start();
unset($_SESSION['MEMBER']);
header('Location:index.php?hal=home');


?>