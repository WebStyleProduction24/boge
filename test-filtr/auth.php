<?
$hostname = "boge.mysql:3306"; // название/путь сервера, с MySQL
$username = "boge_mysql"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = "uEhFQN8+"; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "boge_admin_db"; // название базы данных

/* Создаем соединение */
$link = mysqli_connect( $hostname, $username, $password, $dbName ) or die ("Не могу создать соединение");
mysqli_query( $link, 'SET NAMES utf8' ) or header('Location: Error');

/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
$db = mysqli_select_db( $link, $dbName ) or die (mysqli_error());
?>