<?php
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
try {
    $con = new PDO('mysql:host=localhost;dbname=toko_olahraga', 'root', 'qweasdzxc123', array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {

    echo $e->getMessage();
}

include_once 'ClassLogin.php';

$user = new LoginRegister($con);

?> 