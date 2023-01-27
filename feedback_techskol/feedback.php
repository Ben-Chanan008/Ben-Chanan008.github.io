<?php include './database.php'; 	
?>
<?php
$sql = 'SELECT * FROM feed';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC)
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
			<h2>Feedback</h2>
			<?php if (empty($feedback)): ?>
				<p class="lead mt-3">There is no feedback</p>
			<?php endif; ?>
			<?php foreach ($feedback as $item): ?>
				<div class="card my-3">
					<div class="card-body">
						<?php echo $item['feedback']; ?>
						<p class="text-secondary mt-2 text-center"><?php echo $item['name']; ?></p>
						<p class="text-center"><?= $item['date']; ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</main>
	<footer class="text-center mt-5">
		Copyright &copy; 2022
	</footer>
	<?php include './java.php'; ?>
</body>
</html>


