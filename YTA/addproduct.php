<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <style type="text/css" class="green darken 3">
   #frame {
  height: 900px;
  width: 750px;
  color:  green ;
  box-shadow: 10px 10px 50px 50px rgba(0,0,0,0.3);
  border-radius: 25px;
  background:
 no-repeat center;
  
  margin-left: auto;
  margin-right: auto;
  margin-top: 50px;
  margin-bottom: 50px;


}
  
</style>
    </head>

    <body class="#dcedc8 light-green lighten-4">
  <ul id="font" class="dropdown-content">
    <li><a href="#!">????????</a></li>
    <li class="divider"></li>
    <li><a href="#!">English</a></li>
  </ul>
  <ul id="authentication" class="dropdown-content">
    <li><a href="#!">Login</a></li>
    <li class="divider"></li>
    <li><a href="#!">Sign Up</a></li>
  </ul>

  <nav style="margin-bottom: 0px;padding: 0;">
    <div class="nav-wrapper green darken-3">
      <a href="#" class="brand-logo" style="margin-left: 16px">AgriculturalTradingSystem</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="dropdown-trigger" href="#!" data-target="font">Font<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="#">My Account</a></li>
        <li><a href="#Products ">Products</a></li>
        <li><a href="#">Sign Up</a></li>
        <li><a class="dropdown-trigger" href="#" data-target="authentication">Switch Account <i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="#!" >About us
          </a></li>  
      </ul>
    </div>
  </nav>
 
  
    
   
    
    <div class="container">
    <div id ="frame" class="white">
    <div class="container">  <!-- for form -->
 <div class="row">
    <form class="col s12" onsubmit="return pnamevalid()">

            <!-- for name -->
<br><br>
      <div class="row ">
        
        <div class="input-field col s12 ">
          <input id="name" type="text" class="validate" required="#" >
          <label for="name">Product name</label>
        </div>
      </div>
      <div class="row ">
        
       

      <!-- for price per unit -->

       <div class="row ">
        <div class="input-field inline col s5">
          <input id="first_name" type="number" class="validate">
          <label for="first_name">Price</label>
        </div>
        <span class="col s1">per</span>
        <div class="input-field inline col s3 row s5">
          
  <select class="browser-default green lighten-3">
    <option value="" disabled selected>Choose your option unit</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
        </div>
      </div>

      <!-- for minimum amount -->

      <div class="row">
        <div class="input-field col s12">
          <input id="min" type="text" class="validate" required="#">
          <label for="min">Minimum buyable amount</label>
        </div>
      </div>

      <!-- for maximum amount -->

      <div class="row">
        <div class="input-field col s12">
          <input id="max" type="text" class="validate" required="">
          <label for="max">Maximum buyable amount</label>
        </div>
      </div>

   <!-- for brief description  -->

      <div class="row">
        <div class="input-field col s12">
        	<i class="material-icons prefix">mode_edit</i>
        <textarea name="brief" id="brief" class="materialize-textarea validate" required="#"></textarea>
        <label for="brief">Brief description of the product</label>
        </div>
      </div>


   <!-- for maximum amount -->


<!-- for qualification
--><div>
     <label>Qualification</label>
  <select class="browser-default green lighten-2">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
</div>

<!-- for media for product image
--><br><br>
<div class="file-field input-field">
      <div class="btn green darken-3">
        <span>File</span>
        <input type="file" multiple>

      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files"  >
      </div>
    </div>

    <br>
    <br><div>
<table><tr><td></td><td><button class="btn green darken-3" type="submit" name="action">ADD
    <i class="material-icons right">send</i>
  </button> </td>
  <td>
  <button class="btn green darken-3" type="submit" name="action">Cancle
    <i class="material-icons right">cancel</i>
  </button></td></tr></table>

     </form>

  </div>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>
 <footer class="page-footer green darken-3">
             <div class="row">
              <div class="col s4">
                <h5 class="white-text" style="margin:32px 32px 0 32px;">About Us</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col s4">
                <h5 class="white-text">Services</h5>
              </div>
              <div class="col s4">
                <h5 class="white-text">Contact Us</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">einghonphoo@uit.edu.mm</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">khineminhtwe@uit.edu.mm</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">yaminthiriaung@uit.edu.mm</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">yamintheintheint@uit.edu.mm</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">yeyintaung@uit.edu.mm</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">khinthantsin@uit.edu.mm</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">hsuyeemon@uit.edu.mm</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            </div>
          </div>
        </footer>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="js/addproductForm.js"></script>
<script> 
 

function pnamevalid()
{
  var pname = document.getElementById("name").value;
  var minnn= document.getElementById("min").value;
  var maxx=document.getElementById("max").value;

  var pnameReg = /^[a-zA-Z]+$/;
  var minnnReg=/^-?\d*(\.\d+)?$/;
  var maxxReg=/^-?\d*(\.\d+)?$/;

  if (pname.match(pnameReg))
  {
    if (minnn.match(minnnReg))
    {
     if (maxx.match(maxxReg))
         {
            alert("Good");
            return false;
         }else 
             {
                alert("Invalid Max");
                return false;
              }
    }
    else
    {
      alert("Invalid minn");
      return false;
    }
  }
else {
  alert ("Invalid pname");
  return false;
}
}

</script>
    </body>
    </html>