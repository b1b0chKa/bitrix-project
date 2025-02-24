<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->IncludeComponent(
	'my_components:universal',
	'list',
	[
		'FILTER' => [
			'IBLOCK_ID' => '4',
			'ACTIVE' => 'Y',
			// "DLINA.VALUE" => 18
		],
		'SELECTT' => [
			'ID',
			'PREVIEW_TEXT',
			'NAME',
			'CODE',
			'IBLOCK_ID',
			'ACTIVE',
			// "DLINA.VALUE",
		],
		'PAGE_SIZE' => 4,
		'ORDER' => ['TIMESTAMP_X' => 'DESC'],
		'ID_PAGINATION' => 'news-page',
	]
);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
