<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Congtarilations!</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.gif" type="image/gif">

	<!-- для корректного отображения на мобилах -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	 crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- мои локальные стили-->
	<link href="got-the-ticket.css" rel="stylesheet">
</head>

<body>

	<section class="fill-viewport d-flex align-items-center">
		<div class="container">
			<div class="d-flex justify-content-center ">
				<div id="lil-container" class="text-center">
					<div class=" font-class">
						<p>
						<?php if($_GET['what'] == '1')
						echo 'Your password was successfully changed, please, you have to log in now due to safety reasons';
						else
						echo 'You have bought the ticket';
						?>
						</p>
					</div>
					<div class="row">
						<?php if($_GET['what'] == '1')
							echo '<div id="box1" href="../index.php">
							<p>Home page</p>
						</div>
						<div id="box3">
							<p>Logging in page</p>
						</div>';
						else echo '
						<div id="box1" href="../index.php">
							<p>Home page</p>
						</div>
						<div id="box2">
							<p>Read the prohibited items list</p>
						</div>';
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="got-the-ticket.js"></script>
</body>

</html>