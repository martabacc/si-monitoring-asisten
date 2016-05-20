
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Oh, Crap! </title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/errorscreen.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/errorprint.css') }}" media="print" />
    <!--[if lt IE 7]>
    <link rel="stylesheet" media="screen" href="/styles/ielt7.css" type="text/css"/>
    <![endif]-->
    <script type="text/javascript" src="/javascript/scripts.js"></script>
</head>
<body id="e404">

<div id="root">
    <div id="content">
        <div class="outer">
            <div id="error" style="background:url( {{ url('shinobi.png') }} ) no-repeat">
                <h1 class="a">Shinobi ...  404 !</h1>
                <p>Our shinobi said that your request page is not exist. <br> You may </span> <a href=" "> turn back </a> or head straight to our <a href="{{ url('/') }}">home.</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>