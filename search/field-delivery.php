<?php
require_once('./config.php');
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

		<?php } ?>

	</div>
</section>
