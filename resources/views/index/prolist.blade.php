@extends('layouts/app')
@include('public/head')
@include('public/bottom')
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
          <form action="prolist" method="get" class="search">
              <input type="text" class="seaText fl" name="sou"/>
              <input type="submit" value="搜索" class="seaSub fr" />
          </form><!--search/-->
      </div>
     </header>
     <ul class="pro-select">
      <li class="pro-selCur goods_sort"><a href="javascript:;">新品</a></li>
      <li class="goods_sort"><a href="javascript:;">销量</a></li>
      <li class="goods_sort"><a href="javascript:;">价格</a></li>
     </ul><!--pro-select/-->
     <div class="prolist" id="prolist">
         @foreach($data as $k=>$v)
         <dl>
       <dt><a href="proinfo?goods_id={{$v->goods_id}}"><img src="{{config('app.img_url')}}{{$v->goods_mid_pic}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo?goods_id={{$v->goods_id}}">{{$v->goods_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->goods_selfprice}}</strong> <span>¥{{$v->goods_markprice}}</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：{{$v->goods_score}}</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
         @endforeach
     </div><!--prolist/-->
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
		$(function () {
		 $("#sliderA").excoloSlider();
		});
	</script>
  </body>

<script>
    $('.goods_sort').click(function () {
        var _this=$(this);
        var _name=_this.text();
        _this.addClass('pro-selCur');
        _this.siblings().removeClass('pro-selCur');
        $.get(
            'shop',
            {name:_name},
            function (res) {
                $('#prolist').html(res);
            }
        );
    })
</script>