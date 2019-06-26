<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GoodsController extends Controller
{
    //添加
    public function add()
    {
        
        return view('goods/add');
    }
    public function adddo()
    {
        $data=request()->input();
        unset($data['_token']);
        $res=DB::table('shop_goods')->insert($data);
        if ($res){
            return redirect('goods/index')->with('status','添加成功');
        }else{
            return redirect('goods/add')->with('status','添加失败');
        }
    }
    //列表展示
    public function index()
    {
        $sou=request()->sou;
        $where=[];
        if ($sou){
            $where[]=[
                'goods_name','like',"%$sou%"
            ];
        }
        $data=DB::table('shop_goods')->where($where)->paginate(3);
        return view('goods/index',compact('data','sou'));
    }
    public function test()
    {
        $id=request()->id;
        $data=cache()->get('goods'.$id);
        if (!$data){
            echo '数据库';
            $data=DB::table('shop_goods')->where('goods_id',$id)->get();
            cache()->add('goods'.$id,$data);
        }
        dd($data);
    }
    //删除
    public function del()
    {
        $id=request()->id;
        $res=DB::table('shop_goods')->where('goods_id',$id)->delete();
        if ($res){
            return redirect('goods/index')->with('status','删除成功');
        }else{
            return redirect('goods/index')->with('status','删除失败');
        }
    }
    //修改
    public function upd()
    {
        $id=request()->id;
        $data=DB::table('shop_goods')->where('goods_id',$id)->get();
        return view('goods/upd',compact('data'));
    }
    public function upddo()
    {
        $data=request()->input();
        $res=DB::table('shop_goods')->where('goods_id',$data['goods_id'])->update($data);
        if ($res){
            return redirect('goods/index')->with('status','修改成功');
        }else{
            return redirect('goods/index')->with('status','修改失败');
        }
    }
}
