<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input id="quantity" type="number" value="1" onchange="calculate()">


<script type="text/javascript">

	function calculate() {
		// body...
		var i = document.getElementById('quantity').value;
		alert(i*4);

	}
	
</script>
</body>
</html>