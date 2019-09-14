<?php
require_once('header.php');

require_once('data.php');

$err = '';
if (isset($_POST['login']) && isset($_POST['passw'])) {
	$_POST['passw'] = md5($_POST['passw']);
	if ($_POST['login']===$enter_login && $_POST['passw']===$enter_passw) {
		session_start();
		$_SESSION['sess_login'] = $_POST['login'];
		$_SESSION['sess_pass'] = $_POST['passw'];
		header('Location: secure.php');
		exit();
	}
	else {
		$err = '<span style="color: red"><strong>';
		$err .= 'Логин или пароль введены неправильно!';
		$err .= '</strong></span><br>';
	}
}
?>


<div class="row mt-5 pt-5 pl-5 ml-5">
	<div class="col-12"><strong>Вход в панель управления</strong></div>
	<form class="col-5 mt-3" action="index.php" method="POST">
		<div class="form-group">
			<label for="exampleInputEmail1">Логин</label>
			<input type="text" class="form-control" placeholder="Логин" name="login">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Пароль</label>
			<input type="password" class="form-control" placeholder="Пароль" name="passw">
		</div>
		<div><?php echo $err; ?></div>
		<button type="submit" class="btn btn-primary">Войти</button>
	</form>
	
</div>


<?php	require_once('footer.php'); ?>