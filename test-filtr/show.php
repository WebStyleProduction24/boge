<?php

$hostname = "boge.mysql:3306"; // название/путь сервера, с MySQL
$username = "boge_mysql"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = "uEhFQN8+"; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "boge_admin_db"; // название базы данных


/* Создаем соединение */
$link = mysqli_connect( $hostname, $username, $password, $dbName ) or die ("Не могу создать соединение");
mysqli_query( $link, 'SET NAMES utf8' ) or header('Location: Error');

$res = mysqli_query($link, "SELECT * FROM `products`"); 

$cat = $_POST['cat'];
$type_compressor = $_POST['type_compressor'];
$type_oil = $_POST['type_oil'];


$engine_capacity_st = $_POST['engine_capacity_st'];
$engine_capacity_en = $_POST['engine_capacity_en'];
$performance_st = $_POST['performance_st'];
$performance_en = $_POST['performance_en'];
$cooling = $_POST['cooling'];
$other_parameters = $_POST['other_parameters'];

$pressure = $_POST['pressure'];
$heat_recovery = $_POST['heat_recovery'];
$sound_isolation = $_POST['sound_isolation'];
$regulation = $_POST['regulation'];

$row = mysqli_fetch_assoc($res);
$engine_capacity =$row['engine_capacity'];
$performance =$row['performance'];

echo "<table>";
echo "<thead>
<tr>
<th>№</th>
<th>ID</th>
<th>Наименование</th>
<th>Категория</th>
<th>Тип компрессора</th>
<th>Тип по маслу</th>
<th>Мощность двигателя (кВт)</th>
<th>Производительность (м<sup>3</sup>/мин)</th>
<th>Давление</th>
<th>Градирня</th>
<th>Звуковая изоляция</th>
<th>Регулирование</th>
<th>Охлаждение</th>
<th>Другие параметры</th>
</tr>
</thead>";

function addWhere($where, $add, $and = true) {
	if ($where) {
		if ($and) $where .= " AND $add";
		else $where .= " OR $add";
	}
	else $where = $add;
	return $where;
}

$sql = "SELECT * FROM `products`";
$where = "";



if ( $cat!="All") $where = addWhere( $where, "`category` IN ('".htmlspecialchars( $cat )."') ");
if (isset( $type_compressor ) && $type_compressor !="all") $where = addWhere( $where, "`type_compressor` IN ('".htmlspecialchars($type_compressor)."')");
if (isset( $type_oil ) && $type_oil !="all") $where = addWhere( $where, "`type_oil` IN ('".htmlspecialchars(implode("', '", $type_oil))."')");


if( $cat != "Системы управления" && $cat != "Запчасти") {


	if ( $cat != "Воздухоподготовка") {

		if ($performance>=0.08 && $performance<=50.30 && $performance_st && $performance_en) $where = addWhere($where, "`performance` BETWEEN ".htmlspecialchars( $performance_st)." AND ".htmlspecialchars( $performance_en)) ;
	}
	if ( $cat != "Специальные газы") {

		if ($engine_capacity>=0.65 && $engine_capacity<=355 && $engine_capacity_st && $engine_capacity_en) $where = addWhere($where, "`engine_capacity` BETWEEN ".htmlspecialchars( $engine_capacity_st)." AND ".htmlspecialchars( $engine_capacity_en));
	}





}

if (isset( $pressure ) && $pressure !="all" ) $where = addWhere($where, "`pressure` LIKE ('%".htmlspecialchars(implode(", ", $pressure))."%')");
if (isset( $heat_recovery ) && $heat_recovery !="Нет" ) $where = addWhere($where, "`heat_recovery` IN ('Есть')");
if (isset( $sound_isolation ) && $sound_isolation !="all" ) $where = addWhere($where, "`sound_isolation` LIKE ('%".htmlspecialchars(implode(", ", $sound_isolation))."%')");
if (isset( $regulation ) && $regulation !="all" ) $where = addWhere($where, "`regulation` LIKE ('%".htmlspecialchars(implode(", ", $regulation))."%')");
if (isset( $cooling ) && $cooling !="all" ) $where = addWhere($where, "`cooling` LIKE ('%".htmlspecialchars(implode(", ", $cooling))."%')");
if (isset( $other_parameters ) && $other_parameters !="all" ) $where = addWhere($where, "`other_parameters` LIKE ('%".htmlspecialchars(implode(", ", $other_parameters))."%')");


if ($where) $sql .= " WHERE $where";

$res = mysqli_query($link, $sql);

$i=1;

while ($row = mysqli_fetch_assoc($res)) {
	echo "<tr>";
	echo "<th>" . $i++ . "</th>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['category'] . "</td>";
	echo "<td>" . $row['type_compressor'] . "</td>";
	echo "<td>" . $row['type_oil'] . "</td>";
	echo "<td>" . $row['engine_capacity'] . "</td>";
	echo "<td>" . $row['performance'] . "</td>";
	echo "<td>" . $row['pressure'] . "</td>";
	echo "<td>" . $row['heat_recovery'] . "</td>";
	echo "<td>" . $row['sound_isolation'] . "</td>";
	echo "<td>" . $row['regulation'] . "</td>";
	echo "<td>" . $row['cooling'] . "</td>";
	echo "<td>" . $row['other_parameters'] . "</td>";
	echo "</tr>";

}

echo "</table>"


?>