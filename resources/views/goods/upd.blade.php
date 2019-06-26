<form action="upddo" method="get">
    <input type="hidden" name="goods_id" value="{{$data[0]->goods_id}}">
    <table>
        商品名称：<input type="text" name="goods_name" value="{{$data[0]->goods_name}}"><br>
        商品价格：<input type="text" name="goods_selfprice" value="{{$data[0]->goods_selfprice}}"><br>
        商品介绍：<input type="text" name="goods_details" value="{{$data[0]->goods_details}}"><br>
        <input type="submit" value="修改">
    </table>
</form>