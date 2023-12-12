<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ToDo list</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php
	include('php/header.php');
	?>
	<div class="container">
		<h1>ToDo List</h1>
		<form action="/web/functions/add.php" method="post" class="todo-form">
			<?php
			if ($_COOKIE['user'] == '') :
			?>
				<div class="add-task">
					<label class="task-label">Add new task:</label>
					<input type="text" name="task" id="task" placeholder="You mast log in or register!" class="input-task" readonly>
					<button type="submit" name="submit-task" class="btn-submit" disabled>Submit</button>
				</div>
			<?php else : ?>
				<div class="add-task">
					<label class="task-label">Add new task:</label>
					<input type="text" name="task" id="task" placeholder="To do..." class="input-task">
					<button type="submit" name="submit-task" class="btn-submit">Submit</button>
				</div>
			<?php endif; ?>
			<hr>
		</form>
		<?php

		if (!empty($_COOKIE['user'])) {
			require 'functions/configDB.php';

			echo '<ul class="tasks-list">';
			$query = $pdo->query('SELECT * FROM `tasks`');
			while ($row = $query->fetch(PDO::FETCH_OBJ)) {
				echo
				"<li>
				<b class='task-label'> {$row->task} </b>";

				if ($row->status == 0) {
					echo "<a href='/web/functions/update.php?id={$row->id}'><input type='checkbox' name='check-task'></a>";
				} else {
					echo "<a href='/web/functions/update.php?id={$row->id}'><input type='checkbox' name='check-task' checked></a>";
				}

				echo	"
				<span>Added by user: {$row->user} | </span>
				<span>{$row->data}</span>
				<a href='/web/functions/delete.php?id={$row->id}'><button>Remove</button></a>
			</li>";
			}
			echo '</ul>';
		}
		?>
	</div>
</body>

</html>