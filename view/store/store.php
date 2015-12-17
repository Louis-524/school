<?php
include ("../base/check.php");
include("../../model/connect.php");
?>

<!DOCTYPE HTML>
<!--
	Read Only by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Read Only by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

		<link rel="stylesheet" href="../../jquery-mobile-css/main.css">
		<link rel="stylesheet" href="../../jquery-mobile-css/member1.css">
     	<link rel="stylesheet" href="../../jquery-mobile-css/jquery.mobile-1.4.5.min.css">

        <script src="../../jquery-mobile-js/jquery-2.1.4.min.js"></script>

<!--	<script src="../../jquery-mobile-js/main.js"></script>
		<script src="../../jquery-mobile-js/skel.min.js"></script>
		<script src="../../jquery-mobile-js/util.js"></script>
		<script src="../../jquery-mobile-js/jquery.min.js"></script>
		<script src="../../jquery-mobile-js/jquery.poptrox.min.js"></script> -->
      <!-- Include the jQuery Mobile library -->
        <script src="../../jquery-mobile-js/jquery.mobile-1.4.5.min.js"></script>

        <script>
        function goBack() {
			window.history.back();
   		}
        </script>
        <script>
        function select() {
      window.history.back(-2);
      }
        </script>

	<style>
		  .body{
	  background:#3C3C3C;
	  }
    .badge{
	  display:inline-block;min-width:10px;padding:3px 7px;
	  font-size:12px;font-weight:bold;color:#fff;line-height:1;vertical-align:baseline;
	  white-space:nowrap;text-align:center;background-color:#999;border-radius:10px;
	   }

	.badge:empty{
		 display:none
	   }

    .pull-left{
	  float:left !important}

    .menu{
      margin-left:-16.5px;
       }

    h3{
	  text-align:center;
	  color:#FFF;
       }

     p{
	  color:#FFFFFF;
       }


    .ui-li-static.ui-collapsible > .ui-collapsible-heading {
      margin: 0;
       }

    .ui-li-static.ui-collapsible {
    padding: 0;
       }

    .ui-li-static.ui-collapsible > .ui-collapsible-heading > .ui-btn {
    border-top-width: 0;
       }

    .ui-li-static.ui-collapsible > .ui-collapsible-heading.ui-collapsible-heading-collapsed > .ui-btn,
    .ui-li-static.ui-collapsible > .ui-collapsible-content {
    border-bottom-width: 0;
       }

    .img {
    max-width:200px;
    myimg:expression(onload=function(){
    this.style.width=(this.offsetWidth > 200)?"200px":"auto"});
       }
	   .btn1 {
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #857e85;
  font-size: 8px;
  background: #fcfcfc;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn1:hover {
  background: #8998a1;
  text-decoration: none;
}
    </style>
</head>
<body >

<!-- 店家介紹 -->
<div data-role="page" id="pagestore1" style=" background:#3C3C3C;" >
<?php $storeid=$_GET['id']; ?>
  <div id="right-menu6" data-role="panel" data-position="right" data-theme="b">
          <header>
          <span class="image avatar" style=""><img style="margin-left:20px;margin-top:10px;margin-bottom:10px;width:200px;height:200px;" src="../../../store/StoreManage/picture/member/<?php connect("member","imgtype"); ?>" alt="" /></span>

<h1 id="logo" style="text-align:center"><a href="../member/member_home.php" target="_self"><?php connect("member","name"); ?></a></h1>
        </header>
    <a href="../point/point_home.php" target="_self" class="ui-btn" data-theme="b">集點</a>
    <a href="../gift/gift_home.php" target="_self" class="ui-btn" data-theme="b">贈品</a>
    <a href="../mission/mission_home.php" target="_self" class="ui-btn" data-theme="b">任務</a>
    <a href="../message/message_home.php" target="_self" class="ui-btn" data-theme="b">訊息</a>
    <a href="../question/question_home.php" target="_self" class="ui-btn" data-theme="b">問卷</a>
    <a href="../mission/mission_home.php" target="_self" class="ui-btn" data-theme="b">活動</a>
    <a href="../member/member_home.php?page=pageSearchStor" target="_self" class="ui-btn" data-theme="b">更換店家</a>
  </div>

<div data-role="header" data-position="fixed" data-theme="a" style="background:#FF2D2D;">
    <h3 style="color:#FFFFFF;"><?php connectstorelist("name",$id); ?></h3>
	<a class="ui-btn ui-icon-arrow-l ui-btn-icon-left " onclick="goBack()" style="padding:18px; background:none;"></a>
	<a class="ui-btn ui-btn-right ui-btn-icon-left ui-icon-bars" style="padding:18px; background:none;" href="#right-menu6"></a>


 </div>

 <div data-role="main" class="ui-content"  style=" background:#3C3C3C;height:900px; ">
           <h3 style="margin-top:20px;"><?php connectstorelist("name",$id); ?></h3>
           <div class="table-wrapper" style="margin-top:50px; background:#3C3C3C;height:20%;">
              <table class="alt" style=" background:#3C3C3C; ">
                  <tbody style=" background:#3C3C3C; ">
                      <tr style=" background:#3C3C3C; ">
                          <td rowspan="3"  style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:100px;height:100px;" src="../../../store/StoreManage/picture/store/<?php connectstorelist("imgtype",$id);?>" alt="" /></td>
                          <td style="border-color:#3C3C3C;color:#FFFFFF;text-align:center;display: table-cell;vertical-align:middle;">店家介紹</td>
                      </tr>
                      <tr style=" background:#3C3C3C; ">
                          <td style="border-color:#3C3C3C;color:#FFFFFF;text-align:center;display: table-cell;vertical-align:middle;"><?php connectstorelist("intro",$id);?></td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div style="background:#FFFFFF;height:2px;width:100%;margin: 0px auto;margin-top:5px"> </div>

           <div data-role="collapsible" data-theme="b" data-content-theme="b">
              <h3>最新消息</h3>
              <p>優惠活動：
          </br></br>
              <?php connectstorelist("aclist",$id);?>

              </p>
		  </div>


       <div data-role="footer" style="text-align:center;width:100%;height:60px;background:white;border:0px;background:#3C3C3C;">


       <button onclick=
        <?php
          $_SESSION['storeid']=$storeid;
          if (isset($_SESSION['from'])) {
            echo "location.href='../".$_SESSION['from']."/".$_SESSION['from']."_home.php'";
            unset($_SESSION['from']);
}else{
  echo '"history.go(-2)"';

}
        ?> style="height:40px;width:110px;text-align:center;margin:0 auto;border-radius:10px;">選擇此店家</button>
	   </div>
  </div>
</div><!--end pagestore1 -->


	</body>
</html>
