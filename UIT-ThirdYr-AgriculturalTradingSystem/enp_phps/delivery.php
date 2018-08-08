<!DOCTYPE html>
<html>
<head>
	<title></title>
	   <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<form action="deliver_form_handler.php" method="post">
	name<input type="text" name="username" id="username" value="">
	amount<input type="text" name="amount" id="amount" value="">
	address<input type="text" name="address" id="address" value="">
	phone<input type="text" name="phone" id="phone" value="">
	expected latest time<input type="text" class="datepicker" name="expected_date">

	<input type="submit" name="order" value="order">
</form>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script type="text/javascript">
         $(document).ready(function(){
         $('.datepicker').datepicker();
              });
      

                </script>
                <script type="text/javascript" src="js/materialize.min.js"></script>
                <script src="js/materialize.js"></script>
                <script src="js/init.js"></script>
 
</body>
</html>