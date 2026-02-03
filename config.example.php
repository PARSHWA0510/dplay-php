<?php
// Copy to config.php and set your DB and base URL. Do not commit config.php.

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $con = mysqli_connect('localhost', 'root', '', 'your_local_db');
} else {
    $con = mysqli_connect('localhost', 'DB_USER', 'DB_PASS', 'DB_NAME');
}

$base_url = 'https://your-domain.com/';
