@extends('layouts/app')
@include('public/head')
@include('public/bottom')
<body>
<div class="maincont">
    <div class="head-top">
        <img src="/index/images/head.jpg" />
        <dl>
            <dt><a href="/user/user"><img src="/index/images/touxiang.jpg" /></a></dt>
            <dd>
                <h1 class="username"><b   style="background-color:#ffffff;">欢迎进入项目</b></h1>
                <ul>
                    <li><a href="prolist"><strong>{{$count}}</strong><p>全部商品</p></a></li>
                    <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
                    <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
                    <div class="clearfix"></div>
                </ul>
            </dd>
            <div class="clearfix"></div>
        </dl>
    </div><!--head-top/-->
    <form action="prolist" method="get" class="search">
        <input type="text" class="seaText fl" name="sou"/>
        <input type="submit" value="搜索" class="seaSub fr" />
    </form><!--search/-->
    @if($session==null)
    <ul class="reg-login-click">
        <li><a href="/login/login">登录</a></li>
        <li><a href="/login/reg" class="rlbg">注册</a></li>
        <div class="clearfix"></div>
    </ul><!--reg-login-click/-->
    @endif
    <div id="sliderA" class="slider">
        @foreach($data as $k=>$v)
            <img src="{{config('app.img_url')}}{{$v->goods_big_pic}}">
        @endforeach
    </div><!--sliderA/-->
    <ul class="pronav">
        @foreach($cart as $k=>$v)
        <li><a href="prolist">{{$v->cate_name}}</a></li>
        @endforeach
        <div class="clearfix"></div>
    </ul><!--pronav/-->
    <div class="index-pro1">
        @foreach($data as $k=>$v)
        <div class="index-pro1-list">
            <dl>
                <dt><a href="proinfo?goods_id={{$v->goods_id}}"><img src="{{config('app.img_url')}}{{$v->goods_mid_pic}}" /></a></dt>
                <dd class="ip-text"><a href="proinfo?goods_id={{$v->goods_id}}">{{$v->goods_name}}</a><span>已售：{{$v->goods_score}}</span></dd>
                <dd class="ip-price"><strong>¥{{$v->goods_selfprice}}</strong> <span>¥{{$v->goods_markprice}}</span></dd>
            </dl>
        </div>
        @endforeach
        <div class="clearfix"></div>
    </div><!--index-pro1/-->

    <div class="joins"><a href="fenxiao.html"><img src="/index/images/jrwm.jpg" /></a></div>
    <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>

    <div class="height1"></div>
</div><!--maincont-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/index/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/index/js/bootstrap.min.js"></script>
<script src="/index/js/style.js"></script>
<!--焦点轮换-->
<script src="/index/js/jquery.excoloSlider.js"></script>
<script>
    $(function () {
        $("#sliderA").excoloSlider();
    });
</script>
</body>