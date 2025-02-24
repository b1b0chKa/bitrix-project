<?php
// echo '<pre>',htmlspecialchars(print_r($arResult, true)),'</pre>';exit();
$APPLICATION->IncludeComponent(
	'my_components:list_pandas',
	'list',
	[
		'FILTER' => [
			'IBLOCK_ID' => 9,
			'ACTIVE' => 'Y',
		],
		'SELECT' => ['ID', 'CODE', 'NAME', 'PREVIEW_TEXT'],
	],
);

?>
