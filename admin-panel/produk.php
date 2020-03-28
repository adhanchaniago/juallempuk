<div id='menu-manager'>
<center><a href='?show=data-produk&act=input'><button>Entry Produk</button></a> &nbsp; <a href='?show=data-produk&act=lihat'><button>lihat Produk</button></a></center>
<?php
if($_GET['act']=='input')
{
$q = mysql_query("select count(*) as kod from tbl_produk");
$d = mysql_fetch_array($q);
$k = $d['kod']+1;
$kode = "PR0$k";
?>
<form enctype="multipart/form-data" id="produk" name="produk" action="" method="post">
<table align="center" bgcolor="#FFFFFF" width ="412"border="2"cellspacing="2"cellpadding="8">
<tr>
<td bgcolor="#D41F55" colspan ="3" align=center ><h3>Produk Baru</h3></td>
</tr>
<tr>
<tr>
<td>Nama</td>
<td>:</td>
<td><input type='hidden' value='<?php echo $kode;?>' name='idproduk'/>
<input name="Nama" type="text" value="<?php echo $Nama;?>" size="50" /></td>
</tr>
<tr>
<td>Stock</td>
<td>:</td>
<td><input name="Stock" type="text" value="<?php echo $Stock;?>" size="50" /></td>
</tr>
<tr>
<td>Hargasatuan</td>
<td>:</td>
<td><input name="Hargasatuan" type="text" value="<?php echo $Hargasatuan;?>" size="50" /></td>
</tr>
<tr>
<td>Foto</td>
<td>:</td>
<td><input name="foto" type="file" size="50" /></td>
</tr>
<td colspan="3" align="center"><input name='simpan' type="submit" value="Simpan" /> <input type="reset" value="Ulangi" /></td>
</tr>
</table>
    </form>
<?php
if(isset($_POST['simpan']))
{
$idproduk = $_POST['idproduk'];
$Nama = $_POST['Nama'];
$Stock = $_POST['Stock'];
$Hargasatuan =$_POST['Hargasatuan'];
$eror = false;
$folder		= '../img/produk/';
//type file yang bisa diupload
$file_type	= array('jpg','jpeg','png','gif');
//tukuran maximum file yang dapat diupload
$max_size	= 1000000; // 1MB
	//Mulai memorises data
	$file_name	= $_FILES['foto']['name'];
	$file_size	= $_FILES['foto']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type)){
		$eror   = true;
		$pesan .= 'Format gambar tidak didukung';
	}
	if($file_size > $max_size){
		$eror   = true;
		$pesan .= 'Ukuran Gambar Maksimal 1 MB';
	}
	//check ukuran file apakah sudah sesuai
	
if($eror == true)
	{
		echo '<script>alert("'.$pesan.'");</script>';
	}
	else
	{//mulai memproses upload file
		if(move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$file_name))
			{
$sqlstr = "INSERT INTO tbl_produk (IdProduk,NamaProduk,Stock,Harga,Satuan,Foto) VALUES('$idproduk','$Nama','$Stock','$Hargasatuan','Kg','$file_name')";
$hasil = mysql_query($sqlstr);
if($hasil)
{
echo"<script>alert('Berhasil Disimpan');</script>";
header('location:?show=data-produk&act=lihat');
}
else
{
echo"<script>alert('Gagal Disimpan');</script>";
}
}
}
}
}
elseif($_GET['act']=='hapus')
{
mysql_query("delete from tbl_produk where IdProduk='".$_GET['id']."'");
$f = mysql_query("select Foto from tbl_produk where IdProduk='".$_GET['id']."'");
$hs = mysql_fetch_array($f);
unlink('../img/produk/'.$hs['Foto']);
header('location:?show=data-produk&act=lihat');
}
elseif($_GET['act']=='lihat')
{
?>
<table align="center" bgcolor="#FFFFFF" width ="600"border="2" cellspacing="2"cellpadding="8">
<tr>
<td colspan ="8" align=center><b>Produk</b></td>
</tr>
<tr>
<tr>
<td>Nama</td>
<td>Stock</td>
<td>Harga</td>
<td>Foto</td>
<td colspan="2">Action</td>
</tr>

  <?php
$query = "select * from tbl_produk";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
	?>

<tr>
<td><?php echo $data['NamaProduk'];?></td>
<td><?php echo $data['Stock'];?></td>
<td><?php echo $data['Harga'];?></td>
<td><img src="../img/produk/<?php echo $data['Foto'];?>" height="100"/></td>
<td><div align="center"><a href="?show=data-produk&act=edit&id=<?php echo $data['IdProduk'];?>" >Edit</a></div></td>
<td><div align="center"><a onclick="return confirm('Anda yakin ?');" href="?show=data-produk&act=hapus&id=<?php echo $data['IdProduk'];?>"target="_self">Hapus</a></div></td>
</tr>
<?php
}
?>
</table>
	</form>
<?php
}
elseif($_GET['act']=='edit')
{
$pr = mysql_query("select * from tbl_produk where IdProduk='".$_GET['id']."'");
$h = mysql_fetch_array($pr);
?>
	<form enctype="multipart/form-data" id="produk" name="produk" action="" method="post">
<table align="center" bgcolor="#FFFFFF" width ="412"border="2"cellspacing="2"cellpadding="8">
<tr>
<td bgcolor="#D41F55" colspan ="3" align=center ><h3>Edit data Produk</h3></td>
</tr>
<tr>
<tr>
<td>Nama</td>
<td>:</td>
<td>
<input name="Nama" type="text" value="<?php echo $h['NamaProduk'];?>" size="50" /></td>
</tr>
<tr>
<td>Stock</td>
<td>:</td>
<td><input name="Stock" type="text" value="<?php echo $h['Stock'];?>" size="50" /></td>
</tr>
<tr>
<td>Hargasatuan</td>
<td>:</td>
<td><input name="Hargasatuan" type="text" value="<?php echo $h['Harga'];?>" size="50" /></td>
</tr>
<tr>
<td>Foto</td>
<td>:</td>
<td><img src='../img/produk/<?php echo $h['Foto'];?>' height="100"/><input name="foto" type="file" size="50" /></td>
</tr>
<td colspan="3" align="center"><input name='simpan' type="submit" value="Simpan" /></td>
</tr>
</table>
    </form>
<?php
if(isset($_POST['simpan']))
{
$idproduk = $_POST['idproduk'];
$Nama = $_POST['Nama'];
$Stock = $_POST['Stock'];
$Hargasatuan =$_POST['Hargasatuan'];
$eror = false;
$file_name	= $_FILES['foto']['name'];
if($file_name=='')
{
$sqlstr = "Update tbl_produk set NamaProduk='$Nama',Stock='$Stock',Harga='$Hargasatuan' where IdProduk='".$_GET['id']."'";
$hasil = mysql_query($sqlstr);
if($hasil)
{
unlink($folder.$h['Foto']);
echo"<script>alert('Berhasil Disimpan');</script>";
header('location:?show=data-produk&act=lihat');
}
else
{
echo"<script>alert('Gagal Disimpan');</script>";
}
}
else
{
$folder		= '../img/produk/';
//type file yang bisa diupload
$file_type	= array('jpg','jpeg','png','gif');
//tukuran maximum file yang dapat diupload
$max_size	= 1000000; // 1MB
	//Mulai memorises data
	$file_name	= $_FILES['foto']['name'];
	$file_size	= $_FILES['foto']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type)){
		$eror   = true;
		$pesan .= 'Format gambar tidak didukung';
	}
	if($file_size > $max_size){
		$eror   = true;
		$pesan .= 'Ukuran Gambar Maksimal 1 MB';
	}
	//check ukuran file apakah sudah sesuai
	
if($eror == true)
	{
		echo '<script>alert("'.$pesan.'");</script>';
	}
	else
	{//mulai memproses upload file
		if(move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$file_name))
			{
$sqlstr = "Update tbl_produk set NamaProduk='$Nama',Stock='$Stock',Harga='$Hargasatuan',Foto='$file_name' where IdProduk='".$_GET['id']."'";
$hasil = mysql_query($sqlstr);
if($hasil)
{
unlink($folder.$h['Foto']);
echo"<script>alert('Berhasil Disimpan');</script>";
header('location:?show=data-produk&act=lihat');
}
else
{
echo"<script>alert('Gagal Disimpan');</script>";
}
}
}
}
}
}
else
{}
?>
</div>