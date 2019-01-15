<?php
require_once("config.php");

$adminIsHere = false;
if(!empty($_SESSION['user_id']))
{
	$stmt = $dbConn->prepare("SELECT admin from users WHERE id=" . $_SESSION['user_id']);
	$stmt->execute();
	if($stmt->fetchColumn() == 1)
	{
		$adminIsHere = true;
	}
}

if(!empty($_GET['token'])){
	$token = $_GET['token'];
	$stmt = $dbConn->prepare("SELECT token FROM users WHERE (id = " . $_GET['id'] . ")");
	$stmt->execute();
	$tokenOriginal = $stmt->fetchColumn();
	if($token == $tokenOriginal)
	{
		$_SESSION['user_id'] = $_GET['id'];
		$stmt = $dbConn->prepare('UPDATE users SET verified=1 WHERE id=' . $_GET['id']);
		$stmt->execute();
	}
}

if(!empty($_SESSION['user_id'])){
	$stmt = $dbConn->prepare("SELECT * FROM users WHERE (id = " . $_SESSION['user_id'] . ")");
	$stmt->execute();

	foreach($stmt as $row)
	{
 		$myUser = $row;
	}
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Airship Airlines</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="content/favicon.gif" type="image/gif">

	<!-- для корректного отображения на мобильных телефонах -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- jquery -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	 crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- colors animation для jquery -->
	<script src="http://code.jquery.com/color/jquery.color-2.1.2.js" integrity="sha256-1Cn7TdfHiMcEbTuku97ZRSGt2b3SvZftEIn68UMgHC8="
	 crossorigin="anonymous"></script>

	<!-- подключение icons с онлайн ресурса -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

	<!-- мои локальные стили и джаваскрипт файл -->
	<link href="external.css" rel="stylesheet">

	<!-- gallery -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
</head>

<body>
	<?php if(!empty($_SESSION['user_id']))echo '
		<div id="user-block" class="font1">
			<div class="row">
				<div class="little-cute-block">
				</div>
				<div>
					<h4>' . $myUser['first_name'] . ' ' . $myUser['last_name'] . '</h4>
					<h5><i>' . $myUser['username'] . '</i></h5>
				</div>
				<a class="btn2" href="destroy.php">
        			<span>Log Out</span>
        			<i class="fas fa-sign-out-alt"></i>
				 </a>';
				 if($adminIsHere)
				 echo '
				 <a class="btn3" href="content/admin.php">
        			<span>Admin Panel</span>
        			<i class="fas fa-skull-crossbones"></i>
				 </a>';
				 echo '
			</div>
		</div>
	'?>
	<section id="start-page" class="fill-viewport">
		<div class="container">
			<div class="space4"></div>
			<div class="d-flex justify-content-end">
				<div class="col-md-6">
					<a href="#"><img id="logo" src="content/logo1.png"></a>
				</div>
			</div>
			<div class="space3"></div>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="blue-gradient">
						<h1 class="font1">Why you should choose us:</h1>
					</div>
					<div class="space2"></div>
					<p id="start-page-p" class="font1 blue-gradient">Save flights</p>
					<div class="space1"></div>
					<p id="start-page-p" class="font1 blue-gradient">Cheap tickets around the world</p>
					<div class="space1"></div>
					<p id="start-page-p" class="font1 blue-gradient">Most trusted airlines in Europe</p>
				</div>
			</div>
			<div class="space2"></div>
			<div class="flex-row ">
				<div class="d-flex justify-content-center">
					<a id="button1" href="#branch-page" class="btn btn-light" role="button">Know more</a>
				</div>
			</div>
			<div class="space2"></div>
		</div>
	</section>

	<?php if(empty($_SESSION['user_id']))
	{
		echo '
	<section id="log-up-section" class="font1">
		<div class="space3"></div>
		<div>
			<div class="text-center">
				<p>Get logged in or signed up</p>
			</div>
			<div class="space2"></div>
			<div class="d-flex justify-content-center">
				<div id="lil-container">
					<div class="d-flex justify-content-between">
						<a id="button2" href="content/log-in-page.php" class="btn btn-primary" role="button">Log In</a>
						<a id="button2" href="content/log-up-page.php" class="btn btn-primary" role="button">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
		<div class="space3"></div>
	</section>';
	}
	?>

	<section id="branch-page">
		<div class="gradient">
			<div class="space4"></div>
			<div class="space2"></div>
			<div class="container text-center">
				<div class="row">
					<div id="font-branch-page" class="col-lg-4">
						<div class="special-elem1">
							<p id="about">About Airship Airlines</p>
						</div>
					</div>
					<div id="font-branch-page" class="col-lg-4">
						<div class="special-elem1">
							<p id="you-should-know">Order tickets</p>
						</div>
					</div>
					<div id="font-branch-page" class="col-lg-4">
						<div class="special-elem1">
							<p id="baggage">Prohibited items of baggage</p>
						</div>
					</div>
				</div>
			</div>
			<div class="space4"></div>
			<div class="space2"></div>
		</div>
	</section>

	<section id="description-page">
		<div class="container font2">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="space4"></div>
					<div id="a1" class="special-elem2">
						<p>Large baggage allowance</p>
					</div>
					<div class="space1"></div>
					<div id="a2" class="special-elem2">
						<p>Free Wi-Fi during the whole flight</p>
					</div>
					<div class="space1"></div>
					<div id="a3" class="special-elem2">
						<p>Convenient and fast ticket order</p>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="space4"></div>
					<div id="you-duno-dat-bitch">
						<div class="container">
							<div class="row">
								<div id="c1" class="cube">
									<div class="under-cube">
										<p>Fast</p>
										<p>registration</p>
										<p>system</p>
									</div>
									<div id="b1" class="inner-cube">
										<i class="material-icons">
											check_circle
										</i>
									</div>
								</div>
								<div id="c2" class="cube">
									<div class="under-cube">
										<p>Safety</p>
										<p>personal</p>
										<p>data</p>
									</div>
									<div id="b2" class="inner-cube">
										<i class="material-icons">
											portrait
										</i>
									</div>
								</div>
							</div>
							<div class="row">
								<div id="c3" class="cube">
									<div class="under-cube">
										<p>Trusted</p>
										<p>kitchen</p>
									</div>
									<div id="b3" class="inner-cube">
										<i class="material-icons">
											restaurant
										</i>
									</div>
								</div>
								<div id="c4" class="cube">
									<div class="under-cube">
										<p>Comfor-</p>
										<p>table</p>
										<p>flight</p>
									</div>
									<div id="b4" class="inner-cube">
										<i class="material-icons">
											airline_seat_recline_extra
										</i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="space4"></div>
		</div>
		</div>
	</section>

	<section id="sign-up-page" class="">

		<div class="container font1">
			<div class="space4"></div>
			<div class="space3"></div>
			<div class="row">
				<div class="col-12 col-lg-3 col-sm-6 margin-down">
					<div class="special-elem3">
						<a href="https://24smi.org/public/media/app/public/media/uploads/boeing_747-438_SlOkk93.jpg" class="fancybox" rel="ligthbox">
							<img src="https://24smi.org/public/media/app/public/media/uploads/boeing_747-438_SlOkk93.jpg" class="zoom img-fluid rounded">
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-3 col-sm-6 margin-down">
					<div class="special-elem3">
						<a href="https://regnum.ru/uploads/pictures/news/2015/11/08/regnum_picture_1447009767231177_normal.jpg" class="fancybox"
						 rel="ligthbox">
							<img src="https://regnum.ru/uploads/pictures/news/2015/11/08/regnum_picture_1447009767231177_normal.jpg" class="zoom img-fluid rounded">
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-3 col-sm-6 margin-down">
					<div class="special-elem3">
						<a href="https://www.volzsky.ru/img/2015/volzsky.ru-volzhskie-chinovniki-smenyat-biznes-klass-na-ekonom.jpg"
						 class="fancybox" rel="ligthbox">
							<img src="https://www.volzsky.ru/img/2015/volzsky.ru-volzhskie-chinovniki-smenyat-biznes-klass-na-ekonom.jpg"
							 class="zoom img-fluid rounded">
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-3 col-sm-6 margin-down">
					<div class="special-elem3">
						<a href="https://libymax.ru/wp-content/uploads/2012/08/Learjet-85-7.jpg" class="fancybox" rel="ligthbox">
							<img src="https://libymax.ru/wp-content/uploads/2012/08/Learjet-85-7.jpg" class="zoom img-fluid rounded">
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-3 col-sm-6 margin-down">
					<div class="special-elem3">
						<a href="https://cs8.pikabu.ru/post_img/big/2017/09/22/9/1506091976113849146.jpg" class="fancybox" rel="ligthbox">
							<img src="https://cs8.pikabu.ru/post_img/big/2017/09/22/9/1506091976113849146.jpg" class="zoom img-fluid rounded">
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-3 col-sm-6 margin-down">
					<div class="special-elem3">
						<a href="http://rim-aero.ru/wp-content/uploads/travel-th.jpg" class="fancybox" rel="ligthbox">
							<img src="http://rim-aero.ru/wp-content/uploads/travel-th.jpg" class="zoom img-fluid rounded">
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-3 col-sm-6 margin-down">
					<div class="special-elem3">
						<a href="https://99px.ru/sstorage/53/2015/07/tmb_137102_3514.jpg" class="fancybox" rel="ligthbox">
							<img src="https://99px.ru/sstorage/53/2015/07/tmb_137102_3514.jpg" class="zoom img-fluid rounded">
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-3 col-sm-6 margin-down">
					<div class="special-elem3">
						<a href="https://cdn.wallaps.com/wallpapers/190000/180845.jpg" class="fancybox" rel="ligthbox">
							<img src="https://cdn.wallaps.com/wallpapers/190000/180845.jpg" class="zoom img-fluid rounded">
						</a>
					</div>
				</div>
			</div>
			<div class="space4"></div>
		</div>
	</section>

	<section id="footer" class="dark">
		<div class="container special">
			<div class="row">
				<div class="col-12 col-md-6">
					<ul class="list-unstyled">
						<li>
							<h6>Help</h6>
						</li>
						<li>Do you still have questions? Then call up our number:</li>
						<li>+1 650 759 97 55</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<script src="javascript.js"></script>
</body>

</html>