<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Mail;
use Illuminate\Support\Facades\Cache;

class DengController extends Controller
{
    //注册
    public function zhu()
    {
        return view('deng/zhu');
    }
    //注册执行
    public function zhudo()
    {
        $data=request()->input();
        $session = request()->session()->get('emailCode');
        if ($data['duan'] != $session['rand']){
            return ['font'=>'邮箱或验证码错误','code'=>5];die;
        }
        if ($data['email'] != $session['email']){
            return ['font'=>'邮箱或验证码错误','code'=>5];die;
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
    //邮箱
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
    //登录
    public function login()
    {
        return view('deng/login');
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
            $count=DB::table('shop_users')->where('email',$data['email'])->get();
            if ($count[0]->error >=5){
                return ['font'=>'密码错误将锁定一小时','code'=>5];die;
            }else{
                $error=['error'=>$count[0]->error +1];
                $upd=DB::table('shop_users')->where('email',$data['email'])->update($error);
            }
            return ['font'=>'用户名或密码错误','code'=>5];die;
        }else{
            $count=DB::table('shop_users')->where('email',$data['email'])->get();
            if ($count[0]->error >=5){
                return ['font'=>'密码错误已锁定一小时','code'=>5];die;
            }else{
                $error=['error'=>0];
                $upd=DB::table('shop_users')->where('email',$data['email'])->update($error);
                $email=$data['email'];
                Cache::add('name',$email);
                return ['font'=>'登陆成功','code'=>6];die;
            }
        }
    }
    //个人展示页面
    public function ge()
    {
        $name=Cache::get('name');
        return view('deng/ge',compact('name'));
    }
}