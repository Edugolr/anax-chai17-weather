<?php
namespace Anax\View;

?>
Välj prognos eller gamla rapporter
<div class="">
    <form action="">
      <input type="radio" name="action" onclick="document.getElementById('weather').action='<?=htmlentities(url("weather/weather")) ?>';"> Vädret nu och kommande<br>
      <input type="radio" name="action" onclick="document.getElementById('weather').action='<?= htmlentities(url("weather/weatherOld")) ?>';"> Vädret gammalt (30 dagar)<br>
    </form>
</div> <br><br>
Ange Ort eller ip för väderleksrapport
<div class="">
    <form id="weather" class="" action='<?= htmlentities(url("weather/weather")) ?>' method="get">
        Ip:<input type="text" name="ip" value="<?=htmlentities($ip) ?>">
        <input class="btn" type="submit" name="" value="Submit">
    </form>
</div>
