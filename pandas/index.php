<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->IncludeComponent(
	"bitrix:news",
	'news_panda',
	[
		"IBLOCK_ID" => 9,
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/pandas",
        "SEF_URL_TEMPLATES" => [
			'news' => '/',
			"detail" => "detail/#CODE#",
		],
	],
);


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>