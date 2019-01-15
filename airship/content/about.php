<?php
require_once("../config.php");

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

if(!empty($_POST['comment'])) {
	$stmt = $dbConn->prepare("INSERT INTO comments(`user_id`, `comment`) VALUES(:user_id, :comment)");
	$stmt->execute(array('user_id' => $_SESSION['user_id'], 'comment' => $_POST['comment']));
}
$stmt = $dbConn->prepare("SELECT * FROM comments ORDER BY id DESC");
$stmt->execute();
$comments = $stmt->fetchAll();

$stmt = $dbConn->prepare("SELECT first_name, id FROM users");
$stmt->execute();
$users1 = $stmt->fetchAll();
$userid_comment = [];
foreach($users1 as $i)
{
	$userid_comment[$i['id']] = $i['first_name'];
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<title>About AA</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

	<!-- мои локальные стили и джава -->
	<link href="about.css" rel="stylesheet">
</head>

<body <?php if($adminIsHere) echo ' class="admin" '; ?>>
	<section id="start-page" class="font2">
		<div class="cute-icons row">
			<a href="../index.php#branch-page">
				<div class="icon-back">
					<i class="material-icons">
						arrow_back
					</i>
				</div>
			</a>
		</div>
		<div class="switcher">
			<div class="ball"></div>
		</div>
		<div class="soft-gradient">
			<div id="special-space"></div>
			<div class="container tochange">
				<div id="after-container">

					<div class="row">
						<div class="col-12">
							<div class="centered-text">
								<div class="elem1">
									<h1>About Airship Airlines</h1>
									<h4>Common information</h4>
								</div>
								<div class="space1"></div>
								<div class="elem1">
									<p>We care about your own comfort and safety. That was our top of the aspiration since Airship Airlines has
										been founded</p>
								</div>
							</div>
						</div>
					</div>

					<div class="space2"></div>

					<div class="cute-line">
						<div class="under-cute-line"></div>
					</div>

					<div class="space2"></div>

					<div class="row">

						<div class="col-12 col-lg-3 col-sm-6 margin-down">
							<div class="centered-text">
								<div class="elem1">
									<h1>Where we are</h1>
								</div>
								<div class="space1"></div>
								<div class="elem1">
									<p>Main Airship Airlines Company office places from Los Angeles California and there are about 20 other
										offices
										all over the world</p>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-3 col-sm-6 margin-down">
							<div class="centered-text">
								<div class="elem1">
									<h1>Where we come from</h1>
								</div>
								<div class="space1"></div>
								<div class="elem1">
									<p>Airship Airlines started its path from USA with buisnessman Donald Trump's supporting</p>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-3 col-sm-6 margin-down">
							<div class="centered-text">
								<div class="elem1">
									<h1>What is our goal</h1>
								</div>
								<div class="space1"></div>
								<div class="elem1">
									<p>We care about your own comfort and safety. That was our top of the aspiration since Airship Airlines has
										been founded</p>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-3 col-sm-6 margin-down">
							<div class="centered-text">
								<div class="elem1">
									<h1>Working composition</h1>
								</div>
								<div class="space1"></div>
								<div class="elem1">
									<p>Our team consists professional employees in every sphere we relate to: security officers, flight
										attendants,
										pilots and more</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="space4"></div>

			<div class="container tochange">
				<div id="after-container">
					<div class="row">
						<div class="col-12">

							<div class="elem1">
								<h1>About The Company</h1>
								<h4>Common information</h4>
							</div>
							<div class="space2"></div>
							<div class="elem1">
								<p>Airship Airlines (the brand of Los Angeles airlines) has a wide network of domestic flight routes that
									operate from
									the hubs in Chicago and New York. The airline offers regularly scheduled flights to the Commonwealth of
									Independent States (CIS), European, Middle Eastern, Southeast Asian and Asia Pacific
									countries.
								</p>
							</div>
							<div class="space1"></div>
							<div class="elem1">
								<p>Airship Airlines, founded in 1957, originated from the Sientera United Air Unit. Airship Airlines has been
									using the brand name for its flights since 2005.
								</p>
							</div>
							<div class="space1"></div>
							<div class="elem1">
								<p>Airship Airlines has one of the most modern air carrier fleets in the USA aviation market. The company
									operates
									aircraft from foreign producers, such as Airbus, Boeing and Embraer, on all of its flights. Currently our
									fleet
									has 80 airplanes.
								</p>
							</div>
							<div class="space1"></div>
							<div class="elem1">
								<p>Airship Airlines is a member of the global aviation alliance oneworld, a world leader offering its
									passengers
									service of the
									highest quality. oneworld airlines are based in all the continents and reach destinations in 150 countries of
									the world.</p>
							</div>


						</div>
					</div>
				</div>
				<div class="space1"></div>
				<div class="space1"></div>
				<div class="flex-row">
					<div class="d-flex justify-content-center">
						<div id="button-to-order">
							<p class="centered-text">Get tickets now</p>
						</div>
					</div>
				</div>
				<div class="space2"></div>

				<div class="space1"></div>
				<div class="space1"></div>
			</div>

			<div class="space4"></div>

			<div class="container tochange">
				<div id="after-container">
					<div class="elem2">

						<h1 class="centered-text">Review block</h1>
						<h4 class="centered-text">
							<?php if(!empty($_SESSION['user_id'])) echo '
							Leave your comment below';
							else echo '<i><a href="log-in-page.php?from=about">Log in</a> to leave comments</i>';
							?>
						</h4>

						<div id="comment-block">

							<div id="comments-form" <?php if(empty($_SESSION['user_id'])) echo 'style="display: none"' ; ?>>
								<form method="POST">
									<div>
										<textarea required="" name="comment" placeholder="Write your comment inside me"></textarea>

										<div class="space1"></div>

										<div class="very-special">
											<button type="submit" name="submit" class="btn btn-primary">Share</button>
										</div>
									</div>
								</form>
							</div>

							<?php
								foreach($comments as $comment)
								{
									echo '<div class="comment row">
											<div class="box0">
												<h5>' . $userid_comment[$comment['user_id']] . '</h5>
												<p>' . $comment['comment'] . '</p>
											</div>
											<div class="box1">
												<div class="row">
													<p class="d-flex justify-content-end">' . $comment['created_at'] . '</p>
													
												</div>
											</div>
										  </div>';
								}
							?>
						</div>

					</div>
				</div>
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
						<li>Do you still have questions? Then call LJ number:</li>
						<li>+1 650 759 97 55</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<script src="about.js">
	
	</script>

</body>

</html>