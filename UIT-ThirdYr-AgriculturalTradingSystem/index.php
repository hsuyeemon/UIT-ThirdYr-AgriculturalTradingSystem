<?php

include( "common.php" );
include( "dblink.php" );

displayPageHeader( "index" );
?>

<!-- HeroShot & HeadLine-------------------------------->
<div class = "content hero-shot">
  <div class = "transparent">
    <div class="white-text center-align" style="
        padding: 64px;margin: 0px;">
       <h4 style ="text-shadow: 3px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">
         <!--ကၽြနု္ပ္တုိ႔သည္ ယူေကမွ သင္ၾကားေရးအခြင့္အလမ္းမ်ားႏွင့္ ထိုးထြင္းတီထြင္တတ္ေသာစိတ္ကူးအေတြးအေခၚမ်ားအား အမ်ားျပည္သူတို႕ထံ ေဆာင္က်ဥ္းေပးပါသည္။ -->
           Marketplace for people in agricultural sector
         </h4>
         <br><br>
         <a href="#" class="btn btn-default waves-effect pulse white green-text">View how it works</a>
    </div>   
   </div>
</div>

          
<!--Products---------------------------------------------------------------->
  
<div id="Products" class="padding-normal center-align">
 <h3 class="center-align header">Our products</h3>
 <p class="center-align">Agricultural Products,Fertilizer, tools and equipments companies can also sell their products
</p>

  <div class="row"  style="padding-top: 16px;">
   
  <!-- card for agricultural products --------------------------------->

  <a href="products.html#Agricultural">
    <div class="col s12 m5 l4" >
    <div class="card hoverable ">
    <div class="product-category card-image waves-effect waves-block waves-light">
      <!--img class="activator" src="images/2446.jpg"  height="240px"-->
      <div class="slider" >
        <ul class="slides carousel-fixed-item center" >
          <li>
            <img src="images/2446.jpg">
          </li>
          <li>
            <img src="images/2446.jpg">
          </li>
          <li>
            <img src="images/Equipments.jpg">
          </li>
          <li>
            <img src="images/2446.jpg">
          </li>
        </ul> 
      </div>   
    </div></a>
    <div class="card-content">
        <span class="card-title activator grey-text text-darken-4">Agricultural<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Agricultural<i class="material-icons right">close</i></span>
       <div class="collection">
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4 m8 l9">
                <p class="title">SubCategory Name</p>

              </div>

            </div>
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         
        </div>
    </div>
    </div>
    </div>


<!-- card for fertilizers products ------------------------------->

<a href="products.html#fertilizer">
    <div class="col s12 m5 l4">
    <div class="card hoverable">
    <div class="product-category card-image waves-effect waves-block waves-light">
      <!--img class="activator" src="images/fertilizer.jpg"  height="240px"-->
      <div class="slider">
        <ul class="slides">
          <li>
            <img src="images/fertilizer.jpg">
          </li>
          <li>
            <img src="images/fertilizer.jpg">
          </li>
          <li>
            <img src="images/fertilizer.jpg">
          </li>
          <li>
            <img src="images/fertilizer.jpg">
          </li>
        </ul>
      </div>   </a>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Fertilizers<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Fertilizers<i class="material-icons right">close</i></span>
         <div class="collection">
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4 m8 l9">
                <p class="title">SubCategory Name</p>

              </div>

            </div>
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/fertilizer.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         
        </div>
    </div>
    </div>
    </div>

  <!-- card for equipments products --------------->

<a href="products.html#Equipments">
    <div class="col s12 m5 l4">    
    <div class="card hoverable"">
    <div class="product-category card-image waves-effect waves-block waves-light">
      <!--img class="activator" src="images/equipments.jpg"  height="240px"-->
      <div class="slider" height="240px">
        <ul class="slides">
          <li>
            <img src="images/equipments.jpg">
          </li>
          <li>
            <img src="images/equipments.jpg">
          </li>
          <li>
            <img src="images/equipments.jpg">
          </li>
          <li>
            <img src="images/equipments.jpg">
          </li>
        </ul>
      </div>   </a>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Equipments<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Equipments<i class="material-icons right">close</i></span>
        <div class="collection">
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4 m8 l9">
                <p class="title">SubCategory Name</p>

              </div>

            </div>
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         
        </div >    </div>
    </div>
    </div>

  </div>
</div>
        
       
<!--Slider-->
    <div class="row">
<div class="slider" style="height: 400px;width: 100%;margin-bottom: 8px;">
  <ul class="slides">
    <li>
      <img src="images/Screenshot (214).png" class="responsive">
    </li>
    <li>
      <img src="images/get-blog-image.jpg">
    </li>
    <li>
      <img src="images/dummy.jpg">
    </li>
  </ul>
    </div>
    </div>



<!--Features-->
<div class="feature #c8e6c9 padding-normal-sync">
  <h4 class="center-align header">What we do</h4>
  <div class="row text-center container">
   
    <div class="col s6 center-align">
      <div>
        <i class="circle material-icons md-dark" >transfer_within_a_station
</i>  
        <h6>Logistic service </h6>
        <p>Our backbone business will be logistic service.</p>
      </div>
    </div>
    <div class="col s6 center-align">
      <div>
         <i class="circle material-icons md-dark">shop</i>  
        <h6>MarketPlace</h6>
        <p>Seek customers by creating a market place for them.</p>
      </div>
    </div>
    
  </div>
</div>

<?php
displayPageFooter();
?>