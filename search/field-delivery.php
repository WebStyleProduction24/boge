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
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCL.html"><img src="images/public/search-product/C_3_L_base_3.png" alt="Винтовые компрессоры BOGE C...L от 2.2 до 5.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCL.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...L от 2.2 до 5.5 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCLR.html"><img src="images/public/search-product/C_7_LR_base_2_0.png" alt="Винтовые компрессоры BOGE C...LR от 2.2 до 5.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCLR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...LR от 2.2 до 5.5 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCLDR.html"><img src="images/public/search-product/C_4_LDR_base_2.png" alt="Винтовые компрессоры BOGE C...LDR от 2.2 до 5.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCLDR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...LDR от 2.2 до 5.5 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCLF.html"><img src="images/public/search-product/C_9_LF_base_2.png" alt="Винтовые компрессоры C...LF от 2.2 до 7.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCLF.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...LF от 7.5 кВт до 22 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCLFR.html"><img src="images/public/search-product/C_9_LFR_base_2.png" alt="Винтовые компрессоры C...LFR 7.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCLFR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...LFR от 7.5 кВт до 22 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCLFDR.html"><img src="images/public/search-product/C_9_LFDR_base_2.png" alt="Винтовые компрессоры C...LFDR 7.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCLFDR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...LFDR от 7.5 кВт до 22 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwC.html"><img src="images/public/search-product/C_4_base_4.png" alt="Винтовые компрессоры C от 3 до 7.5 кВт" class="border bg-light w-100"></a>
					<a href="screwC.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C от 3 до 7.5 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCR.html"><img src="images/public/search-product/C_7_R.png" alt="Винтовые компрессоры от C...R от 3.0 до 7.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры от C...R от 3.0 до 7.5 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCD.html"><img src="images/public/search-product/C_4_D_base_4.png" alt="Винтовые компрессоры C...D от 3.0 до 7.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCD.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...D от 3.0 до 7.5 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCDR.html"><img src="images/public/search-product/C_9_DR.png" alt="Винтовые компрессоры от C...DR 3.0 до 7.5 кВт" class="border bg-light w-100"></a>
					<a href="screwCDR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...DR от 3.0 до 7.5 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwC10_20L.html"><img src="images/public/search-product/boge-c-10-l.png" alt="Винтовые компрессоры  C...L от 7.5 до 15 кВт" class="border bg-light w-100"></a>
					<a href="screwC10_20L.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры  C...L от 7.5 до 15 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwC10_20LR.html"><img src="images/public/search-product/boge-c-10-lr.png" alt="Винтовые компрессоры  C...LR от 11 до 15 кВт" class="border bg-light w-100"></a>
					<a href="screwC10_20LR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры  C...LR от 11 до 15 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwC10_20LDR.html"><img src="images/public/search-product/boge-c-10-ldr.png" alt="" class="border bg-light w-100"></a>
					<a href="screwC10_20LDR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...LDR от 7.5 до 15 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwC15_30.html"><img src="images/public/search-product/boge-schraubenkompressor-c-30.png" alt="Винтовые компрессоры C от 11 до 22 кВт" class="border bg-light w-100"></a>
					<a href="screwC15_30.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C от 11 до 22 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwC15_30D.html"><img src="images/public/search-product/boge-schraubenkompressor-c-15-d.png" alt="Винтовые компрессоры от C...D от 11 до 22 кВт" class="border bg-light w-100"></a>
					<a href="screwC15_30D.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры от C...D от 11 до 22 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwC15R.html"><img src="images/public/search-product/C_15_R.png" alt="Винтовые компрессоры от C 15 R мощностью 11 кВт" class="border bg-light w-100"></a>
					<a href="screwC15R.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C 15 R мощностью 11 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwC15DR.html"><img src="images/public/search-product/boge-schraubenkompressor-c-15-dr.png" alt="Винтовые компрессоры C 15 DR мощностью 11 кВт" class="border bg-light w-100"></a>
					<a href="screwC15DR.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C 15 DR мощностью 11 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCF.html"><img src="images/public/search-product/boge-schraubenkompressor-c-16-f.png" alt="Винтовые компрессоры C...F от 11 до 22 кВт</h6></a>" class="border bg-light w-100"></a>
					<a href="screwCF.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...F от 11 до 22 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwCFD.html"><img src="images/public/search-product/boge-schraubenkompressor-c-16-fd.png" alt="Винтовые компрессоры C...FD от 11 до 22 кВт" class="border bg-light w-100"></a>
					<a href="screwCFD.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры C...FD от 11 до 22 кВт</h6></a>
				</div>
				<div class="col-12 col-sm-4 col-lg-3 mb-4">
					<a href="screwpaintline.html"><img src="images/public/search-product/C_10_LDR_Paintline_base_12.png" alt="Винтовые компрессоры Paintline от 5.5 до 11.0 кВт" class="border bg-light w-100"></a>
					<a href="screwpaintline.html"><h6 class="pt-3 font-weight-bold text-body">Винтовые компрессоры Paintline от 5.5 до 11.0 кВт</h6></a>
				</div>

				<div class="col-12 text-center after-posts">
					<button class="btn btn-outline-success load-more" type="button">
						Показать еще <i class="ml-2 fas fa-angle-double-down"></i><span class="ml-2 spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					</button>
				</div>

			</div>
		</section>
		!-->