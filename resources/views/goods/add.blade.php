<form action="adddo" method="post">
    {{csrf_field()}}
    <table border="1" cellspacing="0">
        <tr>
            <td>商品名称：<input type="text" name="goods_name"></td>
        </tr>
        <tr>
            <td>商品价格：<input type="text" name="goods_selfprice"></td>
        </tr>
        <tr>
            <td>商品库存：<input type="text" name="goods_num"></td>
        </tr>
        <tr>
            <td>商品介绍：<input type="text" name="goods_details"></td>
        </tr>
        <tr>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>