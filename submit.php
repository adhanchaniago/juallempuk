<?php
session_start();
require('db/connection.php');
function msg($status,$txt)
{
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
}
if(empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['alamat'])|| empty($_POST['poskode'])|| empty($_POST['nohp']))
{
	die(msg(0,"Harap isi semua kolom"));
}


if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['email'])))
	die(msg(0,"Format Email tidak benar"));

$query = mysql_query("INSERT INTO tbl_customer (Nama,Email,Alamat,Kecamatan,Kota,Provinsi,KodePos,NoHp) VALUES('".$_POST['nama']."','".$_POST['email']."','".$_POST['alamat']."','".$_POST['kec']."','".$_POST['kota']."','".$_POST['prop']."','".$_POST['poskode']."','".$_POST['nohp']."')");;
	$si = mysql_query("select IdCostumer from tbl_customer where Email='".$_POST['email']."'");
	$id= mysql_fetch_array($si);

mysql_query("insert into tbl_login (ID_LOGIN,EMAIL,PASSWORD,LEVEL,STATUS) VALUES('".$id['IdCostumer']."','".$_POST['email']."','".md5($_POST['pass'])."','customer','1')");
	$_SESSION['id_customer'] = $id['IdCostumer'];
	$_SESSION['registered'] = 1;
echo msg(1,"/keranjang.aspx");
?>
