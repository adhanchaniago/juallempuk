// JavaScript Document
$(document).ready(function(){

function hitung()
{
	var harga = $("#harga").val();
	var jumlah = $("#jml").val();
	var stock = $("#stock").val();
		if(harga>0 && jumlah>0)
			{	var jml = parseInt(jumlah);
				if(jml>stock)
				{
					alert('Stock tidak cukup');
					$("#jml").val('');
				}
				else
				{
				var total = parseInt(harga) * parseInt(jumlah);
				$("#byr").val(total);
				}
				}
		else
			{
				$("#byr").val('');
			}
}
$("#jml").keyup(function()
{
hitung();
});
});
