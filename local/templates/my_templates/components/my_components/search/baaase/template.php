<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
?>

<form method="post" id='search_form'>
    <input type="text" name="search_query" class="search" placeholder="Поиск новостей" value="<?=htmlspecialchars($arResult['QUERY'])?>">
    <button type="submit">Искать</button>
</form>

<?php
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
foreach($arResult['SEARCH_RESULT'] as $searchItem)
{
?>
    <span class="previewNews">
            <a class="previewLink" href="/news/detail/<?=$searchItem['CODE']?>">
                <h5 class="previewHead"><?=$searchItem['NAME']?></h5><br>
            </a>
            <p class="previewPharagrath"><?=$searchItem['PREVIEW_TEXT']?></p><br>
    </span>
<?php
}
