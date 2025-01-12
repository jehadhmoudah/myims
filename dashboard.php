<?php require_once 'includes/header.php'; ?>

<?php

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = "";
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalRevenue = (double)$totalRevenue + (double)$orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$userwisesql = "SELECT users.username , SUM(orders.grand_total) as totalorder FROM orders INNER JOIN users ON orders.user_id = users.user_id WHERE orders.order_status = 1 GROUP BY orders.user_id";
$userwiseQuery = $connect->query($userwisesql);
$userwieseOrder = $userwiseQuery->num_rows;

$connect->close();

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">
	<?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
		<div class="col-md-4">
			<div class="panel panel-success" style="border-radius: 10px">
				<div class="panel-heading" style="border-radius: 8.5px">

					<a href="product.php" style="text-decoration:none;color:black;">
						Total Product
						<span class="badge pull pull-right"><?php echo $countProduct; ?></span>
					</a>

				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->

		<div class="col-md-4">
			<div class="panel panel-danger" style="border-radius: 10px">
				<div class="panel-heading" style="border-radius: 8.5px">
					<a href="product.php" style="text-decoration:none;color:black;">
						Low Stock
						<span class="badge pull pull-right"><?php echo $countLowStock; ?></span>
					</a>

				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->


	<?php } ?>
	<div class="col-md-4">
		<div class="panel panel-info" style="border-radius: 10px">
			<div class="panel-heading" style="border-radius: 8.5px">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					Total Orders
					<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
				</a>

			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->



	<div class="col-md-4">
		<div class="card" style="border-radius: 10px">
			<div class="cardHeader" style="border-radius: 9px;">
				<!-- <h1><?php echo date('d'); ?></h1> -->
				<div class="cardContainer">
					<p style="font-size:28px; padding-top: 10px"><?php echo date('l') . ' ' . date('d') . ', ' . date('Y'); ?></p>
				</div>
			</div>


		</div>
		<br />

		<div class="card" style="border-radius: 10px">
			<div class="cardHeader"
				style="background: linear-gradient(45deg,rgb(255, 77, 0),rgb(255, 46, 199)); border-radius: 9px;">
				<h1><?php if ($totalRevenue) {
					echo "₪$totalRevenue";
				} else {
					echo '₪0';
				} ?></h1>
				<div class="cardContainer">
					<p style="font-size:14px"> INR Total Revenue</p>
				</div>
			</div>


		</div>
		<br />
		<br />
	</div>

	<?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> User Wise Order</div>
				<div class="panel-body">
					<table class="table" id="productTable">
						<thead>
							<tr>
								<th style="width:40%;">Name</th>
								<th style="width:20%;">Orders in Shekels</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($orderResult = $userwiseQuery->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $orderResult['username'] ?></td>
									<td><?php echo $orderResult['totalorder'] ?></td>

								</tr>

							<?php } ?>
						</tbody>
					</table>
					<!--<div id="calendar"></div>-->
				</div>
			</div>

		</div>
	<?php } ?>

</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
		// top bar active
		$('#navDashboard').addClass('active');

		//Date for the calendar events (dummy data)
		var date = new Date();
		var d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear();

		$('#calendar').fullCalendar({
			header: {
				left: '',
				center: 'title'
			},
			buttonText: {
				today: 'today',
				month: 'month'
			}
		});


	});
</script>

<?php require_once 'includes/footer.php'; ?>