<?php
session_start();
//Cache creation
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/")
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<?php
$_SESSION["roll_no"]=$_POST["roll_no"];
$_SESSION["college"]=$_POST["college"];
$_SESSION["dept"]=$_POST["dept"];
$_SESSION["year"]=$_POST["year"];
$_SESSION["name"] = $_POST["name"];
include 'config.php';

;

$con = mysqli_connect($hostname,$username,$password,$dbname);
if(!$con){
	echo "connection failed";
}
$smt = $con->prepare("select * from questions");
$smt->execute();
$rs= $smt->get_result();
$c=1;
?>

<script>

$(window).blur(function() {
    document.forms["myform"].submit();
});


var min = 20;
var sec = 0;
function secondPassed() {
    sec--;
    if(sec<0) {
    	sec+=60;
    	min--;
    }

    var timer = document.getElementById('timer');
    
     timer.innerHTML = (min<10 ? '0': '')+ min + ':' + (sec < 10 ? '0' : '') + sec;
    
}

var countdownTimer = setInterval(secondPassed, 1000);
</script>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<style>
.fsSubmitButton
{
padding: 10px 15px 11px ;
font-size: 18px ;
background-color: #0f4646;
font-weight: bold;

color: #00e9e9;
margin: 0 auto;
border-radius: 3px;
cursor: pointer;

}

h1 { 
    display: block;
    font-size: 2em;
    font-family:Sans-serif;
    margin: -10px;
    padding:20px;
    font-weight: bold;
}

ul {
    list-style-type: none;
    margin: -8px -8px 10px -8px;
	
    padding: 5px 0px;
    overflow: hidden;
    background-color: #0f4646;
    position: sticky;
    top:72px;
}

li {
	overflow: hidden;
    float: left;
    width: 5%;
	   
}

li a {
    
    display: block;
    color:#009999;
    text-align: center;
    padding: 16px;
    
    text-decoration: none;
    font-family:Sans-serif;
    font-weight:bold;
    font-size:24px;
}

li a:hover {
    background-color: #003333;
    border-radius: 28px;
    color: #00e9e9;
    
}

</style>
<title>Cyber Quest</title>
</head>
<body  style="background-color:#006666;font-family: sans-serif;">
<h1 style="position:sticky;top:0px;background-color:#0f4646;color:#00e9e9;padding-left: 20px;">Cyber Quest</h1>
<b>
<div style='float:right;color:#00e9e9;font-size:36px;font-style: ;font-family:sans-serif;position: fixed;top: 16px;right: 16px' id='timer'></div>
</b>

<a id='1'> </a>

<ul >
	<?php
	$c=1;

	while($row = $rs->fetch_assoc()){
		
  		echo "<li><a href='#".$c."'>".$c."</a></li>";
  		$c ++;
  	}
 	?>
</ul>
<div>
<?php
$c=1;
echo "<body style='text-align:center; color:green;' QUESTIONS>";
echo "<div style='float:right;font-size:16px;position:sticky;top:0px' id='timer'></div>";
echo "<form name='questions' id='myform' action = 'evaluate.php' method='post'>";
$smt = $con->prepare("select * from questions");
$smt->execute();
$rs= $smt->get_result();
while($row = $rs->fetch_assoc()){
	echo "<div
	style='
	box-shadow: 5px 5px 5px #00e9e9;
	height:auto;
	overflow: auto;
	background-color:#efefef; 
	padding:5px 3% ;
	margin:30px 2%'><h2 style='color: #0f4646;'>Question ".$c."</h2>";

	$x = "question".$c;
	echo "<p id ='".($c+1)."''>".$row["question"] . "</p>";
	echo "<input type='radio' name='". $x ."' value='**'checked hidden/>";
	echo "<input type='radio' name='". $x ."' value='a' />";
	echo "a . ".$row["option1"] . "<br/>";
	echo "<input type='radio' name='". $x ."' value='b' />";
	echo "b . ".$row["option2"]. "<br/>";
	echo "<input type='radio' name='". $x ."' value='c'/>";
	echo "c . " .$row["option3"]. "<br/>";
	echo "<input type='radio' name='". $x ."'value='d' />";
	echo "d . ".$row["option4"]. "<br/>";
	
	$c ++;
	echo "<p></p></div>";
	
}
echo '<div style="text-align:center">';
echo "<input  class='fsSubmitButton' type ='submit' value = 'End test' />";
echo '</div>';
echo "</form>";
?>
</div>

	
<script>
	window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 100);

        function submitform(){
          alert('Test has been completed...!');
          document.forms['myform'].submit();
        }

        function autoRefresh(){
           clearTimeout(auto);
           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 20*60*1000);
        }
    }
 </script>

</html>