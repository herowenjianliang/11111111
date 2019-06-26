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
       <h1>收货地址</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><a href="address" class="hui"><strong class="">+</strong> 新增收货地址</a></td>
       <td width="25%" align="center" style="background:#fff url(images/xian.jpg) left center no-repeat;"><a href="javascript:;" class="orange">删除信息</a></td>
      </tr>
     </table>

     <div class="dingdanlist" onClick="window.location.href='proinfo'">
      <table>
       @foreach($data as $k=>$v)
       <tr>
        <td width="50%">
         <h3>{{$v->address_name}}{{$v->address_tel}}</h3>
         <time>{{$v->address_add}}</time>
        </td>
        <td align="right"><a href="address" class="hui"><span class="glyphicon glyphicon-check"></span> 修改信息</a></td>
       </tr>
        @endforeach
      </table>
     </div><!--dingdanlist/-->
     
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