@extends('layouts/app')
@include('public/head')
@include('public/bottom')
  <body>
  @if (session('status'))
   <div class="alert alert-success">
    <script>alert("{{ session('status') }}")</script>
   </div>
  @endif
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>我的收藏</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">收藏栏共有：<strong class="orange">1</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/index/images//xian.jpg) left center no-repeat;"><a href="javascript:;" class="orange"></a></td>
      </tr>
     </table>
     
     <div class="dingdanlist" onClick="window.location.href='proinfo'">
      <table>
       @foreach($data as $k=>$v)
       <tr>
        <td colspan="2" width="65%"></td>
        <td width="35%" align="right"><div class="qingqu"><a href="/user/delshou?s_id={{$v->s_id}}" class="orange">取消收藏</a></div></td>
       </tr>
       <tr>
        <td class="dingimg" width="15%"><img src="{{$v->goods_small_pic}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
        </td>
        <td align="right"><img src="/index/images/jian-new.png" /></td>
       </tr>
       <tr>
        <th colspan="3"><strong class="orange">￥{{$v->goods_selfprice}}</strong></th>
       </tr>
        @endforeach
      </table>
     </div><!--dingdanlist/-->
    </div>