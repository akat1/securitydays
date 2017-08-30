<?php

    if (isset($_GET["year"]))
    {
	if ( strlen($_GET["year"]) > 0 )
	    $filename = $_GET["year"];
	else
	    $filename = "non";
    }
    else
    {
	$filename = "non";
    }

    header("Content-Type: image/png");

    $image = imagecreatefrompng("plot.png");
   // $image = imagecreate(400,257); 
    
    for ( $x = 0 ; $x <= 255 ; $x++ ) 
	$pal[$x] = imagecolorallocate($image,$x,0,0);

    if ( !file_exists($filename) )
	die();

    $fh = fopen($filename,"r");
    $x=22;
    while ( false !== ($c = fgetc($fh)) ) {
	imagesetpixel($image,$x++,277-ord($c),$pal[255]);
	imagesetpixel($image,$x++,277-ord($c),$pal[255]);
    }
    
    imagepng($image);
    imagedestroy($image);

?>
