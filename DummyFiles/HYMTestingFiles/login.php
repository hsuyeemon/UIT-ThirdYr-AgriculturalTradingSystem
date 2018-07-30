<?php
session_start();

define("USERNAME","john");
define("PASSWORD","secret");

if(isset($_POST["login"])){
login();
}
elseif(isset($_GET["action"]) and $_GET["action"]=="logout"){
logout();
}
elseif(isset($_SESSION["username"])){
displayPage();
}else{
displayLoginForm();
}


function login(){
if(isset($_POST["username"]) and isset($_POST["password"])){
if($_POST["username"]==USERNAME and $_POST["password"]==PASSWORD){
$_SESSION["username"]=USERNAME;
session_write_close();
header("Location:login.php");
}else{
displayLoginForm("Sorry,thatusername/passwordcouldnotbefound.
Please
tryagain.");
}
}
}
function logout(){
unset($_SESSION["username"]);
session_write_close();
header("Location:login.php");
}
function displayPage(){
displayPageHeader();
?>
<p>Welcome,<strong><?php echo$_SESSION["username"]?></strong>!Youare
currentlyloggedin.</p>
<p><ahref="login.php?action=logout">Logout</a></p>
</body>
</html>
<?php
}
function displayLoginForm($message=""){
displayPageHeader();
?>
<?php if($message) echo'<p class="error">'.$message.'</p>'?>
<form action="login.php"method="post">
<div style="width:30em;">
<label for="username">Username</label>
<input type="text"name="username"id="username"value=""/>
<label for="password">Password</label>
<input type="password"name="password"id="password"value=""/>
<div style="clear:both;">
<input type="submit"name="login"value="Login"/>
</div>
</div>
</form>
</body>
</html>
<?php
}
function displayPageHeader(){
?>
<!DOCTYPE htmlPUBLIC"-//W3C//DTDXHTML1.0Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<htmlxmlns="http://www.w3.org/1999/xhtml"xml:lang="en"lang="en">
<head>
<title>Alogin/logoutsystem</title>
<link rel="stylesheet"type="text/css"href="common.css"/>
<styletype="text/css">
.error{background:#d33;color:white;padding:0.2em;}
</style>
</head>
<body>
<h1>A login/logoutsystem</h1>
<?php
}
?>