<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();

foreach($arResult['USER_DATA'] as $item)
{
?>
    <h1><?=$item['NAME']?></h1>
    <p><?=$item['IBLOCK_ELEMENTS_ELEMENT_DATAAPI_PROPERTY_PHONE_VALUE']?></p>
    <p><?=$item['IBLOCK_ELEMENTS_ELEMENT_DATAAPI_PROPERTY_NAME_VALUE']?></p> </br>
<?php
}
