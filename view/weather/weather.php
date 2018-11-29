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
if (isset($weather["currently"])) {
    ?>
    <div class="container days">
        <div class="container card  current">
            <i class="<?=$weather["currently"]["icon"] ?>"></i>
            Vädret just nu: <?=  htmlentities(strftime("%c", $weather["currently"]["time"]))?> <br>
            Väderlek  : <?= htmlentities($weather["currently"]["summary"]) ?><br>
            Temperatur: <?= htmlentities($weather["currently"]["temperature"]) ?> &#8451;<br>
            windSpeed : <?= htmlentities($weather["currently"]["windSpeed"]) ?> m/s
        </div> <br><br>
        <?php

        foreach ($weather["daily"]["data"] as $key => $value) {
            ?>
            <div class="container card day">
                <i class="<?=htmlentities($value["icon"])?>"></i>
                Dag: <?= ucfirst(strftime("%A", $value["time"])); ?> | <?=  strftime("%x", $value["time"])?> <br>
                Väderlek  : <?= htmlentities($value["summary"]) ?><br>
                Temperatur (högsta): <span class="tempHigh"><?= htmlentities($value["temperatureHigh"]) ?></span>  &#8451; <br>
                Temperatur (lägsta): <span class="tempLow"><?= htmlentities($value["temperatureLow"]) ?></span> &#8451;<br>
                VindHastighet : <?= htmlentities($value["windSpeed"]) ?> m/s<br>
            </div> <br><br>
                <?php
        }
        ?>
    </div>
    <?php
}
if (isset($mapDiv)) {
    ?>
    <div class="">
    <?php
    echo $mapDiv;
    ?>
    </div>
    <?php
}
?>
