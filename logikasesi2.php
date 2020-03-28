<?php
if(isset($_SESSION['id_customer']))
		{	$sc = mysql_query("select Email from tbl_customer where IdCostumer='".$_SESSION['id_customer']."'");
$c = mysql_fetch_array($sc);
			echo"<a href='./keluar.aspx'><small style='color:white;margin:0;background:#FF3338;padding:5px;border-radius:3px;font-size:small; cursor:pointer;'>Keluar</small></a> <small style='color:white;margin:0;background:#ccc;padding:5px;border-radius:3px;font-size:small; cursor:normal;'>$c[Email]</small> <a href='./keranjang.aspx'><small style='color:white;background:#07c;margin:0;padding:5px;border-radius:3px;font-size:small; cursor:pointer;'>Pesanan</small></a>";
		}
		elseif(isset($_SESSION['admin'])) 
		{
	echo"<a href='/keluar.aspx'><small style='color:white;margin:0;background:#FF3338;padding:5px;border-radius:3px;font-size:small; cursor:pointer;'>Keluar</small></a> <small style='color:white;margin:0;background:#ccc;padding:5px;border-radius:3px;font-size:small; cursor:pointer;'>Administrator</small> <a href='/admin-panel'><small style='color:white;background:#07c;margin:0;padding:5px;border-radius:3px;font-size:small; cursor:pointer;''>Dashboard</small></a>";
		}
		else{
		include('loginsidebar.php'); 
		}
?>