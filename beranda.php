<div id='content'>
<div class='isi'>
<?php
$q = mysql_query("select * from tbl_produk order by NamaProduk");

?>
<h3>Produk <span style="float:right;background:#ccc;padding:5px;border-radius:3px;color:white;">Total : <?php echo mysql_num_rows($q);?></span></h3>
<div id='produk'>
<?php
if(mysql_num_rows($q)<1)
{
echo 
'<div id="daftar-produk">
<h2 style="color:red";>Belum ada Produk untuk saat ini</h2>
</div>
';
}
else
{
while($p = mysql_fetch_array($q))
{
echo"<div id='daftar-produk'>
<img src='img/produk/".$p['Foto']."'/><h2 class='judul'>".$p['NamaProduk']."</h2>
<h4>Rp. ".$p['Harga']." / ".$p['Satuan']."</h4>
<div class='button'>
	<a href='detail.php?id=".$p['IdProduk']."'><button class='detail'>Detail</button></a>
</div>
</div>
";
}
}
?>
</div>
</div>
</div>