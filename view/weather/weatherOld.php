<?php
namespace Anax\View;

if (isset($location)) {
    ?>
    Stad:   <?= htmlentities($location["city"]) ?> <br>
    Lat:    <?= htmlentities($location["latitude"]) ?> <br>
    Long:   <?= htmlentities($location["longitude"]) ?> <br>
    <?php
}
setlocale(LC_ALL, 'swedish.UTF-8');
if (isset($weather[0]["daily"])) {
    ?>
    <div class="container days">
    <?php
    for ($i=0; $i < count($weather); $i++) {
        ?>
        <div class="container card day">
            <i class="<?=htmlentities($weather[$i]["daily"]["data"][0]["icon"])?>"></i>
            Dag: <?= htmlentities(ucfirst(strftime("%A", $weather[$i]["currently"]["time"]))); ?> | <?=  htmlentities(strftime("%x", $weather[$i]["currently"]["time"]))?> <br>
            Väderlek  : <?= htmlentities($weather[$i]["daily"]["data"][0]["summary"]) ?><br>
            Temperatur (högsta): <span class="tempHigh"><?=htmlentities($weather[$i]["daily"]["data"][0]["temperatureHigh"]) ?></span>  &#8451; <br>
            Temperatur (lägsta): <span class="tempLow"><?= htmlentities($weather[$i]["daily"]["data"][0]["temperatureLow"]) ?></span> &#8451;<br>
            VindHastighet : <?= htmlentities($weather[$i]["currently"]["windSpeed"]) ?> m/s<br>
        </div> <br><br>
        <?php
    }
    ?>
    </div>
    <?php
}
if (isset($mapDiv)) {
    echo $mapDiv;
}
?>
