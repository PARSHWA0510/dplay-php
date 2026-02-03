<?php 
require 'config.php';
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 

require __DIR__ . '/vendor/autoload.php';

# Google API Config
$client = new Google\Client();
$client->setClientId("1003908693943-qgv01m5bscvj57dn1h0mbjfcgvhk9tvf.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("https://".$siteurl_link."/google-callback.php");
$client->addScope("email");
$client->addScope("profile");


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>
<h2>Welcome, <?= htmlspecialchars($user['name']) ?></h2>
<p>Email: <?= htmlspecialchars($user['email']) ?></p>
<img src="<?= htmlspecialchars($user['picture']) ?>" width="100" />
<br><br>
<a href="logout.php">Logout</a>
