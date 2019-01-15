<?php
require_once("../config.php");
if(!empty($_SESSION['user_id'])){
	header("location: ../index.php");
}
$errors = [];
if(!empty($_POST)){
	if(empty($_POST['user_name'])) {
		$errors[] = 'Please enter your username';
	}
	if(empty($_POST['email'])) {
		$errors[] = 'Please enter email';
	}
	if(empty($_POST['first_name'])) {
		$errors[] = 'Please enter your first name';
	}
	if(empty($_POST['last_name'])) {
		$errors[] = 'Please enter your last name';
	}
	if(empty($_POST['password'])) {
		$errors[] = 'Please enter password';
	}
	if(strlen($_POST['user_name']) > 100) {
		$errors[] = 'Max username length is 100 symbols';
	}
	if(strlen($_POST['first_name']) > 80) {
		$errors[] = 'Max first name length is 80 symbols';
	}
	if(strlen($_POST['last_name']) > 80) {
		$errors[] = 'Max last name length is 80 symbols';
	}
	if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 100) {
		$errors[] = 'Password should contain more than 6 and not more than 100 symbols';
	}

	$stmt = $dbConn->prepare("SELECT * FROM users WHERE email=:email");
	$stmt->execute(array("email" => $_POST['email']));
	$row = $stmt->fetchColumn();

	if(!empty($row)){
		$errors[] = 'This email adress is already registered';
	}


	if(empty($errors)){
		$token = md5(uniqid(rand(), true));

		$stmt = $dbConn->prepare('INSERT INTO users(`username`, `email`, `token`, `password`, `first_name`, `last_name`, `admin`) VALUES(:username, :email, :token, :password, :first_name, :last_name, :admin)');
		$stmt->execute(array('username' => $_POST['user_name'], 'email' => $_POST['email'], 'token' => $token, 'password' => sha1($_POST['password'].SALT),
							'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'], 'admin' => 0));
		$recent_id = $dbConn->lastInsertId();

		$link_to_verify = "http://airship/index.php?token=" . $token . "&id=" . $recent_id;
		mail($_POST['email'],"Airship Airlines Account Verification","Hi, " . $_POST['first_name'] . "!\nClick this link below to verify your account:\n" . $link_to_verify);
		

		header("location: verify-page.php?title=AA Account Verification Wait&p1=Move to your mail, it's got message with link to verify your account&p2=You can close this page, by the way");
	}
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<title>AA Logging up</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.gif" type="image/gif">

	<!-- для корректного отображения на мобилах -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	 crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- мои локальные стили-->
	<link href="log-up-page.css" rel="stylesheet">
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
			<div class="d-flex justify-content-center">
				<div id="lil-container">
					<p class="text-center font-class">Sign Up</p>
					<form method="POST">
						<div class="form-group">
							<label for="username-imput">Username</label>
							<input type="text" required="" class="form-control" id="username-imput" name="user_name" value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');?>"
							 placeholder="Enter your username">
						</div>
						<div class="form-group">
							<label for="first-name-imput">First name</label>
							<input type="text" required="" class="form-control" id="first-name-imput" name="first_name" value="<?php echo (!empty($_POST['first_name']) ? $_POST['first_name'] : '');?>"
							 placeholder="Enter your first name">
						</div>
						<div class="form-group">
							<label for="last-name-imput">Last name</label>
							<input type="text" required="" class="form-control" id="last-name-imput" name="last_name" value="<?php echo (!empty($_POST['last_name']) ? $_POST['last_name'] : '');?>"
							 placeholder="Enter your last name">
						</div>
						<div class="form-group">
							<label for="email-imput">Email address</label>
							<input type="email" required="" class="form-control" id="email-imput" aria-describedby="emailHelp" name="email" value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : '');?>" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="password-imput">Password</label>
							<input type="password" required="" class="form-control" id="password-imput" name="password" value='' placeholder="Password">
						</div>
						<div class="space1"></div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<h3>Already have account? Then <a href="log-in-page.php">log in</a>!</h3>
				</div>
			</div>
		</div>
	</section>

	<script src="log-up-page.js"></script>
</body>

</html>