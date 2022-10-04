<?php
$conn = mysqli_connect("localhost","root",111111); # 변수conn을 통해서 sql서버 접속 정보, (접속하려는 서버, 사용자 아이디, 비번)
mysqli_select_db($conn,"opentutorials"); # db 선택, (sql서버 접속 정보를 담은 변수, 사용하려는 db이름)

$title = mysqli_real_escape_string($conn,$_POST['title']);
$author = mysqli_real_escape_string($conn,$_POST['author']);
$description = mysqli_real_escape_string($conn,$_POST['description']);

$sql = "SELECT * FROM user WHERE name='".$author."'";
$result = mysqli_query($conn,$sql);

if($result -> num_rows == 0){ # user테이블에 데이터가 없다면(서버로부터 전송된 데이터가 없다면) name추가해주기
  $sql = "INSERT INTO user (name,password)VALUES('".$author."'.'111111')";
  mysqli_query($conn,$sql); # 데베에 데이터 전송
  $user_id = mysqli_insert_id($conn); # 방금 추가한 데이터의 id값 알아내기
}
else{
  $row = mysqli_fetch_assoc($result);
  //var_dump($row); # 변수값 정보 출력 : array(3) { ["id"]=> string(1) "1" ["name"]=> string(6) "egoing" ["password"]=> string(6) "111111" }
  $user_id = $row['id'];
}
//exit; # 프로그램 중지

# sql에 form에서 작성한 데이터를 topic 테이블에 저장시키기
$sql = "INSERT INTO topic (title,description,author,created) VALUES('".$title."', '".$description."', '".$user_id."', now())";
$result = mysqli_query($conn,$sql); # 변수result에 db조회 데이터 할당
header('Location: http://localhost/index.php'); // location주소로 돌아가기
 ?>
