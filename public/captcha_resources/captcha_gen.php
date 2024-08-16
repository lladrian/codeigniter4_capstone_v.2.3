<?php
$session = \Config\Services::session();

//$session = \Config\Services::session();
$random_alpha = md5(rand()); //generation of random string
/** Generate a captcha of length 6 */
$captcha_code = substr($random_alpha, 0, 6);

// Store the captcha code in a session variable
//$_SESSION['captcha_code'] = $captcha_code;
//$session->set('captcha_code', $captcha_code);

/* Width and Height of captcha */
$target_layer = imagecreatetruecolor(170,50);
/* Background color of captcha */
$captcha_background = imagecolorallocate($target_layer, 255,255,255);
imagefill($target_layer,0,0,$captcha_background);
/* Captcha Text Color RGB */
$captcha_text_color = imagecolorallocate($target_layer, 39,55,70);

/* Text size and properties */
$font_size = 32; 
$img_width = 80;
$img_height = 48;
/** For Lines */
$line_color = imagecolorallocate($target_layer, 64,64,64); 
for($i=0;$i<6;$i++) {
    imageline($target_layer,0,rand()%50,200,rand()%50,$line_color);
}

/* For pixels */
$pixel_color = imagecolorallocate($target_layer, 0,0,255);
for($i=0;$i<1000;$i++) {
    imagesetpixel($target_layer,rand()%200,rand()%50,$pixel_color);
}  

/* Text Size */
/* Load the font file */
$font_file = 'Xpressive Bold.ttf'; // Assuming the font file is in the same directory

/* Render the captcha text onto the image */
imagettftext($target_layer, $font_size, 0, 25, 35, $captcha_text_color, $font_file, $captcha_code);

/* Output the image */
header("Content-type: image/jpeg");
imagejpeg($target_layer);

// Destroy the image to free up memory
imagedestroy($target_layer);
?>"