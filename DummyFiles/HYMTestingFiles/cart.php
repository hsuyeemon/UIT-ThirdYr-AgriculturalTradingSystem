<?php

include( "common.buyer.php" );
include( "dblink.php" );

displayPageHeader( "Cart" );
?>

<div class="content padding-normal">

  <!---Items--------------------------->
  <h4  id="your_items">Your Items</h4>

  <table>
    <tr>
      <th>Image</th>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th><th></th>
    </tr>

<?php
include("dblink.php");

if(isset($_GET['pid'])){
$_SESSION['pid1Incart'].=$_GET['pid'].",";
}
$token = strtok($_SESSION['pid1Incart'], ",");

$i=0;
while ($token !== false)
{
$pids[$i]=$token;
$token = strtok(",");
$i++;
} 


$result = mysqli_query($con,"SELECT * FROM product where pid IN (".implode(',',$pids).")");

$itid=1;

$num_rows = mysqli_num_rows($result);
echo "<span id='num_row'>$num_rows</span>";
//echo "<span id='num_row'>$num_rows</span>";
while($row = mysqli_fetch_array($result))
{
  
$image = $row['p_image'];
$imageData = base64_encode(file_get_contents($image));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($image).';base64,'.$imageData;
?>

    <tr id ='<?php echo "div$itid"; ?>'>
      <td><img src='<?php echo $src;?>' height="100px" width="100px"></td>
      <td id='<?php echo "pid$itid";?>'><?php echo $row['pname'];?></td>
      <td>
        <div class="input-field">
           <input id="quantity" type="number" value="1" min="0" class="validate" onchange='calculate()'>


        <label for="quantity">Quantity</label>
        </div></td>
           <!--script type="text/javascript">
            var cost=<?php echo $row['price'] ?>;
             function calculate(){
              var quantity = document.getElementById('quantity').value;
              var cost = quantity*(<?php echo $row['price'];?>);
              alert(cost);
             }
             document.write('<td>'+cost+'</td>');
           </script-->
          
      <td><?php echo $row['price'];?></td>
      <td><a href="#" class="btn btn-default waves-effect  white
         green-text"><i class="material-icons">delete</i></a> </td>
       </tr>
<?php
$itid++;
}
?>

</table>
<?php
echo mysqli_error($con);
?>




      <!--Cash -------------->
      <div class="col s2">
     	<label>Payment Method</label>
  		<select class="browser-default">
    	<option value="1" id="cash_on_delivery">Cash On Delivery</option>
    	</select></div><br>

              <!--button class="btn green darken-3" type="submit" name="action" 
         onclick="show_alert()";>Order
      <i class="material-icons right">send</i> </button-->
      <a class="btn green white-text modal-trigger" href="#myModal" id="order">Order<i class="material-icons right">send</i></a>
     
     <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">
  <h4 id="order_your_items">Order Your Items</h4>
  
  <!---Items--------------------------->
    <form class="col" action="" method="" onsubmit=<form onsubmit="return show_alert();" onsubmit="vlaidOrder()">
  
    <div class="row">
        
        <div class="input-field col s10 ">
          <input id="phNo" type="text" class="validate" disabled="disabled" value="09448500348" required>
          <label for="phNo">PhoneNo</label>
        </div>
        <div class="input-field col s2">
          <a href="#" class="btn green white-text"><i class="material-icons">edit</i></a>  
        </div>
      </div>
      <div class="row">
        
        <div class="input-field col s10 ">
          <input id="email" type="email" class="validate" disabled="disabled" value="hsuyeemon@uit.edu.mm" required="required">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s2">
          <a href="#" class="btn green white-text "><i class="material-icons">edit</i></a>  
        </div>
      </div>
     
    <div class="row">
      <div class="input-field col s4 ">
          <input id="sAdd" type="text" class="validate" required="required">
          <label for="sAdd">Street Address</label>
        </div>

        <div class="input-field col s4 ">
          <input id="city" type="text" class="validate" required="required">
          <label for="city">City</label>
        </div>
        <div class="input-field col s4" required="required">
    <select id="state">
      <option value="1">Yangon</option>
      <option value="2">Manadalay</option>
      <option value="3">Magway</option>
    </select>
    <label for="state" id="state_region">State/Region</label>
  </div>
    </div>
    <div class="row">
      <input id="date" type="text" class="datepicker">
      <label for="date" id="date_label">Pick the preferred date</label>
    </div>
     <div class="row">
        <button class="modal-close btn green white-text" type="submit" name="action"
         onclick="show_alert()";>Confirm Order
      <i class="material-icons right">send</i>
      </button>
      <button class="modal-close btn green white-text" type="submit" name="action">Cancel<i class="material-icons right">cancel</i>
      </button>

      </div>
    </form>

   </div>

    </div>


</div></div></div>
<button type="button" onclick="getvalue();">getvalue</button>


<script type="text/javascript">
alert("script");
  var cart=new Array();
 // function getvalue(){
    alert("getvalue");
  var totalrow=document.getElementById('num_row').innerHTML;
  var i=0;
    var getpid='pid'+(i+1);
    var getprice='price'+(i+1);
    alert(document.getElementById(getpid).innerHTML);
  //  cart.push(document.getElementById(getprice).innerHTML);
    
  
  //cart.toString();
   // alert(cart);
  //}
  

   // var cart= ["Apple",2.00,2,"orange",2.00,2,"pineapple",2.00,2,"Apple",2.00,2] ;
  //var jsonString = JSON.stringify(cart);


//  $.ajax({
//   url: "receiveFromJS.php",
//   type: "POST",
//   data:{data : jsonString}

// }).done(function(data) {
//      console.log(data);
// });
//  alert(value);
// }
</script>



<!---Footer-------------------------------------------------->
<footer class="page-footer">
  <div class="row padding-normal container" id="aboutus">


      <h5 class="white-text" id="about_as1" style="text-align: center;padding: 16px;">About Us</h5>
      <p class="grey-text text-lighten-4 center-align">

  Our project team is organized with 7 students from UIT.Our idea is that to help trading agricultural products directly via B2B system.<br><br>

Trading between sellers and customers needs many steps and may face warehouse problems.
Repeated contributions may make the price up to double(or even triple) for buyers.<br><br>

We try hard to solve this problem in our system.
In our website, we efficiently provide logistics service to both sellers and contributors.<br><br>
Sellers and customers can directly trade without needing unnecessary steps that increase cost.<br><br>
It also saves time!!!<br><br>

The important benefit is that "Public can buy agricultural products cheeper than before."<br>



</p></div>
   <div class="row">
    <hr style="width: 300px;color: white">
  </div>

   
<div class="row padding-normal container" id="contactus">
    
      <h5 class="white-text" id="contact_us" style="text-align: center;padding: 16px">Contact Us</h5>

<div class="col s6">
  <ul>
        <li>Ei Nghon Phoo- Project leader and supervisor<br>
            email-einghonphoo@uit.edu.mm</li><br><br>
        <li>Yamin Thiri Aung- Designer and programmer<br>
            email-yaminthiriaung@uit.edu.mm</li><br><br>
        <li>Yamin Theint Theint- Programmer and Language Analyst <br>
            email- yamintheinttheint@uit.edu.mm</li><br><br>
        <li>Khine Min Htwe- Programmer <br>
            email- khineminhtwe@uit.edu.mm</li>      
      </ul>
</div>
<div class="col s6">
  <ul>
        <li>Khin Thantsin- Data analyst<br>
            email-khinthantsin@uit.edu.mm</li><br><br>
        <li>Ye Yint Aung- Content writer and market researcher<br>
            email-yeyintaung@uit.edu.mm</li><br><br>
        <li>Hsu Yee Mon- Coordinator and analyst<br>
            email- hsuyeemon@uit.edu.mm</li>   
      </ul>
      <h4> if you have any conflicts or problems feel free to contact us</h4>
</div>
      
    
  </div>
  <div class="footer-copyright">
    <div class="container center-align">
      © 2018 Agricultural Trading System
    </div>
  </div>
</footer>


<script type="text/javascript">

  var cart=new Array();
  function getvalue(){
  var totalrow=document.getElementById('num_row').innerHTML;
  var i=0;
    var getpid='pid'+(i+1);
    var getprice='price'+(i+1);
    alert(document.getElementById(getpid).innerHTML);
  //  cart.push(document.getElementById(getprice).innerHTML);
    
  
  //cart.toString();
   // alert(cart);
  }
  
</script>

<script src="js/jquery-3.1.1.js"></script>
<script>

</script>

</body>
</html>

     
    
	<!-----Script to Import---------------------->

  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>   



   <script>
	
    //drop dowm
    $(document).ready(function(){
    $(".dropdown-trigger").dropdown({ hover: true });
    $('.modal').modal();
    $('select').formSelect();
    $('.datepicker').datepicker();
  });
  
</script>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
  function language(){
    document.getElementById("myanmar").innerHTML="ဘာသာစကား";
    document.getElementById("order_your_items").innerHTML="သင္ေရြးခ်ယ္ထားေသာ ပစၥည္းမ်ားကို ေအာ္ဒါမွာရန္";
    document.getElementById("phoneno").innerHTML="ဖုန္းနံပါတ္";
    document.getElementById("email").innerHTML="အီးေမးလ္ လိပ္စာ";
    document.getElementById("street").innerHTML="လမ္း";
    document.getElementById("city").innerHTML="ၿမိဳ႕";
    document.getElementById("state_region").innerHTML="တိုင္းေဒသႀကီး /ျပည္နယ္";
    document.getElementById("document.getElementById("your_items").innerHTML="သင္ေရြးခ်ယ္ထားေသာ ပစၥည္းမ်ား";
    document.getElementById("document.getElementById("cash_on_delivery").innerHTML="ပစၥည္းေရာက္ေငြေခ်စနစ္";
    



    
    
  }
</script>



<!-- script for mobile nav -->

                  <script type="text/javascript">
                   $(document).ready(function(){
                   $('.sidenav').sidenav();
                    });

                </script>

                <script type="text/javascript">
                  
                  function vlaidOrder()
                  {
                  var phNo=document.getElementById("phNo").value;
                  var sAdd=document.getElementById("sAdd").value;
                  var city=document.getElementById("city").value;

                  var phNoReg=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
                  var sAddReg=/^[A-Za-z\s]+$/;

                  var cityReg=/^[A-Za-z\s]+$/;

                  if (phNo.match(phNoReg))
                  {
                    if (sAdd.match(sAddReg))
                    {
                       if (city.match(cityReg))
                       {
                         alert("Success");
                         return false;
                        
                       }else{
                        alert ("Invalid city");
                        return false;
                       }
                    }else{
                      alert ("Invalid Street Address");
                      return false;
                    }

                  }else{
                    alert ("Invalid Phone Number");
                    return false;
                  }
                }

                </script>

<?php
displayPageFooter();
?>