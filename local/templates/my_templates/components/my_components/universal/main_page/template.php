
<?php
foreach($arResult['NEWS_ITEMS'] as $item)
{
?>
    <span class="news">
        <a href="/news/detail/<?=$item['CODE']?>" class="linkHeadLine">
            <h5 class="headline"><?=$item['NAME'] ?></h5><br>
        </a>
        <p class="pharagrath"><?=substr($item['PREVIEW_TEXT'], 0, 150)?></p>
        <!-- <h6 class="timeLine"><time datetime="Y-d-m" class="textForMiniNews" name="time"></time></h6> -->
    </span>
<?php
}
?>
