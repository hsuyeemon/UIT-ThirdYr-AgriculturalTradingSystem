<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
	if(isset($_POST["text"])){
		echo "Your text is:".$_POST["text"];
	}
	?>

<form id="form1" action="" method="">
	<input type="text" id="text" name="text" value="">
	<input type="button" value="submit" onclick="validate()">
</form>


<script type="text/javascript">
	function validate(){
		//do validation
		alert("This is validate function");
		var text = document.getElementById("text").value;
		alert("Input:"+text);
		if(text!= null && text =="happy"){
    	var form = document.getElementById('form1');
    	form.method="post";
    	form.action='validation.php';
    	form.submit();
		}
	}
</script>
</body>
</html>