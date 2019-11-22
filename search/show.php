<?php

require_once('functions.php');

$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "boge"; // название базы данных


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

$i=0;
$out = '';

while ($row = mysqli_fetch_assoc($res)) {
	$i++;
	$src = "http://boge." . $domain . "/images/public/search-product/" . $row['image'];
	$url = "http://boge." . $domain . "/" . $row['url'] . ".html";
	$img = '<img src="' . $src . '"  alt="' . $row['name'] . '"  class="border bg-light w-100">';
	$a_img = '<a href="' . $url . '">' . $img . '</a>';
	$h6 = '<h6 class="pt-3 font-weight-bold text-body">' . $row['name'] . '</h6>';
	$a_h6 = '<a href="' . $url . '">' . $h6 . '</a>';

	$out .= '<div class="col-12 col-sm-4 col-lg-3 mb-4">'. $a_img . $a_h6 . '</div>';
}

// $kol = $i;
// $out = json_encode(array('kol' =>$kol));


if ( $i==0 ) $out = "<div class='col-12'><strong>По Вашим параметрам ничего не найдено!</strong></div>";

// echo $out;

 // echo json_decode(array('out' => 'test', 'kol' => $i ));



$result = array(
	'out'  => $out,
	'kol' => $i
);
 
echo json_encode($result);

?>