<html>
<head>
	 <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <link href="css/style.css" rel="stylesheet" /> 
</head>
<body>
<?php 
require ("dblink.php"); 

 $product    = "SELECT * FROM product WHERE pid='1'";
   $result = mysql_query($product) or die(mysql_error());
     while ($rows  = mysql_fetch_array($result)) { 
   $pname = $rows['pname'];
   $price = $rows['price'];
   $des = $rows['p_description'];
 
  }
  /*$cmt = "SELECT * FROM comment WHERE oid='1'";
  $result = mysql_query($cmt) or die(mysql_error());
     while ($rows  = mysql_fetch_array($result)) { 
   $commentText = $rows['CMT_TEXT'];
   $time = $rows['CMT_TIME'];
   
  }*/
  $sell ='SELECT * FROM seller LEFT OUTER JOIN product USING(sid) WHERE pid = "1"  ';
   $result = mysql_query($sell) or die(mysql_error());
     while ($rows  = mysql_fetch_array($result)) { 
      $seller = $rows['sname'];
      $phone = $rows['s_phoneno'];
    }
?>
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
    <div class="container padding-normal modal-dialog" style="padding: 48px;">
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
    <button type="submit" class="btn btn-primary green white-text">Sign Up</button>
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
      <li><a href="#!">Myanmar</a></li>
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

  <div class="content padding-normal-sync">
  <div>
  <a href="#">Category/</a>
  <a href="#">SubCategory/</a>
  <a href="#">ProductName/</a>
  </div>


  <div class="row ">
    <div class="col s3 padding-normal">
      <h3 id="productName" name="pname"><?php echo "$pname"; ?></h3>
      <p class="details" id="productPrice" name="price"><?php echo "$price"; ?> Kyats per item</p>
      <p class="details" id="productVendor"><a> <?php echo "$seller"; ?> </a></p><br>
        
        <a class="btn green white-text" href="tel:<?php echo $phone; ?>" id="call">Call to Vendor</a>
      
       
   </div>
    <div class="carousel col s9" style="margin:0px;height: 200px; ">
      <?php 
       $result = mysql_query($product) or die(mysql_error());
      $filearray=array();

while($row = mysql_fetch_assoc($result)){ ?>

    <a class="carousel-item" href="#one!"><img src="images/<?php echo $row['photofile'] ?>" ></a>
    <?php } ?>
    </div>
      </div>
      
      <!--img src="images/fertilizer.jpg" height="200px" width="200px"-->
   <p><?php echo "$des"; ?>  </p>
 <a class="btn green white-text modal-trigger" href="#myModal" id="order">Order<i class="material-icons right">send</i></a>
     <a class="btn green white-text modal-trigger">Add to Cart<i class="material-icons right">send</i></a>

  </div>
  <br><hr>

  <!-----Rating------------------------>
  
       <div class="container padding-normal">
  <div class="hreview-aggregate">
    <div class="row">
      <div class="col s12 m6 l6">
        <meta itemprop="worstRating" content="1">
        <meta itemprop="bestRating" content="5">
        <meta itemprop="reviewCount" content="1">
        <div class="row">
          <div class="score col s12">
            5
          </div>
          <div class="rating-stars col s12">
            <input type="radio" name="stars" id="star-null">
            <input type="radio" name="stars" id="star-1" saving="1" data-start="1" checked="">
            <input type="radio" name="stars" id="star-2" saving="2" data-start="2" checked="">
            <input type="radio" name="stars" id="star-3" saving="3" data-start="3" checked="">
            <input type="radio" name="stars" id="star-4" saving="4" data-start="4" checked="">
            <input type="radio" name="stars" id="star-5" saving="5" checked="">
            <section>
              <label for="star-1">
                <svg width="255" height="240" viewBox="0 0 51 48">
                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                </svg>
            </label>
<label for="star-2">
                  <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                  </svg>
              </label>
<label for="star-3">
                  <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                  </svg>
              </label>
<label for="star-4">
                  <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                  </svg>
              </label>
<label for="star-5">
                  <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                  </svg>
              </label>
            </section>
          </div>
          <div class="reviews-stats col s12">
            <span class="reviewers-small"></span>
            <span class="reviews-num">
                 1
              </span> total
          </div>
        </div>
      </div>
      <div class="rating-histogram col s12 m6 l6">
        <div class="rating-bar-container five">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 5
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
        <div class="rating-bar-container four">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 4
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
        <div class="rating-bar-container tree">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 3
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
        <div class="rating-bar-container two">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 2
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
        <div class="rating-bar-container one">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 1
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
      </div>
    </div>
  </div>
</div>
  <!----------------Review Hightlight----------------->
  <section id="reviews" class="comments container">
  <article class="comment">
    <a class="comment-img" href="#non">
      <img src="http://lorempixum.com/50/50/people/1" alt="" width="50" height="50" />
    </a>
      
    <div class="comment-body">
      <div class="text">
        <p><?php echo $commentText; ?></p>
      </div>
      <p class="attribution">by <a href="#non"></a> <?php echo $time;?></p>
    </div>
  </article>
  
  <article class="comment">
    <a class="comment-img" href="#non">
    <img src="http://lorempixum.com/50/50/people/7" alt="" width="50" height="50">
    </a>
      
    <div class="comment-body">
      <div class="text">
        <p>This is a much longer one that will go on for a few lines.</p>
        <p>It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.</p>
      </div>
    <p class="attribution">by <a href="#non">Joe Bloggs</a> at 2:23pm, 4th Dec 2012</p>
    </div>
  </article>
    
  <article class="comment">
    <a class="comment-img" href="#non">
    <img src="http://profile.ak.fbcdn.net/hprofile-ak-snc4/572942_100000672487970_422966851_q.jpg" alt="" width="50" height="50">
    </a>
      
    <div class="comment-body">
      <div class="text">
        <p>Originally from <a href="https://cssdeck.com/item/301/timeline-style-blog-comments#comment_289">cssdeck.com</a> this presentation has been updated 
        to looks more precisely to the facebook timeline</p>
      </div>
    <p class="attribution">by <a href="https://www.facebook.com/luky.TikTek">Luky Vj</a> at 2:44pm, 14th Apr 2012</p>
    </div>
  </article>
</section>​




<!---Footer-------------------------------------------------->
<footer class="page-footer green darken-3 ">
  <div class="row padding-normal">

    <div class="col s4" style="padding-left: 32px;">
      <h5 class="white-text">About Us</h5>
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
  <div class="footer-copyright">
    <div class="container">
      © 2014 Copyright Text
    </div>
  </div>
</footer>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">
  <h4>Order Your Items</h4>
  
  <!---Items--------------------------->
    <form class="col" action="" method="" onsubmit=<form onsubmit="return show_alert();">
  
    <div class="row">
        
        <div class="input-field col s10 ">
          <input id="phoneno" type="text" class="validate" disabled="disabled" value="09448500348" required>
          <label for="phoneno">PhoneNo</label>
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
          <a href="#" class="btn green white-text"><i class="material-icons">edit</i></a>  
        </div>
      </div>
     
    <div class="row">
      <div class="input-field col s4 ">
          <input id="street" type="text" class="validate" required="required">
          <label for="street">Street Address</label>
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
    <label for="state">State/Region</label>
  </div>
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

    <!--div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div--></div>

    </div>


</div></div></div></div>

	<!-----Script to Import---------------------->

  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>   

  


   <script>
	function show_alert() {
   	if (confirm("Are you sure to confirm the order?")) {
    var doc = document.getElementById('qrsection');
    doc.style.display="block";
    $('#ff').prop("disabled", true);
    return true;
	}
	return false;
	}

    //drop dowm
    $(document).ready(function(){
    $(".dropdown-trigger").dropdown({ hover: true });
    $('.modal').modal();
    $('select').formSelect();
    $('.carousel').carousel();
    });
  
</script>
<!-- script for mobile nav -->

                  <script type="text/javascript">
                   $(document).ready(function(){
                   $('.sidenav').sidenav();
                    });

                </script>

</body>
</html>