<div id='content'>
<div class='isi'>
<h3>Tentang Kami</h3>
<blockquote>
<?php
$uk = mysql_query("select Tentang from tbl_admin");
$s = mysql_fetch_array($uk);
echo $s['Tentang'];
?>
</blockquote>
</div>
</div>