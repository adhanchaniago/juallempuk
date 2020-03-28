<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $head_title;?></title>
<link href="cssnya.css" rel="stylesheet" />
<link href="style.css" rel="stylesheet" />
<script type="text/javascript" src="tinyeditor.js"></script>
</head>
<body>
<div id='logo'>
<div class='logo'>
	<a href='../'><img src="../img/logu.png" style='float:left;'/></a>
	<div style="float:right;margin:10px 0 0 0;"><a href='/admin-panel/?show=logout'><small style='color:white;margin:0;background:#FF3338;padding:5px;border-radius:3px;font-size:small; cursor:pointer;' class='log'>Keluar</small></a> <small style='color:white;margin:0;background:#ccc;padding:5px;border-radius:3px;font-size:small; cursor:normal;'>Administrator</small> <a href='../'><small style='color:white;background:#07c;margin:0;padding:5px;border-radius:3px;font-size:small; cursor:pointer;' class='log'>Lihat Toko</small></a>
</div>
</div></div>
<div id='wrapper'>
	<div id='header'>		
		<div id='menu-top'>
		<center><h3>
		<?php
		require('judul.php'); 
		echo $title;
		?></h3></center>
		</div>
	</div>