<?php 

	//Возврат на главную ПУ
	function home_control_panel()
	{
		echo "<p class='mt-5'><a href='secure.php'>Вернуться на главную страницу панели управления</a></p>";
	}

	//Переход на управление БД
	function operate_DB()	{
		echo "<p><a href='database.php'>Управлять базой данных</a></p>";
	}

	//Src изображения продукта
	function src_img_DB() {
		global $domain, $row;
		echo "http://boge." . $domain . "/images/public/search-product/" . $row['image'];
	}

	//URL продукта
	function url_DB() {
		global $domain, $row;
		echo "http://boge." . $domain . "/" . $row['url'] . ".html";
	}