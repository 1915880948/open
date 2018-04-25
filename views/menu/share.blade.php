@extends('layouts.main')

@section('title')@stop

@section('content')

@stop

@section('plugin-style')
@stop

@section('foot-script')
<script>
    $(function(){
        wx.onMenuShareAppMessage({
            title: '呱谷课堂', // 分享标题
            desc: '呱谷课堂-首页', // 分享描述
            link: 'http://open.guaschool.com', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: 'http://p5tjno6bs.bkt.clouddn.com/Fvk1hj9lDBlML77RhAY-cwfShqa6', // 分享图标
            success: function () {
                history.go(-1);
            }
        });
    });
</script>
@stop