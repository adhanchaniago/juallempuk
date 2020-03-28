<div id='content'>
<div class='isi'>
<h3>Keranjang Belanja</h3>
<div id='register'>
<?php
if(isset($_SESSION['id_customer']))
{
$q = mysql_query("SELECT * from tbl_customer WHERE IdCostumer='".$_SESSION['id_customer']."'");
$show = mysql_fetch_array($q);
if(isset($_SESSION['registered']))
{
	echo"Selamat datang $show[Nama]";
	unset($_SESSION['registered']);
}
}
else
{
echo"<h2>Anda harus mendaftar</h2>";
}


?>
</div>
</div>
</div>