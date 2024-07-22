<?php

// link to the font file no the server
$fontname = 'font/impact.ttf';
// controls the spacing between text

//JPG image quality 0-100
$quality = 100;

function create_image($user){
$i=30;

		global $fontname;	
		global $quality;
		$file = "meme/Like_@BasRehanDe_".md5($user[0]['name'].$user[1]['name'].$user[2]['name']).".jpg";	
	
	// if the file already exists dont create it again just serve up the original	
	//if (!file_exists($file)) {	
			

			// define the base image that we lay our text on
			$im = imagecreatefromjpeg("pass.jpg");
			
			// setup the text colours
			$color['black'] = imagecolorallocate($im, 0, 0, 0);
			
			// this defines the starting height for the text block
			$y = imagesy($im) - 425;
			 
		// loop through the array and write the text	
		foreach ($user as $value){
			// center the text in our image - returns the x value
			$x = center_text($value['name'], $value['font-size']);	
			imagettftext($im, $value['font-size'], 0, $x, $y + $i, $color[$value['color']], $fontname,$value['name']);
			// add 32px to the line height for the next text block
			$i = $i + 42;	
			
		}
			// create the image
			imagejpeg($im, $file, $quality);
			
	//}
						
		return $file;	
}

function center_text($string, $font_size){

			global $fontname;

			$image_width = 500;
			$dimensions = imagettfbbox($font_size, 0, $fontname, $string);
			
			return ceil(($image_width - $dimensions[4]) / 2);				
}



	$user = array(
	
		array(
			'name'=> 'Agar Fast Karne Se God Khush', 
			'font-size'=>'27',
			'color'=>'black'),
			
		array(
			'name'=> 'Hote Toh Bhikhari Sabse',
			'font-size'=>'27',
			'color'=>'black'),
			
		array(
			'name'=> 'Sukhi Insaan Hote',
			'font-size'=>'27',
			'color'=>'black'
			)
			
	);
	
	
	if(isset($_POST['submit'])){
	
	$error = array();
	
		if(strlen($_POST['name'])==0){
			$error[] = '<style>
					.input1{
						background-color:#FFEAEA!important;
						border-color:#C10F0F!important;
					}
					::-webkit-input-placeholder {
						color:#999;
					}	
					:-moz-placeholder {
						color:#999;
					}
					::-moz-placeholder {
						color:#999;
					}
					:-ms-input-placeholder {
						color:#999;
					}
					.input1::-webkit-input-placeholder
					{
						color:#C10F0F;
					}	
			</style>';
		}
		
		if(strlen($_POST['job'])==0){
			$error[] = '<style>
					.input2{
						background-color:#FFEAEA!important;
						border-color:#C10F0F!important;
					}
					::-webkit-input-placeholder {
						color:#999;
					}	
					:-moz-placeholder {
						color:#999;
					}
					::-moz-placeholder {
						color:#999;
					}
					:-ms-input-placeholder {
						color:#999;
					}
					.input2::-webkit-input-placeholder
					{
						color:#C10F0F;
					}	
			</style>';
		}		
		
	if(count($error)==0){
		
	$user = array(
	
		array(
			'name'=> $_POST['name'], 
			'font-size'=>'27',
			'color'=>'black'),
			
		array(
			'name'=> $_POST['job'],
			'font-size'=>'27',
			'color'=>'black'),
			
		array(
			'name'=> $_POST['email'],
			'font-size'=>'27',
			'color'=>'black'
			)
			
	);		
		
	}
		
	}

// run the script to create the image
$filename = create_image($user);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bas Rehan De Meme Creator by Harman Singh Hira</title>
<meta name="description" content="Bas Rehan De is the most Stylish and Simple Meme Creator build by Harman Singh Hira in PHP Language."/>
<meta name="robots" content="noodp"/>
<meta name="keywords" content="Meme Creator, Bas Rehan De, Jo Baka"/>
<link rel="canonical" href="http://www.ultimatetech.org/meme" />
<link rel="publisher" href="https://plus.google.com/114476577676567904806"/>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Bas Rehan De Meme Creator by Harman Singh Hira" />
<meta property="og:description" content="Bas Rehan De is the most Stylish and Simple Meme Creator build by Harman Singh Hira in PHP Language." />
<meta property="og:url" content="http://www.ultimatetech.org/meme" />
<meta property="og:site_name" content="Bas Rehan De Meme Creator by Harman Singh Hira" />
<meta property="fb:app_id" content="1535434950082609" />
<meta property="og:image" content="./logo.png" />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:description" content="Bas Rehan De is the most Stylish and Simple Meme Creator build by Harman Singh Hira in PHP Language."/>
<meta name="twitter:title" content="Bas Rehan De Meme Creator by Harman Singh Hira"/>
<meta name="twitter:site" content="@hsinghhira"/>
<meta name="twitter:image" content="./logo.png"/>
<link href="../style.css" rel="stylesheet" type="text/css" />

<style>
body {
	background-color:#f8d344;
	}
input{
	border:1px solid #ccc;
	padding:8px;
	font-size:14px;
	width:300px;
	}
	
.submit{
	width:110px;
	background-color:#FF6;
	padding:3px;
	border:1px solid #FC0;
	margin-top:20px;
	}
.fb_like_box {
    margin-top: 21px;
    -moz-border-radius: 10px 10px 10px 10px;
    border-radius: 7px;
    border: 10px solid #000;
    margin-bottom: 10px;
    padding: 14px 9px;
    width: 464px;
}

.fb_like_button_holder {
    -moz-border-radius: 10px 10px 10px 10px;
    background-color: transparent;
    width: 475px;
    height: 61px;
	padding: 3px 0px 5px 9px;
}
.fb_like_top {
    overflow: visible;
    padding: 0;
    margin: 0px 12px 12px;
    width: 443px;
    height: 30px;
    background: url("./like.png") no-repeat scroll left top transparent;
}
.download {
    width: 250px;
    background-color: #000;
    color: #f8d344;
    border-color: #000;
    border-radius: 5px;
    padding: 6px 88px 9px 88px;
    font-family: Tahoma;
}
.input1, .input2 {
	background-color:#fae595;
	border-color:#000;
}
</style>

</head>

<body>
<script>(function(d){
  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
  js = d.createElement('script'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  d.getElementsByTagName('head')[0].appendChild(js);
}(document));

</script>
<br/><br/>
<div class="main">

<div  style="float:right;width:49%">
<img src="<?=$filename;?>?id=<?=rand(0,1292938);?>&by=HSinghHira" width="500" height="500" style="border: 10px solid #000;border-radius: 5px;"/><br/><br/>
</div>

<div style="float:left;width:49%">


<div class="dynamic-form" style="float:right;width:500px">
<img src="./head.png" style="margin-bottom:21px"/>

<?php if(isset($error)){
	
	foreach($error as $errors){		
		echo $errors;
	}
	
	
}?>

<form action="" method="post" autocomplete="off">
<input type="text" class="input1" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" name="name" maxlength="30" placeholder="First Text" style="width:483px;border-radius: 5px;"><br/><br/>
<input type="text" class="input2" value="<?php if(isset($_POST['job'])){echo $_POST['job'];}?>" name="job" maxlength="30" placeholder="Second Text" style="width:483px;border-radius: 5px;"><br/><br/>
<input type="text" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" name="email" maxlength="30" placeholder="Third Text" style="background-color:#fae595;border-color:#000;width:483px;border-radius: 5px;"><br/><br/>
<input name="submit" type="submit" class="btn btn-primary" value="Update Meme"  style="width:250px;background-color:#000;color:#f8d344;border-color:#000;border-radius: 5px;font-family: Tahoma;"/>
<a class="download" href="<?=$filename;?>" download="<?=$filename;?>" style="background-color: #000;color: #f8d344;border-color: #000;border-radius: 5px;padding: 10px 72px 10px 72px;font-family: Tahoma;text-decoration: none;font-size: 14px;">Download Meme</a>
</form>

<div class='fb_like_box'>
<div class='fb_like_top'>

</div>
<div class='fb_like_button_holder'>

<div class="fb-follow" id="fboverlay" data-href="https://www.facebook.com/hsinghhira" data-layout="box_count" data-show-faces="false"></div>
<div class="fb-like" data-href="https://facebook.com/basrehande" data-layout="box_count" data-action="recommend" data-show-faces="false" data-share="false" style="margin-left: 5px;"></div>
<div class="fb-like" data-href="https://facebook.com/officialhsh" data-layout="box_count" data-action="recommend" data-show-faces="false" data-share="false" style="margin-left: 5px;"></div>
<div class="fb-like" data-href="https://facebook.com/BaatSunOfficial" data-layout="box_count" data-action="recommend" data-show-faces="false" data-share="false" style="margin-left: 5px;"></div>
<div class="fb-follow" data-href="https://www.facebook.com/jatthira" data-layout="box_count" data-show-faces="false" style="margin-left: 5px;"></div>

<svg height="0" width="0">
  <filter id="fb-filter">
    <feColorMatrix type="hueRotate" values="160"/>
  </filter>
</svg>
<style>
  .fb-like, .fb-send, .fb-share-button, .fb-follow {
    -webkit-filter: url(#fb-filter); 
    filter: url(#fb-filter);
  }
</style>
</div>
</div>

</div>
</div>

</div>


</body>
</html>
