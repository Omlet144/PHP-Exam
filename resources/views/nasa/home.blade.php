<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{  asset('/css/style3.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div id="head">
    <a href="https://www.nasa.gov"><img id="nasa" src="{{  asset('/file/nasa.png') }}"></a>
    <h1 style="margin-right: 525px; color: white; font-family: BankGothic Lt BT; font-size: 52px">NASA APIs</h1>
</div>
<br>
<br>
<br>
<div id="cards">
    <div id="card">
        <a class="links" href="/earth?page=1">
            <img style="width: 200px; height: 200px" src="{{  asset('/file/planet_earth.png') }}">
            <br>
            <h3>EARTH</h3>
        </a>
    </div>
    <div id="card">
        <a class="links" href="/mars">
            <img style="width: 200px; height: 200px" src="{{  asset('/file/mars.png') }}">
            <br>
            <h3>MARS</h3>
        </a>
    </div>
    <div id="card">
        <a class="links" href="/moon">
            <img style="width: 200px; height: 200px" src="{{  asset('/file/moon.png') }}">
            <br>
            <h3>MOON</h3>
        </a>
    </div>
</div>
</body>
