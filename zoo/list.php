<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';


$APPLICATION->IncludeComponent(
	'my_components:zoo',
	'some',
	[
	]
);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';

?>