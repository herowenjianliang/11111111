@extends('layouts/app')
@include('public/head')
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <div class="dingdanlist">
      <table>
       <tr>
        <td class="dingimg" width="75%" colspan="2"><a href="/user/address">新增收货地址</a></td>
        <td align="right"><img src="/index/images/jian-new.png" /></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">收货地址
         <select name="" id="">
          @foreach($address as $k=>$v)
          <option value="">{{$v->address_name}}---{{$v->address_add}}</option>
           @endforeach
         </select>
        </td>
        <td align="right"><img src="/index/images/jian-new.png" /></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">支付方式</td>
        <td align="right"><span class="hui">支付宝</span></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">优惠券</td>
        <td align="right"><span class="hui">无</span></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">是否需要开发票</td>
        <td align="right">
         <select name="" id="">
          <option value="">是</option>
          <option value="">否</option>
         </select>
        </td>
       </tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">发票抬头</td>
        <td align="right">
         <select name="" id="">
          <option value="">个人</option>
          <option value="">商家</option>
         </select>
        </td>
       </tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">发票内容</td>
        <td align="right"><a href="javascript:;" class="hui">请选择发票内容</a></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#fff;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="3">商品清单</td>
       </tr>
       @foreach($data as $k=>$v)
       <tr>
        <td class="dingimg" width="15%"><img src="{{config('app.img_url')}}{{$v->goods_big_pic}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
        </td>
        <td align="right"><span class="qingdan">X {{$v->cart_shuliang}}</span></td>
       </tr>
       <tr>
        <th colspan="3">单价：<strong class="orange">¥{{$v->goods_selfprice}}</strong></th>
       </tr>
       
       <tr>
        <td class="dingimg" width="75%" colspan="2">商品金额</td>
        <td align="right"><strong class="orange">¥{{$v->zongjia}}</strong></td>
       </tr>
       @endforeach
       <tr>
        <td class="dingimg" width="75%" colspan="2">折扣优惠</td>
        <td align="right"><strong class="green">¥0.00</strong></td>
       </tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">抵扣金额</td>
        <td align="right"><strong class="green">¥0.00</strong></td>
       </tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">运费</td>
        <td align="right"><strong class="orange">¥0</strong></td>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     
     
    </div><!--content/-->
    
    <div class="height1"></div>
    <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥<b id="price">{{$price}}</b></strong></td>
       <td width="40%"><a href="/index/pays" class="jiesuan">提交订单</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <script>
     $('.jiesuan').click(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          var price=$('#price').text();
          $.post(
              '/index/success',
              {price:price},
              function (res) {
                  document.write(res);
              }
          )
     })
    </script>