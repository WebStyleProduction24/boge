<?php
	require_once('header.php');

	session_start();
	require_once ('data.php');
	if (isset($_SESSION['sess_login']) && isset($_SESSION['sess_pass'])) {
		if ($_SESSION['sess_login']===$enter_login && $_SESSION['sess_pass']===$enter_passw) {
			echo "<h1>Добро пожаловать в панель управления!</h1>\n";
			echo "<p><a href='exit.php'>Выйти из системы</a></p>\n";
			echo "<p><a href='/' target='_blank'>Перейти к сайту</a></p>\n";

			require_once ('office.php');

		} else {
			header('Location: index.php');
			exit();
		}
	} else {
		header('Location: index.php');
		exit();
	}

	require_once('footer.php');

?>	
