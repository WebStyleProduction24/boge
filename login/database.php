<?php

	require_once('header.php');
	require_once('config.php');
	require_once('functions.php');

	$link = mysqli_connect($host, $user, $pass, $db_name);





		// Ругаемся, если соединение установить не удалось
	if (!$link) {
		echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
		exit;
	}


	 //Если переменная Name передана
	if (isset($_POST["Name"])) {
	    //Вставляем данные, подставляя их в запрос
		$sql = mysqli_query($link, "INSERT INTO `products` (`name`, `url`, `image`) VALUES ('{$_POST['Name']}', '{$_POST['Url']}', '{$_POST['Img']}'");
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

	    //Если передана переменная red, то надо обновлять данные. Для начала достанем их из БД
	if (isset($_GET['red'])) {
		$sql = mysqli_query($link, "SELECT `id`, `name`, `url`, `image` FROM `products` WHERE `id`={$_GET['red']}");
		$product = mysqli_fetch_array($sql);
	}
?>

<form action="" method="post">
	<table class="my-5">
		<tr class="py-3">
			<td>Наименование:</td>
			<td><input type="text" name="Name" value="<?= isset($_GET['red']) ? $product['name'] : ''; ?>"></td>
		</tr>
		<tr class="py-3">
			<td>Ссылка страницы продукта:</td>
			<td>http://boge.<?php echo $domain; ?>/<input type="text" name="Url" value="<?= isset($_GET['red']) ? $product['url'] : ''; ?>" >.html</td>
		</tr>
		<tr class="py-3">
			<td>Путь к изображению продукта:</td>
			<td>http://boge.<?php echo $domain; ?>/images/public/search-product/<input type="text" name="Img" value="<?= isset($_GET['red']) ? $product['image'] : ''; ?>" >.html</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="OK"></td>
		</tr>
	</table>
</form>

<?php

home_control_panel();

  //Получаем данные
$sql = mysqli_query($link, 'SELECT `id`, `Name`, `image` FROM `products`');
while ($result = mysqli_fetch_array($sql)) {
	echo "{$result['id']}) {$result['Name']} {$result['image']} - <a href='?del={$result['id']}'>Удалить</a><br>";
}

home_control_panel();

require_once('footer.php');
?>