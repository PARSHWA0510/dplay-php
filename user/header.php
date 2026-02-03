<?php date_default_timezone_set('Asia/Kolkata');  $today_datetime = date('Y-m-d H:i:s');  $today_date = date('Y-m-d'); $today_time = date('H:i:s'); ?>
<link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
<header class="main-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-auto pl-0">
        <button class="btn pink-gradient btn-icon" id="left-menu"><i class="material-icons">widgets</i></button>
        <a href="index.php" class="logo">
<?php $ure=mysqli_query($con,"select * from company_master");
$row=mysqli_fetch_array($ure);
$company_logo = $row['company_logo']; ?><img src="../images/<?php echo $company_logo;?>" /></a> </div>
      <div class="col text-center p-xs-0"> </div>
      <div class="col-auto pr-0">
        <div class="dropdown d-inline-block"> <a class="btn header-color-secondary btn-icon dropdown-toggle caret-none" href="#" role="button" id="dropdownmessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="material-icons">mail_outline</i> <span class="status-number bg-danger text-white">9+</span> </a>
          <div class="dropdown-menu notification-dropdown align-center arrow-top pt-0" aria-labelledby="dropdownmessage">
            <div class="arrow pink-gradient"></div>
            <div class="pink-gradient py-3 text-center">
              <h5 class="mb-0">Messages</h5>
              <p class="mb-0">Just Recieved Messages</p>
            </div>
            <div class="media new">
              <figure class="avatar avatar-40"> <img src="img/user2.png" alt="Generic placeholder image"> </figure>
              <div class="media-body">
                <h5 class="mt-0">Alizee Johnson</h5>
                <p class="mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                <a href="#">Reply</a> <a href="#" class="ml-2">View</a> </div>
            </div>
            <a href="#" class="media pink-gradient-active new">
            <figure class="avatar avatar-40"> <img src="img/user3.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h5 class="my-0">Donald Costapor </h5>
              <small class="text-muted d-block mb-2">2:05 am</small>
              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
            </div>
            </a> <a href="#" class="media pink-gradient-active">
            <figure class="avatar avatar-40"> <img src="img/user2.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h5 class="mt-0">Alizee McMohan <small class="text-muted float-right">4:05 am</small></h5>
              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
            </div>
            </a> </div>
        </div>
        <div class="dropdown text-hide-lg d-inline-block"> <a class="btn header-color-secondary btn-icon dropdown-toggle caret-none" href="#" role="button" id="dropdownnotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="material-icons">notifications_none</i> <span class="status-dot pink-gradient"></span> </a>
          <div class="dropdown-menu notification-dropdown" aria-labelledby="dropdownnotification"> <a href="#" class="media  pink-gradient-active new">
            <figure class="avatar avatar-40"> <img src="img/user1.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h5 class="mt-0">Media heading</h5>
              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
            </div>
            </a> <a href="#" class="media  pink-gradient-active">
            <figure class="avatar avatar-40"> <img src="img/user1.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h5 class="mt-0">Media heading</h5>
              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
            </div>
            </a> <a href="#" class="media  pink-gradient-active">
            <figure class="avatar avatar-40"> <img src="img/user1.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h5 class="mt-0">Media heading</h5>
              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
            </div>
            </a> </div>
        </div>
        <div class="dropdown d-inline-block"> <a class="btn header-color-secondary dropdown-toggle username" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <figure class="userpic"><img src="../images/usericon.png" alt=""></figure>
          <h5 class="text-hide-xs"> <small class="header-color-secondary">Welcome,</small> <span class="header-color-primary"><?php echo $_SESSION['name']; ?></span> </h5>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown" aria-labelledby="dropdownMenuLink">
            <div class="card">
              <div class="card-body text-center"> <a href="">
                <figure class="avatar avatar-120 mx-auto my-3"> <img src="../images/usericon.png" alt=""> </figure>
                <h5 class="card-title mb-2 header-color-primary"><?php echo $_SESSION['name']; ?></h5>
                </a> </div>
            </div>
            <a class="dropdown-item pink-gradient-active" href="change_password.php">
            <div class="row align-items-center">
              <div class="col"> Change Password </div>
              <div class="col-auto">
                <div class="header-color-secondary ml-2"><i class="material-icons vm">settings</i></div>
              </div>
            </div>
            </a>
            <div class="dropdown-divider m-0"></div>
            <a class="dropdown-item pink-gradient-active" href="logout.php">
            <div class="row align-items-center">
              <div class="col"> Logout </div>
              <div class="col-auto">
                <div class="text-danger ml-2"><i class="material-icons vm">exit_to_app</i></div>
              </div>
            </div>
            </a> </div>
        </div>
      </div>
    </div>
  </div>
</header>

<?php   
    function isMobileDevice() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    ?>
