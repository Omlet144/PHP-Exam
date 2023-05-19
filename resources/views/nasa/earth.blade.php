<?php
$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://api.nasa.gov/EPIC/api/natural?api_key=r3IQSqYQTxonvAkq4dQhbXyAnJzTLsTgzBxHFlTi');
//echo $res->getBody();
$earth_info = json_decode($res->getBody(), true);


$page = !isset($_GET['page']) ? 1 : $_GET['page'];
$limit = 1;
$offset = ($page - 1) * $limit;
$total_items = count($earth_info);
$total_pages = ceil($total_items / $limit);
$array = array_splice($earth_info, $offset, $limit);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{  asset('/css/style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div id="head">
    <a href="https://www.nasa.gov"><img id="nasa" src="{{  asset('/file/nasa.png') }}"></a>
    <h1 style="color: white; font-family: BankGothic Lt BT; font-size: 52px">EARTH</h1>
    <div style="display: flex; flex-flow: column">
        <a class="links" href="/home"><b>HOME</b></a>
        <a class="links" href="/moon"><b>MOON</b></a>
        <a class="links" href="/mars"><b>MARS</b></a>
    </div>
</div>

<?php
for($i=0; $i<1; $i++)
{
echo '<div id="cards">';
    echo '<div id="cards">';

            echo ' <div id="card">';
            echo '<h3>'.'EPIC: Earth Polychromatic Imaging Camera'.'</h3>';
            echo '<p>'.$array[$i]['caption'].'</p>';
            echo '<img id="earthImg" src="https://api.nasa.gov/EPIC/archive/natural/2023/05/17/png/'.$array[$i]['image'].'.png?api_key=r3IQSqYQTxonvAkq4dQhbXyAnJzTLsTgzBxHFlTi">';
            echo '<p>'.'Date: '.$array[$i]['date'].'</p>';
            echo '</div>';

   echo  '</div>';
echo '</div>';
 }
?>

<br>
<div class="pagin">
    <?php
        if($_GET['page']!=1)
        {
            echo '<a href="/earth?page='.($_GET['page']-1).'">&laquo;</a>';
        }
        if($_GET['page']==1)
        {
            echo "<a style='background-color: #4CAF50; color: white;' href='/earth?page=1'>1</a>";
        }
        else {echo "<a href='/earth?page=1'>1</a>";}
        if($_GET['page']>=20)
        {
            echo "<a>...</a>";
        }
        if($_GET['page']<3)
        {
            for($j=2;$j<=$total_pages-1;$j++) {
                    if($j<4 && $j!=$_GET['page'])
                    {
                        echo "<a href='/earth?page=$j'>$j</a>";
                    }
                    else if($j==$_GET['page'])
                    {
                        echo "<a style='background-color: #4CAF50; color: white;' href='/earth?page=$j'>$j</a>";
                    }
            }
        }
        else{
            for($j=2;$j<=$total_pages-1;$j++) {
                if($j>$_GET['page']-1 && $j<$_GET['page']+2 && $j!=$_GET['page'])
                {
                    echo "<a href='/earth?page=$j'>$j</a>";
                }
                else if($j==$_GET['page'])
                {
                    echo "<a style='background-color: #4CAF50; color: white;' href='/earth?page=$j'>$j</a>";
                }
            }
        }
        if($_GET['page']<20)
        {
            echo "<a>...</a>";
        }
        if($_GET['page']==$total_pages)
        {
            echo "<a style='background-color: #4CAF50; color: white;' href='/earth?page=$total_pages'>$total_pages</a>";
        }
        else{
            echo "<a href='/earth?page=$total_pages'>$total_pages</a>";
        }

        if($_GET['page']!=$total_pages)
        {
            echo '<a href="/earth?page='.($_GET['page']+1).'">&raquo;</a>';
        }
    ?>
</div>
</body>
