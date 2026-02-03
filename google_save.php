<?php session_start();

require_once 'vendor/autoload.php'; // Path to Google API Client
require_once 'config.php';

 session_start();
// Your Google OAuth 2.0 Client ID
$clientID = '1003908693943-qgv01m5bscvj57dn1h0mbjfcgvhk9tvf.apps.googleusercontent.com';

$data = json_decode(file_get_contents('php://input'), true);
$token = $data['token']; // The token sent from frontend
if($token){
  $client = new Google_Client(['client_id' => $clientID]);

  // Verify the ID token
  $payload = $client->verifyIdToken($token);
  if ($payload) {
      // Token is valid, you can access user information
      $userId = $payload['sub'];  // Google ID
      $userName = $payload['name'];
      $userEmail = $payload['email'];
      $userPicture = $payload['picture'];
      $password = 'password123'; // Plain password
      $cdate = date('Y-m-d');
      $message="";
      $success=true;

      $sqlQuery = "select * from user_master where email1='$userEmail'";
      $exists = mysqli_prepare($con, $sqlQuery);
      mysqli_stmt_execute($exists);

      $result = mysqli_stmt_get_result($exists);
      if($row = mysqli_fetch_assoc($result)){
        mysqli_stmt_close($exists);

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
		$_SESSION['user_type'] = 'customer';
		$_SESSION['company_id'] = '1';



        $data = array(
          "message"=>"User has been sign-in successfully.",
          "success"=>$success,
          "data"=>$row
      );
     
      }else{
        $sql = "INSERT INTO user_master (user_type, name, email1, username, password) VALUES ('customer', '$userName', '$userEmail','$userEmail', '$password')";
        
        // Prepare and execute the statement
        $stmt = mysqli_prepare($con, $sql);
        if (mysqli_stmt_execute($stmt)) {
          $inserted_id = mysqli_insert_id($con); 
          $_SESSION['user_id'] = $inserted_id;
		  $_SESSION['user_type'] = 'customer';
    	  $_SESSION['name'] =$userName;

            $message="User has been Register Successfully.";
        } else {
           // echo "Error: " . mysqli_error($con);
            $message="Failed to register user, try again.";
            $success=false;
        }
        
        // Close the statement and connection
    //    mysqli_stmt_close($stmt);
       
        $data = array(
          "id" => $userId,
          "name" => $userName,
          "email" => $userEmail,
          "profile" => $userPicture,
          "payload" =>$payload,
          "message"=>$message,
          "success"=>$success
      );
      }
     // mysqli_close($con);
    
    echo json_encode($data);
  } else {
    $data = array(
      "message"=>"Something went wrong, try again.",
      "success"=>false
  );
  echo json_encode($data);
  }
}



?>
