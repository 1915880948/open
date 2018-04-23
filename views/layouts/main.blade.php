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
<script type="text/javascript" charset="utf-8">
    $(function () {
        {{--wx.config({!! jssdk()->setUrl(yUrlCurrent())->config(['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage',--}}
        {{--'menuItem:profile','menuItem:addContact','menuItem:share:appMessage','menuItem:share:timeline']) !!});--}}
        wx.config({!! \app\common\wechat\Weixin::getApp()->js->config(['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage',
                    'menuItem:profile','menuItem:addContact','menuItem:share:appMessage','menuItem:share:timeline','chooseWXPay',"chooseImage", "previewImage", "uploadImage", "downloadImage",
                     'startRecord', 'stopRecord', 'onVoiceRecordEnd', 'playVoice', 'pauseVoice', 'uploadVoice']) !!});
    })
</script>
@yield('foot-script')
</body>
</html>