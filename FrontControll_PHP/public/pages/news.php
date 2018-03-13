<?php
$title = "Новости";
$style = "public/styles/news.css";
function createContent() {  
		global $user, $conn;     
?>

 	<div class="container">
 		<div class="row">
			<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">	
					<h2 style="color: #2E4D30; font-size: 24pt;">Новости</h2>
					<br>
<?php if ($user == "moder") { ?>
	<a href="newsEditor" style="color: red;">Добавить новость</a>
<?php 
		}
		//1 получение данных:
		$query = "SELECT * FROM news";
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
?>
		<!-- 2 Отображение данных: -->
			<h3><?=$row["title"]?></h3>
			<hr style = "border-color: grey">
			<img width ="500" src="<?=$row['photo']?>">
			<p style="font-size: 13pt"><?=$row["description"]?></p>
			<p style="border: 1px solid silver; padding: 10px"><?=$row["content"]?> <p>
			<p><?=$row["video"]?> <p>
			<h4 style="color: #2E4D30;">Автор: <?=$row["login"]?>;    Дата: <?=$row["date"]?></h4>
		<!-- ===================== -->
<?php
		}
	}
?>
			</div>
		</div>
	</div>