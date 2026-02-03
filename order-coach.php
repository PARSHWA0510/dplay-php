<?php  error_reporting(0); session_start(); include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 

$logoaddp=mysqli_query($con,"select * from company_master");
$logoaddsp=mysqli_fetch_array($logoaddp);
echo $google_analytic_code = $logoaddsp['google_analytic_code'];
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Order Confirmed • DPlays!</title>
<style>
:root {
 --bg: #0f172a;          /* slate-900 */
 --card: #111827;        /* gray-900 */
 --muted: #94a3b8;       /* slate-400 */
 --text: #e5e7eb;        /* gray-200 */
 --accent: #22c55e;      /* green-500 */
 --accent-2: #06b6d4;    /* cyan-500 */
 --border: #1f2937;      /* gray-800 */
 --warn: #f59e0b;        /* amber-500 */
 --danger: #ef4444;      /* red-500 */
 --shadow: 0 20px 40px rgba(0, 0, 0, .35);
 --radius-2xl: 20px;
}
 @media (prefers-color-scheme: light) {
      :root {
 --bg: #f8fafc;        /* slate-50 */
 --card: #ffffff;
 --muted: #64748b;     /* slate-500 */
 --text: #0f172a;       /* slate-900 */
 --border: #e2e8f0;     /* slate-200 */
 --shadow: 0 10px 30px rgba(2, 6, 23, .08);
}
}
* {
	box-sizing:border-box
}
body {
	margin:0;
	background:radial-gradient(1200px 800px at 90% -10%, rgba(34, 197, 94, .18), transparent 50%), radial-gradient(900px 700px at -10% 10%, rgba(6, 182, 212, .18), transparent 45%), var(--bg);
	color:var(--text);
	font: 16px/1.4 system-ui, -apple-system, Segoe UI, Roboto, Inter, sans-serif;
	padding: 32px;
	min-height: 100vh;
}
.container {
	max-width: 1100px;
	margin: 0 auto;
	display: grid;
	gap: 24px;
grid-template-columns: 1.4fr .9fr;
}
header {
	grid-column: 1/-1;
	display:flex;
	align-items:center;
	gap:16px;
	padding: 16px 18px;
	border:1px solid var(--border);
	border-radius: var(--radius-2xl);
	background: linear-gradient(180deg, rgba(255, 255, 255, .02), rgba(255, 255, 255, 0)), var(--card);
	box-shadow: var(--shadow);
}
.logo {
	display:flex;
	align-items:center;
	gap:10px;
	font-weight:800;
	letter-spacing:.3px
}
.logo-badge {
	height:36px;
	width:36px;
	border-radius:10px;
	display:grid;
	place-items:center;
	background: linear-gradient(135deg, var(--accent), var(--accent-2));
	color:white
}
.check {
	margin-left:auto;
	display:flex;
	align-items:center;
	gap:10px;
	background: rgba(34, 197, 94, .12);
	color: #16a34a;
	border:1px solid rgba(34, 197, 94, .35);
	padding:8px 12px;
	border-radius: 999px;
	font-weight:600
}
.grid {
	display:grid;
	gap: 24px;
}
.card {
	background: var(--card);
	border:1px solid var(--border);
	border-radius: var(--radius-2xl);
	box-shadow: var(--shadow);
}
.section {
	padding: 20px;
}
.section + .section {
	border-top: 1px dashed var(--border);
}
h1 {
	font-size: clamp(20px, 2.2vw, 28px);
	margin: 0;
}
h2 {
	font-size: 16px;
	margin: 0 0 8px 0;
	color: var(--muted);
	font-weight:700;
	text-transform: uppercase;
	letter-spacing: .12em;
}
.order-meta {
	display:flex;
	gap: 18px;
	flex-wrap: wrap;
	margin-top: 6px;
	color: var(--muted)
}
.order-meta span {
	padding:6px 10px;
	border:1px dashed var(--border);
	border-radius: 10px;
}
.items {
	width: 100%;
	border-collapse: collapse;
}
.items th, .items td {
	padding: 12px 8px;
	text-align:left;
	border-bottom:1px dashed var(--border);
}
.items th {
	color: var(--muted);
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing:.08em;
}
.item {
	display:flex;
	gap:12px;
	align-items:center;
}
.item img {
	width:56px;
	height:56px;
	object-fit:cover;
	border-radius: 12px;
	border:1px solid var(--border);
}
.muted {
	color: var(--muted);
}
.totals {
	display:grid;
	gap: 10px;
}
.totals .row {
	display:flex;
	justify-content:space-between;
	align-items:center;
}
.totals .grand {
	font-size: 20px;
	font-weight:800;
	border-top:1px dashed var(--border);
	padding-top: 14px;
	margin-top: 8px;
}
.addresses {
	display:grid;
	grid-template-columns: 1fr 1fr;
	gap: 14px;
}
.address {
	border:1px dashed var(--border);
	border-radius: 14px;
	padding: 12px;
}
.progress {
	display:flex;
	align-items:center;
	justify-content:space-between;
	gap:8px;
}
.step {
	flex:1;
	position:relative;
	text-align:center;
}
.dot {
	width: 14px;
	height: 14px;
	border-radius:50%;
	background: #0b1220;
	border:2px solid var(--border);
	margin: 0 auto 8px;
	position:relative;
	z-index:2;
}
.step.active .dot {
	background: var(--accent);
	border-color: rgba(34, 197, 94, .75);
	box-shadow: 0 0 0 6px rgba(34, 197, 94, .15);
}
.bar {
	position:absolute;
	height:2px;
	background: linear-gradient(90deg, var(--accent), var(--accent-2));
	top:6px;
	left:50%;
	right:-50%;
	z-index:1;
	opacity:.35
}
.label {
	font-size: 12px;
	color: var(--muted)
}
.actions {
	display:flex;
	gap: 10px;
	flex-wrap: wrap;
}
.btn {
	appearance:none;
	border:none;
	background: var(--text);
	color: var(--bg);
	padding: 12px 16px;
	border-radius: 999px;
	font-weight: 700;
	cursor:pointer;
transition: transform .04s ease;
}
.btn:hover {
	transform: translateY(-1px);
}
.btn.secondary {
	background: transparent;
	color: var(--text);
	border:1px solid var(--border);
}
.btn.success {
	background: linear-gradient(135deg, var(--accent), var(--accent-2));
	color: white;
}
footer {
	grid-column:1/-1;
	text-align:center;
	color: var(--muted);
	font-size: 13px;
}
 @media (max-width: 980px) {
 .container {
grid-template-columns: 1fr;
}
}
 @media print {
body {
	background: white;
	padding: 0
}
header, .actions {
	display:none
}
.card {
	box-shadow:none;
	border-color:#ddd
}
}
</style>
</head>
<body>
<div class="container">
  <header>
    <?php 
$ure=mysqli_query($con,"select * from company_master");
$row=mysqli_fetch_array($ure);
$company_logo = $row['company_logo']; 
$company_email = $row['email']; 
$company_mobile1 = $row['mobile1']; 
?>
    <div class="logo"> <a href="<?php echo $siteurl_link; ?>/"><img src="images/<?php echo $company_logo; ?>" class="img-fluid"  style="width:100%; height:80px"></a> </div>
    <div class="check" role="status" aria-live="polite">
      <!-- Check icon -->
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      Order Confirmed </div>
  </header>
  <!-- Left column: items + shipping -->
  <?php $order_id = $_GET['order_id']; 
$urexy=mysqli_query($con,"select * from user_order where order_id = '$order_id'");
$urowx=mysqli_fetch_array($urexy);
$coach_batch_id = $urowx['coach_batch_id'];  ?>
  <main class="grid">
    <section class="card section">
      <h1>Thanks, <span class="muted">your gear is on the way!</span></h1>
      <div class="order-meta" aria-label="Order meta"> <span>Order # <strong><?php echo $order_id; ?></strong></span> <span>Placed on <strong><?php echo date("d m Y", strtotime($urowx['order_datetime'])); ?> <?php echo date("h:i A", strtotime($urowx['order_datetime'])); ?></strong></span> </div>
    </section>
    <section class="card">
      <div class="section">
        <h2>Order Summary</h2>
        <style>
.dz-post-text table tbody tr:nth-of-type(odd),
.dz-page-text table tbody tr:nth-of-type(odd),
.wp-block-table tbody tr:nth-of-type(odd) {
  text-align:left; background-color:#f5f5f5 }
.dz-post-text td,
.dz-post-text th,
.dz-page-text td,
.dz-page-text th,
.wp-block-table td,
.wp-block-table th {
  padding: 1px 2px !important;
  border: 0.0625rem solid #e4e4e4;
   }
.dz-post-text td p { margin:0px }
td { text-align:left !important; } 
</style>
        <table border="0" style="width:100%; margin-bottom:10px" class="items" role="table" aria-label="Order items">
                  <?php 
$ureb=mysqli_query($con,"select * from coach_batch where id = '$coach_batch_id'");
$urowb=mysqli_fetch_array($ureb);  $batch_id = $urowb[0];  ?>
                  <tr>
                    <td><strong><?php echo $urowb['name']; ?></a></strong>
                      <h5 style="margin-top:5px; margin-bottom:5px;"><?php echo date("d-m-y", strtotime($urowb['start_date'])); ?> To <?php echo date("d-m-y", strtotime($urowb['end_date'])); ?></h5>
                      <h5 style="margin-top:5px; margin-bottom:5px;"><?php echo date("h:i A", strtotime($urowb['start_time'])); ?> To <?php echo date("h:i A", strtotime($urowb['end_time'])); ?></h5>
                      <?php 
						$urebd=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' group by batch_day order by batch_date asc");
						while($urowbd=mysqli_fetch_array($urebd)) { ?>
                        <span class="btn btn-mini btn-primary" style="padding:2px; font-size:11px"><?php echo $urowbd['batch_day']; ?></span>&nbsp;
                        <?php } ?>
                      <h5 style="margin-top:10px; margin-bottom:5px;">No of Session : <?php echo $urowb['noof_session']; ?></h5>
                      </td>
                  </tr>
                </table>
      </div>
      <div class="section">
        <div class="totals">
          <?php 
		$urexy=mysqli_query($con,"select * from user_order where order_id = '$order_id'");
		$urowx=mysqli_fetch_array($urexy);
		?>
          <div class="row"><span class="muted">Subtotal</span><strong>Rs. <?php echo $urowx['total_amount']; ?></strong></div>
          <div class="row"><span class="muted">Discount</span><strong>Rs. <?php echo $urowx['couponcode_price']; ?></strong></div>
          <div class="row grand"><span>Total Paid</span><span>Rs. <?php echo $urowx['final_amount']; ?></span></div>
        </div>
      </div>
    </section>
    <?php /*?><section class="card section">
      <h2>Delivery Progress</h2>
      <div class="progress" aria-label="Order progress">
        <div class="step active">
          <div class="dot"></div>
          <div class="bar"></div>
          <div class="label">Confirmed</div>
        </div>
        <div class="step active">
          <div class="dot"></div>
          <div class="bar"></div>
          <div class="label">Packed</div>
        </div>
        <div class="step">
          <div class="dot"></div>
          <div class="bar"></div>
          <div class="label">Shipped</div>
        </div>
        <div class="step">
          <div class="dot"></div>
          <div class="label">Out for Delivery</div>
        </div>
      </div>
    </section><?php */?>
  </main>
  <!-- Right column: address + actions -->
  <aside class="grid"  style="display:block">
    <section class="card section" >
      <h2>Address Detail</h2>
      <?php 
$ure=mysqli_query($con,"select * from coach_batch where id = '$coach_batch_id'");
while($urow=mysqli_fetch_array($ure)) { 
$coach_id = $urow['coach_id'];
$master = mysqli_query($con,"SELECT * FROM user_master WHERE id = '$coach_id'");
$master_detail = mysqli_fetch_array($master); ?>
      <div class="addresses" style="display:block">
        <div class="address"> <strong><?php echo $master_detail['name']; ?></strong>
          <div>Contact No : <?php echo $master_detail['contact1']; ?></div>
          <div>Address : <?php echo $master_detail['address']; ?></div>
        </div>
        
      </div>
      <?php } ?>
    </section><br>

    <section class="card section">
      <h2>Next Steps</h2>
      <div class="actions">
        <button class="btn secondary" id="printBtn">Print</button>
        <button class="btn" id="shopBtn" onClick="location.href = 'index.php';">Continue Shopping</button>
      </div>
    </section>
    
    <section class="card section">
      <h2>Gear-up for your match</h2>
      <div class="actions">
         <?php								 
			$ure=mysqli_query($con,"select * from sport_type where status = '1' and home_status = '1' order by ABS(orderlist) asc");
			while($urow=mysqli_fetch_array($ure))
			{ ?>
            <div class="featured-venues-item" style="border:solid 1px #CCCCCC">
              <div class="listing-item mb-0">
                <div class="listing-img" style="padding:10px;"> <a href="venue-search.php?sport_type=<?php echo $urow['name']; ?>"> <img style="width:90px" src="images/<?php echo $urow['image']; ?>"> </a></div>
                <div class="listing-content list-coche-content" style="background-color:#f5f5f5">
                  <h3 style="margin-block-start: 0em; margin-block-end: 0em;  text-align:center"><a href="venue-search.php?sport_type=<?php echo $urow['name']; ?>" style="text-decoration:none; font-size:14px; color:#000000;"><?php echo $urow['name']; ?></a></h3>
                   </div>
              </div>
            </div>
            <?php } ?>
      </div>
    </section>
    
  </aside>
  <footer class="muted">Need help? Email : <?php echo $company_email; ?> or call : <?php echo $company_mobile1; ?> (10am–7pm IST)</footer>
</div>

</body>
</html>
