<?php

$user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$user_pass = filter_input(INPUT_POST, 'user_pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$hash = md5($user_pass . 'secret');

require 'configDB.php';

$sql_get = 'SELECT * FROM `users` WHERE `user_name` = :user_name AND `password` = :hash';
$query_get = $pdo->prepare($sql_get);
$query_get->execute(['user_name' => $user_name, 'hash' => $hash]);
$user = $query_get->fetch();

if (count($user) == 0) {
	echo "Incorrect login or password";
	exit();
} else {
	setcookie('user', $user['user_name'], time() + 3600, "/web");
}

header('Location: /web');