<?php
$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://images-assets.nasa.gov/image/PIA12233/collection.json');
$moon_info = json_decode($res->getBody(), true);
//var_dump($moon_info);
$camers = array();
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{  asset('/css/style4.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div id="head">
    <a href="https://www.nasa.gov"><img id="nasa" src="{{  asset('/file/nasa.png') }}"></a>
    <h1 style="color: white; font-family: BankGothic Lt BT; font-size: 52px">MOON</h1>
    <div style="display: flex; flex-flow: column">
        <a class="links" href="/home"><b>HOME</b></a>
        <a class="links" href="/mars"><b>MARS</b></a>
        <a class="links" href="/earth?page=1"><b>EARTH</b></a>
    </div>
</div>
<div id="cards">
    <?php
    $i=0;
    foreach ($moon_info as $item) {
            echo ' <div id="card">';
            echo '<img id="marsImg" src="' . $item . '">';
            echo '</div>';
            $i++;
            if($i==1)break;
    }
    ?>
</div>

</body>
