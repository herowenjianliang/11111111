@extends('layouts/app')
@include('public/head')
@include('public/bottom')
  <body>
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
     <form action="addressdo" method="get" class="reg-login">
      <div class="lrBox">
       <div class="lrList"><input type="text" name="address_name" placeholder="收货人" /></div>
       <div class="lrList"><input type="text" name="address_add" placeholder="详细地址" /></div>
       <div class="lrList">
        <select name="province">
         <option value=''>请选择</option>
        @foreach($data as $k=>$v)
         <option value="{{$v->id}}">{{$v->name}}</option>
          @endforeach
        </select>
       </div>
       <div class="lrList">
        <select name="city">
         <option value=''>请选择</option>
        </select>
       </div>
       <div class="lrList">
        <select name="area">
         <option value=''>请选择</option>
        </select>
       </div>
       <div class="lrList"><input type="text" placeholder="手机" name="address_tel"/></div>
       <div class="lrList2"><button  name="is_default" value="1">设为默认</button></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="保存" />
      </div>
     </form><!--reg-login/-->
     
     <div class="height1"></div>
    </div><!--maincont-->
    <script>
     $('select').change(function () {
         var _this=$(this);
         var id=_this.val();
         var _option="<option value=''>请选择</option>";
         $.get(
             'getcity',
             {id:id},
             function (res) {
                 if (res.code==1){
                     for(var i in res['data']){
                         _option += "<option value='"+res['data'][i]['id']+"'> "+res['data'][i]['name']+
                             "</option>";
                     }
                     _this.parent('div').next().find('select').html(_option);
                 }
             }
         )
     })
    </script>