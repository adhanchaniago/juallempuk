<?php

	include "resize.php";
	
	/* artikelnya sebelah sini, judul, konten, dan intro konten */
	$post_title = "Belajar Desain Grafis : Membuat Logo Apple";
	$post_content = '<p><img src="coreldraw-tutorial.jpg" 
/>Baiklah kali ini kita akan membahas <strong>belajar desain 
grafis</strong> dasar, atau <a href="#">belajar desain 
grafis</a> untuk pemula. Banyak sekali <strong>tutorial 
coreldraw</strong> – <a href="#">tutorial 
coreldraw</a> yang tersebar di dunia maya, yang mana Anda bisa 
menerawangnya lewat mbah google. Perihal tutorial corel draw didunia 
maya banyak sekali namun sayangnya penyajiannya masih kurang 
terstruktur, oleh karena itu kami akan mencoba melakukan pembahasan 
belajar desain grafis dasar menggunakan corel draw secara lebih 
terstruktur. Di awali dengan bagian yang pertama ini. Yakni Belajar 
Desain Grafis Dasar, Membuat Logo Apple.</p>';

	$post_intro = substr(strip_tags($post_content),0,500).'[...]';
	/* ambil gambar pertama */
	$get_image_tmb = catch_that_image($post_content);
	
	/* proses resize */
	$image = resize_image($get_image_tmb,300,200);
	
	/* function resize image */
	function resize_image($image=NULL,$w=100,$h=100){
		$resimage = NULL;	
		if($image != NULL){
			/* mengambil jenis ekstensi gambarnya, misalnya .jpg */
			$get_extension = strrpos($image,'.');
			$ext = substr($image, $get_extension);
			
			/* ganti namanya dari image asli misal dari coreldraw.jpg menjadi 
coreldraw_300x200.jpg */
			$replace_name = str_replace($ext, '_'.$w.'x'.$h.$ext, $image);
			
			/* resize image */
			$resize = new ResizeImage($image);
			$resize->resizeTo($w, $h);
			$resize->saveImage($replace_name);	
		}
		
		return $replace_name;
	}
	
	function catch_that_image($post) {
		$first_img = NULL;
		
		/*  */
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', 
$post, $matches);
		$first_img = $matches [1][0];
		return $first_img;
	}
?>

<html>
	<head>
		<title></title>
		<style type="text/css">
			body{font-size:12px;font-family:Arial;background:#fafafa;}
			h1,p{margin:0;padding:0;}
			h1{line-height:20px;margin:0 0 15px 0;}
			p{line-height:18px;	}
			#wrapthumb{width:50%;height:auto;padding:40px;margin:15% 
auto;border:1px solid #dfdfdf;background:#fff;box-shadow:0 0 15px #eee;}
			#wrapthumb img{width:300px;height:200px;float:left;border:1px solid 
#efefef;padding:5px;margin:0 20px 20px 0;}
		</style>
	</head>
	<body>
		<div id="wrapthumb">
			<img src="<?php echo $image;?>" /><h1><?php echo
 $post_title;?></h1>
			<p><?php echo $post_intro;?></p>
		</div>
	</body>
</html>