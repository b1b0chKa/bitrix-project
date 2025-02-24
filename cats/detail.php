<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->IncludeComponent(
	'my_components:unic',
	'detail',
	[
		'FILTER' => [
			'IBLOCK_ID' => 8,
			'ACTIVE' => 'Y',
			'CODE' => $_REQUEST['CODE'],
		],
		'SELECT' => [
			'ID',
			'DETAIL_TEXT',
			'NAME',
			'CODE'
		],
		'PAGE_SIZE' => 1,
	],
);

require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php";
