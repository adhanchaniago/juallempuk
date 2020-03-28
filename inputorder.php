<?php
session_start();
require("db/connection.php");
if(!isset($_SESSION['id_customer']))
{
echo"
<span style='font-size:20px;'>Untuk melakukan pemesanan, Anda harus login dahulu atau <a href='registrasi.aspx'>Registrasi</a> jika belum terdaftar</span>
";
}
else
{
$insert = mysql_query("INSERT INTO tbl_pesanan (IdProduk,IdCostumer,JumlahPesanan,StatusPesanan,TanggalPesanan) VALUES('".$_POST['idproduk']."','".$_SESSION['id_customer']."','".$_POST['jml']."','N','".date('Y-m-d H:i:s')."')");
if($insert)
{
?>
<span style='font-size:20px;color:green;'>Terimakasi telah melakukan pemesanan Produk Kami. Silahkan tunggu konfirmasi dari kami untuk proses selanjutnya. Atau lihat <a href='./keranjang.aspx'>Keranjang belanja</a> Anda</span>
<?php
}
else
{
echo"<h5>gagal</h5>";
}
}
?>