<?php
setcookie('user', $user_name, -0, "/web");

header('Location: /web');
