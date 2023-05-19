<?php
$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=r3IQSqYQTxonvAkq4dQhbXyAnJzTLsTgzBxHFlTi');
//echo $res->getBody();
$mars_info = json_decode($res->getBody(), true);
$camers = array();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{  asset('/css/style2.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div id="head">
    <a href="https://www.nasa.gov"><img id="nasa" src="{{  asset('/file/nasa.png') }}"></a>
    <h1 style="color: white; font-family: BankGothic Lt BT; font-size: 52px">MARS</h1>
    <div style="display: flex; flex-flow: column">
        <a class="links" href="/home"><b>HOME</b></a>
        <a class="links" href="/moon"><b>MOON</b></a>
        <a class="links" href="/earth?page=1"><b>EARTH</b></a>
    </div>
</div>
<div id="camers">
    <h3>Choose a camera:</h3>
    <form action="/mars" method="get" id="form">
    <?php
        foreach ($mars_info['photos'] as $item) {
            if (!in_array($item['camera']['full_name'], $camers)) {
                $camers[] = $item['camera']['full_name'];
                echo '<input name="btn" type="submit" value="'.$item['camera']['full_name'].'" style="height: 40px;" class="links"></input>';
            }
        }
    ?>
    </form>
</div>
<br>
<div id="cards">
<?php
if(isset($_GET['btn']))
{
    if($_GET['btn']!='Mast Camera'){
        foreach ($mars_info['photos'] as $item) {
            if($item['camera']['full_name']==$_GET['btn']){
                echo ' <div id="card">';
                    echo '<img id="marsImg" src="'.$item['img_src'].'">';
                    echo '<p>'.'Rover name: '.$item['rover']['name'].'</p>';
                    echo '<div>'.'Launch date: '.$item['rover']['launch_date'].'</div>';
                    echo '<div>'.'Landing date: '.$item['rover']['landing_date'].'</div>';
                echo '</div>';
            }
        }
    }
    else{
        $i=0;
        foreach ($mars_info['photos'] as $item) {
            if($item['camera']['full_name']==$_GET['btn']){
                echo ' <div id="card">';
                echo '<img id="marsImg" src="'.$item['img_src'].'">';
                echo '<p>'.'Rover name: '.$item['rover']['name'].'</p>';
                echo '<div>'.'Launch date: '.$item['rover']['launch_date'].'</div>';
                echo '<div>'.'Landing date: '.$item['rover']['landing_date'].'</div>';
                echo '</div>';
                $i++;
                if($i==12)break;
            }
        }
    }
}
?>
</div>

</body>
