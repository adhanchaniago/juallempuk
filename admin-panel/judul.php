<?php
$get = $_GET['show'];
switch($get)
{
case'data-karyawan':
$title = "Data Karyawan";
break;
case'data-customer':
$title = "Data Customer";
break;
case'data-produk':
$title = "Data Produk";
break;
case'data-pesanan':
$title = "Data Pesanan";
break;
case'data-supplier':
$title = "Data Supplier";
break;
default:
	$title = "Selamat datang Admin";
break;

}

?>
