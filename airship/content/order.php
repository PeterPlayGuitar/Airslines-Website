<?php
require_once("../config.php");
if(empty($_SESSION['user_id']))
{
	header("location: log-in-page.php?from=order");
}

$stmt = $dbConn->prepare("SELECT place FROM places");
$stmt->execute();
$places = $stmt->fetchAll();
$month = array(
	"January",
	"February",
	"March",
	"April",
	"May",
	"June",
	"July",
	"August",
	"September",
	"October",
	"November",
	"December"
);

$errors = [];
if(isset($_POST['button_1'])){

	if($_POST['place_from'] == $_POST['place_to'])
	{
		$errors[] = "You have the same places";
	}

	if(empty($errors)){
		$stmt = $dbConn->prepare('INSERT INTO user_order (`user_id`, `place_from`, `place_to`, `day`, `month`, `year`) VALUES(:user_id_1, :place_from, :place_to, :day_1, :month_1, :year_1)');

		$stmt->execute(array('user_id_1' => $_SESSION['user_id'],
		'place_from' => $_POST['place_from'],
		'place_to' => $_POST['place_to'],
		'day_1' => $_POST['day'],
		'month_1' => $_POST['month'],
		'year_1' => $_POST['year']));

		header("location: got-the-ticket.php");
	}
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<title>AA Ticket Order</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.gif" type="image/gif">

	<!-- для корректного отображения на мобилах -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	 crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- colors animation -->
	<script src="http://code.jquery.com/color/jquery.color-2.1.2.js" integrity="sha256-1Cn7TdfHiMcEbTuku97ZRSGt2b3SvZftEIn68UMgHC8="
	 crossorigin="anonymous"></script>

	<!-- icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- мои локальные стили и джава -->
	<link href="order.css" rel="stylesheet">
</head>

<body>
	<section id="start-page" class="font2">
		<div class="cute-icons">
			<a href="../index.php#branch-page">
				<div class="icon-back">
					<i class="material-icons">
						arrow_back
					</i>
				</div>
			</a>
		</div>
		<div class="soft-gradient">
			<div id="special-space"></div>
			<div class="container">
				<div id="after-container">
					<div class="space1"></div>
					<div class="row">
						<div class="col-12">
							<div class="elem1">
								<h1>Ticket Order</h1>
								<h4>Airship Airlines</h4>
							</div>
						</div>
					</div>
					<div class="space1"></div>
					<div class="space1"></div>
					<div class="space1"></div>
					<div class="row">
						<div class="col-12 col-md-9">
							<div class="elem1">
								<p>In form below you can order tickets. Just fill it with your preferences and make sure that you filled it
									correctly then press button "Order the ticket"</p>
							</div>
						</div>
					</div>

					<div class="space2"></div>
					<div class="cute-line">
						<div class="under-cute-line"></div>
					</div>
					<div class="space2"></div>
					<form method="POST">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="exampleFormControlSelect1">From:</label>
									<select class="form-control" name="place_from" value="<?php echo $_POST['place_from'];?>">
										<?php
									foreach($places as $i)
									{
										echo '<option>' . $i['place'] . '</option>';
									}
									?>
									</select>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="exampleFormControlSelect1">To:</label>
									<select class="form-control" name="place_to" value="<?php echo $_POST['place_to'];?>">
										<?php
									foreach($places as $i)
									{
										echo '<option>' . $i['place'] . '</option>';
									}
									?>
									</select>
								</div>
							</div>
						</div>

						<div class="space1"></div>

						<div class="row">
							<div class="col-12 col-md-6">
								<div id="date">
									<p class="text-center">
										Today's date:
										<?php echo date('d.m.Y h:i');?>
									</p>
								</div>
							</div>
						</div>

						<div class="space1"></div>

						<div class="row">
							<div class="col-6 col-md-2">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Day:</label>
									<select class="form-control" name="day" value="<?php echo $_POST['day'];?>">
										<?php 
											for($i = 1; $i <= 31; $i++)
											{
												echo "<option>$i</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="col-6 col-md-3">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Month:</label>
									<select class="form-control" name="month" value="<?php echo $_POST['month'];?>">
										<?php
										foreach($month as $m)
										{
											echo "<option>$m</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-6 col-md-2">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Year:</label>
									<select class="form-control" name="year" value="<?php echo $_POST['year'];?>">
										<option>2018</option>
										<option>2019</option>
										<option>2020</option>
										<option>2021</option>
									</select>
								</div>
							</div>
						</div>

						<!-- blocked -->
						<div class="row" style="display: none">
							<div class="col-12 col-md-6">
								<div id="total">
									<p>Total cost of the ticket:</p>
									<p id="cost" class="text-center">0 $</p>
								</div>
							</div>
						</div>
						
						<?php if(!empty($errors)) {
							echo '
						<div class="row"">
							<div class="col-12 col-md-6">
								<div id="total">';
								foreach($errors as $i){
									echo '<p>Error: ' . $i . '</p>';
								}
								echo '</div>
							</div>
						</div>
						<div class="space2"></div>';
							}
						?>

						

						<button type="submit" class="btn btn-primary" name="button_1">Order the ticket</button>
					</form>
				</div>
				<div class="space2"></div>
			</div>
			<div class="space4"></div>
		</div>
	</section>

	<section id="footer" class="bg-dark">
		<div class="container special">
			<div class="row">
				<div class="col-12 col-md-6">
					<ul class="list-unstyled">
						<li>
							<h6>Help</h6>
						</li>
						<li>Do you still have questions? Then call our number:</li>
						<li>+1 650 759 97 55</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<script src="order.js"></script>

</body>

</html>