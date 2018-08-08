
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<script src="js/jquery-3.1.1.js"></script>
<script>
var myVar = "tsadfwest";
  var cart= ["Apple",2.00,2,"orange",2.00,2,"pineapple",2.00,2,"Apple",2.00,2] ;
  var jsonString = JSON.stringify(cart);


 $.ajax({
  url: "receiveFromJS.php",
  type: "POST",
  data:{data : jsonString}

}).done(function(data) {
     console.log(data);
});
</script>

</body>
</html>