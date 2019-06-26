<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Mail;
class LoginController extends Controller
{
    //注册
    public function reg()
    {

        return view('login/reg');
    }
    //注册执行
    public function regdo()
    {
        $data=request()->input();
        $session = request()->session()->get('emailCode');
        if ($data['duan'] != $session['rand']){
            return ['font'=>'邮箱或验证码错误1','code'=>5];die;
        }
        if ($data['email'] != $session['email']){
            return ['font'=>'邮箱或验证码错误2','code'=>5];die;
        }
        if ($data['pwd'] != $data['apwd']){
            return ['font'=>'两次密码不一致','code'=>5];die;
        }
        if ((time()-$session['time'])>300){
            return ['font'=>'验证码已失效','code'=>5];die;
        }
        unset($data['apwd']);
        $data['pwd'] = md5($data['pwd']);
        $res=DB::table('shop_users')->insert($data);
        if ($res){
            return ['font'=>'注册成功','code'=>6];die;
        }else{
            return ['font'=>'注册失败','code'=>5];die;
        }
    }

    //登录
    public function login()
    {
        return view('login/login');
    }

    //登录执行
    public function logindo()
    {
        $data=request()->input();
        $count=DB::table('shop_users')->where('email',$data['email'])->count();
        $info=DB::table('shop_users')->where('email',$data['email'])->get();
        if (!$count){
            return ['font'=>'用户名或密码错误','code'=>5];die;
        }
        if ($info[0]->pwd != md5($data['pwd'])){
            return ['font'=>'用户名或密码错误','code'=>5];die;
        }else{
            $users=[
                'user_id'=> $info[0]->id,
                'time'=>time(),
                'users_email'=>$data['email']
            ];
            request()->session()->put('users',$users);
            return ['font'=>'登陆成功','code'=>6];die;
        }
    }
    //发送邮箱
    public function checkEmail()
    {
        $email=request()->_email;
        $count = DB::table('shop_users')->where('email',$email)->count();
        if($count>0){
            echo 'ycz';die;
        }
        $rand=rand(100000,999999);
        Mail::send(
            'email.email',
            ['content'=>$rand],
            function ($message)use($email,$rand){
                $message->subject('验证码');
                $res=$message->to($email);
                if ($res){
                    $code=[
                      'time'=>time(),
                      'rand'=>$rand,
                      'email'=>$email
                    ];
                    request()->session()->put('emailCode', $code);
                    echo 1;
                }else{
                    echo 2;
                }
            }
        );
    }
    //电话
    public  function checkTel()
    {
        $email=request()->_email;
        $code=rand(100000,999999);
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "b392629f6baf4f0d89c14530dcc24885";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "mobile=".$email."&param=code%3A".$code."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        var_dump(curl_exec($curl));
    }
    public function test()
    {
        $data = request()->session()->all();
        dd($data);
    }


}
