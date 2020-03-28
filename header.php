<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo"$head_title"; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="shortcut icon" href="./favicon.ico"/>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<!--Body Start!-->
<body>
<div id='header-wrap'>
<div id='header'>
<a href='./'><img src="img/logu.png" /></a>
</div>
</div>
<div id='header-link'>
<a href='./'><img src="img/home.png" style="float:right;margin:0 auto;"/></a>
	<div id='link-wrap'>
	<div class='login'>
	<img src="img/ik.png" style='float:left;margin:-10px 5px 0 0;padding:0;width:40px;' />
	<?php
	require('logikasesi.php');
	
	?>
	</div>
	<ul id='links'>
	<li><a href="./">Produk</a></li>
	<li><a href="./tentang.aspx">Tentang</a></li>
	<li><a href="./testimonial.aspx">Testimonial</a></li>
	</ul>
	</div>
	</div>
<div id="slide">
<div id="wrapper">
<script type="text/javascript">
$(document).ready(function(){
$('#logsidebar').hide();
$(".lg").click(function(){
$(".lg").hide();
$('#logsidebar').show();

});
});
</script>
<div style='float:left;margin:5px 0 0 0;'>
<?php include('logikasesi2.php'); ?>
</div>
<ul id='links'>	
	<li><a href="./">Produk</a></li>
	<li><a href="./tentang.aspx">Tentang</a></li>
	<li><a href="./testimonial.aspx">Testimonial</a></li>
	</ul>
</div>
</div>
<div id="wrapper">