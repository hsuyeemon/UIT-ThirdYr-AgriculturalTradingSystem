<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<select id="main_cata" onchange="changeData()">
  <option value="agri">agricultural products</option>
  <option value="fert">fertilizers</option>
  <option value="equi">equipments</option>
</select>
<select id="sub_cata" onchange="changeData()">
  <option value="fruits" id="0">fruits</option>
  <option value="grocery" id="1" >grocery</option>
  <option value="stable" id="2">stable foods</option>
  <option value="hello" id="3" style="display:none;">stable foods</option>
  <option value="hello" id="4" style="display:none;">stable foods</option>
  <option value="hello" id="5" style="display:none;">stable foods</option>
  <option value="hello" id="6" style="display:none;">stable foods</option>
</select>
<script type="text/javascript">
	function changeData() {
	var e = document.getElementById("main_cata");
	var strUser = e.options[e.selectedIndex].value;

	switch(strUser){
	
		case "fert":document.getElementById("0").value="pesticide";
		            document.getElementById("0").innerHTML="pesticide";
		            document.getElementById("1").value="Nitrogen";
		            document.getElementById("1").innerHTML="Nitrogen fertilizer";
		            document.getElementById("2").value="phosphorous";
		            document.getElementById("2").innerHTML="phosphorous fertilizer";
		            document.getElementById("3").value="Potassium";
		            document.getElementById("3").innerHTML="Potassium fertilizer";
		            document.getElementById("3").style.display = "block";

		break;
		case "equi":document.getElementById("0").value="Cultipacker";
		            document.getElementById("0").innerHTML="Cultipacker";
		            document.getElementById("1").value="Harrow";
		            document.getElementById("1").innerHTML="Harrow";
		            document.getElementById("2").value="Roller";
		            document.getElementById("2").innerHTML="Roller";
		            document.getElementById("3").value="Subsoiler";
		            document.getElementById("3").innerHTML="Subsoiler";
		            document.getElementById("3").style.display = "block";
		break;

	}


		}

</script>
</body>
</html>
<!-- parseInt() -->