<?php
require_once("../config.php");

$errors = [];
if(!empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['user_name'])){

	// $stmt = $dbConn->prepare('SELECT email FROM users WHERE (username = :username)');
	// $stmt->execute(array('username' => $_POST['user_name']));
	// $email = $stmt->fetchColumn();
	// if(!empty($email)) {

	// 	$link_to_verify = "http://airship/index.php?token=" . $token . "&id=" . $recent_id;
	// 	mail($email,"Airship Airlines Account Verification","Hi, " . $_POST['first_name'] . "!\nClick this link below to verify your account:\n" . $link_to_verify);

	
	// } else {
		// 	$errors[] = 'Please enter valid credentails';
		// }
		
	$data = [
		'username' => $_POST['user_name'],
		'email' => $_POST['email'],
		'password' => sha1($_POST['password'].SALT)
	];
	$data2 = [
		'username' => $_POST['user_name'],
		'email' => $_POST['email'],
	];

	$stmt = $dbConn->prepare('SELECT id FROM users WHERE (username=:username AND email=:email)');
	$stmt->execute($data2);
	$result_1 = $stmt->fetchColumn();
	
	if(empty($result_1)){
		$errors[] =  'The email is wrong or username';
	}
	else{
		$stmt = $dbConn->prepare('UPDATE users SET password=:password WHERE (username=:username AND email=:email)');
		$result = $stmt->execute($data);
		//echo $result;
		if($result == false){
			$errors[] = 'Something went wrong, check if you input correct data';
		}
		else{
			if(empty($result))
			{
				$errors[] = 'The input data is incorrect';
			}else
			header("location: got-the-ticket.php?what=1");
		}
	}
	
}
else{
	$errors[] = 'Fill all the fields';
}
?>


<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Password Recovering AA</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.gif" type="image/gif">

	<!-- для корректного отображения на мобилах -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	 crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- мои локальные стили-->
	<link href="remember-password.css" rel="stylesheet">
</head>

<body>

	<section class="fill-viewport d-flex align-items-center">
		<div class="container">
			<div class="d-flex justify-content-center ">
				<div id="lil-container">
					<div class="font-class">
						<form method="POST">
							<div class="form-group">
								<label for="exampleInputEmail1">Input your username</label>
								<input type="text" class="form-control" id="exampleInputEmail1" name="user_name" required="" value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');?>"
								 placeholder="Username">
								</div>
								<div class="form-group">
									<label for="email-imput">Input email adress</label>
									<input type="email" required="" class="form-control" id="email-imput" aria-describedby="emailHelp" name="email"
									value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : '');?>" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">New password</label>
									<input type="password" class="form-control" id="exampleInputPassword1" name="password" required="" value="" placeholder="Password">
								</div>
								<div style="color:red;font-size:20px">
									<?php
										foreach ($errors as $error){
											echo '<p>' . $error . '</p>';
										}
									?>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
					<div class="space1"></div>
				</div>
			</div>
		</div>
	</section>

</body>

</html>