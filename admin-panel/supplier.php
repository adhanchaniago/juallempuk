<div id='menu-manager'>
<center><a href='?show=data-supplier&act=input'><button>Entry Supplier</button></a> &nbsp; <a href='?show=data-supplier&act=lihat'><button>lihat Supplier</button></a></center>
<?php
if($_GET['act']=='input')
{
?>
<form name="form1" method="post" action="">

<table align="center" bgcolor="silver" width="412" border="2" cellspacing="0" cellpadding="8">

<tr>
<td colspan="3" align="center"><b>FORM INPUT SUPPLIER</b></td>
</tr>

<tr>
<td>Id Supplier</td>
<td>:</td>
<td><input name="idsupplier" type="text" value="<?php echo $idsupplier;?>" size="5" /></td>
</tr>

<tr>
<td>Nama Supplier</td><td>:</td>
<td><input name="nama" type="text" value="<?php echo $nama;?>" size="30" /></td>
</tr>
<tr>
<td>Alamat</td><td>:</td>
<td><input name="alamat" type="text" value="<?php echo $alamat;?>" size="30" /></td>
</tr>
<tr>
<td>No Telp</td><td>:</td>
<td><input name="nohp" type="text" value="<?php echo $nohp;?>" size="12" /></td>
</tr>
<tr>
<td colspan="3" align="center"><input type="submit" name='ok' value="Ok" /> 
<input type="reset" value="Ulang" /></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['ok']))
{
$idsupplier = $_POST["idsupplier"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$nohp = $_POST["nohp"];
$sqlstr = "INSERT INTO tbl_supplier VALUES ('$idsupplier','$nama','$alamat','$nohp')";
$hasil = mysql_query($sqlstr);
if($hasil)
{
	echo"<script>alert('Berhasil disimpan');</script>";
}
else
{
	echo"<script>alert('Gagal disimpan');</script>";
}
}
}
elseif($_GET['act']=='edit')
{
$query ="select * from tbl_supplier where IdSupplier='".$_GET['id']."'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
$idsupplier = $data ['IdSupplier'];
$nama = $data ['Nama'];
$alamat = $data ['Alamat'];
$nohp = $data['Nohp'];
?>
<form method="post" action="">
<table align="center" bgcolor="silver" width="412" border="2" cellspacing="0" cellpadding="8">
<tr>
<td colspan="3" align="center"><b>FORM INPUT SUPPLIER</b></td>
</tr>
<tr>
<td>Id Supplier</td><td>:</td>
<td><input name="idsupplier" readonly='readonly' type="text" value="<?php echo $idsupplier;?>" size="5" /></td>
</tr>
<tr>
<td>Nama Supplier</td><td>:</td>
<td><input name="nama" type="text" value="<?php echo $nama;?>" size="30" /></td>
</tr>
<tr>
<td>Alamat</td><td>:</td>
<td><input name="alamat" type="text" value="<?php echo $alamat;?>" size="30" /></td>
</tr>
<tr>
<td>No Telp</td><td>:</td>
<td><input name="nohp" type="text" value="<?php echo $nohp;?>" size="12" /></td>
</tr>
<tr>
<td colspan="3" align="center"><input type="submit" name='ok' value="Ok" /> 
<input type="reset" value="Ulang" /></td></tr>
</tr>
</table>
</form>
<?php
if(isset($_POST['ok']))
{
$idsupplier = $_POST["idsupplier"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$nohp = $_POST["nohp"];
$sqlstr = "UPDATE tbl_supplier set Nama='$nama',Alamat='$alamat',Nohp='$nohp' where IdSupplier='$idsupplier'";
$hasil = mysql_query($sqlstr);
if($hasil)
{
	echo"<script>alert('Berhasil Diupdate');</script>";
	header('location:?show=data-supplier&act=lihat');
}
else
{
	echo"<script>alert('Gagal Diupdate');</script>";
}
}
}
elseif($_GET['act']=='delete')
{
	mysql_query("DELETE from tbl_supplier where IdSupplier='".$_GET['id']."'");
	echo"<script>Data terhapus</script>";
	header('location: ?show=data-supplier&act=lihat');
}
elseif($_GET['act']=='lihat')
{
echo'
<table align="center" bgcolor="silver" width="600" border="2" cellspacing="0" cellpadding="8">
<tr>
<td colspan="5" align="center"><b>LIHAT DATA-DATA SUPPLIER</b></td>
</tr>
<tr>
<td>Id Supplier</td>
<td>Nama Supplier</td>
<td>Alamat</td>
<td>No Telp</td>
<td colspan="2">Action</td>
</tr>';
$query ="select * from tbl_supplier";
$hasil = mysql_query($query);
while($data = mysql_fetch_array($hasil))
{
?>
	<tr>
	<td><?php echo $data['IdSupplier'];?></td>
	<td><?php echo $data['Nama'];?></td>
	<td><?php echo $data['Alamat'];?></td>
	<td><?php echo $data['Nohp'];?></td>
	<td>
<a href='?show=data-supplier&act=edit&id=<?php echo $data['IdSupplier'];?>'>Edit</a>
</td>
<td><a onclick="return confirm('Anda Yakin?');" href='?show=data-supplier&act=delete&id=<?php echo $data['IdSupplier'];?>'>Hapus</a>
</td>
</tr>
<?php
}
echo'</table>';
}

else
{

}

?>
</div>