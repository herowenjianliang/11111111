@extends('layouts/app')
@include('public/head')
@include('public/bottom')
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="login/login" method="get" class="reg-login layui-form" onsubmit="return false">
            <h3>已经有账号了？点此<a class="orange" href="/login/login">登陆</a></h3>
            <div class="lrBox">
                <div class="lrList"><input type="text" lay-verify="required" placeholder="输入手机号码或者邮箱号"  name="email" id="email"/></div>
                <div class="lrList2"><input type="text" lay-verify="required" placeholder="输入短信验证码" name="duan"/> <button id="yan">获取验证码</button></div>
                <div class="lrList"><input type="password" lay-verify="required" placeholder="设置新密码（6-18位数字或字母）" name="pwd"/></div>
                <div class="lrList"><input type="password" lay-verify="required" placeholder="再次输入密码" name="apwd"/></div>
            </div><!--lrBox/-->
            <div class="lrSub">
                <input type="submit" lay-submit lay-filter="*" value="立即注册" />
            </div>
        </form><!--reg-login/-->
     <div class="height1"></div>
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/style.js"></script>
  </body>

<script>
    layui.use(['layer','form'],function () {
        var layer=layui.layer;
        var form=layui.form;

        $('#yan').click(function () {
            var reg=/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
            var telreg=/^\d{11}$/;
            var _email=$('#email').val();
            if (_email==''){
                layer.msg('请输入您的邮箱或手机号',{icon:5});
                return false;
            }else if (!reg.test(_email)&&!telreg.test(_email)) {
                layer.msg('请输入正确的邮箱格式或电话格式', {icon: 5});
                return false;
            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if (reg.test(_email)){
                    $.post(
                        'checkEmail',
                        {_email:_email},
                        function (res) {
                            if(res=='ycz'){
                                layer.msg('邮件已存在',{icon:5});
                            }else if (res==1){
                                layer.msg('邮件发送成功',{icon:6});
                            }else{
                                layer.msg('邮件发送失败',{icon:5});
                            }
                        }
                    )
                }else if(telreg.test(_email)){
                    $.post(
                        'checkTel',
                        {_email:_email},
                        function (res) {
                            layer.msg('请输入短信验证码');
                        }
                    )
                }
            }
        })

        form.on('submit(*)',function (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post(
                    'regdo',
                    data.field,
                    function (res) {
                        layer.msg(res.font,{icon:res.code},function () {
                            if (res.code==6){
                                location.href="login";
                            }
                        });
                    }
                )
                return false;
        })
    })
</script>


