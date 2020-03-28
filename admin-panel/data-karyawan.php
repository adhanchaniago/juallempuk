<div id='menu-manager'>
<center><a href='?show=data-karyawan&act=input'><button>Entry Data karyawan</button></a> &nbsp; <a href='?show=data-karyawan&act=lihat'><button>lihat Data Karyawan</button></a></center>
<?php
if($_GET['act']=='input')
{
if(isset($_POST['send']))
{
$kode=$_POST["kode"];
$nama=$_POST["nama"];
$jeniskelamin=$_POST["jeniskelamin"];
$alamat=$_POST["alamat"];
$nohp=$_POST["nohp"];
$bagian=$_POST["bagian"];
if(empty($kode) || empty($nama) || empty($jeniskelamin) || empty($alamat) || empty($nohp) || empty($bagian))
	 {
		echo"<script>alert('Lengkapi Data');</script>";
	 }
else
	{
		$sqlstr="insert into tbl_karyawan values ('$kode','$nama','$jeniskelamin','$alamat','$nohp','$bagian')";
$hasil=mysql_query($sqlstr);
	if($hasil)
	{	
		unset($kode);
		unset($nama);
		unset($alamat);
		unset($nohp);
		echo"<script>alert('Data Berhasil Diinput');</script>";
		
	}
}
}

?>
<form action="" method="post">
<table width="500" height="300" border="0" align="center">
<tr bgcolor="#8FBC8B">
<td colspan="5"> <h2 align="center">Input Karyawan Baru</h2></td>
</tr>
<tr>
<td>Kode Karyawan </td>
<td>:</td>
<td> <input type="text" value="<?php echo $kode;?>" name="kode" /></td>
</tr>
<td>Nama</td>
<td>:</td>
<td> <input type="text" value="<?php echo $nama;?>" name="nama"/></td>
</tr>
<td>Jenis Kelamin</td>
<td>:</td>
<td> <input type="text" value="<?php echo $JenisKelamin;?>" name="jeniskelamin"/></td>
</tr>
<td>Alamat</td>
<td>:</td>
<td> <input type="text" value="<?php echo $alamat;?>" name="alamat"/></td>
</tr>
<td>NoHp</td>
<td>:</td>
<td> <input type="text" value="<?php echo $nohp;?>" name="nohp" /></td>
</tr>
<td>Bagian</td>
<td>:</td>
<td>
<select name='bagian'>
<option value=''>--Tentukan bagian--</option>
<?php
$qu =  mysql_query("select * from tbl_jabatan");
while($show = mysql_fetch_array($qu))
{
	echo"<option value='".$show['IdBagian']."'>".$show['NamaBagian']."</option>";
}
?>
</select>
</td>
</tr>
<tr bgcolor="#8FBC8B">
<td colspan="3">
<div align="center">
<input type="submit" name="send" value="Simpan"/>
<input type="reset" name="del" value="Bersih"/>
</div></td>
</tr>
</table>
</form>
<?php
}
elseif($_GET['act']=='lihat')
{
?>
<table width="550" height="80" border="3" align="center">
<tr bgcolor="#8FBC8B">
<td colspan="10"> <h2 align="center">Lihat Data Karyawan</h2></td>
</tr>

<tr>
<td align = "center" bgcolor="yellow">Kode Karyawan</td>
<td align = "center" bgcolor="yellow">Nama</td><br>
<td align = "center" bgcolor="yellow">Jenis Kelamin</td>
<td align = "center" bgcolor="yellow">Alamat</td>
<td align = "center" bgcolor="yellow">NoHp</td>
<td align = "center" bgcolor="yellow">Bagian</td>
<td align = "center" bgcolor="yellow" colspan="3" bgcolor="red">Action</td>
</tr>


<?php
$query = "select * from tbl_karyawan";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
?>
<tr>
<td> <?php echo $data['IdKaryawan'];?></td>
<td> <?php echo $data['Nama'];?></td>
<td> <?php echo $data['JenisKelamin'];?></td>
<td> <?php echo $data['Alamat'];?></td>
<td> <?php echo $data['NoHp'];?></td>
<td> <?php echo $data['IdBagian'];?></td>
<td><div align="center"><a href = "?show=data-karyawan&act=edit&id=<?php echo $data['IdKaryawan'];?>">Edit</a></div></td>
<td><div align="center"><a onclick="return confirm('Anda Yakin ingin mengahpus data ini ?');" href = "?show=data-karyawan&act=hapus&id=<?php echo $data['IdKaryawan'];?>">Hapus</a></div></td>
</tr>
<?php
}
?>
</table>
<?php
}
elseif($_GET['act']=='edit')
{
if(isset($_POST['send']))
{
$qedit = mysql_query("update tbl_karyawan set Nama='".$_POST['nama']."',JenisKelamin='".$_POST['jeniskelamin']."',Alamat='".$_POST['alamat']."',NoHp='".$_POST['nohp']."',IdBagian='".$_POST['bagian']."' where IdKaryawan='".$_GET['id']."'");
if($qedit)
{
	echo"<script>alert('Data Berhasil Di Update');</script>";
	//header('location:?show=data-karyawan&act=lihat&');
}
else
{
	echo"<script>alert('Data Gagal Di Update');</script>";
}
}
else
{
	
}
$kode = $_GET['id'];
$query="select * from tbl_karyawan WHERE IdKaryawan='$kode'";
$hasil=mysql_query($query)
or die ("Gagal query".mysql_error());
$data=mysql_fetch_array($hasil);
?>
<form  action="" method="post">
<table width="500" height="300" border="0" align="center">
<tr bgcolor="#8FBC8B">
<td colspan="5"> <h2 align="center">Form Edit Karyawan</h2></td>
</tr>

<tr>
<td>Kode Karyawan </td>
<td>:</td>
<td> <input type="text" readonly='readonly' value="<?php echo $data['IdKaryawan'];?>" name="kode"/></td>
</tr>
<td>Nama</td>
<td>:</td>
<td> <input type="text" value="<?php echo $data['Nama'];?>" name="nama"/></td>
</tr>
<td>Jenis Kelamin</td>
<td>:</td>
<td> <input type="text" value="<?php echo $data['JenisKelamin'];?>" name="jeniskelamin"/></td>
</tr>
<td>Alamat</td>
<td>:</td>
<td> <textarea name='alamat'><?php echo $data['Alamat'];?></textarea></td>
</tr>
<td>NoHp</td>
<td>:</td>
<td> <input type="text" value="<?php echo $data['NoHp'];?>" name="nohp"/></td>
</tr>
<td>Bagian</td>
<td>:</td>
<td>
<select name='bagian'>
<option value=''>--Tentukan bagian--</option>
<?php
$qu =  mysql_query("select * from tbl_jabatan");
while($show = mysql_fetch_array($qu))
{
	echo"<option value='".$show['IdBagian']."'"; if($show['IdBagian'] == $data['IdBagian']){echo "selected='selected'";} echo">".$show['NamaBagian']."</option>";
}
?>
</select>
</td>
</tr>
<tr bgcolor="#8FBC8B">
<td colspan="3"><div align="center">
<input type="submit" name="send" value="Simpan">
<input type="reset" name="del" value="Bersih">
</div></td>
</tr>
</table>
</form>
<?php
}
elseif($_GET['act']=='hapus')
{
	$del = mysql_query("delete from tbl_karyawan where IdKaryawan='".$_GET['id']."'");
	header('location:?show=data-karyawan&act=lihat&');
}
else
{}
?>
</div>