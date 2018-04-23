@section('title')@stop

@section('content')

@stop

@section('foot-script')
    <script type='text/javascript' src='http://res.wx.qq.com/open/js/jweixin-1.3.0.js'></script>
    <script>
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
    </script>
@stop