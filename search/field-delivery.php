<?php
require_once('login/config.php');
require_once('login/functions.php');

$link = mysqli_connect($host, $user, $pass, $db_name);
mysqli_query($link, "SET NAMES utf8");

$res = mysqli_query($link, "SELECT * FROM `products`"); 

		// Ругаемся, если соединение установить не удалось
if (!$link) {
	echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
	exit;
}

?>
<section class="container mt-5">
	<div class="row">


		<?php while ($row = mysqli_fetch_assoc($res)) {?>
			<div class="col-12 col-sm-4 col-lg-3 mb-4">



					<a href="<?php url_DB(); ?>"><img src="<?php src_img_DB(); ?>" alt="<?php echo $row['name']; ?>" class="border bg-light w-100"></a>
					<a href="<?php url_DB(); ?>"><h6 class="pt-3 font-weight-bold text-body"><?php echo $row['name']; ?></h6></a>
				</div>


				<!-- Выводим в цикле записи базы данных -->
			<!-- 	<tr>
					<th scope="row"><?php // echo $row['id']; ?></th>
					<td><?php // echo $row['name']; ?></td>
					<td>
						<a href="<?php // url_DB(); ?>"><?php // url_DB(); ?></a>
					</td>
					<td>
						<a href="<?php // src_img_DB(); ?>"><?php // src_img_DB(); ?></a>
					</td>
					<td><?php // echo $row['category'] ?></td>
					<td><?php // echo $row['type_compressor'] ?></td>
					<td><?php // echo $row['type_oil'] ?></td>
					<td><?php // echo $row['engine_capacity'] ?></td>
					<td><?php // echo $row['performance'] ?></td>
					<td><?php // echo $row['pressure'] ?></td>
					<td><?php // echo $row['heat_recovery'] ?></td>
					<td><?php // echo $row['sound_isolation'] ?></td>
					<td><?php // echo $row['regulation'] ?></td>
					<td><?php // echo $row['cooling'] ?></td>
					<td><?php // echo $row['other_parameters'] ?></td>
				</tr> -->
		<?php } ?>

	</div>
</section>

<!--

		<section class="container mt-5">
			<div class="row">

				<div class="col-12 text-center after-posts">
					<button class="btn btn-outline-success load-more" type="button">
						Показать еще <i class="ml-2 fas fa-angle-double-down"></i><span class="ml-2 spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					</button>
				</div>

			</div>
		</section>
		!-->