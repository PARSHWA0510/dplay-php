<?php session_start();
// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['google_loggedin'])) {
    header('Location: login.php');
    exit;
}
// Retrieve session variables
// Database connection variables
$db_host = 'localhost';
$db_name = 'u432408392_dplays_site';
$db_user = 'u432408392_dplays_site';
$db_pass = 'Dbuser@123';
// Attempt to connect to database
try {
    // Connect to the MySQL database using PDO...
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // Could not connect to the MySQL database, if this error occurs make sure you check your db settings are correct!
    exit('Failed to connect to database!');
}
// Get the account from the database
$stmt = $pdo->prepare('SELECT * FROM accounts WHERE id = ?');
$stmt->execute([ $_SESSION['google_id'] ]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);
// Retrieve session variables
$google_loggedin = $_SESSION['google_loggedin'];
$google_email = $account['email'];
$google_name = $account['name'];
$google_picture = $account['picture'];
?>


<?php 
include('config.php');

date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s');  $todaydate = date('Y-m-d');

$ure=mysqli_query($con,"select * from user_master where email1 = '$google_email'");
$urowno=mysqli_num_rows($ure);
if($urowno == '0')
{
$sql=mysqli_query($con,"INSERT INTO `user_master` (`username`,`contact1`,`email1`, `password`, `join_date`, `status`, `user_type`, `photo`) VALUES ('$google_email','','$google_email', '123456','$todaydate','1','customer','$google_picture')");	 
}
else
{
$urow=mysqli_fetch_array($ure);
$user_id = $urow[0];

$_SESSION['name'] = $google_name;
$_SESSION['user_id'] = $user_id;
$_SESSION['user_type'] = 'customer';
}
?>
<?php 
$ure=mysqli_query($con,"select * from user_master where email1 = '$google_email' and contact1 = ''");
$urownoc=mysqli_num_rows($ure);
if($urownoc > '0') { ?>
<script>window.location.href="my-mobileno.php";</script>
<?php } else { ?>
<script>window.location.href="index.php";</script>
<?php } ?>