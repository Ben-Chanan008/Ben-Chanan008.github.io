<?php include './database.php';
$name = $email = $feedback = '';
$nameErr = $emailErr = $feedbackErr = '';
if (isset($_POST['submit'])) {
	if (empty($_POST['name'])) {
		$nameErr = 'Name is required';
	} else {
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}
	if (empty($_POST['email'])) {
		$emailErr = 'Email is reqiured';
	} else {
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}
	if (empty($_POST['feed'])) {
		$feedbackErr = 'Feedback is reqiured';
	} else {
		$feedback = filter_input(INPUT_POST, 'feed', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}

	if (empty($nameErr) && empty($emailErr) && empty($feedbackErr)) {
		$sql = "INSERT INTO feed(name, email, feedback) VALUES('$name', '$email', '$feedback')";
		if (mysqli_query($conn, $sql)) {
			header('Location: ./feedback.php');
		} else {
			echo 'An error occurred' . mysqli_error($conn);
		}
	}
}

//echo $nameErr
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./BOOSTRAP%20V5.30/bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
	<link rel="stylesheet" href="./style.css">
	<title>Leave Feedback</title>
</head>

<body>
	<nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
		<div class="container">
			<a class="navbar-brand" href="http://www.techskol.com" target="_blank">Techskol</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="./index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./feedback.php">Feedback</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./about.php">About</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<main>
		<div class="container d-flex flex-column align-items-center">
			<img src="./jlogoonly.png" class="w-25 mb-3" alt="">
			<h2>Feedback</h2>
			<p class="lead text-center">Leave feedback for Techskol</p>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : NULL; ?>" id="name" name="name" placeholder="Enter your name">
					<div>
						<?= $nameErr; ?>
					</div>
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : NULL; ?>" id="email" name="email" placeholder="Enter your email">
					<div>
						<?= $emailErr; ?>
					</div>
				</div>
				<div class="mb-3">
					<label for="body" class="form-label">Feedback</label>
					<textarea class="form-control <?php echo $feedbackErr ? 'is-invalid' : NULL; ?>" id="body" name="feed" placeholder="Enter your feedback"></textarea>
					<div>
						<?= $feedbackErr; ?>
					</div>
				</div>
				<div class="mb-3">
					<input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
				</div>
			</form>
		</div>
	</main>

	<footer class="text-center mt-5">
		Copyright &copy; 2022
	</footer>
	<?php include './java.php'; ?>
</body>
</html>