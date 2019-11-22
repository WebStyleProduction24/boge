<?php
require_once('../config.php');

define("DB_HOST", $host);
define("DB_NAME", $db_name); //Имя базы
define("DB_USER", $user); //Пользователь
define("DB_PASSWORD", $pass); //Пароль
define("PREFIX",""); //Префикс если нужно

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli -> query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");

if(!empty($_POST["search"])){ //Принимаем данные

    $search = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["search"]))));

    $db_search = $mysqli -> query("SELECT * from ".PREFIX."products WHERE name LIKE '%$search%'")
    or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');

    while ($row = $db_search -> fetch_array()) {
        echo "\n<li><a href='/".$row["url"].".html'>".$row["name"]."</a></li>"; //$row["name"] - имя таблицы
    }

}


?>