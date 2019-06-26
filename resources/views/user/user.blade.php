@extends('layouts/app')
@include('public/head')
@include('public/bottom')
<body>
    <div class="maincont">
     <div class="userName">
      <dl class="names">
       <dt><img src="/index/images/user01.png" /></dt>
       <dd>
        <h3>天池不动峰</h3>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--userName/-->

     <ul class="userNav">
      <li><span class="glyphicon glyphicon-list-alt"></span><a href="order">我的订单</a></li>
      <div class="height2"></div>
      <div class="state">
         <dl>
          <dt><a href="order"><img src="/index/images/user1.png" /></a></dt>
          <dd><a href="order">待支付</a></dd>
         </dl>
         <dl>
          <dt><a href="order"><img src="/index/images/user2.png" /></a></dt>
          <dd><a href="order">代发货</a></dd>
         </dl>
         <dl>
          <dt><a href="order"><img src="/index/images/user3.png" /></a></dt>
          <dd><a href="order">待收货</a></dd>
         </dl>
         <dl>
          <dt><a href="order"><img src="/index/images/user4.png" /></a></dt>
          <dd><a href="order">全部订单</a></dd>
         </dl>
         <div class="clearfix"></div>
      </div><!--state/-->
      <li><span class="glyphicon glyphicon-map-marker"></span><a href="Aaaddress">收货地址管理</a></li>
      <li><span class="glyphicon glyphicon-star-empty"></span><a href="shoucang">我的收藏</a></li>
      <li><span class="glyphicon glyphicon-heart"></span><a href="liu">我的浏览记录</a></li>
	 </ul><!--userNav/-->
     
     <div class="lrSub">
       <a href="tui">退出登录</a>
     </div>
     
     <div class="height1"></div>
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/style.js"></script>
    <!--jq加减-->
    <script src="/index/js/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
   </script>
</body>
