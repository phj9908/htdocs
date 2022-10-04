<html>
<head>
  <title></title>
</head>
    <body>
      <?php
        echo file_get_contents($_GET['id'].".txt"); # id값에 따라서 file을 읽도록 함
       ?>
    </body>
</html>
