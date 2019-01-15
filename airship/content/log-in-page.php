<?php
require_once("../config.php");

$errors = [];
if(!empty($_POST)){
	if(empty($_POST['user_name'])){
		$errors[] = 'Please enter username or email adress';
	}
	if(empty($_POST['password'])) {
		$errors[] = 'Please enter password';
	}
	if(empty($errors)) {
		$stmt = $dbConn->prepare('SELECT id FROM users WHERE (username = :username or email = :username) and password = :password');
		$stmt->execute(array('username' => $_POST['user_name'], 'password' => sha1($_POST['password'].SALT)));
		$id = $stmt->fetchColumn();
		if(!empty($id)) {
			$stmt = $dbConn->prepare('SELECT verified FROM users WHERE (username = :username or email = :username) and password = :password');
			$stmt->execute(array('username' => $_POST['user_name'], 'password' => sha1($_POST['password'].SALT)));
			$verified = $stmt->fetchColumn();
			if($verified == 1)
			{
				$_SESSION['user_id'] = $id;
				if($_GET['from'] == 'about')
					header("location: about.php");
				else if($_GET['from'] == 'order')
					header("location: order.php");
				else
					header("location: ../index.php");
			}
			else{
				$errors[] = 'This account is not vefiried yet, please check your email to verify it';
			}
		} else {
			$errors[] = 'Please enter valid credentails';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<title>AA Logging in</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.gif" type="image/gif">

	<!-- для корректного отображения на мобилах -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	 crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- мои локальные стили-->
	<link href="log-in-page.css" rel="stylesheet">
</head>

<body>
	<div id="come-up-div">
		<?php
			foreach ($errors as $error){
				echo '<p>' . $error . '</p>';
			}
		?>
	</div>
	<section class="fill-viewport d-flex align-items-center">
		<div class="container">
			<div class="d-flex justify-content-center ">
				<div id="lil-container">
					<form method="POST">
						<p class="text-center font-class">Log In</p>
						<div class="form-group">
							<label for="exampleInputEmail1">Username or email address</label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="user_name" required="" value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');?>" placeholder="Username / Email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" name="password" required="" value="" placeholder="Password">
						</div>
						<div class="space1"></div>
						<button type="submit" class="btn btn-primary">Log in</button>
						<a href="remember-password.php">Forgot the password</a>
					</form>
					<h3>Don't have account yet? Then <a href="log-up-page.php">sign up</a>!</h3>
				</div>
			</div>
		</div>
	</section>
	<script src="log-in-page.js"></script>
</body>

</html>