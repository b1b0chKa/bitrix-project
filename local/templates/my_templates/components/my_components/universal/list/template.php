<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
?>

<section class="previewStr">
    <?php 
    foreach ($arResult['NEWS_ITEMS'] as $item)
    {
    ?>
        <span class="previewNews">
            <a class="previewLink"href="/news/detail/<?=$item['CODE']?>">
                <h5 class="previewHead"><?=$item['NAME']?></h5><br>
            </a>
            <p class="previewPharagrath"><?=$item['PREVIEW_TEXT']?></p><br>
            <!-- <h6 class="previewTimeLine"><time datetime="Y-d-m" class="" name="time</time></h6> -->
        </span>
    <?php
    }
    ?>
</section>

<div class="pagination">
    <?php
    $APPLICATION->IncludeComponent(
        'bitrix:main.pagenavigation',
        '',
        [
            "SEF_MODE" => "Y",
            'NAV_OBJECT' => $arResult['PAG'],
        ]
        );
    ?>
</div>

