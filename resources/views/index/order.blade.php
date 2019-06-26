    <div class="prolist" id="prolist">
        @foreach($data as $k=>$v)
        <dl>
            <dt><a href="proinfo"><img src="{{config('app.img_url')}}{{$v->goods_mid_pic}}" width="100" height="100" /></a></dt>
            <dd>
                <h3><a href="proinfo">{{$v->goods_name}}</a></h3>
                <div class="prolist-price"><strong>¥{{$v->goods_selfprice}}</strong> <span>¥{{$v->goods_markprice}}</span></div>
                <div class="prolist-yishou"><span>5.0折</span> <em>已售：{{$v->goods_score}}</em></div>
            </dd>
            <div class="clearfix"></div>
        </dl>
        @endforeach
    </div><!--prolist/-->
