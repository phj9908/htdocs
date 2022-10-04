<?php
	// mysql 테이블의 데이터 조회

	$conn = mysqli_connect("localhost","root",111111); # 변수conn을 통해서 sql서버 접속 정보, (접속하려는 서버, 사용자 아이디, 비번)
	mysqli_select_db($conn,"opentutorials"); # db 선택, (sql서버 접속 정보를 담은 변수, 사용하려는 db이름)
	$result = mysqli_query($conn,"SELECT * FROM topic"); # 변수result에 db조회 데이터 할당

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="http://localhost/style.css">

</head>
<body id = 'target'>
	<header>
		<h1><a href="http://localhost/">JavaScript</a></h1>
		<img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩 이미지">
	</header>
	<nav>
		<ol>
			<?php
			// mysql 테이블의 데이터 출력

			while($row = mysqli_fetch_assoc($result)){ # 자바의 Scanner.hasNextLine()과 같은 역할,
				# $row가 null이 아니라면 반복

				echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";


			// $row = mysqli_fetch_assoc($result); # 변수 row에 result의 데이터중에서 첫번째 행의 데이터만을 연관배열의 형식으로 할당
			// echo $row['id'];
			// echo $row['title'];
			// echo "<br/>"; 줄 한 칸 공백
			}
			 ?>
		</ol>
	</nav>
	<div id = "control">
		<input type="button" value="white" onclick="document.getElementById('target').className='white'"/>
		<input type="button" value="black" onclick="document.getElementById('target').className='black'"/>
		<a href="http://localhost/write.php">쓰기</a>
	</div>
	<article>
		<form action="process.php" method="post">
			<p>
				제목:<input type="text" name="title">
			</p>
			<p>
				작성자: <input type="text" name="author">
			</p>
			<p>
				본문: <textarea name="description"></textarea>
			</p>
			<input type="submit" name="name">
		</form>
	</article>
</body>
</html>
