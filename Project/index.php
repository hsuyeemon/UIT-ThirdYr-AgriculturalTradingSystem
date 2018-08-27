<?php

  if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
?>
<?php
include( "common.php" );
include( "dblink.php" );

displayPageHeader( "index" );
?>
 <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="index.php?lan_flag=1"  id="myanmar" onclick="language()">ျမန္မာစာ</a></li>
    <li class="divider"></li>
    <li><a href="index.php?lan_flag=0" id="english" onclick="language()">English</a></li>
  </ul>


<!-- HeroShot & HeadLine-------------------------------->
<div class = "content hero-shot">
  <div class = "transparent">
    <div class="white-text center-align" style="
        padding: 64px;margin: 0px;
       <h3 style ="text-shadow: 3px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;font-family: 'Acme';color:white">
         <!--ကၽြနု္ပ္တုိ႔သည္ ယူေကမွ သင္ၾကားေရးအခြင့္အလမ္းမ်ားႏွင့္ ထိုးထြင္းတီထြင္တတ္ေသာစိတ္ကူးအေတြးအေခၚမ်ားအား အမ်ားျပည္သူတို႕ထံ ေဆာင္က်ဥ္းေပးပါသည္။ -->
           Marketplace for people in agricultural sector
         </h3>
         <br><br>
         <a href="index.php#feature" class="btn btn-default waves-effect pulse white green-text">View how it works</a>

    </div>   
   </div>
</div>

          
<!--Products-->
  
<div id="Products" class="padding-normal center-align">
 <h3 class="center-align header" id="product_p">Our products</h3>
 <p class="center-align" id="para">Agricultural Products,Fertilizer, tools and equipments companies can also sell their products
</p>

  
  <div class="row"  style="padding-top: 16px;">
   
  <!-- card for agricultural products --------------------------------->

  <a href="products.php#Agricultural">
   <div class="col s12 m5 l4">
    <div class="card hoverable" style="background:#005508;">
    <div style="height: 300px" class="product-category card-image waves-effect waves-block waves-light">
      <!--img class="activator" src="images/fertilizer.jpg"  height="240px"-->
      <div class="slider">
        <ul class="slides">
<?php
  $query = "select * from product where category like 'agricultural%' and status=1;";
  $ret = mysqli_query ($con,$query);          
  $noRows=mysqli_num_rows($ret);
  
  if($noRows>0){
  for($i=0;$i<$noRows;$i++){
    ?>
          <li>
            <?php 
            $row=mysqli_fetch_array($ret);
             $array = explode(',', $row["p_image"]);
              $url = $array[0]; 
            echo "<img src='".$url."' width='300px'";
            ?>
          </li>
            <img src="images/products/43816391-delicious-durian-fruit-isolated.jpg">
          </li>
          <li>
            <img src="images/products/Business_Model_Canvas.png">

          </li>
        </ul> 
      </div>   
    </div></a>
    <div class="card-content">
        <span class="card-title activator grey-text text-darken-4" id="agricultural">Agricultural<i class="material-icons right">more_vert</i></span>

   
          <?php
        }
      } else{
        ?><li>
        <img src="images/products/43816391-delicious-durian-fruit-isolated.jpg">
      </li>
       <?php
      }
        ?>
        </ul> 
      </div>   
    </div></a>
    <div class="card-content z-depth-5" style="background:#005508;">
        <span  class="card-title activator white-text text-darken-4">Agricultural<i class="material-icons right">more_vert</i></span>

    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Agricultural<i class="material-icons right">close</i></span>
       <div class="collection">
        <div class="collection-item">

            
                <p class="title">Grocerry</p>
           

            </div>
        <div class="collection-item">
           
            
                <p class="title">Stable</p>
           

            </div>

        
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        
        <div class="collection-item">
            <p class="title">Fruits</p>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         
        </div>
    </div>
    </div>
    </div>


<!-- card for fertilizers products ------------------------------->

<a href="products.php#fertilizer">
    <div class="col s12 m5 l4">

    <div class="card hoverable" style="background:#005508;">
    <div style="height: 300px" class="product-category card-image waves-effect waves-block waves-light">
      <!--img class="activator" src="images/fertilizer.jpg"  height="240px"-->
      <div class="slider">
        <ul class="slides">
          <?php
  $query = "select * from product where category like 'fertilizers%' and status=1;";
  $ret = mysqli_query ($con,$query);          
  $noRows=mysqli_num_rows($ret);
  
  if($noRows>0){
  for($i=0;$i<$noRows;$i++){
    ?>
          <li>
            <?php 
            $row=mysqli_fetch_array($ret);
             $array = explode(',', $row["p_image"]);
              $url = $array[0]; 
            echo "<img src='".$url."' width='300px'";
            ?>
          </li>
          <!--li>
            <img src="images/products/43816391-delicious-durian-fruit-isolated.jpg">
          </li>
          <li>
            <img src="images/products/Business_Model_Canvas.png">
          </li-->
          <?php
        }
      } else{
        ?>
        <li>
        <img src="images/products/Best-Price-Quick-Effective-Agriculture-Liquid-Fertilizer.jpg">
      </li>
       <?php
      }
        ?>
        </ul>
      </div>   </a>
    </div>
    <div class="card-content z-depth-5" style=" box-shadow: 0 16px 24px 2px rgba(0, 55, 8, 0.14), 0 6px 30px 5px rgba(0, 55, 8, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
">
      <span class="card-title activator white-text text-darken-4">Fertilizers<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Fertilizers<i class="material-icons right">close</i></span>
         <div class="collection">
        <div class="collection-item">

                <p class="title">Potassium</p>
           

            </div>
        <div class="collection-item">
           
            
                <p class="title">Nitrogen</p>
           

            </div>

        
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        
        <div class="collection-item">
            <p class="title">phosphorous</p>

            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         
        </div>
    </div>
    </div>
    </div>

  <!-- card for equipments products --------------->

<a href="products.php#Equipments">
    <div class="col s12 m5 l4">    

    <div class="card hoverable" style="background:#005508;">
    <div class="product-category card-image waves-effect waves-block waves-light"
    style="height: 300px">
      <!--img class="activator" src="images/products/20160725114016.jpg"  height="240px"-->
      <div class="activator slider" height="240px">
        <ul class="slides">
        <?php
  $query = "select * from product where category like 'equipments%' and status=1;";
  $ret = mysqli_query ($con,$query);          
  $noRows=mysqli_num_rows($ret);
  
  if($noRows>0){
  for($i=0;$i<$noRows;$i++){
    ?>
          <li>
            <?php 
            $row=mysqli_fetch_array($ret);
             $array = explode(',', $row["p_image"]);
              $url = $array[0]; 
            echo "<img src='".$url."' width='300px'";
            ?>
          </li>
          <!--li>
            <img src="images/products/43816391-delicious-durian-fruit-isolated.jpg">
          </li>
          <li>
            <img src="images/products/Business_Model_Canvas.png">
          </li-->
          <?php
        }
      }
      else{
        ?>
        <img src="images/products/20160725114016.jpg">
       <?php
      }
        ?>
        </ul>
      </div>   
    </div></a>
    <div class="card-content z-depth-5" style=" box-shadow: 0 16px 24px 2px rgba(0, 55, 8, 0.14), 0 6px 30px 5px rgba(0, 55, 8, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
">
      <span class="card-title activator white-text text-darken-4">Equipments<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Equipments<i class="material-icons right">close</i></span>
         <div class="collection">
        <div class="collection-item">
            
                <p class="title">Cultipacker</p>
           

            </div>
        <div class="collection-item">
           
            
                <p class="title">Roller</p>
           

            </div>

        
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        
        <div class="collection-item">
            <p class="title">Harrow</p>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         

        </div>    </div>
    </div>
    </div>

  </div>
</div>
        
<!--Features-->
<div class="feature #c8e6c9 padding-normal-sync">
  <h4 class="center-align header" id="para2">What we do</h4>
  <div class="row text-center container">
   
    <div class="col s6 center-align">
      <div>
        <i class="circle material-icons md-dark" >transfer_within_a_station
</i>  
        <h6 id="logistic">Logistic service </h6>
        <p id="logicPara">Our backbone business will be logistic service.</p>
      </div>
    </div>
    <div class="col s6 center-align">
      <div>
         <i class="circle material-icons md-dark">shop</i>  
        <h6 id="Market">MarketPlace</h6>
        <p id="marketPara">Seek customers by creating a market place for them.</p>
      </div>
    </div>
    
  </div>
</div>

<!---Footer-------------------------------------------------->
<footer class="page-footer">
  <div class="row padding-normal container" id="aboutus">



      <h3 class="white-text" id="about_as1" style="text-align: center;padding: 16px;font-family: 'Acme'">About Us</h3>
      <div class="col s12">
      <p class="grey-text text-lighten-4 center-align" id="AU">
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
    
      <h5 class="white-text" id="contact" style="text-align: center;padding: 16px" >Contact Us</h5>

   </div>
<div class="row padding-normal container" id="contactus">
    
      <h3 class="white-text"  id="contact_us" style="text-align: center;padding: 16px;font-family: 'Acme'">Contact Us</h3>


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

      <h4 id="freeContact" style="font-family: 'Acme'"> if you have any conflicts or problems feel free to contact us</h4>
</div>
      
    
  </div>
  <div class="footer-copyright">
    <div class="container center-align">
      © 2018 Agricultural Trading System
    </div>
  </div>
</footer>

<?php
displayPageFooter();

?>
