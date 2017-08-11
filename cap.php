<?php 
   session_start();
   $capKod=substr(sha1(rand(0,999999)),2,6);
   $font="./Kleymissky.otf";
   $_SESSION['capKod']=$capKod;
   $yaziRenkleri = array("#FF4040", "#FF7F24", "#7FFFD4", "#6A5ACD", "#87CEFA","#6495ED","#00CD00");
   $arkaplanRenkleri = array("#CAFF70", "#F5FFFA", "#8B3A62", "#FF1493", "#8B0000","#030303","#8B795E");


   $capResim=imagecreate(120, 60);
   $a=rand(0, 6);
   list($r, $g, $b) = sscanf($yaziRenkleri[$a], "#%02x%02x%02x");
   list($rx, $gx, $bx) = sscanf($arkaplanRenkleri[$a], "#%02x%02x%02x");


   $capResimPx=imagecolorallocate($capResim, rand(0,255), rand(0, 255), rand(0, 255));
   $capResimYaziRengi=imagecolorallocate($capResim, $r, $g, $b);
   $capResimArkaPlan=imagecolorallocate($capResim, $rx, $gx, $bx);

   //$capResimYaziRengi=imagecolorallocate($capResim, rand(0,255), rand(0, 255), rand(0, 255));
   //$capResimArkaPlan=imagecolorallocate($capResim, rand(0,255), rand(0, 255), rand(0, 255));
   
   imagefill($capResim, 4, 5, $capResimArkaPlan);
   $aci = rand(-12,12);
   
   ImageTTFText($capResim,30,$aci,20,40,$capResimYaziRengi,$font,$capKod);
   
   //imagefilter($capResim, IMG_FILTER_PIXELATE, 2);
   imageline($capResim, 10, 30, 110, 30-$aci, $capResimPx);

   header("Content-Type: img/png");
   imagepng($capResim);
   imagedestroy($capResim);
?>