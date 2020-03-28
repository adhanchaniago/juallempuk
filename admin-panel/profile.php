<div id='menu-manager'>
<?php
$uk = mysql_query("select * from tbl_admin");
$s = mysql_fetch_array($uk);
if($_GET['edit']=='carapesan')
{
if(isset($_POST['simpan']))
{
$update = mysql_query("UPDATE tbl_admin SET Carapesan='".$_POST['isi']."'");
if($update)

{
	echo"<div id='sukses'><h4>Tersimpan</h4></div>";
}
else
{
echo"<div id='gagal'><h4>Tidak tersimpan</h4></div>";
}
}
$uk = mysql_query("select * from tbl_admin");
$s = mysql_fetch_array($uk);
?>

<form id='profile' action="" method='POST'>
<h2>Cara Pemesanan</h2>
<textarea name="isi" id="input" style="width:400px; height:200px">
<?php echo $s['Carapesan']; ?>
</textarea>
		<script type="text/javascript">
new TINY.editor.edit('editor',{
	id:'input',
	width:584,
	height:175,
	cssclass:'te',
	controlclass:'tecontrol',
	rowclass:'teheader',
	dividerclass:'tedivider',
	controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
			  'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
			  'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
			  'font','size','style','|','image','hr','link','unlink','|','cut','copy','paste','print'],
	footer:true,
	fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml:true,
	cssfile:'style.css',
	bodyid:'editor',
	footerclass:'tefooter',
	toggle:{text:'HTML',activetext:'COMPOSE',cssclass:'toggle'},
	resize:{cssclass:'resize'}
});
</script>
	<input  type="submit" name='simpan'  value='Simpan'/>
</form>
<?php
}
elseif($_GET['edit']=='tentang')
{
if(isset($_POST['simpan']))
{
$update = mysql_query("UPDATE tbl_admin SET Tentang='".$_POST['isi']."'");
if($update)

{
	echo"<div id='sukses'><h4>Tersimpan</h4></div>";
}
else
{
echo"<div id='gagal'><h4>Tidak tersimpan</h4></div>";
}
}
$uk = mysql_query("select * from tbl_admin");
$s = mysql_fetch_array($uk);
?>

<form id='profile' action="" method='POST'>
<h2>Tentang Ukm</h2>
<textarea name="isi" id="input" style="width:400px; height:200px">
<?php echo $s['Tentang']; ?>
</textarea>
		<script type="text/javascript">
new TINY.editor.edit('editor',{
	id:'input',
	width:584,
	height:175,
	cssclass:'te',
	controlclass:'tecontrol',
	rowclass:'teheader',
	dividerclass:'tedivider',
	controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
			  'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
			  'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
			  'font','size','style','|','image','hr','link','unlink','|','cut','copy','paste','print'],
	footer:true,
	fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml:true,
	cssfile:'style.css',
	bodyid:'editor',
	footerclass:'tefooter',
	toggle:{text:'HTML',activetext:'COMPOSE',cssclass:'toggle'},
	resize:{cssclass:'resize'}
});
</script>
	<input  type="submit" name='simpan'  value='Simpan'/>
</form>
<?php
}
else
{
if(isset($_POST['simpan']))
{
$update = mysql_query("UPDATE tbl_admin SET NamaUkm='".$_POST['nm_ukm']."',Pemilik='".$_POST['nm_pml']."',Alamat='".$_POST['almt']."',NoHp='".$_POST['hp']."',Facebook='".$_POST['fb']."',Twitter='".$_POST['tw']."'");
if($update)

{
	echo"<div id='sukses'><h4>Tersimpan</h4></div>";
}
else
{
echo"<div id='gagal'><h4>Tidak tersimpan</h4></div>";
}
}
$uk = mysql_query("select * from tbl_admin");
$s = mysql_fetch_array($uk);
?>
<form id='profile' action="" method="post">
<h4>Nama Ukm</h4>
<input value='<?php echo $s['NamaUkm'];?>' type="text" name='nm_ukm'/>
<h4>Nama Pemilik</h4>
<input type="text" value='<?php echo $s['Pemilik'];?>' name='nm_pml'/>
<h4>Alamat</h4>
<textarea style='font-size:20px;height:100px;width:300px;padding:4px;border-radius:4px;border:1px solid #ccc;'name='almt'><?php echo $s['Alamat'];?>kkkkkkkkk</textarea>
<h4>Telp/Hp</h4>
<input type="text" value='<?php echo $s['NoHp'];?>' name='hp'/>
<h4>Facebook</h4>
<input type="text" value='<?php echo $s['Facebook'];?>' name='fb'/>
<h4>Twitter</h4>
<input type="text" value='<?php echo $s['Twitter'];?>' name='tw'/><br/>
<input type='submit' name='simpan' value='Simpan'/>
</form>
<?php
}
?>
</div>