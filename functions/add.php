<?php

if (empty($_POST['task'])) {
	echo "Please enter the task";
	exit();
}
$task = $_POST['task'];
$user = $_COOKIE['user'];

require 'configDB.php';

$sql = 'INSERT INTO tasks(task, user) VALUES(:task, :user)';
$query = $pdo->prepare($sql);
$query->execute(['task' => $task, 'user' => $user]);

header('Location: /web');
