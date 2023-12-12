<?php

$user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
$user_pass = filter_input(INPUT_POST, 'user_pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$hash = md5($user_pass . 'secret');

if (mb_strlen($user_name) < 3) {
	echo "Minimum name length is 3 characters";
	exit();
} else if (mb_strlen($user_pass) < 6) {
	echo "Minimum password length is 6 characters";
	exit();
}

require 'configDB.php';

$query_get = $pdo->query('SELECT * FROM `users`');
while ($row = $query_get->fetch(PDO::FETCH_OBJ)) {
	if ($row->user_name == $user_name || $row->user_email == $user_email) {
		echo "This name or email is already in use!";
		exit();
	}
}

$sql = 'INSERT INTO users(user_name, user_email, password) VALUES(:user_name, :user_email, :password)';
$query = $pdo->prepare($sql);
$query->execute(['user_name' => $user_name, 'user_email' => $user_email, 'password' => $hash]);
setcookie('user', $user_name, time() + 3600, "/web");

header('Location: /web');
