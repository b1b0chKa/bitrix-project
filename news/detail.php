<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->IncludeComponent(
    'my_components:detail_news_component',
    'detail_news',
    [
        'CODE' => $_REQUEST['CODE'],
    ]
);

require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php";

