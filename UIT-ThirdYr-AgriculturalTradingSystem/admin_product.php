
<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
        <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


 	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="css/style.css" rel="stylesheet" />  
   
     </head>

<body class="#ccff90 light-green accent-1">

  <!---Navigation------------------------------------->
  
  <!-- Dropdown Structure -->

  <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="#" id="myanmar" onclick="">ျမန္မာစာ</a></li>
    <li class="divider"></li>
    <li><a href="#" id="english" onclick="">English</a></li>
  </ul>

  <!--Login--------------------->
  <ul id="authentication" class="dropdown-content">
    <li><a href="#login" class="modal-trigger ">Login</a></li>
    <li class="divider"></li>
    <li><a href="#signup" class="modal-trigger ">Sign Up</a></li>
  </ul>

  <!--Login Form------------>
  <div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog" style="padding: 48px;">
    <form class="col s12">

      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">account_circle</i>
          <input id="email" type="text" class="validate">
          <label for="email">Name</label>
        </div>
      </div>
      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
        <label style='float: right;'>
        <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
        </label>
      </div>
      <div>
        <p>
          <label>
            <input class="with-gap" name="group3" type="radio" checked />
            <span>User Account</span>
          </label>
        </p>
        <p>
          <label>
            <input class="with-gap" name="group3" type="radio" />
            <span>Admin Account</span>
          </label>
        </p>
      </div>
      <br>
      <button type="submit" class="btn btn-primary green darken-3">Login</button>
    </form>
    </div>
  </div>

  <!---Sign Up-------------------->
 <div id="signup" class="modal fade large" role="dialog">
    <div class="modal-dialog" style="padding: 48px;">
    <form class="col s12">
      
      <div class="row">      
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Name</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Telephone</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
    
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">home</i>
          <input id="email" type="email" class="validate">
          <label for="email">Address</label>
        </div>
      </div>

     <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">NRC</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="email" type="email" class="validate">
          <label for="email">Comfirm Password</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea name="brief" id="brief" class="materialize-textarea validate"></textarea>
        <label for="brief">Brief description</label>
        </div>
      </div>

      <div class="file-field input-field">
        <div class="btn green darken-3">
          <span>File</span>
          <input type="file" multiple>

        </div>    
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Upload one or more files">
        </div>
      </div>
    <div>
    <br>
    <p>
      <label>
        <input class="with-gap" name="group3" type="radio" checked />
        <span>User Account</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" name="group3" type="radio" />
        <span>Admin Account</span>
      </label>
    </p>
    </div>
    <br>
    <button type="submit" class="btn btn-primary green darken-3">Sign Up</button>
  </form>
  </div>
</div>

<!---------------------Navigation--------------------->
<nav style="margin-bottom: 0px;padding: 0;">
  <div class="nav-wrapper green darken-3">
    <a href="#" class="brand-logo" style="margin-left: 16px">AgriculturalTradingSystem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a class="dropdown-trigger" href="#!" data-target="font">Language<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="index.html">Home</a></li>
      <li><a href="#Products ">Products</a></li>
      <!--li><a href="#">About Us</a></li>
      <li><a href="#">Contact</a></li-->
      <li><a class="dropdown-trigger" href="#!" data-target="authentication">Login
        <i class="material-icons right">arrow_drop_down</i></a></li>  
    </ul>
        <!-- for mobile view --> 
      <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="images/2446.jpg">
      </div>
      <a href="#user"><img class="circle" src="images/fertilizer.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>language</a>
    <ul>
      <li><a href="#!" >Myanmar</a></li>
      <li><a href="#!">English</a></li>
    </ul></li>
    <li><a href="#!">Products</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">login</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>  
<!-- end of mobile nav  -->
  </div>
</nav>
<?php
include("dblink.php");

$pending_product_result=mysql_query("SELECT o.*,p.pname FROM order_product o,product p WHERE o.pid=p.pid and o.DELIVERED=0");


$pending_num_rows = mysql_num_rows($pending_product_result);
echo "<table>";
echo "<tr><th>product name</th>
      <th>seller address</th>
      <th>pick up address</th>
      <th>expected delivery date</th>
      <th>ordered time</th>
      <th>quantity</th>
      <th>cost</th><tr>";

      if($pending_num_rows>0){
while($row = mysql_fetch_array($pending_product_result))
{
echo "<tr><td>";
echo $row['pname'];
echo "</td>";

echo "<td>";
echo $row['from_addr'];
echo "</td>";

echo "<td>";
echo $row['to_addr'];
echo "</td>";

echo "<td>";
echo $row['expect_delivery_date'];
echo "</td>";

echo "<td>";
echo $row['order_time'];
echo "</td>";

echo "<td>";
echo $row['quantity'];
echo "</td>";

echo "<td>";
echo $row['cost'];
echo "</td>";

echo "</tr>";
}}

else{
      echo "<tr><td>you haven't order anything yet!!</td></tr>";
}

echo "</table>";



?>
