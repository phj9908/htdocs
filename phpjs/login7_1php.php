<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
      $password =  $_GET["password"];
      // 사용자가 login7_php.php에서 입력한 password의 값 받아오기
      // 사용자가 입력한 주소창 정보중에 'password=' 뒤의 값 받아오기

      if($password =="1111"){
        echo "환영합니다";
      }else{
        echo "접근 불가";
      }
     ?>
  </body>
</html>
