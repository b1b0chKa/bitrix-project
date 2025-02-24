<?php
// echo '<pre>',htmlspecialchars(print_r($_REQUEST, true)),'</pre>';exit();

$rsSection = \Bitrix\Iblock\SectionTable::getList([
	'filter' => [
		'IBLOCK_ID' => $arParams['FILTER']['IBLOCK_ID'],
	],
	'select' =>  $arParams['SELECT'],
]);

while ($arSection = $rsSection->fetch()) 	
	$arResult['SECTION'][] = $arSection;