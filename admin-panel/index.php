<?php
session_start();
require('../db/connection.php');
if(!isset($_SESSION['admin']))
{
	header('location:../');
}
else
{
ini_set("display_errors",false);
$set = isset($_GET['show']) ? trim($_GET['show']) : '';

switch($set)
{
	case'data-karyawan':
	$head_title = "Data Karyawan";
	include('header.php');
	include('link-menu.php');
	include('data-karyawan.php');
	break;

	case'data-produk':
	$head_title = "Data Produk";
	include('header.php');
	include('link-menu.php');
	include('produk.php');
	break;

	case'data-customer':
	$head_title = "Data Customer";
	include('header.php');
	include('link-menu.php');
	include('customer.php');
	break;

	case'profile':
	$head_title = "Profile UKM";
	include('header.php');
	include('link-menu.php');
	include('profile.php');
	break;

	case'logout':
	session_destroy();
	header("location:../");
	break;

	case'data-supplier':
	$head_title = "Data Supplier";
	include('header.php');
	include('link-menu.php');
	include('supplier.php');
	break;

	case'data-pesanan':
	$head_title = "Data Pesanan";
	include('header.php');
	include('link-menu.php');
	include('pesanan.php');
	break;
	
	default:
	$head_title = "Admin Panel";
	include('header.php');
	include('link-menu.php');
	include('beranda.php');
	break;
}
include('footer.php');
} 
?>