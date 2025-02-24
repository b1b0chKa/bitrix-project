<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
?>
<a class="back" href="/news/">Назад</a>
<span class="detailNews">
    <h5 class="detailHead"><?= $arResult['detailNews']['NAME']?></h5><br>
    <p class="detailPharagrath"><?= $arResult['detailNews']['DETAIL_TEXT']?></p><br>
    <h6 class="detailTimeLine"><time datetime="Y-d-m" class="" name="time"><?= $arResult['detailNews']['DATE_ACTIVE_FROM'] ?></time></h6>
</span>