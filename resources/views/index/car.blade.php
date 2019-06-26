@extends('layouts/app')
@include('public/head')
<body>
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
 <table class="shoucangtab">
  <tr>
   <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" id="allbox" /> 全选</a></td>
   <td width="25%" align="center" style="background:#fff url(/index/images/xian.jpg) left center no-repeat;">
    <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
   </td>
  </tr>
 </table>


 <div class="dingdanlist">
     @foreach($data as $k=>$v)
     <table id="tr">
   <tr >
    <td width="4%"><input type="checkbox" class="box" cart_id="{{$v->cart_id}}" newp="{{$v->newprice}}"/></td>
    <td class="dingimg" width="15%"><img src="{{config('app.img_url')}}{{$v->goods_big_pic}}" /></td>
    <td width="50%"   class="cart" id="{{$v->cart_id}}">
     <h3>{{$v->goods_name}}</h3>
     <h3>库存：{{$v->goods_num}}</h3>
     <h3>单价：￥{{$v->goods_selfprice}}</h3>
     <h4  class="del">删除</h4>
    </td>
    <td align="right" num="{{$v->goods_num}}" class="num" >
        <button class="less">-</button>
        <input type="text" class="spinner" value="{{$v->cart_shuliang}}" id="jj" cart_id="{{$v->cart_id}}"/>
        <button class="add" price="{{$v->goods_selfprice}}">+</button>

    </td>
   </tr>
   <tr>
    <th colspan="4"><strong class="orange">￥<b class="newp">{{$v->newprice}}</b></strong></th>
   </tr>
    @endforeach

  </table>
 </div><!--dingdanlist/-->
 <div class="height1"></div>
 <div class="gwcpiao">
  <table>
   <tr>
    <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
    <td width="50%">总计：<strong class="orange">¥<b id="total">0</b></strong></td>
    <td width="40%"><b class="jiesuan" id="jiesuan">去结算</b></td>
   </tr>
  </table>
 </div><!--gwcpiao/-->
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

<script>
    $(function () {
        layui.use('layer',function(){
            var layer = layui.layer;
        });
        // 给当前复选框选中
        function boxChecked(_this){
            _this.parents("tr").find("input[class='box']").prop("checked",true);
            // 调用获取商品总价方法
        }
        //全选
        $("#allbox").click(function(){
            var status = $(this).prop('checked');
            $('.box').prop('checked',status);

            // 调用获取商品总价方法
            countTotal();
        });
        //复选框的点击事件
        $('.box').click(function(){
            // 调用获取商品总价方法
            countTotal();
        });
        // 点击加号
        $(document).on('click','.add',function(){
            // js改变购买数量
            var _this = $(this);
            var cart_id=_this.prev().attr('cart_id');
            var goods_num=parseInt(_this.prev().val())+1;
            var price=_this.attr('price');
            var shuliang = parseInt(_this.prev('input').val());
            // 库存
            var num = _this.parents("tr").attr('goods_num');
            if (shuliang >= num) {
                _this.prop('disabled',true);
            }else{
                shuliang+=1;
                _this.prev('input').val(shuliang);
            }
            boxChecked(_this);//给当前复选框选中
            getSubTotal(goods_num,price,_this);//小计的
            countTotal();//总价
            changeBuyNumber(cart_id,goods_num);//修改数量的
        });
        // 点击减号
        $(document).on('click','.less',function(){
            // js改变购买数量
            var _this = $(this);
            var cart_id=_this.next().attr('cart_id');
            var goods_num=parseInt(_this.next().val())-1;
            var shuliang = parseInt(_this.next('input').val());
            var price=_this.next().next().attr('price');
            if (shuliang <= 1) {
                _this.prop('disabled',true);
            }else{
                shuliang-=1;
                _this.next('input').val(shuliang);
                _this.parents().children("input").last().prop('disabled',false);

            }
            changeBuyNumber(cart_id,goods_num);//修改数量的
            getSubTotal(goods_num,price,_this);//小计的
            boxChecked(_this);//给当前复选框选中
            countTotal();//总价
        });
        // 购买数量失去焦点
        $(document).on('blur','.spinner',function(){
            // js改变购买数量
            var _this = $(this);
            var shuliang = _this.val();
            var cart_id=_this.attr('cart_id');
            var price=_this.next().attr('price');
            // 库存
            var num = _this.parents("td[class=num]").attr('num');
            console.log(num);
            // 验证
            var reg = /^\d{1,}$/;
            if (shuliang ==''|| shuliang<=1|| ! reg.test(shuliang)) {
                _this.val(1);
            }else if (parseInt(shuliang) >= parseInt(num)) {
                _this.val(num);
            }else{
                _this.val(parseInt(shuliang));
            }
            var shuliang = _this.val();
            changeBuyNumber(cart_id,shuliang);//修改数量的
            getSubTotal(shuliang,price,_this);//小计的
            boxChecked(_this);//给当前复选框选中
            countTotal();//总价
        });
        // 点击删除
        $(document).on('click','.del',function(){
            // js改变购买数量
            var _this = $(this);
            var cart_id = _this.parents('td').attr('id');
            // 把商品id传给控制器
            $.get(
                "cartDel",
                {id:cart_id},
                function(res){
                    layer.msg(res.font,{icon:res.code},function () {
                        // 重新获取列表当前的数据或者把当前这行元素移除
                        location.reload();
                        //调用获取商品总价方法
                        countTotal();
                    });
                },
            );
        });
        //更改购买数量
        function changeBuyNumber(cart_id,goods_num) {
            $.get(
                '/index/changeBuyNmber',
                {cart_id:cart_id,goods_num:goods_num},
                function (res) {
                    console.log(res)
                }
            )
        };
        // 获取小计
        function getSubTotal(goods_num,price,_this) {
            $.get(
                "getSubTotal",
                {goods_num:goods_num,price:price},
                function(res){
                    _this.parents('#tr').find('.newp').text(res);
                    _this.parents('#tr').find('input[class=box]').attr("newp",res);
                    countTotal();
                }
            );
        };
        // 获取商品总价
        function countTotal(){
            // 获取所有选中的复选框 对应的商品id
            var _box = $('.box');
            var price=0;
            _box.each(function(index){
                if ($(this).prop('checked') == true) {
                    price+=parseInt($(this).attr('newp'));
                }
            });
            $('#total').text(price);
        }
        //点击确认结算
        $("#jiesuan").click(function(){
            //获取选中的复选框的商品id
            var goods_id=[];
            $('.box:checked').each(function(){
                var cart_id=$(this).attr('cart_id');
                goods_id.push(cart_id);
            })
            var _id=goods_id.join(',');
            if (_id==''){
                alert('请至少选择一件商品进行结算');
                return false;
            }
            location.href="/index/pay/"+_id;
        })
    })
</script>