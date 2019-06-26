<script src="{{asset('layui/layui.js')}}"></script>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="reg-login layui-form" onsubmit="return false">
    <h3><a class="orange" href="zhu">注册</a></h3>
    <div class="lrBox">
        邮箱号：<div class="lrList"><input type="text" placeholder="输入邮箱号" name="email" lay-verify="required" id="email"/></div>
        密码：<div class="lrList"><input type="password" placeholder="输入密码" lay-verify="required" name="pwd" id="yan"/></div>
    </div><!--lrBox/-->
    <div class="lrSub">
        <input type="submit" lay-submit lay-filter="*" value="立即登录" />
    </div>
</form><!--reg-login/-->

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
                            location.href="/deng/ge";
                        }
                    });
                }
            )
            return false;
        })
    })
</script>