<div id='content'>
<div class='isi'>
<h3>Registrasi</h3>
<div id='register'>
<style type="text/css">
h4 { font-size: 18px; }
input { padding: 3px; border: 1px solid #999; }
input.error, select.error { border: 1px solid red; }
label.error { color:red; margin-top: -30px;margin-right:-80px;text-align:right; }
td { padding: 5px; }
</style>
<form id="regForm" action='submit.php' method="POST">
<table width="800" align='center' border="0">
<tr>
	<td>
<h4>Nama</h4>
	</td>
	<td>
<input type='text' class="required" placeholder='Nama' name='nama'/>
	</td>
</tr>
<tr>
	<td>
<h4>Email</h4>
	</td>
	<td>
<input type="text" name="email" placeholder='contoh@email.com' class="required"/>
	</td>
</tr>
<tr>
<td>
<h4>Kata Sandi</h4>
</td>
<td>
<input type='password' placeholder='123456' class='required' title="Kata sandi harus di isi" name='pass'/>
</td>
</tr>
<tr>
<td><h4>Alamat Jalan</h4></td>
<td>
<input placeholder='Jl. Sudirman NO.3' class='required' title="Alamat harus di isi" type='text' name='alamat'/>
</td></tr>
<tr><td><h4>Provinsi</h4></td>
<td>
<script type="text/javascript" src="js/ajax_kota.js"></script>
<select class='required' title="Silahkan pilih propinsi" name="prop" id="prop" onchange="ajaxkota(this.value)">
<option value="">Pilih Provinsi</option>
<?php 
$queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){
echo '<option value="'.$dataProvinsi['lokasi_propinsi'].'">'.$dataProvinsi['lokasi_nama'].'</option>';
					}
?>
</select>
</td></tr>
<tr><td><h4>Kab/Kota</h4></td><td>
<select class='required' title="Silahkan pilih Kabupaten" name="kota" id="kota" onchange="ajaxkec(this.value)">
<option value="">Pilih Kota</option>
</select>
			</td></tr>
<tr><td><h4>Kecamatan</h4></td><td>
<select class='required' title="Silahkan pilih Kecamatan" name="kec" id="kec" onchange="ajaxkel(this.value)">
<option value="">Pilih Kecamatan</option>
</select>
			</td></tr>
<tr>
<td>
<h4>Kode Pos</h4>
</td>
<td>
<input class='required' placeholder='Kode 5 Digit' title="Masukkan Kode POS" type='text'  name='poskode'/>
</td></tr>
<tr><td><h4>Telp/Hp</h4></td>
<td>
<input class="required" placeholder='0812123456789' title="Isi Nomor Handphone" type="text" class="nama" name="nohp"/></td></tr>
<tr><td colspan='2' align="right">
<input name="daftar" type="submit" class="send" value='Registrasi'/></td></tr>
</table>
</form> 
<div id="error">
&nbsp;
</div>
</div>
</div>
</div>