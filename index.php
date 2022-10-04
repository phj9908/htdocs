<?php
	// mysql 테이블의 데이터 조회

	require("config/config.php"); // $config배열을 정의한 파
	require("lib/db.php"); // 라이브러리
	$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
	$result = mysqli_query($conn, "SELECT * FROM topic");

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
	<?php
	// 맨 뒤 주소의 id 에 따라 mysql의 id에 따른 데이터 출력
	if(empty($_GET['id'])===false){
		// user 테이블과 topic테이블에서 필요한 칼럼들 가져오기
		$sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];

		$result = mysqli_query($conn,$sql); // 만든 쿼리를 접속한 데베서버로 전송?
		$row = mysqli_fetch_assoc($result); // 해당 행 데이터

		echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
      echo '<p>'.htmlspecialchars($row['name']).'</p>';
      echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
	}
	?>
	</article>
</body>
</html>
