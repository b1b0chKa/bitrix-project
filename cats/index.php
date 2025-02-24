<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
?>

		

<?php
$APPLICATION->IncludeComponent(
	'my_components:unic',
	'list',
	[
		// 'PROPERTY' => $_REQUEST['PROPERTY'],
		'FILTER' => [
			'IBLOCK_ID' => 8,
			'ACTIVE' => 'Y',
		],
		'SELECT' => [
			'ID',
			'PREVIEW_TEXT',
			'NAME',
			'CODE',
			'IBLOCK_ID',
			'DLINA' => 'PROPERTY_DLINA',
			'COLOR' => 'PROPERTY_COLOR'
		],
		'PAGE_SIZE' => 4,
	],
);

require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php";
