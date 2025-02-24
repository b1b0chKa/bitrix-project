<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$filter = [
	'IBLOCK_ID' => 10,
	'ACTIVE' => 'Y',
];

if (!empty($_GET['ID']))
	$filter['IBLOCK_SECTION_ID'] = $_GET['ID'];

$APPLICATION->IncludeComponent(
	'my_components:zoo',
	'some',
	[
		'FILTER' => $filter,
		'PAGE_SIZE' => 1,
		'SELECT' => ['*', 
			// 'ID', 'NAME', 'PREVIEW_TEXT', 'CODE', 'IBLOCK_SECTION_ID'
		]
	]
);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';

?>