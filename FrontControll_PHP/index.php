<?php
// FrontController:
// Маскировка URL - через .htaccess

// 1. Запуск сеанса:
session_start();

// 2. Определение индентификатора страницы:
$id = "main";
if (isset($_GET["id"])){
    $id = $_GET["id"];
}
if ($id == "") {
    $id = "main";
}

// 3. Определение пользователя страницы:
$user = "Гость";
if (isset($_SESSION["user"])) {
	$user = $_SESSION["user"];
} else if (isset($_COOKIE["user"])) {
	$user = $_COOKIE["user"];
}

// 4. Создание контроллера подключений к БД:
require("config/db_config.php");
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// 5. Подгрузка контента страницы и базового шаблона:
include ("public/pages/$id.php"); 
include ("public/tpl/base.php");