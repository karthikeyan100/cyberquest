<!doctype html>
<html>
<head>
	<style>
  h1
  {
    background-color:#0f4646;
    color:#00e9e9;
    top: 0;
    padding: 50px;
    margin-top:-15px;
    margin-left: -15px;
    margin-right: -15px;

  }
	body {font-family: Arial, Helvetica, sans-serif;
    background-color: #006666;}
form {border: 3px }
input[type=text], input[type=number], input[type=password] {
    width: 50%;
    padding: 12px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid red;
    box-sizing: border-box;
}
	 #submitButton {
      background-color: #0f4646;
    color: white;
    padding: 30px 30px;
    bottom: 0;
    margin-left: -15px;
    margin-right: -30px;
    border: none;
    cursor: pointer;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  
  input[type=submit] {
    background-color: #111111;
    color: white;
    bottom: 0;
    font-size: 1.5em;
    font-weight: bold;
    padding: 16px 8px;
    margin-bottom:-15px;
    margin-left: 15px;
    margin-right: 15px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    width: 15%;
}
input[type=submit]:hover {background-color: white;color: red;}

.container {
    padding: 16px;
    margin-left: 9%;
}
</style>
</head>
<body align="center"> 

<?php

    //cookie
    $cookie_name = "user";
    $cookie_value = "John Doe";
    
    if(!isset($_COOKIE[$cookie_name])) {
        $x=0;
    }
    else
        $x=1;
   
  // if there is either no file OR the file to too old, render the page and capture the HTML.

 
  // finally send browser output
  
  echo '
  <script>
  function validateUser() {
     var allowed = false;
    
     var pass = document.forms["user"]["password"].value;
     if(pass=="shivz") {
         
         document.cookie = "user" + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
         location.reload();
         return false;
     }
     if(pass=="snapdragon") {
       allowed = true;
     }
     if('.$x.'==0 && pass=="dragon") {
        allowed = true;
     }
     if('.$x.'==1 && pass != "snapdragon")
        alert("Call invigilator");
     else if(!allowed)
        alert("Improper password");
     else
        setTimeout(window.location.reload.bind(window.location), 1000);
     return allowed;
  } 
  </script>'
?>
  <h1>Cyber Quest</h1>
<form name="user" action ="questions.php" target="_blank" onsubmit="return validateUser()" method="post">
	<div class="container" align="right" style="margin-right: 55px;">
    <img style="float: left; " src="cq_logo.png" height="100px"  />
   
<input type ="number" name="roll_no" placeholder="Enter roll no" required/><br>
<input type ="text" name="name" placeholder="Enter Name" required/><br>
 <div style="float:left;">
    <p style="
        float: left;
        color: #ffffff;
        text-shadow: 2px 2px 10px #00e9e9;
        text-align: center;
        font-size: 1em;
        font-family:Sans-serif;
        font-weight: bold;">
        <b>An innovative way to showcase your abilities in the grounds of<br/> technological general knowledge<br/>
        <br/>Give it a GO</b>
    </p>
    </div>
<input type ="text" name="college" placeholder="Enter college" required/><br>
<input type ="text" name="dept" placeholder="Enter department" required/><br>
<input type ="number" name="year" placeholder="Enter year" required/><br>
<input  type ="password" name="password" placeholder="Enter password" required/><br>
</div>
</br>
<div id = "submitButton">
<input type="submit" style="margin-bottom: 0px;text-align: center;"  value="Enter Test"/>
</div>
</form>
</body>
</html>