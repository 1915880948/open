@extends('layouts.main')
@section('title')@stop

@section('content')

@stop

@section('foot-script')
    <script>
        $(function () {
            function pay() {
                console.log('aaa');
                wx.chooseWXPay({
                    timestamp: '{{ $config['timestamp'] }}',
                    nonceStr: '{{ $config['nonceStr'] }}',
                    package: '{{ $config['package'] }}',
                    signType: '{{ $config['signType'] }}',
                    paySign: '{{ $config['paySign'] }}', // 支付签名
                    success: function (res) {
                        alert('支付成功');
                    }
                });
            }
            pay();
        });
    </script>
@stop