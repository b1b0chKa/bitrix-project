<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
?>


<?php
$APPLICATION->IncludeComponent(
    'my_components:search',
    'baaase',
    [
        'FILTER' => [
            'IBLOCK_ID' => 4,
        ],
        'PAGE_SIZE' => 5,
    ]);


require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
?>