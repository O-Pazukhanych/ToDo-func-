<?php
require 'configDB.php';

$id = $_GET['id'];

$sql_get = 'SELECT `status` FROM `tasks` WHERE `id` = ?';
$query_get = $pdo->prepare($sql_get);
$query_get->execute([$id]);
$status = $query_get->fetch(PDO::FETCH_DEFAULT)[0];

if ($status == 0) {
	$status = 1;
} else {
	$status = 0;
}

$sql = 'UPDATE `tasks` SET `status` = :status WHERE `id` = :id';
$query = $pdo->prepare($sql);
$query->execute(['id' => $id, 'status' => $status]);

header('Location: /web');
