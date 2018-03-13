<?php
$title = "Редатор новостей";
$style = "public/styles/newsEditor.css";
$script = "public/scripts/newsEditor.js";
    function createContent() { 
		global $conn, $user;
        if (empty($_POST["submit"])) {
?>

<h2>Добавление новости</h2>
<form action="#" method="post" enctype="multipart/form-data">
    Заголовок:<br>
    <input type="text" id="title" name="title" required>
    <br>
    Аннотация:<br>
    <textarea name="description" id="description" cols="80" rows="5" required></textarea>
    <br>
    Контент:<br>
    <textarea name="content" id="content" cols="80" rows="10" required></textarea>
    <br>
    Видео:<br>
    <textarea name="video" id="video" cols="80" rows="3" required></textarea>
    <br>
    Фото:<br>
    <input type="file" id="photo" name="photo" required>
    <p style="margin-top: 20px">
        <input type="submit" name="submit" value="Добавить">
        <input type="reset" name="reset" value="Отмена">
    </p>
</form>

<?php
        } else {
            echo("<h3 style='margin-top: 75px'>");
            
            // 1. Получение данных из формы:
			// =============================
			$title = $_POST["title"];
            $description = $_POST["description"];
            $content = $_POST["content"];
            $video = $_POST["video"];
            
			date_default_timezone_set("Europe/Kiev");
			$date = date("Y-m-d H:i:s");
			$status = "usual";
			$login = $user;
			
			$dirPath = "public/files/";
			$name = $_FILES["photo"]["name"];  // pinguens.jpg
			$photo = $dirPath.$name;
			
			// Переменные для проверки размера и типа файла:
			// =============================================
			$size = $_FILES["photo"]["size"];
			$type = $_FILES["photo"]["type"];
			
			$tempLocation = $_FILES["photo"]["tmp_name"];
			copy($tempLocation, $photo);

			//проверки
            $check = false;

            $size = $_FILES["photo"]["size"];
            if ( $size < 3*1024*1024 ) { 
                $check = true; 
            } else {
                echo("<span style= 'color: red'>");
                echo("<br><br>Размер не должен превышать 3 МБ");
                echo("</span>");
            }
            $type = $_FILES["photo"]["type"];
            if ( $type == "image/png" || $type == "image/jpeg" ) {
                $check = true;
            } else {
                echo("<span style= 'color: red'>");
                echo("<br><br>Формат должен быть png или jpeg");
                echo("</span>");           
            }

            if ($check) {
			// Запись данных в базу:
			// =====================
			$query = "INSERT INTO news (login, title, description, content, status, photo, video, date) VALUES ('$login', '$title', '$description', '$content', '$status', '$photo', '$video', '$date')";
			$conn->query($query);
			echo('Новость успешно добавлена. Вернуться к <a href="newsEditor" style="color: red;">редактору</a> новостей.');
            }
            echo("</h3>");
        }
    }