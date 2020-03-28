<?php
$selc =  mysql_query("select * from tbl_customer order by IdCostumer");
?>
<div id='menu-manager'>
<link rel='stylesheet' href="css-tabel.css" type="text/css"/>
<table align='center' width="500">
<tr><td>Nama</td><td>Alamat</td><td>Kode Pos</td><td>Kontak</td></tr>
<?php
if(mysql_num_rows($selc)<1)
{
echo"<tr><td colspan='4'><center><h3><font color='red'>belum ada pembeli</font></h3></td></tr>";
}
else
{
while($l = mysql_fetch_array($selc))
{
echo"<tr><td>$l[Nama]</td><td>$l[Alamat]</td><td>$l[KodePos]</td><td>$l[NoHP]</td></tr>";
}
}
?>
</table>
</div>