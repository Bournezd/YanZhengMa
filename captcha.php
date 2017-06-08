<?php
    session_start();
    $yan_code='';
    $img=imagecreatetruecolor(100, 30);
    //设置图片以png图片形式输出
    $white=imagecolorallocate($img, 255, 255, 255);
    imagefill($img, 0, 0, $white);
    //四位数数字的验证码循环一个一个取值
   /*  for($i=0;$i<4;$i++){
        $fontsize=5;
        //设置宽高的长度都为变值，但是都是在合理的显示范围之内
        $x=($i*100/4)+rand(5, 15);
        $y=rand(5,15);
        //显示的内容，在0-9之间随机取值
        $content=rand(0,9);
        $pngcolor=imagecolorallocate($img, rand(0,120), rand(0,120), rand(0,120));
        imagestring($img, $fontsize, $x, $y, $content, $pngcolor);
    } */
    //数字加字母的验证码
    for($i=0;$i<4;$i++){
        $fontsize=5;
        $x=($i*100/4)+rand(5,5);
        $y=rand(5,5);
        $con="abcdefghijklmnopqrstuvwxyz123456789";
        $content=substr($con, rand(0,strlen($con)-1),1);
        //因为每一次只生成一个字母，所以每次都把生成的连接起来才是总的验证码
        $yan_code.=$content;
        $contentcolor=imagecolorallocate($img, rand(0,120), rand(0,120), rand(0,120));
        imagestring($img, $fontsize, $x, $y, $content, $contentcolor);
    }

        $_SESSION['yzmcode']=$yan_code;  
    //设置噪点
    for($i=0;$i<100;$i++){
        $pixcolor=imagecolorallocate($img,rand(0,120), rand(0,120), rand(0,120));
        //设置噪点在xy轴什么地方一什么颜色显示出来
        imagesetpixel($img,rand(0,100),rand(0,30),$pixcolor);
    }
    //设置干扰线条
    for($i=0;$i<3;$i++){
        $linecolor=imagecolorallocate($img,rand(0,120), rand(0,120), rand(0,120));
        imageline($img, rand(1,100), rand(1,30), rand(1,100), rand(1,30), $linecolor);
    }
    
    //显示图像
    header('Content-type:image/png');
    imagepng($img);
    //销毁图片
    imagedestroy($img);
     
?>