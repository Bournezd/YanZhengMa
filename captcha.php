<?php
    session_start();
    $yan_code='';
    $img=imagecreatetruecolor(100, 30);
    //����ͼƬ��pngͼƬ��ʽ���
    $white=imagecolorallocate($img, 255, 255, 255);
    imagefill($img, 0, 0, $white);
    //��λ�����ֵ���֤��ѭ��һ��һ��ȡֵ
   /*  for($i=0;$i<4;$i++){
        $fontsize=5;
        //���ÿ�ߵĳ��ȶ�Ϊ��ֵ�����Ƕ����ں������ʾ��Χ֮��
        $x=($i*100/4)+rand(5, 15);
        $y=rand(5,15);
        //��ʾ�����ݣ���0-9֮�����ȡֵ
        $content=rand(0,9);
        $pngcolor=imagecolorallocate($img, rand(0,120), rand(0,120), rand(0,120));
        imagestring($img, $fontsize, $x, $y, $content, $pngcolor);
    } */
    //���ּ���ĸ����֤��
    for($i=0;$i<4;$i++){
        $fontsize=5;
        $x=($i*100/4)+rand(5,5);
        $y=rand(5,5);
        $con="abcdefghijklmnopqrstuvwxyz123456789";
        $content=substr($con, rand(0,strlen($con)-1),1);
        //��Ϊÿһ��ֻ����һ����ĸ������ÿ�ζ������ɵ��������������ܵ���֤��
        $yan_code.=$content;
        $contentcolor=imagecolorallocate($img, rand(0,120), rand(0,120), rand(0,120));
        imagestring($img, $fontsize, $x, $y, $content, $contentcolor);
    }

        $_SESSION['yzmcode']=$yan_code;  
    //�������
    for($i=0;$i<100;$i++){
        $pixcolor=imagecolorallocate($img,rand(0,120), rand(0,120), rand(0,120));
        //���������xy��ʲô�ط�һʲô��ɫ��ʾ����
        imagesetpixel($img,rand(0,100),rand(0,30),$pixcolor);
    }
    //���ø�������
    for($i=0;$i<3;$i++){
        $linecolor=imagecolorallocate($img,rand(0,120), rand(0,120), rand(0,120));
        imageline($img, rand(1,100), rand(1,30), rand(1,100), rand(1,30), $linecolor);
    }
    
    //��ʾͼ��
    header('Content-type:image/png');
    imagepng($img);
    //����ͼƬ
    imagedestroy($img);
     
?>