<?php
if(isset($_POST['log']))
{
$query = mysql_query("SELECT * from tbl_login where EMAIL='".$_POST['email']."' AND PASSWORD='".md5($_POST['pass'])."' AND STATUS='1'");
if(mysql_num_rows($query)<1)
{
echo"<script>alert('Email dan Password salah');</script>";
}
else
{
	$id= mysql_fetch_array($query);
	if($id['LEVEL']=='admin')
	{
		$_SESSION['admin'] = $id['ID_LOGIN'];
		header("location:./admin-panel"); 
	}
	else
	{
	$_SESSION['id_customer'] = $id['ID_LOGIN'];
	}
}
}
?>
<form style="margin:0;float:right;padding:0;" action='' id='logsidebar' method='post'>
<input placeholder='Email' style='font-size:small;width:100px;height:23px;border:1px solid #ccc;border-radius:3px;' type="text" name='email'/>
&nbsp;

<input placeholder='Sandi' type="password" style='font-size:small;width:100px;height:23px;border:1px solid #ccc;border-radius:3px;' name='pass'/>&nbsp;

<input style='cursor:pointer;background:#07c;color:white;width:60px;font-size:small;height:24px;border:0;border-radius:3px;' name='log' type='submit' value='Masuk'/>
<?php if($_SERVER['REQUEST_URI']=='/registrasi.aspx') 
{}
else{?>
<a href='./registrasi.aspx'><small style='color:white;background:#07c;padding:5px;;border-radius:3px;font-size:small; cursor:pointer;'>Registrasi</small></a>
<?php
}
?>
</form>
<small style='color:white;background:#07c;padding:5px;;border-radius:3px;font-size:small; cursor:pointer;' class='lg'>Masuk</small>
<a href='./registrasi.aspx'>
<?php if($_SERVER['REQUEST_URI']=='/registrasi.aspx') 
{}
else{?>
<small style='color:white;background:#07c;padding:5px;;border-radius:3px;font-size:small; cursor:pointer;' class='lg'>Registrasi</small></a>
<?php } ?>