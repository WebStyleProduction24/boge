<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Вывод и фильтрация</title>
	<link rel="stylesheet" href="//net.localhost/jquery-ui.css">
	<link rel="stylesheet" href="http://boge.localhost/search/modules/range.css">

	<script src="http://net.localhost/jquery-3.2.1.min.js"></script>
</head>
<body>



	<form action="" onchange= "getdetails()">


		<p>
			<select name="category" id="category">
				<option value="All" selected="">Выберите категорию</option>
				<option value="Компрессоры">Компрессоры</option>
				<option value="Воздухоподготовка">Воздухоподготовка</option>
				<option value="Специальные газы">Специальные газы</option>
				<option value="Системы управления">Системы управления</option>
				<option value="Запчасти">Запчасти</option>
			</select>
		</p>


		<p>
			<input type="radio"  name="type_compressor[]" id="type_compressor_1" value="all" checked="checked">
			<label for="type_compressor_1">- Все -</label>
			<input type="radio"  name="type_compressor[]" id="type_compressor_2" value="Винтовой компрессор">
			<label for="type_compressor_2">Винтовой компрессор</label>
			<input type="radio"  name="type_compressor[]" id="type_compressor_3" value="Поршневой компрессор">
			<label for="type_compressor_3">Поршневой компрессор</label>
			<input type="radio"  name="type_compressor[]" id="type_compressor_4" value="Спиральный компрессор">
			<label for="type_compressor_4">Спиральный компрессор</label>
		</p>
		<p>
			<input type="checkbox"  id="type_oil_1" name="type_oil[]" value="all">
			<label for="type_oil_1">- Все - </label>
			<input type="checkbox"  id="type_oil_2" name="type_oil[]" value="Маслосмазываемый">
			<label for="type_oil_2">Маслосмазываемый</label>
			<input type="checkbox"  id="type_oil_3" name="type_oil[]" value="Безмасляный">
			<label for="type_oil_3">Безмаслянный</label>
		</p>

		<p>
			<div id="control" class="col-12">
				<div id="option1" style="display: block">
					<p>
						<label for="amount">Выберите мощность по шкале:</label>
						<span class="text-success">
							<input class="text-success" name="engine_capacity_st" value="" type="text" id="amount-power-st" readonly /> кВт - <input class="text-success" name="engine_capacity_en" value="" type="text" id="amount-power-en" readonly /> кВт
						</span>
					</p>
					<div id="slider-range-power" class="mb-3"></div>
				</div>


				<div id="option2" style="display: block">
					<p>
						<label for="amount-performance">Выберите производительность по шкале:</label>
						<span class="text-success">
							<input class="text-success" name="performance_st" value="" type="text" id="amount-performance-st" readonly /> м<sup>3</sup>/мин - <input class="text-success" name="performance_en" value="" type="text" id="amount-performance-en" readonly /> м<sup>3</sup>/мин
						</span>
					</p>
					<div id="slider-range-performance" class="mb-3"></div>
				</div>

			</div>
		</p>

		<p>
			<input type="checkbox" name="pressure[]" value="Низкое (до 10 атм)" id="pressure_1">
			<label for="pressure_1">Низкое (до 10 атм)</label>
			<input type="checkbox" name="pressure[]" value="Среднее (до 15 атм)" id="pressure_2">
			<label for="pressure_2">Среднее (до 15 атм)</label>
			<input type="checkbox" name="pressure[]" value="Высокое (до 40 атм)" id="pressure_3">
			<label for="pressure_3">Высокое (до 40 атм)</label>
		</p>





		<div>
			<p>
				<strong>Градирня</strong>
				<input type="checkbox" name="heat_recovery" id="heat_recovery" value="Да">
				<label for="heat_recovery">Дa</label>
			</p>
			<p>
				<strong>Звуковая изоляция</strong>
				<input type="checkbox" name="sound_isolation[]" value="Нет" id="sound_isolation_0">
				<label for="sound_isolation_0">Нет</label>
				<input type="checkbox" name="sound_isolation[]" value="Стандартная" id="sound_isolation_1">
				<label for="sound_isolation_1">Стандартная</label>
				<input type="checkbox" name="sound_isolation[]" value="Усиленная" id="sound_isolation_2">
				<label for="sound_isolation_2">Усиленная</label>
				<input type="checkbox" name="sound_isolation[]" value="Усиленная (опционально)" id="sound_isolation_3">
				<label for="sound_isolation_3">Усиленная (опционально)</label>
			</p>
			<p>
				<strong>Регулирование</strong>
				<input type="checkbox" id="regulation_1" name="regulation[]" value="Частотное">
				<label for="regulation_1">Частотное</label>
				<input type="checkbox" id="regulation_2" name="regulation[]" value="Водяное охлаждение">
				<label for="regulation_2">Водяное охлаждение</label>
				<input type="checkbox" id="regulation_3" name="regulation[]" value="Фиксированная скорость">
				<label for="regulation_3">Фиксированная скорость</label>
			</p>
			<p>
				<strong>Охлаждение</strong>
				<input type="checkbox" id="cooling_1" name="cooling[]" value="Воздушное">
				<label for="cooling_1">Воздушное</label>
				<input type="checkbox" id="cooling_2" name="cooling[]" value="Водяное">
				<label for="cooling_2">Водяное</label>
			</p>
			<p>
				<strong>Другие параметры</strong>
				<input type="checkbox" id="other_parameters_1" name="other_parameters[]" value="Клиноременный">
				<label for="other_parameters_1">Клиноременный</label>
				<input type="checkbox" id="other_parameters_2" name="other_parameters[]" value="Компрессорный центр">
				<label for="other_parameters_2">Компрессорный центр</label>
				<input type="checkbox" id="other_parameters_3" name="other_parameters[]" value="Маслосмазываемый">
				<label for="other_parameters_3">Маслосмазываемый</label>
			</p>
		</div>

	</form>
	<div id="msg"></div>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="slider-range.js"></script>
	<script type="text/javascript" src="main.js"></script>
</body>
</html>