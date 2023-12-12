<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log in</title>
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<div class="container">
		<div class="register">
			<h1>Log in</h1>
			<form action="/web/functions/auth.php" method="post" class="register-form">
				<label>User name:</label>
				<input type="text" name="user_name" placeholder="Enter your name" required>
				<label>User password:</label>
				<input type="password" name="user_pass" placeholder="******" required>
				<button type="submit">Log in</button>
			</form>
		</div>
	</div>
</body>

</html>