<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title><?=$title?></title>

	<link rel="shortcut icon" href="public/bootstrap/img/gt_favicon.png">
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="public/bootstrap/css/magister.css">
	<link rel="stylesheet" href="<?=$style?>">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
</head>


<body class="theme-invert">
 	<div class="container">
    <div class="box">
			<div class="row">
			<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">	

				    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				      <div class="container">
				        <div class="navbar-header">
				          <a class="navbar-brand" href="main"><img width ="25" src="public/bootstrap/img/gt_favicon.png"></a>
				        </div>
				        <div id="navbar" class="collapse navbar-collapse">
				          <ul class="nav navbar-nav">
				            <li><a href="main">Главная</a></li>
					  				<li><a href="converter">Конвертер</a></li>
					  				<li><a href="news">Новости</a></li>
					  			  <li><a href="contact">Контакты</a></li>
					  						<?php if ($user == "Гость") { ?>
					  			  <li><a href="reg">Регистрация</a></li>
				            <li><a href="entry">Вход</a></li>
										<li><a href="#">Hi, Guest!</a></li>
				            		<?php } else { ?>
				            <li><a href="exit">Выход</a></li>
				            <li><a href="#">Hi, <?=$user?></a></li>
				            		<?php } ?>
				          </ul>
				        </div>
				      </div>
				    </nav>

	    </div>
	    </div>
  	</div>
	</div>
<!-- Main (Home) section -->
    <div class="container" style="margin-top: 150px">
        <?php createContent(); ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=$script?>">
    </script>
</body>
</html>