<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
?>



<?php
$APPLICATION->IncludeComponent(
    "my_components:form_data",
    "bam",
    [
        'SELECT' => [
            'PROPERTY_PHONE.VALUE',
            'PROPERTY_NAME.VALUE',
            'ID',
            'NAME'
        ],
		'PAGE_SIZE' => 2,
        'IBLOCK_ID' => 5,
    ]
);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
?>
