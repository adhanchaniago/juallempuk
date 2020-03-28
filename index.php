<?php
session_start();
include('./db/connection.php');
$get = isset($_GET['show']) ? trim($_GET['show']) : '' ;
switch($get)
{
default:
$head_title = "JualLempuk.com - Jual Online Lempuk Durian";
require('header.php');
include('beranda.php');
break;

case'gallery':
$head_title = "Gallery";
require('header.php'); 
include('tentang.php');
break;

case'registrasi':
$head_title = "Registrasi";
require('header.php');
include('register.php');
break;

case'keranjang':
$head_title = "Keranjang Belanja";
require('header.php');
include('cart.php');
break;

case'testimonial':
$head_title = "Testimonial";
require('header.php');
include('contact.php');
break;
case'order':
$head_title = "Pesan Produk";
require('header.php');
include('checkout.php');
break;

case'input-provinsi':
$head_title = "Info";
require('header.php');
include('input-provinsi.php');
break;

case'keluar':
session_destroy();
header('location:./');
break;

case'tentang':
$head_title = "Tentang Kami";
require('header.php'); 
include('kontak.php');
break;
}

include('sidebar-kiri.php');
require('footer.php');
?>