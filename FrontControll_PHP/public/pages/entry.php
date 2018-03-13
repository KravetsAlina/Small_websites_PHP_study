<?php
$title = "Вход";
$script = "public/scripts/entry.js";
$style = "public/styles/entry.css";
function createContent(){  
	global $conn;
  if (empty($_POST["submit"])) {    
?>

<div class="container">
	<div class="row">
    <div class="box">
			<div class="col-md-12 text-center">
					<h2>Вход</h2>
							<form action="#" method="post">
							    Логин:<br>
							    <input type="text" id="login" name="login" required>
							    <br>
							    <br>
							    Пароль:<br>
							    <input type="password" id="pass1" name="pass1" required>
							    <br>
							    <p style = "margin-top: 15px;">
							    	<input type="checkbox" name="state" value = "on" checked>
							    	Оставаться в системе
							    </p>
							        <input type="submit" name="submit" value="Войти">
							        <input type="reset" name="reset" value="Отмена">
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
						$login = htmlspecialchars($_POST["login"]);
            $pass1 = $_POST["pass1"];
            $passw = trim(md5($pass1));
            $state = $_POST["state"];	
            		
                    // 2. Проверка аккаунта:
		          // ========================  

				$query = "SELECT login, passw FROM users WHERE login='$login' AND passw='$passw'";

				$result = $conn->query($query);
				$N = $result->num_rows;
				
				if ($N == 0) {
					echo("<span style= 'color: red'>");
					echo("В авторизации отказано!");
					echo("</span>");
				} else {
						echo("<span style= 'color: qreen'>");
						echo("<br><br>Авторизация успешна.");
            echo("</span>");
						$_SESSION["user"] = $login;
							if ($state == "on") {
                setcookie("user", $login, time() + 10 * 24 * 60 * 60); // 10 суток!
                }
									header("Location: main");
				}
					echo("</h3>");
        }
    }