<?php  error_reporting(0); session_start(); include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$logoaddp=mysqli_query($con,"select * from company_master");
$logoaddsp=mysqli_fetch_array($logoaddp);
echo $google_analytic_code = $logoaddsp['google_analytic_code'];
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<?php
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Blog Main'");
$seo2 = mysqli_fetch_array($seo1);
?>
<title><?php echo $seo2['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $seo2['seo_keyword']; ?>">
<meta name="description" content="<?php echo $seo2['seo_description']; ?>">
<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper blog">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <div class="breadcrumb breadcrumb-list mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">Blog</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Blog</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content blog-grid">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sortby-section">
            <div class="sorting-info">
              <div class="row d-flex align-items-center">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-12">
                  <form name="form" method="post" action="blog-search.php" autocomplete="off">
                    <div class="sortby-filter-group">
                      <div class="sortbyset"> <span class="sortbytitle">Blog Name</span>
                        <div class="sorting-select">
                          <script src="js/searchjquery.min.js"></script>
                          <script src="js/searchbootstrap.min.js"></script>
                          <script src="js/searchjquery.bootbox.js"></script>
                          <style>
						.dropdown-menu>li>a {
							display: block;
							padding: 3px 20px;
							clear: both;
							font-weight: 400;
							line-height: 1.42857143;
							color: #333;
							white-space: nowrap; } 
						</style>
                          <input type="text" class="form-control" name="name" data-provide="typeahead" data-items="9999" data-source="[&quot;<?php $z=("select * from blog_master where status = '1' order by name asc"); $ures = mysqli_query($con,$z); while($urows=mysqli_fetch_array($ures)) {?><?php echo mysqli_real_escape_string($con,$urows['name']); ?>&quot;,&quot;<?php } ?>&quot;]">
                        </div>
                      </div>
                      <div class="sortbyset"> <span class="sortbytitle">&nbsp;&nbsp;Blog Category</span>
                        <div class="sorting-select">
                          <select class="form-control select" name="blog_category">
                            <option value="">Choose Category</option>
                            <?php 
							$coun=mysqli_query($con,"select * from blog_category where status = '1' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                            <option value="<?php echo $Fcoun[0]; ?>"><?php echo $Fcoun['name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="sortbyset">
                        <div class="sorting-select">
                          <input type="submit" name="search" class="btn btn-secondary d-flex align-items-center" value="Search" style="padding:10px; margin-left:10px;">
                        </div>
                      </div>
                      <?php /*?><div class="sortbyset"> <span class="sortbytitle">&nbsp;&nbsp;Sort By</span>
                      <div class="sorting-select">
                        <select class="form-control select">
                          <option>Price Low->High</option>
                          <option>Price High->Low</option>
                        </select>
                      </div>
                    </div><?php */?>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php						
		$limit = 6;  // Number of entries to show in a page.
		// Look for a GET variable page if not found default is 1.     
		if (isset($_GET["page"])) { 
		  $pn  = $_GET["page"]; 
		} 
		else { 
		  $pn=1; 
		};  
	
		$start_from = ($pn-1) * $limit;  
	
		$session = $_GET['session'];
		$coun=mysqli_query($con,"select * from search_result where session = '$session'");
		$Fcoun_no=mysqli_num_rows($coun);
		if($Fcoun_no > 0) { 
		while($Fcoun=mysqli_fetch_array($coun)) 
		{ 
		$blog_id[] = $Fcoun['blog_id'];
		}				
		$blog_all = "'" . implode("','", $blog_id) . "'";
		if($session != '') { $query = "and id IN ($blog_all)"; }
		}
		
		$uree=("select * from blog_master where status = '1' $query order by insdate desc LIMIT $start_from, $limit");
		$ure = mysqli_query($con,$uree);
		while($urow=mysqli_fetch_array($ure)) {
		$cat_id = $urow['cat_id'];
		$coun=mysqli_query($con,"select * from blog_category where id = '$cat_id'");
		$Fcoun=mysqli_fetch_array($coun);  ?>
          <div class="col-12 col-sm-12 col-md-6 col-lg-4">
            <!-- Blog -->
            <div class="featured-venues-item">
              <div class="listing-item">
                <div class="listing-img"> <a href="blog/<?php echo $urow['seo_url']; ?>"> <img src="images/<?php echo $urow['image']; ?>" style="height:250px;"> </a>
                  <div class="fav-item-venues news-sports"> <span class="tag tag-blue"><?php echo $Fcoun['name']; ?></span>
                    
                  </div>
                </div>
                <div class="listing-content news-content">
                  <div class="listing-venue-owner">
                    <div class="navigation"> <a href="blog/<?php echo $urow['seo_url']; ?>"><img src="images/<?php echo $company_logo; ?>" alt="User">Dplay</a> <span ><i class="feather-calendar"></i><?php echo date("d M Y", strtotime($urow['insdate'])); ?></span> </div>
                  </div>
                  <h3 class="listing-title blog-title" style="font-size:20px;"> <a href="blog/<?php echo $urow['seo_url']; ?>"><?php echo $urow['name']; ?></a> </h3>
                </div>
              </div>
            </div>
            <!-- /Blog -->
          </div>
          <?php } ?>
      </div>
      <center>
        <?php  
        $sql = "SELECT COUNT(*) FROM blog_master where status = '1' $query";  
        $rs_result = mysqli_query($con,$sql);  
        $row = mysqli_fetch_row($rs_result);  
        $total_records = $row[0];  
        
        // Number of pages required.
        $total_pages = ceil($total_records / $limit);  
        $pagLink = "";                        
        for ($i=1; $i<=$total_pages; $i++) {
          if ($i==$pn) {
              $pagLink .= "<span class='active'><a style='background-color:#034AAB; color:#ffffff; padding:5px 10px; font-size:19px; margin:5px;' href='blog.php?page=".$i."'>".$i."</a></span>";
          }            
          else  {
              $pagLink .= "<span><a style='background-color:#02BE61; color:#ffffff; padding:5px 10px; font-size:19px; margin:5px;' href='blog.php?page=".$i."'>".$i."</a></span>";  
          }
        };  
        echo $pagLink;  
      ?>
      </center>
      <!--Pagination-->
      <!--Pagination-->
    </div>
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js" type="40e86cfbeda9a471edb8f5e8-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="40e86cfbeda9a471edb8f5e8-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="40e86cfbeda9a471edb8f5e8-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="40e86cfbeda9a471edb8f5e8-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="40e86cfbeda9a471edb8f5e8-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b8572a98a4c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
