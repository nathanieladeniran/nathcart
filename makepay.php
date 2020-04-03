<?php
session_start();
require __DIR__ . '/lib/applib.php';
$app = new ShopingCart();

$save = $app->saveTotal($_POST['sesid'],$_POST['tot']);
$rem= $app->clearCart();
//exit;
?>
 