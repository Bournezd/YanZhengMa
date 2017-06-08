<!DOCTYPE html >
<html>
   <head>
      <meta charset="utf-8"/>
      <title>验证码</title>
   </head>
   <body>

<?php 

    if(isset($_REQUEST['yzmcode'])){
        session_start();
        if(strtolower($_REQUEST['yzmcode'])==$_SESSION['yzmcode']){
            //echo "输入正确";
            echo "<script>alert('验证成功')</script>";
        }else {
            //echo "输入错误";
            echo "<script>alert('验证失败')</script>";
        }
    }
?>


   <form method="post" action="./form.php">
   <p>
                    验证码
        <img border = "1" id="captcha_img" src="./captcha_chinese.php?r=<?php echo rand();?> style="width:430px;height:430px" />
        <!--1.新增“换一个”的文案2.JS选取验证码图片3.JS修改验证码图片地址    -->
        <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='./captcha_chinese.php?r='+Math.random()">换一个？</a>
   </p>
   <p>请输入验证码<input type="text" name="yzmcode" value="" /></p>
   <p> <input type="submit" value="提交" style="padding: 6px 20px;"/></p>
   </form>
   </body>
</html>