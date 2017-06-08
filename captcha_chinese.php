<?php
    session_start();
    $yan_code='';
    $img=imagecreatetruecolor(200, 50);
    $white=imagecolorallocate($img, 255, 255, 255);
    imagefill($img, 0, 0, $white);
    //设置文字的验证码
    for($i=0;$i<4;$i++){
       $fontface="simkai.ttf";
       //$strdb=array("我","是","周","达");
       $str="一二三四五六七八九十";
       //str_split将字符切割放到数组中去，一个汉字占3个字符
       $strdb=str_split($str,3);
       /* header("Content-type:text/html;charset='utf-8'");
       var_dump($strdb);
       die(); */
       //下面两行意思是从str里面随机拿一个文字作为内容输出
       $randnum=rand(0,count($strdb)-1);  
       $text=$strdb[$randnum];
       $contentcolor=imagecolorallocate($img, rand(0,120), rand(0,120), rand(0,120));
       $yan_code.=$text;
       imagettftext($img,mt_rand(20,24), mt_rand(-60,60), (40*$i+20), mt_rand(30,35), $contentcolor, $fontface, $text);
    }

        $_SESSION['yzmcode']=$yan_code;  
        //设置噪点
    for($i=0;$i<100;$i++){
        $pixcolor=imagecolorallocate($img,rand(0,120), rand(0,120), rand(0,120));
        imagesetpixel($img,rand(0,200),rand(0,50),$pixcolor);
    }
    //设置干扰线条
    for($i=0;$i<3;$i++){
        $linecolor=imagecolorallocate($img,rand(0,120), rand(0,120), rand(0,120));
        imageline($img, rand(1,200), rand(1,50), rand(1,200), rand(1,50), $linecolor);
    }
    
    header('Content-type:image/png');
    imagepng($img);
    imagedestroy($img);
     
?>