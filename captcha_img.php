<?php
/*
 * 1.首先注意字符编码，由于这个文件一开始是GBK编码，所以验证的时候一直显示验证失败
 * 2.ob_clean()的使用：图片的输出之前不能有输出，所以使用ob_clean来清除缓存
 */
session_start();

$table=array(
    '1'=>'鸟',
    '2'=>'猩猩',
    '3'=>'松鼠',
    '4'=>'企鹅',
);
$index=rand(1,4);
$value=$table[$index];
$_SESSION['yzmcode']=$value;
//读取图片的路径并且得到内容
$filename=dirname(__FILE__)."/".$index.".png";
$getimgcontent=file_get_contents($filename);
ob_clean();
header('Content-type:image/png');
echo $getimgcontent;

?>
