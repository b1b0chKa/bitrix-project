<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->IncludeComponent(
	'bitrix:news',
	'news_cats',
	[
		"IBLOCK_ID" => 8,
		"DISPLAY_NAME" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/cats_list",
		"SEF_URL_TEMPLATES" => [
			"news" => "/",
			"detail" => "detail/#CODE#",
		]
	]
);
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';