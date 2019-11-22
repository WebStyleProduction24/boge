<?php
require_once('../config.php');
require_once('functions.php');

	if (@$link = mysqli_connect($hostname, $username, $password, $dbName)) { //Проверяем подключение к базе данных
		mysqli_query($link, 'SET NAMES utf8');

		$res = mysqli_query($link, "SELECT * FROM `products`"); //Выполняем запрос к БД
		$answer = mysqli_num_rows( $res ); //Получаем количество записей из БД

		?>

		<p>Продуктов в базе: <?php echo $answer; ?></p>

		<?php operate_DB(); ?>


		<!-- Проверяем имеются ли записи в БД -->
		<?php	if ($answer != 0) { ?>

			<h5>Перечень продуктов в базе:</h3>

				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Наименование</th>
							<th scope="col">URL</th>
							<th scope="col">Изображение</th>
							<th scope="col">Категория</th>
							<th scope="col">Тип компрессора</th>
							<th scope="col">Тип по маслу</th>
							<th scope="col">Мощность двигателя (кВт)</th>
							<th scope="col">Производительность (м<sup>3</sup>/мин)</th>
							<th scope="col">Давление</th>
							<th scope="col">Градирня</th>
							<th scope="col">Звуковая изоляция</th>
							<th scope="col">Регулирование</th>
							<th scope="col">Охлаждение</th>
							<th scope="col">Другие параметры</th>
						</tr>
					</thead>


					<?php while ($row = mysqli_fetch_assoc($res)) {?>
						<!-- Выводим в цикле записи базы данных -->
						<tr>
							<th scope="row"><?php echo $row['id']; ?></th>
							<td><?php echo $row['name']; ?></td>
							<td>
								<a href="<?php url_DB(); ?>"><?php url_DB(); ?></a>
							</td>
							<td>
								<a href="<?php src_img_DB(); ?>"><?php src_img_DB(); ?></a>
							</td>
							<td><?php echo $row['category'] ?></td>
							<td><?php echo $row['type_compressor'] ?></td>
							<td><?php echo $row['type_oil'] ?></td>
							<td><?php echo $row['engine_capacity'] ?></td>
							<td><?php echo $row['performance'] ?></td>
							<td><?php echo $row['pressure'] ?></td>
							<td><?php echo $row['heat_recovery'] ?></td>
							<td><?php echo $row['sound_isolation'] ?></td>
							<td><?php echo $row['regulation'] ?></td>
							<td><?php echo $row['cooling'] ?></td>
							<td><?php echo $row['other_parameters'] ?></td>
						</tr>
					<?php } ?>

				</table>


				<?php	
				operate_DB();

				mysqli_free_result($res);
			} 	
				mysqli_close($link);
		} else {
			echo "Не удалось установить подключение к базе данных!";
		}

		?>
