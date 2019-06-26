<link rel="stylesheet" href="/css/page.css">
@if (session('status'))
    <div class="alert alert-success">
        <script>alert("{{ session('status') }}  ")</script>
    </div>
@endif
<form action="">
    <input type="text" name="sou" value="{{$sou}}">
    <input type="submit" value="搜索">
</form>
<table border="1" cellspacing="0">
    <tr>
        <td>ID</td>
        <td>名称</td>
        <td>价格</td>
        <td>介绍</td>
        <td>编辑</td>
    </tr>
    @foreach($data as $k=>$v)
        <tr>
            <td>{{$v->goods_id}}</td>
            <td><a href="test?id={{$v->goods_id}}">{{$v->goods_name}}</a></td>
            <td>{{$v->goods_selfprice}}</td>
            <td>{{$v->goods_details}}</td>
            <td>
                <a href="upd?id={{$v->goods_id}}">修改</a>
                <a href="del?id={{$v->goods_id}}">删除</a>
            </td>
        </tr>
    @endforeach
        <tr align="center">
            <td colspan="5">{{ $data->appends(['sou' => $sou])->links() }}</td>
        </tr>
</table>