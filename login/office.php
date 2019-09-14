<?php
require_once('config.php');

	if (@$link = mysqli_connect($host, $user, $pass, $db_name)) { //Проверяем подключение к базе данных

		$res = mysqli_query($link, "SELECT * FROM `products`"); //Выполняем запрос к БД
		$answer = mysqli_num_rows( $res ); //Получаем количество записей из БД
		mysqli_query($link, 'SET NAMES cp1251')

		?>

		<p>Продуктов в базе: <?php echo $answer; ?></p>

		<p><a href="database.php">Управлять базой данных</a></p>


		<!-- Проверяем имеются ли записи в БД -->
		<?php	if ($answer != 0) { ?>

			<h5>Перечень продуктов в базе:</h3>

				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Наименование</th>
							<th scope="col">URL</th>
							<th scope="col"></th>
						</tr>
					</thead>


					<?php while ($row = mysqli_fetch_assoc($res)) {?>
						<!-- Выводим в цикле записи базы данных -->
						<tr>
							<th scope="row"><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td>
								<a href="http://boge.ru/<?php echo $row['url']; ?>.html">
									http://boge.ru/<?php echo $row['url']; ?>.html
								</a>
							</td>
							<td><a href="<?php "?del={$row['id']}" ?>">Удалить</a></td>
						</tr>
					<?php } ?>

				</table>

				<p><a href="database.php">Управлять базой данных</a></p>

				<?php	
				mysqli_free_result($res);
			} 	
				mysqli_close($link);
		} else {
			echo "Не удалось установить подключение к базе данных!";
		}

		?>
