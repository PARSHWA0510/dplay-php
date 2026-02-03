<?php
require 'config.php';
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 


require 'vendor/autoload.php';

# Google API Config
$client = new Google\Client();
$client->setClientId("1003908693943-qgv01m5bscvj57dn1h0mbjfcgvhk9tvf.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("https://".$siteurl_link."/google-callback.php");
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        $oauth2 = new Google\Service\Oauth2($client);
        $userInfo = $oauth2->userinfo->get();

        # Check if user exists in DB
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$userInfo->email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            # Insert new user
            $stmt = $pdo->prepare("INSERT INTO users (google_id, name, email, picture) VALUES (?, ?, ?, ?)");
            $stmt->execute([$userInfo->id, $userInfo->name, $userInfo->email, $userInfo->picture]);
            $user = [
                "id" => $pdo->lastInsertId(),
                "name" => $userInfo->name,
                "email" => $userInfo->email,
                "picture" => $userInfo->picture
            ];
        }

        # Store user in session
        $_SESSION['user'] = $user;

        header("Location: dashboard.php");
        exit;
    }
}

header("Location: login.php");
exit;
