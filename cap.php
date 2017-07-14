<?php 
   session_start();
   $capKod=substr(md5(rand(0,999999)),2,6);
   $font="./Kleymissky.otf";
   $_SESSION['capKod']=$capKod;

   $capResim=imagecreate(120, 60);
   $capResimPx=imagecolorallocate($capResim, rand(0,255), rand(0, 255), rand(0, 255));
   $capResimYaziRengi=imagecolorallocate($capResim, rand(0, 255), rand(0, 255), rand(0, 255));
   $capResimArkaPlan=imagecolorallocate($capResim, rand(0, 255), rand(0, 255), rand(0, 255));
   
   
   imagefill($capResim, 4, 5, $capResimArkaPlan);
   $aci = rand(-12,12);
   imagettftext($capResim,30,$aci,20,40,$capResimYaziRengi,$font,$capKod);
   
   imagefilter($capResim, IMG_FILTER_PIXELATE, 2);
   imageline($capResim, 10, 30, 110, 30-$aci, $capResimPx);

   header("Content-Type: img/png");
   imagepng($capResim);
   imagedestroy($capResim);
	
?>