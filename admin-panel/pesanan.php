<?php
$selc =  mysql_query("select * from pes order by TanggalPesanan");
?>
<div id='menu-manager'>
<link rel='stylesheet' href="css-tabel.css" type="text/css"/>
<table align='center' width="500">
<tr><td>Tgl.Pesan</td><td>Nama Customer</td><td>Produk</td><td>Harga</td><td>Jumlah Pesanan</td><td>Total Bayar</td><td>Status</td></tr>
<?php
if(mysql_num_rows($selc)<1)
{
echo"<tr><td colspan='4'><center><h3><font color='red'>belum ada pembeli</font></h3></td></tr>";
}
else
{

while($l = mysql_fetch_row($selc))
{
echo"<tr><td>$l[0]</td><td>$l[1]</td><td>$l[2]</td><td>$l[3]</td><td>$l[4]</td><td>$l[5]</td><td>$l[6]</td></tr>";
}
}
?>
</table>
</div>