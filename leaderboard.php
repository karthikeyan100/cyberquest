<!DOCTYPE html>
<html lang="en">
<head>
	<title>LeaderBoard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body >
	<div class="limiter" >
		<div class="container-table100" style="background-color: #0f4646;">
			<div class="wrap-table100" style="background-color: #0f4646;">
				<div class="table100 ver3 m-b-110" style="background-color: #0f4646;">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Name</th>
									<th class="cell100 column2">College</th>
									<th class="cell100 column3">Department</th>
									<th class="cell100 column4">year</th>
									<th class="cell100 column5">score</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>

<?php
include 'config.php';
$con = mysqli_connect($hostname,$username,$password,$dbname);
if(!$con){
	echo "connection failed";
}
$smt = $con->prepare("select * from leaderboard order by score desc");
$smt->execute();
$res= $smt->get_result();


while($row = $res->fetch_assoc()){
	echo "<tr class='row100 body'>";
	echo "<td class='cell100 column1'>" .$row['name']."</td>";
	echo "<td class='cell100 column2'>" .$row['college']."</td>";
	echo "<td class='cell100 column3'>" .$row["dept"]."</td>";
	echo "<td class='cell100 column4'>" .$row["year"]."</td>";
	echo "<td class='cell100 column5'>" .$row["score"] ."</td>";
	echo "</tr>";
}
?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>