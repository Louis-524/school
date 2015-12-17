<!DOCTYPE html>
<html>
<head>
  <!-- Include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="../../jquery-mobile-css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="../../jquery-mobile-css/main.css">
  <link rel="stylesheet" href="../../jquery-mobile-css/bootstrap.min.css">
  <link rel="stylesheet" href="../../jquery-mobile-css/firstpag.css">

  <!-- Include the jQuery library -->
  <script src="../../jquery-mobile-js/jquery-2.1.4.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="../../jquery-mobile-js/jquery.mobile-1.4.5.min.js"></script>
  <script src="./js/login.js"></script>




  <!-- 擷取要載入的東西 -->

<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.racefurniture.com.au/wp/xmlrpc.php?rsd" />
<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<script type='text/javascript' src='http://www.racefurniture.com.au/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript' src='http://www.racefurniture.com.au/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.2.2'></script>
<script type='text/javascript' src='http://www.racefurniture.com.au/wp-content/themes/racefurniture/static/js/owl.carousel.js?ver=20120206'></script>
<script type='text/javascript' src='http://www.racefurniture.com.au/wp-content/themes/racefurniture/static/js/plugins.js?ver=20120206'></script>
<script type='text/javascript' src='http://www.racefurniture.com.au/wp-content/themes/racefurniture/static/js/main.js?ver=20120206'></script>




</head>
<body>

<div data-role="page" id="pageone" style=" background:#FFFFFF;">
  <div data-role="header" >

    <div  >

        <section class="home-slider parallax__layer parallax__layer--back" >
            <div class="container-fluid slider-height" style="background:#FFFFFF">
                <div id="owlimgslider" class="owl-carousel" >
                    <div><img src="http://www.racefurniture.com.au/wp-content/themes/racefurniture/static/images/slider_1.jpg" alt=" " class="hero-img img-responsive"></div>
                    <div><img src="http://www.racefurniture.com.au/wp-content/themes/racefurniture/static/images/slider_2.jpg" alt=" " class="hero-img img-responsive"></div>
                    <div><img src="http://www.racefurniture.com.au/wp-content/themes/racefurniture/static/images/slider_3.jpg" alt=" " class="hero-img img-responsive"></div>
                    <div><img src="http://www.racefurniture.com.au/wp-content/themes/racefurniture/static/images/slider_4.jpg" alt=" " class="hero-img img-responsive"></div>
                </div>
            </div>
        </section>


    </div>
  </div>

  <div data-role="main" class="ui-content" id="main" style="width:100%;height:400px;text-align:center;margin:0 auto;">
          <p  style="padding-bottom:50px;padding-top:50px;text-align:center;">- 揪客通 Juika Bon -</p>

		  <div class="container" style="width:80%;text-align:center;margin:0 auto;">
          <form method="post" id='login_form'>
            <INPUT TYPE=hidden NAME="decide" VALUE="select">
            <label for="usrnm" class="ui-hidden-accessible" >帳號:</label>
            <input type="text" maxLength="10" name="username" id="username" placeholder="帳號" data-clear-btn="true">
            <label for="pswd" class="ui-hidden-accessible">密碼:</label>
            <input type="password" name="password" id="password" placeholder="密碼" data-clear-btn="true">
            <button type="button"   onclick="LoginData.login()" style="width:110px;float:left">登入</button>
         <a href="#pagetwo"><button  style="width:110px;float:right;">註冊</button></a> </form>

          </div>
  </div>
</div>


<div data-role="page" id="pagetwo" style=" background:#3C3C3C; " >

<div id="titleBar" >
<span  class="title" style="text-align:center;" id="logo">建立新帳戶</span>
</div>

				<header style="text-align:center;height:320px; padding-top:90px">
					<span class="image avatar" style=" vertical-align:middle;width:200px;height:200px" ><img src="../../image/avatar.jpg" alt="" /></span>

				</header>



<div data-role="main" class="ui-content" id="three" style="padding-top:30px;width:90%;height:600px;text-align:center;margin:0 auto;">
        <div class="container" style="width:80%;text-align:center;margin:0 auto;">
        <form method="post" id='insert_form'>
          <INPUT TYPE=hidden NAME="decide" VALUE="insert">
          <label for="cellphone" class="ui-hidden-accessible">cellphone:</label>
          <input type="text" maxLength="10" name="cellphone" id="cellphone" placeholder="cellphone">
          <label for="password" class="ui-hidden-accessible">Password:</label>
          <input type="password" maxLength="16" name="password" id="password" placeholder="Password">
		  <label for="password" class="ui-hidden-accessible">ConfromPassword:</label>
          <input type="password" maxLength="16" name="password2" id="password2" placeholder="ConfromPassword">
          <label for="name" class="ui-hidden-accessible">Username:</label>
          <input type="text" name="name" maxLength="5" id="name" placeholder="username">



	    <div class="row uniform">
	          <div class="4u 6u(medium)">
	             <input type="radio" id="demo-priority-low" name="gender" value="男" checked>
	             <label for="demo-priority-low" style="text-align:center;"> 男</label>
	          </div>
		      <div class="4u 6u(medium)">
			     <input type="radio" id="demo-priority-normal" name="gender" value="女">
			     <label for="demo-priority-normal" style="text-align:center;"> 女</label>
			  </div>
	    </div>




<div style="padding-top:70px;">
          <a href="#pageone" data-transition="slide" data-direction="reverse" class="ui-btn ui-btn-inline ui-corner-all" style="width:110px;float:left;">返回</a>

          <button type="button"   onclick="LoginData.insert()" style="width:110px;float:right;color:#FFFFFF;background-color:#5bc0de;border-color:#5bc0de">註冊</button>
</div>

		</form>
        </div>
    </div>
</div>




</body>
</html>
