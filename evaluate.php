<?php
session_start();
include 'config.php';
$con = mysqli_connect($hostname,$username,$password,$dbname);
if(!$con){
	echo "connection failed";
}
$smt = $con->prepare("select * from questions");
$smt->execute();
$res= $smt->get_result();
$c=1;
$score = 0;
while($row = $res->fetch_assoc()){
	$x = "question".$c;
	if($_POST[$x] == $row["answer"]){
		$score++;
	}
	$c++;
}
echo $score;
$smt = $con->prepare("insert into leaderboard (roll_no , name , college , dept , year , score) values (?,?,?,?,?,?) ");
$smt->bind_param('sssssi',$_SESSION["roll_no"], $_SESSION["name"],$_SESSION["college"],$_SESSION["dept"],$_SESSION["year"], $score);
$smt->execute();


echo '
<head>
	<title>Success! ; )</title>
	<meta http-equiv="refresh" content="5;url=http://cyberquest.000webhostapp.com/leaderboard.php" />
</head>
<body style="background-color:#0f4646; align-items: center;">
	<div style="background-color: #000000;
	            width: 40%;
                height: 110px;
                position: absolute;
                top:0;
                bottom: 0;
                left: 0;
                right: 0;
				margin: auto;
				padding: 30px;
				border-radius: 8px;
				color: #fff;
				text-align: center;
				font-weight: bold;
				font-family: sans-serif; 
				">
		<p style="padding-top:10px">CONGRATS!!! You have successfully attempted the quiz<br><br>you will redirected to the current results page... : )</p>
	</div>
</body>
'
?>