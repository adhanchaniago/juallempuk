<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Masuk</title>
<link rel="stylesheet" href="style.css" />
<link rel="shortcut icon" href="favicon.ico"/>
<style>
#masuk {
		background:url(bgtop.png)repeat-x top;
		width:300px;
		margin:100px auto;
		padding:20px;
		text-align:center;
		border:3px solid #c3c3c3;
		border-radius:5px;
		}
input	{
		font-family:Tahoma, Geneva, sans-serif;
		height:30px;
		border:1px solid #ccc;
		border-radius:3px;
		width:80%;
		}
h4 		{
		margin:0;
		padding:5px;;
		
		}
h3 {
	margin:0;
	padding:5px;
	color:#333;
	}
.sub {background:url(bghd.png)repeat-x center;
	margin:10px;
	cursor:pointer;
	color:#000;font-weight:bold;
	width:90px;}
h5 {margin:0;padding:5px;}
a {text-decoration:none;color:#07c;}
</style>
</head>
<body>
<div id='masuk'>
<?php
include('../db/connection.php');
if(isset($_POST['login']))
{
	$query = mysql_query("select IdAdmin,Email,Sandi from tbl_admin where Email='".$_POST['email']."' and Sandi='".md5($_POST['pass'])."'");
$show = mysql_fetch_array($query);
if(mysql_num_rows($query)>0)
{
	$_SESSION['admin']= $show['IdAdmin'];
	header('location:http://http/juallempuk.com/admin-panel/');
}
else
{
	echo"<h3>Email dan Sandi Salah</h3>";
}
}
if(isset($_GET['not']))
echo"<h3 style='color:red;'>Anda harus login terlebih dahulu</h3>";
?>
<form action='' method="post">
<h3>Login Admin</h3>
<h4>Alamat Email</h4>
<input placeholder='contoh@gmail.com' type="text" name="email" />
<h4>Kata sandi</h4>
<input placeholder='Kata sandi' type="password" name="pass"/>
<br />
<input class='sub' type="submit" name='login' value="Masuk" />
<h5><a href="">Lupa kata sandi ?</a> atau <a href="">Mendaftar</a></h5><h5><a href="./">Kembali ke halaman utama</a></h5>
</form>
</div>
</body>
</html>