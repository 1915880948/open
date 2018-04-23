<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@yield('content')
<script src="{{ yStatic('js/jquery-2.1.4.js') }}"></script>
<script type='text/javascript' src='http://res.wx.qq.com/open/js/jweixin-1.3.0.js'></script>
<script type="text/javascript" charset="utf-8">
    $(function () {
        wx.config({!! \app\common\wechat\Weixin::getApp()->jssdk->buildConfig(['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage',
                    'menuItem:profile','menuItem:addContact','menuItem:share:appMessage','menuItem:share:timeline','chooseWXPay',"chooseImage", "previewImage", "uploadImage", "downloadImage",
                     'startRecord', 'stopRecord', 'onVoiceRecordEnd', 'playVoice', 'pauseVoice', 'uploadVoice']) !!});
    })
</script>
@yield('foot-script')
</body>
</html>