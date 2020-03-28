<div id='content'>
<div class='isi'>
<h3>Kontak Kami</h3>
<blockquote>
<?php
include('./db/connection.php');
if(isset($_POST['simpan']))
{
$insert = mysql_query("insert into tbl_provinsi (Provinsi)values('".$_POST['prov']."')");
if($insert)
{
echo"<h4>Berhasil</h4>";
}
}
?>
<form action='' method="post">
<input type='text' name='prov' /><br />
<input type="submit" value=simpan name='simpan'/>
</form>
</blockquote>
</div>
</div>