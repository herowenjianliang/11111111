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
       <h1>会员登录</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <form class="reg-login layui-form" onsubmit="return false">
      <h3>还没有三级分销账号？点此<a class="orange" href="reg">注册</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="输入手机号码或者邮箱号" name="email" lay-verify="required" id="email"/></div>
       <div class="lrList"><input type="password" placeholder="输入密码" lay-verify="required" name="pwd" id="yan"/></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" lay-submit lay-filter="*" value="立即登录" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/style.js"></script>
    <!--jq加减-->
    <script src="/index/js/jquery.spinner.js"></script>
  </body>

<script>
    layui.use(['form','layer'],function () {
        var layer=layui.layer;
        var form=layui.form;

        $('#email').blur(function () {
            var _email=$('#email').val();
            var reg=/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
            if (_email==''){
                layer.msg('请输入您的邮箱',{icon:5});
                return false;
            }else if (!reg.test(_email)){
                layer.msg('请输入正确的邮箱格式',{icon:5});
                return false;
            }
        })

        form.on('submit(*)',function (data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post(
                'logindo',
                data.field,
                function (res) {
                    layer.msg(res.font,{icon:res.code},function () {
                        if (res.code==6){
                            location.href="/index/index";
                        }
                    });
                }
            )
            return false;
        })
    })
</script>

