<?php

require_once('header.php');
require_once('../config.php');
require_once('functions.php');

$link = mysqli_connect($host, $user, $pass, $db_name);
mysqli_query($link, "SET NAMES utf8"); //Задаем кодировку

		// Ругаемся, если соединение установить не удалось
if (!$link) {
	echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
	exit;
}


	 //Если переменная Name передана
if (isset($_POST["Name"])) {

		 //проверяем наличие отмеченных чекбоксов
	if (isset($_POST['pressure'])) {
		$pressure = mysqli_real_escape_string($link, implode(', ',$_POST['pressure'])); //объединяем массив в строку и экранируем символы
	}
	if (isset($_POST['sound_isolation'])) {
		$sound_isolation = mysqli_real_escape_string($link, implode(', ',$_POST['sound_isolation'])); //объединяем массив в строку и экранируем символы
	}
	if (isset($_POST['regulation'])) {
		$regulation = mysqli_real_escape_string($link, implode(', ',$_POST['regulation'])); //объединяем массив в строку и экранируем символы
	}
	if (isset($_POST['cooling'])) {
		$cooling = mysqli_real_escape_string($link, implode(', ',$_POST['cooling'])); //объединяем массив в строку и экранируем символы
	}
	if (isset($_POST['other_parameters'])) {
		$other_parameters = mysqli_real_escape_string($link, implode(', ',$_POST['other_parameters'])); //объединяем массив в строку и экранируем символы
	}

	if(isset($_POST['heat_recovery']) && $_POST['heat_recovery'] == 'Есть') {
		$heat_recovery = 'Есть';
	} else {
		$heat_recovery ='Нет';
	}

	    //Вставляем данные, подставляя их в запрос
	$query = "INSERT INTO `products` ";
	$query .= "(`name`, `url`, `image`, `category`, `type_compressor`, `type_oil`, `engine_capacity`, `performance`, `pressure`, `heat_recovery`, ";
	$query .= "`sound_isolation`, `regulation`, `cooling`, `other_parameters`) ";
	$query .= "VALUES ";
	$query .= "('{$_POST['Name']}', '{$_POST['Url']}', '{$_POST['Img']}', '{$_POST['category']}', ";
	$query .= "'{$_POST['type_compressor']}', '{$_POST['type_oil']}', '{$_POST['engine_capacity']}', '{$_POST['performance']}', '{$pressure}', ";
	$query .= "'{$heat_recovery}', '{$sound_isolation}', '{$regulation}', '{$cooling}', '{$other_parameters}');";


	$sql = mysqli_query($link, $query);
	    //Если вставка прошла успешно
	if ($sql) {
		echo '<p>Данные успешно добавлены в таблицу.</p>';
	} else {
		echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
	}
}

	    //Удаляем, если что
if (isset($_GET['del'])) {
	$sql = mysqli_query($link, "DELETE FROM `products` WHERE `ID` = {$_GET['del']}");
	if ($sql) {
		echo "<p>Товар удален.</p>";
	} else {
		echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
	}
}

	//     //Если передана переменная red, то надо обновлять данные. Для начала достанем их из БД
	// if (isset($_GET['red'])) {

	// 	$select = "SELECT ";
	// 	$select .= "`id`, `name`, `url`, `image`, `engine_capacity`, `performance`, `pressure_range`, `heat_recovery`, `sound_isolation`, ";
	// 	$select .= "`regulation`, `cooling`, `other_parameters` ";
	// 	$select .= "FROM `products` WHERE `id`={$_GET['red']}";

	// 	$sql = mysqli_query($link, $select);
	// 	$product = mysqli_fetch_array($sql);
	// }
?>

<form action="" method="post">
	<table class="my-5">
		<tr class="py-3">
			<td>Наименование:</td>
			<td><input type="text" name="Name" value=""></td>
		</tr>
		<tr class="py-3">
			<td>Ссылка страницы продукта:</td>
			<td>http://boge.<?php echo $domain; ?>/<input type="text" name="Url" value="" >.html</td>
		</tr>
		<tr class="py-3">
			<td>Путь к изображению продукта:</td>
			<td>http://boge.<?php echo $domain; ?>/images/public/search-product/<input type="text" name="Img" value="" ></td>
		</tr>
		<tr class="py-3">
			<td>Категория продукта:</td>
			<td>
				<select name="category" id="">
					<option value="Выберите необходимый пункт" selected disabled>Выберите необходимый пункт</option>
					<option value="Компрессоры">Компрессоры</option>
					<option value="Воздухоподготовка">Воздухоподготовка</option>
					<option value="Специальные газы">Специальные газы</option>
					<option value="Системы управления">Системы управления</option>
					<option value="Запчасти">Запчасти</option>
				</select>
			</td>
		</tr>
		<tr class="py-3">
			<td>Тип компрессора:</td>
			<td>
				<select name="type_compressor" id="">
					<option value="Выберите необходимый пункт" selected disabled>Выберите необходимый пункт</option>
					<option value="Винтовой компрессор">Винтовой компрессор</option>
					<option value="Поршневой компрессор">Поршневой компрессор</option>
					<option value="Спиральный компрессор">Спиральный компрессор</option>
				</select>
			</td>
		</tr>
		<tr class="py-3">
			<td>Тип по маслу:</td>
			<td>
				<select name="type_oil" id="">
					<option value="Выберите необходимый пункт" selected disabled>Выберите необходимый пункт</option>
					<option value="Маслосмазываемый">Маслосмазываемый</option>
					<option value="Безмасляный">Безмасляный</option>
				</select>
			</td>
		</tr>
		<tr class="py-3">
			<td>Мощность:</td>
			<td><input type="number" step="any" name="engine_capacity" placeholder="0.00" value="" > (кВт)</td>
		</tr>
		<tr class="py-3">
			<td>Производительность:</td>
			<td><input type="number" step="any" name="performance" placeholder="0.00" value="" > (м<sup>3</sup>/мин)</td>
		</tr>
		<tr class="py-3">
			<td>Давление:</td>
			<td>
				<input type="checkbox" name="pressure[]" value="Низкое (до 10 атм)"/> Низкое (до 10 атм);&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="pressure[]" value="Среднее (до 15 атм)"/> Среднее (до 15 атм);&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="pressure[]" value="Высокое (до 40 атм)"/> Высокое (до 40 атм);&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<tr class="py-3">
			<td>Градирня:</td>
			<td>
				<input type="checkbox" name="heat_recovery" value="Есть" /> Есть;
			</td>
		</tr>
		<tr class="py-3">
			<td>Звуковая изоляция:</td>
			<td>
				<input type="checkbox" name="sound_isolation[]" value="Нет" /> Нет;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="sound_isolation[]" value="Стандартная" /> Стандартная;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="sound_isolation[]" value="Усиленная" /> Усиленная;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="sound_isolation[]" value="Усиленная (опционально)" /> Усиленная (опционально);&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<tr class="py-3">
			<td>Регулирование:</td>
			<td>
				<input type="checkbox" name="regulation[]" value="Частотное" /> Частотное;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="regulation[]" value="Водяное охлаждение" /> Водяное охлаждение;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="regulation[]" value="Фиксированная скорость" /> Фиксированная скорость;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<tr class="py-3">
			<td>Охлаждение:</td>
			<td>
				<input type="checkbox" name="cooling[]" value="Воздушное" /> Воздушное;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="cooling[]" value="Водяное" /> Водяное;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<tr class="py-3">
			<td>Другие параметры:</td>
			<td>
				<input type="checkbox" name="other_parameters[]" value="Клиноременной" /> Клиноременной;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="other_parameters[]" value="Компрессорный центр" /> Компрессорный центр;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="other_parameters[]" value="Маслосмазываемый" /> Маслосмазываемый;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="OK"></td>
		</tr>
	</table>
</form>

<?php

home_control_panel();

  //Получаем данные
$query = "SELECT ";
$query .= "`id`, `Name`, `image`, `category`, `type_compressor`, `type_oil`, `engine_capacity`, `performance`, `pressure`, `heat_recovery`, ";
$query .= "`sound_isolation`, `regulation`, `cooling`, `other_parameters`";
$query .= "FROM `products`";

$sql = mysqli_query($link, $query);
while ($result = mysqli_fetch_array($sql)) {
	echo "<p>{$result['id']}) {$result['Name']}; ";
	echo "{$result['image']}; Категория: {$result['category']}; ";
	echo "Тип компрессора: {$result['type_compressor']}; Тип по маслу: {$result['type_oil']}; ";
	echo "Мощность двигателя: {$result['engine_capacity']} (кВт); Производительность: {$result['performance']} (м<sup>3</sup>/мин); ";
	echo "Давление: {$result['pressure']}; Градирня: {$result['heat_recovery']}; Звуковая изоляция: {$result['sound_isolation']}; ";
	echo "Регулирование: {$result['regulation']}; Охлаждение: {$result['cooling']}; Другие параметры: {$result['other_parameters']};";
	echo "- <a href='?del={$result['id']}'>Удалить</a></p>";
}

home_control_panel();

require_once('footer.php');
?>