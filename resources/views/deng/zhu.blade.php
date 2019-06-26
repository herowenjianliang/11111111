<script src="{{asset('layui/layui.js')}}"></script>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<form action="login/login" method="get" class="reg-login layui-form" onsubmit="return false">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h3><a class="orange" href="/deng/login">登陆</a></h3>
    <div class="lrBox">
        邮箱号：<div class="lrList"><input type="text" lay-verify="required" placeholder="输入邮箱号"  name="email" id="email"/></div>
        验证码：<div class="lrList2"><input type="text" lay-verify="required" placeholder="输入验证码" name="duan"/> <button id="yan">获取验证码</button></div>
        密码：<div class="lrList"><input type="password" lay-verify="required" placeholder="设置新密码" name="pwd"/></div>
        再次输入密码：<div class="lrList"><input type="password" lay-verify="required" placeholder="再次输入密码" name="apwd"/></div>
    </div>
    <div class="lrSub">
        <input type="submit" lay-submit lay-filter="*" value="立即注册" />
    </div>
</form>
<script>
    layui.use(['layer','form'],function () {
        var layer=layui.layer;
        var form=layui.form;
        $('#yan').click(function () {
            var reg=/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
            var _email=$('#email').val();
            if (_email=='') {
                layer.msg('请输入您的邮箱', {icon: 5});
                return false;
            }else if (!reg.test(_email)) {
                layer.msg('请输入正确的邮箱格式', {icon: 5});
                return false;
            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if (reg.test(_email)){
                    console.log(_email)
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
                'zhudo',
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
