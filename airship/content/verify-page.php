<!DOCTYPE html>
<html lang="ru">

<head>
	<title><?php echo $_GET['title'];?></title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.gif" type="image/gif">

	<!-- для корректного отображения на мобилах -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	 crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- мои локальные стили-->
	<link href="verify-page.css" rel="stylesheet">
</head>

<body>

	<section class="fill-viewport d-flex align-items-center">
		<div class="container">
			<div class="d-flex justify-content-center ">
				<div id="lil-container" class="text-center">
					<div class=" font-class">
						<p><?php echo $_GET['p1'];?></p>
						<p style="font-size: 15pt; color: rgba(0,0,0,0.5)"><?php echo $_GET['p2'];?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>

</html>