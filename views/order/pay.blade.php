@extends('layouts.main')
@section('title')@stop

@section('content')

@stop

@section('foot-script')
    <script>
        $(function () {
            function pay() {
                console.log('aaa');
                WeixinJSBridge.invoke(
                    'getBrandWCPayRequest', '<?= $json ?>',
                    function(res){
                        if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                            // 使用以上方式判断前端返回,微信团队郑重提示：
                            // res.err_msg将在用户支付成功后返回
                            // ok，但并不保证它绝对可靠。
                        }
                    }
                );
                {{--wx.chooseWXPay({--}}
                    {{--timestamp: '{{ $config['timestamp'] }}',--}}
                    {{--nonceStr: '{{ $config['nonceStr'] }}',--}}
                    {{--package: '{{ $config['package'] }}',--}}
                    {{--signType: '{{ $config['signType'] }}',--}}
                    {{--paySign: '{{ $config['paySign'] }}', // 支付签名--}}
                    {{--success: function (res) {--}}
                        {{--alert('支付成功');--}}
                    {{--}--}}
                {{--});--}}
            }
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', pay, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', pay);
                    document.attachEvent('onWeixinJSBridgeReady', pay);
                }
            }else{
                pay();
            }
        });
    </script>
@stop