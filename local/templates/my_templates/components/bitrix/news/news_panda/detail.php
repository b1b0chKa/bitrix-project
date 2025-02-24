<?php
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	'',
	[
		'SEF_MODE' => 'Y',
		'IBLOCK_ID' => 9,
		'ELEMENT_CODE' => $arResult['VARIABLES']['CODE'],
		"DISPLAY_NAME" => "Y",
	],
);
