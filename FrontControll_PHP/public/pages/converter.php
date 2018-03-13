<?php
 $title = "Конвертер";
 $style = "public/styles/converter.css";
  function createContent() {
    if(empty($_POST["submit"])) {
?>

<div class="container">
  	<div class="row">
			<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
							<h2 style="margin-top: 75px; color: red">Конвертер</h2>
				      <div id="konv" style="width:450px; height:250px; background:grey; text-align:center; border-radius: 10px 10px; margin:0 auto;">
				        <form action="#" method ="post">
				            <h3 style="margin-bottom: 35px; padding-top: 35px;">Конвертер из Фаренгейта в Цельсий</h3>
				            <div style="color:white">Вводим тут</div>
				            
				            <input type="text" id="fahrenheit" name="fahrenheit" placeholder="&deg;F" style="text-align:right;height:25px; width:100px">
				            <input type = "submit" name = "submit" style=color:red; value="Перевод">

				            <div  id="celsius" style="text-align:right;height:25px; width:100px;background:white;border:2px solid;margin:30px auto">&deg;C</div>
				        </form>
				      </div> 
			</div> 
		</div> 
</div>
           
<?php  
  }else{
    echo ("<h3>Перевод из F в C</h3>");
		$fahrenheit = $_POST["fahrenheit"];
		echo ("<h2>".$fahrenheit." &deg;F</h2>");

		$celsius =( ($fahrenheit-32) * 5/9);
		echo ("<h1>".$celsius."&deg;C</h1>");
  		}
	}