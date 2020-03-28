<?php
session_start();
require('db/connection.php');
$q = mysql_query("select * from tbl_produk where IdProduk='".$_GET['id']."'");
$p = mysql_fetch_array($q);
if(mysql_num_rows($q)<1)
{
$head_title = "Tidak Ditemukan";
}
else
{
$head_title = $p['NamaProduk'];

}
require('header.php');
?>
<div id='content'>
<div class='isi'>
<script type="text/javascript">
$(document).ready(function(){
	$("#checkout").hide();
$(".button").click(function(){
$("#checkout").show();
$(".button").hide();
});
});
</script>
<script type="text/javascript" src="js/cekbyr.js"></script>
<h3>Produk / Detail</h3>
<div id='produk'>
<?php
if(mysql_num_rows($q)<1)
{
echo 
'<div id="daftar-produk">
<h2 style="color:red;text-align:center;">Produk tidak di temukan</h2>
</div>
';
}
else
{
echo"<div id='produk-detail'>
<img src='img/produk/".$p['Foto']."'/><h2 class='judul'>".$p['NamaProduk']."</h2>
<h4>Rp. ".$p['Harga']." / ".$p['Satuan']."</h4>
";
if($p['Stock']>0)
{
echo"<h2>Stock : Tersedia <b>$p[Stock]</b> $p[Satuan]</h2>";
}
else
{
	echo"<h5>Stock : <b>Habis</b></h5>";
}

echo"
<div class='button'>
<button class='beli'>Pesan</button>
</div>
<form id='checkout' method='post' action='inputorder.php'>
<table width='200'>
<input type='hidden' value='".$p['Harga']."' id='harga'/>
<input type='hidden' id='stock' value='".$p['Stock']."'/>
<input type='hidden' value='".$p['IdProduk']."' name='idproduk'/>
<tr><td>Jumlah pesanan </td><td><input type='text' id='jml' style='width:60px;height:50px;font-size:30px;text-align:center;' name='jml'/> Kg&nbsp;<img src='img/ik.png' style='height:40;width:40;border:0;padding:0;background:transparent;'/></td></tr>
<tr><td>Total Bayar</td><td>Rp. <input style='font-size:20px;border:0px;background:transparent;color:red;' readonly='readonly' style='border:0;background:transparent;' type='text' id='byr' name='total'/></td></tr>
<tr><td colspan='2'>
<button id='submit'>Pesan Sekarang</button></td></tr>
</table>
</form>
<script type='text/javascript' src='js/order.js'></script>
";
echo"
</div>
";
}
?>
</div>
</div>
</div>
<?php
include('sidebar-kiri.php');
require('footer.php');
?>