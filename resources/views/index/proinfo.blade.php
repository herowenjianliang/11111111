@extends('layouts/app')
@include('public/head')
<body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
      @foreach($data as $k=>$v)
      <img src="{{config('app.img_url')}}{{$v->goods_mid_pic}}" />
      <!-- <img src="{{config('app.img_url')}}{{$v->goods_mid_pic}}" />
      <img src="{{config('app.img_url')}}{{$v->goods_mid_pic}}" />
      <img src="{{config('app.img_url')}}{{$v->goods_mid_pic}}" />
      <img src="{{config('app.img_url')}}{{$v->goods_mid_pic}}" /> -->
      @endforeach
     </div>
     <table class="jia-len">
      <tr>
         @foreach($data as $k=>$v)
       <th><strong class="orange">￥<b id="price">{{$v->goods_selfprice}}</b></strong></th>
       <td>
        <button id="jian">-</button>
        <input type="text" class="spinner" value="1" id="jj"/>
        <button id="jia">+</button>
       </td>
      </tr>
      <tr>
       <td>
        <input type="hidden" id="g_id" name="id" value="{{$v->goods_id}}">
        <strong>{{$v->goods_name}}</strong>
        <p>库存：<strong id="kucun">{{$v->goods_num}}</strong></p>
        <p class="hui">{{$v->goods_details}}</p>
       </td>
       
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
       @endforeach=
      </tr>
     </table>
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     @foreach($data as $k=>$v)
     <div class="proinfoList">
      <img src="{{config('app.img_url')}}{{$v->goods_big_pic}}" width="700" height="500" />
     </div><!--proinfoList/-->
     <div class="proinfoList">
      {{$v->goods_details}}
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     @endforeach
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><b id="shop">加入购物车</b></td>
      </tr>
     </table>
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/style.js"></script>
    <!--焦点轮换-->
    <script src="/index/js/jquery.excoloSlider.js"></script>
   <!--  <script>
		$(function () {
		 $("#sliderA").excoloSlider();
		});
	</script> -->
    
  </body>

<script>
 $(function () {
     // 点击加号 数量加一
     $('#jia').click(function(){
         var shuliang =  parseInt($('#jj').val());
         var num = shuliang+1;
         var kucun = $('#kucun').html();
         $('#jj').val(num);
         if (shuliang >= kucun) {
             $('#jj').val(kucun);
         }
         newprice();
     })
     // 点击减号 数量减一
     $('#jian').click(function(){
         var shuliang =  parseInt($('#jj').val());
         var num = shuliang-1;
         $('#jj').val(num);

         if (shuliang <= 1) {
             $('#jj').val(1);
         }
         newprice();
     })
     // 失去焦点 验证
     $('#jj').blur(function(){
         var shuliang = $('#jj').val();
         var reg = /^\d{1,}$/;
         var kucun = $('#kucun').html();
         if (shuliang == '' || !reg.test(shuliang) || parseInt(shuliang)<1) {
             $('#jj').val(1);
         }else if(parseInt(shuliang) > kucun){
             $('#jj').val(kucun);
         }else{
             $('#jj').val(parseInt(shuliang));
         }
     })
     //购买数量的总价
     function newprice() {
         var id=$('input[name=id]').val();
         var kucun=$('#jj').val();
         $.get(
             'newprice',
             {id:id,kucun:kucun},
             function (res) {
                 $('#price').text(res);
             }
         )
     }
     //收藏
     $('.shoucang').click(function(){
         // js改变购买数量
         var _this = $(this);
         var id=$('input[name=id]').val();
         // 把商品id传给控制器
         $.get(
             "shoucang",
             {id:id},
             function(res){
                 console.log(res);

                 if (res == 1) {
                     alert('请登录后收藏');
                    location.href='/login/login';
                 }else{
                     layer.msg(res.font,{icon:res.code});
                 }
             },
         )
     })

     // 引入
     layui.use('layer', function(){
         var layer = layui.layer;
         // 加入购物车内
         $('#shop').click(function(){
             // 获取商品id
             var goods_id= $('#g_id').val();
             // 获取购买数量
             var goods_num = $('#jj').val();

             // 发送数据到控制器
             $.get(
                 "add",
                 {goods_id:goods_id,cart_shuliang:goods_num},
                 function(msg){
                     console.log(msg)
                     if (msg==0){
                         alert('未登录，请先登录');
                         location.href='/login/login';
                     }else{
                         layer.msg(msg.font,{icon:msg.code});
                     }
                 }
             )
         })

     });
 })
</script>
