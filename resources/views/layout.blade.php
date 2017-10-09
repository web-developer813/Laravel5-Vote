<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count Me In - What's one vote really worth?</title>
    <script src="https://use.typekit.net/kps4ena.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <div id="left"></div>
    <div id="right"></div>
    <div id="top"></div>
    <div id="bottom"></div>
    <div class="tiny-header">
        @if (($title == 'index') OR ($title == 'non-us'))
        @else
            <a href="{{URL::route('index')}}"><div class="site-title">Count Me In</div></a>
        @endif
        <div class="nav">
            @if ($title == 'state')
                <a href="{{URL::route('states')}}" class="back">See Other States</a>
            @elseif ($title == 'states')
                <a href="{{URL::route('index')}} " class="back">Where am i?</a>
            @elseif ($title == 'non-us')
                <a href='{{URL::route('states')}}'>I'm a US citizen</a>
            @elseif ($title == 'index')
                <a href='{{URL::route('non-us')}}'>Not in the US?</a>
            @endif
        </div>
        <div class="social">
            <a href="#"><img src="/img/twitter.png" alt="Share on Twitter"></a>
            <a href="#"><img src="/img/facebook.png" alt="Share on Facebook"></a>
            <a href="#"><img src="/img/linkedin.png" alt="Share on Linkedin"></a>
        </div>
    </div>
    @yield('body')
    <div class="clear"></div>
    <footer>
        <script src="/js/stuff.js"></script>
    </footer>
</body>
</html>
