@extends('layouts.main')
@section('title')微信支付@stop

@section('content')

@stop

@section('foot-script')
    <script>
        $(function () {
            function pay() {
                WeixinJSBridge.invoke(
                    'getBrandWCPayRequest', <?= $json ?>,
                    function(res){
                        if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                            location.href = '{{ $ret_url }}';
                            return;
                        }
                        location.href = '{{ $error_url }}';
                    }
                );
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