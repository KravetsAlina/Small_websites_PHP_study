<?php
$title = "Регистрация";
$script = "public/scripts/reg.js";
$style = "public/styles/reg.css";
    function createContent() { 
        global $conn;
        if (empty($_POST["submit"])) {
?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-md-12 text-center">
                <h2>Регистрация</h2>
                <form action="#" method="post">
                    Логин:<br>
                    <input type="text" id="login" name="login" required>
                    <br>
                    Пароль:<br>
                    <input type="password" id="pass1" name="pass1" required>
                    <br>
                    Повтор:<br>
                    <input type="password" id="pass2" name="pass2" required>
                    <br>
                    E-Mail:<br>
                    <input type="email" id="email" name="email" required><br>
                    <p style="margin-top: 20px">
                        <input type="submit" name="submit" value="Отправить">
                        <input type="reset" name="reset" value="Очистить">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
        } else {
            echo("<h3>");
            
            // 1. Получение данных из формы:
            // =============================
            $login = $_POST["login"];
            $pass1 = $_POST["pass1"];
            $pass2 = $_POST["pass2"];
            $email = $_POST["email"];
            
            // 2. Проверка корректности данных:
            // ================================
                 $error = false;//Создаем переменную, контролирующую ошибки регистрации.
                $errortext = "<p><b><font color='red'><h3>При регистрации на сайте произошли следующие ошибки:</h3></font></p><ul>";



                if (!preg_match("/^[a-z0-9]{2,20}$/i",$login))
                {
                $error = true;
                $errortext .= "<li><font color='red'>Убедитесь что Логин содержит от 2 до 20 символов, и состоит из латинских символов и цифр</font></li>";
                }

                if (!preg_match("/^[a-z0-9]{3,20}$/i",$pass1))
                {
                $error = true;
                $errortext .= "<li><font color='red'>Убедитесь что Пароль содержит от 3 до 20 символов, и состоит из латинских символов и цифр</font></li>";
                }

                if ($pass1 !== $pass2)
                {
                $error = true;
                $errortext .= "<li><font color='red'>Пароли не совпали</font></li>";
                }

                if (!preg_match("/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i",$email))
                {
                $error = true;
                $errortext .= "<li><font color='red'; size: '14px'>Не правильно заполнено поле E-Mail. E-mail должен иметь вид user@somehost.com</font></li>";
                }
                $errortext .= "<li><font color='red'><br><br>Вернуться к форме <a href='reg'>регистрации</a></font></li>";
                $errortext .= "</ul></b>";
                if ($error)
                {
                echo($errortext);//Выводим текст ошибок.
                } else {
                // 3. Предварительная обработка:
                // =============================
                $login = htmlspecialchars($login);
                $passw = md5($pass1);
                date_default_timezone_set("Europe/Kiev");
                $regdate = date("Y-m-d H:i:s");
                $status = "norm";
            
                // 4. Запись данных в базу:
                // ========================
                $query = "INSERT INTO users (login, passw, email, regdate, status) VALUES ('$login', '$passw', '$email', '$regdate', '$status')";
                $conn->query($query);
                echo("Регистрация успешна");
            }
            echo("</h3>");
        }
    }